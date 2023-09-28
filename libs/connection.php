<?php
class connection
{
	// Variables para almacenar la información de conexión a la base de datos
	private $con;
	private $user = "root"; // Usuario de la base de datos
	private $pass = ""; // Contraseña del usuario de la base de datos
	private $server = "mysql:host=localhost;dbname=senatech;port=3306"; // Información del servidor y la base de datos

	public function __construct()
	{
		try {
			// Intentar crear una nueva instancia de PDO para conectarse a la base de datos
			$this->con = new PDO($this->server, $this->user, $this->pass);

			// Establecer el modo de error para lanzar excepciones en caso de errores en las consultas
			$this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
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
