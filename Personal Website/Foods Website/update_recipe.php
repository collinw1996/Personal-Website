<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Recipe</title>
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

$number = $_POST["number"];
$type = $_POST["type"];
$recipe = $_POST["recipe"];
$rating = $_POST["rating"];
$price = $_POST["price"];

$query = "UPDATE foods SET type='$type', recipe='$recipe', rating='$rating', price='$price' WHERE id=$number";

if (mysql_query($query, $connection)) {
    echo "Recipe updated successfully";
} else {
    showerror();
}

mysqli_close($conn);
?>
<hr/>
<footer>
  <p><a href="index.html">Home</a> | <a href="recipes.html">Recipes</a> | <a href="resources.html">Resources</a></p>
  <p><div id="em">Copyright &copy; 2016 Favorite Foods</div></p>
</footer>
</body>
</html>
