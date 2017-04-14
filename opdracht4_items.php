<?php
//Start de sessie
session_start();

//Als er al een sessie bestaat
if (isset($_SESSION['teller']))
{
	//Lees de sessie uit, vul de teller
	$teller = $_SESSION['teller'];
}
else
{
	//Zet de teller op 0
	$teller = 0;
}

//Update de sessie met de teller
$_SESSION['teller'] = $teller;

//Laat het resultaat van de grootte van de teller zien
echo "Items: " . $_SESSION['teller'];