<!DOCTYPE html>
<html>
	<head>
  	<link href="pagestyle.css" type="text/css" rel="stylesheet" />
		<meta charset="utf-8">
		<title>Admin Privileges</title>
	</head>

	<body>
		<h1>Administration</h1>
		<p>Please choose a table to view<br /> Once selected, you may insert, delete, or modify data</p>
		<div id="controlBox">
			<div id="insert">
        <form action="grades_list.php" method="post">
			<fieldset>
				<legend>INSERT</legend>
				<p>
					<label class="title" for="cgrade">Course Grade:</label>
					<input type="text" name="cgrade" id="cgrade" required="required"><br />
					<label class="title" for="courseID">Course ID:</label>
					<input type="text" name="courseID" id="courseID" required="required"><br />
          <label class="title" for="studentID">Student ID:</label>
  				<input type="text" name="studentID" id="studentID" required="required"><br />
					<input type="submit" name="add" value="INSERT" />
        </form>
				</div>

					<div id="update">
            <form action="grades_list.php" method="post">
					<fieldset>
						<legend>UPDATE</legend>
						<p>
							<label class="title" for="cgrade">Course Grade:</label>
							<input type="text" name="cgrade" id="cgrade" required="required"><br />
							<label class="title" for="courseID">Course ID:</label>
							<input type="text" name="courseID" id="courseID" required="required"><br />
		          <label class="title" for="studentID">Student ID:</label>
		  				<input type="text" name="studentID" id="studentID" required="required"><br />
							<input type="submit" name="edit" value="UPDATE" />
            </form>
						</div>

						<div id="delete">
              <form action="grades_list.php" method="post">
						<fieldset>
							<!-- Delete based on primary key -->
							<legend>Delete</legend>
							<p><label class="title" for="courseID">Course ID:</label>
								<input type="text" name="courseID" id="courseID" required="required"><br />
								<input type="submit" name = "delete" value="DELETE" />
              </form>
							</div>
		</div>

    <div id="main">
     <table border=1>
       <tr>
       <th>Course Grade</th>
       <th>Course ID</th>
			 <th>Student ID</th>
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

if (isset($_POST["add"])){

	$cgrade = $_POST["cgrade"];
	$courseID = $_POST["courseID"];
	$studentID = $_POST["studentID"];

$query = "INSERT INTO grades (courseG, courseID, studentID)
 VALUES ('$cgrade', '$courseID', '$studentID')";


if (mysql_query($query, $connection)) {
  echo "New record created successfully";
} else {
   showerror();
}
}

elseif (isset($_POST["edit"])) {

	$cgrade = $_POST["cgrade"];
	$courseID = $_POST["courseID"];
	$studentID = $_POST["studentID"];

$query = "UPDATE grades SET courseG='$cgrade', studentID='$studentID' WHERE courseID='$courseID'";

if (mysql_query($query, $connection)) {
} else {
 showerror();
}
}
elseif (isset($_POST["delete"])) {

$courseID = $_POST["courseID"];

$query = "DELETE FROM grades WHERE courseID=$courseID";

if (mysql_query($query, $connection)) {
} else {
 showerror();
}
}

    $query = "SELECT * FROM grades";
    // Execute SQL statement
    if (!($result = @ mysql_query ($query, $connection)))
      showerror();
    // Display results
    while ($row = @ mysql_fetch_array($result))
      echo "<tr>
    <td>{$row["courseG"]}</td>
    <td>{$row["courseID"]}</td>
		<td>{$row["studentID"]}</td>
    </tr>";
  ?>
</table>
<form action="admins_home.php" method="post">
<p><label class="title" for="selectTable"> Select Table:</label>
<select name="selectTable" id="selectTable">
	<option value="" disabled selected>Select an Option</option>
  <option value="Students">Students</option>
  <option value="Teachers">Teachers</option>
  <option value="Admins">Admins</option>
  <option value="Staff">Staff</option>
  <option value="Departments">Departments</option>
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
