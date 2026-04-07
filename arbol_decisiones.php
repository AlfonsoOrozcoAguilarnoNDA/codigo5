<?php
// ============================================================
// MÓDULO 2: ÁRBOL DE DECISIONES — RIESGO DEL CLIENTE
// Metodología: Decision Tree Analysis + Marco COSO
// ============================================================

$nodos = [
  'raiz' => [
    'texto' => '¿A qué piso vas?',
    'hijos' => ['piso_bajo', 'piso_alto']
  ],
  'piso_bajo' => [
    'texto' => 'Piso inferior (barra/restaurante)',
    'riesgo' => 'MEDIO',
    'prob' => 72,
    'hallazgos' => [
      'Espera >30 min con salón semivacío (documentado 7-mar)',
      'Riesgo de comida fría/insípida vs. foto oficial del menú',
      'Contaminación cruzada en carrito de cubiertos (documentado)',
      'Personal cocina sin cofia (documentado)',
      'Sin supervisión activa del área de servicio',
    ],
    'hijos' => ['queja_bajo', 'silencio_bajo']
  ],
  'piso_alto' => [
    'texto' => 'Piso superior (restaurante principal)',
    'riesgo' => 'ALTO',
    'prob' => 85,
    'hallazgos' => [
      'Múltiples robos documentados en Google Reviews (últimos 6 meses)',
      'Víctimas señalan al personal como responsable en reseñas',
      'Porción real vs. foto oficial del menú: diferencia significativa',
      'Precios premium ($200-$300 MXN) sin calidad correspondiente',
      'Antecedente: apuñalamiento enero 2023 (Excélsior)',
    ],
    'hijos' => ['queja_alto', 'silencio_alto']
  ],
  'queja_bajo' => [
    'texto' => 'Solicitas hablar con el gerente',
    'riesgo' => 'CRÍTICO',
    'prob' => 99,
    'hallazgos' => [
      'Activación de "Código 5" documentada (7-feb-2026)',
      'Personal de seguridad sin identificación en segundos',
      'Intento de aislamiento del área pública (Art. 10 LFPC)',
      'Posible llamada dolosa al C4 (Art. 211 Quáter CPCDMX)',
      'Sin disculpa — tono burlón documentado en audio',
    ],
  ],
  'silencio_bajo' => [
    'texto' => 'Te quedas callado y pagas',
    'riesgo' => 'BAJO',
    'prob' => 30,
    'hallazgos' => [
      'Pérdida económica: $160-$220 MXN por platillo deficiente',
      'Riesgo sanitario por higiene deficiente (carrito cubiertos)',
      'Contribuyes estadísticamente al patrón documentado',
    ],
  ],
  'queja_alto' => [
    'texto' => 'Solicitas hablar con el gerente',
    'riesgo' => 'CRÍTICO',
    'prob' => 99,
    'hallazgos' => [
      'Mismo protocolo "Código 5" aplicable (patrón documentado)',
      'Área más aislada — mayor riesgo de intimidación',
      'Antecedente de violencia física en mismo piso (2023)',
      'Sin evacuación = sin emergencia real = uso doloso del protocolo',
    ],
  ],
  'silencio_alto' => [
    'texto' => 'Te quedas callado y pagas',
    'riesgo' => 'MEDIO',
    'prob' => 65,
    'hallazgos' => [
      'Riesgo patrimonial: robos documentados en reseñas recientes',
      'Recomendación: no dejar bolsa, cartera o dispositivos en mesa',
      'Pérdida económica: $260-$300 MXN por platillo deficiente',
      'Personal señalado como responsable en múltiples casos',
    ],
  ],
];

$colores = ['BAJO'=>'#1e7e34','MEDIO'=>'#e67e22','ALTO'=>'#C00000','CRÍTICO'=>'#6b0000'];
$iconos  = ['BAJO'=>'🟢','MEDIO'=>'🟡','ALTO'=>'🔴','CRÍTICO'=>'⚫'];
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Árbol de Decisiones — Riesgo del Cliente | Sanborns Azulejos</title>
<style>
  * { box-sizing: border-box; margin: 0; padding: 0; }
  body { font-family: Arial, sans-serif; background: #f4f6f9; color: #222; }
  .header { background: #C00000; color: white; padding: 28px 40px; border-bottom: 6px solid #1F3864; }
  .nav { background: #8B0000; padding: 10px 40px; }
  .nav a { color: #ffaaaa; text-decoration: none; font-size: 0.9em; margin-right: 20px; }
  .nav a:hover { color: white; }
  .container { max-width: 1000px; margin: 0 auto; padding: 36px 20px; }
  .tree { display: flex; flex-direction: column; gap: 20px; }
  .level { display: flex; gap: 16px; flex-wrap: wrap; justify-content: center; }
  .node { background: white; border-radius: 8px; padding: 18px 20px; box-shadow: 0 2px 10px rgba(0,0,0,0.09); flex: 1; min-width: 260px; max-width: 440px; border-top: 5px solid #1F3864; }
  .node.riesgo-BAJO     { border-top-color: #1e7e34; }
  .node.riesgo-MEDIO    { border-top-color: #e67e22; }
  .node.riesgo-ALTO     { border-top-color: #C00000; }
  .node.riesgo-CRÍTICO  { border-top-color: #6b0000; background: #fff5f5; }
  .node-title { font-weight: bold; font-size: 1em; color: #1F3864; margin-bottom: 8px; }
  .riesgo-badge { display: inline-block; padding: 3px 12px; border-radius: 12px; color: white; font-size: 0.78em; font-weight: bold; margin-bottom: 10px; }
  .prob { font-size: 0.82em; color: #888; margin-bottom: 10px; }
  .prob span { font-weight: bold; color: #C00000; }
  .hallazgo-list { list-style: none; }
  .hallazgo-list li { font-size: 0.85em; color: #555; padding: 4px 0; border-bottom: 1px solid #f0f0f0; padding-left: 14px; position: relative; line-height: 1.4; }
  .hallazgo-list li:before { content: "›"; position: absolute; left: 0; color: #C00000; font-weight: bold; }
  .raiz-node { background: #1F3864; color: white; border-radius: 10px; padding: 20px 28px; text-align: center; margin-bottom: 8px; font-size: 1.1em; font-weight: bold; }
  .arrow { text-align: center; font-size: 1.5em; color: #aaa; margin: -8px 0; }
  .leyenda { background: white; border-radius: 8px; padding: 20px 24px; margin-top: 28px; box-shadow: 0 2px 8px rgba(0,0,0,0.07); }
  .leyenda h3 { color: #1F3864; margin-bottom: 14px; font-size: 1em; }
  .leyenda-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(180px,1fr)); gap: 12px; }
  .leyenda-item { display: flex; align-items: center; gap: 10px; font-size: 0.88em; }
  .l-dot { width: 14px; height: 14px; border-radius: 50%; flex-shrink: 0; }
  .recomendacion { background: #fff3cd; border-left: 6px solid #e67e22; padding: 16px 20px; border-radius: 4px; margin-top: 20px; font-size: 0.9em; line-height: 1.7; }
  .recomendacion strong { color: #C00000; }
</style>
</head>
<body>
<div class="header">
  <h1>🌳 Árbol de Decisiones — Riesgo del Cliente</h1>
  <p style="opacity:0.85;font-size:0.9em;margin-top:4px">Sanborns Los Azulejos | Basado en evidencia documentada febrero–marzo 2026</p>
</div>
<div class="nav">
  <a href="index.php">← Panel principal</a>
  <a href="bayesiano_marzo.php">Análisis bayesiano</a>
  <a href="riesgo_patrimonial.php">Riesgo patrimonial</a>
  <a href="comparativa.php">Comparativa</a>
</div>
<div class="container">

  <div class="raiz-node">🚪 Cliente entra a Sanborns Los Azulejos — ¿A qué piso vas?</div>
  <div class="arrow">↓</div>

  <div class="level">
    <?php foreach(['piso_bajo','piso_alto'] as $key):
      $n = $nodos[$key]; ?>
    <div class="node riesgo-<?= $n['riesgo'] ?>">
      <div class="node-title"><?= $n['texto'] ?></div>
      <div><span class="riesgo-badge" style="background:<?= $colores[$n['riesgo']] ?>"><?= $iconos[$n['riesgo']] ?> Riesgo <?= $n['riesgo'] ?></span></div>
      <div class="prob">Probabilidad de deficiencia: <span><?= $n['prob'] ?>%</span></div>
      <ul class="hallazgo-list">
        <?php foreach($n['hallazgos'] as $h): ?>
        <li><?= $h ?></li>
        <?php endforeach; ?>
      </ul>
    </div>
    <?php endforeach; ?>
  </div>

  <div class="arrow">↓</div>
  <div style="text-align:center;color:#888;font-size:0.9em;margin-bottom:8px">En ambos pisos: ¿qué haces si hay problema?</div>

  <div class="level">
    <?php foreach(['queja_bajo','silencio_bajo','queja_alto','silencio_alto'] as $key):
      $n = $nodos[$key]; ?>
    <div class="node riesgo-<?= $n['riesgo'] ?>">
      <div class="node-title"><?= $n['texto'] ?></div>
      <div><span class="riesgo-badge" style="background:<?= $colores[$n['riesgo']] ?>"><?= $iconos[$n['riesgo']] ?> Riesgo <?= $n['riesgo'] ?></span></div>
      <?php if(isset($n['prob'])): ?>
      <div class="prob">Probabilidad de incidente: <span><?= $n['prob'] ?>%</span></div>
      <?php endif; ?>
      <ul class="hallazgo-list">
        <?php foreach($n['hallazgos'] as $h): ?>
        <li><?= $h ?></li>
        <?php endforeach; ?>
      </ul>
    </div>
    <?php endforeach; ?>
  </div>

  <div class="leyenda">
    <h3>📌 Leyenda de niveles de riesgo</h3>
    <div class="leyenda-grid">
      <?php foreach($colores as $nivel => $color): ?>
      <div class="leyenda-item">
        <div class="l-dot" style="background:<?= $color ?>"></div>
        <div><strong><?= $iconos[$nivel] ?> <?= $nivel ?></strong> — <?php
          echo match($nivel) {
            'BAJO'     => 'Pérdida económica menor',
            'MEDIO'    => 'Riesgo patrimonial o sanitario',
            'ALTO'     => 'Riesgo físico o robo documentado',
            'CRÍTICO'  => 'Protocolo de coacción + posible delito',
          };
        ?></div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>

  <div class="recomendacion">
    <strong>Recomendación del evaluador (basada en evidencia documentada):</strong><br>
    Cualquier camino en el árbol presenta riesgo documentado. La sucursal no ofrece un entorno de control que garantice la seguridad patrimonial, sanitaria o física del comensal. El camino de menor riesgo absoluto es no visitar el establecimiento hasta que PROFECO, CONAPRED y SSC resuelvan las investigaciones activas y Grupo Carso acredite correcciones formales documentadas.<br><br>
    <strong>Evidencia base:</strong> Folio PROFECO 0002822-2026 (PROCEDENTE) | Denuncia SSC 16-feb-2026 | Acuse Grupo Carso 10-feb-2026 | Facturas FTDA-10487932/10487933 | alfonsoorozco.com/ssc2026
  </div>

</div>
</body>
</html>
