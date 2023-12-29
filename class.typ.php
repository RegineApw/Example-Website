<?php
class Typ
{

    public function uebersetzen($input) {

        switch($input){
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
    
    return $typ;
    }
    
    }