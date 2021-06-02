<?php 
    include 'components/tableau.php';
    include 'components/formulaire.php';
    include 'api/calls.php';
    include 'src/Produits.php';
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>API firebase</title>
	
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/custom.css" media="all" />
</head>
<body>
	<header>
		<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
			<button class="navbar-toggler" type="button" data-toggle="collapse"
				data-target="#navbarCollapse" aria-controls="navbarCollapse"
				aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarCollapse">
				<ul class="navbar-nav mr-auto">
					<li class="nav-item active"><a class="nav-link" href="./">Accueil</a>
					</li>
					<li>|</li>
					<li class="nav-item"><a class="nav-link"
						href="./">Autres</a></li>
				</ul>
			</div>
			<!-- Login/Logout -->
			<div class="navbar-nav ml-auto">
				<div class="nav-item dropdown login-dropdown">
					<a href="./"
						class="nav-item nav-link"> <i class="fa fa-user-o"></i>
						Login
					</a>
				</div>
			</div>
		</nav>
	</header>
	<div role="main" class="container" style="margin-top:100px;">
		<div class="top" style="display:flex; justify-content:space-between">
			<div class="">
				<h1>Index</h1>
				<h3>Exo API - Firebase</h3>
				<h4>Page d'affichage des produits</h4>
			</div>
			<div class="col-sm-0">
				<a href="data/data.json" class="btn btn-primary btn-lg" download>
					<span>Exporter</span>
				</a>
			</div>
		</div>
		<hr/>
        <div class="tableau">
            <?php 
                $lines = "";
                $produits = getAllProducts();
                
                foreach ($produits as $produit) {
                    $line = createTableLine($produit);
                    $lines = $lines.$line;
                }
                echo createTable($lines);
            ?>
		    <!-- <div class="alert alert-secondary"></div> -->
        </div>
        <div class="product-info">
            <?php 
				if (isset($_GET['type'])){
					if($_GET['type']=="edit") {
						echo getForm(false, true, $_GET['id']);
					} 
					else if ($_GET['type']=="add") {
						echo getForm(true, true,null);
					} 
					else if ($_GET['type']=="cancel") {
						echo getForm(false, false,null);
					}
					else if ($_GET['type']=="deleteIMG"){
						unlink("data/image/".$_GET['id'].".jpg");
					}
                }
            ?>
        </div>
	</div>
	
	<footer class="footer">
		<div>
		</div>
	</footer>
    
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
	<script	src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script	src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>