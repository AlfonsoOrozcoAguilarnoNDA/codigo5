<?php
/**
 * SISTEMA "CÓDIGO 5" - AUDITORÍA SOCIAL Y FORENSE
 * Versión: 1.3 - Núcleo de Expediente Integrado
 * Autor: Alfonso Orozco Aguilar
 * * Basado en: NIA 200, 230, 240, 250, 265, 315, 330, 500, 540, 570 
 * Marco Legal: LFPC, NOM-251, Código Civil, CNPP 222 */
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

// 1. CONFIGURACIÓN DE SEGURIDAD Y ENTORNO
header('Content-Type: text/html; charset=utf-8');
include "config.php";
mb_internal_encoding("UTF-8");

// Filtro de Dirección IP (Ajustar a tu IP fija o rango de red)
$ip_autorizada = '127.0.0.1'; // Cambiar por tu IP real
$ip_autorizada = '201.124.111.118'; // Cambiar por tu IP real

if ($_SERVER['REMOTE_ADDR'] !== $ip_autorizada && $_SERVER['REMOTE_ADDR'] !== '::1') {
    die("Acceso Denegado.");
}

// 2. LÓGICA DE PROCESAMIENTO (POST)
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['accion'])) {
    $id = mysqli_real_escape_string($link, $_POST['id_punto']);
    $desc = mysqli_real_escape_string($link, $_POST['descripcion']);
    $estado = (int)$_POST['estado'];
    
    if ($_POST['accion'] === 'guardar') {
        $upd = "UPDATE hallazgos_auditoria SET descripcion='$desc', estado='$estado' WHERE id_punto='$id'";
        mysqli_query($link, $upd);
    }
    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}

// 3. CÁLCULO DE ESTADÍSTICAS (Soberanía de Datos)
$stats_query = mysqli_query($link, "SELECT estado, COUNT(*) as total FROM hallazgos_auditoria GROUP BY estado");
$totales = [0 => 0, 1 => 0, 2 => 0];
$gran_total = 0;

while ($s = mysqli_fetch_assoc($stats_query)) {
    $totales[$s['estado']] = $s['total'];
    $gran_total += $s['total'];
}

// Evitar división por cero
$p_gris = ($gran_total > 0) ? round(($totales[0] / $gran_total) * 100, 1) : 0;
$p_dorado = ($gran_total > 0) ? round(($totales[1] / $gran_total) * 100, 1) : 0;
$p_verde = ($gran_total > 0) ? round(($totales[2] / $gran_total) * 100, 1) : 0;
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>CÓDIGO 5 | Panel de Control Forense</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/all.min.css">
    <style>
        body { background-color: #f8f9fa; font-size: 0.9rem; }
        .estado-0 { border-left: 5px solid #6c757d; } 
        .estado-1 { border-left: 5px solid #ffc107; } 
        .estado-2 { border-left: 5px solid #28a745; } 
        .sticky-stats { position: sticky; bottom: 0; background: white; border-top: 2px solid #dee2e6; padding: 15px 0; z-index: 1000; }
        @media print { .no-print { display: none; } .sticky-stats { position: static; } }
    </style>
</head>
<body>

<nav class="navbar navbar-dark bg-dark mb-4 no-print">
    <span class="navbar-brand">CÓDIGO 5: Índice Maestro v1.2 </span>
    <span class="text-light small">Auditor: Alfonso Orozco Aguilar</span>
</nav>

<div class="container-fluid pb-5">
    <div class="row">
        <div class="col-md-5 no-print">
            <h5 class="mb-3">Estructura Documental (Orden ID) </h5>
            <div class="list-group shadow-sm">
                <?php
                // Ordenamiento estricto por la nueva columna incremental
                $res = mysqli_query($link, "SELECT * FROM hallazgos_auditoria ORDER BY orden_id ASC");
                while ($row = mysqli_fetch_assoc($res)):
                    $dot_color = ($row['estado'] == 2) ? 'text-success' : (($row['estado'] == 1) ? 'text-warning' : 'text-secondary');
                ?>
                <a href="?edit=<?php echo $row['id_punto']; ?>" class="list-group-item list-group-item-action py-2">
                    <small class="text-muted">#<?php echo $row['orden_id']; ?></small> 
                    <strong><?php echo $row['id_punto']; ?></strong> - <?php echo $row['titulo']; ?> 
                    <i class="fas fa-circle float-right <?php echo $dot_color; ?>"></i>
                </a>
                <?php endwhile; ?>
            </div>
        </div>

        <div class="col-md-7">
            <?php if (isset($_GET['edit'])): 
                $id_e = mysqli_real_escape_string($link, $_GET['edit']);
                $data = mysqli_fetch_assoc(mysqli_query($link, "SELECT * FROM hallazgos_auditoria WHERE id_punto='$id_e'"));
            ?>
            <div class="card shadow no-print mb-4">
                <div class="card-header bg-dark text-white">Editar: <?php echo $data['id_punto']; ?></div>
                <div class="card-body">
                    <form method="POST">
                        <input type="hidden" name="id_punto" value="<?php echo $data['id_punto']; ?>">
                        <input type="hidden" name="accion" value="guardar">
                        <div class="form-group">
                            <label>Contenido del Papel de Trabajo (NIA <?php echo $data['referencia_normativa']; ?>) </label>
                            <textarea name="descripcion" class="form-control" rows="8"><?php echo $data['descripcion']; ?></textarea>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6">
                                <select name="estado" class="form-control">
                                    <option value="0" <?php if($data['estado']==0) echo 'selected'; ?>> Gris (Pendiente) </option>
                                    <option value="1" <?php if($data['estado']==1) echo 'selected'; ?>> Dorado (Iniciado) </option>
                                    <option value="2" <?php if($data['estado']==2) echo 'selected'; ?>> Verde (Listo) </option>
                                </select>
                            </div>
                            <div class="col-md-6 text-right">
                                <button type="submit" class="btn btn-success">Guardar Cambios</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <?php endif; ?>

            <div id="printable-area">
                <h4 class="text-center d-none d-print-block">REPORTE MAESTRO - CASO CÓDIGO 5 </h4>
                <?php
                $res_p = mysqli_query($link, "SELECT * FROM hallazgos_auditoria WHERE estado > 0 ORDER BY orden_id ASC");
                while ($p = mysqli_fetch_assoc($res_p)):
                ?>
                <div class="card mb-3 estado-<?php echo $p['estado']; ?> shadow-sm">
                    <div class="card-body">
                        <h6><?php echo $p['id_punto']; ?>. <?php echo $p['titulo']; ?> </h6>
                        <p class="small text-muted">NIA: <?php echo $p['referencia_normativa']; ?> | Nodo: <?php echo $p['categoria']; ?>  </p>
                        <p class="card-text"><?php echo nl2br($p['descripcion']); ?></p>
                    </div>
                </div>
                <?php endwhile; ?>
            </div>
        </div>
    </div>
</div>

<div class="sticky-stats no-print shadow-lg">
    <div class="container">
        <div class="row text-center">
            <div class="col-md-3">
                <span class="h5"><?php echo $gran_total; ?></span><br><small>TOTAL PUNTOS </small>
            </div>
            <div class="col-md-3 text-secondary">
                <span class="h5"><?php echo $p_gris; ?>%</span> (<?php echo $totales[0]; ?>)<br><small>PENDIENTES (GRIS) </small>
            </div>
            <div class="col-md-3 text-warning">
                <span class="h5"><?php echo $p_dorado; ?>%</span> (<?php echo $totales[1]; ?>)<br><small>INICIADOS (DORADO) </small>
            </div>
            <div class="col-md-3 text-success">
                <span class="h5"><?php echo $p_verde; ?>%</span> (<?php echo $totales[2]; ?>)<br><small>COMPLETADOS (VERDE) </small>
            </div>
        </div>
        <div class="progress mt-2" style="height: 10px;">
            <div class="progress-bar bg-success" style="width: <?php echo $p_verde; ?>%"></div>
            <div class="progress-bar bg-warning" style="width: <?php echo $p_dorado; ?>%"></div>
            <div class="progress-bar bg-secondary" style="width: <?php echo $p_gris; ?>%"></div>
        </div>
    </div>
</div>

</body>
</html>
