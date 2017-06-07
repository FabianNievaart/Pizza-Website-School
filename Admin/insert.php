<html>
<head>
    <link rel="stylesheet" href="admin.css">
</head>
<body class="body">


<form action="insert.php" method="post">
    Pizza:<br>
    <input required=required type="text" name="var1"><br>
    Prijs:<br>
    <input required=required type="text" name="var2"><br>
    Omschrijving:<br>
    <input required=required type="text" name="var3"><br>
    <input type="submit" value="Submit">
</form>
<a href="database.php"><button>Terug naar het tabel overzicht</button></a>



</body>

</html>

<?php session_start(); ?>
<?php
if (!isset($_SESSION['use'])) // If session is not set then redirect to Login Page
{
    header("Location:index.php");
}

$servername = "localhost";
$username = "root";
$password = null;
$dbname = "sopranos";

//print_r($_POST);
//die();


if ($_POST) {
    $var1 = $_POST['var1'];
    $var2 = $_POST['var2'];
    $var3 = $_POST['var3'];

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // begin the transaction
        $conn->beginTransaction();
        // our SQL statements
        $conn->exec("INSERT INTO pizzas (pizza_naam, pizza_prijs, pizza_omschrijving) 
        VALUES ('$var1','$var2','$var3')");


        // commit the transaction
        $conn->commit();
        echo "<br>New record created successfully";
    } catch (PDOException $e) {
        // roll back the transaction if something failed
        $conn->rollback();
        echo "Error: " . $e->getMessage();
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


