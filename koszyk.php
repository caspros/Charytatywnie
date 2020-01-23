<?php
	session_start();
	if ((isset($_SESSION['zalogowany'])) && ($_SESSION['zalogowany']==true))
	{
		$_SESSION['wyloguj'] = "Wyloguj";
		unset($_SESSION['zaloguj']);
	} else {
		$_SESSION['zaloguj'] = "Zaloguj";
		unset($_SESSION['wyloguj']);
		header('Location: index.php');
		exit();
	}

	if(isset($_POST['koszyk1']))
	{
		$id_k= $_SESSION['id_klienci'];
		$cena = $_POST['suma'];
		$id = $_SESSION['produkt'];
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "charytatywnie";
		$conn = new mysqli($servername, $username, $password, $dbname);
		$conn -> query("SET NAMES 'utf8'");
		if ($conn -> connect_error) { die("Nie połączono z bazą danych: " . $conn -> connect_error);}
		$sql_t = "SET FOREIGN_KEY_CHECKS = 0";
		$result = $conn -> query($sql_t);
		$sql = "SELECT * FROM koszyk WHERE id_klienci='$id_k' AND id_produkty='$id'";
		$result = $conn -> query($sql);
		
		if($result -> num_rows > 0)
		{
			$sql = "UPDATE koszyk SET cena='$cena' WHERE id_produkty='$id' AND id_klienci='$id_k'";
			$result = $conn -> query($sql);
			$sql3 = "INSERT INTO historia(id_klienci, id_produkty, cena) VALUES ('$id_k', '$id', '$cena')";
			$result = $conn -> query($sql3);
		}
		else
		{
			$sql = "INSERT INTO koszyk(cena, id_produkty, id_klienci) VALUES ('$cena', '$id', '$id_k')";
			$result = $conn -> query($sql);
			$sql3 = "INSERT INTO historia(id_klienci, id_produkty, cena) VALUES ('$id_k', '$id', '$cena')";
			$result = $conn -> query($sql3);
		}
		$sql2 = "UPDATE produkty SET cena='$cena' WHERE id_produkty='$id'";
		$result = $conn -> query($sql2);

		//Usuwanie reszcie z koszyka
		$sql = "DELETE FROM koszyk WHERE id_produkty='$id' AND cena<'$cena'";
		$result = $conn -> query($sql);
	}

?>

<!DOCTYPE HTML>
<html lang="pl">

<head>
	<meta charset="utf-8"/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/normalize.css">
	<link rel="stylesheet" type="text/css" href="css/koszyk.css">
		<link rel="stylesheet" type="text/css" href="css/hamburger.css">
	<link rel="stylesheet" type="text/css" href="css/mobile.css" media="(max-width: 800px">

	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/menu.css">
	<link href="https://fonts.googleapis.com/css?family=Noto+Sans:400,700&display=swap&subset=latin-ext" rel="stylesheet">
	<link href="fontawesome/css/all.css" rel="stylesheet">
	<title>Aktualne licytacje</title>
</head>
<style>
	.error
		{
			color:red;
			margin-top: 10px;
			margin-bottom: 10px;
		}
</style>

<body>
		 <!-- Load an icon library to show a hamburger menu (bars) on small screens -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	 <!-- Load an icon library to show a hamburger menu (bars) on small screens -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<div class="topnav" id="myTopnav">

	    <a href="index.php" class="active">charytatywnie</a>
	    
		<?php
						if (isset($_SESSION['zaloguj']))
						{
							echo '<a href="logowanie.php">'.$_SESSION['zaloguj'].'</a>';
						} else{
							echo '<a href="wyloguj.php">'.$_SESSION['wyloguj'].'</a>';
						}
		?>
	    <a href="koszyk.php">Aktualne licytacje</a>
		<a href="zamowienia.php">Wygrane licytacje</a>
		<a href="profil.php">Ustawienia</a>
		
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
	<div id="container_koszyk">
		

		<!-- MIĘSO ARMATNIE -->
		<div id="koszyk_container">
			<?php
				Show_cart();
				Show_auctions_history();
			?>

			<?php
				if (isset($_SESSION['pusty_koszyk']))
				{
					echo '<div class="error">'.$_SESSION['pusty_koszyk'].'</div>';
					unset($_SESSION['pusty_koszyk']);
				}
			?>
		</div>
		<br>
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
	<!-- STICKY MENU WITAJ ZALOGUJ SIĘ JS-->
	<script src="js/dropdown_sticky.js"></script>
	<!-- SLIDER JS-->
	<script src="js/slider.js"></script>
	<!-- TIMER JS-->
	<script src="js/timer.js"></script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
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


<?php
	$id_klienci = $_SESSION['id_klienci'];
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

	//Function to show products in cart
	function Show_cart()
	{	
		$numer = 0;
		$suma = 0;
		$suma_dostawa = 0;
		$max_dostawa = 0;
		$id_klienci = $_SESSION['id_klienci'];
		require_once "connect.php";
		$conn = new mysqli($servername, $username, $password, $dbname);
		$conn -> query("SET NAMES 'utf8'");
		if ($conn -> connect_error) { die("Nie połączono z bazą danych: " . $conn -> connect_error);}
		$sql = "SELECT * FROM koszyk WHERE id_klienci=$id_klienci";
		$result = $conn -> query($sql);
		echo '<h1>Aktualnie licytujesz</h1>';
		//Czy jest koszyk
		if ($result -> num_rows > 0)
		{
			echo '<div id="info"> 100% kwoty za licytacje zostanie przekazane na cele charytatywne</div><br><br>';
			echo '<div id="info5">
					LICYTACJE TRWAJĄ JESZCZE PRZEZ: 
					<b><div id="czas"></div></b>
				</div>';
	 		while($row = $result -> fetch_assoc())
	 		{	
	 			
	 			$id_kosz = $row['id_koszyk'];
	 			$id_prod = $row['id_produkty'];
	 			$sql1 = "SELECT id_produkty, nazwa, cena, zdjecie FROM produkty WHERE id_produkty=$id_prod";
	 			$result1 = $conn -> query($sql1);
	 			//Czy jest zamowienie_produkty
	 			if ($result1 -> num_rows > 0)
				{
	 				while($row1 = $result1 -> fetch_assoc())
	 				{
	 					$numer+=1;
	 					echo '
				       		<div class="koszyk1">
				       			<table id="koszyk_t">
			       					<td>
			       						<a href="produkt.php?id_produkty='.$row1["id_produkty"].'" id="product_link">
			       							<div id="zdjecie">
			       								<img src="images/products/'.$row1["zdjecie"].'" alt="product.png">
			       							</div>
			       						<a>
			       					</td>
					       			<td>
					       				<div class="nazwa">
					       					'.$row1["nazwa"].'</b>
					       				</div>
					       			</td>
						       		<td>
						       			<form action="#" method="post">
							       			<input type="hidden" name="id_kosz" value="'.$row["id_koszyk"].'" />
							       			<input type="submit" name="delete" class="deleteBtn" value="Usuń">
							       		</form>
						       		</td>
						       		<tr>
						       			<td colspan="2">
						       				<div id="cena">
						       					Twoja oferta: '.$row["cena"].' PLN</b>
						       				</div>
						       			</td>
						       		</tr>
					       		</table>
				       		</div>';	
	 				}
	 			}
	 			$suma += $row["cena"];
			}
			
	       	
			echo '<br>
				<div id="podsumowanie">
					Łącznie na licytacjach: '.$suma.' PLN<br><br>';
		       		echo '
				</div>';
		} else { echo '<div class="error" style="text-align:center;">Aktualnie nie bierzesz udziału w żadnej licytacji</div>'; }
		
	}

	function Show_auctions_history()
	{
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "charytatywnie";
		$conn = new mysqli($servername, $username, $password, $dbname);
		$conn -> query("SET NAMES 'utf8'");
		if ($conn -> connect_error) { die("Nie połączono z bazą danych: " . $conn -> connect_error);}

		$id_klienci = $_SESSION['id_klienci'];
		$sql = "SELECT id_produkty, id_klienci, MAX(cena) as cena FROM historia WHERE id_klienci=$id_klienci GROUP BY id_produkty ORDER BY cena ASC";
		
	 	$result = $conn -> query($sql);
		
		if ($result -> num_rows > 0)
		{
			echo '<h1>Twoje przebite oferty</h1>';
			while($row = $result -> fetch_assoc())
			{
				$prod = $row["id_produkty"];
				$sql1 = "SELECT nazwa, cena FROM produkty WHERE id_produkty=$prod";
	 			$result1 = $conn -> query($sql1);
				if ($result1 -> num_rows > 0)
				{
					while($row1 = $result1 -> fetch_assoc())
					{
						if($row1["cena"] > $row["cena"])
						{
							echo 'Twoja oferta '.$row["cena"].'PLN za aukcję: <b>'.$row1["nazwa"].'</b> została przebita.';
							echo '<br>Aktualna oferta: <b>'.$row1["cena"].' PLN</b><br>';
							echo '<a href="produkt.php?id_produkty='.$row["id_produkty"].'">Przejdź do licytacji</a><br><br>';
						}
					}
				}
			}
		}
	}

	//Usuwanie z koszyka
	if(isset($_POST['id_kosz']))
	{
		$id = $_POST['id_kosz'];
		$sql_d= "DELETE FROM koszyk WHERE id_koszyk = '$id'";
		$result = $conn -> query($sql_d);
		echo "<meta http-equiv='refresh' content='0'>";
	}
?>