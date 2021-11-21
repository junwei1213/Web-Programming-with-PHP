<?php

$ceu = array(
    "Italy" => "Rome",
    "Belgium" => "Brussels",
    "Denmark" => "Copenhagen");

asort($ceu);

foreach($ceu as $key => $value){
    echo " The capital of $key is $value <br />";
}