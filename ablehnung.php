
<?php

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
        }
        
        #absage{
            color:darkgreen;
            text-align: center;
            font-family: 'Wix Madefor Display', sans-serif;
            margin: 70px auto;
            margin-bottom: 70px;
            text-align:justify;
/*
            font-size: 35px;
            font-weight: 300;
*/
            text-align: center
        }
        

                /* kleine Handy Bildschirme */
          @media screen and (min-width:100px) {
            img{
            border-radius: 20px;
            max-height: 250px;
            box-shadow: 0 0 30px 3px #003300; }
        
        #absage{
            font-size: 25px;
            font-weight: 200;
           
        }#schild{
            height: 15%;
            width: 23%;
            font-size: 25px;}}
        
        /* Mittelgroße Bildschirme */
        @media only screen and (min-width: 768px) {
           img{
            border-radius: 30px;
            max-height: 600px; 
            box-shadow: 0 0 30px 3px #003300;  }
        
            #absage{
            font-size: 30px;
            font-weight: 200;
           
        }  #schild{
            height: 10%;
            width: 20%;
            font-size: 30px;}}
        
        
            #flex { 
        display: flex; 
        justify-content: center; 
        align-items: center;
/*                position:absolute;*/
            z-index: 1;
     
                }
        
        #schild{
            position:absolute;
            z-index: 2;
            width: 20%;
/*            height: 10%;*/
            background-color: white;
                 display: flex; 
        justify-content: center; 
        align-items: center;
            font-family: 'Shadows Into Light', cursive;
            text-align: center;
/*            font-size: 30px;*/
/*            font-weight: 200;*/
            border: solid;
            border-color: darkslategray;
            transform: rotate(10deg);
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
        
<div class="row">
  <div class="col-md-12"><h1 id="absage">Leider ist ihre gewünschte Unterkunft zu diesem Zeitraum nicht mehr verfügbar</h1></div>
  <div class="col-md-12"><div class="container" id="flex"><img src="wooden-door2.png"><div id="schild"><p>Belegt</p></div></div></div>
<div class="col-md-12"></div>
        
        
        

 </div>

   <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>     
        
    </body>
</html>