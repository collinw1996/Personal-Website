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
        <form action="violations_list.php" method="post">
			<fieldset>
				<legend>INSERT</legend>
				<p>
					<label class="title" for="vdate">Violation Date:</label><br />
					<input type="date" name="vdate" id="vdate" required="required"><br />
					<label class="title" for="vtype">Violation Type:</label>
					<input type="text" name="vtype" id="vtype" required="required"><br />
          <label class="title" for="studentID">Student ID:</label>
  				<input type="text" name="studentID" id="studentID" required="required"><br />
					<input type="submit" name="add" value="INSERT" />
        </form>
				</div>

					<div id="update">
            <form action="violations_list.php" method="post">
					<fieldset>
						<legend>UPDATE</legend>
						<p>
							<label class="title" for="vdate">Violation Date:</label><br />
							<input type="date" name="vdate" id="vdate" required="required"><br />
							<label class="title" for="vtype">Violation Type:</label>
							<input type="text" name="vtype" id="vtype" required="required"><br />
		          <label class="title" for="studentID">Student ID:</label>
		  				<input type="text" name="studentID" id="studentID" required="required"><br />
							<input type="submit" name="edit" value="UPDATE" />
            </form>
						</div>

						<div id="delete">
              <form action="violations_list.php" method="post">
						<fieldset>
							<!-- Delete based on primary key -->
							<legend>Delete</legend>
							<p><label class="title" for="studentID">Student ID:</label>
								<input type="text" name="studentID" id="studentID" required="required"><br />
								<input type="submit" name = "delete" value="DELETE" />
              </form>
							</div>
		</div>

    <div id="main">
     <table border=1>
       <tr>
       <th>Violation Date</th>
       <th>Violation Type</th>
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

	$vdate = $_POST["vdate"];
	$vtype = $_POST["vtype"];
	$studentID = $_POST["studentID"];

$query = "INSERT INTO violations (vioDate, vioType, studentID)
 VALUES ('$vdate', '$vtype', '$studentID')";


if (mysql_query($query, $connection)) {
  echo "New record created successfully";
} else {
   showerror();
}
}

elseif (isset($_POST["edit"])) {

	$vdate = $_POST["vdate"];
	$vtype = $_POST["vtype"];
	$studentID = $_POST["studentID"];

$query = "UPDATE violations SET vioDate='$vdate', vioType='$vtype' WHERE studentID='$studentID'";

if (mysql_query($query, $connection)) {
} else {
 showerror();
}
}
elseif (isset($_POST["delete"])) {

$studentID = $_POST["studentID"];

$query = "DELETE FROM violations WHERE studentID=$studentID";

if (mysql_query($query, $connection)) {
} else {
 showerror();
}
}

    $query = "SELECT * FROM violations";
    // Execute SQL statement
    if (!($result = @ mysql_query ($query, $connection)))
      showerror();
    // Display results
    while ($row = @ mysql_fetch_array($result))
      echo "<tr>
    <td>{$row["vioDate"]}</td>
    <td>{$row["vioType"]}</td>
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
