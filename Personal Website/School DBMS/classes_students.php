<!DOCTYPE html>
<html>
	<head>
  	<link href="pagestyle.css" type="text/css" rel="stylesheet" />
		<meta charset="utf-8">
		<title>Student Privileges</title>
	</head>

	<body>
    <h1>Students</h1>
    <p>Please choose a table to view<br /></p>
     <div id="main">
     <table border=1>
       <tr>
       <th>Course ID</th>
       <th>Course Name</th>
       <th>Student ID</th>
       <th>Participation</th>
       </tr>
<?php
include 'db.inc.php';
// Connect to MySQL DBMS
if (!($connection = @ mysql_connect($hostName, $username,
  $password)))
  showerror();
// Use the student database
if (!mysql_select_db($databaseName, $connection))
  showerror();

    $query = "SELECT * FROM class";
    // Execute SQL statement
    if (!($result = @ mysql_query ($query, $connection)))
      showerror();
    // Display results
    while ($row = @ mysql_fetch_array($result))
      echo "<tr>
    <td>{$row["courseID"]}</td>
    <td>{$row["courseName"]}</td>
    <td>{$row["studentID"]}</td>
    <td>{$row["participation"]}</td>
    </tr>";
  ?>
</table>
<form action="students_home.php" method="post">
<p><label class="title" for="selectTable"> Select Table:</label>
<select name="selectTable" id="selectTable">
	<option value="" disabled selected>Select an Option</option>
	<option value="Classes">Classes</option>
	<option value="Attendance">Attendance</option>
	<option value="Grades">Grades</option>
	<option value="Parents">Parents</option>
	<option value="Violations">Violations</option>
</select></p>
<div class="submit">
 <input type="submit" value="View" />
</div>
</form>
 </div>
 </body>
</html>
