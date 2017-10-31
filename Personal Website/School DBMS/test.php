<!DOCTYPE html>
<html>
	<head>
  	<link href="pagestyle.css" type="text/css" rel="stylesheet" />
		<meta charset="utf-8">
		<title>Admin Privileges</title>
	</head>

	<body>
		<?php
		if($_POST['selectTable'] == "Students"){
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
		 <form action="test.php" method="post">
		<p><label class="title" for="selectTable"> Select Table:</label>
		<select name="selectTable" id="selectTable">
			<option value="" disabled selected>Select an Option</option>
			<option value="Students">Students</option>
			<option value="Teachers">Teachers</option>
			<option value="Admins">Admins</option>
			<option value="Staff">Staff</option>
			<option value="Departments">Departments</option>
			<option value="Classes">Classes</option>
			<option value="Attendance">Attendance</option>
			<option value="Grades">Grades</option>
			<option value="Parents">Parents</option>
			<option value="Violations">Violations</option>
		</select></p>
		<div class="submit">
			<input type="submit" value="View" />
		</div>
		</form>
	</body>
</div>
</html>
