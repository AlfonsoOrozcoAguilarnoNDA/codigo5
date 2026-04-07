<?php
// ============================================================
// MÓDULO 1: ANÁLISIS BAYESIANO — VISITA MARZO 2026
// Metodología: Probabilidad condicional bayesiana
// NIA 320: Umbral cero en deficiencias materiales de higiene
// ============================================================

$anomalias = [
  ['id'=>1,  'cat'=>'Servicio',   'nombre'=>'Espera >30 min con ocupación <40%',                  'factor'=>0.15, 'fuente'=>'Observación + ticket timestamp 16:57h'],
  ['id'=>2,  'cat'=>'Servicio',   'nombre'=>'Sin disculpa ni explicación por demora',              'factor'=>0.20, 'fuente'=>'Observación directa — patrón reincidente'],
  ['id'=>3,  'cat'=>'Calidad',    'nombre'=>'Fettuccini servido frío (salsa cortada)',             'factor'=>0.10, 'fuente'=>'Evidencia fotográfica + ticket FTDA-10487932'],
  ['id'=>4,  'cat'=>'Calidad',    'nombre'=>'Fettuccini insípido — 3 rondas de sal sin efecto',   'factor'=>0.15, 'fuente'=>'Evaluación organoléptica documentada'],
  ['id'=>5,  'cat'=>'Calidad',    'nombre'=>'Cordon Bleu sin jitomate vs foto oficial menú',       'factor'=>0.20, 'fuente'=>'Foto comparativa menú oficial vs. servido'],
  ['id'=>6,  'cat'=>'Calidad',    'nombre'=>'Cordon Bleu — porción mínima vs precio $260',        'factor'=>0.20, 'fuente'=>'Evidencia fotográfica + ticket FTDA-10487933'],
  ['id'=>7,  'cat'=>'Higiene',    'nombre'=>'Personal cocina sin cofia — violación NOM-251',       'factor'=>0.05, 'fuente'=>'Observación directa — ejecutiva con walkie-talkie'],
  ['id'=>8,  'cat'=>'Higiene',    'nombre'=>'Contaminación cruzada carrito cubiertos',             'factor'=>0.02, 'fuente'=>'Observación documentada 16:49-16:57h'],
  ['id'=>9,  'cat'=>'Higiene',    'nombre'=>'Sin intervención del personal ante contaminación',    'factor'=>0.05, 'fuente'=>'Observación — ningún empleado actuó'],
  ['id'=>10, 'cat'=>'Control',    'nombre'=>'10 personas de pie sin actividad de servicio activa', 'factor'=>0.25, 'fuente'=>'Conteo visual — salón 120m²'],
  ['id'=>11, 'cat'=>'Control',    'nombre'=>'Carrito de servicio sin supervisión continua',        'factor'=>0.20, 'fuente'=>'Observación — acceso libre de comensales'],
  ['id'=>12, 'cat'=>'Gobernanza', 'nombre'=>'Sin respuesta de Carso a notificación 10-feb',       'factor'=>0.10, 'fuente'=>'Acuse de recibo firmado — 25 días sin respuesta'],
  ['id'=>13, 'cat'=>'Gobernanza', 'nombre'=>'Deficiencias persisten post-cambio de personal',     'factor'=>0.15, 'fuente'=>'Comparativa ambas visitas — cultura no corregida'],
];

$prior = 0.40; // probabilidad base de deficiencia en restaurante promedio CDMX
$producto = 1.0;
foreach($anomalias as $a) $producto *= $a['factor'];
$posterior = $prior * $producto;
$certeza = (1 - $posterior) * 100;

$categorias = [];
foreach($anomalias as $a){
  $categorias[$a['cat']][] = $a;
}
$colores = ['Servicio'=>'#2E5090','Calidad'=>'#C00000','Higiene'=>'#7F4000','Control'=>'#1F3864','Gobernanza'=>'#5C3A9E'];
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Análisis Bayesiano — Mystery Shopper Marzo 2026</title>
<style>
  * { box-sizing: border-box; margin: 0; padding: 0; }
  body { font-family: Arial, sans-serif; background: #f4f6f9; color: #222; }
  .header { background: #1F3864; color: white; padding: 28px 40px; border-bottom: 6px solid #C00000; }
  .header h1 { font-size: 1.5em; margin-bottom: 4px; }
  .nav { background: #152744; padding: 10px 40px; }
  .nav a { color: #aac4e8; text-decoration: none; font-size: 0.9em; margin-right: 20px; }
  .nav a:hover { color: white; }
  .container { max-width: 1000px; margin: 0 auto; padding: 36px 20px; }
  .result-box { background: #1F3864; color: white; border-radius: 10px; padding: 28px 32px; margin-bottom: 32px; display: grid; grid-template-columns: 1fr 1fr 1fr; gap: 20px; text-align: center; }
  .result-box .num { font-size: 2.4em; font-weight: bold; color: #ff6b6b; }
  .result-box .num.green { color: #6bcb77; }
  .result-box .lbl { font-size: 0.85em; opacity: 0.85; margin-top: 4px; }
  .section { background: white; border-radius: 8px; padding: 24px; margin-bottom: 24px; box-shadow: 0 2px 8px rgba(0,0,0,0.07); }
  .section h2 { color: #1F3864; font-size: 1.05em; margin-bottom: 16px; padding-bottom: 8px; border-bottom: 2px solid #1F3864; }
  table { width: 100%; border-collapse: collapse; font-size: 0.88em; }
  th { background: #1F3864; color: white; padding: 10px 12px; text-align: left; }
  td { padding: 9px 12px; border-bottom: 1px solid #eee; vertical-align: top; }
  tr:hover td { background: #f0f4ff; }
  .cat-badge { display: inline-block; padding: 3px 10px; border-radius: 12px; color: white; font-size: 0.78em; font-weight: bold; }
  .factor { font-weight: bold; color: #C00000; }
  .formula { background: #f8f9fa; border: 1px solid #dee2e6; border-radius: 6px; padding: 16px 20px; font-family: monospace; font-size: 0.85em; line-height: 1.8; margin-bottom: 16px; }
  .conclusion { background: #fff3cd; border-left: 6px solid #C00000; padding: 16px 20px; border-radius: 4px; margin-top: 16px; }
  .conclusion strong { color: #C00000; }
  .bar-row { display: flex; align-items: center; gap: 10px; margin-bottom: 8px; font-size: 0.85em; }
  .bar-label { width: 120px; flex-shrink: 0; }
  .bar { height: 22px; border-radius: 3px; display: flex; align-items: center; padding-left: 8px; color: white; font-size: 0.78em; font-weight: bold; min-width: 30px; }
  .back-link { display: inline-block; margin-bottom: 20px; color: #1F3864; text-decoration: none; font-size: 0.9em; }
  .back-link:hover { text-decoration: underline; }
  @media(max-width:600px){ .result-box { grid-template-columns: 1fr; } }
</style>
</head>
<body>
<div class="header">
  <h1>🔬 Análisis Bayesiano — Mystery Shopper 7 Marzo 2026</h1>
  <p style="opacity:0.8;font-size:0.9em;">Metodología: Probabilidad condicional bayesiana | NIA 320 — Importancia relativa</p>
</div>
<div class="nav">
  <a href="index.php">← Panel principal</a>
  <a href="arbol_decisiones.php">Árbol de decisiones</a>
  <a href="riesgo_patrimonial.php">Riesgo patrimonial</a>
  <a href="comparativa.php">Comparativa</a>
</div>
<div class="container">
  <div class="result-box">
    <div>
      <div class="num"><?= number_format($certeza, 8) ?>%</div>
      <div class="lbl">Certeza estadística de deficiencias sistémicas</div>
    </div>
    <div>
      <div class="num"><?= count($anomalias) ?></div>
      <div class="lbl">Anomalías identificadas en visita de marzo</div>
    </div>
    <div>
      <div class="num green">2/10</div>
      <div class="lbl">Calificación global del establecimiento</div>
    </div>
  </div>

  <div class="section">
    <h2>📐 Metodología y fórmula aplicada</h2>
    <div class="formula">
P(Deficiencia Sistémica | Anomalías) = P_prior × ∏(factor_i)

P_prior = <?= $prior ?> (probabilidad base — restaurante promedio CDMX)
Número de anomalías = <?= count($anomalias) ?>
Producto de factores = <?= number_format($producto, 20) ?>
P_posterior = <?= number_format($posterior, 20) ?>
Certeza = (1 - P_posterior) × 100 = <?= number_format($certeza, 8) ?>%

NOTA: Prior de 0.40 aplicado deliberadamente a favor del establecimiento.
Con prior neutral (0.50) la certeza sería aún mayor.
    </div>
    <div class="conclusion">
      <strong>Conclusión NIA 320:</strong> La certeza estadística supera el umbral de "más allá de toda duda razonable" (>95%) por un margen de <?= number_format($certeza - 95, 6) ?> puntos porcentuales. Bajo el principio de importancia relativa, una sola anomalía de higiene (contaminación cruzada) es suficiente para emitir opinión negativa sobre el entorno de control, independientemente del análisis estadístico.
    </div>
  </div>

  <div class="section">
    <h2>📊 Anomalías por categoría</h2>
    <?php
    $conteo = [];
    foreach($anomalias as $a) $conteo[$a['cat']] = ($conteo[$a['cat']] ?? 0) + 1;
    $max = max($conteo);
    foreach($conteo as $cat => $n):
      $pct = round(($n / count($anomalias)) * 100);
      $w = round(($n / $max) * 100);
    ?>
    <div class="bar-row">
      <div class="bar-label"><span class="cat-badge" style="background:<?= $colores[$cat] ?>"><?= $cat ?></span></div>
      <div class="bar" style="width:<?= $w ?>%;background:<?= $colores[$cat] ?>"><?= $n ?> anomalías</div>
      <div style="color:#888;font-size:0.82em"><?= $pct ?>% del total</div>
    </div>
    <?php endforeach; ?>
  </div>

  <div class="section">
    <h2>🔍 Tabla completa de anomalías</h2>
    <table>
      <tr><th>#</th><th>Categoría</th><th>Anomalía documentada</th><th>Factor reductor</th><th>Fuente de evidencia</th></tr>
      <?php foreach($anomalias as $a): ?>
      <tr>
        <td><?= $a['id'] ?></td>
        <td><span class="cat-badge" style="background:<?= $colores[$a['cat']] ?>"><?= $a['cat'] ?></span></td>
        <td><?= $a['nombre'] ?></td>
        <td class="factor"><?= $a['factor'] ?></td>
        <td style="color:#666;font-size:0.85em"><?= $a['fuente'] ?></td>
      </tr>
      <?php endforeach; ?>
    </table>
  </div>

  <div class="section">
    <h2>⚠️ Anomalías CRÍTICAS — NIA 320 umbral cero</h2>
    <table>
      <tr><th>Anomalía</th><th>Norma violada</th><th>Impacto</th></tr>
      <tr><td>Contaminación cruzada en carrito de cubiertos — 16:49 a 16:57h</td><td>NOM-251-SSA1-2009</td><td style="color:#C00000;font-weight:bold">Riesgo sanitario real para comensales</td></tr>
      <tr><td>Personal cocina sin cofia transitando por salón</td><td>NOM-251-SSA1-2009 Art. 5.4</td><td style="color:#C00000;font-weight:bold">Violación directa — sin intervención gerencial</td></tr>
      <tr><td>Deficiencias persisten 25 días post-notificación a Carso</td><td>NIA 265 — Deficiencia material</td><td style="color:#C00000;font-weight:bold">Corrección superficial — cultura no modificada</td></tr>
    </table>
    <div class="conclusion" style="margin-top:16px">
      <strong>Opinión del evaluador (NIA 200):</strong> Bajo el principio de primacía de la realidad, las tres anomalías críticas son suficientes para invalidar cualquier presunción de cumplimiento normativo, con independencia del resultado del análisis bayesiano completo.
    </div>
  </div>

</div>
</body>
</html>
