// Cargar la biblioteca de Google Charts y establecer la devolución de llamada al cargar
google.charts.load("current", { packages: ["corechart"] });
google.charts.setOnLoadCallback(drawCharts);

function drawCharts() {
  // Crear un objeto DataTable para almacenar los datos del gráfico de temperatura
  let dataTemperatura = new google.visualization.DataTable();
  dataTemperatura.addColumn("string", "Hora"); // Definir la columna de las horas como "string"
  dataTemperatura.addColumn("number", "Temperatura"); // Definir la columna de la temperatura como "number"

  // Opciones de configuración del gráfico de temperatura
  let optionsTemperatura = {
    title: "Gráfico de Temperatura",
    curveType: "function",
    legend: { position: "bottom" },
  };

  // Crear un objeto DataTable para almacenar los datos del gráfico de vibración
  let dataVibracion = new google.visualization.DataTable();
  dataVibracion.addColumn("string", "Hora"); // Definir la columna de las horas como "string"
  dataVibracion.addColumn("number", "Vibración"); // Definir la columna de la vibración como "number"

  // Opciones de configuración del gráfico de vibración
  let optionsVibracion = {
    title: "Gráfico de Vibración",
    legend: { position: "bottom" },
  };

  // Obtener los elementos con la clase .chart_temperatura y .chart_vibracion
  let chartTemperaturaElements =
    document.querySelectorAll(".chart_temperatura");
  let chartVibracionElements = document.querySelectorAll(".chart_vibracion");

  // Crear arreglos para los gráficos
  let chartsTemperatura = [];
  let chartsVibracion = [];

  // Función para realizar la solicitud y dibujar los gráficos
  function realizarSolicitud() {
    // Realizar una solicitud AJAX para obtener datos desde el servidor
    $.ajax({
      url: "http://localhost/PROYECTO_SENNOVA/?controller=motor&action=graficas",
      dataType: "json",
    })
      .done(function (responseData) {
        if (responseData && responseData.length > 0) {
          dataTemperatura.removeRows(0, dataTemperatura.getNumberOfRows()); // Limpia los datos actuales en el gráfico de temperatura
          dataVibracion.removeRows(0, dataVibracion.getNumberOfRows()); // Limpia los datos actuales en el gráfico de vibración

          // Iterar sobre los datos recibidos y agregarlos a los objetos DataTable
          for (let i = 0; i < responseData.length; i++) {
            let temperatura = parseFloat(responseData[i].capmot_temperatura);
            let vibracion = parseFloat(responseData[i].capmot_vibracion);
            let hora = responseData[i].capmot_hora;

            dataTemperatura.addRow([hora, temperatura]);
            dataVibracion.addRow([hora, vibracion]);
          }

          // Dibujar los gráficos de temperatura y vibración
          chartsTemperatura.forEach((chart) => {
            chart.draw(dataTemperatura, optionsTemperatura);
          });

          chartsVibracion.forEach((chart) => {
            chart.draw(dataVibracion, optionsVibracion);
          });
        }
        setTimeout(realizarSolicitud, 1300); // Realizar la próxima solicitud después de 1300 ms
      })
      .fail(function (jqXHR, textStatus, errorThrown) {
        console.error("Error en la solicitud AJAX:", errorThrown);
        setTimeout(realizarSolicitud, 1300); // Intentar nuevamente después de 1300 ms en caso de error
      });
  }

  // Crear gráficos de temperatura
  chartTemperaturaElements.forEach((element) => {
    let chart = new google.visualization.LineChart(element);
    chartsTemperatura.push(chart);
  });

  // Crear gráficos de vibración
  chartVibracionElements.forEach((element) => {
    let chart = new google.visualization.LineChart(element);
    chartsVibracion.push(chart);
  });

  // Iniciar la primera solicitud al cargar la página
  realizarSolicitud();
}
