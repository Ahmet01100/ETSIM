<?php
  /*  $host_name  = "db596949605.db.1and1.com";
    $database   = "db596949605";
    $user_name  = "dbo596949605";
    $password   = "Welcome68Utbm";

    $connect = mysqli_connect($host_name, $user_name, $password, $database);
    if (mysqli_connect_errno())
    {
    echo "La connexion au serveur MySQL n'a pas abouti : " . mysqli_connect_error();
    }*/
?>

<?php
	$serveur ='localhost';
	$user = 'root';
	$pass = '';
	$bdd ='db596949605';
try{
	$connexion = new PDO ('mysql:host='.$serveur.';dbname='.$bdd, $user,$pass);
    $connexion->exec("SET CHARACTER SET utf8");
	}
catch (PDOException $e)
{
	echo $e->getMessage();
}
?>