// Carga la librería de Google Charts y llama a la función drawCharts cuando esté cargada
google.charts.load("current", { packages: ["corechart"] });
google.charts.setOnLoadCallback(drawCharts);

// Función principal para dibujar los gráficos
function drawCharts() {
  // Objetos para almacenar los datos filtrados de temperatura y vibración
  const dataTemperaturaFiltered = {};
  const dataVibracionFiltered = {};

  // Opciones de configuración para el gráfico de Temperatura
  const optionsTemperatura = {
    title: "Gráfico de Temperatura",
    curveType: "function",
    legend: { position: "none" },
    hAxis: {
      title: "",
      textPosition: "none",
    },
  };

  // Opciones de configuración para el gráfico de Vibración
  const optionsVibracion = {
    title: "Gráfico de Vibración",
    legend: { position: "none" },
    hAxis: {
      title: "",
      textPosition: "none",
    },
  };

  // Obtiene elementos HTML que serán gráficos de Temperatura y Vibración
  const chartTemperaturaElements =
    document.querySelectorAll(".chart_temperatura");
  const chartVibracionElements = document.querySelectorAll(".chart_vibracion");

  // Crea las tablas de datos para Temperatura y Vibración
  chartTemperaturaElements.forEach((element) => {
    const getAttribute = element.getAttribute("data-serie");
    dataTemperaturaFiltered[getAttribute] =
      new google.visualization.DataTable();
    dataTemperaturaFiltered[getAttribute].addColumn("string", "Hora");
    dataTemperaturaFiltered[getAttribute].addColumn("number", "Temperatura");
  });

  chartVibracionElements.forEach((element) => {
    const getAttribute = element.getAttribute("data-serie");
    dataVibracionFiltered[getAttribute] = new google.visualization.DataTable();
    dataVibracionFiltered[getAttribute].addColumn("string", "Hora");
    dataVibracionFiltered[getAttribute].addColumn("number", "Vibración");
  });

  // Función para realizar una solicitud AJAX cada cierto tiempo
  function realizarSolicitud() {
    $.ajax({
      url: "?controller=motor&action=graficas",
      dataType: "json",
    })
      .done(function (responseData) {
        // Manejo de la respuesta AJAX
        if (responseData && responseData.length > 0) {
          // Elimina las filas de datos existentes en las tablas de Temperatura y Vibración
          chartTemperaturaElements.forEach((element) => {
            const getAttribute = element.getAttribute("data-serie");
            dataTemperaturaFiltered[getAttribute].removeRows(
              0,
              dataTemperaturaFiltered[getAttribute].getNumberOfRows()
            );
          });

          chartVibracionElements.forEach((element) => {
            const getAttribute = element.getAttribute("data-serie");
            dataVibracionFiltered[getAttribute].removeRows(
              0,
              dataVibracionFiltered[getAttribute].getNumberOfRows()
            );
          });

          // Procesa los datos de la respuesta AJAX y los agrega a las tablas de Temperatura y Vibración
          responseData.forEach((item) => {
            if (item.capmot_serie) {
              const temperatura = parseFloat(item.capmot_temperatura);
              const vibracion = parseFloat(item.capmot_vibracion);
              const hora = item.capmot_hora;

              if (dataTemperaturaFiltered[item.capmot_serie]) {
                dataTemperaturaFiltered[item.capmot_serie].addRow([
                  hora,
                  temperatura,
                ]);
              }

              if (dataVibracionFiltered[item.capmot_serie]) {
                dataVibracionFiltered[item.capmot_serie].addRow([
                  hora,
                  vibracion,
                ]);
              }
            }
          });

          // Dibuja los gráficos de Temperatura y Vibración en los elementos correspondientes
          chartTemperaturaElements.forEach((element) => {
            const getAttribute = element.getAttribute("data-serie");
            const chart = new google.visualization.LineChart(element);
            chart.draw(
              dataTemperaturaFiltered[getAttribute],
              optionsTemperatura
            );
          });

          chartVibracionElements.forEach((element) => {
            const getAttribute = element.getAttribute("data-serie");
            const chart = new google.visualization.LineChart(element);
            chart.draw(dataVibracionFiltered[getAttribute], optionsVibracion);
          });
        }

        // Realiza una nueva solicitud AJAX después de un tiempo determinado (1300 milisegundos)
        setTimeout(realizarSolicitud, 1300);
      })
      .fail(function (jqXHR, textStatus, errorThrown) {
        // Manejo de errores en la solicitud AJAX
        console.error("Error en la solicitud AJAX:", errorThrown);
        // Realiza una nueva solicitud AJAX después de un tiempo determinado (1300 milisegundos)
        setTimeout(realizarSolicitud, 1300);
      });
  }

  // Inicia el proceso de solicitud AJAX para dibujar los gráficos
  realizarSolicitud();
}
