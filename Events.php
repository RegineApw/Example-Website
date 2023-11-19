
<?php

include("menue2.html");

 ?>

<!DOCTYPE html>

<html>
<head>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Amatic+SC:wght@700&family=Caveat:wght@500;600&family=Open+Sans&family=Roboto:wght@100&family=Shadows+Into+Light&family=Wix+Madefor+Display&display=swap" rel="stylesheet">
     <!--Extra Style Event Page-->    
<style type="text/css">
 
    body{
        margin:0;
        padding:0;}

    #frame{
         position: fixed; z-index: -99; width: 100%; height: 160%;   
        }

    iframe{
        opacity: 0.3;
        margin-top:-20%;
        }


    #schriftrolle{
        position:relative;
        }

    #papyrus{
        z-index: 1; width: 75%; height: 75%;
        }


    @media screen and (max-width:1700px) {
        #papyrus
        { margin-left:10%; z-index: 1;height: 70%}

        iframe{
            margin-top:-10%;
             margin-left:-20%;
        }
        #frame{
            width:265%;
        }
        }


    @media screen and (max-width:768px) {
        #papyrus{ 
            margin-left:10%; z-index: 1;height: 70%}

        iframe{
            margin-top:-27%;
        }
        #frame{
            width:265%;
        }
        }
    
</style>   
</head>


<body>
   <div id="frame" > 
        <iframe height="100%" width="100%"  src="https://www.youtube.com/embed/edKgbxcn5UA?autoplay=1&controls=0&loop=1&rel=0&showinfo=0&autohide=1&wmode=transparent&hd=1" frameborder="0" allow="accelerometer; autoplay; fullscreen" allowfullscreen> </iframe>   
    </div>

    <div class="container" style=" z-index: 1;">
        <div class="row">
          <div class="col-md-2 col-xs-0"></div>
          <div class="col-md-9 col-xs-12" id="schriftrolle" ><img id="papyrus" src="papyrus2.png"></div>
          <div class="col-md-1 col-xs-0"></div>
        </div>    
    </div>       
</body>
    
</html>



    

