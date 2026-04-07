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

* **CANTEC:** "La utilización de reclutamiento de personal de una razón social ajena al giro (CANTEC) no solo constituye una falta administrativa, sino que activa la Responsabilidad Solidaria del beneficiario del servicio (Sanborns) ante cualquier daño civil o penal causado por dicho personal (Art. 15 LFT)."
---
> ### 🛡️ Nota sobre Gobernanza Corporativa
> "Durante el levantamiento de datos y la ejecución de la NIA 315, se observaron inconsistencias materiales en la **identidad patronal** del personal de seguridad y de las vacantes del implicado subgerente de restaurante (empleador identificado como CANTEC). Desde la perspectiva de **Riesgo Operativo**, se señala que esta fragmentación en la contratación debilita la cadena de mando y diluye la responsabilidad civil del establecimiento ante incidentes críticos como el **'Código 5'**. La documentación de este esquema de subcontratación se anexa al presente informe exclusivamente para fines de transparencia y evaluación del entorno de control interno bajo el **Marco COSO**."
---
# 📚 Declaración de Fuentes y Transparencia Metodológica
## Papel de Trabajo: PT-001 | Auditoría Sanborns Los Azulejos

Para garantizar la integridad del análisis contractual y la objetividad del dictamen, se hace pública la siguiente declaración de fuentes y deslinde de responsabilidad conforme a estándares internacionales de auditoría.

### 1. Fundamentación Doctrinal Primaria
El análisis de la relación contractual de tracto sucesivo y el perfeccionamiento de las obligaciones en este repositorio se sustenta en la obra:
* **Autor:** Lic. Leopoldo Aguilar Carvajal.
* **Obra:** *Segundo Curso de Derecho Civil*.
* **Editorial:** Porrúa (Referencia obligada en la academia jurídica mexicana: UNAM, UAM).

### 2. Declaración de Parentesco y Expertise
Se declara formalmente que el autor de la obra citada fue el abuelo materno del auditor responsable, **Alfonso Orozco Aguilar**. Esta relación, lejos de constituir un sesgo, garantiza:
* **Acceso a Fuentes Originales:** El análisis se basa en la biblioteca jurídica heredada del autor, permitiendo un manejo profundo de la Teoría General de los Contratos.
* **Estándar de Industria:** La doctrina de Aguilar Carvajal es el estándar en el Derecho Civil Mexicano; omitirla en favor de fuentes menores sería una negligencia profesional.

### 3. Mitigación de Sesgo (Protocolo NIA)
Conforme a la **NIA 230**, la objetividad del análisis se asegura mediante:
1.  **Validación Cruzada:** Contraste sistemático de la doctrina con el **Código Civil de la CDMX (2026)**.
2.  **Consenso Algorítmico:** Verificación de las tesis doctrinales mediante el panel de 6 modelos de IA (Claude, Gemini, Grok, etc.) depositados en `/consenso/`.
3.  **Transparencia Total:** La familiaridad con la obra permite una aplicación técnica precisa, no una interpretación subjetiva.

---

> **Dictamen de Independencia:** El parentesco con el autor de la fuente doctrinal no afecta la objetividad del peritaje, ya que cualquier analista utilizando la misma doctrina y los mismos hechos documentados (audios/timestamps) llegaría a las mismas conclusiones técnicas.
---
# ⚖️ Análisis de Responsabilidad Civil: Incumplimiento de Contrato
## Hito de Auditoría: 60 Días (Cierre de Instrucción)

Este apartado documenta exclusivamente la **Ruptura Contractual Unilateral** desde la perspectiva del Derecho Civil Mexicano (CDMX 2026), fundamentada en un consenso de 5 modelos de Inteligencia Artificial y doctrina clásica.

---

## 📂 Consenso Jurídico (Carpeta: `/consenso/`)
⚖️ Resumen de CONSENSO de IA: Incumplimiento Contractual (Civil)
Este apartado se limita exclusivamente al análisis de la Ruptura Contractual **Unilateral**. Los hallazgos penales, administrativos y laborales (como el caso CANTEC) se detallan por cuerdas separadas en los papeles de trabajo correspondientes.

Se han depositado los dictámenes técnicos que validan la existencia de una relación contractual y su posterior rescisión dolosa **UNILATERAL** por parte del establecimiento.

| Archivo | Tesis Jurídica Central | Concepto Clave |
| :--- | :--- | :--- |
| [CLAUDE_17febrero.pdf](consenso/CLAUDE_17febrero_2026_compressed.pdf) | **Ruptura de Tracto Sucesivo** | Resolución unilateral injustificada tras 100 min de mora. |
| [COHERE_17febrero.pdf](consenso/COHERE_17febrero_2026_compressed.pdf) | **Teoría de la Imprevisión y Mala Fe** | Invalidez de la defensa de "evento privado" por falta de notificación. |
| [GEMINI_17febrero.pdf](consenso/GEMINI_17febrero_2026_compressed.pdf) | **Daño Moral y Dignidad** | El "Código 5" como hecho ilícito (Art. 1916 CCDMX). |
| [GROK_17febrero.pdf](consenso/GROK_17febrero_2026_compressed.pdf) | **Dolo en la Resolución** | Simulación de "evento privado" para encubrir negativa de servicio. |
| [COPILOT_17febrero.pdf](consenso/COPILOT_17febrero_2026_compressed.pdf) | **Perfeccionamiento y Mora** | Obligación de hacer nacida a las 16:35h con la asignación de mesa. |
| [MISTRAL_17febrero.pdf](consenso/MISTRAL_17febrero_2026_compressed.pdf) | **Responsabilidad Objetiva** | El establecimiento responde civilmente por los actos de sus empleados. |

### 4. Protocolo de Validación Transatlántica (Anti-Sesgo)
Para garantizar que la aplicación de la doctrina **Aguilar Carvajal** no presenta sesgos geográficos o familiares, el modelo de razonamiento legal fue sometido a una validación cruzada en dos grupos de control:

1.  **Grupo de Proximidad:** Modelos de infraestructura estadounidense (Gemini, Grok, Copilot, Claude).
2.  **Grupo de Control Europeo:** Se integraron dos inteligencias de arquitectura europea (**Mistral** de Francia y **Cohere** con fuerte enfoque en regulación global) para auditar la lógica del contrato de tracto sucesivo bajo estándares internacionales.

**Resultado del Stress-Test:**
* **Convergencia del 100%:** Los modelos europeos validaron la tesis de la **Ruptura Unilateral Injustificada** y la **Mora de Ejecución**, confirmando que los principios doctrinales de la fuente primaria (Porrúa) son compatibles con los estándares de derecho civil y responsabilidad corporativa global (ESG/Compliance).

**1 Neutralidad Tecnológica:** Al incluir a Mistral (Francia), se está usando un modelo reconocido por manejo de leyes, y que corresponde a la cuna del Derecho Civil (el Código Napoleónico). Si una IA francesa valida la interpretación del contrato mexicano, Sanborns no tiene forma de decir que el análisis es "casero" o "sentimental".

**2 Rigor de Auditoría de IA:** No solo usamos IA para preguntar; la usamos como un instrumento de auditoría de sesgos. Esto es deseable en ciencia de datos y derecho.

**3 Inmunidad Geográfica:** Se Establece que el hostigamiento y la ruptura de contrato son violaciones universales, no "usos y costumbres" locales de una sucursal en el Centro Histórico.

> **📌 Nota Metodológica sobre el Consenso:** > Se designó a **Claude** como el elaborador principal del consenso debido a su capacidad de síntesis doctrinal. Mientras que los demás modelos validaron tipos específicos (civil/penal), Claude integró la **Teoría General de las Obligaciones** para demostrar que la conducta de Sanborns fue un incumplimiento continuo y no un incidente aislado. Revisar su sección 7, es el documento mas extenso.
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
