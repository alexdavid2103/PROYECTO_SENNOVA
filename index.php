<?php
// Iniciar sesión para utilizar variables de sesión
session_start();

// Incluir los archivos necesarios para la funcionalidad de la aplicació
require_once "Libs/routes.php"; 	// Archivo que contiene la clase de enrutamiento (Routes)
require_once "Libs/template.php"; 	// Archivo que contiene la clase de plantilla (template)
require_once "Libs/connection.php"; // Archivo que contiene la clase de conexión a la base de datos (connection)

// Verificar si se recibieron los parámetros "controller" y "action" a través de GET
if(isset($_GET["controller"]) && isset($_GET["action"])){
	// Si los parámetros existen, asignar sus valores a las variables $controller y $action
	$controller = $_GET["controller"];
	$action 	= $_GET["action"];
}else{
	// Si los parámetros no existen, asignar valores predeterminados para el controlador y la acción
	$controller = "main";
	$action     = "index";
}

// Llamar al método estático "loadContent" de la clase "Routes" para cargar el contenido del controlador y ejecutar la acción
Routes::loadContent($controller , $action);
?>

import serial

# Constantes específicas de tu sensor de temperatura
pendiente_temperatura = 10.0  # Reemplaza con la pendiente correcta
interseccion_temperatura = -50.0  # Reemplaza con la intersección correcta

# Constantes específicas de tu sensor de vibración
pendiente_vibracion = 5.0  # Reemplaza con la pendiente correcta
interseccion_vibracion = 0.0  # Reemplaza con la intersección correcta

# Nombre del dispositivo serial: dmesg | grep -v disconnect | grep -Eo "tty(ACM|USB)." | tail -1
ser = serial.Serial('/dev/ttyACM0', 9600)
ser.flushInput()

while True:
    
    try:
        lineBytes = ser.readline()
        line = lineBytes.decode('utf-8').strip()
        
        # Convierte el valor del voltaje a temperatura
        voltaje_temperatura = float(line)
        temperatura = pendiente_temperatura * voltaje_temperatura + interseccion_temperatura
        
        # Lee el valor de vibración
        lineBytes = ser.readline()
        line = lineBytes.decode('utf-8').strip()
        
        # Convierte el valor del voltaje a intensidad de vibración
        voltaje_vibracion = float(line)
        vibracion = pendiente_vibracion * voltaje_vibracion + interseccion_vibracion
        
        print(f"Voltaje Temperatura: {voltaje_temperatura} V, Temperatura: {temperatura}°C")
        print(f"Voltaje Vibración: {voltaje_vibracion} V, Vibración: {vibracion} unidades")
        
    except KeyboardInterrupt:
        break
    except ValueError:
        print("Error al convertir el valor del voltaje a temperatura o vibración")
