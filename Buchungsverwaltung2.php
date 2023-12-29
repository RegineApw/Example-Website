<?php


SESSION_START();


$warnung="";

// Nutzername, PW etc. unsichtbar gemacht
$link =mysqli_connect("sql305.infinityfree.com","xxxxxxxxxxxxx","xxxxxxxxxx", "xxxxxxxxxxxxxxxxxx");
    
if(mysqli_connect_error()){
            echo("Fehler");
     }

//     Abmelden:
            
if (isset($_POST['versteckt2']) && $_POST['versteckt2'] == 1){
    SESSION_DESTROY();
    header("Location: http://page1.42web.io/Projekte/Baumhaus/Buchungsverwaltung.php");}
            
//   Datumsänderung anfragen:

if (isset($_POST['versteckt3']) && $_POST['versteckt3'] == 1){
    
//   checken ob noch 14 Tage vor Buchung:
    
date_default_timezone_set('Europe/Zurich');
                $heute = date("Y-m-d");
                $geplant=$_SESSION["anreiseeingabe"];

                $resttage= round(abs(strtotime($geplant) - strtotime($heute)) / (60*60*24));

            if($resttage <14){
            $warnung= "<p>Leider können Sie Ihre Buchung zum jetzigen Zeitpunkt nicht mehr kostenlos ändern. Der volle Betrag wird auch bei Nichtanreise fällig.</p>";  
           }
    
        elseif($_POST["datum1"] > $_POST["datum2"]){
            $warnung= "<p>Bitte überprüfen Sie Ihre Eingabe</p>";          
        }
    
        elseif(($_POST["datum1"] < $heute) or ($_POST["datum2"] < $heute)) {
            $warnung= "<p>Bitte überprüfen Sie Ihre Eingabe</p>";          
        }
        
    else{
    
    
        $haus="";
        $grenze=4;


    $Neueanreise=$_POST["datum1"];
    $Neueabreise=$_POST["datum2"];
    
    $_SESSION["Neueanreise"] =$Neueanreise;
    $_SESSION["Neueabreise"] =$Neueabreise;
          
        
    $link =mysqli_connect("sql305.infinityfree.com","epiz_33863583","Q2F7C2xvQF", "epiz_33863583_w478");
    
        if(mysqli_connect_error()){
//            echo("Fehler");
        }
        else {
            
//    prüfen ob zum neuen Datum noch genug frei ist
            
            $id= $_SESSION["id"];
            $kategorie =$_SESSION["kategorie"];
            
            
            $auswahl="SELECT * FROM `buchungen`";
            $result = $link->query($auswahl);
            if (mysqli_num_rows($result) > 0) {
                $zaehler=0;
              while($row = $result->fetch_assoc()) {
                    if(($row["kategorie"]==$kategorie) and((($Neueanreise >= $row["anreise"]) and ($Neueanreise <= $row["abreise"]))or(($Neueabreise >= $row["anreise"]) and ($Neueabreise <= $row["abreise"])))){
                  
                        $zaehler= $zaehler+1;
//                        echo $zaehler;
                    }}}
                
             else {
//              echo "0 results";
            };
              
        
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
        break;}
    
    $_SESSION["haus"] =$haus;
            
    switch($kategorie){
        case "A":
        $preis=(floor((strtotime($Neueabreise) - strtotime($Neueanreise)) / (60 * 60 * 24)))*85;
        break;
       case "B":
        $preis=(floor((strtotime($Neueabreise) - strtotime($Neueanreise)) / (60 * 60 * 24)))*130;
        break;
        case "C":
        $preis=(floor((strtotime($Neueabreise) - strtotime($Neueanreise)) / (60 * 60 * 24)))*180;
        break;
        case "D":
        $preis=(floor((strtotime($Neueabreise) - strtotime($Neueanreise)) / (60 * 60 * 24)))*120;
        break;
        case "E":
        $preis=(floor((strtotime($Neueabreise) - strtotime($Neueanreise)) / (60 * 60 * 24)))*160;
        break;
        case "F":
        $preis=(floor((strtotime($Neueabreise) - strtotime($Neueanreise)) / (60 * 60 * 24)))*130;
        break;
    }
    
 
    $_SESSION["Neuerpreis"] =$preis;


header("Location: http://page1.42web.io/Projekte/Baumhaus/Buchungsverwaltung3.php");

                        }
else{
    
     $warnung= "Die gewünschte Änderung ist leider nicht möglich"; 
   
    }        
}}}
     

?>

<!DOCTYPE html>
<html>
    <head>
   
       <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        
    <meta name="viewport" content="width=device-width, initial-scale=1">
        
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<!--    <script src="jquery-ui/jquery-ui.js"></script>-->
    
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
            font-family: 'Wix Madefor Display', sans-serif;
        }
        
      
       .container{
          
           margin-top:10%;
           width: 40%;
       }
       
       #td{
           margin-left: 10px 20px 10px 20px;
     
       }
       
     .demo-wrap {
              position: relative;
            }

            body:before {
              content: ' ';
              display: block;
              position: absolute;
              left: 0;
              top: 0;
              width: 100%;
              height: 180%;
              opacity: 0.3;
              background-image: url('Wald3.jpg');
              background-repeat: repeat-y;
              background-position:center;
              background-size: cover;
              background-attachment:scroll;
            }

            .demo-content {
              position: relative;
            }
            
            .form-group{
                margin-top: 30px;
            }
            
            #benachrichtigung {
              margin-top: 30px;
            font-weight: bold;
            font-size: 20px;
            color: crimson;
            }
       
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
   
    <div class="demo-wrap">

   
        <div class="container demo-content">
        
        <div class="row justify-content-between">
            <div class="col-5">
              <table class="table table-bordered table-responsive">
                <caption><h3>Buchungsübersicht</h3></caption>
                <tr class="success">
                  <th>Ihre Daten</th>
                    <th></th>
                </tr>
                <tr class="active">
                  <td>Buchungsnummer</td>
                  <td><?php echo $_SESSION["buchungsnummereingabe"];?></td>
                </tr>
                <tr class="active">
                  <td>Name</td>
                  <td><?php echo $_SESSION["vollername"];?></td>
                </tr>
                <tr class="active">
                  <td>Unterkunft</td>
                  <td><?php echo $_SESSION["haustyp"];?></td>
                </tr>
                <tr class="active">
                  <td>Anreise</td>
                  <td><?php echo $_SESSION["anreiseeingabe"];?></td>
                </tr>
                <tr class="active">
                  <td>Abreise</td>
                  <td><?php echo $_SESSION["abreiseeingabe"];?></td>
                </tr>
                  <tr class="active">
                  <td>Preis in Eur.</td>
                  <td><?php echo $_SESSION["preis"];?></td>
                </tr>
              </table>
                <form method="post">


                    <!---Button stornieren -->
                    <a  role="button" data-toggle="collapse" href="#collapseform2" aria-expanded="false" aria-controls="collapseform2"><input type="submit" class="btn btn-danger" name="stornieren" value="Buchung stornieren"> </a>

                    <!--xx--->

                <a  role="button" data-toggle="collapse" href="#collapseform" aria-expanded="false" aria-controls="collapseform"><input type="submit" class="btn btn-primary" name="datenänderung" value="Reisedaten ändern" onclick="document.getElementById('versteckt1').value = 1"></a>
                        <input type="hidden" id="versteckt1" name="versteckt1" value="0">


                <a href="#"><input type="submit" class="btn btn-primary" name="ausloggen" value="ausloggen" onclick="document.getElementById('versteckt2').value = 1"></a>
                        <input type="hidden" id="versteckt2" name="versteckt2" value="0">
                </form>

                <!---2x Button Ja/ nein ausklappen -->
                   <form class="form-inline collapse" id="collapseform2" method="post">
                     <div>
                    <h4 style="margin-top=20%; margin-bottom: -10px; color=red;">Möchten Sie die Buchung wirklich entgültig stornieren?</h4>   
                  </div>

                <div class="form-group" method="post">
                <a href="#"><input type="submit" class="btn btn-success" name="ja" value="Ja" onclick="document.getElementById('versteckt4').value = 1"></a>
                    <input type="hidden" id="versteckt4" name="versteckt4" value="0">

                <a data-toggle="collapse" href="#collapseform2" data-target="#collapseform2" aria-expanded="true" aria-controls="collapseform2"><input type="submit" class="btn btn-danger" name="nein" value="Nein" onclick="document.getElementById('versteckt5').value = 1"></a>
                    <input type="hidden" id="versteckt5" name="versteckt5" value="0"></div>
                </form>      

                    <!---xx -->

                <!---Input Datumsänderung ausklappen -->
                 <form class="form-inline collapse" id="collapseform" method="post">
                     <div class="form-group">
                         <label for="datum1">Neue Anreise:</label>
                    <input type="date" class="form-control" id="datum1" name="datum1" placeholder="neue Anreise">
                  </div>
                     <div class="form-group">
                <label for="datum2">Neue Abreise:</label>
                <input type="date" class="form-control" id="datum2" name="datum2" placeholder="neue Anreise">
                     </div>
                <div class="form-group" style="margin-left:15px;">
                <a href="#"><input type="submit" class="btn btn-success" name="ueberprüfen" value="Daten prüfen" onclick="document.getElementById('versteckt3').value = 1"></a>
                    <input type="hidden" id="versteckt3" name="versteckt3" value="0"></div>
                </form>


                <!---benachrichtigung -->

                <div id="benachrichtigung">
                <?php

                    if (isset($_POST['versteckt4']) && $_POST['versteckt4'] == 1 )
                        {
                        date_default_timezone_set('Europe/Zurich');
                        $heute = date("Y-m-d");
                        $geplant=$_SESSION["anreiseeingabe"];
        //                echo "<p>".$heute."</p>";
        //                echo $_SESSION["anreiseeingabe"];
                        $resttage= round(abs(strtotime($geplant) - strtotime($heute)) / (60*60*24));
        //                $resttage= $heute - $_SESSION["anreiseeingabe"];
                        if($resttage <14){
                            echo "<p>Leider können Sie Ihre Buchung zum jetzigen Zeitpunkt nicht mehr kostenlos stornieren. Der volle Betrag wird auch bei Nichtanreise fällig.</p>";  }
                        else{
                            $BN=$_SESSION["buchungsnummereingabe"];
                            $loeschen= "DELETE FROM `buchungen` WHERE `buchungsnummer`=$BN LIMIT 1";
        //                            if ($loeschen->execute()) {
        //                            echo "<p>Datensatz wurde gelöscht</p>";
        //                                }
                                if ($link->query($loeschen) === TRUE) {
                                    echo "<p>Ihre Buchung wurde gelöscht. Wir freuen uns wenn wir Sie zu einem anderen Zeitpunkt bei uns begrüßen können.</p>";
                                        } 
                                else {
                                          echo "Es ist ein Fehler aufgetreten, bitte kontaktieren Sie uns";       
                                    }
                                }
                            }
                ?>
                </div>


                <div id="änderungsanfrage">
                <h4 style="color:red; font-weight: bold;"><?php echo $warnung; ?></h4>           
                </div>
            </div>
                 
        </div>
    </div>

      
        
        
      <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>    
   
        
    </body>
</html>
