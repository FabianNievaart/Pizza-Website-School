<html>
<head>
    <link rel="stylesheet" href="admin.css">
</head>
<body class="body">


<form action="update.php" method="post">
    select ID:<br>
    <input required=required type="text" name="ID"><br>
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


<?php session_start();?>
<?php
if(!isset($_SESSION['use'])) // If session is not set then redirect to Login Page
{
    header("Location:index.php");
}

$servername = "localhost";
$username = "root";
$password = null;
$dbname = "sopranos";


if ($_POST) {
    $id = $_POST['ID'];
    $var1 = $_POST['var1'];
    $var2 = $_POST['var2'];
    $var3 = $_POST['var3'];


    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "UPDATE pizzas SET pizza_naam='$var1', pizza_prijs='$var2', 
                pizza_omschrijving='$var3' WHERE pizza_id='$id'";

        // Prepare statement
        $stmt = $conn->prepare($sql);

        // execute the query
        $stmt->execute();

        // echo a message to say the UPDATE succeeded
        echo  "<br>record " . $id . " UPDATED successfully to:";
        echo  "<br>Pizza: " . $var1 . "<br>Grootte: " . $var2 . "<br>Prijs: " . $var3;
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

