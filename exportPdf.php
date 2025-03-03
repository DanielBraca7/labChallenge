<?php
require_once('tcpdf/tcpdf.php');
require 'bd/conexion.php'; // importamos la conexion a la base de datos

// consulta
$query = "SELECT ventas.id, empresas.nombre AS empresa, ventas.numero_factura, 
               ventas.fecha_venta, ventas.comprador, ventas.articulos_vendidos, ventas.valor_total
        FROM ventas
        JOIN empresas ON ventas.empresa_id = empresas.id
        ORDER BY ventas.fecha_venta DESC";

$stmt = $pdo->prepare($query);
$stmt->execute();
$ventas = $stmt->fetchAll(PDO::FETCH_ASSOC);


$pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);
$pdf->SetCreator('PHP');
$pdf->SetAuthor('Tu Empresa');
$pdf->SetTitle('Informe de Ventas');
$pdf->SetHeaderData('', 0, 'Informe de Ventas','', array(0,64,255), array(0,64,128));
$pdf->setHeaderFont(Array('helvetica', '', 12));
$pdf->setFooterFont(Array('helvetica', '', 10));
$pdf->SetMargins(10, 20, 10);
$pdf->SetAutoPageBreak(TRUE, 10);
$pdf->AddPage();

// estilo de la tb
$html = '<h2 style="text-align:center;">Informe de Ventas</h2>
        <table border="1" cellpadding="5">
            <thead>
                <tr style="background-color:#007BFF;color:#fff;">
                    <th>ID</th>
                    <th>Empresa</th>
                    <th>Numero de Factura</th>
                    <th>Fecha de Venta</th>
                    <th>Comprador</th>
                    <th>Articulos</th>
                    <th>Valor (€)</th>
                </tr>
            </thead>
            <tbody>';

// agrega los datos a la bd
foreach ($ventas as $venta) {
    $html .= '<tr>
                <td>' . htmlspecialchars($venta['id']) . '</td>
                <td>' . htmlspecialchars($venta['empresa']) . '</td>
                <td>' . htmlspecialchars($venta['numero_factura']) . '</td>
                <td>' . htmlspecialchars($venta['fecha_venta']) . '</td>
                <td>' . htmlspecialchars($venta['comprador']) . '</td>
                <td>' . htmlspecialchars($venta['articulos_vendidos']) . '</td>
                <td>' . number_format($venta['valor_total'], 2, ',', '.') . ' €</td>
              </tr>';
}

$html .= '</tbody></table>';

// agrega contenido al pdg
$pdf->writeHTML($html, true, false, true, false, '');

// salida del pdf
$pdf->Output('informe_ventas.pdf', 'D'); // La tecla de forzara la descarga

?>
