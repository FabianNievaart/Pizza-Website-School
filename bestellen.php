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
<main>

    <p>* moet ingevuld worden</p>
    <form name="contactform" method="post" action="email.php">
        <table width="450px">
            <tr>
                <td valign="top">
                    <label for="first_name">Voornaam *</label>
                </td>
                <td valign="top">
                    <input  placeholder="bijv. Jan" required type="text" name="first_name" maxlength="50" size="30">
                </td>
            </tr>
            <tr>
                <td valign="top"">
                <label for="last_name">Achternaam *</label>
                </td>
                <td valign="top">
                    <input  placeholder="bijv. Smit" required type="text" name="last_name" maxlength="50" size="30">
                </td>
            </tr>
            <tr>
                <td valign="top">
                    <label for="email">E-mail Adres *</label>
                </td>
                <td valign="top">
                    <input placeholder="iemand@voorbeeld.com" required  type="text" name="email" maxlength="80" size="30">
                </td>
            </tr>
            <tr>
                <td valign="top">
                    <label for="adres">Bezorg Adres *</label>
                </td>
                <td valign="top">
                    <input placeholder="Straatnaam en nummer" required  type="text" name="adres" maxlength="50" size="30">
                </td>
            </tr>
            <tr>
                <td valign="top">
                    <label for="woonplaats">Woonplaats *</label>
                    <p>(Bezorging alleen mogelijk voor adressen in Rotterdam, Amsterdam, of Utrecht)</p>
                </td>
                <td valign="top">
                    <select name="woonplaats">
                        <option value="Rotterdam">Rotterdam</option>
                        <option value="Amsterdam">Amsterdam</option>
                        <option value="Utrecht">Utrecht</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td valign="top">
                    <label for="telephone">Telefoon Nummer</label>
                </td>
                <td valign="top">
                    <input placeholder="0612345678" type="text" name="telephone" maxlength="30" size="30">
                </td>
            </tr>
            <tr>
                <td valign="top">
                    <label for="comments">Toevoegingen</label>
                </td>
                <td valign="top">
                    <textarea placeholder="bijv. extra kaas / kijk uit voor de waakhond" name="comments" maxlength="1000" cols="25" rows="6"></textarea>
                </td>
            </tr>
            <tr>
                <td colspan="2" style="text-align:center">
                    <input type="submit" value="Submit">
                </td>
            </tr>
        </table>
    </form>

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