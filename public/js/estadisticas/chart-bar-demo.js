

// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#292b2c';

let datos = JSON.parse($("#tareasPorUsuario").val());

nombres = [];
numeros = [];

for (let i = 0; i < datos.length; i++) {
    nombres.push(datos[i][0]);
    numeros.push(parseInt(datos[i][1]));
}

let maxValue = Math.max.apply(null, numeros);

// Bar Chart Example
var ctx = document.getElementById("myBarChart");
var myLineChart = new Chart(ctx, {
  type: 'bar',
  data: {
    labels: nombres,
    datasets: [{
      label: "Revenue",
      backgroundColor: "#3d3d3d",
      borderColor: "#000000",
      data: numeros,
    }],
  },
  options: {
    scales: {
      xAxes: [{
        time: {
          unit: 'Tareas'
        },
        gridLines: {
          display: false
        },
        ticks: {
          maxTicksLimit: 6
        }
      }],
      yAxes: [{
        ticks: {
          min: 0,
          max: maxValue,
          maxTicksLimit: 5
        },
        gridLines: {
          display: true
        }
      }],
    },
    legend: {
      display: false
    }
  }
});
