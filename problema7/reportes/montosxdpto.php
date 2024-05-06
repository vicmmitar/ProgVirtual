<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <title>Reporte montos existentes</title>
</head>
<body>
    <div class="container-lg">
        <h2 class="text-center">Montos existentes por departamento</h2>
        <div class="table-responsive">
            <table class="table table-sm table-hover">
                <thead>
                    <th class='text-center' scope='col'>BENI</th>
                    <th class='text-center' scope='col'>CHUQUISACA</th>
                    <th class='text-center' scope='col'>COCHABAMBA</th>
                    <th class='text-center' scope='col'>LAPAZ</th>
                    <th class='text-center' scope='col'>ORURO</th>
                    <th class='text-center' scope='col'>PANDO</th>
                    <th class='text-center' scope='col'>POTOSI</th>
                    <th class='text-center' scope='col'>SANTACRUZ</th>
                    <th class='text-center' scope='col'>TARIJA</th>
                </thead>
                <tbody>
                    <?php
                        include "../controladores/conexion.php";
                        $query = "select 
                        sum(case when departamento='1' then saldo end) BENI,
                        sum(case when departamento='2' then saldo end) CHUQUISACA,
                        sum(case when departamento='3' then saldo end) COCHABAMBA,
                        sum(case when departamento='4' then saldo end) 'LAPAZ',
                        sum(case when departamento='5' then saldo end) ORURO,
                        sum(case when departamento='6' then saldo end) PANDO,
                        sum(case when departamento='7' then saldo end) POTOSI,
                        sum(case when departamento='8' then saldo end) 'SANTACRUZ',
                        sum(case when departamento='9' then saldo end) TARIJA
                        from cuenta_bancaria";
                        $respuesta = mysqli_query($conexion,$query);
                        $primeraFila = true;
                        while($registro = mysqli_fetch_array($respuesta)){
                            echo "  <tr>
                                        <td class='text-center'>$registro[BENI]</td>
                                        <td class='text-center'>$registro[CHUQUISACA]</td>
                                        <td class='text-center'>$registro[COCHABAMBA]</td>
                                        <td class='text-center'>$registro[LAPAZ]</td>
                                        <td class='text-center'>$registro[ORURO]</td>
                                        <td class='text-center'>$registro[PANDO]</td>
                                        <td class='text-center'>$registro[POTOSI]</td>
                                        <td class='text-center'>$registro[SANTACRUZ]</td>
                                        <td class='text-center'>$registro[TARIJA]</td>
                                    </tr>";
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    
    <script src="../js/bootstrap.bundle.js"></script>
</body>
</html>