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
	<link rel="stylesheet" type="text/css" href="css/koszyk.css">
		<link rel="stylesheet" type="text/css" href="css/hamburger.css">
	<link rel="stylesheet" type="text/css" href="css/mobile.css" media="(max-width: 800px">

	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/menu.css">
	<link href="https://fonts.googleapis.com/css?family=Noto+Sans:400,700&display=swap&subset=latin-ext" rel="stylesheet">
	<link href="fontawesome/css/all.css" rel="stylesheet">
	<title>Ocena sklepu</title>
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
	<div id="container_koszyk">
		
		<h1>Regulamin Charytatywnie:</h1>
		
		<div id="regulamin_container">
				<div id="regulamin">
					<a href="regulamineng.php">English version</a><br><br>

					<h3>PRYWATNOŚĆ I POUFNOŚĆ</h3><br>

					<p>1.Dane osobowe podane przez Użytkowników w miejscach do tego przeznaczonych, Charytatywnie przetwarza zgodnie z obowiązującymi przepisami prawa oraz zgodnie z polityką prywatności.</p><br>

					<p>2.Użytkownikom ujawniane są dane osobowe innych Użytkowników jedynie w przypadkach przewidzianych w Regulaminie w celach związanych z przeprowadzaniem Transakcji oraz w innych przypadkach, za uprzednią zgodą osoby, której dane dotyczą.</p><br>

					<p>3.Użytkownik zobowiązany jest nie ujawniać osobom trzecim informacji dotyczących innych Użytkowników, które otrzymał od Charytatywnie w związku z korzystaniem z Charytatywnie, chyba że uzyskał uprzednią zgodę od Użytkownika, którego dane dotyczą. W szczególności zabronione jest wykorzystywanie przedmiotowych informacji w celach komercyjnych polegających, w szczególności na promowaniu w jakiejkolwiek formie działalności Użytkownika prowadzonej poza Charytatywnie.</p><br>

					<p>4.Zabronione jest wykorzystywanie informacji, o których mowa w art. 3, w celach komercyjnych polegających na promowaniu w jakiejkolwiek postaci działalności Użytkownika prowadzonej poza Charytatywnie. W szczególności zabronione jest:</p>

					<p>a) składanie propozycji zakupu lub sprzedaży Towaru poza Charytatywnie;</p>

					<p>b) dołączanie do wysyłanego Towaru lub dostarczanie w jakiejkolwiek innej formie treści zawierających informację o działalnościkomercyjnej prowadzonej poza Charytatywnie (na przykład ulotek reklamujących sklep internetowy);</p>

					<p>c) zakładanie Użytkownikom kont w sklepach internetowych.</p><br>

					<p>5.Charytatywnie zastrzega sobie prawo do filtrowania i zatrzymywania wiadomości wysyłanych przez Użytkowników w ramach narzędzi udostępnionych w Charytatywnie, w szczególności jeśli mają charakter spamu, zawierają treści naruszające niniejszy Regulamin lub w inny sposób zagrażają bezpieczeństwu Użytkowników.</p><br>

					<p>6.Zakończone Oferty mogą być publikowane w subdomenie archiwum.charytatywnie.pl. Publikowane informacje mają jedynie charakter poglądowy, a Charytatywnie nie zapewnia i nie gwarantuje pełnego oraz kompleksowego upubliczniania informacji o zakończonych Ofertach.</p><br>

				</div>
			<br><br>
			
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
	<!-- STICKY MENU WITAJ ZALOGUJ SIĘ JS-->
	<script src="js/dropdown_sticky.js"></script>
	<!-- SLIDER JS-->
	<script src="js/slider.js"></script>
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