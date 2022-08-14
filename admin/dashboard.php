<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap-4.6.0-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../style.css">
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Chart.js link for drawing graphs and charts -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <title>Products Management</title>
    
</head>
<body>
<!-- Graphs here.......... -->
<div class="container">
    <div class="row">
        <div class="col-lg-4">
            <div class="card text-center">
                <img class="card-img-top" src="../images/category.png" alt="">
                <div class="card-body">
                    <h4 class="card-title">Category</h4>
                    <p class="card-text">Available Categories</p>
                    <h2 class="text-center p-3">09</h2>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card text-center">
                <img class="card-img-top" src="../images/mybrand.png" alt="">
                <div class="card-body">
                    <h4 class="card-title">Brands</h4>
                    <p class="card-text">Available Brands</p>
                    <h2 class="text-center p-3">05</h2>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            
        <canvas id="myChart" width="300" height="300"></canvas>
    <script>
    const ctx = document.getElementById('myChart').getContext('2d');
    const myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Brands','Categories'],
            datasets: [{
                label: 'Brands & Categories available',
                data: [56,89],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(34, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
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
    </script>
        </div>
    </div>
</div>
</body>
<script src="../bootstrap-4.6.0-dist/js/bootstrap.min.js"></script>
<script src="../bootstrap-4.6.0-dist/js/bootstrap.js"></script>
</body>
</html>