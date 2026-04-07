<?php
// ============================================================
// MÓDULO 3: RIESGO PATRIMONIAL — ROBOS DOCUMENTADOS
// Fuente: OSINT Google Reviews — búsqueda no exhaustiva 12-feb-2026
// Metodología: Análisis de frecuencia + estimación de daño
// ============================================================

$casos = [
  ['fecha'=>'~Oct 2025', 'victima'=>'Katrina Oleary',  'piso'=>'Superior', 'activo'=>'Cartera + Pasaporte',   'monto_usd'=>1300, 'monto_mxn'=>null,  'sospechoso'=>'Mesero (único con acceso a mesa)', 'uso'=>'Cargos fraudulentos en tienda de zapatos minutos después', 'fuente'=>'Google Reviews — 1 estrella'],
  ['fecha'=>'~Sep 2025', 'victima'=>'Carmen Soto',     'piso'=>'Superior', 'activo'=>'Bolsa completa',        'monto_usd'=>null, 'monto_mxn'=>null,  'sospechoso'=>'Los mismos meseros', 'uso'=>'Sin responsabilidad asumida por Sanborns', 'fuente'=>'Google Reviews — 1 estrella'],
  ['fecha'=>'~Nov 2025', 'victima'=>'Usuario anónimo', 'piso'=>'Superior', 'activo'=>'Cartera',               'monto_usd'=>null, 'monto_mxn'=>null,  'sospechoso'=>'Personal — maniobra de distracción coordinada', 'uso'=>'Uso inmediato de tarjetas', 'fuente'=>'Google Reviews — capturas Anexo 13 SSC'],
  ['fecha'=>'~Dic 2025', 'victima'=>'Usuario anónimo', 'piso'=>'Superior', 'activo'=>'Cartera + Dispositivo', 'monto_usd'=>null, 'monto_mxn'=>null,  'sospechoso'=>'Mesero — único con acceso', 'uso'=>'No documentado', 'fuente'=>'Google Reviews — capturas Anexo 13 SSC'],
  ['fecha'=>'7 Feb 2026','victima'=>'Cliente en área', 'piso'=>'Superior', 'activo'=>'Suéter',               'monto_usd'=>null, 'monto_mxn'=>null,  'sospechoso'=>'No identificado — mencionado por testigo presencial', 'uso'=>'Extravío reportado mismo día del incidente Código 5', 'fuente'=>'Testimonio directo — denuncia SSC'],
];

$total_casos = count($casos);
$casos_usd   = array_filter($casos, fn($c) => $c['monto_usd']);
$daño_usd    = array_sum(array_column(array_values($casos_usd), 'monto_usd'));
$periodo     = 6; // meses
$frecuencia  = round($total_casos / $periodo, 2);
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Riesgo Patrimonial — Sanborns Los Azulejos</title>
<style>
  * { box-sizing: border-box; margin: 0; padding: 0; }
  body { font-family: Arial, sans-serif; background: #f4f6f9; color: #222; }
  .header { background: #7F4000; color: white; padding: 28px 40px; border-bottom: 6px solid #C00000; }
  .nav { background: #5C2E00; padding: 10px 40px; }
  .nav a { color: #ffcc99; text-decoration: none; font-size: 0.9em; margin-right: 20px; }
  .nav a:hover { color: white; }
  .container { max-width: 1000px; margin: 0 auto; padding: 36px 20px; }
  .kpis { display: grid; grid-template-columns: repeat(auto-fit, minmax(180px,1fr)); gap: 16px; margin-bottom: 28px; }
  .kpi { background: white; border-radius: 8px; padding: 18px; text-align: center; box-shadow: 0 2px 8px rgba(0,0,0,0.07); border-top: 4px solid #C00000; }
  .kpi .num { font-size: 2.2em; font-weight: bold; color: #C00000; }
  .kpi .lbl { font-size: 0.82em; color: #666; margin-top: 4px; line-height: 1.4; }
  .section { background: white; border-radius: 8px; padding: 24px; margin-bottom: 24px; box-shadow: 0 2px 8px rgba(0,0,0,0.07); }
  .section h2 { color: #7F4000; font-size: 1.05em; margin-bottom: 16px; padding-bottom: 8px; border-bottom: 2px solid #7F4000; }
  table { width: 100%; border-collapse: collapse; font-size: 0.86em; }
  th { background: #7F4000; color: white; padding: 10px 12px; text-align: left; }
  td { padding: 9px 12px; border-bottom: 1px solid #eee; vertical-align: top; line-height: 1.4; }
  tr:hover td { background: #fff8f0; }
  .piso-badge { display: inline-block; padding: 2px 10px; border-radius: 10px; font-size: 0.78em; font-weight: bold; color: white; background: #C00000; }
  .alerta { background: #fff3cd; border-left: 6px solid #C00000; padding: 16px 20px; border-radius: 4px; margin-bottom: 20px; font-size: 0.9em; line-height: 1.7; }
  .alerta strong { color: #C00000; }
  .modelo { background: #f8f9fa; border: 1px solid #dee2e6; border-radius: 6px; padding: 16px 20px; font-family: monospace; font-size: 0.85em; line-height: 2; }
  .pattern { background: #fff5f5; border: 1px solid #ffcccc; border-radius: 6px; padding: 16px 20px; margin-top: 16px; }
  .pattern h3 { color: #C00000; margin-bottom: 10px; font-size: 0.95em; }
  .pattern ul { list-style: none; }
  .pattern ul li { padding: 5px 0; font-size: 0.88em; padding-left: 16px; position: relative; }
  .pattern ul li:before { content: "⚠️"; position: absolute; left: 0; }
</style>
</head>
<body>
<div class="header">
  <h1>💰 Modelo de Riesgo Patrimonial</h1>
  <p style="opacity:0.85;font-size:0.9em;margin-top:4px">Robos documentados en Google Reviews — Sanborns Los Azulejos | Últimos 6 meses</p>
  <p style="opacity:0.7;font-size:0.82em;margin-top:4px">Fuente: OSINT público — búsqueda no exhaustiva realizada el 12-feb-2026</p>
</div>
<div class="nav">
  <a href="index.php">← Panel principal</a>
  <a href="bayesiano_marzo.php">Análisis bayesiano</a>
  <a href="arbol_decisiones.php">Árbol de decisiones</a>
  <a href="comparativa.php">Comparativa</a>
</div>
<div class="container">

  <div class="alerta">
    <strong>⚠️ Advertencia metodológica:</strong> Los casos documentados provienen de una búsqueda OSINT no exhaustiva de 10 minutos realizada el 12 de febrero de 2026. El número real de incidentes puede ser significativamente mayor. Las fuentes son públicas (Google Reviews) y no están sujetas a derechos de autor ni protección de datos personales conforme a lo documentado en la Denuncia SSC (Anexo 13).
  </div>

  <div class="kpis">
    <div class="kpi"><div class="num"><?= $total_casos ?></div><div class="lbl">Casos documentados en 6 meses (no exhaustivo)</div></div>
    <div class="kpi"><div class="num"><?= $frecuencia ?></div><div class="lbl">Casos por mes (promedio mínimo)</div></div>
    <div class="kpi"><div class="num">$<?= number_format($daño_usd) ?> USD</div><div class="lbl">Daño patrimonial mínimo documentado (1 caso con monto)</div></div>
    <div class="kpi"><div class="num">100%</div><div class="lbl">Casos en piso superior del establecimiento</div></div>
  </div>

  <div class="section">
    <h2>📋 Casos documentados</h2>
    <table>
      <tr><th>Fecha aprox.</th><th>Piso</th><th>Activo sustraído</th><th>Daño documentado</th><th>Sospechoso señalado</th><th>Fuente</th></tr>
      <?php foreach($casos as $c): ?>
      <tr>
        <td><?= $c['fecha'] ?></td>
        <td><span class="piso-badge"><?= $c['piso'] ?></span></td>
        <td><?= $c['activo'] ?></td>
        <td><?= $c['monto_usd'] ? '$'.number_format($c['monto_usd']).' USD' : ($c['monto_mxn'] ? '$'.number_format($c['monto_mxn']).' MXN' : 'No cuantificado') ?><br><small style="color:#888"><?= $c['uso'] ?></small></td>
        <td style="color:#C00000;font-size:0.85em"><?= $c['sospechoso'] ?></td>
        <td style="color:#888;font-size:0.82em"><?= $c['fuente'] ?></td>
      </tr>
      <?php endforeach; ?>
    </table>
  </div>

  <div class="section">
    <h2>📐 Modelo de riesgo patrimonial estimado</h2>
    <div class="modelo">
Frecuencia mínima documentada : <?= $frecuencia ?> casos/mes
Periodo analizado              : <?= $periodo ?> meses (búsqueda no exhaustiva)
Piso de mayor riesgo           : Superior (100% de casos documentados)
Daño promedio mínimo (1 caso)  : $1,300 USD (~$26,000 MXN)

Probabilidad de incidente patrimonial por visita al piso superior:
  P(robo | visita piso superior) = casos_documentados / visitas_estimadas
  Visitas estimadas (sábado, hora pico, 120 días) ≈ 480 servicios
  P_mínima = <?= $total_casos ?> / 480 = <?= number_format($total_casos/480*100, 2) ?>%

NOTA: Esta es la probabilidad MÍNIMA observable con datos públicos.
La probabilidad real es mayor dado que la mayoría de robos no se reportan en reseñas.
    </div>

    <div class="pattern">
      <h3>🔴 Patrón sistémico identificado (NIA 265 — Deficiencia significativa)</h3>
      <ul>
        <li>Todos los casos documentados ocurren en el piso superior del establecimiento</li>
        <li>En múltiples casos el mesero es señalado como único sospechoso con acceso a la mesa</li>
        <li>Se describe una "maniobra de distracción coordinada" — sugiere operación organizada</li>
        <li>Los cargos fraudulentos ocurren MINUTOS después del robo — cómplices externos coordinados</li>
        <li>La respuesta de Sanborns en todos los casos documentados: sin responsabilidad asumida</li>
        <li>El mismo piso superior donde ocurren los robos fue el escenario del Código 5 (7-feb-2026)</li>
        <li>Antecedente de violencia física (apuñalamiento, enero 2023) en el mismo establecimiento</li>
      </ul>
    </div>
  </div>

  <div class="section">
    <h2>💡 Recomendaciones al visitante</h2>
    <table>
      <tr><th>Activo en riesgo</th><th>Recomendación</th><th>Nivel de urgencia</th></tr>
      <tr><td>Cartera / efectivo</td><td>No dejar en mesa ni en silla. Mantener en bolsillo interno del saco o bolso cruzado</td><td style="color:#C00000;font-weight:bold">CRÍTICO</td></tr>
      <tr><td>Pasaporte / documentos</td><td>No llevar al establecimiento. Usar copia fotográfica si es necesario</td><td style="color:#C00000;font-weight:bold">CRÍTICO</td></tr>
      <tr><td>Dispositivos móviles</td><td>No dejar sobre la mesa. Caso Katrina Oleary: tenía cartera visible para pagar</td><td style="color:#e67e22;font-weight:bold">ALTO</td></tr>
      <tr><td>Tarjetas de crédito</td><td>Activar alertas de transacciones en tiempo real antes de entrar</td><td style="color:#e67e22;font-weight:bold">ALTO</td></tr>
      <tr><td>Ropa / accesorios</td><td>Extravío de suéter documentado el 7-feb-2026 durante operativo Código 5</td><td style="color:#e67e22;font-weight:bold">ALTO</td></tr>
    </table>
  </div>

</div>
</body>
</html>
