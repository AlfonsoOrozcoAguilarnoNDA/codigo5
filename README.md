# Análisis Estadístico y Legal — Sanborns Los Azulejos
## Caso: Código 5 / Mystery Shopper / Riesgo Operativo

**Autor:** Alfonso Orozco Aguilar  
**Repositorio:** Documentación técnica complementaria a denuncias formales  
**Última actualización:** Marzo 2026

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
- **SSC CDMX** — Denuncia 16 febrero 2026, derivó visita de inspección DGSPyCI/VS/021/2026 notificado en Oficio SSC-SDI-DGSPyCI-DSP-SSyS-238-2026; en epera de datos para la querella penal. Solo jhan actuado por via administrativa de esfera pública.
- **Grupo Carso** — Notificación sin acuse de recibo 10 febrero 2026
- **Sanborns** Responde a la queja 538601034 el 13 de marzo de este modo, por correo de Silvia García,  
![Respuesta en imagen](imagenes/respuestasanborns.png)
---

## Módulos

| Archivo | Descripción |
|---------|-------------|
| `index.php` | Panel principal de navegación |
| `bayesiano_marzo.php` | Análisis bayesiano visita marzo 2026 |
| `arbol_decisiones.php` | Árbol de decisiones — riesgo del cliente |
| `riesgo_patrimonial.php` | Modelo de riesgo patrimonial con robos documentados |
| `comparativa.php` | Comparativa estadística ambas visitas |

---

## Metodología

- **NIA 230** Documentación de auditoría con evidencia contemporánea
- **NIA 240** Identificación de elusión de controles por dirección
- **NIA 265** Deficiencias significativas en control interno
- **NIA 315** Valoración de riesgos de incorrección material
- **NIA 320** Importancia relativa — umbral cero en discriminación
- **Marco COSO** Evaluación de entorno de control
- **Análisis Bayesiano** Probabilidad condicional sobre 24 anomalías conductuales
- **NOM-251-SSA1-2009** Violaciones a normas de higiene documentadas

---

## Reproducibilidad

Todo el código puede ser ejecutado por cualquier administrador web con PHP 7.4+.  
No requiere base de datos. No requiere librerías externas.  
Los cálculos son auditables línea por línea.

---

## Evidencia digital complementaria

Tenemos Sitio web con audio, video y fotografías que no se publica de momento por evitar obstrucción de la justicia: 

---

*Este repositorio se mantendrá público hasta la resolución de todos los procesos administrativos activos.*
