<?php
class Routes
{
	// Método estático para cargar contenido y ejecutar un método específico en el controlador
	public static function loadContent($cnt, $act)
	{
		// Construir la ruta del archivo del controlador en base al nombre del controlador recibido como argumento
		$archivo = "Controller/" . $cnt . "_controller.php";

		// Verificar si el archivo del controlador existe en la ruta especificada
		if (file_exists($archivo)) {
			// Si el archivo existe, se requiere una vez para cargar las definiciones de clase del controlador
			require_once $archivo;

			// Construir el nombre de la clase del controlador en base al nombre del controlador recibido como argumento
			$clase = $cnt . "_controller";

			// Crear una instancia del controlador
			$obj = new $clase();

			// Verificar si el método especificado como argumento existe en el controlador
			if (method_exists($obj, $act)) {
				// Si el método existe, se llama al método en la instancia del controlador
				$obj->$act();
			} else {
				// Si el método no existe, se muestra un mensaje de error
				echo "<br>Este método publico $act() no existe en el controlador $clase";
			}

		} else {
			// Si el archivo del controlador no existe, se muestra un mensaje de error
			echo "<br><b>Ese Controlador no Existe</b>";
		}
	}
}
?>