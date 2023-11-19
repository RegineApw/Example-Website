
<?php

include("menue.html");

 ?>

<!DOCTYPE html>

<html>
    <head>

<!--Höhe des Containers Unterhakb des Titelbildes bestimmern -->       

        <script type="text/javascript">
        
    $(function(){

       var width=$(window).innerWidth();
       var sw= Math.round(width/2.52); 
        document.getElementById("wechselbild").style.maxHeight=sw+"px";
        var abstand=sw+15;
        document.getElementById("inhalt").style.marginTop=abstand+"px";

    });
        
        </script>
    
        <!--Style landing page--> 
            <style type="text/css">
       
                #wechselbild{
                    width: 100%;
                    max-height: 720px;
                    }

                .jumbotron{
                    background-color:transparent;
                    color:darkgreen;
                    text-align: center;
                    font-family: 'Wix Madefor Display', sans-serif;
                    margin-top: 30px;        
                    }
                #Teaser{
                    font-family: 'Shadows Into Light', cursive;
                    }
        
                #description1{
                    margin: 0 auto;
                    text-align:justify;
                    }
                body{
                    background-color: #eeffcc;
                    }
                #lücke{
                    width: 100%;
                    height: 40px;
                    margin-top: -60px;
                    }
                #baumhaus_klein_titel{
                    margin-top: 20px;
                    width: auto;
                    height: 400px;
                    box-shadow: 9px 9px  6px grey;
                    }
                .kurzbeschreibung {
                    margin: 30px;
                    }
        
                .slides img:nth-child(1) {
                    position:absolute;
                    z-index: 1;
                    margin:0;
                    opacity: 0;
                    max-height: inherit;
                    box-shadow: 0px 9px  6px grey;
                    }   
                .slides img:nth-child(2) {
                    position:absolute;
                    z-index: 2;
                    margin:0;
                    opacity: 0;
                    max-height: inherit;
                    box-shadow: 0px 9px  6px grey;
                    }
                .slides img:nth-child(3) {
                    position:absolute;
                    z-index: 3;
                    margin:0;
                    max-height: inherit;
                    box-shadow: 0px 9px  6px grey;
                    }

                .slides img:nth-child(1) {
                    animation: fade 15s 10s infinite ease-in;
                    }
                .slides img:nth-child(2) {
                    animation: fade 15s 5s infinite ease-in;
                    }
                .slides img:nth-child(3) {
                    animation: fade 15s 0s infinite ease-in;
                    }

                @keyframes fade {
                    0%   {  opacity: 0.6;  width: 100%; }
                    31%  {  opacity: 1;  width: 100%; }
                    33%  {  opacity: 0;  width: 105%; }
                    99%  {  opacity: 0;  width: 100%; }
                    100% {  opacity: 0.6;  width: 100%; }
                        }
        
        
                /* Extra small devices (phones, 600px and down) */
                @media only screen and (max-width: 600px) {
                    .links{
                        display:flex; 
                        justify-content:center;
                            }
                    .rechts{
                        display:flex; 
                        justify-content:center;
                            }

                }

                /* Small devices (portrait tablets and large phones, 600px and up) */
                @media only screen and (min-width: 600px) {
                    .links{
                        display:flex; 
                        justify-content:center;
                        }
                  .rechts{
                        display:flex; 
                        justify-content:center;
                        }
                    }

                /* Medium devices (landscape tablets, 768px and up) */
                @media only screen and (min-width: 768px) {
                    .links{
                        display:flex; 
                        justify-content:center;
                        }
                    .rechts{
                        display:flex; 
                        justify-content:center;
                        }}

                /* Large devices (laptops/desktops, 992px and up) */
                @media only screen and (min-width: 992px) {
                    .links{
                        display:flex; 
                        justify-content:flex-end;
                        }
        
                    .rechts{
                        display:flex; 
                        justify-content:flex-start;
                        }}

                /* Extra large devices (large laptops and desktops, 1200px and up) */
                @media only screen and (min-width: 1200px) {
                    .links{
                        display:flex; 
                        justify-content:flex-end;
                        }
                    .rechts{
                        display:flex; 
                            justify-content:flex-start;
                            }}
                    a{
                    color:white;
                    }
        
                    .btn{
                        background-color:#26734d;
                }
        
        </style>
      
    </head>


    <body>
   
        <div id="lücke"></div>
        
    <div class="slides flex" id="wechselbild">
    <img id="Bild1" src="Waldx.jpg" alt="Blick in den Wald">
    <img id="Bild2" src="Haustitel5.jpg" alt="Dächer einiger Bamhäuser">
    <img id="Bild3" src="Waldxx.jpg" alt="Blick in den Wald">
    </div>

    <div class="jumbotron" id="inhalt">
        <h1 id="Teaser">Einfach mal die Seele baumeln lassen...</h1>
        <p>Bei einem einzigartigen Erlebnis im Einklang mit der Natur<br> Willkommen in unserem Treehouse Hotel - wo Natur auf Luxus trifft! <br></p>
    
        <div id="description1">
            <div class="row">       
                <div class="col-md-6 col-xs-12 links" id="columntest">
                    <p class="kurzbeschreibung" style="width:70%; display:flex; align-content:center;">Entfliehen Sie der Hektik des Alltags und erleben Sie die Ruhe und den Charme unseres einzigartigen Treehouse Retreats. Inmitten eines üppigen Waldes gelegen, bietet unser Hotel einen einzigartigen Rückzugsort, der die Schönheit der Natur mit dem Komfort moderner Annehmlichkeiten verbindet.
                    <br> Unsere Baumhäuser sind eine abgeschiedene Oase, in der Sie sich mit der Natur verbinden und gleichzeitig die luxuriösen Annehmlichkeiten eines erstklassigen Hotels genießen können. </p><br>
                </div>
                <div class="col-md-6 col-xs-12 rechts"><img id="baumhaus_klein_titel" src="Haustitel.jpg"></div>
            </div>

            <div class="row">  
                <div class="col-md-6 col-xs-12 links" style="display:flex; "><img id="baumhaus_klein_titel" src="essen.jpg">
                </div>
                <div class="col-md-6 col-xs-12 rechts">
                    <p class="kurzbeschreibung" style="width:70%;">Verwöhnen Sie Ihre Geschmacksnerven in unserem hauseigenen Restaurant, in dem Zutaten aus der Region zu kulinarischen Köstlichkeiten verarbeitet werden.<br> Das bezaubernde Ambiente eines Essens inmitten der Natur sorgt für ein unvergessliches Erlebnis.</p><br>
                </div>
            </div>
  
            <div class="row">       
                <div class="col-md-6 col-xs-12 links" style="display:flex;">
                    <p class="kurzbeschreibung" style="width:70%;">Begeben Sie sich auf ein Abenteuer, indem Sie die umliegenden Waldwege erkunden, versteckte Wasserfälle entdecken oder sich an Outdoor-Aktivitäten wie Wandern, Radfahren oder Rafting beteiligen.<br> Ganz gleich, ob Sie einen romantischen Kurzurlaub, einen Familienurlaub oder einen besonderen Rückzugsort mit Freunden suchen, in unserem Treehouse Hotel werden Sie eine unvergessliche Zeit haben.<br> Entspannen Sie sich, knüpfen Sie neue Kontakte und schaffen Sie bleibende Erinnerungen in einer Umgebung, in der Luxus und Natur nahtlos miteinander verschmelzen.</p><br>
                </div>
                <div class="col-md-6 col-xs-12 rechts"><img class="kurzbeschreibung" id="baumhaus_klein_titel" src="boot.jpg"></div>
            </div>
        </div>
  
        <div class="row">           
            <div class="col-md-3 col-md-offset-3" ><p><a class="btn btn-lg" href="Ueberblick.php" role="button" >Unterkünfte ansehen</a></p></div>
        </div>
</div>

              
</body>

<div id="footer">   
<?php include("footer.html"); ?>
</div>     
</html>
