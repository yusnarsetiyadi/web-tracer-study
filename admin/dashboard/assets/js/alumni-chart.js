document.addEventListener('DOMContentLoaded', function () {
  const el = document.getElementById('alumniChart');
  if (!el) return;

  const stats = window.ALUMNI_STATS || {};
  const title = window.ALUMNI_CHART_TITLE || 'Statistik Alumni';

  const labels = Object.keys(stats);                
  const work0  = Object.values(stats).map(v => v.work_0); 
  const work1  = Object.values(stats).map(v => v.work_1); 
  const total  = Object.values(stats).map(v => v.work_0 + v.work_1); 

  if (typeof Chart === 'undefined') {
    console.error('Chart.js belum dimuat.');
    return;
  }

  const ctx = el.getContext('2d');
  new Chart(ctx, {
    type: 'bar',
    data: {
      labels,
      datasets: [
        {
          label: 'Belum Kerja',
          data: work0,
          backgroundColor: 'rgba(54, 162, 235, 0.7)'
        },
        {
          label: 'Sudah Kerja',
          data: work1,
          backgroundColor: 'rgba(75, 192, 92, 0.7)'
        },
        {
          label: 'Total Alumni',
          data: total,
          type: 'line',
          borderColor: 'rgba(255, 99, 132, 1)',
          borderWidth: 2,
          fill: false,
          tension: 0.3,
          yAxisID: 'y'
        },
        {
          label: 'Tren Sudah Kerja',
          data: work1,
          type: 'line',
          borderColor: 'rgba(0, 200, 0, 1)',
          borderWidth: 2,
          borderDash: [5, 5], // garis putus-putus biar beda
          fill: false,
          tension: 0.3,
          yAxisID: 'y'
        }
      ]
    },
    options: {
      responsive: true,
      plugins: {
        legend: { position: 'top' },
        title:  { display: true, text: title }
      },
      scales: {
        y: {
          beginAtZero: true,
          ticks: { precision: 0 }
        }
      }
    }
  });
});
