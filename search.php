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
				<li class="nav-item">
					<a class="nav-link" href="index.php">Home</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="profil.php">Profile</a>
				</li>
				<li class="nav-item active">
					<a class="nav-link" href="search.php">Looking for someone?<span class="sr-only">(current)</span></a>
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
			<div class="col-md-4">
				<form class="form-group" method="post">
					<div class="card border-primary mb-3">
						<div class="card-header text-info">Search</div>
						<div class="card-body">
							<h3 class="card-title">Who are you looking for?</h3>
							<div class="row">
								<div class="col-md-4">
									<h4>Gender :</h4>
									<div class="form-check">
										<label class="form-check-label">
											<input class="form-check-input" type="checkbox" name="gender[]" value="Male" checked="">
											Male
										</label>
									</div>
									<div class="form-check">
										<label class="form-check-label">
											<input class="form-check-input" type="checkbox" name="gender[]" value="Female" checked="">
											Female
										</label>
									</div>
									<div class="form-check">
										<label class="form-check-label">
											<input class="form-check-input" type="checkbox" name="gender[]" value="Others" checked="">
											Others
										</label>
									</div>
									<br>
								</div>
								<div class="col-md-4">
									<h4>Age :</h4>
									<div class="form-check">
										<label class="form-check-label">
											<input class="form-check-input" type="checkbox" name="age[]" value="18-25" checked="">
											18 - 25
										</label>
									</div>
									<div class="form-check">
										<label class="form-check-label">
											<input class="form-check-input" type="checkbox" name="age[]" value="25-35" checked="">
											25 - 35
										</label>
									</div>
									<div class="form-check">
										<label class="form-check-label">
											<input class="form-check-input" type="checkbox" name="age[]" value="35-45" checked="">
											35 - 45
										</label>
									</div>
									<div class="form-check">
										<label class="form-check-label">
											<input class="form-check-input" type="checkbox" name="age[]" value="45+" checked="">
											45 +
										</label>
									</div>
								</div>
								<br>
								<div class="col-md-4">
									<h4>City :</h4>
									<div class="form-check">
										<label class="form-check-label">
											<input class="form-check-input" type="checkbox" name="city[]" value="paris" checked="">
											Paris
										</label>
									</div>
									<div class="form-check">
										<label class="form-check-label">
											<input class="form-check-input" type="checkbox" name="city[]" value="seoul" checked="">
											Seoul
										</label>
									</div>
									<div class="form-check">
										<label class="form-check-label">
											<input class="form-check-input" type="checkbox" name="city[]" value="london" checked="">
											London
										</label>
									</div>
								</div>
								<button type="submit" name="submit" class="btn btn-primary">Submit</button>
							</form>
						</div>
					</div>


				</div>
			</div>
			<div class="col-sm">
				<div class="dropdown">
					<button onclick="dropdown()" class="dropbtn">Dropdown menu</button>
					<div id="myDropdown" class="dropdown-content">
						<a href="#">Ceci est</a>
						<a href="#">un menu</a>
						<a href="#">déroulant</a>
					</div>
				</div> 
			</div>
			<div class="col-md-4">
				<div class="card border-primary mb-3" style="max-width: 20rem;">
					<div class="card-header text-info">Hey there <?php echo htmlentities(trim($_SESSION['uname'])); ?> !</div>
					<div class="card-body">
						<h4 class="card-title">Here's what you can do here:</h4>
						<p class="card-text">- Meet the love of your life (or so we hope)<br><b>More seriously :</b><br>- Search for people of any gender<br>- Search for people of any age! (over 18, of course)<br>- Search for people near you<br>- See their profiles<br>- And don't forget to send them messages!</p>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<?php
			include("database.php");
			if(isset($_POST['submit'])){
			$rech = new search();
			$rech->doResearch($_POST['gender'], $_POST['age'], $_POST['city']);
		}
		?>
	</div>
</div>
</body>
<script
src="https://code.jquery.com/jquery-3.2.1.min.js"
integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
crossorigin="anonymous"></script> 
<script src="starrynight.js"></script>
</html>