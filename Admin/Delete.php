<html>
<head>
    <link rel="stylesheet" href="admin.css">
</head>
<body class="body">


<form action="Delete.php" method="post">
    pizza:<br>
    <input required=required type="text" name="var1"><br>
    <input type="submit" value="Submit">
</form>
<a href="database.php"><button>Terug naar het tabel overzicht</button></a>


</body>

</html>

<?php session_start(); ?>
<?php
$servername = "localhost";
$username = "root";
$password = null;
$dbname = "sopranos";


if ($_POST) {
    $var1 = $_POST['var1'];


    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


// sql to delete a record
        $sql = "DELETE FROM pizzas WHERE pizza_id =  :filmID";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':filmID', $_POST['pizza_id'], PDO::PARAM_INT);
        $stmt->execute();


        // use exec() because no results are returned
        $conn->exec($sql);
        echo "Record deleted successfully";
    } catch (PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
    }


    $conn = null;
}


if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 300)) {
// last request was more than 5 minutes ago
    session_unset();     // unset $_SESSION variable for the run-time
    session_destroy();   // destroy session data in storage
}
$_SESSION['LAST_ACTIVITY'] = time(); // update last activity time stamp
?>
