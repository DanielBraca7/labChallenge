<?php
require 'bd/conexion.php'; 

// consulta para obtener los datos 
$query = "SELECT ventas.id, empresas.nombre AS empresa, ventas.numero_factura, 
               ventas.fecha_venta, ventas.comprador, ventas.articulos_vendidos, ventas.valor_total
        FROM ventas
        JOIN empresas ON ventas.empresa_id = empresas.id
        ORDER BY ventas.fecha_venta DESC"; // ordenar por fecha de venta

$stmt = $pdo->prepare($query);
$stmt->execute();
$ventas = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informe de Ventas</title>
    <style>
    
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }

        .container {
            width: 90%;
            max-width: 1200px;
            margin: 30px auto;
            background: white;
            padding: 25px;
            border-radius: 8px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

   
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background: white;
            border-radius: 5px;
            overflow: hidden;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #007BFF;
            color: white;
            text-align: center;
            font-size: 16px;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #d1ecf1;
            transition: 0.3s;
        }

        td {
            text-align: center;
        }

        td:nth-child(2), td:nth-child(5), td:nth-child(6) {
            text-align: left;
        }

        .exportar-btn {
            display: block;
            width: fit-content;
            margin: 30px auto;
            background: #007BFF;
            color: white;
            padding: 14px 24px;
            border: none;
            cursor: pointer;
            font-size: 16px;
            border-radius: 5px;
            text-decoration: none;
            text-align: center;
            transition: 0.3s;
            font-weight: bold;
            box-shadow: 0px 3px 6px rgba(0, 0, 0, 0.2);
        }

        .exportar-btn:hover {
            background: #0056b3;
            transform: scale(1.05);
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.3);
        }

    </style>
</head>
<body>
    <div class="container">
        <h2>Informe de Ventas</h2>
        
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Empresa</th>
                    <th>Numero de Factura</th>
                    <th>Fecha de Venta</th>
                    <th>Comprador</th>
                    <th>Articulos Vendidos</th>
                    <th>Valor Total (€)</th>
                </tr>
            </thead>
            <tbody>
                <?php if (count($ventas) > 0): ?>
                    <?php foreach ($ventas as $venta): ?>
                        <tr>
                            <td><?= htmlspecialchars($venta['id']) ?></td>
                            <td><?= htmlspecialchars($venta['empresa']) ?></td>
                            <td><?= htmlspecialchars($venta['numero_factura']) ?></td>
                            <td><?= htmlspecialchars($venta['fecha_venta']) ?></td>
                            <td><?= htmlspecialchars($venta['comprador']) ?></td>
                            <td><?= htmlspecialchars($venta['articulos_vendidos']) ?></td>
                            <td><?= number_format($venta['valor_total'], 2, ',', '.') ?> €</td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="7" style="text-align: center;">No hay datos disponibles</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>

        <!-- boton para pdf -->
        <form action="exportPdf.php" method="post">
            <button type="submit" class="exportar-btn">Exportar a PDF</button>
        </form>
    </div>
</body>
</html>
