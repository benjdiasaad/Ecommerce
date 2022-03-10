<?php

function getPrix($prixEnDecimal){
    $prix = floatval($prixEnDecimal);
    return number_format($prix, 2, ',', ' ').' DH';
}