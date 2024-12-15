<div>
    <canvas id="myChart"></canvas>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

  <script>
    setInterval(() => Livewire.emit('ubahData'), 3000);
    let chartData = JSON.parse(`<?php echo $userChartData ?>`);
    console.log(chartData);
    const ctx = document.getElementById('myChart');

    new Chart(ctx, {
      type: 'bar',
      data: {
        labels: chartData.label,
        datasets: [{
          label: '# Data Pengguna Register',
          data: chartData.data,
          borderWidth: 1
        }]
      },
      options: {
        scales: {
          y: {
            beginAtZero: true
          }
        }
      }
    });
    Livewire.on('berhasilUpdate', event => {
        let chartData = JSON.parse(event.data);
        console.log(chartData)
        mychart.data.labels = chartData.label;
        myChart.data.datasets.forEach((dataset) => {
        dataset.data = chartData.data;
    });
    myChart.update();
    })
  </script>
