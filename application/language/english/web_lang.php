<?php
/*******************************************************************************
********************************************************************************
**************************** TRADUCCION AL INGLES *****************************
********************************************************************************
********************************************************************************/
$lang['leng_pt'] = 'Portugués';
$lang['leng_es'] = 'Español';

$lang['leng_somos'] = 'AHORA SOMOS';


$lang['lbl_descargar'] = 'Download';
$lang['lbl_video_micro'] = 'See Microclimate video';

$lang['lbl_ver_mas'] = 'Learn more';
$lang['lbl_mas_info'] = 'More Info';
$lang['lbl_obtener'] = 'FIND YOURS';

$lang['lbl_superficie'] = 'Surfaces';

$lang['lbl_probabilidades'] = 'See probabilities of PI';
$lang['lbl_versuperficies'] = 'See surfaces';
$lang['lbl_versuperficies_todas'] = 'See all surfaces';

$lang['lbl_estaticas'] = 'Static';
$lang['lbl_mixta'] = 'Mixed';
$lang['lbl_dinamica'] = 'Dynamic';

$lang['lbl_niveles'] = 'Levels of Risk';

$lang['lbl_nivel_01'] = 'Low';
$lang['lbl_nivel_02'] = 'Low to Moderate';
$lang['lbl_nivel_03'] = 'Moderate';
$lang['lbl_nivel_04'] = 'High';
$lang['lbl_nivel_05'] = 'Very High';

$lang['lbl_piel_01'] = 'Skin has pressure injury';
$lang['lbl_piel_02'] = 'Intact Skin';

$lang['lbl_riesgo_01'] = 'low risk';
$lang['lbl_riesgo_01_desc'] = 'We recommend non-powered surfaces of various materials.';

$lang['lbl_riesgo_02'] = 'medium risk';
$lang['lbl_riesgo_02_desc'] = 'We recommend dynamic surfaces with alternating or constant pressure.';

$lang['lbl_riesgo_03'] = 'high risk';
$lang['lbl_riesgo_03_desc'] = 'We recommend dynamic surfaces with alternating or constant pressure.';

$lang['lbl_riesgos_txt'] = 'Specialized surfaces recommended for:';

$lang['menu_nivel'] = 'Levels';
$lang['menu_clasificacion'] = 'Surfaces Assistance';

$lang['txt_sup_camas_descr'] = 'Select the ideal surface according to the Level of Risk';

$lang['txt_niveles_titulo'] = 'Risk Classification by levels';

/** LEVELES **/
$lang['lbl_bajo'] = 'LOW';
$lang['lbl_medio'] = 'MEDIUM';
$lang['lbl_alto'] = 'HIGH';

$lang['lbl_nombre_link_bajo'] = 'See surfaces for low risk';
$lang['lbl_nombre_link_medio'] = 'See surfaces for medium risk';
$lang['lbl_nombre_link_alto'] = 'See surfaces for high risk';

$lang['txt_t_01'] = 'Low Risk';
$lang['txt_d_01'] = '<p style="color: #fff;margin: 20px 0 50px;max-width: 65%;">For patients that have a lower risk of developing pressure injury, we recommend using non-powered  Constant Low Pressure (CLP) surfaces made of different materials such as gel, foam and other viscoelastic materials.</p>
	<a href="'.base_url().'asistencia/superficies?nivel=bajo" style="background: #5369E2;;padding: 10px 30px;font-size: 15px;">See surfaces for low risk</a>
	<a href="'.base_url().'escalas/braden/" style="background: #5369E2;;padding: 10px 30px;font-size: 15px;">Braden Scale</a>';

$lang['txt_t_02'] = 'Medium Risk';
$lang['txt_d_02'] = '<p style="color: #fff;margin: 20px 0 50px;max-width: 65%;">Patients who are considered at medium risk require a higher level of care and in turn require powered surfaces with alternating pressure. For instances where powered surfaces are not a possibility, we recommend surfaces that provide constant low pressure.</p>
	<a href="'.base_url().'asistencia/superficies?nivel=medio" style="background: #5369E2;;padding: 10px 30px;font-size: 15px;">See surfaces for medium risk</a>
	<a href="'.base_url().'escalas/braden/" style="background: #5369E2;;padding: 10px 30px;font-size: 15px;">Braden Scale</a>';

$lang['txt_t_03'] = 'High Risk';
$lang['txt_d_03'] = '<p style="color: #fff;margin: 20px 0 50px;max-width: 65%;">A patient with a high risk of developing pressure injury requires higher care along with powered surfaces that can provide alternating pressure. For instances where powered surfaces are not a possibility, we recommend surfaces that provide constant low pressure.</p>
	<a href="'.base_url().'asistencia/superficies?nivel=alto" style="background: #5369E2;;padding: 10px 30px;font-size: 15px;">See surfaces for high risk</a>
	<a href="'.base_url().'escalas/braden/" style="background: #5369E2;;padding: 10px 30px;font-size: 15px;">Braden Scale</a>';

/** ESCALA BRADEN **/

$lang['braden_titulo'] = 'To determine the Level of Risk of developing pressure injuries, please select the options that best describe your patient';

$lang['braden_titulo_02'] = 'BRADEN SCALE';

$lang['braden_columna_titulo_01'] = 'Sensory Perception';
$lang['braden_columna_01_item_01'] = '1. Completely limited';
$lang['braden_columna_01_item_02'] = '2. Very limited';
$lang['braden_columna_01_item_03'] = '3. Slightly limited';
$lang['braden_columna_01_item_04'] = '4. No impairment';

$lang['braden_columna_titulo_02'] = 'Moisture';
$lang['braden_columna_02_item_01'] = '1. Constantly moist';
$lang['braden_columna_02_item_02'] = '2. Very moist';
$lang['braden_columna_02_item_03'] = '3. Occasionally moist';
$lang['braden_columna_02_item_04'] = '4. Rarely moist';

$lang['braden_columna_titulo_03'] = 'Activity';
$lang['braden_columna_03_item_01'] = '1. Bedfast';
$lang['braden_columna_03_item_02'] = '2. Chairfast';
$lang['braden_columna_03_item_03'] = '3. Walks occasionally';
$lang['braden_columna_03_item_04'] = '4. Walks frequently';

$lang['braden_columna_titulo_04'] = 'Mobility';
$lang['braden_columna_04_item_01'] = '1. Completely immobile';
$lang['braden_columna_04_item_02'] = '2. Very limited';
$lang['braden_columna_04_item_03'] = '3. Slightly limited';
$lang['braden_columna_04_item_04'] = '4. No limitations';

$lang['braden_columna_titulo_05'] = 'Nutrition';
$lang['braden_columna_05_item_01'] = '1. Very poor';
$lang['braden_columna_05_item_02'] = '2. Probably inadequate';
$lang['braden_columna_05_item_03'] = '3. Adequate';
$lang['braden_columna_05_item_04'] = '4. Excellent';

$lang['braden_columna_titulo_06'] = 'Friction and Shear';
$lang['braden_columna_06_item_01'] = '1. Problem';
$lang['braden_columna_06_item_02'] = '2. Potential Problem';
$lang['braden_columna_06_item_03'] = '3. No apparent problem';

$lang['braden_nivel'] = 'Risk Level:';
$lang['braden_desc'] = 'Score: ≤16 – Low Risk, ≤14 Medium Risk, ≤12 High Risk';

$lang['probabilidades_titulo'] = 'Probabilities of developing Pressure Injuries according to the surface used:';
$lang['probabilidades_item_01'] = '21.8% <small style="text-transform:uppercase;">standard foam surface</small>';
$lang['probabilidades_item_02'] = '8.9% <small style="text-transform:uppercase;">constant low pressure surface</small>';
$lang['probabilidades_item_03'] = '6.8% <small style="text-transform:uppercase;">alternating pressure surface</small>';

$lang['algoritmo_home_titulo'] = 'Surfaces Assistance Algorithm';
$lang['algoritmo_home_desc'] = 'based on Consensus and Evidence';
$lang['algoritmo_home_btn'] = 'Start';
$lang['algoritmo_home_modal'] = 'Special Surfaces for Pressure Management<br><br>According to the National Pressure Ulcer Advisory Panel (NPUAP) Terms and Definitions Related to Support Surfaces, 2007; surfaces are defined as a specialized device for pressure redistribution designed for management of tissue loads, micro-climate, and/or other therapeutic functions.';

$lang['algoritmo_asistencia_titulo'] = '
		<h3 style="color:#fff">Pressure <div class="item-hints">
		  <div class="hint" data-position="4"><!-- is-hint -->
		    injury
		    <div class="hint-content do--split-children">
		      <p>An Evidence and Consensus-Based Support Surface Algorithm was developed by the WOCN Society in an effort to provide clinical guidance for selecting support surfaces based on individual patient needs for pressure injury prevention</p>
		    </div>
		  </div>
		</div> risk assesment</h3>';

$lang['algoritmo_asistencia_bajada'] = 'Select the appropriate answer according to risk of pressure injury';
$lang['algoritmo_pin'] = 'Intact Skin';
$lang['algoritmo_pin_01'] = 'Yes, it is at risk';
$lang['algoritmo_pin_02'] = 'It is not at risk';

$lang['algoritmo_pcl'] = 'Skin already has pressure injury';

$lang['en_riesgo'] = 'At risk';
  

$lang['algoritmo_piel_titulo'] = '<h3 style="color:#fff;font-size: 40px;">Pressure
				<div class="item-hints">
				  <div class="hint" data-position="4"><!-- is-hint -->
				    injury
				    <div class="hint-content do--split-children">
				      <p>An Evidence and Consensus-Based Support Surface Algorithm was developed by the WOCN Society in an effort to provide clinical guidance for selecting support surfaces based on individual patient needs for pressure injury prevention</p>
				    </div>
				  </div>
				</div>
			 risk assesment</h3>';
$lang['algoritmo_piel_bajada'] = 'Select the risk level according to the Braden Scale';
$lang['algoritmo_piel_btn_braden'] = 'See Braden Scale';

$lang['algoritmo_piel_riesgo_01'] = 'Low Risk';
$lang['algoritmo_piel_riesgo_desc_01'] = '<strong>Select if the score on the Braden Scale<br>is more than 15 points</strong>';

$lang['algoritmo_piel_riesgo_02'] = 'Medium Risk';
$lang['algoritmo_piel_riesgo_desc_02'] = '<strong>Select if the score on the Braden Scale<br>is 13 or 14 points</strong>';

$lang['algoritmo_piel_riesgo_03'] = 'High Risk';
$lang['algoritmo_piel_riesgo_desc_03'] = '<strong>Select if the score on the Braden Scale<br>is less than 12 points</strong>';

?>