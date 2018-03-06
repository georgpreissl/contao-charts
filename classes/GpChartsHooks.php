<?php

/**
 * Grid Extension for Contao
 *
 * Copyright (c) 2017 Georg Preissl
 *
 * @package gp_grix
 * @link    http://www.georg-preissl.at
 * @license http://opensource.org/licenses/MIT MIT
 */

/**
 * Namespace
 */
namespace Contao;

class GpChartsHooks extends \Backend {





	// Add a CSS file to the options
	public function addGoogleCharts($strName)
	{
		// dump($GLOBALS['TL_DCA']['tl_layout']['fields']['script']);
	    if ($strName == 'tl_layout')
	    {
	      // array_push($GLOBALS['TL_DCA']['tl_layout']['fields']['script']['options'], 'https://www.gstatic.com/charts/loader.js');
	      // array_push($GLOBALS['TL_DCA']['tl_layout']['fields']['script']['options'], '../../../system/modules/gp_charts/assets/js/loader.js');
	    }
	}





}