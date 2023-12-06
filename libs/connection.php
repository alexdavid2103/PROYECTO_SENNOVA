<?php
class connection
{
	private $con;
	private $port = 3306;
	// private $hostname = "baeoxbyp7fasj6vrw6x8-mysql.services.clever-cloud.com";
	// private $username = "uq2beuohyvcojewk";
	// private $password = "sXE58ZBWXl4vhCIO9UpV";
	// private $database = "baeoxbyp7fasj6vrw6x8";
		private $hostname = "localhost";
		private $username = "root";
		private $password = "";
		private $database = "senatech";

	public function __construct()
	{
		try {
			// Intentar crear una nueva instancia de PDO para conectarse a la base de datos
			$this->con = new PDO("mysql:host=$this->hostname;dbname=$this->database;port=$this->port", $this->username, $this->password, [
				PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
				PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
				PDO::ATTR_EMULATE_PREPARES => false,
			]);
		} catch (PDOException $e) {
			// Si ocurre una excepción (error) en la conexión, se captura aquí y se muestra un mensaje de error
			echo "ERROR: " . $e->getMessage();
		}
	}

	public function getConnection()
	{
		// Método para obtener la conexión a la base de datos
		return $this->con;
	}
}

?>