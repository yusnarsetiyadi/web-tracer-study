document.addEventListener('DOMContentLoaded', function () {
  const el = document.getElementById('alumniChart');
  if (!el) return;

  // Ambil data global yang disediakan PHP
  const stats = window.ALUMNI_STATS || {};
  const title = window.ALUMNI_CHART_TITLE || 'Statistik Alumni';

  const labels = Object.keys(stats);                // Tahun
  const work0  = Object.values(stats).map(v => v.work_0); // Biru: belum kerja (work=0)
  const work1  = Object.values(stats).map(v => v.work_1); // Hijau: sudah kerja (work=1)

  // Pastikan Chart.js sudah tersedia
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
          backgroundColor: 'rgba(54, 162, 235, 0.7)'   // biru
        },
        {
          label: 'Sudah Kerja',
          data: work1,
          backgroundColor: 'rgba(75, 192, 92, 0.7)'     // hijau
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
          ticks: { precision: 0 } // biar angka utuh
        }
      }
    }
  });
});
