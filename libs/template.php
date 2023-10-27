<?php
class template
{
	private $loadHeaderFooter = true;

	// Método para cargar una plantilla de vista
	public function loadTemplate($section, $eCompleta = true)
	{
		// Si $eCompleta es verdadero (valor predeterminado), cargar la plantilla completa que incluye el header y el footer
		if ($eCompleta && $this->loadHeaderFooter) {
			require_once "view/header.php"; // Cargar el archivo "header.php" ubicado en la carpeta "view"
		}

		require_once "view/$section.php"; // Cargar el archivo correspondiente a la sección especificada, ubicado en la carpeta "view"

		// Si $eCompleta es verdadero y $loadHeaderFooter es verdadero, cargar el archivo footer.php
		if ($eCompleta && $this->loadHeaderFooter) {
			require_once "view/footer.php"; // Cargar el archivo "footer.php" ubicado en la carpeta "view"
		}
	}

	// Método para configurar si se deben cargar el encabezado y el pie de página
	public function setLoadHeaderFooter($value)
	{
		$this->loadHeaderFooter = $value;
	}
}
?>