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
                url : 'envios_semanales.php',
                data : "l",
                success:function(data) {                    
                    var valores = eval(data);
                    var lunes = valores[0];
                    var martes = valores[1];
                    var miercoles = valores[2];
                    var jueves = valores[3];
                    var viernes = valores[4];
                    var sabado = valores[5];
                    var domingo = valores[6];

                    var ctx = document.getElementById('grafico');

                    var myChart = new Chart(ctx, {
                        type : 'bar',
                        data : {
                            labels: ['Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado', 'Domingo'],
                            datasets: [{
                                label: '# de envios',
                                data: [lunes, martes, miercoles, jueves, viernes, sabado, domingo],
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
