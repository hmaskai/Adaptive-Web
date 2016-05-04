-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 04, 2016 at 05:11 AM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `quizopedia`
--

-- --------------------------------------------------------

--
-- Table structure for table `demographics`
--

CREATE TABLE IF NOT EXISTS `demographics` (
  `asu_id` int(10) NOT NULL,
  `confidence` varchar(50) NOT NULL,
  `courses_completed` int(1) NOT NULL,
  `description` varchar(50) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `age` varchar(10) NOT NULL,
  `mother_tongue` varchar(10) NOT NULL,
  `country_of_residence` varchar(20) NOT NULL,
  `other_country` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='collects demographic information during registration';

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `username` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL,
`user_id` int(11) NOT NULL,
  `fname` varchar(20) DEFAULT NULL,
  `lname` varchar(20) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `pretest` int(1) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='Used for registration and login' AUTO_INCREMENT=11 ;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`username`, `password`, `user_id`, `fname`, `lname`, `gender`, `pretest`) VALUES
('hmaskai@asu.edu', 'harshil', 1, 'Harshil', 'Maskai', 'male', 1),
('sudesh.shinde@asu.edu', '12345', 2, 'Sudesh', 'Shinde', 'male', 1),
('nbari@asu.edu', 'nilam', 3, 'Nilam', 'Bari', 'female', 1),
('suds2692@gmail.com', '12345', 4, 'Ajay', 'Kulkarni', 'male', 1),
('kardilesaurabh@gmail.com', 'saurabh', 5, 'Saurabh', 'Kardile', 'male', 1),
('harshilmaskai91@gmail.com', 'ajinkya', 6, 'Ajinkya', 'Patil', 'male', 1),
('skardile@gmail.com', 'omkar', 7, 'Omkar', 'Kaptan', 'male', 1),
('aduttaro@asu.edu', 'anuran', 8, 'Anuran', 'Duttaroy', 'male', 1),
('anuran420@gmail.com', 'dhanashree', 9, 'Dhanashree', 'Adhikari', 'female', 1),
('fdsfads@yaho.com', '123456', 10, 'fdasds', 'fdsaf', 'male', 1);

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE IF NOT EXISTS `questions` (
`question_id` int(10) NOT NULL,
  `question_text` varchar(3000) NOT NULL,
  `option_1` varchar(500) NOT NULL,
  `option_2` varchar(500) NOT NULL,
  `option_3` varchar(500) NOT NULL,
  `option_4` varchar(500) NOT NULL,
  `correct_answer` int(1) NOT NULL,
  `tags` varchar(500) NOT NULL,
  `date` date DEFAULT NULL,
  `type` varchar(1) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`question_id`, `question_text`, `option_1`, `option_2`, `option_3`, `option_4`, `correct_answer`, `tags`, `date`, `type`) VALUES
(1, '<label>Consider the followig code segment:</label>\r\n	  <pre>\r\npublic class MyTester {\r\n	public static void main(String[] args) {\r\n	int i = 14;\r\n	int j = 20;\r\n	int k;\r\n	k = j / i * 7 % 4;\r\n	}\r\n}</pre>\r\n	<label>What is the final value of the variable k:</label>', '0', '3', '10', '6', 2, '', NULL, 'P'),
(2, '<label>Consider the followig code segment:</label>\r\n	  <pre>\r\n.......\r\nint myYear = 2015;\r\nString myText = new String("Sun Devil!");\r\nint result = 0;\r\nif (myText.length() &gt; 20)\r\n{\r\nresult = 1;\r\nif (myText.length() &lt; 30 &amp;&amp; myYear &gt;= 2008)\r\nresult += 5;\r\n}\r\nelse\r\nif (myYear &gt;= 2000)\r\nresult += 10;\r\nelse\r\nresult += 100;\r\n.......</pre>\r\n	<label>What is the final value of the variable ''result'':</label>', '1', '100', '10', '6', 3, '', NULL, 'P'),
(3, '<label>Consider the followig code segment:</label>\r\n	  <pre>\r\npublic class Rectangle {\r\n	private double x;\r\n	private double y;\r\n	private double height;\r\n	private double width;\r\n	public Rectangle (double x, double y, double height, double width) {\r\n	this.x = x;\r\n	this.y = y;\r\n	this.height = height;\r\n	this.width = width;\r\n	}\r\n	......\r\n}\r\n\r\nAssume, that one more method has been added to the class:\r\n\r\npublic void magnify (int ratio) {\r\n	height = height * ratio;\r\n	width = width * ratio;\r\n}\r\n\r\n\r\nWhat would be the output of the following code fragment using the new method?\r\n\r\n	......\r\n	Rectangle myBox = new Rectangle(50, 40, 10, 10);\r\n	myBox.magnify(3);\r\n	System.out.println(myBox.getHeight());\r\n	System.out.println(myBox.getWidth());\r\n	......</pre>\r\n	<label>What is the final value of the variable ''result'':</label>', '10, 10', '30, 30', '150, 120', '50, 40', 2, '', NULL, 'P'),
(4, '<label>Consider the followig code segment:</label>\r\n		  <pre>\r\nCode segment 1:					Code segment 2:					Code segment 3:\r\nint i = 3;					int i = 4;					int result = 0;\r\nint result = 0;					int result = 0;					for (int i = 5; i &gt; 0;i-- )\r\nwhile (i &lt; 4) {					do {							result = result + i;\r\n	result = result + i;			result = result + i;\r\n	i++;							i++;\r\n	}					} while (i &lt; 4);\r\n</pre>\r\n		<label>What is the final value of the variable ''result'':</label>', '4, 4, 15', '3, 5, 14', '4, 5, 16', '3, 4, 15', 4, '', NULL, 'P'),
(5, '<label>Consider the followig code segment:</label>\r\n		  <pre>\r\nint[] data = new int[5];\r\nfor (int i = 0; i &lt; 5; i++)\r\ndata[i] = i*i;\r\ndata[2] += 1;\r\nSystem.out.println(data[2]);\r\n</pre>\r\n		<label>What is the final value of the variable ''result'':</label>', '4', '5', '6', '7', 2, '', NULL, 'P'),
(6, '<label>Consider the followig code segment:</label>\r\n			  <pre>\r\nArrayList&lt;Double&gt; list = new ArrayList&lt;Double&gt;();\r\nlist.add(1.1);\r\nlist.add(2.2);\r\nlist.add(3.3);\r\nlist.remove(0);\r\nfor(Double d : list)\r\nSystem.out.println(d);\r\n</pre>\r\n			<label>output:</label>', '2.2, 3.3', '1.1, 2,2', '2.2, 2.2', '1.1, 3.3', 1, '', NULL, 'P'),
(7, '<label>Consider the followig code segment:</label>\r\n			  <pre>\r\nClass Rectangle implements interface Shape, that declares method\r\npublic boolean contains (double x, double y)\r\n// Tests if the specified coordinates are inside the boundary of the Shape.\r\n\r\nThe implementation of the method contains in class Rectangle is following:\r\n\r\npublic boolean contains(double x, double y) {\r\ndouble x0 = getX();\r\ndouble y0 = getY();\r\nreturn (x &gt;= x0 &amp;&amp; y &gt;= y0 &amp;&amp; x &lt; x0 + getWidth() &amp;&amp; y &lt; y0 + getHeight());\r\n}\r\n\r\nWhat will be the output of the following code fragment:\r\n\r\nShape box = new Rectangle( 0, 0, 10, 20);\r\nSystem.out.println(box.contains(50, 10));\r\n</pre>\r\n			<label>output:</label>', 'false', 'NULL', 'Error', 'true', 1, '', NULL, 'P'),
(8, '<label>Consider the followig code segment:</label>\r\n			  <pre>\r\nConsider the fragment of Class ColoredRectangle :\r\n\r\npublic class ColoredRectangle extends Rectanlge\r\n{\r\nString color;\r\npublic ColoredRectangle(double x, double y, double h, double w, String c)\r\n{\r\nsuper(x, y, h, w);\r\ncolor = c;\r\n}\r\npublic String getColor() {\r\nreturn color;\r\n}\r\n.......\r\n}\r\n\r\n\r\nWhat will be the output of the following code fragment using ColoredRectangle:\r\n\r\nColoredRectangle box = new ColoredRectangle (20, 10, 40, 30, "Blue");\r\nSystem.out.println(box.getColor());\r\nSystem.out.println(box.getHeight());\r\nSystem.out.println(box.getWidth());\r\n</pre>\r\n			<label>output:</label>', 'Null, 30.0, 40.0', 'Blue, 30.0, 40.0', 'Blue, 40.0, 30.0', 'Null, Null, Null', 3, '', NULL, 'P'),
(9, '<pre>\r\nTake into account information in questions 7 and 8.\r\nConsider the following statement:\r\n\r\nColoredRectangle box = new ColoredRectangle(0, 0, 30, 50, "Green");\r\n</pre>\r\n			<label>Which of the following conditions return false:</label>', 'if (box instanceOf Rectangle)', 'if (box instanceOf ColoredRectangle)', 'if (box instanceOf Object)', 'if (box instanceOf ArrayList)', 1, '', NULL, 'P'),
(10, '<label>Consider the followig code segment:</label>\r\n			  <pre>\r\nint a = 4 + 4;\r\nint b = 5 + 5;\r\nif (a != b)\r\nSystem.out.println(" Not equal ");\r\nif (a == b)\r\nSystem.out.println(" Equal ");\r\n</pre>\r\n			<label>Output:</label>', 'Not Equal', 'Equal', 'Error', '0', 1, '', NULL, 'P'),
(11, '<label>Which of the following performance is the slowest growth rate?</label>\r\n			<label>Output:</label>', 'O(n)', 'O(n^2)', 'O(nlog(n))', 'O(2^n)', 4, '', NULL, 'P'),
(12, '<label>What is the output for the following fragment of java codes?</label>\r\n			<label>Output:</label>\r\n			<pre>\r\nStack letterStack = new Stack();\r\nletterStack.push("X");\r\nletterStack.push("Y");\r\nletterStack.push("Z");\r\nletterStack.pop();\r\nSystem.out.println(letterStack);\r\n</pre>', '[X, Y, Z]\r\n', '[X, Y]', '[Y, Z]', '[Z]', 2, '', NULL, 'P'),
(13, 'Which of the following is a valid declaration of an object of class Box?', 'Box obj = new Box();', 'Box obj = new Box;', 'obj = new Box();', 'new Box obj;', 1, 'Class ,', '2016-05-01', 'Q'),
(14, 'Which of these method of Object class can generate duplicate copy of the object on which it is called?', 'clone()', 'copy()', 'duplicate()', 'dito()', 1, 'Object ,', '2016-05-02', 'Q'),
(15, 'Which of these is a wrapper for data type int?', 'Integer', 'Long', 'Byte', 'Double', 1, 'Wrapper ,', '2016-05-03', 'Q'),
(16, 'Which of these class is super class of every class in Java?', 'String class', 'Object class', 'Abstract class', 'ArrayList class', 2, 'Object ,', '2016-05-04', 'Q'),
(17, 'String in Java is a?', 'class', 'object', 'variable', 'character array', 1, 'String ,', '2016-05-05', 'Q'),
(18, 'What is the range of data type short in Java?', ' -128 to 127', '-32768 to 32767', '-2147483648 to 2147483647', 'None of the mentioned', 2, 'Primitive Data Type ,', '2016-05-06', 'Q'),
(19, 'Modulus operator, %, can be applied to which of these?', 'Integers', 'Floating â€“ point numbers', 'Both Integers and floating â€“ point numbers.', 'None of the mentioned', 3, 'Boolean Expressions ,Arithmetic Expressions ,', '2016-05-07', 'Q'),
(20, 'Which of these operators is used to allocate memory to array variable in Java?', 'malloc', 'alloc', 'new', 'new malloc', 3, 'Arrays ,', '2016-05-08', 'Q'),
(21, 'What is the output of this program?\r\n1.	    class multidimention_array {\r\n2.	        public static void main(String args[])\r\n3.	        {\r\n4.	            int arr[][] = new int[3][];\r\n5.	            arr[0] = new int[1];\r\n6.	            arr[1] = new int[2];\r\n7.	            arr[2] = new int[3];               \r\n8.		    int sum = 0;\r\n9.		    for (int i = 0; i < 3; ++i) \r\n10.		        for (int j = 0; j < i + 1; ++j)\r\n11.	                    arr[i][j] = j + 1;\r\n12.		    for (int i = 0; i < 3; ++i) \r\n13.		        for (int j = 0; j < i + 1; ++j)\r\n14.	                    sum + = arr[i][j];\r\n15.		    System.out.print(sum); 	\r\n16.	        } \r\n17.	    }\r\n', '11', '10', '13', '14', 2, 'Two Dimensional Array ,Arrays ,', '2016-05-09', 'Q'),
(22, 'Which of these method can be used to increase the capacity of ArrayList object manually?', 'Capacity()', 'increaseCapacity()', 'increasecapacity()', ' ensureCapacity()', 4, 'ArrayList ,', '2016-05-10', 'Q'),
(23, 'What is a transient variable?', 'A transient variable is a variable which is serialized during Serialization.', 'A transient variable is a variable that may not be serialized during Serialization.', 'A transient variable is a variable which is to be marked as serializable.', 'None of the above.', 2, 'Variables ,', '2016-05-11', 'Q'),
(24, 'Which of these selection statements test only for equality?', 'if', 'switch', 'if & switch', 'None of the mentioned', 2, 'Switch Statement ,', '2016-05-12', 'Q'),
(25, 'Which of the following loops will execute the body of loop even when condition controlling the loop is initially false?', 'do-while', 'while', 'for', 'None of the mentioned', 1, 'Do-While Loop ,', '2016-05-13', 'Q'),
(26, 'Which of these are selection statements in Java?', 'if()', 'for()', 'continue', 'break', 1, 'Decision Types ,', '2016-05-14', 'Q'),
(27, ' Which of these is an incorrect array declaration?', 'int arr[] = new int[5] ', 'int [] arr = new int[5] ', 'int arr[] arr = new int[5] ', 'int arr[] = int [5] ', 4, 'Arrays ,', '2016-05-15', 'Q'),
(28, 'What will this code print?\r\nint arr[] = new int [5];\r\nSystem.out.print(arr);\r\n', '0', 'value stored in arr[0]', '00000', 'Garbage value', 4, 'Arrays ,', '2016-05-16', 'Q'),
(29, 'Which of the following methods is a method of wrapper Integer for obtaining hash code for the invoking object?', 'int hash()', 'int hashcode()', 'int hashCode()', 'Integer hashcode()', 3, 'Wrapper ,', '2016-05-17', 'Q'),
(30, 'What is meaning of following declaration ?\r\nint arr[20];', 'Array of size 20 that can have integer address', 'None of these', 'Integer Array of size 20', 'Array of size 20', 3, 'Arrays ,', '2016-05-18', 'Q'),
(31, 'In Java arrays are', 'objects', 'object references', 'primitive data type', 'None of the above', 1, 'Arrays ,', '2016-05-19', 'Q');

-- --------------------------------------------------------

--
-- Table structure for table `student_questions`
--

CREATE TABLE IF NOT EXISTS `student_questions` (
  `user_id` int(11) NOT NULL,
  `question_id` int(10) NOT NULL,
  `answer` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_questions`
--

INSERT INTO `student_questions` (`user_id`, `question_id`, `answer`) VALUES
(1, 1, 2),
(1, 2, 1),
(1, 3, 3),
(1, 4, 3),
(1, 5, 1),
(1, 6, 4),
(1, 7, 2),
(1, 8, 1),
(1, 9, 2),
(1, 10, 2),
(1, 11, 3),
(1, 12, 3),
(3, 1, 1),
(3, 2, 2),
(3, 3, 2),
(3, 4, 2),
(3, 5, 2),
(3, 6, 2),
(3, 7, 2),
(3, 8, 2),
(3, 9, 2),
(3, 10, 2),
(3, 11, 3),
(3, 12, 2),
(6, 1, 3),
(6, 2, 1),
(6, 3, 3),
(6, 4, 1),
(6, 5, 2),
(6, 6, 3),
(6, 7, 1),
(6, 8, 1),
(6, 9, 3),
(6, 10, 2),
(6, 11, 3),
(6, 12, 1),
(7, 1, 3),
(7, 2, 0),
(7, 3, 2),
(7, 4, 1),
(7, 5, 4),
(7, 6, 1),
(7, 7, 4),
(7, 8, 1),
(7, 9, 2),
(7, 10, 2),
(7, 11, 2),
(7, 12, 1),
(8, 1, 2),
(8, 2, 2),
(8, 3, 2),
(8, 4, 1),
(8, 5, 1),
(8, 6, 1),
(8, 7, 1),
(8, 8, 2),
(8, 9, 3),
(8, 10, 2),
(8, 11, 2),
(8, 12, 2),
(2, 1, 2),
(2, 2, 3),
(2, 3, 3),
(2, 4, 2),
(2, 5, 4),
(2, 6, 2),
(2, 7, 2),
(2, 8, 3),
(2, 9, 2),
(2, 10, 3),
(2, 11, 2),
(2, 12, 2),
(5, 1, 4),
(5, 2, 1),
(5, 3, 2),
(5, 4, 3),
(5, 5, 2),
(5, 6, 0),
(5, 7, 2),
(5, 8, 3),
(5, 9, 0),
(5, 10, 2),
(5, 11, 4),
(5, 12, 1),
(1, 13, 1),
(2, 13, 1),
(3, 13, 1),
(4, 13, 2),
(5, 13, 1),
(6, 13, 1),
(7, 13, 4),
(8, 13, 2),
(4, 1, 2),
(4, 2, 2),
(4, 3, 2),
(4, 4, 2),
(4, 5, 2),
(4, 6, 3),
(4, 7, 1),
(4, 8, 3),
(4, 9, 3),
(4, 10, 3),
(4, 11, 3),
(4, 12, 3),
(9, 1, 3),
(9, 2, 3),
(9, 3, 3),
(9, 4, 3),
(9, 5, 1),
(9, 6, 4),
(9, 7, 2),
(9, 8, 1),
(9, 9, 2),
(9, 10, 2),
(9, 11, 3),
(9, 12, 2),
(1, 14, 3),
(2, 14, 1),
(3, 14, 1),
(4, 14, 1),
(5, 14, 3),
(6, 14, 4),
(7, 14, 1),
(8, 14, 1),
(9, 14, 1),
(1, 15, 1),
(2, 15, 1),
(3, 15, 1),
(4, 15, 2),
(5, 15, 1),
(6, 15, 3),
(7, 15, 3),
(8, 15, 2),
(9, 15, 1),
(1, 16, 2),
(2, 16, 2),
(3, 16, 2),
(4, 16, 3),
(5, 16, 3),
(6, 16, 2),
(7, 16, 4),
(8, 16, 2),
(9, 16, 3),
(1, 17, 1),
(2, 17, 1),
(3, 17, 2),
(4, 17, 1),
(5, 17, 1),
(6, 17, 1),
(7, 17, 2),
(8, 17, 4),
(9, 17, 2),
(1, 18, 1),
(2, 18, 2),
(3, 18, 2),
(4, 18, 1),
(5, 18, 2),
(6, 18, 1),
(7, 18, 1),
(8, 18, 2),
(9, 18, 2),
(1, 19, 1),
(2, 19, 3),
(3, 19, 3),
(4, 19, 3),
(5, 19, 4),
(6, 19, 1),
(7, 19, 4),
(8, 19, 3),
(9, 19, 1),
(1, 20, 3),
(2, 20, 3),
(3, 20, 1),
(4, 20, 3),
(5, 20, 3),
(6, 20, 4),
(7, 20, 4),
(8, 20, 3),
(9, 20, 4),
(1, 21, 1),
(2, 21, 2),
(3, 21, 3),
(4, 21, 2),
(5, 21, 1),
(6, 21, 2),
(7, 21, 3),
(8, 21, 2),
(9, 21, 2),
(1, 22, 3),
(2, 22, 4),
(3, 22, 4),
(4, 22, 3),
(5, 22, 2),
(6, 22, 4),
(7, 22, 2),
(8, 22, 4),
(9, 22, 4),
(1, 23, 4),
(2, 23, 2),
(3, 23, 2),
(4, 23, 3),
(5, 23, 3),
(6, 23, 4),
(7, 23, 2),
(8, 23, 1),
(9, 23, 2),
(1, 24, 2),
(2, 24, 2),
(3, 24, 3),
(4, 24, 3),
(5, 24, 2),
(6, 24, 2),
(7, 24, 2),
(8, 24, 3),
(9, 24, 2),
(1, 25, 1),
(2, 25, 1),
(3, 25, 1),
(4, 25, 3),
(5, 25, 1),
(6, 25, 2),
(7, 25, 1),
(8, 25, 1),
(9, 25, 1),
(1, 26, 1),
(2, 26, 1),
(3, 26, 2),
(4, 26, 1),
(5, 26, 1),
(6, 26, 3),
(7, 26, 1),
(8, 26, 3),
(9, 26, 1),
(1, 27, 3),
(2, 27, 3),
(3, 27, 4),
(4, 27, 4),
(5, 27, 4),
(6, 27, 3),
(7, 27, 4),
(8, 27, 4),
(9, 27, 3),
(1, 28, 3),
(2, 28, 4),
(3, 28, 4),
(4, 28, 4),
(5, 28, 3),
(6, 28, 4),
(7, 28, 4),
(8, 28, 3),
(9, 28, 2),
(1, 29, 2),
(2, 29, 3),
(3, 29, 2),
(4, 29, 2),
(5, 29, 3),
(6, 29, 3),
(7, 29, 3),
(8, 29, 2),
(9, 29, 4),
(1, 30, 2),
(2, 30, 3),
(3, 30, 3),
(4, 30, 3),
(5, 30, 3),
(6, 30, 3),
(7, 30, 3),
(8, 30, 3),
(9, 30, 3),
(1, 31, 2),
(2, 31, -1),
(3, 31, -1),
(4, 31, -1),
(5, 31, -1),
(6, 31, -1),
(7, 31, -1),
(8, 31, -1),
(9, 31, -1),
(10, 1, 3),
(10, 2, 2),
(10, 3, 3),
(10, 4, 3),
(10, 5, 3),
(10, 6, 3),
(10, 7, 1),
(10, 8, 1),
(10, 9, 0),
(10, 10, 3),
(10, 11, 2),
(10, 12, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `login`
--
ALTER TABLE `login`
 ADD PRIMARY KEY (`user_id`), ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
 ADD PRIMARY KEY (`question_id`), ADD KEY `question_id` (`question_id`);

--
-- Indexes for table `student_questions`
--
ALTER TABLE `student_questions`
 ADD KEY `user_id` (`user_id`), ADD KEY `question_id` (`question_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
MODIFY `question_id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=32;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
