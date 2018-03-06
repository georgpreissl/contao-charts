<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2005-2018 Leo Feyer
 *
 * @license LGPL-3.0+
 */


/**
 * Register the classes
 */
ClassLoader::addClasses(array
(

	// Modules
	// 'Contao\ModuleGpCharts'        => 'system/modules/gp_charts/modules/ModuleGpCharts.php',

	// Elements
	'Contao\ContentGpCharts'        => 'system/modules/gp_charts/elements/ContentGpCharts.php',

    // Models
	'Contao\GpChartsModel'  => 'system/modules/gp_charts/models/GpChartsModel.php',

	// Hooks
	// 'Contao\GpChartsHooks'  => 'system/modules/gp_charts/classes/ChartsHooks.php',

	// Widgets
	'Contao\ChartsWizard'   => 'system/modules/gp_charts/widgets/ChartsWizard.php'


));


/**
 * Register the templates
 */
TemplateLoader::addFiles(array
(
	'mod_gpcharts'           => 'system/modules/gp_charts/templates/modules',
	'j_google-charts'       => 'system/modules/gp_charts/templates'

));
