<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>List of Students</title>
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
  <form action="hire.php" method="post">
		Employee's Department: <select name="dept">
		<option value="1">Math</option>
		<option value="2">Science</option>
		<option value="3">English</option>
    <option value="4">Literature</option>
	</select>
    <br/>
    First Name:<input type="text" name="fname" id="fname" required><br/>
    Last Name:<input type="text" name="lname" id="lname" required><br/>
		<input type="submit" />
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

  $year = $_POST["year"];
  $fname = $_POST["fname"];
  $lname = $_POST["lname"];

  $query = "INSERT INTO employees (id, fname, lname, year)
  VALUES (NULL, '$fname', '$lname', '$year')";


  if (mysql_query($query, $connection)) {
      echo "New record created successfully";
  } else {
      showerror();
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
