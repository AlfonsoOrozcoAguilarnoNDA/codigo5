<?php
// ============================================================
// MÓDULO 4: COMPARATIVA ESTADÍSTICA — 7 FEB vs 7 MAR 2026
// Metodología: NIA 265 — Persistencia de deficiencias materiales
// ============================================================

$comparativa = [
  ['aspecto'=>'Tiempo de espera',          'feb'=>'100+ min sin servicio',          'mar'=>'30+ min (salón 40% ocupado)',       'estado'=>'PERSISTE',  'mejora'=>false],
  ['aspecto'=>'Disculpa ofrecida',         'feb'=>'Ninguna — tono burlón (audio)',   'mar'=>'Ninguna — patrón reincidente',      'estado'=>'PERSISTE',  'mejora'=>false],
  ['aspecto'=>'Calidad de alimentos',      'feb'=>'No evaluada (nunca sirvieron)',   'mar'=>'Deficiente — frío, insípido',       'estado'=>'NUEVO',     'mejora'=>false],
  ['aspecto'=>'Temperatura platillos',     'feb'=>'No evaluada',                    'mar'=>'Frío al servir — documentado',      'estado'=>'NUEVO',     'mejora'=>false],
  ['aspecto'=>'Presentación vs. menú',     'feb'=>'No evaluada',                    'mar'=>'Deficiente — falta jitomate, porción mínima', 'estado'=>'NUEVO', 'mejora'=>false],
  ['aspecto'=>'Higiene — cofia cocina',    'feb'=>'No evaluada',                    'mar'=>'Violación NOM-251 documentada',     'estado'=>'NUEVO',     'mejora'=>false],
  ['aspecto'=>'Contaminación cruzada',     'feb'=>'No evaluada',                    'mar'=>'Documentada — sin intervención',    'estado'=>'CRÍTICO',   'mejora'=>false],
  ['aspecto'=>'Personal identificado',     'feb'=>'Sin ID ni uniforme (3-5 pers.)', 'mar'=>'Personal nuevo — sin incidente',    'estado'=>'PARCIAL',   'mejora'=>true],
  ['aspecto'=>'Seguridad no identificada', 'feb'=>'Cerco táctico documentado',      'mar'=>'Ausente — confirma uso selectivo',  'estado'=>'CORREGIDO', 'mejora'=>true],
  ['aspecto'=>'Respuesta Grupo Carso',     'feb'=>'Notificados 10-feb (acuse)',      'mar'=>'Sin respuesta formal en 25 días',   'estado'=>'PERSISTE',  'mejora'=>false],
  ['aspecto'=>'Supervisión de piso',       'feb'=>'Nula — 2h sin jefe de piso',     'mar'=>'10 personas sin actividad activa',  'estado'=>'PERSISTE',  'mejora'=>false],
  ['aspecto'=>'Robos documentados',        'feb'=>'Patrón previo 6 meses',          'mar'=>'Sin nuevo caso documentado ese día','estado'=>'SIN DATOS', 'mejora'=>null],
];

$persiste  = count(array_filter($comparativa, fn($r) => $r['estado'] === 'PERSISTE'));
$critico   = count(array_filter($comparativa, fn($r) => $r['estado'] === 'CRÍTICO'));
$nuevo     = count(array_filter($comparativa, fn($r) => $r['estado'] === 'NUEVO'));
$corregido = count(array_filter($comparativa, fn($r) => $r['estado'] === 'CORREGIDO'));
$parcial   = count(array_filter($comparativa, fn($r) => $r['estado'] === 'PARCIAL'));

$colEstado = [
  'PERSISTE'  => '#C00000',
  'CRÍTICO'   => '#6b0000',
  'NUEVO'     => '#7F4000',
  'CORREGIDO' => '#1e7e34',
  'PARCIAL'   => '#e67e22',
  'SIN DATOS' => '#888888',
];
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Comparativa Estadística — 7 Feb vs 7 Mar 2026</title>
<style>
  * { box-sizing: border-box; margin: 0; padding: 0; }
  body { font-family: Arial, sans-serif; background: #f4f6f9; color: #222; }
  .header { background: #2E5090; color: white; padding: 28px 40px; border-bottom: 6px solid #C00000; }
  .nav { background: #1a3060; padding: 10px 40px; }
  .nav a { color: #aac4e8; text-decoration: none; font-size: 0.9em; margin-right: 20px; }
  .nav a:hover { color: white; }
  .container { max-width: 1000px; margin: 0 auto; padding: 36px 20px; }
  .kpis { display: grid; grid-template-columns: repeat(auto-fit, minmax(150px,1fr)); gap: 14px; margin-bottom: 28px; }
  .kpi { background: white; border-radius: 8px; padding: 16px; text-align: center; box-shadow: 0 2px 8px rgba(0,0,0,0.07); }
  .kpi .num { font-size: 2em; font-weight: bold; }
  .kpi .lbl { font-size: 0.78em; color: #666; margin-top: 4px; line-height: 1.4; }
  .section { background: white; border-radius: 8px; padding: 24px; margin-bottom: 24px; box-shadow: 0 2px 8px rgba(0,0,0,0.07); }
  .section h2 { color: #2E5090; font-size: 1.05em; margin-bottom: 16px; padding-bottom: 8px; border-bottom: 2px solid #2E5090; }
  table { width: 100%; border-collapse: collapse; font-size: 0.86em; }
  th { background: #2E5090; color: white; padding: 10px 12px; text-align: left; }
  td { padding: 9px 12px; border-bottom: 1px solid #eee; vertical-align: middle; line-height: 1.4; }
  tr:hover td { background: #f0f4ff; }
  .estado-badge { display: inline-block; padding: 3px 10px; border-radius: 12px; color: white; font-size: 0.78em; font-weight: bold; }
  .conclusion { background: #e8f0fe; border-left: 6px solid #2E5090; padding: 16px 20px; border-radius: 4px; margin-top: 16px; font-size: 0.9em; line-height: 1.7; }
  .conclusion strong { color: #2E5090; }
  .conclusion.rojo { background: #fff5f5; border-left-color: #C00000; }
  .conclusion.rojo strong { color: #C00000; }
  .bar-section { margin-bottom: 12px; }
  .bar-row { display: flex; align-items: center; gap: 10px; margin-bottom: 6px; font-size: 0.85em; }
  .bar-label { width: 100px; flex-shrink: 0; font-size: 0.82em; }
  .bar { height: 24px; border-radius: 3px; display: flex; align-items: center; padding-left: 8px; color: white; font-size: 0.78em; font-weight: bold; min-width: 40px; transition: width 0.3s; }
  .total-row { background: #1F3864; color: white; font-weight: bold; }
</style>
</head>
<body>
<div class="header">
  <h1>📊 Comparativa Estadística — Ambas Visitas</h1>
  <p style="opacity:0.85;font-size:0.9em;margin-top:4px">7 Febrero 2026 (Incidente Código 5) vs. 7 Marzo 2026 (Mystery Shopper)</p>
  <p style="opacity:0.7;font-size:0.82em;margin-top:4px">Exactamente 1 mes de diferencia | Misma hora | Misma sucursal</p>
</div>
<div class="nav">
  <a href="index.php">← Panel principal</a>
  <a href="bayesiano_marzo.php">Análisis bayesiano</a>
  <a href="arbol_decisiones.php">Árbol de decisiones</a>
  <a href="riesgo_patrimonial.php">Riesgo patrimonial</a>
</div>
<div class="container">

  <div class="kpis">
    <div class="kpi"><div class="num" style="color:#C00000"><?= $persiste ?></div><div class="lbl">Deficiencias que persisten</div></div>
    <div class="kpi"><div class="num" style="color:#6b0000"><?= $critico ?></div><div class="lbl">Deficiencias críticas nuevas</div></div>
    <div class="kpi"><div class="num" style="color:#7F4000"><?= $nuevo ?></div><div class="lbl">Deficiencias nuevas detectadas</div></div>
    <div class="kpi"><div class="num" style="color:#1e7e34"><?= $corregido ?></div><div class="lbl">Aspectos corregidos</div></div>
    <div class="kpi"><div class="num" style="color:#e67e22"><?= $parcial ?></div><div class="lbl">Corrección parcial</div></div>
  </div>

  <div class="section">
    <h2>📈 Distribución de resultados</h2>
    <?php
    $totales = ['PERSISTE'=>$persiste,'CRÍTICO'=>$critico,'NUEVO'=>$nuevo,'CORREGIDO'=>$corregido,'PARCIAL'=>$parcial];
    $max = max($totales);
    foreach($totales as $estado => $n):
      if(!$n) continue;
      $w = round(($n / $max) * 80);
    ?>
    <div class="bar-row">
      <div class="bar-label"><span class="estado-badge" style="background:<?= $colEstado[$estado] ?>"><?= $estado ?></span></div>
      <div class="bar" style="width:<?= max($w,8) ?>%;background:<?= $colEstado[$estado] ?>"><?= $n ?></div>
      <div style="color:#888;font-size:0.82em"><?= round($n/count($comparativa)*100) ?>% del total evaluado</div>
    </div>
    <?php endforeach; ?>

    <div class="conclusion rojo" style="margin-top:16px">
      <strong>Conclusión NIA 265:</strong> El <?= round(($persiste+$critico+$nuevo)/count($comparativa)*100) ?>% de los aspectos evaluados presentan deficiencias activas en la visita de marzo. Solo el <?= round($corregido/count($comparativa)*100) ?>% fue corregido (operativo de seguridad). Cambiar personal sin modificar cultura operativa es la definición exacta de corrección superficial bajo el Marco COSO.
    </div>
  </div>

  <div class="section">
    <h2>🔍 Tabla comparativa detallada</h2>
    <table>
      <tr><th>Aspecto evaluado</th><th>7 Febrero 2026</th><th>7 Marzo 2026</th><th>Estado</th></tr>
      <?php foreach($comparativa as $r): ?>
      <tr>
        <td style="font-weight:bold;color:#1F3864"><?= $r['aspecto'] ?></td>
        <td style="color:#666"><?= $r['feb'] ?></td>
        <td style="color:#333"><?= $r['mar'] ?></td>
        <td><span class="estado-badge" style="background:<?= $colEstado[$r['estado']] ?>"><?= $r['estado'] ?></span></td>
      </tr>
      <?php endforeach; ?>
    </table>
  </div>

  <div class="section">
    <h2>⚖️ Conclusión del evaluador — Opinión formal</h2>
    <div class="conclusion">
      <strong>Respecto a las correcciones realizadas:</strong><br>
      El despido del personal involucrado en el incidente del 7 de febrero constituye reconocimiento tácito de la gravedad de los hechos por parte de Grupo Carso. Sin embargo, la ausencia de comunicación formal al afectado (25 días sin respuesta al acuse del 10-feb-2026) y la persistencia de deficiencias sistémicas confirman que la corrección fue reactiva a la exposición legal, no producto de una mejora genuina del sistema de control interno.
    </div>
    <div class="conclusion rojo" style="margin-top:12px">
      <strong>Opinión negativa (NIA 200 + NIA 265):</strong><br>
      La coexistencia de deficiencias persistentes (servicio, supervisión), deficiencias críticas nuevas (contaminación cruzada, violación NOM-251) y la ausencia de respuesta formal corporativa en 25 días constituyen una Deficiencia Material Generalizada. Un solo hallazgo de contaminación cruzada en utensilios de servicio es suficiente para emitir opinión negativa sobre el entorno de control, con independencia de cualquier otra consideración.<br><br>
      <strong>Evidencia base:</strong> Facturas FTDA-10487932/10487933 | PROFECO 0002822-2026 PROCEDENTE | alfonsoorozco.com/ssc2026
    </div>
  </div>

</div>
</body>
</html>
