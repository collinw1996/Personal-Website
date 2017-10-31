<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>All Foods</title>
    <link rel="stylesheet" type ="text/css" href="application.css">
</head>
<body>
<header>
<?php
echo "It works!"
 ?>
    <h1>Favorite Foods</h1>
    <nav>
        <ul>
            <li><a href="index.html">Home</a></li>
            <li><a href="recipes.html">Recipes</a></li>
            <li><a href="resources.html">Resources</a></li>
            <li><a href="sign_up.html">Sign up</a></li>
        </ul>
    </nav>
</header>
<body>
 <div id="main">
 <table border=1>
 <tr><th>ID</th><th>Username</th><th>Email</th><th>Password</th></tr>
 <?php
echo "Hello how are you!";

 include 'db.inc.php';
 // Connect to MySQL DBMS
 if (!($connection = @ mysql_connect($hostName, $username,
   $password)))
   showerror();
 // Use the foods database
 if (!mysql_select_db($databaseName, $connection))
   showerror();



// Create SQL statement
 $query = "SELECT * FROM users";
 // Execute SQL statement
 if (!($result = @ mysql_query ($query, $connection)))
   showerror();
 // Display results
 while ($row = @ mysql_fetch_array($result))
   echo "<tr><td>{$row["id"]}</td>
 <td>{$row["username"]}</td>
 <td>{$row["email"]}</td>
 <td>{$row["password"]}</td></tr>";
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
