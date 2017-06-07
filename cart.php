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
    <li><a class="active" href=cart.php>Winkelwagen</a></li>
    <li><a href=contact.php>Contact</a></li>
    <li><a href="Admin/index.php">Admin pagina</a></li>
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
<main> <!-- ------------------------------------------------ Dit is de winkelwagen --------------------------------------------------- -->
    <div id="cart">
    <?php
    /**
     * Created by PhpStorm.
     * User: Fabian N.
     * Date: 30-4-17
     * Time: 20:42
     */

    $servername = "localhost";
    $username = "root";
    $password = null;
    $dbname = "sopranos";

    echo '<h1>Uw winkelwagen</h1>';

    if (isset($_GET)) {
        include_once('csessie.class.php');

        $sess = new csession();

        if (isset($_GET['reset'])) {
            $sess->destroySession();
        } else {

            $aantal = $sess->getSessionVar('aantal');
            if (isset($_GET['remove'])) {
                @$aantal[$_GET['id']]--;
            } else {
                @$aantal[$_GET['id']]++;
            }

            $sess->setSessionVar(['aantal', $aantal]);


            // get artikels who are in Session.
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->prepare("SELECT * FROM pizzas");
            $stmt->execute();

            // set the resulting array to associative
            $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $totaal = 0;
            $kortingTeller = array_sum($aantal);
            foreach ($stmt->fetchAll() as $k => $v) {
                if (isset($aantal[$v['pizza_id']])) {?>
                    <img src="<?php echo $v['pizza_foto']; ?>" alt="<?php echo $v['pizza_naam']; ?>" style="width:100px;height:78px;">
                    <?php
                    echo $aantal[$v['pizza_id']] . ' x ' . $v['pizza_naam'] . '  €' . $v['pizza_prijs'] . ' = €' . $aantal[$v['pizza_id']] * $v['pizza_prijs'] . '<br>';
                    $totaal = $totaal + $aantal[$v['pizza_id']] * $v['pizza_prijs'];
                }
            }

            if ($totaal > 0) {
                echo '<br> Subtotaal = €' . round($totaal,2) . '<br>';


                if ($kortingTeller >= 2){
                    echo 'Korting = €';
                    echo round($totaal/2-2.495,2) . '<br>';
                    echo 'Totaal = €';
                    echo round($totaal/2+2.495,2);
                }
                else{
                    echo 'Korting = €0<br>';
                    echo 'Totaal = €'.$totaal;
                }


                echo '<br><a href="cart.php?reset=1" ><button type="button">Winkelwagen legen</button></a><br>
                        <button onclick="window.location.href=\'bestellen.php\'">Bestellen</button>';
            }

        }

    }
    ?>

    <button onclick="window.location.href='index.php'">Verder winkelen</button>

    </div>
</main> <!-- ------------------------------------------------------------------------------------------------------------------------ -->


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

        <p class="footer-company-name">Sopranos Pizza &copy; 2017<br>Site gemaakt door Fabian Nievaart Luuk Molenbeek en Matthijs Rijnders</p>
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
            <p><a href="mailto:support@company.com">rotterdam@sopranos.com</a></p>
            <p><a href="mailto:support@company.com">amsterdam@sopranos.com</a></p>
            <p><a href="mailto:support@company.com">utrecht@sopranos.com</a></p>
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







