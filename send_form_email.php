<!DOCTYPE html>
<html>
<head>
    <title>Pizza Sopranos</title>
    <link rel="stylesheet" href="stylesheet.css">
    <link rel="stylesheet" href="style.css">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="footer, address, phone, icons"/>
    <link rel="stylesheet" href="stylesheet.css">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
    <link href="http://fonts.googleapis.com/css?family=Cookie" rel="stylesheet" type="text/css">
</head>

<?php

$servername = "localhost";
$username = "root";
$password = null;
$dbname = "sopranos";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT * FROM pizzas");
    $stmt->execute();

    // set the resulting array to associative
    $result = $stmt->fetchAll();


} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>

<body>
<ul>
    <li><img src="images/logo.png" id="logo"></li>
    <li><a href=index.php>Onze pizza's</a></li>
    <li><a href=cart.php>Winkelwagen</a></li>
    <li><a href=contact.php>Contact</a></li>
</ul>
<div class="slideshow-container">
    <div class="mySlides fade">
        <img src="images/slideshow1.png" style="width:100%">
    </div>
    <div class="mySlides fade">
        <img src="images/slideshow2.png" style="width:100%">
    </div>
    <div class="mySlides fade">
        <img src="images/slideshow3.png" style="width:100%">
    </div>
</div>
<br>

<script>
    var slideIndex = 0;
    showSlides();
    function showSlides() {
        var i;
        var slides = document.getElementsByClassName("mySlides");
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        slideIndex++;
        if (slideIndex > slides.length) {
            slideIndex = 1
        }
        slides[slideIndex - 1].style.display = "block";
        setTimeout(showSlides, 3500);
    }
</script>
<main>

<?php


if(isset($_POST['email'])) {

    // EDIT THE 2 LINES BELOW AS REQUIRED
    if ($_POST['woonplaats'] == 'Rotterdam'){
            $email_to = "rotterdam@sopranos.nl, " . $_POST['email'];

        }
        elseif ($_POST['woonplaats'] == 'Amsterdam') {
            $email_to = "amsterdam@sopranos.nl" . $_POST['email'];;
        }
        elseif ($_POST['woonplaats'] == 'Utrecht'){
            $email_to = "utrecht@sopranos.nl" . $_POST['email'];;
    }
    $email_subject = "Bestelling";


    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email_from = $_POST['email'];
    $telephone = $_POST['telephone'];
    $comments = $_POST['comments'];
    $woonplaats = $_POST['woonplaats'];
    $adres = $_POST['adres'];



    $email_message = "Hieronder staan de details van uw bestelling.\n\n";


    function clean_string($string) {
        $bad = array("content-type","bcc:","to:","cc:","href");
        return str_replace($bad,"",$string);
    }



    $email_message .= "Voornaam: ".clean_string($first_name)."\n";
    $email_message .= "Achternaam: ".clean_string($last_name)."\n";
    $email_message .= "Email: ".clean_string($email_from)."\n";
    $email_message .= "Woonplaats: ".clean_string($woonplaats)."\n";
    $email_message .= "Bezorg Adres: ".clean_string($adres)."\n";
    $email_message .= "Telefoon Nummer: ".clean_string($telephone)."\n";
    $email_message .= "Toevoegingen: ".clean_string($comments)."\n";

// create email headers
    $headers = 'From: '.$email_from."\r\n".
        'Reply-To: '.$email_from."\r\n" .
        'X-Mailer: PHP/' . phpversion();
    @mail($email_to, $email_subject, $email_message, $headers);
    ?>

    <!-- include your own success html here -->

    Wij hebben uw bestelling ontvangen.

    <?php

}
?>
</main>

    <footer class="footer-distributed">

        <div class="footer-left">

            <h3>Sopranos<span>Pizza</span></h3>

            <p class="footer-links">
                <a href="#">Home</a>
                ·
                <a href="#">About</a>
                ·
                <a href="#">Faq</a>
                ·
                <a href="#">Contact</a>
            </p>

            <p class="footer-company-name">Sopranos Pizza &copy; 2017</p>
        </div>

        <div class="footer-center">

            <div>
                <i class="fa fa-map-marker"></i>
                <p><span>Rijswijkseweg 420</span> The Hague, The Netherlands</p>
            </div>

            <div>
                <i class="fa fa-phone"></i>
                <p>+31 634349112 </p>
            </div>

            <div>
                <i class="fa fa-envelope"></i>
                <p><a href="mailto:support@company.com">info@sopranos.com</a></p>
            </div>

        </div>

        <div class="footer-right">

            <p class="footer-company-about">
                <span>Over het bedrijf</span>
                Soprano's west Pizza offers the perfect pizza. That is, soft, chewy, and dripping with cheese and fresh
                toppings. While your diet might frown upon the oil stains left in the box, your cravings (and budget) will
                surely be placated by what Soprano's West Pizza has to offer. You can customize your pizza with dozens of
                options of toppings.
            </p>

            <div class="footer-icons">

                <a href="https://nl-nl.facebook.com/sopranos-pizza-177726377767"><i class="fa fa-facebook"></i></a>
                <a href="https://twitter.com/sopranosinfo"><i class="fa fa-twitter"></i></a>
                <a href="https://www.linkedin.com/company/sopranos-pizza "><i class="fa fa-linkedin"></i></a>
            </div>

        </div>

    </footer>
</body>
</html>
