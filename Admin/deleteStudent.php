<?php
$db_host = "localhost";
$db_user = "root";
$db_pass = null;
$db_name = "sopranos";

$mysqli = new mysqli($db_host, $db_user, $db_pass, $db_name);

if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
} else {
    echo "We have a connection!";
}


?>
<!DOCTYPE html>
<html>
<head>
    <title>Delete Student</title>
</head>
<body>
<h2>Delete a student</h2>
<?php

$firstname = $_POST['pizza_id'];


$query = "DELETE FROM pizza4 WHERE pizza_id=$pizza_id (
        NULL,
        '".$_POST['pizza_id']."')";


$mysqli->query($query) or die($mysqli->error.__LINE__);
?>
<p>Student deleted!</p>
</body>
</html>