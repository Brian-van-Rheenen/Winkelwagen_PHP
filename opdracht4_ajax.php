<?php
//Start de sessie
session_start();

//Haal het artikelnummer uit de link
$artikelnummer = $_GET['artikelnummer'];

//Als de sessie nog niet bestaat
if (!isset($_SESSION['kassa'][$artikelnummer]))
{
	//Maak de sessie aan met het artikelnummer als key en het aantal stuks
	$_SESSION['kassa'][$artikelnummer] = 1;
}

//Als de sessie al bestaat
else
{
	//Update de sessie met het artikelnummer als key en het aantal stuks
	$_SESSION['kassa'][$artikelnummer]++;
}

//Als er al een sessie bestaat
if (isset($_SESSION['teller']))
{
	//Lees de sessie uit, vul de teller
	$teller = $_SESSION['teller'];
}

//Anders
else
{
	//Zet de teller op 0
	$teller = 0;
}

//Teller +1
$teller++;

//Update de sessie met de teller
$_SESSION['teller'] = $teller;

//Laat het resultaat van de grootte van de teller zien
echo "Items: " . $_SESSION['teller'];