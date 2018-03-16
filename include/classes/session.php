<?php

class Session
{
    private $db;
    private $session_arr;

    public function __construct()
    {
        // Connect to database
        $this->db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
    }

    function open($save_path, $session_name)
    {
        $this->gc();
        return true;
    }

    public function close()
    {
        $this->gc();
        return true;
    }

    public function read($session_id)
    {
        // Read session data and return it
        $stmt = $this->db->prepare("SELECT * FROM session WHERE session_id=? AND ip_address=?");
        $stmt->execute(array($session_id, $_SERVER['REMOTE_ADDR']));

        $session_arr = $stmt->fetch(PDO::FETCH_ASSOC);

        if (isset($session_arr['session_data'])) {
            $this->session_arr = $session_arr;
            return $session_arr['session_data'];
        } else {
            return '';
        }
    }

    public function write($session_id, $session_data)
    {
        // Write the session in the database
        $user_id = empty($_SESSION['user_id']) ? 0 : $_SESSION['user_id'];
        $ip_address = $_SERVER['REMOTE_ADDR'];

        if (!is_array($this->session_arr)) {
            // If there is no session created

            if ($user_id != 0) {
                // If there is already a session
                $stmt = $this->db->prepare("SELECT session_id FROM session WHERE user_id=?");
                $stmt->execute(array($user_id));
                $num_rows = $stmt->rowCount();

                if ($num_rows != 0) {

                    $row = $stmt->fetch(PDO::FETCH_ASSOC);

                    if ($row['session_id'] != $session_id) {

                        $stmt = $this->db->prepare("DELETE FROM session WHERE user_id=?");
                        $stmt->execute(array($user_id));
                    }
                }
            }

            $stmt = $this->db->prepare("INSERT INTO session (session_id, user_id, session_data, ip_address, created_on, updated_on) VALUES (?,?,?,?,CURRENT_TIMESTAMP,CURRENT_TIMESTAMP)");
            $stmt->execute(array($session_id, $user_id, $session_data, $ip_address));

        } else {
            // If the session exists in the database update session data and last_updated
            $stmt = $this->db->prepare("UPDATE session SET session_data=?, updated_on=CURRENT_TIMESTAMP WHERE session_id=? AND ip_address=? AND user_id=?");
            $stmt->execute(array($session_data, $session_id, $ip_address, $user_id));
        }

        return true;

    }

    public function destroy($session_id)
    {
        // Destroy the session
        $stmt = $this->db->prepare("SELECT user_id FROM session WHERE session_id=?");
        $stmt->execute(array($session_id));
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if (is_array($row)) {
            $stmt = $this->db->prepare("DELETE FROM session WHERE session_id=?");
            $stmt->execute(array($session_id));
        }

        return true;
    }

    public function gc()
    {
        $stmt = $this->db->prepare("DELETE FROM session WHERE updated_on < CURRENT_TIMESTAMP - INTERVAL '30' MINUTE");
        $stmt->execute();

        return true;
    }

    public function __destruct()
    {
        @session_write_close();
        $this->db = NULL;
    }
}