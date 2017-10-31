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
        <form action="teachers_list.php" method="post">
			<fieldset>
				<legend>INSERT</legend>
				<p>
					<label class="title" for="fname">First Name:</label>
					<input type="text" name="fname" id="fname" required="required"><br />
					<label class="title" for="lname">Last Name:</label>
					<input type="text" name="lname" id="lname" required="required"><br />
          <label class="title" for="ssn">SSN:</label>
  				<input type="text" name="ssn" id="ssn" required="required"><br />
					<label class="title" for="gender">Gender:</label>
					<input type="text" name="gender" id="gender" required="required"><br />
					<label class="title" for="email">Email Address:</label>
					<input type="text" name="email" id="email" required="required"><br />
					<label class="title" for="bdate">Birth Date:</label><br />
					<input type="date" name="bdate" id="bdate" required="required"><br />
					<label class="title" for="parentphone">Phone Number:</label>
					<input type="text" name="phone" id="phone" required="required"><br />
					<label class="title" for="fname">Address:</label>
					<input type="text" name="address" id="address" required="required"><br />
          <label class="title" for="salary">Salary:</label>
  				<input type="text" name="salary" id="salary" required="required"><br />
          <label class="title" for="courseid">Course ID:</label>
    			<input type="text" name="courseid" id="courseid" required="required"><br />
					<label class="title" for="username">Username:</label>
					<input type="text" name="username" id="username" required="required"><br />
					<label class="title" for="password" required="required">Password:</label>
					<input type="password" name="password" id="password"><br />
					<input type="submit" name="add" value="INSERT" />
        </form>
				</div>

					<div id="update">
            <form action="teachers_list.php" method="post">
					<fieldset>
						<legend>UPDATE</legend>
						<p>
						<label class="title" for="ssn">SSN:</label>
	    			<input type="text" name="ssn" id="ssn" required="required"><br />
						<label class="title" for="fname">First Name:</label>
  					<input type="text" name="fname" id="fname" required="required"><br />
  					<label class="title" for="lname">Last Name:</label>
  					<input type="text" name="lname" id="lname" required="required"><br />
  					<label class="title" for="gender">Gender:</label>
  					<input type="text" name="gender" id="gender" required="required"><br />
  					<label class="title" for="email">Email Address:</label>
  					<input type="text" name="email" id="email" required="required"><br />
  					<label class="title" for="bdate">Birth Date:</label><br />
  					<input type="date" name="bdate" id="bdate" required="required"><br />
  					<label class="title" for="phone">Phone Number:</label>
  					<input type="text" name="phone" id="phone" required="required"><br />
  					<label class="title" for="address">Address:</label>
  					<input type="text" name="address" id="address" required="required"><br />
            <label class="title" for="salary">Salary:</label>
    				<input type="text" name="salary" id="salary" required="required"><br />
            <label class="title" for="courseid">Course ID:</label>
      			<input type="text" name="courseid" id="courseid" required="required"><br />
  					<label class="title" for="username">Username:</label>
  					<input type="text" name="username" id="username" required="required"><br />
  					<label class="title" for="password" required="required">Password:</label>
  					<input type="password" name="password" id="password"><br />
							<input type="submit" name="edit" value="UPDATE" />
            </form>
						</div>

						<div id="delete">
              <form action="teachers_list.php" method="post">
						<fieldset>
							<!-- Delete based on primary key -->
							<legend>Delete</legend>
							<p><label class="title" for="ssn">SSN:</label>
								<input type="text" name="ssn" id="ssn" required="required"><br />
								<input type="submit" name = "delete" value="DELETE" />
              </form>
							</div>
		</div>

    <div id="main">
     <table border=1>
       <tr>
       <th>First Name</th>
       <th>Last Name</th>
			 <th>SSN</th>
       <th>Gender</th>
       <th>Birthdate</th>
       <th>Phone</th>
       <th>Address</th>
       <th>Email</th>
			 <th>Salary</th>
       <th>Username</th>
       <th>Password</th>
			 <th>Course ID</th>
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

	$fname = $_POST["fname"];
	$lname = $_POST["lname"];
	$ssn = $_POST["ssn"];
	$gender = $_POST["gender"];
	$bdate = $_POST["bdate"];
	$phone = $_POST["phone"];
	$address = $_POST["address"];
	$email = $_POST["email"];
	$salary = $_POST["salary"];
	$username = $_POST["username"];
	$password = $_POST["password"];
	$courseID = $_POST["courseid"];

$query = "INSERT INTO teacher (Fname, Lname, Ssn, Gender, Bdate, Phone, Address, Email, Salary, Username, Password, courseID)
 VALUES ('$fname', '$lname', '$ssn', '$gender', '$bdate', '$phone', '$address', '$email', '$salary', '$username', '$password', '$courseID')";


if (mysql_query($query, $connection)) {
  echo "New record created successfully";
} else {
   showerror();
}
}

elseif (isset($_POST["edit"])) {

	$fname = $_POST["fname"];
	$lname = $_POST["lname"];
	$ssn = $_POST["ssn"];
	$gender = $_POST["gender"];
	$bdate = $_POST["bdate"];
	$phone = $_POST["phone"];
	$address = $_POST["address"];
	$email = $_POST["email"];
	$salary = $_POST["salary"];
	$username = $_POST["username"];
	$password = $_POST["password"];
	$courseID = $_POST["courseid"];

$query = "UPDATE teacher SET Fname='$fname', Lname='$lname', Gender='$gender', Bdate='$bdate', Phone='$phone',
Address='$address', Email='$email', Salary='$salary', Username='$username', Password='$password', courseID='$courseID' WHERE Ssn='$ssn'";

if (mysql_query($query, $connection)) {
} else {
 showerror();
}
}
elseif (isset($_POST["delete"])) {

$ssn = $_POST["ssn"];

$query = "DELETE FROM teacher WHERE Ssn=$ssn";

if (mysql_query($query, $connection)) {
} else {
 showerror();
}
}

    $query = "SELECT * FROM teacher";
    // Execute SQL statement
    if (!($result = @ mysql_query ($query, $connection)))
      showerror();
    // Display results
    while ($row = @ mysql_fetch_array($result))
      echo "<tr>
    <td>{$row["Fname"]}</td>
    <td>{$row["Lname"]}</td>
		<td>{$row["Ssn"]}</td>
    <td>{$row["Gender"]}</td>
    <td>{$row["Bdate"]}</td>
    <td>{$row["Phone"]}</td>
    <td>{$row["Address"]}</td>
    <td>{$row["Email"]}</td>
		<td>{$row["Salary"]}</td>
    <td>{$row["Username"]}</td>
    <td>{$row["Password"]}</td>
		<td>{$row["courseID"]}</td>
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
