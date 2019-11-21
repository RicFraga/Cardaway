<!DOCTYPE html>
<html>
<head>

    <meta charset="UTF-8"></meta>
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>

</head>
<body>
    <div class="resultados">
        <canvas id="grafico">
            <!--
                Aquí se mostrará la gráfica
            !-->
        </canvas>
    </div>
</body>
<script>
    $(document).ready(mostrarResultados());
        function mostrarResultados() {
            $.ajax({
                type : 'POST',
                url : 'postales.php',
                data : "l",
                success:function(data) {                     
                    var valores = eval(data);
                    console.log(valores);
                    var img1 = valores[0];
                    var val1 = valores[1];
                    var img2 = valores[2];                    
                    var val2 = valores[3];
                    var img3 = valores[4];
                    var val3 = valores[5];
                    var img4 = valores[6];
                    var val4 = valores[7];

                    var ctx = document.getElementById('grafico');

                    var myChart = new Chart(ctx, {
                        type : 'bar',
                        data : {
                            labels: [img1, img2, img3, img4],
                            datasets: [{
                                label: '# de envios',
                                data: [val1, val2, val3, val4],
                                backgroundColor: [
                                    'rgba(255, 99, 132, 0.2)',
                                    'rgba(54, 162, 235, 0.2)',
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
                            yAxes: [{
                                ticks: {
                                    beginAtZero: true
                                }
                            }]
                        }
                    }
                });
            }
                }).fail(function(jqXHR, textStatus, errorThrown) {
                    alert('Error de AJAX');
                    console.log(jqXHR);
                    console.log(textStatus);
                    console.log(errorThrown);
                });
            return false;
        }
</script>
</html>
