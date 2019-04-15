<?php

include("database.php");
$db = new Database();
$bdd = $db->getConnection();

if (isset($_GET["fname"]) AND (isset($_GET["username"])) AND (isset($_GET["pw1"])) 
	AND (isset($_GET["pw2"])) AND (isset($_GET["email"])) AND (isset($_GET["bdate"])) 
	AND (isset($_GET["gender"])) AND $_GET["btn"] == "Register") {
	if ($_GET["pw1"] == $_GET["pw2"]) {
		$result = $bdd->query("SELECT id FROM connect WHERE uname = '{$_GET["username"]}' OR email = '{$_GET["email"]}'");
		if($result->rowCount($result) == 0) {
			$hashpass = password_hash($_GET["pw1"], PASSWORD_DEFAULT);
			$sql = "INSERT INTO connect (firstname, lastname, uname, password, email, birthdate, gender, city, description, avatar)
			VALUES ('{$_GET["fname"]}', '{$_GET["lname"]}', '{$_GET["username"]}', '$hashpass', '{$_GET["email"]}', '{$_GET["bdate"]}', '{$_GET["gender"]}', '{$_GET["city"]}', '', '')";
			$bdd->exec($sql);
			echo "You registered successfully!";
		} else {
			echo "The username or email address you chose is already in use, please chose another one!";
		}
		
	}
}

$bdd = null;
?>