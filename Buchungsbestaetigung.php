
<?php

SESSION_START();


 ?>

<!DOCTYPE html>

<html>
    <head>
    
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

    
    <!-- jquery --> 
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
   <link rel="stylesheet" href="/resources/demos/style.css">
   <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
   <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
        
    <!-- Schriftart Titel der Seite -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Caveat:wght@500&family=Open+Sans&family=Roboto:wght@100&family=Shadows+Into+Light&display=swap" rel="stylesheet">
 
   <!-- Schriftart Menüicons -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<  link href="https://fonts.googleapis.com/css2?family=Caveat:wght@500&family=Open+Sans&family=Roboto:wght@100&family=Shadows+Into+Light&family=Wix+Madefor+Display&display=swap" rel="stylesheet">     
        
      
    <!-- Das neueste kompilierte und minimierte CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">

    <!-- Optionales Theme -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap-theme.min.css" integrity="sha384-6pzBo3FDv/PJ8r2KRkGHifhEocL+1X2rVCTTkUfGk7/0pbek5mMa1upzvWbrUbOZ" crossorigin="anonymous">

    <!-- Das neueste kompilierte und minimierte JavaScript -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
        
    <title>Dreaming in the sky</title>
    
 
   <!--Extra Style der Navbar -->    
     <style type="text/css">
        
         .Menueicon:hover{
            color:azure;
            font-weight: 400;
             background-color: aliceblue;
         }
         
         .navbar-header, .Menueicon{
             height: 80px;
         }
         
        #navbar{
            background-color: #eeffcc;
         }
         
        .menueitem{
            margin-top: 15px;
            font-size: 17px;
            font-family: 'Wix Madefor Display', sans-serif;
             }
        
        #titel{
           font-size: 25px; 
           font-family: 'Shadows Into Light', cursive;
           color:darkgreen;
             }
         
    </style>   
    
   <!--Style Buchungs page--> 
    <style type="text/css">
       

        body{
            background-color: #eeffcc;
        }
              
        .container{
        color:darkgreen;
        text-align: center;
        font-family: 'Wix Madefor Display', sans-serif;
        margin: 70px auto;
        margin-bottom: 70px;
        text-align:justify;
        text-align: center
        }
   
        /* kleine Handy Bildschirme */
        @media screen and (min-width:100px) {
       #welcome{
            border-radius: 20px;
            max-height: 150px;
            box-shadow: 0 0 30px 3px #003300; }
        }
        
        /* Mittelgroße Bildschirme */
        @media only screen and (min-width: 768px) {
          #welcome{
            border-radius: 30px;
            max-height: 300px;
            box-shadow: 0 0 30px 3px #003300; }}

        </style>
        
    
    </head>


    <body>
   
        <nav class="navbar navbar-default">
          <div class="container-fluid" id="navbar">
            <!-- Titel und Schalter werden für eine bessere mobile Ansicht zusammengefasst -->
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Navigation ein-/ausblenden</span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand menueitem" id="titel" href="#">The Last Adventure Camp</a>
            </div>

            <!-- Alle Navigationslinks, Formulare und anderer Inhalt werden hier zusammengefasst und können dann ein- und ausgeblendet werden -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
              <ul class="nav navbar-nav">
        <!--        <li class="active"><a href="#">Link <span class="sr-only">(aktuell)</span></a></li>-->
                <li class="Menueicon"><a href="http://page1.42web.io/Projekte/Baumhaus/index.php" class="menueitem">Home</a></li>
                <li class="Menueicon"><a href="http://page1.42web.io/Projekte/Baumhaus/Ueberblick.php" class="menueitem">Baumhäuser</a></li>
                <li class="Menueicon"><a href="http://page1.42web.io/Projekte/Baumhaus/Buchungsverwaltung.php" class="menueitem">Buchungsverwaltung</a></li>
                <li class="Menueicon"><a href="http://page1.42web.io/Projekte/Baumhaus/Events.php" class="menueitem">Events</a></li>
              </ul>

              <ul class="nav navbar-nav navbar-right">
                <li class="Menueicon"><a href="#" class="menueitem">Kontakt</a></li>
              </ul>

            </div><!-- /.navbar-collapse -->
          </div><!-- /.container-fluid -->
        </nav>
        
         <div class="container">
            <div class="row">
                <div class="col-md-12"><h1>Vielen Dank für Ihre Buchung!</h1></div>
            </div>
            <div class="row">
              <div class="col-md-12"><h4>Zusammenfassung Ihrer Buchung:</h4></div>
            </div>

            <div class="row">
              <div class="col-md-12" id="typ">
                <?php

                    $typ="";

                    switch($_SESSION["kategorie"]){
                            case "A":
                            $typ="Baumhaus standard bis 2 Personen";
                            break;
                           case "B":
                            $typ="Deluxe Baumhaus, bis 2 Personen";
                            break;
                            case "C":
                            $typ="Deluxe Baumhaus, bis 4 Personen";
                            break;
                            case "D":
                            $typ="Gruppen-Baumhaus bis 4 Personen";
                            break;
                            case "E":
                            $typ="Gruppen-Baumhaus bis 6 Personen";
                            break;
                            case "F":
                            $typ="Bungalow";
                            break;
                        }
                                echo "Unterkunft: ".$typ."<br>";
                                echo "Nummer Ihrer Unterkunft: ".$_SESSION["haus"]."<br>";
                                echo "Buchung für: ".$_SESSION["vorname"]." ".$_SESSION["nachname"]."<br>";
                                echo "Anreise: ".$_SESSION["anreise"]."<br>";
                                echo "Abreise: ".$_SESSION["abreise"]."<br>";
                                echo "Preis: ".$_SESSION["preis"]." Euro"."<br>";
                                echo "Buchungsnummer: ".$_SESSION["buchungsnummer"]."<br>";
                          // Zum Schluß, löschen der Session.
                    session_destroy();
                     ?>
                    </div>
             </div>
            <div class="row" style="margin-top: 30px;">
              <div class="col-md-12 col-xs-12"><img id="welcome" src="leaf-flower.jpg"></div>
            </div>
            <div class="row" style="margin-top: 30px;">
              <div class="col-md-12"><h3>Wir freuen uns auf Ihren Besuch!</h3></div>
            </div>
            <div class="row" >
            <div class="col-md-12" ><p>Die Zahlung erfolgt Vorort bei der Anreise.<br> Eine Stornierung Ihrer Buchung ist bis 14 Tage vor der geplanten Anreise kostenfrei über die Buchungsverwaltung möglich.<br> Danach wird der volle Betrag der Buchung fällig.<br>Bei weiteren Fragen zu Ihrer Buchung oder dem Aufenthalt kontaktieren Sie uns gerne unter: info-baumhaushotel@gmx.de</p></div>
            </div>
        </div>

    </body>
</html>