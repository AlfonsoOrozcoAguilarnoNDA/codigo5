<?php
// ============================================================
// MÓDULO 5: CIFRA NEGRA — DELITOS NO REPORTADOS
// Metodología: ENVIPE (INEGI) + UNODC + BJS
// Aplicación: Sanborns Los Azulejos — casos documentados
// ============================================================

// ── Parámetros base ──────────────────────────────────────────
$casos_google      = 5;    // casos documentados en Google Reviews
$periodo_meses     = 6;    // meses del período analizado
$factor_mx         = 14;   // 1 de cada 14 según ENVIPE/INEGI (93.2% cifra negra)
$factor_intl       = 26;   // 1 de cada 26 según UNODC/BJS (estándar internacional)
$factor_google     = 3;    // estimado: solo 1 de cada 3 víctimas deja reseña pública

// ── Cálculos ─────────────────────────────────────────────────
$denuncias_reales_mx   = $casos_google * $factor_google * $factor_mx;
$denuncias_reales_intl = $casos_google * $factor_google * $factor_intl;
$por_mes_mx            = round($denuncias_reales_mx / $periodo_meses, 1);
$por_mes_intl          = round($denuncias_reales_intl / $periodo_meses, 1);
$por_semana_mx         = round($denuncias_reales_mx / ($periodo_meses * 4), 1);
$por_semana_intl       = round($denuncias_reales_intl / ($periodo_meses * 4), 1);

// ── Casos documentados ───────────────────────────────────────
$casos = [
  ['fuente'=>'World Traveler (Google Reviews)',  'activo'=>'Bolsa + tarjetas',        'daño'=>'$1,300+ USD en cargos fraudulentos (Oxxo/7-Eleven)', 'patron'=>'Meseros en distracción coordinada'],
  ['fuente'=>'Carmen Soto (Google Reviews)',     'activo'=>'Bolsa completa',           'daño'=>'No cuantificado — sin responsabilidad asumida',      'patron'=>'Meseros señalados directamente'],
  ['fuente'=>'Katrina Oleary (Google Reviews)',  'activo'=>'Cartera + Pasaporte',      'daño'=>'Pasaporte de emergencia en embajada de EUA',          'patron'=>'Mesero único con acceso — zapatería enfrente'],
  ['fuente'=>'Usuario anónimo (Google Reviews)', 'activo'=>'Cartera + dispositivo',   'daño'=>'Uso inmediato de tarjetas',                           'patron'=>'Maniobra de distracción documentada'],
  ['fuente'=>'Testigo presencial 7-feb-2026',    'activo'=>'Suéter',                  'daño'=>'Extravío durante operativo Código 5',                 'patron'=>'Coincide con despliegue de seguridad no identificada'],
];

$niveles = [
  ['label'=>'Casos en Google Reviews',          'valor'=>$casos_google,              'color'=>'#2E5090', 'desc'=>'Punta visible del iceberg — solo lo que alguien decidió documentar públicamente'],
  ['label'=>'Casos reales estimados (INEGI/MX)','valor'=>$denuncias_reales_mx,       'color'=>'#e67e22', 'desc'=>'Aplicando factor 1:14 de ENVIPE + factor 1:3 de reseñas públicas'],
  ['label'=>'Casos reales estimados (UNODC)',   'valor'=>$denuncias_reales_intl,     'color'=>'#C00000', 'desc'=>'Aplicando factor 1:26 internacional + factor 1:3 de reseñas públicas'],
];
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Cifra Negra — Delitos No Reportados | Sanborns Azulejos</title>
<style>
  * { box-sizing: border-box; margin: 0; padding: 0; }
  body { font-family: Arial, sans-serif; background: #f4f6f9; color: #222; }
  .header { background: #1a1a2e; color: white; padding: 28px 40px; border-bottom: 6px solid #C00000; }
  .header h1 { font-size: 1.5em; margin-bottom: 4px; }
  .nav { background: #0f0f1a; padding: 10px 40px; }
  .nav a { color: #aaaacc; text-decoration: none; font-size: 0.9em; margin-right: 20px; }
  .nav a:hover { color: white; }
  .container { max-width: 1000px; margin: 0 auto; padding: 36px 20px; }

  .iceberg { background: white; border-radius: 10px; padding: 28px; margin-bottom: 28px; box-shadow: 0 2px 12px rgba(0,0,0,0.08); }
  .iceberg h2 { color: #1a1a2e; margin-bottom: 20px; font-size: 1.05em; border-bottom: 2px solid #1a1a2e; padding-bottom: 8px; }
  .ice-level { display: flex; align-items: center; gap: 16px; margin-bottom: 12px; }
  .ice-bar-wrap { flex: 1; }
  .ice-label { width: 280px; flex-shrink: 0; font-size: 0.85em; }
  .ice-bar { height: 36px; border-radius: 4px; display: flex; align-items: center; padding-left: 12px; color: white; font-weight: bold; font-size: 0.9em; transition: width 0.3s; }
  .ice-num { width: 80px; text-align: right; font-weight: bold; font-size: 1.1em; flex-shrink: 0; }
  .ice-desc { font-size: 0.78em; color: #888; margin-top: 2px; }

  .kpis { display: grid; grid-template-columns: repeat(auto-fit, minmax(160px,1fr)); gap: 14px; margin-bottom: 28px; }
  .kpi { background: white; border-radius: 8px; padding: 16px; text-align: center; box-shadow: 0 2px 8px rgba(0,0,0,0.07); border-top: 4px solid #C00000; }
  .kpi .num { font-size: 1.9em; font-weight: bold; color: #C00000; }
  .kpi .lbl { font-size: 0.78em; color: #666; margin-top: 4px; line-height: 1.4; }

  .section { background: white; border-radius: 8px; padding: 24px; margin-bottom: 24px; box-shadow: 0 2px 8px rgba(0,0,0,0.07); }
  .section h2 { color: #1a1a2e; font-size: 1.05em; margin-bottom: 16px; padding-bottom: 8px; border-bottom: 2px solid #1a1a2e; }

  table { width: 100%; border-collapse: collapse; font-size: 0.86em; }
  th { background: #1a1a2e; color: white; padding: 10px 12px; text-align: left; }
  td { padding: 9px 12px; border-bottom: 1px solid #eee; vertical-align: top; line-height: 1.5; }
  tr:hover td { background: #f5f5ff; }

  .formula { background: #f8f9fa; border: 1px solid #dee2e6; border-radius: 6px; padding: 16px 20px; font-family: monospace; font-size: 0.85em; line-height: 2; margin-bottom: 16px; }
  .alerta { background: #fff3cd; border-left: 6px solid #C00000; padding: 16px 20px; border-radius: 4px; margin-bottom: 16px; font-size: 0.9em; line-height: 1.7; }
  .alerta strong { color: #C00000; }
  .conclusion { background: #1a1a2e; color: white; border-radius: 8px; padding: 24px 28px; margin-top: 24px; }
  .conclusion h3 { color: #ffaaaa; margin-bottom: 12px; }
  .conclusion p { font-size: 0.9em; line-height: 1.8; opacity: 0.9; }
  .conclusion .quote { font-size: 1.05em; font-style: italic; color: #ffdddd; border-left: 4px solid #C00000; padding-left: 16px; margin: 16px 0; }

  .fuente-tag { display: inline-block; background: #e8f0fe; color: #1a1a2e; padding: 2px 8px; border-radius: 10px; font-size: 0.75em; font-weight: bold; }
  .patron-tag { display: inline-block; background: #fce8e6; color: #C00000; padding: 2px 8px; border-radius: 10px; font-size: 0.75em; font-weight: bold; }

  .multiplicador { display: grid; grid-template-columns: repeat(3,1fr); gap: 16px; margin: 20px 0; }
  .mult-card { background: #f8f9fa; border-radius: 8px; padding: 16px; text-align: center; border: 2px solid #dee2e6; }
  .mult-card .factor { font-size: 2.5em; font-weight: bold; }
  .mult-card .fuente { font-size: 0.78em; color: #888; margin-top: 4px; }
  .mult-card.highlight { border-color: #C00000; background: #fff5f5; }
  .mult-card.highlight .factor { color: #C00000; }

  @media(max-width:600px){ .multiplicador { grid-template-columns: 1fr; } .ice-label { width: 160px; } }
</style>
</head>
<body>
<div class="header">
  <h1>🌊 Cifra Negra — El Iceberg de los Delitos No Reportados</h1>
  <p style="opacity:0.8;font-size:0.9em;margin-top:4px">Metodología: ENVIPE/INEGI + UNODC + BJS | Aplicación: Sanborns Los Azulejos</p>
  <p style="opacity:0.6;font-size:0.82em;margin-top:4px">Fuente blog: vibecodingmexico.com/porque-debes-comprar-un-dominio</p>
</div>
<div class="nav">
  <a href="index.php">← Panel principal</a>
  <a href="bayesiano_marzo.php">Bayesiano</a>
  <a href="arbol_decisiones.php">Árbol decisiones</a>
  <a href="riesgo_patrimonial.php">Riesgo patrimonial</a>
  <a href="comparativa.php">Comparativa</a>
</div>
<div class="container">

  <div class="alerta">
    <strong>⚠️ Nota metodológica:</strong> Este módulo aplica factores de cifra negra documentados por el INEGI (ENVIPE) y la UNODC a los casos de robo observados en Google Reviews de Sanborns Los Azulejos en los últimos 6 meses. Los resultados son estimaciones estadísticas basadas en metodología académica reconocida — no son cifras oficiales del establecimiento.
  </div>

  <div class="iceberg">
    <h2>🧊 El Iceberg — Lo que se ve vs. lo que existe</h2>
    <?php
    $max = $denuncias_reales_intl * $factor_google;
    foreach($niveles as $n):
      $pct = max(round(($n['valor'] / ($denuncias_reales_intl)) * 100), 4);
    ?>
    <div class="ice-level">
      <div class="ice-label">
        <strong><?= $n['label'] ?></strong>
        <div class="ice-desc"><?= $n['desc'] ?></div>
      </div>
      <div class="ice-bar-wrap">
        <div class="ice-bar" style="width:<?= min($pct,100) ?>%;background:<?= $n['color'] ?>">
          <?= $n['valor'] ?> casos
        </div>
      </div>
      <div class="ice-num" style="color:<?= $n['color'] ?>"><?= $n['valor'] ?></div>
    </div>
    <?php endforeach; ?>
    <div style="margin-top:16px;padding:12px 16px;background:#fff3cd;border-radius:6px;font-size:0.88em;color:#555">
      💡 <strong>La analogía del iceberg:</strong> Lo que aparece en Google Reviews es la punta. La masa invisible debajo es lo que la cifra negra estima como la realidad operativa del establecimiento.
    </div>
  </div>

  <div class="kpis">
    <div class="kpi"><div class="num"><?= $casos_google ?></div><div class="lbl">Casos visibles en Google Reviews</div></div>
    <div class="kpi"><div class="num"><?= $denuncias_reales_mx ?></div><div class="lbl">Estimado real (factor INEGI México)</div></div>
    <div class="kpi"><div class="num"><?= $denuncias_reales_intl ?></div><div class="lbl">Estimado real (factor UNODC internacional)</div></div>
    <div class="kpi"><div class="num"><?= $por_semana_mx ?>-<?= $por_semana_intl ?></div><div class="lbl">Incidentes estimados por semana</div></div>
    <div class="kpi"><div class="num"><?= $por_mes_mx ?>-<?= $por_mes_intl ?></div><div class="lbl">Incidentes estimados por mes</div></div>
    <div class="kpi"><div class="num"><?= $periodo_meses ?> meses</div><div class="lbl">Período analizado (búsqueda no exhaustiva)</div></div>
  </div>

  <div class="section">
    <h2>📐 Metodología y factores multiplicadores</h2>
    <div class="multiplicador">
      <div class="mult-card">
        <div class="factor" style="color:#2E5090">1:3</div>
        <div style="font-size:0.85em;margin:6px 0">Factor reseña pública</div>
        <div class="fuente">Estimado conservador — solo 1 de cada 3 víctimas documenta públicamente</div>
      </div>
      <div class="mult-card">
        <div class="factor" style="color:#e67e22">1:14</div>
        <div style="font-size:0.85em;margin:6px 0">Factor ENVIPE/INEGI México</div>
        <div class="fuente">93.2% cifra negra — ENVIPE 2023</div>
      </div>
      <div class="mult-card highlight">
        <div class="factor">1:26</div>
        <div style="font-size:0.85em;margin:6px 0">Factor UNODC Internacional</div>
        <div class="fuente">BJS + UNODC — países con denuncia débil</div>
      </div>
    </div>

    <div class="formula">
Casos visibles (Google Reviews)     = <?= $casos_google ?>
Factor reseña pública               = 1:<?= $factor_google ?> (estimado conservador)
Casos que llegaron a reseña         = <?= $casos_google ?> × <?= $factor_google ?> = <?= $casos_google * $factor_google ?>

Aplicando ENVIPE (1:<?= $factor_mx ?>):
  Estimado real MX = <?= $casos_google * $factor_google ?> × <?= $factor_mx ?> = <?= $denuncias_reales_mx ?> casos en <?= $periodo_meses ?> meses
  Por mes          = <?= $por_mes_mx ?> | Por semana = <?= $por_semana_mx ?>

Aplicando UNODC (1:<?= $factor_intl ?>):
  Estimado real    = <?= $casos_google * $factor_google ?> × <?= $factor_intl ?> = <?= $denuncias_reales_intl ?> casos en <?= $periodo_meses ?> meses
  Por mes          = <?= $por_mes_intl ?> | Por semana = <?= $por_semana_intl ?>

RANGO ESTIMADO TOTAL: <?= $denuncias_reales_mx ?> — <?= $denuncias_reales_intl ?> incidentes en <?= $periodo_meses ?> meses
    </div>
  </div>

  <div class="section">
    <h2>📋 Casos documentados — base del análisis</h2>
    <table>
      <tr><th>Fuente</th><th>Activo sustraído</th><th>Daño documentado</th><th>Patrón identificado</th></tr>
      <?php foreach($casos as $c): ?>
      <tr>
        <td><span class="fuente-tag"><?= $c['fuente'] ?></span></td>
        <td><?= $c['activo'] ?></td>
        <td style="color:#C00000;font-size:0.85em"><?= $c['daño'] ?></td>
        <td><span class="patron-tag"><?= $c['patron'] ?></span></td>
      </tr>
      <?php endforeach; ?>
    </table>
    <div style="margin-top:12px;font-size:0.82em;color:#888">
      * Búsqueda OSINT no exhaustiva realizada el 12-feb-2026. El número real de casos documentados públicamente puede ser mayor.
    </div>
  </div>

  <div class="section">
    <h2>🔗 La misma lógica aplicada a cualquier proveedor</h2>
    <table>
      <tr><th>Señal visible</th><th>Factor cifra negra</th><th>Realidad estimada</th><th>Acción recomendada</th></tr>
      <tr>
        <td>1 reseña negativa de robo en Google</td>
        <td>×14 a ×26 (ENVIPE/UNODC) + ×3 (reseñas)</td>
        <td style="color:#C00000;font-weight:bold">42 a 78 incidentes reales</td>
        <td>Evaluar cambio de proveedor inmediatamente</td>
      </tr>
      <tr>
        <td>1 fallo visible en servidor/servicio</td>
        <td>×10 a ×20 (incidentes no reportados internamente)</td>
        <td style="color:#C00000;font-weight:bold">10 a 20 fallos reales</td>
        <td>Revisar infraestructura completa — no solo el síntoma</td>
      </tr>
      <tr>
        <td>1 queja de cliente documentada</td>
        <td>×14 (estimado conservador)</td>
        <td style="color:#C00000;font-weight:bold">14 clientes insatisfechos que no hablaron</td>
        <td>Investigar causa raíz — no solo el caso visible</td>
      </tr>
      <tr>
        <td>1 violación NOM-251 observada</td>
        <td>×N (sin factor establecido — pero sistemática)</td>
        <td style="color:#C00000;font-weight:bold">Cultura de incumplimiento — no evento aislado</td>
        <td>Cambio de proveedor de alimentos / servicio</td>
      </tr>
    </table>
  </div>

  <div class="conclusion">
    <h3>💡 Conclusión — La cifra negra como herramienta de decisión</h3>
    <div class="quote">
      "No es un hombre de saco verde limpiándose la boca con la mano y luego agarrando el carrito de los cubiertos. Son catorce o veintiséis."
      <br><small>— Alfonso Orozco Aguilar, vibecodingmexico.com</small>
    </div>
    <p>La cifra negra no es un concepto abstracto de criminología — es una herramienta práctica de gestión de riesgos. Cuando ves una señal negativa en un proveedor, ya sea un restaurante, un servidor, una empresa de software o cualquier otro servicio, lo que ves es la punta del iceberg.</p>
    <br>
    <p>El consultor que solo reacciona a lo visible está gestionando el 4% del problema. El consultor que aplica factores de cifra negra a cada señal está gestionando la realidad completa.</p>
    <br>
    <p><strong style="color:#ffaaaa">Consejo de consultor senior:</strong> Si en un piso te sirven basura, en el otro también. Aplica a restaurantes, a servidores y a cualquier proveedor que no controla su cadena de calidad de manera sistémica.</p>
  </div>

</div>
</body>
</html>
