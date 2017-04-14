<?php
require '../../../config.php';

// Zoek in de database
$result = mysqli_query($mysqli, "SELECT * FROM mphp6_meubels");

// Zijn er records gevonden?
if (mysqli_num_rows($result) > 0)
{
	//Maak de cellen voor de kopjes.
	echo "<table border='1'>";

	//Header kopjes in de tabel
	echo "<tr>
			 <th><strong>Foto:</strong></th>
			 <th><strong>Artikelnummer:</strong></th>
			 <th><strong>Naam:</strong></th>
			 <th><strong>Type:</strong></th>
			 <th><strong>Beschrijving:</strong></th>
			 <th><strong>Prijs:</strong></th>
			 <th><strong>Kopen:</strong></th>
			 </tr>";
	echo "</thead>";
	
	// Lees alle gevonden records
	while ($row = mysqli_fetch_array($result))
	{
		echo "<tr>";
		
		//Laat alle informatie voor de passende meubel zien
		echo "<td><img src='meubels/" . $row['foto']. "'/></td>";
		echo "<td>" . $row['artikelnr'] . "</td>";
		echo "<td>" . $row['naam'] . "</td>";
		echo "<td>" . $row['type'] . "</td>";
		echo "<td>" . $row['omschrijving'] . "</td>";
		echo "<td>" . $row['prijs'] . "</td>";
		echo "<td><button onClick='teller(".$row['artikelnr'].")'>Toevoegen</button></td>";
		
		echo "</tr>";
	}
	
	//Sluit de tabel
	echo "</table>";
}

//Als er geen foto's gevonden zijn
else
{
	//Laat dan een melding zien
	echo "Er zijn geen producten gevonden";
}