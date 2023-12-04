import { alertWarning } from "./alertas.js";

// ================ MOSTRAR TODOS LOS DATOS ================= \\
const recuperarDatos = async () => {
  try {
    const res = await fetch("?controller=motor&action=graficas");
    const respuesta = await res.json();
    return respuesta;
  } catch (error) {
    console.error("Error al recuperar los datos:", error);
    return []; // Devuelve un array vacío en caso de error
  }
};

const obtenerDatosYMostrarTodos = async () => {
  try {
    const data = await recuperarDatos();
    if (data.length > 0) {
      data.forEach(
        ({
          capmot_id,
          capmot_serie,
          capmot_temperatura,
          capmot_vibracion,
          capmot_fecha,
        }) => {
          console.log(`
          id: ${capmot_id}, 
          serie: ${capmot_serie}, 
          temperatura: ${capmot_temperatura}, 
          vibración: ${capmot_vibracion}, 
          fecha: ${capmot_fecha}
        `);
        }
      );
    } else {
      console.log("No se encontraron datos");
    }
  } catch (error) {
    console.error("Error al obtener y mostrar los datos:", error);
  }
};

// ================ MOSTRAR UN DATOS ESPECIFICO ================= \\

const obtenerDatosEspecificos = async (indice) => {
  try {
    const data = await recuperarDatos();
    if (data.length > indice && indice >= 0) {
      const {
        capmot_id,
        capmot_serie,
        capmot_temperatura,
        capmot_vibracion,
        capmot_fecha,
      } = data[indice];
      console.log(`
          id: ${capmot_id}, 
          serie: ${capmot_serie}, 
          temperatura: ${capmot_temperatura}, 
          vibración: ${capmot_vibracion}, 
          fecha: ${capmot_fecha}
      `);
    } else {
      console.log(
        "El índice especificado está fuera de rango o no se encontraron datos"
      );
    }
  } catch (error) {
    console.error("Error al obtener y mostrar los datos:", error);
  }
};

// ================ MOSTRAR LOS ULTIMOS DATOS EN EL ARRAY ================= \\

const obtenerUltimoDato = async () => {
  try {
    const data = await recuperarDatos();
    if (data.length > 0) {
      const ultimoElemento = data[data.length - 1];

      const {
        capmot_id,
        capmot_serie,
        capmot_temperatura,
        capmot_vibracion,
        capmot_fecha,
        capmot_hora,
      } = ultimoElemento;

      console.log(`
          id: ${capmot_id}, 
          serie: ${capmot_serie}, 
          temperatura: ${capmot_temperatura}, 
          vibración: ${capmot_vibracion}, 
          fecha: ${capmot_fecha}
          hora: ${capmot_hora}
      `);

      return {
        capmot_id,
        capmot_serie,
        capmot_temperatura,
        capmot_vibracion,
        capmot_fecha,
        capmot_hora,
      };
    } else {
      console.log("No se encontraron datos");
      return null; // Puedes devolver null u otro valor para indicar la ausencia de datos
    }
  } catch (error) {
    console.error("Error al obtener y mostrar el último dato:", error);
    throw error; // Puedes manejar el error aquí o lanzarlo para ser manejado externamente
  }
};

const verificarFallasTemperatura = (temperatura, serie, hora) => {
  const fallasTemperatura = [29, 32, 25];
  const tiempoLimite = 5; // Definir el tiempo límite en el rango de fallas (por ejemplo, 5 unidades de tiempo)
  let tiempoDentroRango = 0;
  let falla = false;

  if (temperatura) {
    for (let i = 0; i < fallasTemperatura.length; i++) {
      if (temperatura > fallasTemperatura[i]) {
        tiempoDentroRango++;
        console.log(tiempoDentroRango);
        if (tiempoDentroRango >= tiempoLimite) {
          falla = true;
          alertWarning(
            `Se detectó una falla en el motor identificado con serie ${serie}, a la hora ${hora} por tiempo prolongado en el rango de temperaturas críticas`
          );
          break; // Salir del bucle si se detecta la falla
        }
      } else {
        tiempoDentroRango = 0; // Reiniciar el contador si la temperatura no está en el rango de fallas
      }
    }
  }
};

const iniciarVerificacionFallas = async () => {
  try {
    const ultimoDato = await obtenerUltimoDato();

    const { capmot_serie, capmot_temperatura, capmot_hora } = ultimoDato;

    console.log(
      `
        Tempreratura: ${capmot_temperatura}, 
        Serie: ${capmot_serie}`
    );

    verificarFallasTemperatura(capmot_temperatura, capmot_serie, capmot_hora);
  } catch (error) {
    console.error("Error al iniciar la verificación de fallas:", error);
  }
};

// Llamar a la función para iniciar la verificación de fallas
iniciarVerificacionFallas();
