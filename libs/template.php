<?php
class template
{
	// Método para cargar una plantilla de vista
	public function loadTemplate($section, $eCompleta = true)
	{
		// Si $eCompleta es verdadero (valor predeterminado), cargar la plantilla completa que incluye el header y el footer
		if ($eCompleta) {
			require_once "view/header.php"; // Cargar el archivo "header.php" ubicado en la carpeta "view"
			require_once "View/$section.php"; // Cargar el archivo correspondiente a la sección especificada, ubicado en la carpeta "view"
			require_once "view/footer.php"; // Cargar el archivo "footer.php" ubicado en la carpeta "view"
		} else {
			// Si $eCompleta es falso, cargar solo la sección especificada, sin el header ni el footer
			require_once "view/$section.php"; // Cargar el archivo correspondiente a la sección especificada, ubicado en la carpeta "view"
		}
	}
}
?>
