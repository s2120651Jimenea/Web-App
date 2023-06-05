<!DOCTYPE html>
<html>
<head>
  <div class ="chart-title">Receiving and Releasing Data Report</div>
<style>
    #line-chart {
      height: 695px;
      width: 1275px;
      margin-left: 80px
    }
  </style>ssssss
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
  <div>
    <canvas id="line-chart"></canvas>
  </div>

  <script>
    // Sample data for two datasets
    var dataset1 = [40, 66, 45, 52, 61, 51, 50];
    var dataset2 = [45, 55, 55, 45, 55, 65, 75];
    var labels = ["January", "February", "March", "April", "May", "June"];

    // Create a new chart
    var ctx = document.getElementById('line-chart').getContext('2d');
    var chart = new Chart(ctx, {
      type: 'line',
      data: {
        labels: labels,
        datasets: [
          {
            label: 'Receiving',
            data: dataset1,
            borderColor: 'rgba(128, 128, 128, 0.751)',
            fill: false
          },
          {
            label: 'Releasing',
            data: dataset2,
            borderColor: 'rgb(139, 0, 0)',
            fill: false
          }
        ]
      },
      options: {
        responsive: true,
        scales: {
          x: {
            display: true,
            title: {
              display: true,
              text: ''
            }
          },
          y: {
            display: true,
            title: {
              display: true,
              text: ''
            }
          }
        }
      }
    });
  </script>
</body>
</html>