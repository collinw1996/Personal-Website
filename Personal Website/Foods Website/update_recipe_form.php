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
  <div id="main">
  <table border=1>
  <tr><th>ID</th><th>Make</th><th>Model</th><th>Year</th>
  <th>Price</th></tr>
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
  $query = "SELECT * FROM foods";
  // Execute SQL statement
  if (!($result = @ mysql_query ($query, $connection)))
    showerror();
  // Display results
  while ($row = @ mysql_fetch_array($result))
    echo "<tr><td>{$row["id"]}</td>
  <td>{$row["type"]}</td>
  <td>{$row["recipe"]}</td>
  <td>{$row["rating"]}</td>
  <td>{$row["price"]}</td></tr>";
  ?>
  </table>
  </div>

  <form action="update_recipe.php" method="post">
    <fieldset>
      <legend>Update a Recipe</legend>
      Please input the id of the recipe you want to update:<input type="number" name="number" id="number" required><br/>
      Select recipe by type: <select name="type">
          <option value="Italian">Italian</option>
          <option value="Mexican">Mexican</option>
          <option value="American">American</option>
      </select>
      <br/>
      Recipe Name:<input type="text" name="recipe" id="recipe" required><br/>
      Rating:<input type="text" name="rating" id="rating" required><br/>
      Price:<input type="text" name="price" id="price" required><br/>
      <input type="submit" />
    </fieldset>
	</form>
  <hr/>
  <footer>
    <p><a href="index.html">Home</a> | <a href="recipes.html">Recipes</a> | <a href="resources.html">Resources</a></p>
    <p><div id="em">Copyright &copy; 2016 Favorite Foods</div></p>
  </footer>
</body>
</html>
