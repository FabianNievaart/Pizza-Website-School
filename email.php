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
require_once 'lib/swift_required.php';

// Create the Transport
$transport = Swift_SmtpTransport::newInstance('smtp.gmail.com', 465, 'ssl')
    ->setUsername('ftcnievaart@gmail.com')
    ->setPassword('gnqzkpvfxgnkvdkl')
;



    if ($_POST['woonplaats'] == 'Rotterdam') {
        $ontvanger = "rotterdam@sopranos.com";

    } elseif ($_POST['woonplaats'] == 'Amsterdam') {
        $ontvanger = "amsterdam@sopranos.com";

    } elseif ($_POST['woonplaats'] == 'Utrecht') {
        $ontvanger = "utrecht@sopranos.com";

    }

$bericht = "Voornaam: ".$_POST['first_name'].
        "<br>Achternaam: ".$_POST['last_name'].
        "<br>E-mail Adres: ".$_POST['email'].
        "<br>Bezorg Adres: ".$_POST['adres'].
        "<br>Woonplaats: ".$_POST['woonplaats'].
        "<br>Telefoon Nummer: ".$_POST['telephone'].
        "<br>Toevoegingen: ".$_POST['comments'];

$bericht2 = "Wij hebben uw bestelling ontvangen. 
Binnen 30 minuten zou de bestelling bij u aan moeten komen, zo niet,
 neem dan contact met ons op via het contact formulier op onze website.
 <br><br>U heeft de volgende gegevens achtergelaten, als deze niet kloppen neem dan a.u.b. zo snel mogelijk contact met ons op.<br><br>".$bericht;

$mailer = Swift_Mailer::newInstance($transport);

// Create a message
$message = Swift_Message::newInstance('Bestelling')
    ->setFrom(array('noreply@sopranos.nl' => 'Sopranos Mailserver'))
    ->setTo(array($ontvanger))
    ->addPart($bericht, 'text/html');

$message2 = Swift_Message::newInstance('Bestelling Bevestiging')
    ->setFrom(array('noreply@sopranos.nl' => 'Sopranos Mailserver'))
    ->setTo(array($_POST['email']))
    ->addPart($bericht2, 'text/html');

// Send the message
$result = $mailer->send($message).$mailer->send($message2);
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

