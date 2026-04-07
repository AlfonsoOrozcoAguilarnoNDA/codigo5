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
### 🚩 Hallazgo 04: Irregularidad en Subcontratación y Cumplimiento (CANTEC)

* **Observación:** Se detectó la presencia y operación de personal uniformado y/o identificado bajo la razón social **"CANTEC"** realizando funciones de seguridad y control operativo dentro de la sucursal. Hay una vacante correspondiente a Subgerente de restaurante y otros puestos, pero cantec es otra empresa de giro diferente.
* **Incumplimiento Normativo:** Posible violación a la **Ley Federal del Trabajo (Art. 12, 13 y 14)**. La normativa vigente prohíbe la subcontratación de personal para realizar actividades que formen parte del objeto social y de la actividad económica preponderante del contratante (Sanborns), salvo servicios especializados que no sean del giro principal y que cuenten con registro **REPSE**.
* **Riesgo Fiscal y Patrimonial:** El uso de empresas de ramos ajenos al servicio prestado para el suministro de personal sugiere una **simulación laboral**. Esto conlleva la invalidez de la deducibilidad de dichos gastos para el contratante y genera una **responsabilidad solidaria** ineludible ante el IMSS y el SAT.
---
> ### 🛡️ Nota sobre Gobernanza Corporativa
> "Durante el levantamiento de datos y la ejecución de la NIA 315, se observaron inconsistencias materiales en la **identidad patronal** del personal de seguridad y de las vacantes del implicado subgerente de restaurante (empleador identificado como CANTEC). Desde la perspectiva de **Riesgo Operativo**, se señala que esta fragmentación en la contratación debilita la cadena de mando y diluye la responsabilidad civil del establecimiento ante incidentes críticos como el **'Código 5'**. La documentación de este esquema de subcontratación se anexa al presente informe exclusivamente para fines de transparencia y evaluación del entorno de control interno bajo el **Marco COSO**."
---
# ⚖️ Análisis de Responsabilidad Civil: Incumplimiento de Contrato
## Hito de Auditoría: 60 Días (Cierre de Instrucción)

Este apartado documenta exclusivamente la **Ruptura Contractual Unilateral** desde la perspectiva del Derecho Civil Mexicano (CDMX 2026), fundamentada en un consenso de 5 modelos de Inteligencia Artificial y doctrina clásica.

---

## 📂 Consenso Jurídico (Carpeta: `/consenso/`)

Se han depositado los dictámenes técnicos que validan la existencia de una relación contractual y su posterior rescisión dolosa por parte del establecimiento.

| Archivo | Tesis Jurídica Central | Concepto Clave |
| :--- | :--- | :--- |
| `consenso/CLAUDE_17febrero.pdf` | **Ruptura de Tracto Sucesivo** | Resolución unilateral injustificada tras 100 min de mora. |
| `consenso/COHERE_17febrero.pdf` | **Teoría de la Imprevisión y Mala Fe** | Invalidez de la defensa de "evento privado" por falta de notificación. |
| `consenso/GEMINI_17febrero.pdf` | **Daño Moral y Dignidad** | El "Código 5" como hecho ilícito (Art. 1916 CCDMX). |
| `consenso/GROK_17febrero.pdf` | **Dolo en la Resolución** | Simulación de "evento privado" para encubrir negativa de servicio. |
| `consenso/COPILOT_17febrero.pdf` | **Perfeccionamiento y Mora** | Obligación de hacer nacida a las 16:35h con la asignación de mesa. |
| `consenso/MISTRAL_17febrero.pdf` | **Responsabilidad Objetiva** | El establecimiento responde civilmente por los actos de sus empleados. |

---

## 🔬 Pilares del Incumplimiento Civil

### 1. El Perfeccionamiento del Contrato (16:35h)
Contrario a la postura de la contraparte, el contrato de prestación de servicios gastronómicos **no se perfecciona con la comanda, sino con el consentimiento mutuo** manifestado al asignar la mesa. 
* **Fundamento:** Arts. 1794 y 1795 del Código Civil. Al otorgar el espacio, Sanborns aceptó la obligación de prestar el servicio.

### 2. Teoría del Tracto Sucesivo
El servicio de restaurante es un contrato de ejecución continuada. Claude dictamina que el incumplimiento no inició a las 18:13h (momento de la expulsión), sino que fue un **incumplimiento de tracto sucesivo** que se acumuló durante los 100 minutos de omisión de servicio previos.

### 3. Resolución Unilateral Injustificada
La terminación del servicio invocando un "evento privado" inexistente o no notificado constituye una **rescisión arbitraria**.
* **Dolo Procesal:** La utilización de personal de seguridad para coaccionar la salida de los comensales eleva el incumplimiento de una falta administrativa a un hecho ilícito civil con dolo manifiesto.

---

## 📉 Independencia de Esferas Jurídicas

Este análisis civil se mantiene de manera **independiente y autónoma** a los hallazgos detectados en otras áreas, los cuales corren por cuerdas procesales separadas:

1.  **Esfera Administrativa:** Violaciones a la NOM-251 y multas de PROFECO.
2.  **Esfera Laboral:** Simulación de outsourcing ilegal con la razón social **CANTEC**.
3.  **Esfera Penal:** Delitos de discriminación, hostigamiento y posibles omisiones de auxilio.

> **Dictamen Final del Auditor:** La robustez de la evidencia documental (Timestamps + Audios IA + Testimoniales) permite concluir que la responsabilidad civil de Sanborns es **irrefutable y cuantificable**, existiendo un nexo causal directo entre la orden de "Código 5" y el daño moral/patrimonial causado al suscrito.
---

## Evidencia digital complementaria

Existe un sitio web privado con grabaciones de audio, video y fotografías de alta resolución. Dicho material se mantiene bajo reserva para evitar la obstrucción de la justicia y será presentado únicamente ante las autoridades competentes.

---

*Este repositorio se mantendrá público hasta la resolución de todos los procesos administrativos y judiciales activos.*
