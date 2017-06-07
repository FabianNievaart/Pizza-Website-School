
<html>
<head>
    <link rel="stylesheet" href="admin.css">
</head>
<body id="database">
<br><br>
<a href="insert.php"><button>Nieuwe gegevens</button></a>
<a href="update.php"><button>Wijzig gegevens</button></a>
<a href="Add.php"><button>Nieuwe gebruiker aanmaken</button></a>
<a href="logout.php"><button>Log uit</button></a>
<a href="Delete.php"><button>Delete gegevens</button></a>
<a href="../index.php"><button>Terug naar website</button></a>


</body>

</html>
<?php session_start();?>
<?php
if(!isset($_SESSION['use'])) // If session is not set then redirect to Login Page
{
    header("Location:index.php");
}


echo "<table style='border: solid 1px black;'>";
echo "<tr><th>Id</th><th>Naam</th><th>prijs</th><th>Omschrijving</th></tr>";

class TableRows extends RecursiveIteratorIterator {
    function __construct($it) {
        parent::__construct($it, self::LEAVES_ONLY);
    }

    function current() {
        return "<td style='width:150px;border:1px solid black;'>" . parent::current(). "</td>";
    }

    function beginChildren() {
        echo "<tr>";
    }

    function endChildren() {
        echo "</tr>" . "\n";
    }
}

$servername = "localhost";
$username = "root";
$password = null;
$dbname = "sopranos";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT pizza_id, pizza_naam, pizza_prijs, pizza_omschrijving FROM pizzas");
    $stmt->execute();

    // set the resulting array to associative
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
        echo $v;
    }
}
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$conn = null;
echo "</table>";

if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 300)) {
    // last request was more than 30 minutes ago
    session_unset();     // unset $_SESSION variable for the run-time
    session_destroy();   // destroy session data in storage
}
?>


