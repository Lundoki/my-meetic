<?php
include("database.php");
$db = new Database();
$bdd = $db->getConnection();

$getprofile = $bdd->prepare("SELECT firstname, lastname, uname, email, birthdate, gender, city, description, avatar FROM connect WHERE uname = :session");
$getprofile->bindValue(':session', $_SESSION['uname'], PDO::PARAM_STR);
$getprofile->execute();
$resultat = $getprofile->fetch();


if (isset($_GET['fname']) AND $_GET['fname'] !== ""){
	$sql = "UPDATE connect SET firstname = '{$_GET["fname"]}' WHERE uname = '{$_SESSION["uname"]}'";
	$bdd->exec($sql);
	echo "You have successfully changed your first name to {$_GET["fname"]}!".PHP_EOL;
}

if (isset($_GET['lname']) AND $_GET['lname'] !== ""){
	$sql = "UPDATE connect SET lastname = '{$_GET["lname"]}' WHERE uname = '{$_SESSION["uname"]}'";
	$bdd->exec($sql);
	echo "You have successfully changed your last name to {$_GET["lname"]}!".PHP_EOL;
}

if (isset($_GET['pw1']) AND isset($_GET['pw2']) AND $_GET['pw1'] !== "" AND $_GET["pw1"] == $_GET["pw2"]){
	$hashpass = password_hash($_GET["pw1"], PASSWORD_DEFAULT);
	$sql = "UPDATE connect SET password = '$hashpass' WHERE uname = '{$_SESSION["uname"]}'";
	$bdd->exec($sql);
	echo "You have successfully changed your password!".PHP_EOL;
}

if (isset($_GET['email']) AND $_GET['email'] !== ""){
	$sql = "UPDATE connect SET email = '{$_GET["email"]}' WHERE uname = '{$_SESSION["uname"]}'";
	$bdd->exec($sql);
	echo "You have successfully changed your email to {$_GET["email"]}!".PHP_EOL;
}

if (isset($_GET['city']) AND $_GET['city'] !== ""){
	$sql = "UPDATE connect SET city = '{$_GET["city"]}' WHERE uname = '{$_SESSION["uname"]}'";
	$bdd->exec($sql);
	echo "You have successfully changed your location to {$_GET["city"]}!".PHP_EOL;
}

if (isset($_GET['avatar']) AND $_GET['avatar'] !== ""){
	$sql = "UPDATE connect SET avatar = '{$_GET['avatar']}' WHERE uname = '{$_SESSION["uname"]}'";
	$bdd->exec($sql);
	echo "You have successfully changed your profile picture!".PHP_EOL;
}

if (isset($_GET['description']) AND $_GET['description'] !== ""){
	$sql = "UPDATE connect SET description = '{$_GET["description"]}' WHERE uname = '{$_SESSION["uname"]}'";
	$bdd->exec($sql);
	echo "You have successfully changed your description!".PHP_EOL;
}