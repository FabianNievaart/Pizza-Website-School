
<?php session_start();?>
<?php
include_once('User.php');

if(isset($_SESSION['use']))   // Checking whether the session is already there or not if
    // true then header redirect it to the home page directly
{
    header("Location:database.php");
}

if(isset($_POST['submit'])){
    $name = $_POST['user'];
    $pass = $_POST['pass'];

    $object = new User();
    $object->Login($name, $pass);
}

?>




<html>
<head>
    <link rel="stylesheet" href="admin.css">
</head>
<body class="body">


    <form method="post" action="index.php">
        Username: <input type="text" name="user"/>
        Password: <input type="password" name="pass"/>
        <input type="submit" name="submit" value="Login"/>
    </form>
    <a href="../index.php"><button>Terug naar website</button></a>


</body>

</html>