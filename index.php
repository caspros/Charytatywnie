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
	<link rel="stylesheet" type="text/css" href="css/menu.css">
	<link rel="stylesheet" type="text/css" href="css/hamburger.css">
	<link rel="stylesheet" type="text/css" href="css/mobile.css" media="(max-width: 800px">


  <link rel="stylesheet" href="css/responsiveslides.css">
  <link rel="stylesheet" href="css/demo.css">

	<link href="https://fonts.googleapis.com/css?family=Noto+Sans:400,700&display=swap&subset=latin-ext" rel="stylesheet">
	<link href="fontawesome/css/all.css" rel="stylesheet">
	<title>Charytatywne Licytacje</title>

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
	<div id="container">

		<!-- MIĘSO ARMATNIE -->
		<div id="main">

			<!-- KATEGORIE -->
			    <div id="centeredmenu">
				   <ul>
				   	<li><a href="kategoria.php?id_kategorie=1">Wydarzenia</a><br></li>
					<li><a href="kategoria.php?id_kategorie=2">Przedmioty</a><br></li>
					<li><a href="kategoria.php?id_kategorie=3">Autografy</a><br></li>
					<li><a href="kategoria.php?id_kategorie=0">Wszystko</a><br></li>
				   </ul>
				</div>

			<br>
			<h1>WYRÓŻNIONE LICYTACJE:</h1>

			<!-- PRODUKTY NA GŁÓWNEJ -->
			<div id="products">
				<br>

				<a href="produkt.php?id_produkty=102"><div class="product"><?php Show_product(102);?></div></a>
				<a href="produkt.php?id_produkty=104"><div class="product"><?php Show_product(104);?></div></a>
				<a href="produkt.php?id_produkty=110"><div class="product"><?php Show_product(110);?></div></a>
				<a href="produkt.php?id_produkty=107"><div class="product"><?php Show_product(107);?></div></a>
				<a href="produkt.php?id_produkty=108"><div class="product"><?php Show_product(108);?></div></a>
				<a href="produkt.php?id_produkty=103"><div class="product"><?php Show_product(103);?></div></a>

			</div>


			<div id="why_us" class="clearfix">
				<br><br>
				<h1>Na co zostaną przeznaczone pieniądze z licytacji?</h1>

				<div class="why_us_main_container">
					<div class="why_us_content">
						<h3>Zakup sprzętu</h3>
						
						Jednym z głównych celów, na które idą środki z licytacji charytatywnej jest zakup specjalistycznego sprzętu do szpitali. Skupiamy się głównie na zakupie sprzętu na oddziały dziecięce.
						<br><br>
						<img src="images/sprzet.png" alt="sprzet" height="46%" width="85%">
					</div>

					<div class="why_us_content">
						<h3>Pomoc niepełnosprawnym</h3>
						Pieniądze z licytacji są rozsądnie inwestowane w szeroko pojętą pomoc dla ludzi niepełnosprawnych, żeby żyło im się lepiej. Zakup wózków inwalidzkich, protez oraz sprzętu do użytku codziennego jest dla nich niezbędny.
						<br><br>
						<img src="images/niepelnosprawni.png" alt="wozek" height="40%" width="65%">
					</div>

					<div class="why_us_content">
						<h3>Pomoc dzieciom</h3>
						Pomoc dzieciom ciężko chorym jest jednym z celów, na które przekazujemy pieniądze po zakończeniu licytacji. Bez Waszej pomocy nie uda się pomóc dzieciom wrócić do zdrowia i pomóc spełnić ich marzenia o normalnym życiu.
						<br><br>
						<img src="images/dziecko.png" alt="dziecko" height="40%" width="85%">
					</div>
				</div>
			</div>
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

	<!-- JQUERY -->
	<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
	<!-- STICKY MENU JS-->
	<script src="js/sticky_menu.js"></script>
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
	<!-- STICKY MENU WITAJ ZALOGUJ SIĘ JS-->
	<script src="js/dropdown_sticky.js"></script>

	<script src="http://ajax.googleapis.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
  <script src="js/responsiveslides.min.js"></script>
  </script>


</body>
</html>

<?php
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

	$sql = "SELECT nazwa, opis, cena, rozmiar, zdjecie FROM produkty";
	$sql1 = "SELECT * FROM opinie";
	$result = $conn -> query($sql);
	$result1 = $conn -> query($sql1);

	//Function to show product on main site
	function Show_product($id)
	{	
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "charytatywnie";
		$conn = new mysqli($servername, $username, $password, $dbname);
		$conn -> query("SET NAMES 'utf8'");
		if ($conn -> connect_error) { die("Nie połączono z bazą danych: " . $conn -> connect_error);}

		$sql = "SELECT nazwa, opis, cena, rozmiar, zdjecie FROM produkty WHERE id_produkty = $id";
		$result = $conn -> query($sql);
		if ($result -> num_rows > 0)
		{
	 		while($row = $result -> fetch_assoc())
	 		{
	       		echo '<img src="images/products/'.$row["zdjecie"].'" width="150" height="150" alt="product.png"><br>'.$row["nazwa"]." ".$row["rozmiar"].'<br><span style="color:#FF5A00"><b>Najwyższa oferta: '.$row["cena"]." PLN</b></span>";
			}
		} else { echo "No results"; }
	}
?> 