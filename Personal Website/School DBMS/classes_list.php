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
        <form action="classes_list.php" method="post">
			<fieldset>
				<legend>INSERT</legend>
				<p><label class="title" for="idnumber">Course ID:</label>
					<input type="text" name="idnumber" id="idnumber" required="required"><br />
					<label class="title" for="cname">Course Name:</label>
					<input type="text" name="cname" id="cname" required="required"><br />
					<label class="title" for="studentID">Student ID:</label>
					<input type="text" name="studentID" id="studentID" required="required"><br />
					<label class="title" for="participation">Participation:</label>
					<input type="text" name="participation" id="participation" required="required"><br />
					<input type="submit" name="add" value="INSERT" />
        </form>
				</div>

					<div id="update">
            <form action="classes_list.php" method="post">
					<fieldset>
						<legend>UPDATE</legend>
						<p><label class="title" for="idnumber">Course ID:</label>
    					<input type="text" name="idnumber" id="idnumber" required="required"><br />
    					<label class="title" for="cname">Course Name:</label>
    					<input type="text" name="cname" id="cname" required="required"><br />
    					<label class="title" for="studentID">Student ID:</label>
    					<input type="text" name="studentID" id="studentID" required="required"><br />
							<label class="title" for="participation">Participation:</label>
							<input type="text" name="participation" id="participation" required="required"><br />
							<input type="submit" name="edit" value="UPDATE" />
            </form>
						</div>

						<div id="delete">
              <form action="classes_list.php" method="post">
						<fieldset>
							<!-- Delete based on primary key -->
							<legend>Delete</legend>
							<p><label class="title" for="idnumber">Course ID:</label>
								<input type="text" name="idnumber" id="idnumber" required="required"><br />
								<input type="submit" name = "delete" value="DELETE" />
              </form>
							</div>
		</div>

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

if (isset($_POST["add"])){

$courseID = $_POST["idnumber"];
$cname = $_POST["cname"];
$studentID = $_POST["studentID"];
$participation = $_POST["participation"];

$query = "INSERT INTO class (courseID, courseName, studentID, participation)
 VALUES ('$courseID', '$cname', '$studentID', '$participation')";


if (mysql_query($query, $connection)) {
  echo "New record created successfully";
} else {
   showerror();
}
}

elseif (isset($_POST["edit"])) {

  $courseID = $_POST["idnumber"];
  $cname = $_POST["cname"];
  $studentID = $_POST["studentID"];

$query = "UPDATE class SET courseName='$cname', studentID='$studentID', participation='$participation' WHERE courseID='$courseID'";

if (mysql_query($query, $connection)) {
} else {
 showerror();
}
}
elseif (isset($_POST["delete"])) {

$courseID = $_POST["idnumber"];

$query = "DELETE FROM class WHERE courseID=$courseID";

if (mysql_query($query, $connection)) {
} else {
 showerror();
}
}

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
