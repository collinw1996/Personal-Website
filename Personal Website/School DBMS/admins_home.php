<!DOCTYPE html>
<html>
	<head>
  	<link href="pagestyle.css" type="text/css" rel="stylesheet" />
		<meta charset="utf-8">
		<title>Admin Privileges</title>
	</head>

	<body>
		<?php
    if(!(isset($_POST['selectTable']))){
      include 'students_list.php';
    }
    elseif($_POST['selectTable'] == "Students"){
			include 'students_list.php';
		}
		elseif($_POST['selectTable'] == "Teachers"){
			include 'teachers_list.php';
		}
		elseif($_POST['selectTable'] == "Admins"){
			include 'admins_list.php';
		}
		elseif($_POST['selectTable'] == "Staff"){
			include 'staff_list.php';
		}
		elseif($_POST['selectTable'] == "Departments"){
			include 'department_list.php';
		}
		elseif($_POST['selectTable'] == "Classes"){
			include 'classes_list.php';
		}
		elseif($_POST['selectTable'] == "Attendance"){
			include 'attendance_list.php';
		}
		elseif($_POST['selectTable'] == "Grades"){
			include 'grades_list.php';
		}
		elseif($_POST['selectTable'] == "Parents"){
			include 'parents_list.php';
		}
		elseif($_POST['selectTable'] == "Violations"){
			include 'violations_list.php';
		}
		else{
			include 'students_list.php';
		}
		 ?>
	</body>
</div>
</html>
