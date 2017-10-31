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
      <legend>Add a Recipe</legend>
		Select recipe by type: <select name="year">
		    <option value="1">Freshman</option>
		    <option value="2">Sophmore</option>
		    <option value="3">Junior</option>
        <option value="4">Senior</option>
	  </select>
    <br/>
    First Name:<input type="text" name="fname" id="fname" required><br/>
    Last Name:<input type="text" name="lname" id="lname" required><br/>
		<input type="submit" name="add" value="insert"/>
		</fieldset>
	</form>

  <form action="enroll.php" method="post">
    <fieldset>
      <legend>Add a Recipe</legend>
		Select recipe by type: <select name="year">
		    <option value="1">Freshman</option>
		    <option value="2">Sophmore</option>
		    <option value="3">Junior</option>
        <option value="4">Senior</option>
	  </select>
    <br/>
    First Name:<input type="text" name="fname" id="fname" required><br/>
    Last Name:<input type="text" name="lname" id="lname" required><br/>
    ID:<input type="number" name="id" id="id" required><br/>
		<input type="submit" name="edit" value="update"/>
		</fieldset>
	</form>

  <form action="enroll.php" method="post">
    <fieldset>
    ID:<input type="number" name="id" id="id" required><br/>
    <input type="submit" name="delete" value="gone"/>
    </fieldset>
  </form>

  <form action="enroll.php" method="post">
		Select recipe by type: <select name="year">
		<option value="1">Freshman</option>
		<option value="2">Sophmore</option>
		<option value="3">Junior</option>
    <option value="4">Senior</option>
	</select>
		<input type="submit" name="filter" value="filter"/>
		</fieldset>
	</form>

<div id="main">
  <?php
  include 'db.inc.php';
  // Connect to MySQL DBMS
  if (!($connection = @ mysql_connect($hostName, $username,
    $password)))
    showerror();
  // Use the foods database
  if (!mysql_select_db($databaseName, $connection))
    showerror();

  if (isset($_POST["add"])){
 $year = $_POST["year"];
 $fname = $_POST["fname"];
 $lname = $_POST["lname"];

 $query = "INSERT INTO students (id, fname, lname, year)
 VALUES (NULL, '$fname', '$lname', '$year')";


 if (mysql_query($query, $connection)) {
     echo "New record created successfully";
 } else {
     showerror();
 }
}

elseif (isset($_POST["edit"])) {

$number = $_POST["id"];
$year = $_POST["year"];
$fname = $_POST["fname"];
$lname = $_POST["lname"];

$query = "UPDATE students SET fname='$fname', lname='$lname', year='$year' WHERE id='$number'";

if (mysql_query($query, $connection)) {
   echo "Recipe updated successfully";
} else {
   showerror();
}
}
elseif (isset($_POST["delete"])) {

$number = $_POST["id"];

$query = "DELETE FROM students WHERE id=$number";

if (mysql_query($query, $connection)) {
   echo "Recipe updated successfully";
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

    if(!isset($_POST["filter"])){
      $query = "SELECT * FROM students";

      if (!($result = @ mysql_query ($query, $connection)))
        showerror();

      while ($row = @ mysql_fetch_array($result))
   echo "<tr><td>{$row["id"]}</td>
   <td>{$row["fname"]}</td>
   <td>{$row["lname"]}</td>
   <td>{$row["year"]}</td></tr>";
    }

    if(isset($_POST["filter"])){

     $year = $_POST['year'];
     $query = "SELECT * FROM students WHERE year='$year'";

     if (!($result = @ mysql_query ($query, $connection)))
       showerror();

     while ($row = @ mysql_fetch_array($result))
  echo "<tr><td>{$row["id"]}</td>
  <td>{$row["fname"]}</td>
  <td>{$row["lname"]}</td>
  <td>{$row["year"]}</td></tr>";
   }
  ?>
 </div>
 <hr/>
 <footer>
   <p><a href="index.html">Home</a> | <a href="recipes.html">Recipes</a> | <a href="resources.html">Resources</a></p>
   <p><div id="em">Copyright &copy; 2016 Favorite Foods</div></p>
 </footer>
 </body>
</html>
