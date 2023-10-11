// ======================================= Temperatura ======================================= \\

// Cargar la biblioteca de Google Charts y establecer la devolución de llamada al cargar
google.charts.load("current", { packages: ["corechart"] });
google.charts.setOnLoadCallback(drawChart);

function drawChart() {
  // Crear un objeto DataTable para almacenar los datos del gráfico de temperatura
  let data = new google.visualization.DataTable();
  data.addColumn("string", "Hora"); // Definir la columna de las horas como "string"
  data.addColumn("number", "Temperatura"); // Definir la columna de la temperatura como "number"

  // Opciones de configuración del gráfico de temperatura
  let options = {
    title: "",
    curveType: "function",
    legend: { position: "bottom" },
  };

  // Crear un objeto LineChart para el gráfico de temperatura
  let chart = new google.visualization.LineChart(
    document.getElementById("chart_temperatura")
  );

  function realizarSolicitud() {
    // Realizar una solicitud AJAX para obtener datos de temperatura desde el servidor
    $.ajax({
      url: "http://localhost/graficos/graficos.php?q=1",
      dataType: "json",
    })
      .done(function (responseData) {
        if (responseData && responseData.length > 0) {
          data.removeRows(0, data.getNumberOfRows()); // Limpia los datos actuales

          // Iterar sobre los datos recibidos y agregarlos al objeto DataTable
          for (let i = 0; i < responseData.length; i++) {
            let temperatura = parseFloat(responseData[i].capmot_temperatura); // Obtener la temperatura desde la respuesta
            let hora = responseData[i].capmot_hora; // Obtener la hora desde la respuesta
            data.addRow([hora, temperatura]);
          }

          // Dibujar el gráfico de temperatura con los datos y opciones
          chart.draw(data, options);
        }
        setTimeout(realizarSolicitud, 1300); // Realizar la próxima solicitud después de 1300 ms
      })
      .fail(function (jqXHR, textStatus, errorThrown) {
        console.error("Error en la solicitud AJAX:", errorThrown);
        setTimeout(realizarSolicitud, 1300); // Intentar nuevamente después de 1300 ms en caso de error
      });
  }

  // Iniciar la primera solicitud al cargar la página
  realizarSolicitud();
}

// ======================================= Vibración ======================================= \\

// Cargar la biblioteca de Google Charts y establecer la devolución de llamada al cargar
google.charts.load("current", { packages: ["corechart", "line"] });
google.charts.setOnLoadCallback(drawBasic);

function drawBasic() {
  // Crear un objeto DataTable para almacenar los datos del gráfico de vibración
  let data = new google.visualization.DataTable();
  data.addColumn("string", "Hora"); // Definir la columna de las horas como "string"
  data.addColumn("number", "Vibración"); // Definir la columna de la vibración como "number"

  // Opciones de configuración del gráfico de vibración
  let options = {
    title: "",
    legend: { position: "bottom" },
  };

  // Crear un objeto LineChart para el gráfico de vibración
  let chart = new google.visualization.LineChart(
    document.getElementById("chart_vibracion")
  );

  function realizarSolicitud() {
    // Realizar una solicitud AJAX para obtener datos de vibración desde el servidor
    $.ajax({
      url: "http://localhost/graficos/graficos.php?q=1",
      dataType: "json",
    })
      .done(function (responseData) {
        if (responseData && responseData.length > 0) {
          data.removeRows(0, data.getNumberOfRows()); // Limpia los datos actuales

          // Iterar sobre los datos recibidos y agregarlos al objeto DataTable
          for (let i = 0; i < responseData.length; i++) {
            let vibracion = parseFloat(responseData[i].capmot_vibracion); // Obtener la vibración desde la respuesta
            let hora = responseData[i].capmot_hora; // Obtener la hora desde la respuesta
            console.log(`[${hora}, ${vibracion}]`);
            data.addRow([hora, vibracion]);
          }

          // Dibujar el gráfico de vibración con los datos y opciones
          chart.draw(data, options);
        }
        setTimeout(realizarSolicitud, 1300); // Realizar la próxima solicitud después de 1300 ms
      })
      .fail(function (jqXHR, textStatus, errorThrown) {
        console.error("Error en la solicitud AJAX:", errorThrown);
        setTimeout(realizarSolicitud, 1300); // Intentar nuevamente después de 1300 ms en caso de error
      });
  }

  // Iniciar la primera solicitud al cargar la página
  realizarSolicitud();
}
