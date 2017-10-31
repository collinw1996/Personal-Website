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
        <form action="department_list.php" method="post">
			<fieldset>
				<legend>INSERT</legend>
				<p>
					<label class="title" for="schoolID">School ID:</label>
					<input type="text" name="schoolID" id="schoolID" required="required"><br />
					<label class="title" for="courseID">Course ID:</label>
					<input type="text" name="courseID" id="courseID" required="required"><br />
          <label class="title" for="ssn">SSN:</label>
  				<input type="text" name="ssn" id="ssn" required="required"><br />
					<label class="title" for="id">ID:</label>
					<input type="text" name="id" id="id" required="required"><br />
					<label class="title" for="essn">Essn:</label>
					<input type="text" name="essn" id="essn" required="required"><br />
					<input type="submit" name="add" value="INSERT" />
        </form>
				</div>

					<div id="update">
            <form action="department_list.php" method="post">
					<fieldset>
						<legend>UPDATE</legend>
						<p>
              <label class="title" for="schoolID">School ID:</label>
    					<input type="text" name="schoolID" id="schoolID" required="required"><br />
    					<label class="title" for="courseID">Course ID:</label>
    					<input type="text" name="courseID" id="courseID" required="required"><br />
              <label class="title" for="ssn">SSN:</label>
      				<input type="text" name="ssn" id="ssn" required="required"><br />
    					<label class="title" for="id">ID:</label>
    					<input type="text" name="id" id="id" required="required"><br />
    					<label class="title" for="essn">Essn:</label>
    					<input type="text" name="essn" id="essn" required="required"><br />
							<input type="submit" name="edit" value="UPDATE" />
            </form>
						</div>

						<div id="delete">
              <form action="department_list.php" method="post">
						<fieldset>
							<!-- Delete based on primary key -->
							<legend>Delete</legend>
							<p><label class="title" for="schoolID">School ID:</label>
								<input type="text" name="schoolID" id="schoolID" required="required"><br />
								<input type="submit" name = "delete" value="DELETE" />
              </form>
							</div>
		</div>

    <div id="main">
     <table border=1>
       <tr>
       <th>School ID</th>
       <th>Course ID</th>
			 <th>SSN</th>
       <th>ID</th>
       <th>ESSN</th>
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

	$schoolID = $_POST["schoolID"];
	$courseID = $_POST["courseID"];
	$ssn = $_POST["ssn"];
	$id = $_POST["id"];
	$essn = $_POST["essn"];

$query = "INSERT INTO schooldept (schoolID, courseID, Ssn, ID, Essn)
 VALUES ('$schoolID', '$courseID', '$ssn', '$id', '$essn')";


if (mysql_query($query, $connection)) {
  echo "New record created successfully";
} else {
   showerror();
}
}

elseif (isset($_POST["edit"])) {

  $schoolID = $_POST["schoolID"];
	$courseID = $_POST["courseID"];
	$ssn = $_POST["ssn"];
	$id = $_POST["id"];
	$essn = $_POST["essn"];

$query = "UPDATE schooldept SET courseID='$courseID', Ssn='$ssn', ID='$id', Essn='$essn'
WHERE schoolID='$schoolID'";

if (mysql_query($query, $connection)) {
} else {
 showerror();
}
}
elseif (isset($_POST["delete"])) {

$schoolID = $_POST["schoolID"];

$query = "DELETE FROM schooldept WHERE schoolID=$schoolID";

if (mysql_query($query, $connection)) {
} else {
 showerror();
}
}

    $query = "SELECT * FROM schooldept";
    // Execute SQL statement
    if (!($result = @ mysql_query ($query, $connection)))
      showerror();
    // Display results
    while ($row = @ mysql_fetch_array($result))
      echo "<tr>
    <td>{$row["schoolID"]}</td>
    <td>{$row["courseID"]}</td>
		<td>{$row["Ssn"]}</td>
    <td>{$row["ID"]}</td>
    <td>{$row["Essn"]}</td>
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
