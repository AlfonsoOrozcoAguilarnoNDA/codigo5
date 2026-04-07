<?php
// ============================================================
// ANÁLISIS ESTADÍSTICO Y LEGAL — SANBORNS LOS AZULEJOS
// Autor: Alfonso Orozco Aguilar | Marzo 2026
// Metodología: NIAs 230, 240, 265, 315, 320 + Marco COSO
// ============================================================

$modulos = [
    ['archivo' => 'bayesiano_marzo.php',    'icono' => '🔬', 'titulo' => 'Análisis Bayesiano',        'desc' => 'Visita mystery shopper 7 marzo 2026 — Probabilidad condicional de deficiencias operativas', 'color' => '#1F3864'],
    ['archivo' => 'arbol_decisiones.php',   'icono' => '🌳', 'titulo' => 'Árbol de Decisiones',       'desc' => 'Mapa de riesgo para el cliente según sus decisiones dentro del establecimiento',           'color' => '#C00000'],
    ['archivo' => 'riesgo_patrimonial.php', 'icono' => '💰', 'titulo' => 'Riesgo Patrimonial',        'desc' => 'Modelo de riesgo basado en robos documentados en Google Reviews — últimos 6 meses',        'color' => '#7F4000'],
    ['archivo' => 'comparativa.php',        'icono' => '📊', 'titulo' => 'Comparativa Estadística',   'desc' => 'Análisis comparativo 7 febrero vs 7 marzo 2026 — Persistencia de deficiencias sistémicas', 'color' => '#2E5090'],
    ['archivo' => 'cifra_negra.php',        'icono' => '🌊', 'titulo' => 'Cifra Negra',                'desc' => 'El iceberg de los delitos no reportados — ENVIPE/INEGI + UNODC aplicado a casos documentados', 'color' => '#1a1a2e'],
];
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Análisis Estadístico — Sanborns Los Azulejos | Caso Código 5</title>
<style>
  * { box-sizing: border-box; margin: 0; padding: 0; }
  body { font-family: Arial, sans-serif; background: #f4f6f9; color: #222; }
  .header { background: #1F3864; color: white; padding: 32px 40px; border-bottom: 6px solid #C00000; }
  .header h1 { font-size: 1.8em; margin-bottom: 6px; }
  .header p { font-size: 0.95em; opacity: 0.85; }
  .badges { margin-top: 14px; display: flex; flex-wrap: wrap; gap: 10px; }
  .badge { background: rgba(255,255,255,0.15); border: 1px solid rgba(255,255,255,0.3); padding: 4px 12px; border-radius: 20px; font-size: 0.8em; }
  .badge.green { background: #1e7e34; border-color: #1e7e34; }
  .container { max-width: 1100px; margin: 0 auto; padding: 40px 20px; }
  .intro { background: white; border-left: 6px solid #C00000; padding: 20px 24px; margin-bottom: 32px; border-radius: 4px; box-shadow: 0 2px 8px rgba(0,0,0,0.07); }
  .intro h2 { color: #1F3864; margin-bottom: 10px; font-size: 1.1em; }
  .intro p { line-height: 1.7; color: #444; font-size: 0.95em; }
  .grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 24px; margin-bottom: 40px; }
  .card { background: white; border-radius: 8px; box-shadow: 0 2px 12px rgba(0,0,0,0.08); overflow: hidden; transition: transform 0.2s, box-shadow 0.2s; }
  .card:hover { transform: translateY(-4px); box-shadow: 0 8px 24px rgba(0,0,0,0.13); }
  .card-header { padding: 20px 24px 14px; color: white; }
  .card-icon { font-size: 2em; margin-bottom: 8px; }
  .card-header h3 { font-size: 1.1em; }
  .card-body { padding: 16px 24px 24px; }
  .card-body p { color: #555; font-size: 0.9em; line-height: 1.6; margin-bottom: 16px; }
  .btn { display: inline-block; padding: 10px 20px; border-radius: 4px; color: white; text-decoration: none; font-size: 0.9em; font-weight: bold; transition: opacity 0.2s; }
  .btn:hover { opacity: 0.85; }
  .timeline { background: white; border-radius: 8px; padding: 24px 28px; box-shadow: 0 2px 8px rgba(0,0,0,0.07); margin-bottom: 32px; }
  .timeline h2 { color: #1F3864; margin-bottom: 20px; font-size: 1.1em; border-bottom: 2px solid #1F3864; padding-bottom: 8px; }
  .tl-item { display: flex; gap: 16px; margin-bottom: 16px; align-items: flex-start; }
  .tl-dot { width: 36px; height: 36px; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 0.75em; font-weight: bold; color: white; flex-shrink: 0; }
  .tl-content h4 { font-size: 0.95em; color: #1F3864; margin-bottom: 2px; }
  .tl-content p { font-size: 0.85em; color: #666; line-height: 1.5; }
  .footer { text-align: center; padding: 24px; color: #888; font-size: 0.85em; border-top: 1px solid #ddd; background: white; }
  .scores { display: grid; grid-template-columns: repeat(4, 1fr); gap: 12px; margin-bottom: 32px; }
  .score-card { background: white; border-radius: 8px; padding: 16px; text-align: center; box-shadow: 0 2px 8px rgba(0,0,0,0.07); }
  .score-card .num { font-size: 2.2em; font-weight: bold; color: #C00000; }
  .score-card .label { font-size: 0.8em; color: #666; margin-top: 4px; }
  @media(max-width:600px){ .scores { grid-template-columns: repeat(2,1fr); } .header { padding: 20px; } }
</style>
</head>
<body>

<div class="header">
  <h1>📋 Análisis Estadístico y Legal</h1>
  <p>Sanborns Los Azulejos — Av. Francisco I. Madero No. 4, Centro Histórico, CDMX</p>
  <p style="margin-top:6px;font-size:0.85em;opacity:0.7;">Autor: Alfonso Orozco Aguilar | Cliente desde 1992 | Metodología: NIAs 230/240/265/315/320 + Marco COSO</p>
  <div class="badges">
    <span class="badge green">✅ PROFECO 0002822-2026 PROCEDENTE</span>
    <span class="badge">📋 CONAPRED — En investigación</span>
    <span class="badge">🔒 SSC CDMX — Denuncia 16-feb-2026</span>
    <span class="badge">📨 Grupo Carso notificado 10-feb-2026</span>
  </div>
</div>

<div class="container">

  <div class="intro">
    <h2>⚖️ Propósito de este repositorio</h2>
    <p>Este repositorio documenta el análisis estadístico, forense y de riesgo derivado de dos visitas a Sanborns Los Azulejos. Los modelos son reproducibles, auditables y han sido elaborados aplicando Normas Internacionales de Auditoría (NIAs) y análisis bayesiano. El código es ejecutable por cualquier administrador web con PHP 7.4+ sin dependencias externas. Toda la evidencia audiovisual se encuentra en <strong>alfonsoorozco.com/ssc2026</strong></p>
  </div>

  <div class="scores">
    <div class="score-card"><div class="num">2/10</div><div class="label">Calificación global mystery shopper</div></div>
    <div class="score-card"><div class="num">99.99%</div><div class="label">Certeza estadística — personal clandestino (7-feb)</div></div>
    <div class="score-card"><div class="num">4</div><div class="label">Autoridades notificadas</div></div>
    <div class="score-card"><div class="num">34</div><div class="label">Años como cliente — pérdida documentada</div></div>
  </div>

  <div class="grid">
    <?php foreach($modulos as $m): ?>
    <div class="card">
      <div class="card-header" style="background:<?= $m['color'] ?>">
        <div class="card-icon"><?= $m['icono'] ?></div>
        <h3><?= $m['titulo'] ?></h3>
      </div>
      <div class="card-body">
        <p><?= $m['desc'] ?></p>
        <a href="<?= $m['archivo'] ?>" class="btn" style="background:<?= $m['color'] ?>">Ver análisis →</a>
      </div>
    </div>
    <?php endforeach; ?>
  </div>

  <div class="timeline">
    <h2>📅 Cronología del caso</h2>
    <?php
    $eventos = [
      ['#1F3864', '7 Feb',  'Incidente Código 5',           'Mesa asignada 16:35h. Sin servicio por 100 min. Código 5 al solicitar gerente. Personal sin identificación. Audio + video + 4 testigos + facturas FTDA 10402974/10402968.'],
      ['#C00000', '9 Feb',  'Denuncias PROFECO y CONAPRED', 'PROFECO folio 0002822-2026 declarada PROCEDENTE el 11-feb. CONAPRED sello oficial mismo día.'],
      ['#7F4000', '10 Feb', 'Notificación Grupo Carso',     'Carta de 13 fojas entregada a Auditoría Interna con acuse de recibo firmado. Sin respuesta formal en 25 días.'],
      ['#1F3864', '16 Feb', 'Denuncia SSC CDMX',            '63 páginas con análisis bayesiano (24 anomalías), análisis forense de audio (Gemini Pro + Speak.ai), NIAs y solicitud de inspección sorpresa.'],
      ['#2E5090', '7 Mar',  'Mystery Shopper',              'Visita incógnita (rasurado, traje). No reconocido. $1,205 MXN en dos pisos. Facturas FTDA-10487932/10487933. Violación NOM-251 y contaminación cruzada documentadas.'],
      ['#1e7e34', 'Pendiente', 'Resolución PROFECO',        'Al recibir resolución se enviará segundo comunicado a Grupo Carso adjuntando informe de mystery shopper.'],
    ];
    foreach($eventos as $e):
    ?>
    <div class="tl-item">
      <div class="tl-dot" style="background:<?= $e[0] ?>"><?= $e[1] ?></div>
      <div class="tl-content">
        <h4><?= $e[2] ?></h4>
        <p><?= $e[3] ?></p>
      </div>
    </div>
    <?php endforeach; ?>
  </div>

</div>

<div class="footer">
  Alfonso Orozco Aguilar | legal@alfonsoorozco.com | Repositorio público hasta resolución de procesos administrativos activos<br>
  <small>Metodología: NIAs 230 · 240 · 265 · 315 · 320 · Marco COSO · NOM-251-SSA1-2009 · Análisis Bayesiano</small>
</div>

</body>
</html>
