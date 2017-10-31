<!DOCTYPE html>
<html>
	<head>
  	<link href="pagestyle.css" type="text/css" rel="stylesheet" />
		<meta charset="utf-8">
		<title>Student Privileges</title>
	</head>

	<body>
    <?php
    if(!(isset($_POST['selectTable']))){
      include 'classes_students.php';
    }
		elseif($_POST['selectTable'] == "Classes"){
			include 'classes_students.php';
		}
		elseif($_POST['selectTable'] == "Attendance"){
			include 'attendance_students.php';
		}
		elseif($_POST['selectTable'] == "Grades"){
			include 'grades_students.php';
		}
		elseif($_POST['selectTable'] == "Parents"){
			include 'parents_students.php';
		}
		elseif($_POST['selectTable'] == "Violations"){
			include 'violations_students.php';
		}
		else{
			include 'classes_students.php';
		}
		 ?>
	</body>
</div>
</html>
