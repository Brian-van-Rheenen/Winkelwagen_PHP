<?php
require '../../../config.php';

//Start de sessie
session_start();
?>

<!doctype html>
<html>
<head>
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" href="style.css" type="text/css" media="all" />
	<script src="opdracht4.js"></script>
	<meta charset="utf-8">
	<title>Opdracht 4</title>
</head>

<body>
	<div id="main">
		<div class="shell">
			<div class="options">
				<div class="search">
					<form action="" method="post">
					</form>
				</div>

				<div class="center">
					<span class="back">
							<div class="back-ico">&nbsp;</div>
							<strong><a href="opdracht4.html" style="text-decoration: none">Terug</a></strong>
					</span>
				</div>
			</div>
			
			<div id="content">
		
				<!-- Container -->
				<div id="container">

					<div class="tabbed">

						<div class="tab-content" style="display:block;">
						
							<?php
							// Staat er al een product array in de sessie?	
							if (isset($_SESSION['kassa'])) 
							{
								//Lees die array uit
								$productarray = $_SESSION['kassa'];
							} 

							//Anders
							else 
							{
								//Laat een melding zien
								echo "Geen producten gevonden";
							}

							//Als er iets in de array zit
							if (count($productarray) > 0) 
							{
								//Maak de tabel structuur
								echo "<table border='1' width='1000px'>";
								echo 	"<h3>Alle producten in de winkelwagen</h3>";
								echo 	"<br>";
								echo 		"<thead>";
								echo 			"<tr>";
								echo 			"<th scope='col'>Foto</th>";
								echo 			"<th scope='col'>Artikelnummer</th>";
								echo 			"<th scope='col'>Naam:</th>";
								echo 			"<th scope='col'>Type:</th>";
								echo 			"<th scope='col'>Omschrijving:</th>";
								echo 			"<th scope='col'>Prijs Per Stuk:</th>";
								echo 			"<th scope='col'>Totale Prijs:</th>";
								echo 			"<th scope='col'>Aantal Stuks:</th>";
								echo 			"</tr>";
								echo 			"</thead>";
								echo 		"<tbody>";
								
								//Voor elk product in de array
								foreach ($productarray as $productnummer => $aantal) 
								{	
									// Zoek in de database
									$result = mysqli_query($mysqli, "SELECT * FROM mphp6_meubels WHERE artikelnr = '$productnummer'");
									
									// Zijn er records gevonden?
									if (mysqli_num_rows($result) > 0)
									{
										// Lees alle gevonden records
										while ($row = mysqli_fetch_array($result))
										{
											//Bereken de totale prijs
											$totaleprijs = $row['prijs'] * $aantal;
											
											//Maak een tr aan
											echo "<tr>";
											
											//Laat alle informatie voor de passende meubel zien
											echo "<td><img src='meubels/" . $row['foto']. "'/></td>";
											echo "<td align='center'>" . $productnummer . "</td>";
											echo "<td align='center'>" . $row['naam'] . "</td>";
											echo "<td align='center'>" . $row['type'] . "</td>";
											echo "<td align='center'>" . $row['omschrijving'] . "</td>";
											echo "<td align='center'>" . "€ " . $row['prijs'] . "</td>";
											echo "<td align='center'>" . "€ " . $totaleprijs . "</td>";
											
											//Vul de tabel in met de totale producten
											echo "<td align='center'>" . $aantal . "</td>";

											//Sluit de tr
											echo "</tr>";
										}
									}
								}
								
								//Eindig de tabel
								echo 		"</tbody>";
								echo "<table>";
							}
							?>
						</div>

					</div>

				</div>
				<!-- End Container -->
			
			</div>
		</div>
	</div>
</body>
</html>