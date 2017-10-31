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
  <form action="students_list.php" method="post">
		Student's Year: <select name="year">
		<option value="1">Freshman</option>
		<option value="2">Sophmore</option>
		<option value="3">Junior</option>
    <option value="4">Senior</option>
	</select>
		<input type="submit" />
		</fieldset>
	</form>

  <div id="main">
   <table border=1>
   <tr><th>ID</th><th>First Name</th><th>Last Name</th><th>Year</th></tr>
   <?php
   include 'db.inc.php';
   // Connect to MySQL DBMS
   if (!($connection = @ mysql_connect($hostName, $username,
     $password)))
     showerror();
   // Use the foods database
   if (!mysql_select_db($databaseName, $connection))
     showerror();
  // Create SQL statement
   $query = "SELECT * FROM students";
   // Execute SQL statement
   if (!($result = @ mysql_query ($query, $connection)))
     showerror();
   // Display results
   while ($row = @ mysql_fetch_array($result))
   echo "<tr><td>{$row["id"]}</td>
   <td>{$row["fname"]}</td>
   <td>{$row["lname"]}</td>
   <td>{$row["year"]}</td></tr>";
   echo "</table>";
   ?>
   </table>
   </div>
 <hr/>
 <footer>
   <p><a href="index.html">Home</a> | <a href="recipes.html">Recipes</a> | <a href="resources.html">Resources</a></p>
   <p><div id="em">Copyright &copy; 2016 Favorite Foods</div></p>
 </footer>
 </body>
</html>
