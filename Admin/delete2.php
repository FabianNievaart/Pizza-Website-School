<?php
$db_host = "localhost";
$db_user = "root";
$db_pass = null;
$db_name = "sopranos";
?>

<!DOCTYPE html>
<html>
<head>
    <title>Pizzas</title>
</head>
<body>
<h1>pizza Database</h1>
<?php
$mysqli = new mysqli($db_host, $db_user, $db_pass, $db_name);

if (mysqli_connect_errno()) {
    printf("connection failed: %s\n", mysqli_connect_error());
    exit();
} else {
    echo "we have a connection";
}

$query = "SELECT * FROM pizza4";
$result = $mysqli->query($query) or die($mysqli->error.__LINE__);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<p>".$row['pizza_id']."</p>";
    }
} else {
    echo 'NO RESULTS';
}
?>
<h2>Delete pizza</h2>
<form action="deleteStudent.php" method="POST">
    <p>
        <label for="pizza_id">pizza_id:</label>
        <input id="pizza_id" name="pizza_id" type="text">
    </p>

    <input type="submit" value="submit">
</form>
</body>
</html>enter code here