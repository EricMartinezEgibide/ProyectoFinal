// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#292b2c';

//DATOS


// Pie Chart Example
var ctx = document.getElementById("myPieChart");
var myPieChart = new Chart(ctx, {
  type: 'pie',
  data: {
    labels: ["En progreso", "Finalizadas"],
    datasets: [{
      data: [$("#tareasEnProgreso").val(), $("#tareasAcabadas").val()],
      backgroundColor: ['#c7c7c7', '#3d3d3d'],
    }],
  },
});
