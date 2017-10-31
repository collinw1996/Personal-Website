<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Recipe</title>
    <link rel="stylesheet" type ="text/css" href="application.css">
</head>
<body>
<header>
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
<?php
include 'db.inc.php';
// Connect to MySQL DBMS
if (!($connection = @ mysql_connect($hostName, $username,
  $password)))
  showerror();
// Use the foods database
if (!mysql_select_db($databaseName, $connection))
  showerror();


$type = $_POST["type"];
$recipe = $_POST["recipe"];
$rating = $_POST["rating"];
$price = $_POST["price"];

$query = "INSERT INTO foods (id, type, recipe, rating, price)
VALUES (Null, '$type', '$recipe', '$rating', '$price')";


if (mysql_query($query, $connection)) {
    echo "New record created successfully";
} else {
    showerror();
}
?>
<hr/>
<footer>
  <p><a href="index.html">Home</a> | <a href="recipes.html">Recipes</a> | <a href="resources.html">Resources</a></p>
  <p><div id="em">Copyright &copy; 2016 Favorite Foods</div></p>
</footer>
</body>
</html>
