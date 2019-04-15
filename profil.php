<?php
session_start();
if (!isset($_SESSION['uname'])) {
	header ('location: index.php');
	exit();
}
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/swatch.css">
	<title>Profile</title>
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
					<a class="nav-link" href="profil.php">Profile<span class="sr-only">(current)</span></a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="search.php">Looking for someone?</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="logout.php">Log out</a>
				</li>
			</ul>
			<form class="form-inline my-2 my-lg-0">
				<input class="form-control mr-sm-2" type="text" placeholder="Search">
				<button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
			</form>
		</div>
	</nav>

	<div class="container-fluid">
		<div class="row">
			<div class="col-md-8">
				<div class="col-md-6 col-centered form-group text-info ">
					<form action="" method="get">
						<?php include('modifprofil.php') ?>
						<br>
						First name : <input type="text" class="form-control" name="fname" placeholder="<?php echo $resultat['firstname'] ?>" >
						Last name : <input type="text" class="form-control" name="lname" placeholder="<?php echo $resultat['lastname'] ?>">
						<fieldset disabled="">Username : <input type="text" class="form-control" id="readOnlyInput" name="username" placeholder="<?php echo $resultat['uname'] ?>" readonly=""></fieldset>
						Email address : <input type="email" class="form-control" name="email" placeholder="<?php echo $resultat['email'] ?>" size="30">
						<fieldset disabled="">Birthdate : <input class="form-control" id="readOnlyInput" type="text" placeholder="<?php echo $resultat['birthdate'] ?>" readonly=""> </fieldset>
						<fieldset disabled="">Gender : <select id="gender" class="form-control" name="gender" required>
							<option selected="selected"><?php echo $resultat['gender'] ?></option>
						</select></fieldset>
						City : <input type="text" class="form-control" name="city" placeholder="<?php echo $resultat['city'] ?>">
						Profile picture link : <input type="url" class="form-control" placeholder="https://example.com"
						pattern="https://.*" name="avatar">
						About you :<input type="text" class="form-control" id="exampleTextarea" name="description" placeholder="<?php echo $resultat['description'] ?>" rows="3">
						<div class="pw-form">Want to change your password? <input type="password" class="form-control" name="pw1">
							Confirm your new password : <input type="password" class="form-control" name="pw2"></div>
							<input type="submit" class="btn btn-primary mt-3" name="btn" value="Change your profile">
						</form>
					</div>
				</div>
				<div class="col-md-4">
					<div class="card border-primary mb-3" style="max-width: 20rem;">
						<div class="card-header text-info">Welcome <?php echo htmlentities(trim($_SESSION['uname'])); ?> !</div>
						<div class="card-body">
							<h4 class="card-title">Here's what you can do here:</h4>
							<p class="card-text">- Modify your profile<br>- Add a profile picture<br> - Add a description (tell them about yourself!)<br>
								- And of course, <a href="logout.php">log out!</a></p>
							</div>
						</div>
						<br>
						<div class="dropdown">
							<button onclick="dropdown()" class="dropbtn">Dropdown menu</button>
							<div id="myDropdown" class="dropdown-content">
								<a href="#">Ceci est</a>
								<a href="#">un menu</a>
								<a href="#">déroulant</a>
							</div>
						</div> 
						<br>
						<br>
						<div class="card border-primary mb-3" style="max-width: 20rem;">
							<div class="card-header text-info">Your profile picture :</div>
							<div class="card-body">
								<img class='img img-fluid' src="<?php echo $resultat['avatar']; ?>" width='250px' height='250px'>
							</div>
						</div>
					</div>
				</div>
			</div>	


		</body>

		<script
		src="https://code.jquery.com/jquery-3.2.1.min.js"
		integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
		crossorigin="anonymous"></script> 
		<script src="starrynight.js"></script>
		</html>