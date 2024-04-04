@extends('layouts.app')

@section('page-title', 'Home')

@section('main-content')
  <canvas id="orderChart" width="500" height="200"></canvas>
  
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  
  <script>
    let ctx = document.getElementById('orderChart').getContext('2d');

    // Inizializza un array di totali con zeri per tutti i mesi
    let totals = Array.from({ length: 12 }, () => 0);

    fetch('/admin/orders-data')
      .then(response => response.json())
      .then(data => {
        // Sovrascrivi i valori dei totali per i mesi con ordini effettivi
        data.forEach(item => {
          totals[item.month - 1] = item.total;
        });

        let months = ['Gennaio', 'Febbraio', 'Marzo', 'Aprile', 'Maggio', 'Giugno', 'Luglio', 'Agosto', 'Settembre', 'Ottobre', 'Novembre', 'Dicembre'];

        let myChart = new Chart(ctx, {
          type: 'bar',
          data: {
            labels: months,
            datasets: [{
              label: 'Total Orders',
              data: totals,
              backgroundColor:[
                'rgba(144, 238, 144, 1)',
                'rgba(255, 255, 153, 1)',
                'rgba(135, 206, 250, 1)',
                'rgba(255, 159, 64, 1)',
                'rgba(255, 192, 203, 1)',
                'rgba(173, 216, 230, 1)',
                'rgba(126, 192, 238, 1)',
                'rgba(255, 215, 0, 1)',
                'rgba(182, 102, 210, 1)',
                'rgba(173, 216, 230, 1)',
                'rgba(255, 182, 193, 1)',
                'rgba(0, 255, 255, 1)'                                  
              ],
              borderColor: [
                'rgba(144, 238, 144, 1)',
                'rgba(255, 255, 153, 1)',
                'rgba(135, 206, 250, 1)',
                'rgba(255, 159, 64, 1)',
                'rgba(255, 192, 203, 1)',
                'rgba(173, 216, 230, 1)',
                'rgba(126, 192, 238, 1)',
                'rgba(255, 215, 0, 1)',
                'rgba(182, 102, 210, 1)',
                'rgba(173, 216, 230, 1)',
                'rgba(255, 182, 193, 1)',
                'rgba(0, 255, 255, 1)'                                  
              ],
              borderWidth: 1
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
  </script>
   
@endsection