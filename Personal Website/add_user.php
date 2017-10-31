<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Collin's World Contact</title>
    <link rel="shortcut icon" href="Favicon.png" type="image/x-icon">
    <link rel="icon" href="Favicon.png" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="application.css">
    <script type="text/javascript" src="application.js"></script>
</head>
<body>
  <header>
    <nav>
      <ul>
        <li id="name"><a href="index.html">Collin Woodruff</a></li>
        <li><a class="active" href="contact.html">Contact</a></li>
        <li><a href="projects.html">Projects</a></li>
        <li><a href="resume.html">Resume</a></li>
        <li><a href="about.html">About</a></li>
        <li><a href="index.html">Home</a></li>
      </ul>
    </nav>
  </header>
<article>
  <?php
  include 'db.inc.php';
  // Connect to MySQL DBMS
  if (!($connection = @ mysql_connect($hostName, $username,
    $password)))
    showerror();
  // Use the foods database
  if (!mysql_select_db($databaseName, $connection))
    showerror();

  $fname = $_POST["fname"];
  $lname = $_POST["lname"];
  $email = $_POST["email"];
  $message = $_POST["message"];
  $message = str_replace("'", "\'", $message);

  $query = "INSERT INTO users (id, fname, lname, email, message)
  VALUES (Null, '$fname', '$lname', '$email', '$message')";


  if (mysql_query($query, $connection)) {
      echo "Your message has been sent!";
  } else {
      showerror();
  }
  ?>
  <section id="contact" class="download">
      <h2>Contact Information:</h2>
      <p>Email: <br/>
      <a href="mailto:collin.woodruff@yahoo.com"> collin.woodruff@yahoo.com</a></p>
      <p>Phone Number: <br/>
      <a href= "tel:240-566-6486">240-566-6486</a></p>
      <p>Feel free to contact me at any time!</p>
  </section>
</article>

<footer>
<hr/>
<p><a href="index.html">Home</a> | <a href="about.html">About</a> | <a href="resume.html">Resume</a> | <a href="projects.html">Projects</a> | <a href="contact.html">Contact</a></p>
<p><em>Copyright &copy; 2017 Collin's World</em></p>
</footer>

</body>
</html>
