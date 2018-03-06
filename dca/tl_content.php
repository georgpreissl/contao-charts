<?php

/**
 * Contao Open Source CMS
 * Copyright (C) 2005-2011 Leo Feyer
 *
 * Formerly known as TYPOlight Open Source CMS.
 *
 * This program is free software: you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation, either
 * version 3 of the License, or (at your option) any later version.
 * 
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU
 * Lesser General Public License for more details.
 * 
 * You should have received a copy of the GNU Lesser General Public
 * License along with this program. If not, please visit the Free
 * Software Foundation website at <http://www.gnu.org/licenses/>.
 *
 * PHP version 5
 * @copyright  2012 
 * @author     Julian Haslinger  (www.gameplayern.de , info@gameplayern.de)
 * @package    Diagramm 
 * @license    GNU 
 * @filesource
 */

// $GLOBALS['TL_DCA']['tl_content']['palettes']['Diagramm']='type,headline;{Diagramm Höhe und Breite},diagramm_height,diagramm_width;{Diagramm benennung},diagramm_name_x,diagramm_name_y;{Diagramm Einstellungen},line_color,bg_color,diagramm_textcolor,line_index,diagramm_data;{expert_legend:hide},invisible,cssID';



$GLOBALS['TL_DCA']['tl_content']['palettes']['gpcharts']='{type_legend},type,chartId;{expert_legend:hide},guests,cssID,space;';

//{protected_legend:hide},protected;{expert_legend:hide},guests,cssID,space;{invisible_legend:hide},invisible,start,stop



$GLOBALS['TL_DCA']['tl_content']['fields']['chartId'] = array
(
    'label'                   => &$GLOBALS['TL_LANG']['tl_content']['chartId'],
    'exclude'                 => true,
    'inputType'               => 'select',
    'options_callback'        => array('tl_content_gpcharts', 'getCharts'),
    'eval'                    => array('mandatory'=>true, 'chosen'=>true, 'submitOnChange'=>true),
    'wizard' => array
    (
        array('tl_content_gpcharts', 'editChart')
    ),
    'sql'                     => "int(10) unsigned NOT NULL default '0'"
);



class tl_content_gpcharts extends Backend 
{


    /**
     * Get all charts and return them as array
     *
     * @return array
     */
    public function getCharts()
    {
        // if (!$this->User->isAdmin && !is_array($this->User->forms))
        // {
        //  return array();
        // }

        $arrCharts = array();
        $objCharts = $this->Database->execute("SELECT id, title FROM tl_gpcharts ORDER BY title");

        while ($objCharts->next())
        {
            // if ($this->User->hasAccess($objCharts->id, 'forms'))
            // {
                $arrCharts[$objCharts->id] = $objCharts->title . ' (ID ' . $objCharts->id . ')';
            // }
        }

        return $arrCharts;
    }


    /**
     * Return the edit form wizard
     *
     * @param DataContainer $dc
     *
     * @return string
     */
    public function editChart(DataContainer $dc)
    {
        return ($dc->value < 1) ? '' : ' <a href="contao/main.php?do=gp_charts&amp;table=tl_gpcharts&amp;id=' . $dc->value . '&amp;popup=1&amp;nb=1&amp;rt=' . REQUEST_TOKEN . '" title="' . sprintf(specialchars($GLOBALS['TL_LANG']['tl_content']['editalias'][1]), $dc->value) . '" style="padding-left:3px" onclick="Backend.openModalIframe({\'width\':768,\'title\':\'' . specialchars(str_replace("'", "\\'", sprintf($GLOBALS['TL_LANG']['tl_content']['editalias'][1], $dc->value))) . '\',\'url\':this.href});return false">' . Image::getHtml('alias.gif', $GLOBALS['TL_LANG']['tl_content']['editalias'][0], 'style="vertical-align:top"') . '</a>';
    }



}







?>