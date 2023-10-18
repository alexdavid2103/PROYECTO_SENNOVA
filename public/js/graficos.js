google.charts.load("current", { packages: ["corechart"] });
    google.charts.setOnLoadCallback(drawCharts);

    function drawCharts() {
      let dataTemperaturaFiltered = {};
      let dataVibracionFiltered = {};

      let optionsTemperatura = {
        title: "Gráfico de Temperatura",
        curveType: "function",
        legend: { position: "none" },
        hAxis: {
          title: "",
          textPosition: "none",
        },
      };

      let optionsVibracion = {
        title: "Gráfico de Vibración",
        legend: { position: "none" },
        hAxis: {
          title: "",
          textPosition: "none",
        },
      };

      let chartTemperaturaElements = document.querySelectorAll(".chart_temperatura");
      let chartVibracionElements = document.querySelectorAll(".chart_vibracion");

      chartTemperaturaElements.forEach((element) => {
        let getAttribute = element.getAttribute("data-serie");
        dataTemperaturaFiltered[getAttribute] = new google.visualization.DataTable();
        dataTemperaturaFiltered[getAttribute].addColumn("string", "Hora");
        dataTemperaturaFiltered[getAttribute].addColumn("number", "Temperatura");
      });

      chartVibracionElements.forEach((element) => {
        let getAttribute = element.getAttribute("data-serie");
        dataVibracionFiltered[getAttribute] = new google.visualization.DataTable();
        dataVibracionFiltered[getAttribute].addColumn("string", "Hora");
        dataVibracionFiltered[getAttribute].addColumn("number", "Vibración");
      });

      function realizarSolicitud() {
        $.ajax({
          url: "http://localhost/PROYECTO_SENNOVA/?controller=motor&action=graficas",
          dataType: "json",
        })
          .done(function (responseData) {
            if (responseData && responseData.length > 0) {
              chartTemperaturaElements.forEach((element) => {
                let getAttribute = element.getAttribute("data-serie");
                dataTemperaturaFiltered[getAttribute].removeRows(0, dataTemperaturaFiltered[getAttribute].getNumberOfRows());
              });

              chartVibracionElements.forEach((element) => {
                let getAttribute = element.getAttribute("data-serie");
                dataVibracionFiltered[getAttribute].removeRows(0, dataVibracionFiltered[getAttribute].getNumberOfRows());
              });

              responseData.forEach((item) => {
                if (item.capmot_serie) {
                  let temperatura = parseFloat(item.capmot_temperatura);
                  let vibracion = parseFloat(item.capmot_vibracion);
                  let hora = item.capmot_hora;

                  if (dataTemperaturaFiltered[item.capmot_serie]) {
                    dataTemperaturaFiltered[item.capmot_serie].addRow([hora, temperatura]);
                  }

                  if (dataVibracionFiltered[item.capmot_serie]) {
                    dataVibracionFiltered[item.capmot_serie].addRow([hora, vibracion]);
                  }
                }
              });

              chartTemperaturaElements.forEach((element) => {
                let getAttribute = element.getAttribute("data-serie");
                let chart = new google.visualization.LineChart(element);
                chart.draw(dataTemperaturaFiltered[getAttribute], optionsTemperatura);
              });

              chartVibracionElements.forEach((element) => {
                let getAttribute = element.getAttribute("data-serie");
                let chart = new google.visualization.LineChart(element);
                chart.draw(dataVibracionFiltered[getAttribute], optionsVibracion);
              });
            }

            setTimeout(realizarSolicitud, 1300);
          })
          .fail(function (jqXHR, textStatus, errorThrown) {
            console.error("Error en la solicitud AJAX:", errorThrown);
            setTimeout(realizarSolicitud, 1300);
          });
      }

      realizarSolicitud();
    }