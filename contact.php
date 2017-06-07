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
    <li><a class="active" href=contact.php>Contact</a></li>
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
    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
    <a class="next" onclick="plusSlides(1)">&#10095;</a>
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
    <h2>Contact Formulier</h2>
    <div class="padding">
        <p>* moet ingevuld worden</p>
        <form name="contactform" method="post" action="email2.php">
            <table width="450px">
                <tr>
                    <td valign="top">
                        <label for="first_name">Voornaam *</label>
                    </td>
                    <td valign="top">
                        <input type="text" name="first_name" maxlength="50" size="30">
                    </td>
                </tr>
                <tr>
                    <td valign="top">
                    <label for="last_name">Achternaam *</label>
                    </td>
                    <td valign="top">
                        <input type="text" name="last_name" maxlength="50" size="30">
                    </td>
                </tr>
                <tr>
                    <td valign="top">
                        <label for="email">Email Address *</label>
                    </td>
                    <td valign="top">
                        <input type="text" name="email" maxlength="80" size="30">
                    </td>
                </tr>
                <tr>
                    <td valign="top">
                        <label for="telephone">Telefoon nummer</label>
                    </td>
                    <td valign="top">
                        <input type="text" name="telephone" maxlength="30" size="30">
                    </td>
                </tr>
                <tr>
                    <td valign="top">
                        <label for="onderwerp">Onderwerp *</label>
                    </td>
                    <td valign="top">
                        <input required type="text" name="onderwerp" maxlength="50" size="30">
                    </td>
                </tr>
                <tr>
                    <td valign="top">
                        <label for="comments">Bericht *</label>
                    </td>
                    <td valign="top">
                        <textarea required name="comments" maxlength="1000" cols="25" rows="6"></textarea>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" style="text-align:center">
                        <input type="submit" value="Submit">
                    </td>
                </tr>
            </table>
        </form>
    </div>
    <hr>
    <div class="padding">
        <h4>Wil jij hier werken? Stuur dan een e-mail naar Info@sopranos.nl met de antwoorden van de vragen
            hieronder.</h4>
        <p>

            &#8226 Vertel eens wat over jezelf<br>
            &#8226 Wat zijn je sterke punten?<br>
            &#8226Wat zijn je zwakke punten?<br>
            &#8226 Waarom wil je deze baan?<br>
            &#8226 Waar zie je jezelf over vijf jaar?<br>
            &#8226Wat zou voor jou het ideale bedrijf zijn?<br>
            &#8226 Wat trekt je aan in dit bedrijf?<br>
            &#8226 Waarom zouden we jou moeten aannemen?<br>
            &#8226 Wat vond je het minst leuk aan je vorige baan?<br>
            &#8226 Wat vond je het leukst aan je vorige baan?<br>
            &#8226 &#8226 Wat kan jij voor ons betekenen dat anderen niet kunnen?<br>
            &#8226 Wat voor verantwoordelijkheden had je in je vorige functie?<br>
            &#8226 Waarom wil je weg bij je huidige werkgever?<br>
            &#8226 Wat weet je van onze branche?<br>
            &#8226 Wat weet je van ons bedrijf?<br>
            &#8226 Ben je bereid om te verhuizen?<br>
            &#8226 Heb jij nog vragen voor mij?<br>
            &#8226 Heb je er moeite mee om onder een baas te werken?<br>
        </p>
    </div>
    <hr>
    <div class="maps">
        <iframe src=" https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d39302.451837927285!2d4.328678401088148!3d51.999529707943346!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47c5b5c3515f58fd%3A0x89b05ca3c54bd43d!2sDelft!5e0!3m2!1snl!2snl!4v1491827095410 "
                width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
    </div>


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

        <p class="footer-company-name">
            Maandag
            11:00 - 03:00
            <br><br>
            Dinsdag
            11:00 - 03:00
            <br><br>
            Woensdag
            11:00 - 03:00
            <br><br>
            Donderdag
            11:00 - 03:00
            <br><br>
            Vrijdag
            11:00 - 03:00
            <br>
            <br>
            Zaterdag
            11:00 - 04:00
            <br><br>

            Zondag
            11:00 - 04:00
            <br><br>
        </p>
    </div>

    <div class="footer-center">

        <div>
            <i class="fa fa-map-marker"></i>
            <p><span>Rijswijkseweg 61</span> The Hague, The Netherlands</p>
        </div>

        <div>
            <i class="fa fa-phone"></i>
            <p>+31 634349112 </p>
        </div>

        <div>
            <i class="fa fa-envelope"></i>
            <p><a href="mailto:support@company.com">Sopranos@pizza.com</a></p>
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