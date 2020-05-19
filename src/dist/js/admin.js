window.addEventListener('load', () => {
  moment.locale('us');
  const ctx = document.getElementById('chart').getContext('2d');

  const data = new Array(12).fill(0);

  (_LIKES || []).forEach(({ count, month }) => {
    data[month] = Number(count);
  });

  const myChart = new Chart(ctx, {
    type: 'line',
    data: {
      labels: moment.months(),
      datasets: [{
        label: 'Likes Count',
        data,
        borderWidth: 3,
        fill: false,
        backgroundColor: 'rgb(255, 99, 132)',
        borderColor: 'rgb(255, 99, 132)',
      }]
    },
    options: {
      scales: {
        yAxes: [{
          ticks: {
            beginAtZero: true
          }
        }]
      }
    }
  });
});
