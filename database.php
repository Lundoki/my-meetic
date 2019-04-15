<?php

class Database{
	private $host = "localhost";
	private $db_name = "mymeetic";
	private $username = "root";
	private $password = "root";
	public $conn;

	public function getConnection(){
		$this->conn = null;

		try{
			$this->conn = new PDO("mysql:host=" .$this->host. ";dbname=" .$this->db_name, $this->username, $this->password);
		}catch(PDOException $exception){
			echo "Connection error: " .$exception->getMessage();
		}
		return $this->conn;
	}
}

class member{
	public $fname;
	public $lname;
	public $uname;
	public $pw1;
	public $pw2;
	public $email;
	public $bdate;
	public $gender;
	public $city;
	public $age;

	public function __construct(){
		$fname = $_POST["fname"];
		$lname = $_POST["lname"];
		$uname = $_POST["username"];
		$pw1 = $_POST["pw1"];
		$pw2 = $_POST["pw2"];
		$email = $_POST["email"];
		$bdate = $_POST["bdate"];
		$gender = $_POST["gender"];
		$city = $_POST["city"];
		$this->age = floor((time() - strtotime($bdate))/31556926);
	}

	public function register($fname, $lname, $uname, $pw1, $email, $bdate, $gender, $city, $age){
		$db = new Database();

		$bdd = $db->getConnection();
		$result = $bdd->query("SELECT id FROM connect WHERE uname = '${uname}' OR email = '${email}'");
		if($result->rowCount($result) == 0) {
			$hashpass = password_hash("$pw1", PASSWORD_DEFAULT);
			$sql = "INSERT INTO connect (firstname, lastname, uname, password, email, birthdate, gender, city, age)
			VALUES ('${fname}', '${lname}', '${uname}', '${hashpass}', '${email}', '${bdate}', '${gender}', '${city}', '${age}')";
			$requete = $bdd->prepare($sql);
			$requete->execute();
			echo "<div class='alert alert-dismissible alert-success'>
			<button type='button' class='close' data-dismiss='alert'>&times;</button>
			<strong>Well done!</strong> <a href='index.php' class='alert-link'>You registered successfully!</a>.
			</div>"; 
		} 
		else {
			echo "<div class='alert alert-dismissible alert-danger'>
			<button type='button' class='close' data-dismiss='alert'>&times;</button>
			<strong>Oh snap!</strong> <a href='inscription.php' class='alert-link'>The username or email address you chose is already in use, please chose another one!
			</div>";
		} 

	} 
}

class search{
	public $gender;
	public $age;
	public $city;

	public function __construct() {
		$gender = $_POST["gender"];
		$age = $_POST["age"];
		$city = $_POST["city"];
	}

	public function doResearch($gender, $age, $city){
		$db = new Database();

		$bdd = $db->getConnection();

		$blop = 'SELECT * FROM connect WHERE gender IN (';
		foreach ($_POST['gender'] as $selectedgen) {
			if ($selectedgen === end($_POST['gender'])) {
				$blop .= "'$selectedgen'";
			}
			else {
				$blop .= "'$selectedgen'";
				$blop .= ",";
			}
		}
		$blop .= ")";

		$blop .= ' AND city IN (';
		foreach ($_POST['city'] as $selectedcity) {
			if ($selectedcity === end($_POST['city'])) {
				$blop .= "'$selectedcity'";
			}
			else {
				$blop .= "'$selectedcity'";
				$blop .= ",";
			}
		}
		$blop .= ")";

		$blop .= ' AND (age BETWEEN';
		foreach ($_POST['age'] as $selectedage) {
			if($selectedage == "18-25"){
				if ($selectedage === reset($_POST['age'])) {
					$blop .= " '18' AND '25'";
				}
				else {
					$blop .= " OR age BETWEEN '18' AND '25'";
				}
			}
			if($selectedage == "25-35"){
				if ($selectedage === reset($_POST['age'])) {
					$blop .= " '25' AND '35'";
				}
				else {
					$blop .= " OR age BETWEEN '25' AND '35'";
				}
			}
			if($selectedage == "35-45"){
				if ($selectedage === reset($_POST['age'])) {
					$blop .= " '35' AND '45'";
				}
				else {
					$blop .= " OR age BETWEEN '35' AND '45'";
				}
			}
			if($selectedage == "45+"){
				if ($selectedage === reset($_POST['age'])) {
					$blop .= " '45' AND '100'";
				}
				else {
					$blop .= " OR age BETWEEN '45' AND '100'";
				}
			}
		} 
		$blop .= ")";
		$req = $bdd->prepare($blop);
		$req->execute();
		while($result = $req->fetch())
		{
			echo "<div class='text-info'><img class='img img-fluid' src=".$result['avatar']." width='250px' height='250px'><br/>".$result['uname']."</br>".$result['gender']."</br>".$result['age']."</br>".$result['city']."</br></br></div>";
		}
		$req->closeCursor();
	}
}
?>