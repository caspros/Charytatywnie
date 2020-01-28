<?php
	session_start();
	if ((isset($_SESSION['zalogowany'])) && ($_SESSION['zalogowany']==true))
	{
		$_SESSION['wyloguj'] = "Wyloguj";
		unset($_SESSION['zaloguj']);
	} else {
		$_SESSION['zaloguj'] = "Zaloguj";
		unset($_SESSION['wyloguj']);
	}
?>

<!DOCTYPE HTML>
<html lang="pl">

<head>
	<meta charset="utf-8"/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/normalize.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
		<link rel="stylesheet" type="text/css" href="css/hamburger.css">
	<link rel="stylesheet" type="text/css" href="css/mobile.css" media="(max-width: 800px">

	<link rel="stylesheet" type="text/css" href="css/menu.css">
	<link rel="stylesheet" type="text/css" href="css/produkt.css">
	<link href="https://fonts.googleapis.com/css?family=Noto+Sans:400,700&display=swap&subset=latin-ext" rel="stylesheet">
	<link href="fontawesome/css/all.css" rel="stylesheet">
	<title>Produkt</title>

</head>

<body>
	 <!-- Load an icon library to show a hamburger menu (bars) on small screens -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	 <!-- Load an icon library to show a hamburger menu (bars) on small screens -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<div class="topnav" id="myTopnav">

	    <a href="index.php" class="active">charytatywnie</a>

	    <a href="wyloguj.php">Wyloguj</a>
		<a href="logowanie.php">Zaloguj</a>
						
	    <a href="koszyk.php">Aktualne licytacje</a>
		<a href="zamowienia.php">Wygrane licytacje</a>
		<a href="profil.php">Ustawienia</a>
		<a href="#">
			<?php
				if ((isset($_SESSION['zalogowany'])) && ($_SESSION['zalogowany']==true))
				{
					echo "Witaj, ".$_SESSION['imie'];
				}
			?>
		</a>
		
		<a class="forma">
		  	<form action="wyszukaj.php" method="get" class="form_inline2">
						<input type="text" name="search_input" class="search_input" placeholder="Wyszukaj licytację...">
						<input type="submit" name="search_button" class="search_button" value="SZUKAJ">
			</form>
		</a>
	   
	  <a href="javascript:void(0);" class="icon" onclick="myFunction()">
	    <i class="fa fa-bars"></i>
	  </a>
	</div> 
	
	<!-- GŁÓWNY CONTAINER -->
	<div id="container_produkt">

		<!-- MIĘSO ARMATNIE -->
		<div id="main">
			<?php 
				$id_produktu = $_GET['id_produkty'];
				$servername = "localhost";
				$username = "root";
				$password = "";
				$dbname = "charytatywnie";
				// Create connection
				$conn = new mysqli($servername, $username, $password, $dbname);
				$conn -> query("SET NAMES 'utf8'");
				// Check connection
				if ($conn -> connect_error) {
					    die("Nie połączono z bazą danych: " . $conn -> connect_error);
					}

				$sql = "SELECT nazwa, opis, cena, rozmiar, zdjecie FROM produkty WHERE id_produkty=$id_produktu";
				$result = $conn -> query($sql);
				Show_product($id_produktu);
				Show_history($id_produktu)
			?>
		</div>
	</div>

    <div id="centeredmenu">
	   <ul>
	      <li><a href="FAQ.php">FAQ</a></li>
	      <li><a href="kontakt.php">Kontakt</a></li>
	      <li><a href="regulamin.php">Regulamin</a></li>
	   </ul>
	</div>

	<div id="footer">
		Korzystanie z serwisu oznacza akceptację
		<a href="regulamin.php">
			regulaminu
		</a>
	</div>	

	<script src="http://code.jquery.com/jquery-1.7.1.js"></script>
	<!-- JQUERY -->
	<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
	<!-- STICKY MENU JS-->
	<script src="js/sticky_menu.js"></script>
	<!-- STICKY MENU WITAJ ZALOGUJ SIĘ JS-->
	<script src="js/dropdown_sticky.js"></script>
	<!-- SLIDER JS-->
	<script src="js/slider.js"></script>
	<!-- TIMER JS-->
	<script src="js/timer.js"></script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

	<!-- PRICE CHANGING WHILE INCREASE AMOUT OF PRODUCT-->
	<script type="text/javascript">
			var cookies = document.cookie.split(";").
   			map(function(el){ return el.split("="); }).
    		reduce(function(prev,cur){ prev[cur[0]] = cur[1];return prev },{});
			
				$('#ile_sztuk').on('change paste', function () {
				    $("#current").html($(this).val()*cookies["MyCookie"]);
				});      
	</script>

<?php

	//Function to show product on main site
	function Show_product($id)
	{	
		$id_produktu = $_GET['id_produkty'];
		require_once "connect.php";
		$conn = new mysqli($servername, $username, $password, $dbname);
		$conn -> query("SET NAMES 'utf8'");
		if ($conn -> connect_error) { die("Nie połączono z bazą danych: " . $conn -> connect_error);}

		$sql = "SELECT id_produkty, nazwa, opis, cena, rozmiar, zdjecie FROM produkty WHERE id_produkty=$id_produktu";
		
		$result = $conn -> query($sql);
		if ($result -> num_rows > 0)
		{
	 		while($row = $result -> fetch_assoc())
	 		{	
	 			$cena_min = $row["cena"] + 5;
	 			$_SESSION['produkt']=$row["id_produkty"];
	 			setcookie("MyCookie", $row["cena"]);
	       		echo '<div id="produkt_big"><br><b>'.$row["nazwa"].'</b>
	       				<img class="zdj" src="images/products/'.$row["zdjecie"].'" width="50%" alt="product.png"><br>
			       		<div id="dane_boczne"><br><br><br>
				       		</div>
				       		<div id="zawartosc">Opis produktu: <br>'.$row["opis"].
				       		'<br><br><form action="koszyk.php" method="post">';
				       		echo 'Aktualna cena: '.$row["cena"].' Minimalne przebicie: 5 PLN<br>';
				       		echo '<input id="pomocnicze" type="hidden" name="koszyk1" value=1/>';
				       		echo '<input type="number" name="suma" min="'.$cena_min.'" width="50%" value="'.$cena_min.'"> PLN<br><br>';
				       		echo '<button type="submit" id="kup_teraz"><span style="color:white"><b>LICYTUJ</b></span></button><br><br>
				       		<div id="info5">
				       			Czas do zakończenia aukcji: <b><p id="czas"></p></b>
				       		</div>
				       		</form>
			       		</div>
	       			</div>';
			}
		} else { echo "Error w wyświetlaniu produktu. Spróbuj później"; }
	}

	function Show_history($id)
	{
		$id_produktu = $_GET['id_produkty'];
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "charytatywnie";
		$conn = new mysqli($servername, $username, $password, $dbname);
		$conn -> query("SET NAMES 'utf8'");
		if ($conn -> connect_error) { die("Nie połączono z bazą danych: " . $conn -> connect_error);}

		$sql = "SELECT id_klienci, id_produkty, MAX(cena) AS cena, data FROM historia WHERE id_produkty=$id_produktu GROUP BY id_klienci";
		$result = $conn -> query($sql);
		if ($result -> num_rows > 0)
		{
	 		while($row = $result -> fetch_assoc())
	 		{	
	 			$klient = $row["id_klienci"];
	 			$sql2 = "SELECT Imie, Nazwisko FROM klienci WHERE id_klienci='$klient'";
				$result2 = $conn -> query($sql2);
				if ($result2 -> num_rows > 0)
				{
			 		while($row2 = $result2 -> fetch_assoc())
			 		{
			 			$_SESSION['produkt']=$row["id_produkty"];
			 			echo $row2["Imie"].' '.substr($row2["Nazwisko"], 0,1).'. zalicytował '.$row["cena"].'PLN data: '.$row["data"].'<br>';
			 		}
			 	}
			}
		} else { echo "Brak historii licytowania"; }
	}


 
?>
  
<script>
	/* Toggle between adding and removing the "responsive" class to topnav when the user clicks on the icon */
	/* to ten słynny hamburger*/
	function myFunction() {
	  var x = document.getElementById("myTopnav");
	  if (x.className === "topnav") {
	    x.className += " responsive";
	  } else {
	    x.className = "topnav";
	  }
	} 
	</script>

</body>
</html>


