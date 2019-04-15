 <?php 
 include("database.php");


 if (isset($_POST["fname"], $_POST["username"], $_POST["pw1"], $_POST["pw2"], $_POST["email"], $_POST["bdate"], $_POST["gender"]) AND $_POST["btn"] == "Register") {
 	if ($_POST["pw1"] == $_POST["pw2"]) {
 		$membre = new member();
 		$membre->register($_POST["fname"], $_POST["lname"], $_POST["username"], $_POST["pw1"], $_POST["email"], $_POST["bdate"], $_POST["gender"], $_POST["city"], $membre->age);
 	}
 }
 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<link rel="stylesheet" type="text/css" href="css/swatch.css">
 	<title>Register</title>
 </head>

 <body>
 	<nav class="navbar navbar-expand-lg navbar-light bg-light mb-5">
 		<a class="navbar-brand" href="#">Starry Night</a>
 		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
 			<span class="navbar-toggler-icon"></span>
 		</button>

 		<div class="collapse navbar-collapse" id="navbarColor01">
 			<ul class="navbar-nav mr-auto">
 				<li class="nav-item">
 					<a class="nav-link" href="index.php">Home</a>
 				</li>
 				<li class="nav-item active">
 					<a class="nav-link" href="inscription.php">Register<span class="sr-only">(current)</span></a>
 				</li>
 			</ul>
 			<form class="form-inline my-2 my-lg-0">
 				<input class="form-control mr-sm-2" type="text" placeholder="Search">
 				<button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
 			</form>
 		</div>
 	</nav>

 	<div class="container-fluid">
 		<div class="col-md-4 col-centered form-group text-info">
 			<form action="" method="post">
 				First name * : <input type="text" class="form-control" name="fname" required>
 				Last name : <input type="text" class="form-control" name="lname">
 				Username * : <input type="text" class="form-control" name="username" required>
 				Password * : <input type="password" class="form-control" name="pw1" required>
 				Confirm your password * : <input type="password" class="form-control" name="pw2" required>
 				Email address * : <input type="email" class="form-control" name="email" placeholder="--@--.--" size="30" required>
 				Birthdate * : <input type="date" class="form-control" name="bdate" max="2001-01-01" required>
 				Gender * : <select id="gender" class="form-control" name="gender" required>
 					<option>--Select your gender--</option>
 					<option value="Male">Male</option>
 					<option value="Female">Female</option>
 					<option value="Other">Other</option>
 				</select>
 				City : <input type="text" class="form-control" name="city">
 				<input type="submit" class="btn btn-primary mt-3" name="btn" value="Register">
 			</form>
 		</div>
 	</div>

 </body>

 </html> 