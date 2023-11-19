
<?php

//include("menue.html");
 SESSION_START();
error_reporting(E_ALL);    

//$debug = true; // or
$debug = false;


$grenze=4;

//   Daten aus Eingabeformular prüfen

if (isset($_POST['versteckt']) && $_POST['versteckt'] == 1){

    $test=0;
    $text="";
    $überschrift="";
    $kategorie="";
    $haus="";

    $unterkunft=$_POST["unterkunft"];
    $anzahl=$_POST["Personenzahl"];
    $anreise=$_POST["from"];
    $abreise=$_POST["to"];
    $vorname=$_POST["vorname"];
    $nachname=$_POST["nachname"];
    $email=$_POST["email"];
    $email2=$_POST["mailcheck"];
    $strasse=mb_convert_encoding($_POST["straße"], 'UTF-8');
    $hausnummer=$_POST["hausnummer"];
    $plz=$_POST["plz"];
    $stadt=$_POST["stadt"];
    $infos=$_POST["infos"];
    $telefon=$_POST["telefon"];

    
    date_default_timezone_set('Europe/Zurich');
    $heute = date("Y-m-d");
    
        if ($unterkunft=="2er"){
              $kategorie="A";}
        elseif ($unterkunft=="Deluxe2pers"){
              $kategorie="B";}
        elseif ($unterkunft=="Deluxe4pers"){
              $kategorie="C";}
        elseif ($unterkunft=="Gruppe4pers"){
              $kategorie="D";}
        elseif ($unterkunft=="Gruppe6pers"){
              $kategorie="E";}
        elseif ($unterkunft=="Bungalow"){
              $kategorie="F";}
    
    
  //   Eingaben plausibel? ->  
    
    if (($anreise>$abreise)or($anreise<$heute)){
        $test=2;
        $text="Bitte überprüfen Sie die eingegebenen Anreise- und Abreisedaten";
        $überschrift="Ups, hier hat sich ein Fehler eingeschlichen...";
    }
    elseif ($email != $email2){
        $test=3;
        $text="Die eingegebenen E-Mail Adressen stimmen nicht überein";
        $überschrift="Ups, hier hat sich ein Fehler eingeschlichen...";
    }
    elseif ((($kategorie=="A")or($kategorie=="B")) and $anzahl>2){
        $test=4;
        $text="Sie haben zu viele Personen für die gewählte Unterkunft angegeben";
        $überschrift="Ups, hier hat sich ein Fehler eingeschlichen...";
    }
        elseif ((($kategorie=="C")or($kategorie=="D")or($kategorie=="F")) and $anzahl>4){
        $test=4;
        $text="Sie haben zu viele Personen für die gewählte Unterkunft angegeben";
        $überschrift="Ups, hier hat sich ein Fehler eingeschlichen...";
    }
        else{
           
  //   Verfügbarkeit in Datenbank prüfen ->  
    
    // Nutzername, PW etc. unsichtbar gemacht
    $link =mysqli_connect("sql305.infinityfree.com","xxxxxxxxxxxxx","xxxxxxxxxx", "xxxxxxxxxxxxxxxxxx");
    
        if(mysqli_connect_error()){
            echo("Fehler");
        }
        else {
            mysqli_query($link, "SET NAMES 'utf8'");
            //            $db = utf8_encode("Buchungsübersicht");
            $auswahl="SELECT * FROM `buchungen`";
            $result = $link->query($auswahl);
            if (mysqli_num_rows($result) > 0) {
                $zaehler=0;
                while($row = $result->fetch_assoc()) {
                    if(($row["kategorie"]==$kategorie) and((($anreise >= $row["anreise"]) and ($anreise <= $row["abreise"]))or(($abreise >= $row["anreise"]) and ($abreise <= $row["abreise"])))){
                        $zaehler= $zaehler+1;
//                        echo $zaehler;
                    }               
             else {
//              echo "0 results";
                };
              }
        
                if($zaehler < $grenze){

                    switch ($zaehler) {
                    case 0:
                        $haus=$kategorie."1";
                        break;
                    case 1:
                        $haus=$kategorie."2";
                        break;
                    case 2:
                        $haus=$kategorie."3";
                        break;
                    case 3:
                        $haus=$kategorie."4";
                        break;
                }

                $test=1;
                $text="Ihre gewünschte Unterkunft ist noch verfügbar! Möchten Sie Ihre Buchung verbindlich abschließen?";
                $überschrift="Kapazitäts-Check";
    
                switch($kategorie){
                    case "A":
                    $preis=(floor((strtotime($abreise) - strtotime($anreise)) / (60 * 60 * 24)))*85;
                    break;
                   case "B":
                    $preis=(floor((strtotime($abreise) - strtotime($anreise)) / (60 * 60 * 24)))*130;
                    break;
                    case "C":
                    $preis=(floor((strtotime($abreise) - strtotime($anreise)) / (60 * 60 * 24)))*180;
                    break;
                    case "D":
                    $preis=(floor((strtotime($abreise) - strtotime($anreise)) / (60 * 60 * 24)))*120;
                    break;
                    case "E":
                    $preis=(floor((strtotime($abreise) - strtotime($anreise)) / (60 * 60 * 24)))*160;
                    break;
                    case "F":
                    $preis=(floor((strtotime($abreise) - strtotime($anreise)) / (60 * 60 * 24)))*130;
                    break;
                }

//                SESSION_START();
                    
                $_SESSION["kategorie"] = $kategorie;
                $_SESSION["haus"]=$haus;
                $_SESSION["vorname"]=$vorname;
                $_SESSION["nachname"]=$nachname;
                $_SESSION["anreise"]=$anreise;    
                $_SESSION["abreise"]=$abreise;    
                $_SESSION["preis"]=$preis;


                $_SESSION["email"]=$email;
                $_SESSION["strasse"]=$strasse;
                $_SESSION["hausnummer"]=$hausnummer;
                $_SESSION["plz"]=$plz;
                $_SESSION["stadt"]=$stadt;
                $_SESSION["telefon"]=$telefon;
                $_SESSION["infos"]=$infos;
                }
              
            else{
                header("Location: http://page1.42web.io/Projekte/Baumhaus/ablehnung.php");
    }}}}}        
        
//   Verbindliche Buchung wurde bestätigt -> Eintrag der Eingabe in Datenbank:
    
    
 if (isset($_POST['versteckt1']) && $_POST['versteckt1'] == 1){  
     
//   SESSION_START();
     
   $kategorie=$_SESSION["kategorie"];
   $haus=$_SESSION["haus"];
   $vorname=$_SESSION["vorname"];
   $nachname=$_SESSION["nachname"];
   $anreise=$_SESSION["anreise"];    
   $abreise=$_SESSION["abreise"];    
   $preis=$_SESSION["preis"];  
   $email=$_SESSION["email"];
   $strasse= $_SESSION["strasse"];
   $hausnummer=$_SESSION["hausnummer"];
   $plz=$_SESSION["plz"];
   $stadt=$_SESSION["stadt"];
   $telefon= $_SESSION["telefon"];
   $infos= $_SESSION["infos"];
    
    $link=mysqli_connect("sql305.infinityfree.com","epiz_33863583","Q2F7C2xvQF", "epiz_33863583_w478");
    
    if(mysqli_connect_error()){
            echo("Fehler");
        }
    else {          
        $sql="INSERT INTO `buchungen`(`kategorie`, `haus`, `vorname`, `nachname`,`email`,`strasse`,`hausnummer`,`plz`,`ort`,`telefon`,`anreise`,`abreise`,`preis`, `nachricht`) VALUES ('$kategorie','$haus', '$vorname','$nachname','$email','$strasse','$hausnummer','$plz','$stadt','$telefon','$anreise','$abreise','$preis', '$infos')";
            
    
        if ($link->query($sql) === TRUE) {
//          echo "New record created successfully";
        } 
        else {
          echo "Error: " . $sql . "<br>" . $link->error;
                }
    
        $auswahl="SELECT id FROM `buchungen`";
        $result = $link->query($auswahl);
        while($row = $result->fetch_assoc()) {
                $id=$row["id"];
              };
        
        $buchungsnummer= ($id*5)+12345678;
        $nummereintrag= "UPDATE `buchungen` SET`buchungsnummer`=$buchungsnummer WHERE id=$id";
                
        if ($link->query($nummereintrag) === TRUE) {
//          echo "New record created successfully";
        } else {
          echo "Error: " . $sql . "<br>" . $link->error;
                }

        $_SESSION["buchungsnummer"] = $buchungsnummer;

        
        header("Location: http://page1.42web.io/Projekte/Baumhaus/Buchungsbestaetigung.php");    
}}
    
?>
    

<!DOCTYPE html>

<html>
    <head>
    <!--für menü-->     
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
    <link href="https://fonts.googleapis.com/css2?family=Caveat:wght@500&family=Open+Sans&family=Roboto:wght@100&family=Shadows+Into+Light&family=Wix+Madefor+Display&display=swap" rel="stylesheet">     
  
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
    </style>
        

   <!--Style Übersichtsseite--> 
        <style type="text/css">
       
        body{
            background-color: #eeffcc;
            margin:0;
            padding:0;
        }
        
        .caption{
            text-align: center;
        }
            
        img { 
            max-height: 1000px; 
            }

        .thumbnail img {
            width: auto;
            height: 350px;
        }
            
        .description{
            color:darkgreen;
            text-align: center;
            font-family: 'Wix Madefor Display', sans-serif;
            margin: 70px auto;
            margin-bottom: 70px;
            text-align:justify;
            font-size: 20px;}
            
        hr{
            border-width: 2px;
            border-color: darkolivegreen;
            width: 85%;
            }
        
        .detail{
            margin-top: 90px;      
        }
        
        .detailtitle{
            font-size: 25px; 
            font-family: 'Shadows Into Light', cursive;
            color:darkgreen;
            text-align: center;  
        }
        
         .datepicker {
            z-index: 3000 !important 
            }
        
        .feld{
            width: 260px;
            height: 35px;
            margin-top: 10px;
            margin-left: 0%;}

        /* sehr kleine Handy Bildschirme */
        @media screen and (max-width:700px) {
             .feld{
            width: 64%;
             height: 35px;
            margin-top: 10px;
            margin-left: 18%;}
        
        .extra{
            margin-left: 2%;
            }}
        
         label{
            margin-top: 10px;
         } 

        .inputLabel{
            margin-left: 10px;
         }
        
        .moving{
            opacity:0.9;
         }
        
        .moving:hover{
            animation: move forwards 0.2s 2 ease-in-out;
            }

        @keyframes move {         
                0%   { transform: translate(0px,0px) rotate(0deg)}
                33%  { transform: rotateZ(2deg)}
                66%  { transform: rotateZ(-4deg)}
                100% { transform: translate(0px,0px) rotate(0deg) }
            }    

          .carousel titel{
            font-size: 15px;
            font-weight: 200;
            font-family: 'Wix Madefor Display', sans-serif;             
        }
        
        a{
            color:white;
        }
    
   .btn{
    background-color:#26734d;
        }
       
        </style>
              
    </head>
    
    
    <body>
        <!-- Navigationsleiste -->
        <nav class="navbar navbar-default">
            <div class="container-fluid" id="navbar">
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
                        <li class="Menueicon"><a href="http://page1.42web.io/Projekte/Baumhaus/index.php" class="menueitem">Home</a></li>
                        <li class="Menueicon"><a href="http://page1.42web.io/Projekte/Baumhaus/Ueberblick.php" class="menueitem">Baumhäuser</a></li>
                        <li class="Menueicon"><a href="http://page1.42web.io/Projekte/Baumhaus/Buchungsverwaltung.php" class="menueitem">Buchungsverwaltung</a></li>
                        <li class="Menueicon"><a href="http://page1.42web.io/Projekte/Baumhaus/Events.php" class="menueitem">Events</a></li>
                    </ul>
        
                    <ul class="nav navbar-nav navbar-right">
                        <li class="Menueicon"><a href="http://page1.42web.io/Projekte/Baumhaus/index.php#footer" class="menueitem">Kontakt</a></li>
                    </ul>

                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>
        
       
        <!-- /Vorschaufenster -->        
        <div class="container-fluid">
        <div class="row">
             <div class="col-sm-6 col-md-3 moving">
            <div class="thumbnail" id="bild3">
              <img class="img-fluid" src="2personenhaus.png" alt="...">
              <div class="caption">
                <h3>Für Romantiker</h3>
                <p>Baumhaus bis 2 Personen</p>
                <a href="#zweier" class="btn btn-default" role="button" id="testbutton">mehr erfahren</a>
              </div>
            </div>
          </div>


            <div class="col-sm-6 col-md-3 moving" >
            <div class="thumbnail" id="bild2">
              <img src="Haustitel4.jpg" alt="...">
              <div class="caption">
                <h3>Für Verwöhnte </h3>
                <p>Deluxe Baumhaus, bis 2 oder 4 Personen</p>
                <a href="#exclusiv" class="btn btn-default" role="button">mehr erfahren</a>
              </div>
            </div>
          </div>

         <div class="row">
             <div class="col-sm-6 col-md-3 moving" >
            <div class="thumbnail" id="bild1">
              <img src="Haustitel.jpg" alt="...">
              <div class="caption">
                <h3>Für Familien und Gruppen </h3>
                <p>Baumhaus 4 bis 6 Personen</p>
                 <a href="#family" id="button1" class="btn btn-default" role="button">mehr erfahren</a>
              </div>
            </div>
          </div>

            <div class="col-sm-6 col-md-3 moving" >
            <div class="thumbnail" id="bild4">
              <img class="img-fluid" src="Bodenstaendige.jpg" alt="...">
              <div class="caption">
                <h3>Für Bodenständige</h3>
                <p>Bungalow, bis 2 oder 4 Personen</p>
                <a href="#bungalow" class="btn btn-default" role="button">mehr erfahren</a>
              </div>
            </div>
          </div>

         </div>     
         </div>   
         </div>

        <!--/ Kurzer Intro Text -->     
 
        <div class="container description">
        <p>Jedes Baumhaus wurde sorgfältig so gestaltet, dass es sich nahtlos in die Umgebung einfügt und einen atemberaubenden Blick auf die Baumkronen bietet. Treten Sie auf Ihren privaten Balkon und lassen Sie die frische Luft Ihre Sinne beleben, während Sie Ihren Morgenkaffee schlürfen oder am Abend bei einem Glas Wein entspannen.<br>
            </p>

        <p>Im Inneren finden Sie eine harmonische Mischung aus rustikalem Charme und moderner Eleganz. Unsere geräumigen und gut ausgestatteten Unterkünfte verfügen über Plüschbetten, gemütliche Sitzecken und eigene Bäder. Moderne Annehmlichkeiten wie Wi-Fi, Klimaanlage und Minibar sorgen dafür, dass Ihr Aufenthalt so komfortabel wie nur möglich ist.</p>       
        </div>

         <!--/ Start Block Einzelbeschreibung 2er Baumhaus inkl Trennlinie -->     
        <hr>

        <div class="container" style="margin-top:90px;">
         <div class="row" >
          <div class="col-md-6">
              <h4 class="detailtitle" id="zweier">
              <b>Baumhaus für zwei Personen: Ein charmanter minimalistischer Rückzugsort inmitten der Bäume</b></h4>
              <ul class="description" style="color:black; margin-top:40px;">
                <li><b>Schlafplätze:</b> Bequeme Betten oder Schlafplattformen mit weicher Bettwäsche für einen erholsamen Schlaf</li>
                <li><b>Sanitäre Einrichtungen:</b> Je nach Art des Baumhauses gibt es ein eigenes Bad mit Toilette, Waschbecken und Dusche, oder die Gäste können ein Gemeinschaftsbad in der Nähe benutzen. Handtücher inkl.</li>
                <li><b>Natürliche Beleuchtung und Belüftung:</b><br>Großzügige Fenster und Öffnungen lassen natürliches Licht und frische Luft herein und sorgen für ein erfrischendes Ambiente.</li>
                <li><b>Durchdachte Annehmlichkeiten:</b> Zu den zusätzlichen Ausstattungsmerkmalen gehören ein kleiner Kamin oder eine Heizung für die kälteren Monate, Steckdosen zum Aufladen von Geräten und eine kleine Auswahl an Büchern oder Spielen zur Unterhaltung</li>
                <li><b>Sicherheitsmaßnahmen:</b> Eine robuste Konstruktion, sichere Geländer und Maßnahmen gegen das Eindringen von Insekten und Wildtieren sorgen für einen sicheren und angenehmen Aufenthalt</li>
              <br>
                <li style="list-style: none;"><b>Preis pro Nacht:</b> 85 Euro</li>
                <li style="list-style:none; margin-top: 20px"><div><p><a class="btn btn-lg" role="button" data-toggle="modal" data-target="#myModal">Zur Buchung</a>
                <a class="btn btn-default" role="button" href="#navbar" style="height:45px;"><span class="glyphicon glyphicon-arrow-up"></span>
                <span class="sr-only">zurück nach oben</span></a></p></div></li>
              </ul>
     
     </div>
  <div class="col-md-6">
     <div id="carousel-1" class="carousel slide" data-ride="carousel" style="margin-top:120px; box-shadow: 9px 9px 6px grey;">
  <!-- Positionsanzeiger -->
  <ol class="carousel-indicators">
    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
  </ol>

  <!-- Verpackung für die Elemente -->
  <div class="carousel-inner" role="listbox">
    <div class="item active">
      <img src="download%20(1).png" alt="...">
      <div class="carousel-caption">
        <p>Wohnzimmer</p>
      </div>
    </div>
    <div class="item">
      <img src="download%20(6).png" alt="...">
      <div class="carousel-caption">
        <p>Schlafzimmer</p>
      </div>
    </div>
        <div class="item">
      <img src="download%20(13).png" alt="...">
      <div class="carousel-caption">
        <p>Badezimmer</p>
      </div>
    </div>
  </div>

  <!-- Schalter -->
  <a class="left carousel-control" href="#carousel-1" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Zurück</span>
  </a>
  <a class="right carousel-control" href="#carousel-1" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Weiter</span>
  </a>
</div>
     </div>
    </div>  
</div>
        
 <!--/ Ende Block Einzelbeschreibung -->           

 <!--/ Start Block Einzelbeschreibung Deluxe inkl Trennlinie -->     
    
<hr>  
<div class="container" style="margin-top:90px;">
 <div class="row">
  <div class="col-md-6">
      <h4 class="detailtitle" id="exclusiv">
      <b>Luxus-Baumhaus: Ein exklusiver Rückzugsort hoch oben in den Bäumen.</b></h4>
      <ul class="description" style="color:black; margin-top:40px;">
        <li><b>Geräumige Unterkunft:</b> Das Baumhaus bietet Platz für bis zu 2 oder 4 Personen und bietet reichlich Raum für Entspannung und Privatsphäre.<br>
          Getrennte Schlafzimmer oder Schlafbereiche, jeweils ausgestattet mit gemütlichen Betten für einen erholsamen Schlaf.</li>
        <li><b>Vollständig ausgestattete Küche mit elegantem Essbereich:</b> Eine moderne und gut ausgestattete Küche mit Kühlschrank, Herd, Backofen, Mikrowelle, Geschirrspüler und einer großen Auswahl an Kochutensilien und Geräten, Essbereich mit Sitzgelegenheiten</li>
        <li><b>Eigenes Badezimmer:</b><br>Badezimmer mit luxuriöser Dusche, Badewanne, Waschbecken und Toilette, das Bequemlichkeit und Komfort bietet.</li>
        <li><b>Ausgedehnter Wohnbereich:</b> Ein geräumiges Wohnzimmer mit bequemen Sitzgelegenheiten, einem Großbildfernseher und weiteren Unterhaltungsmöglichkeiten </li>
        <li><b>Privater Balkon oder Terrasse:</b> Ein Außenbereich mit Sitzgelegenheiten, von dem sich wunderbar die Landschaft bestaunen lässt</li>
        <li><b>Hochwertige Annehmlichkeiten:</b> Zu den zusätzlichen Ausstattungsmerkmalen können Klimaanlage, Heizung, Wi-Fi-Anschluss, ein Soundsystem und eine Auswahl an Büchern, Spielen oder Filmen zur Unterhaltung gehören.</li>
        <li><b>Erhöhte Privatsphäre:</b> Durchdachte Designelemente und die strategische Positionierung des Baumhauses sorgen für maximale Privatsphäre der Gäste.</li>
          <br>
        <li style="list-style: none;"><b>Preis pro Nacht Deluxe Baumhaus bis 2 Personen:<br></b> 130 Euro</li>
          <br>
        <li style="list-style: none;"><b>Preis pro Nacht Deluxe Baumhaus bis 4 Personen:<br></b> 180 Euro</li>
        <li style="list-style:none; margin-top: 20px"><div><p><a class="btn btn-lg" role="button" data-toggle="modal" data-target="#myModal">Zur Buchung</a>
          <a class="btn btn-default" role="button" href="#navbar" style="height:45px;"><span class="glyphicon glyphicon-arrow-up"></span>
        <span class="sr-only">zurück nach oben</span></a></p></div></li>
      </ul>
     
     </div>
  <div class="col-md-6">
           <div id="carousel-2" class="carousel slide" data-ride="carousel" style="margin-top:120px; box-shadow: 9px 9px 6px grey;">
  <!-- Positionsanzeiger -->
  <ol class="carousel-indicators">
    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
    <li data-target="#carousel-example-generic" data-slide-to="3"></li>
  </ol>

  <!-- Verpackung für die Elemente -->
  <div class="carousel-inner" role="listbox">
    <div class="item active">
      <img src="download%20(3).png" alt="...">
      <div class="carousel-caption">
        <p>Wohnzimmer 1</p>
      </div>
    </div>
    <div class="item">
      <img src="download%20(4).png" alt="...">
      <div class="carousel-caption">
        <p>Wohnzimmer 2</p>
      </div>
    </div>
        <div class="item">
      <img src="download%20(11).png" alt="...">
      <div class="carousel-caption">
        <p>Badezimmer</p>
            </div></div>
    <div class="item">
      <img src="download%20(14).png" alt="...">
      <div class="carousel-caption">
        <p>Balkon</p>
      </div>
    </div>
  </div>

  <!-- Schalter -->
  <a class="left carousel-control" href="#carousel-2" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Zurück</span>
  </a>
  <a class="right carousel-control" href="#carousel-2" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Weiter</span>
  </a>
</div>
     
     
     </div>
    </div>  
</div>
        
 <!--/ Ende Block Einzelbeschreibung --> 
    
   <!--/ Start Block Einzelbeschreibung Familie inkl Trennlinie -->     
    
<hr>
    
<div class="container" style="margin-top:90px;">
 <div class="row">
  <div class="col-md-6">
      <h4 class="detailtitle" id="family">
      <b>Baumhaus für Familien und Gruppen</b></h4>
      <ul class="description" style="color:black; margin-top:40px;">
      <li><b>Mehrere Schlafzimmer:</b> Getrennte Schlafbereiche mit bequemen Betten sorgen für Privatsphäre und einen erholsamen Schlaf für alle.</li>
      <li><b>Vollständig ausgestattete Küche:</b><br> Eine gut ausgestattete Küche die es den Gästen ermöglichen, gemeinsam Mahlzeiten zuzubereiten.</li>
      <li><b>Essecke:</b><br>Essbereich mit ausreichend Sitzgelegenheiten für die gesamte Gruppe</li>
      <li style="text-align: left;"><b>Familienfreundliche Annehmlichkeiten:</b> Kindersicherungen, Hochstühle und Kinderbetten sind auf Anfrage erhältlich</li>
      <li><b>Gemeinsamer Wohnbereich:</b> Ein Gemeinschaftsraum mit bequemen Sitzgelegenheiten, einem Fernseher und Unterhaltungsmöglichkeiten zum Entspannen und Beisammensein.</li>
      <li><b>Außenterrasse:</b> Außenbereich mit Sitzgelegenheiten</li>
      <li><b>Gemeinsame oder mehrere Bäder:</b> Ausreichende Sanitäranlagen, entweder gemeinsam genutzt oder mit mehreren Bädern</li>
      <li><b>Sicherheitsmaßnahmen:</b> Sichere Geländer, gut gewartete Strukturen und Sicherheitsvorkehrungen, um einen sorgenfreien Aufenthalt für Familien und Gruppen zu gewährleisten.</li>
          <br>
      <li style="list-style: none;"><b>Preis pro Nacht Grupen-Baumhaus bis 4 Personen:<br></b> 120 Euro</li>
          <br>
      <li style="list-style: none;"><b>Preis pro Nacht Grupen-Baumhaus bis 6 Personen:<br></b> 160 Euro</li>
      <li style="list-style:none; margin-top: 20px"><div><p><a class="btn btn-lg" role="button" data-toggle="modal" data-target="#myModal">Zur Buchung</a>
          <a class="btn btn-default" role="button" href="#navbar" style="height:45px;"><span class="glyphicon glyphicon-arrow-up"></span>
        <span class="sr-only">zurück nach oben</span></a></p></div></li>
      </ul>
     
     </div>
  <div class="col-md-6">
<!--      <img src="ueberblick/2er.PNG" style="margin-top:120px; box-shadow: 9px 9px 6px grey;"></div>-->
     <div id="carousel-3" class="carousel slide" data-ride="carousel" style="margin-top:120px; box-shadow: 9px 9px 6px grey;">
  <!-- Positionsanzeiger -->
  <ol class="carousel-indicators">
    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
    <li data-target="#carousel-example-generic" data-slide-to="3"></li>
  </ol>

  <!-- Verpackung für die Elemente -->
  <div class="carousel-inner" role="listbox">
    <div class="item active">
      <img src="download%20(2).png" alt="...">
      <div class="carousel-caption">
        <p>Wohnzimmer</p>
      </div>
    </div>
    <div class="item">
      <img src="download%20(5).png" alt="...">
      <div class="carousel-caption">
        <p>Balkon</p>
      </div>
    </div>
        <div class="item">
      <img src="download%20(8).png" alt="...">
      <div class="carousel-caption">
        <p>Badezimmer 1</p>
            </div></div>
    <div class="item">
      <img src="download%20(10).png" alt="...">
      <div class="carousel-caption">
        <p>Badezimmer 2</p>
      </div>
    </div>
  </div>

  <!-- Schalter -->
  <a class="left carousel-control" href="#carousel-3" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Zurück</span>
  </a>
  <a class="right carousel-control" href="#carousel-3" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Weiter</span>
  </a>
</div>
    </div>  
</div></div>
        
 <!--/ Ende Block Einzelbeschreibung -->   
    
  <!--/ Start Block Einzelbeschreibung Bungalow inkl Trennlinie -->     
    
<hr>
    
<div class="container" style="margin-top:90px;">
 <div class="row">
  <div class="col-md-6">
      <h4 class="detailtitle" id="bungalow">
      <b>Ebenerdiger Bungalow</b></h4>
      <ul class="description" style="color:black; margin-top:40px;">
      <li style="text-align: left;">Eine komfortable und bequeme Unterkunft für diejenigen, die es vorziehen, nicht in luftiger Höhe zu wohnen</li>
      <li><b>Vollständig möbliert:</b><br>Gut ausgestattet mit bequemen Betten, Sitzecken und den wichtigsten Annehmlichkeiten.</li>
      <li><b>Eigenes Bad:</b><br>Badezimmer mit Dusche, Waschbecken und Toilette bietet Komfort und Privatsphäre.</li>
      <li><b>Kochnische + Essecke:</b> kleine Küchenzeile, die mit einfachen Geräten und Utensilien für die Zubereitung einfacher Mahlzeiten ausgestattet ist, inkl. Tisch und Sitzgelegenheiten</li>
      <li><b>Wohnbereich:</b> Eine gemütliche Sitzecke mit bequemen Sofas oder Sesseln zum Entspannen und Relaxen.</li>
      <li><b>Außenbereich:</b> Terrasse mit Sitzgelegenheiten</li>
      <li><b>Zugänglichkeit:</b> Die Zimmer sind so gestaltet, dass sie auch für Gäste mit Mobilitätseinschränkungen oder besonderen Bedürfnissen zugänglich sind</li>
       <li><b>In der Nähe von Annehmlichkeiten:</b> Günstige Lage in der Nähe der wichtigsten Einrichtungen des Baumhaus-Hotels, z. B. Rezeption, Restaurant oder Erholungsbereiche.</li>
      <li><b>Unvergessliches Baumhaus-Erlebnis:</b> Auch wenn sie sich auf dem Boden befinden, können die Gäste die einzigartige Atmosphäre und den Charme eines Aufenthalts in einem Baumhaus-Hotel genießen und in der Nähe Abenteuer erleben und die Natur erkunden.</li>
      <br>
      <li style="list-style: none;"><b>Preis pro Nacht Bungalow bis 4 Personen:</b> 130 Euro</li>
       
      <li style="list-style:none; margin-top: 20px"><div><p><a class="btn btn-lg" role="button" data-toggle="modal" data-target="#myModal">Zur Buchung</a>
          <a class="btn btn-default" role="button" href="#navbar" style="height:45px;"><span class="glyphicon glyphicon-arrow-up"></span>
        <span class="sr-only">zurück nach oben</span></a></p></div></li>
      </ul>
     
     </div>
  <div class="col-md-6">
<!--      <img src="ueberblick/2er.PNG" style="margin-top:120px; box-shadow: 9px 9px 6px grey;">-->
        <div id="carousel-4" class="carousel slide" data-ride="carousel" style="margin-top:120px; box-shadow: 9px 9px 6px grey;">
  <!-- Positionsanzeiger -->
  <ol class="carousel-indicators">
    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
  </ol>

  <!-- Verpackung für die Elemente -->
  <div class="carousel-inner" role="listbox">
    <div class="item active">
      <img src="download%20(7).png" alt="...">
      <div class="carousel-caption">
        <p>Wohnzimmer</p>
      </div>
    </div>
    <div class="item">
      <img src="download.png" alt="...">
      <div class="carousel-caption">
        <p>Schlafzimmer</p>
      </div>
    </div>
        <div class="item">
      <img src="download%20(9).png" alt="...">
      <div class="carousel-caption">
        <p>Badezimmer</p>
      </div>
    </div>
  </div>

  <!-- Schalter -->
  <a class="left carousel-control" href="#carousel-4" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Zurück</span>
  </a>
  <a class="right carousel-control" href="#carousel-4" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Weiter</span>
  </a>
</div>
     
     </div>
    </div>  
</div>
    
    
        
 <!--/ Ende Block Einzelbeschreibung -->    

    

<!-- Modal -->
    
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document" style="display: flex;
            flex-direction: column;">
      
<!--
      <div class="modal-dialog flex-container" role="document" style="display: flex;
            flex-direction: column;">
-->
          
    <div class="modal-content" style=" font-family: 'Wix Madefor Display', sans-serif; background-color: #eeffcc;">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel" style="font-family: 'Shadows Into Light', cursive;">The Last Adventure Camp</h4>
       
      </div>
    
        <form method="post" accept-charset="UTF-8">
      <div class="modal-body">
<!--          <div class="container" id="übersicht"></div>-->
          <div class="container" id="eingabe">
          <h2>Deine Buchungsanfrage</h2>
          <br>
             
              <div class="row">
              <fieldset>
                    
                    <div class="col-md-2 " >
                        <label for="unterkunft">Wähle deine Unterkunft:</label></div>
                  <div class="col-md-1">  
                  <select class="reihe1 feld" name="unterkunft" id="unterkunft" style="
                        height: 35px;">
                      <option value="2er" name="2er">Baumhaus bis 2 Personen</option>
                      <option value="Deluxe2pers" name="Deluxe2pers">Deluxe Baumhaus, bis 2 Pers.</option>
                      <option value="Deluxe4pers" name="Deluxe4pers">Deluxe Baumhaus, bis 4 Pers.</option>
                      <option value="Gruppe4pers" selected="selected" name="Gruppe4pers">Gruppen-Baumhaus bis 4 Pers.</option>
                      <option value="Gruppe6pers" name="Gruppe6pers">Gruppen-Baumhaus bis 6 Pers.</option>
                      <option value="Bungalow" name="Bungalow">Bungalow, 2 bis 4 Personen</option>
                        </select></div></fieldset></div>
                  <div class="row">  
                <div class="col-md-2">
                    <label for="Personenzahl">Personenanzahl:</label></div>
                      <div class="col-md-6">
                    <select class="reihe1 feld" name="Personenzahl" id="Personenzahl" style="height: 35px;">
                      <option value="1" name="1Pers">1 Person</option>
                      <option value="2" name="2Pers"selected="selected">2 Personen</option>
                      <option value="3" name="3Pers">3 Personen</option>
                       <option value="4" name="4Pers">4 Personen</option>
                       <option value="5" name="5Pers">5 Personen</option>
                        <option value="6" name="6Pers">6 Personen</option>
                    </select>
                    </div>
                    </div></div>
             
              
          

          
            <div class="row" style="margin-top: 10px;">  
                <div class="col-md-6"><label style="margin-left:3%;" for="from">Anreise:</label>
                    <input required class="reihe1 feld extra" type="date" id="from" name="from" placeholder="Anreise"></div>
                
                <div class="col-md-6">
                    <label style="margin-left:3%;" for="to">Abreise:</label>
                    <input required class="reihe2 feld extra" type="date" id="to" name="to" placeholder="JJJJ.MM.TT"></div></div>
              
            <div class="row inputLabel"> 
                <label for="daten">Deine Kontaktinformartionen</label></div>
           <div class="row">
               <div class="col-md-6">   
               <input class="reihe1 feld" type="text" id="vorname" name="vorname" placeholder="Vorname" required></div>
               <div class="col-md-2">   
               <input required class="reihe2 feld" type="text" id="nachname" name="nachname" placeholder="Nachname"></div></div>
            <div class="row">
               <div class="col-md-6"> 
               <input required class="reihe1 feld" type="email" id="email" name="email" placeholder="E-Mail"></div>
                <div class="col-md-2"> 
                <input required class="reihe2 feld" type="email" id="mailcheck" name="mailcheck" placeholder="E-Mail wiederholen"></div></div>       
            
              
            <div class="row inputLabel">
                <label for="adresse">Adresse</label></div>
            <div class="row">
               <div class="col-md-6">
                   <input required class="reihe1 feld" type="text" id="straße" name="straße" placeholder="Straße"></div>
              <div class="col-md-2">  
                  <input required class="reihe2 feld" type="number" id="hausnummer" name="hausnummer" placeholder="Hausnummer"></div></div>
          
                
             <div class="row">
               <div class="col-md-6">
                   <input required class="reihe1 feld" type="text" id="plz" name="plz" placeholder="PLZ"></div>
                   <div class="col-md-2"> <input required class="reihe2 feld" type="text" id="stadt" name="stadt" placeholder="Stadt"></div></div>
             
                 <div class="row">
               <div class="col-md-6">     
            <input class="reihe1 feld" type="tel" id="telefon" name="telefon" placeholder="Telefonnummer (optional)"></div></div>

             
              <div class="row inputLabel">
                  <label for="weitere Infos">Was ihr uns sonst noch mitteilen wollt:</label></div>
              <div class="row">
                  <textarea name="infos" style="width: 94%; height: 210px; margin-left:13px;" id="infos"></textarea></div>         
                </div>
              
           
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Abbrechen</button>
          <a href="#"><input type="submit" class="btn btn-primary" name="abschicken" value="Verfügbarkeit prüfen" onclick="document.getElementById('versteckt').value = 1"></a>
        <input type="hidden" id="versteckt" name="versteckt" value="0">
      </div></form>
        <!-- Änderung  -->
    </div>
  </div>
</div>  
        
  <!-- 2. Modal-->         
        
<div class="modal fade" id="modal2" tabindex="-1" role="dialog" aria-labelledby="meinModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style=" font-family: 'Wix Madefor Display', sans-serif; background-color: #eeffcc; font-weight:bold;">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Schließen"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="meinModalLabel" style="font-family: 'Shadows Into Light', cursive; font-weight:bold;"><?php echo $überschrift; ?></h4>
      </div>
      <div class="modal-body">
        <?php echo $text; ?>
      </div>
      <div class="modal-footer">
        
          <form class="form-inline" method="post">
          <button type="button" class="btn btn-default" data-dismiss="modal" id="zurückzurbuchung">Zurück</button>
          
          <a href="#"><input type="submit" class="btn btn-primary" name="buchen" id="buchen" value="Verbindlich Buchen" onclick="document.getElementById('versteckt1').value = 1"></a>
        <input type="hidden" id="versteckt1" name="versteckt1" value="0"></form>
 
      </div>
    </div>
  </div>
</div>     
          
        
   <!-- Ende 2. MOdal-->        
      
    <script type="text/javascript">
        
        var tester= <?php echo $test; ?>;
    
        if (tester >0){       
            $('#modal2').modal('show');}
        
        if (tester>1){    
            document.getElementById('buchen').style.display='none';}    

    </script>
        
        
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>

        
    </body>
    
    <?php include("footer.html"); ?>
    

</html>