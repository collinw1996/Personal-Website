<!DOCTYPE html>
<html>
	<head>
  	<link href="pagestyle.css" type="text/css" rel="stylesheet" />
		<meta charset="utf-8">
		<title>User</title>
	</head>
	<body>
    <?php
		if($_POST['privileges'] == "student"){
      include 'students_home.php';
    }
    else{
      include 'admins_home.php';
    }
		 ?>
	</body>
</div>
</html>
