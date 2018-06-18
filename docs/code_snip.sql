--
-- Database: `code_snip`
--

-- --------------------------------------------------------

--
-- Table structure for table `login_log`
--

CREATE TABLE `login_log` (
  `id` int(11) NOT NULL,
  `username` varchar(20) DEFAULT NULL,
  `ip_address` varchar(46) DEFAULT NULL,
  `created_on` datetime DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `session`
--

CREATE TABLE `session` (
  `session_id` varchar(40) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `session_data` text,
  `ip_address` varchar(46) DEFAULT NULL,
  `created_on` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_on` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


-- --------------------------------------------------------

--
-- Table structure for table `snippet`
--

CREATE TABLE `snippet` (
  `id` int(11) NOT NULL,
  `creator_id` int(11) NOT NULL,
  `title` varchar(128) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `text` text,
  `lang` varchar(32) NOT NULL DEFAULT 'built_in',
  `created_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_public` tinyint(1) NOT NULL DEFAULT '0',
  `public_id` varchar(200) DEFAULT NULL,
  `status` smallint(6) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `snippet`
--

INSERT INTO `snippet` (`id`, `creator_id`, `title`, `text`, `lang`, `created_on`, `updated_on`, `is_public`, `public_id`, `status`) VALUES
(36, 8, 'Selection sort', '// Java program for implementation of Selection Sort\r\nclass SelectionSort\r\n{\r\n    void sort(int arr[])\r\n    {\r\n        int n = arr.length;\r\n \r\n        // One by one move boundary of unsorted subarray\r\n        for (int i = 0; i &lt; n-1; i++)\r\n        {\r\n            // Find the minimum element in unsorted array\r\n            int min_idx = i;\r\n            for (int j = i+1; j &lt; n; j++)\r\n                if (arr[j] &lt; arr[min_idx])\r\n                    min_idx = j;\r\n \r\n            // Swap the found minimum element with the first\r\n            // element\r\n            int temp = arr[min_idx];\r\n            arr[min_idx] = arr[i];\r\n            arr[i] = temp;\r\n        }\r\n    }\r\n \r\n    // Prints the array\r\n    void printArray(int arr[])\r\n    {\r\n        int n = arr.length;\r\n        for (int i=0; i&lt;n; ++i)\r\n            System.out.print(arr[i]+&quot; &quot;);\r\n        System.out.println();\r\n    }\r\n \r\n    // Driver code to test above\r\n    public static void main(String args[])\r\n    {\r\n        SelectionSort ob = new SelectionSort();\r\n        int arr[] = {64,25,12,22,11};\r\n        ob.sort(arr);\r\n        System.out.println(&quot;Sorted array&quot;);\r\n        ob.printArray(arr);\r\n    }\r\n}\r\n/* This code is contributed by Rajat Mishra*/', 'Java', '2018-06-18 15:13:52', '2018-06-18 15:13:52', 0, '$1$neuVvplb$B33Aa4ayowoOqRmkVLOs/.', 1),
(37, 8, 'Hello world', '#include &lt;iostream&gt;\r\nusing namespace std;\r\n\r\nint main() {\r\n    cout &lt;&lt; &quot;Hello World&quot;;\r\n	\r\n    return 0;\r\n}', 'C++', '2018-06-18 15:16:20', '2018-06-18 15:18:54', 0, '$1$qzUZCm/Y$pBSzxHNzjzhgJAeW0anzJ1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `firstname` varchar(20) DEFAULT NULL,
  `lastname` varchar(20) DEFAULT NULL,
  `email` varchar(60) DEFAULT NULL,
  `type` smallint(6) NOT NULL DEFAULT '0',
  `status` smallint(6) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `firstname`, `lastname`, `email`, `type`, `status`) VALUES
(8, 'admin', '$2y$10$z/KTMcSVreiwtV1smIL9uO3OWZj2Z9HAqxoIeJcMm6bof5Qg2AM8q', 'admin', 'admin', 'admin@admin.com', 10, 1)

--
-- Indexes for table `session`
--
ALTER TABLE `session`
  ADD PRIMARY KEY (`session_id`);

--
-- Indexes for table `snippet`
--
ALTER TABLE `snippet`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_creator_id` (`creator_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `snippet`
--
ALTER TABLE `snippet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `snippet`
--
ALTER TABLE `snippet`
  ADD CONSTRAINT `fk_creator_id` FOREIGN KEY (`creator_id`) REFERENCES `user` (`id`);
COMMIT;