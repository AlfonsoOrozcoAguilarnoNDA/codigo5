<?php
/**
 * GENERADOR DE REPORTE FORENSE "CÓDIGO 5" - VERSIÓN DE LECTURA DIRECTA
 * Versión: 1.1 - Alfonso Orozco Aguilar
 * En esta versión se asume que editas los datos hardcoded de la cabecera.
 */
/*
 * Caso Código 5 - Framework de Captura y Auditoría (v1.0)
 * Copyright (C) 2026  Alfonso Orozco Aguilar
 *
 * Este programa es software libre: usted puede redistribuirlo y/o modificarlo
 * bajo los términos de la Licencia Pública General GNU publicada por la
 * Free Software Foundation, ya sea la versión 3 de la licencia, o (a su 
 * elección) cualquier versión posterior.
 *
 * Este programa se distribuye con la esperanza de que sea útil, pero 
 * SIN GARANTÍA ALGUNA; incluso sin la garantía implícita de 
 * MERCANTIBILIDAD o APTITUD PARA UN PROPÓSITO PARTICULAR. 
 * Consulte la Licencia Pública General GNU para más detalles.
 *
 * Usted debería haber recibido una copia de la Licencia Pública General GNU
 * junto con este programa. Si no, consulte <https://www.gnu.org/licenses/>.
 *
 * Fecha de inicio del desarrollo: 18 de febrero de 2026
 * Hito de Cierre (60 días): 08 de abril de 2026
 */

// 1. Forzamos visualización de errores para saber si 'config.php' falla
ini_set('display_errors', 1);
error_reporting(E_ALL);

include "config.php"; 

// 2. Validación de conexión
if (!$link) {
    die("Error de conexión: " . mysqli_connect_error());
}

// 3. Consulta de datos - Cambiamos el filtro para asegurar que traiga algo
// Si 'estado > 0' no trae nada, prueba quitando el WHERE para testear
$query = "SELECT * FROM hallazgos_auditoria WHERE estado > 0 ORDER BY orden_id ASC";
$res = mysqli_query($link, $query);

// 4. Verificación de registros
$total_registros = mysqli_num_rows($res);

header('Content-Type: text/html; charset=utf-8');
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Reporte NIA - <?php echo $total_registros; ?> Hallazgos</title>
    <style>
        body { font-family: 'Segoe UI', Arial, sans-serif; line-height: 1.6; color: #333; max-width: 900px; margin: 40px auto; padding: 20px; border: 1px solid #ddd; }
        h1 { text-align: center; color: #2c3e50; border-bottom: 3px solid #2c3e50; padding-bottom: 10px; }
        h2 { color: #fff; background: #2c3e50; padding: 10px; margin-top: 30px; font-size: 1.2rem; }
        .metodologia { background: #f8f9fa; border: 1px solid #e9ecef; padding: 15px; margin-bottom: 20px; font-size: 0.9rem; }
        table { width: 100%; border-collapse: collapse; margin: 20px 0; }
        th, td { border: 1px solid #dee2e6; padding: 12px; text-align: left; }
        th { background: #f2f2f2; font-weight: bold; }
        .hallazgo { border-bottom: 1px solid #eee; padding: 20px 0; page-break-inside: avoid; }
        .id-punto { font-weight: bold; color: #d35400; text-transform: uppercase; border: 1px solid #d35400; padding: 2px 5px; border-radius: 3px; font-size: 0.8rem; }
        .footer { margin-top: 50px; font-size: 0.8rem; text-align: center; color: #7f8c8d; border-top: 1px solid #eee; padding-top: 10px; }
        .debug-info { color: red; font-weight: bold; text-align: center; }
    </style>
</head>
<body>

    <h1>ANEXO TÉCNICO: REPORTE MAESTRO DE AUDITORÍA</h1>

    <?php if ($total_registros == 0): ?>
        <p class="debug-info">ATENCIÓN: La consulta no devolvió registros con 'estado > 0'. Revisa tu base de datos.</p>
    <?php endif; ?>
    
    <div class="metodologia">
        <strong>AUDITORÍA DE GABINETE:</strong> Alfonso Orozco Aguilar (Vibecoding Mexico)<br>
        <strong>METODOLOGÍA:</strong> NIA 200, 230, 240, 250, 265, 315, 330, 500, 540, 570<br>
        <strong>EXPEDIENTE:</strong> PROFECO 0002822-2026 | <strong>CASO:</strong> CÓDIGO 5
    </div>

    <h2>1. TRAZABILIDAD COMERCIAL DOCUMENTADA (1991-2026)</h2>
    <table>
        <thead>
            <tr>
                <th>Fecha</th>
                <th>Folio</th>
                <th>Monto</th>
                <th>Categoría NIA</th>
            </tr>
        </thead>
        <tbody>
            <tr><td>07/11/2020</td><td>FTDA-3815711</td><td>$732.76</td><td>NIA 570 (Resiliencia)</td></tr>
            <tr><td>13/12/2024</td><td>F_CORP</td><td>$1,170.00</td><td>NIA 500 (Corporativo)</td></tr>
            <tr><td>07/03/2026</td><td>FTDA-10487933</td><td>$560.34</td><td>NIA 315 (Seguimiento)</td></tr>
        </tbody>
    </table>

    <h2>2. HALLAZGOS Y PAPELES DE TRABAJO</h2>
    
    <?php while ($p = mysqli_fetch_assoc($res)): ?>
    <div class="hallazgo">
        <span class="id-punto">ID: <?php echo htmlspecialchars($p['id_punto']); ?></span>
        <h3 style="margin: 10px 0;"><?php echo htmlspecialchars($p['titulo']); ?></h3>
        <p style="margin-bottom: 5px;">
            <strong>Referencia Normativa:</strong> NIA <?php echo $p['referencia_normativa']; ?> | 
            <strong>Categoría:</strong> <?php echo htmlspecialchars($p['categoria']); ?>
        </p>
        <div style="background: #fff; padding: 10px; border: 1px solid #fafafa;">
            <?php echo nl2br(htmlspecialchars($p['descripcion'])); ?>
        </div>
    </div>
    <?php endwhile; ?>

    <div class="footer">
        Generado por Sistema CÓDIGO 5 v1.1 - Alfonso Orozco Aguilar - <?php echo date("Y-m-d H:i:s"); ?> - Total Registros: <?php echo $total_registros; ?>
    </div>

</body>
</html>
