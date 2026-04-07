# Análisis Estadístico y Legal — Sanborns Los Azulejos
## Caso: Código 5 / Mystery Shopper / Riesgo Operativo

**Autor:** Alfonso Orozco Aguilar  
**Repositorio:** Documentación técnica complementaria a denuncias formales  
**Última actualización:** Abril 2026

---

## Contexto

Este repositorio contiene el análisis estadístico, forense y de riesgo derivado de dos visitas documentadas a Sanborns Los Azulejos (Av. Francisco I. Madero No. 4, Centro Histórico, CDMX):

| Visita | Fecha | Tipo | Resultado |
|--------|-------|------|-----------|
| 1 | 7 febrero 2026 | Cliente regular | Código 5 / Hostigamiento / Sin servicio 2 horas |
| 2 | 7 marzo 2026 | Mystery Shopper incógnito | Comida fría / Violación NOM-251 / Contaminación cruzada |

---

## Denuncias activas

- **PROFECO** Folio 0002822-2026 — Estado: **PROCEDENTE**
- **CONAPRED** — En investigación
- **SSC CDMX** — Denuncia 16 febrero 2026, derivó visita de inspección DGSPyCI/VS/021/2026 notificado en Oficio SSC-SDI-DGSPyCI-DSP-SSyS-238-2026; en espera de datos para la querella penal. Solo han actuado por vía administrativa de esfera pública.
- **Grupo Carso** — Notificación sin acuse de recibo 10 febrero 2026
- **Sanborns** — Responde a la queja 538601034 el 13 de marzo de 2026 a través de Silvia García (Asesor), es lo que en auditoría llamamos una respuesta paliativa sin fondo:

![Respuesta Sanborns](imagenes/respuestasanborns.png)

---

## Módulos de Auditoría (PHP Soberano)

| Archivo | Descripción Técnica y Normativa |
|:--- |:--- |
| `index.php` | **Panel de Control:** Punto de entrada centralizado que orquesta la visualización de hallazgos y el estado de las denuncias legales. |
| `bayesiano_marzo.php` | **Análisis de Probabilidad Condicional:** Implementación del Teorema de Bayes para determinar la probabilidad de fallo sistémico en la visita de marzo, basado en 24 anomalías conductuales. |
| `arbol_decisiones.php` | **Matriz de Riesgo del Cliente:** Algoritmo que evalúa las rutas de escalación ante el hostigamiento, alineado con la valoración de riesgos de la **NIA 315**. |
| `riesgo_patrimonial.php` | **Modelo de Impacto Económico:** Cuantificación del riesgo derivado de la elusión de controles internos (**NIA 240**) y el impacto de incidentes en el entorno de control (COSO). |
| `cifra_negra.php` | **Inferencia de Incidentes No Reportados:** Módulo estadístico para estimar la brecha entre quejas oficiales e incidentes reales no denunciados por otros usuarios (**NIA 265**). |
| `comparativa.php` | **Benchmark de Incumplimiento:** Análisis comparativo de métricas entre ambas visitas, estableciendo el umbral de importancia relativa (**NIA 320**). |

---

## Metodología

- **NIA 230** Documentación de auditoría con evidencia contemporánea.
- **NIA 240** Identificación de elusión de controles por dirección.
- **NIA 265** Deficiencias significativas en control interno.
- **NIA 315** Valoración de riesgos de incorrección material.
- **NIA 320** Importancia relativa — umbral cero en discriminación.
- **Marco COSO** Evaluación de entorno de control.
- **Análisis Bayesiano** Probabilidad condicional sobre anomalías detectadas.
- **NOM-251-SSA1-2009** Violaciones a normas de higiene documentadas.

---

## Reproducibilidad y Soberanía Tecnológica

- **Lenguaje:** PHP 8.x Procedural (Sovereign Code).
- **Dependencias:** Cero. Sin librerías externas ni frameworks (Anti-NPM).
- **Ejecución:** Compatible con cualquier entorno LAMP/LEMP estándar. Los cálculos son auditables línea por línea para peritajes técnicos.

---

## Evidencia digital complementaria

Existe un sitio web privado con grabaciones de audio, video y fotografías de alta resolución. Dicho material se mantiene bajo reserva para evitar la obstrucción de la justicia y será presentado únicamente ante las autoridades competentes.

---

*Este repositorio se mantendrá público hasta la resolución de todos los procesos administrativos y judiciales activos.*
