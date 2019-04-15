<?php

include("database.php");
$db = new Database();
$bdd = $db->getConnection();

if (isset($_POST["username"]) AND isset($_POST["pw1"])) 
{
	$req = $bdd->prepare("SELECT password FROM connect WHERE uname = '{$_POST["username"]}'");
	$req->execute();
	$resultat = $req->fetch();

	$ispasswordcorrect = password_verify($_POST["pw1"], $resultat['password']);

	if($resultat === null) {
		echo "Wrong username or password!";
	}
	else
	{
		if ($ispasswordcorrect) {
			session_start();
			$_SESSION['uname'] = $_POST["username"];
			header('Location: profil.php');
			exit();
			echo "You are now connected! Welcome {$_POST["username"]} :)";
		}
		else {
			echo "<div class='alert alert-dismissible alert-danger'>
			<button type='button' class='close' data-dismiss='alert'>&times;</button>
			<strong>Oh snap!</strong> Wrong username or password!
			</div>";
		}
	}
}

$bdd = null;
?>