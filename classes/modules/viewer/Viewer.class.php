<?php
/**
 * LiveStreet CMS
 * Copyright © 2013 OOO "ЛС-СОФТ"
 *
 * ------------------------------------------------------
 *
 * Official site: www.livestreetcms.com
 * Contact e-mail: office@livestreetcms.com
 *
 * GNU General Public License, version 2:
 * http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 *
 * ------------------------------------------------------
 *
 * @link http://www.livestreetcms.com
 * @copyright 2013 OOO "ЛС-СОФТ"
 * @author Serge Pustovit (PSNet) <light.feel@gmail.com>
 *
 */
/*
 * 
 * Расширение возможностей вьюера
 * 
 */

class PluginAdmin_ModuleViewer extends PluginAdmin_Inherit_ModuleViewer
{

    /**
     * Добавить директорию с плагинами для Smarty
     *
     * @param $sDir        директория
     * @return bool
     */
    public function AddSmartyPluginsDir($sDir)
    {
        if (!is_dir($sDir)) {
            return false;
        }
        $this->oSmarty->addPluginsDir($sDir);
        return true;
    }
    
    public function SetSeoTags($aReplace) {
        echo Config::Get('plugin.admin.seo.title');
        $this->SetHtmlTitle( $this->ReplaceKeys(Config::Get('plugin.admin.seo.title'), $aReplace) );
        $this->Assign("sHtmlTitleH1", $this->ReplaceKeys(Config::Get('plugin.admin.seo.h1'), $aReplace) );
        $this->SetHtmlKeywords(  $this->ReplaceKeys(Config::Get('plugin.admin.seo.keywords'), $aReplace) );
        $this->SetHtmlDescription( $this->ReplaceKeys(Config::Get('plugin.admin.seo.description'), $aReplace) );
    }
    
    protected function ReplaceKeys($sText, $aReplace) {
        
        
        if (is_array($aReplace) && count($aReplace) && is_string($sText)) {
            foreach ($aReplace as $sFrom => $sTo) {
                $aReplacePairs['{$' . $sFrom .'}'] = $sTo;
            }
            $sText = strtr($sText, $aReplacePairs);
        }
        
        return $sText;
    }

}