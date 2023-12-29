
<?php

function my_autoloader($class) {
    include 'class.typ.php';
}

spl_autoload_register('my_autoloader');


//error_reporting(E_ALL);    
//$debug = true; // or
//$debug = false;

$Fehler="";

if (isset($_POST['versteckt']) && $_POST['versteckt'] == 1){
	
    $emaileingabe=$_POST["emaileingabe"];
    $buchungsnreingabe=$_POST["buchungsnreingabe"];
    
    // Nutzername, PW etc. unsichtbar gemacht
     $link =mysqli_connect("sql305.infinityfree.com","xxxxxxxxxxxxx","xxxxxxxxxx", "xxxxxxxxxxxxxxxxxx");
    
        if(mysqli_connect_error()){
            echo("Fehler");
        }
        else {
            
            $auswahl="SELECT * FROM `buchungen` WHERE buchungsnummer=$buchungsnreingabe";
            $result = $link->query($auswahl);
            if (mysqli_num_rows($result) > 0) {
                while($row = $result->fetch_assoc()) {
//                    echo $row["buchungsnummer"];
                if ($row["email"]==$emaileingabe){
                    
                    $anreiseeingabe=$row["anreise"];
                    $abreiseeingabe=$row["abreise"];
                    $buchungsnummereingabe=$row["buchungsnummer"];
                    $vollername=$row["vorname"]." ".$row["nachname"];
                    $buchungszeitpunkt=$row["buchungsdatum"];
                    $id=$row["id"];
                    $kategorie= $row["kategorie"];
                    $preis=$row["preis"];
                        
                    
                    $obj = new Typ();
                    $haustyp= $obj->uebersetzen($row["kategorie"]); 
                    
                    SESSION_START();
                    
                    $_SESSION["anreiseeingabe"]=$anreiseeingabe;
                    $_SESSION["abreiseeingabe"]=$abreiseeingabe;
                    $_SESSION["buchungsnummereingabe"]=$buchungsnummereingabe;
                    $_SESSION["vollername"]=$vollername;
                    $_SESSION["buchungszeitpunkt"]=$buchungszeitpunkt;
                    $_SESSION["haustyp"]=$haustyp;
                    $_SESSION["id"]=$id;
                    $_SESSION["kategorie"]=$kategorie;
                    $_SESSION["preis"]=$preis;
                    
                    
                    header("Location: http://page1.42web.io/Projekte/Baumhaus/Buchungsverwaltung2.php");
                }
                    else{
                        $Fehler= "Wir konnten die von Ihnen eingegebenen Daten leider keiner existierenden Buchung zuordnen. Bitte überprüfen Sie Ihre Eingabe";
                    }
                
            }}
                else{
                    $Fehler="Die von Ihnen eingegebene Buchungsnummer existiert nicht. Bitte überprüfen Sie Ihre Eingabe";
                            }
        }}
   include("menue.html");         
 ?>

<!DOCTYPE html>

<html>
    <head>
   <style type="text/css">
      
       .container{
          
           margin-top:15%;
           width: 60%;
            font-family: 'Wix Madefor Display', sans-serif;
       }
       
       .help-block{
           margin-bottom: 7%;
            font-weight: bold;
           font-size: 20px;
           text-align: center;
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
              height: 115%;
              opacity: 0.3;
              background-image: url('Wald3.jpg');
              background-repeat: no-repeat;
              background-position:center;
              background-size: cover;
              background-attachment:scroll;
            }

            .demo-content {
              position: relative;
            }

       #Fehlermeldung{
           margin-top: 10%;
           color: coral;
       }
       

    </style>
   
    </head>

    <body>
        
        <div class="demo-wrap">
            <div class="container demo-content">
                <p class="help-block" id="help">Zum Bearbeiten Ihrer Buchung melden Sie sich bitte mit Ihren Buchungsdaten an:</p>
                <form class="col-md-4 col-md-offset-4 col-xs-12" method="post">
                  <div class="form-group">

                      <label for="beispielFeldEmail1">Email-Adresse</label>
                    <input type="email" class="form-control" id="beispielFeldEmail1" placeholder="Email-Adresse" name="emaileingabe">
                  </div>
                  <div class="form-group">
                    <label for="beispielFeldPasswort1">Buchungsnummer</label>
                    <input type="password" class="form-control" id="beispielFeldPasswort1"  name="buchungsnreingabe">
                  </div>

                    <a href="#"><input type="submit" class="btn btn-primary" name="anmelden" value="anmelden" onclick="document.getElementById('versteckt').value = 1"></a>
                    <input type="hidden" id="versteckt" name="versteckt" value="0">

                    <p class="help-block" id="Fehlermeldung"><?php
                    echo $Fehler;?></p>
                </form>


            </div>   
        </div>        
        

        
    </body>
</html>
