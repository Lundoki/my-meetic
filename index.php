 <!DOCTYPE html>
 <html>
 <head>
 	<link rel="stylesheet" type="text/css" href="css/swatch.css">
 	<title>Starry Night</title>
 </head>

 <body>

 	<nav class="navbar navbar-expand-lg navbar-light bg-light mb-5">
 		<a class="navbar-brand" href="#">Starry Night</a>
 		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
 			<span class="navbar-toggler-icon"></span>
 		</button>

 		<div class="collapse navbar-collapse" id="navbarColor01">
 			<ul class="navbar-nav mr-auto">
 				<li class="nav-item active">
 					<a class="nav-link" href="index.php">Home<span class="sr-only">(current)</span></a>
 				</li>
 				<li class="nav-item">
 					<a class="nav-link" href="inscription.php">Register</a>
 				</li>
 			</ul>
 			<form class="form-inline my-2 my-lg-0">
 				<input class="form-control mr-sm-2" type="text" placeholder="Search">
 				<button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
 			</form>
 		</div>
 	</nav>
 	<div class="container-fluid">
 		<div class="col-md-3 col-centered form-group my-5 text-info">
 			<form action="" method="post">
 				Username : <input type="text" class="form-control" name="username" required>
 				Password : <input type="password" class="form-control" name="pw1" required>
 				<input type="submit" class="btn btn-primary mt-3" name="btn" value="Connect">
 				<?php include('verif-connect.php') ?>
 			</form>
 			<p class="text-info mt-2">Don't have an account yet? You can join us <a href="inscription.php">here</a>!</p>
 		</div>
 	</div>
 	<div class="col-md-4 col-centered form-group my-5">
 		<div class="card border-primary mb-3 newscard">
 			<div class="card-header">01.06.2019</div>
 			<div class="card-body">
 				<h4 class="card-title">News</h4>
 				<p class="card-text">Hello Starry Nighters, we updated our website a bit! You can now add a profile picture and write a bit about yourself in your profile. More things to come!</p>
 			</div>
 		</div>
 	</div>

 	<div class="col-md-4 col-centered form-group">
 		<div class="card border-primary mb-3 newscard">
 			<div class="card-header">01.01.2019</div>
 			<div class="card-body">
 				<h4 class="card-title">Starry Night opening!</h4>
 				<p class="card-text">Hello, and welcome and our website! Don't hesitate to register, and come share your starry night with others. ;)</p>
 			</div>
 		</div>
 	</div>
 </div>
 <script
 src="https://code.jquery.com/jquery-3.2.1.min.js"
 integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
 crossorigin="anonymous"></script> 
 <script src="starrynight.js"></script>
</body>


</html> 