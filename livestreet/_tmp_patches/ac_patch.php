
// Состряпано очень быстро и не вкрай не аккуратно

// in LoadPluginConfig() , 244


			// --- start MOD ---
			$aConfig = array();
			$aLang = array();
			foreach($aSettings as $oSet) {
				$aConfig [$oSet->getVariableKey()] = array(
					'type' => $oSet->getVariableType(),
					'name' => 'config_parameters.' . $oSet->getVariableKey() . '.name',
					'description' => 'config_parameters.' . $oSet->getVariableKey() . '.description',
					'validator' => array(
						'type' => ucfirst($oSet->getVariableType()),
						'params' => array(),
					)
				);
				$aKeys=explode('.', $oSet->getVariableKey());
				$sEval = '$aLang';
				foreach($aKeys as $sK) {
					$sEval .= '[' . var_export((string) $sK, true) . ']';
				}
				
				$aLangTmpData = array(
					'name' => nl2br($oSet->getCommentAfter()),
					'description' => nl2br($oSet->getCommentBefore()),
				);
				$sEval .= '=$aLangTmpData;';
				eval($sEval);
			}
			//print_r($aLang);
			
			$sConfigData = var_export($aConfig, true);
			$sLangData = var_export($aLang, true);
			// do better look
			$sConfigData = preg_replace('#\s*+=>\s*+array\s*+\(#iuU', ' => array(', $sConfigData);
			$sLangData = preg_replace('#\s*+=>\s*+array\s*+\(#iuU', ' => array(', $sLangData);
			
			$sConfigData = '<?php
/*
 * Описание настроек
 */
$config [\'$config_scheme$\'] = ' . $sConfigData . ';

?>';

			$sLangData = '
/*
 *	Описание каждого параметра конфига для отображения в админке
 */
\'config_parameters\' => ' . $sLangData . ',';
			
			if (!file_exists(Config::Get('path.root.server').'/../ac_export/info/')) {
				mkdir(Config::Get('path.root.server').'/../ac_export/info/', 0777, true);
			}
			// files
			file_put_contents(Config::Get('path.root.server').'/../ac_export/config_scheme.php', $sConfigData);
			file_put_contents(Config::Get('path.root.server').'/../ac_export/lang_ru_scheme_texts.php', $sLangData);
			// helpers
			file_put_contents(Config::Get('path.root.server').'/../ac_export/info/config_main_keys.php', print_r(array_keys($aConfig), true));
			file_put_contents(Config::Get('path.root.server').'/../ac_export/info/lang_main_keys.php', print_r(array_keys($aLang), true));
			
			die('---done');
			// --- /finish MOD ---