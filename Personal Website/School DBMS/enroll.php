<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>List of Students</title>
    <link href="pagestyle.css" type="text/css" rel="stylesheet" />
    <link rel="stylesheet" type ="text/css" href="application.css">
</head>
<body>
<header>
    <h1>Students</h1>
    <nav>
        <ul>
          <li><a href="index.html">Home</a></li>
          <li><a href="enroll.html">Enroll</a></li>
          <li><a href="hire.html">Hire</a></li>
          <li><a href="sign_up.html">Sign up</a></li>
        </ul>
    </nav>
</header>
<body>
  <form action="enroll.php" method="post">
<fieldset>
  <legend>INSERT</legend>
  <p>
    ID:<input type="text" name="idnumber" id="idnumber" required="required"><br />
    First Name:<input type="text" name="fname" id="fname" required="required"><br />
    Middle Initial:<input type="text" name="mi" id="mi" required="required"><br />
    Last Name:<input type="text" name="lname" id="lname" required="required"><br />
    Gender:<input type="text" name="gender" id="gender" required="required"><br />
    Email Address:<input type="text" name="email" id="email" required="required"><br />
    Birth Date:<input type="date" name="bdate" id="bdate" required="required"><br />
    Parent Phone Number:<input type="text" name="parentphone" id="parentphone" required="required"><br />
    Address:<input type="text" name="address" id="address" required="required"><br />
    Username:<input type="text" name="username" id="username" required="required"><br />
    Password:<input type="password" name="password" id="password"><br />
    <input type="submit" name="add" value="INSERT" />
  </form>
  </div>

  <form action="enroll.php" method="post">
    <fieldset>
      <legend>Add a Recipe</legend>
    <br/>
    ID:<input type="text" name="idnumber" id="idnumber" required="required"><br />
    First Name:<input type="text" name="fname" id="fname" required="required"><br />
    Middle Initial:<input type="text" name="mi" id="mi" required="required"><br />
    Last Name:<input type="text" name="lname" id="lname" required="required"><br />
    Gender:<input type="text" name="gender" id="gender" required="required"><br />
    Email Address:<input type="text" name="email" id="email" required="required"><br />
    Birth Date:<input type="date" name="bdate" id="bdate" required="required"><br />
    Parent Phone Number:<input type="text" name="parentphone" id="parentphone" required="required"><br />
    Address:<input type="text" name="address" id="address" required="required"><br />
    Username:<input type="text" name="username" id="username" required="required"><br />
    Password:<input type="password" name="password" id="password"><br />
		<input type="submit" name="edit" value="update"/>
		</fieldset>
	</form>

  <form action="enroll.php" method="post">
    <fieldset>
    ID:<input type="number" name="idnumber" id="idnumber" required><br/>
    <input type="submit" name="delete" value="gone"/>
    </fieldset>
  </form>

<div id="main">
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

  $studentID = $_POST["idnumber"];
  $fname = $_POST["fname"];
  $mi = $_POST["mi"];
  $lname = $_POST["lname"];
  $gender = $_POST["gender"];
  $email = $_POST["email"];
  $bdate = $_POST["bdate"];
  $parentPhone = $_POST["parentphone"];
  $address = $_POST["address"];
  $username = $_POST["username"];
  $password = $_POST["password"];

  $query = "INSERT INTO student (studentID, Fname, MInit, Lname, Gender, Bdate, parentPhone, Address, Email, Username, Password)
   VALUES ('$studentID', '$fname', '$mi', '$lname', '$gender', '$bdate', '$parentPhone', '$address', '$email', '$username', '$password')";


  if (mysql_query($query, $connection)) {
    echo "New record created successfully";
  } else {
     showerror();
  }
  }

  elseif (isset($_POST["edit"])) {

    $studentID = $_POST["idnumber"];
    $fname = $_POST["fname"];
    $mi = $_POST["mi"];
    $lname = $_POST["lname"];
    $gender = $_POST["gender"];
    $email = $_POST["email"];
    $bdate = $_POST["bdate"];
    $parentPhone = $_POST["parentphone"];
    $address = $_POST["address"];
    $username = $_POST["username"];
    $password = $_POST["password"];

  $query = "UPDATE student SET Fname='$fname', MInit='$mi', Lname='$lname', Gender='$gender', Bdate='$bdate', parentPhone='$parentPhone',
  Address='$address', Email='$email', Username='$username', Password='$password' WHERE studentID='$studentID'";

  if (mysql_query($query, $connection)) {
  } else {
   showerror();
  }
  }
  elseif (isset($_POST["delete"])) {

  $studentID = $_POST["idnumber"];

  $query = "DELETE FROM student WHERE studentID=$studentID";

  if (mysql_query($query, $connection)) {
  } else {
   showerror();
  }
  }

  echo "<table border=1>
  <tr>
  <th>Student ID</th>
  <th>First Name</th>
  <th>Middle Initial</th>
  <th>Last Name</th>
  <th>Gender</th>
  <th>Birthdate</th>
  <th>Parent Phone</th>
  <th>Address</th>
  <th>Email</th>
  <th>Username</th>
  <th>Password</th>
  </tr>";

      $query = "SELECT * FROM student";
      // Execute SQL statement
      if (!($result = @ mysql_query ($query, $connection)))
        showerror();
      // Display results
      while ($row = @ mysql_fetch_array($result))
        echo "<tr>
      <td>{$row["studentID"]}</td>
      <td>{$row["Fname"]}</td>
      <td>{$row["MInit"]}</td>
      <td>{$row["Lname"]}</td>
      <td>{$row["Gender"]}</td>
      <td>{$row["Bdate"]}</td>
      <td>{$row["parentPhone"]}</td>
      <td>{$row["Address"]}</td>
      <td>{$row["Email"]}</td>
      <td>{$row["Username"]}</td>
      <td>{$row["Password"]}</td>
      </tr>";
    ?>
 </div>
 <hr/>
 <footer>
   <p><a href="index.html">Home</a> | <a href="recipes.html">Recipes</a> | <a href="resources.html">Resources</a></p>
   <p><div id="em">Copyright &copy; 2016 Favorite Foods</div></p>
 </footer>
 </body>
</html>
