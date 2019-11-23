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
                url : 'generos.php',
                data : "l",
                success:function(data) {                     
                    var valores = eval(data);
                    console.log(valores);
                    var hombres = valores[0];
                    var mujeres = valores[1];

                    var ctx = document.getElementById('grafico');

                    var myChart = new Chart(ctx, {
                        type : 'pie',
                        data : {                            
                            datasets: [{                                
                                data: [hombres, mujeres],                                
                                backgroundColor: [                                    
                                    'rgba(0, 0, 255)',
                                    'rgba(255, 0, 128)'
                                ]
                            }],
                        labels: ['Hombres', 'Mujeres'],  
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
