<?php
$con = mysqli_connect("localhost","root","","udemy");
if (isset($_POST['course_explore'])) {
    session_start();
    $name = mysql_real_escape_string($_POST['course_explore']);
    $sql="INSERT INTO search (name) VALUES('$name')";
    mysqli_query($db, $sql);
    $_SESSION['message'] = "your course is created";
    }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Created</title>
	<style type="text/css">
		div {
			background-color: rgb(0,200,0);
			box-shadow: 1px 1px 5px #888888;
			border-radius: 5px;
		}
	</style>
</head>
<body>
<h1>Home</h1>
<h4>Your Course is created</h4>
</body>
</html>