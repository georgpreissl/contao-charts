<?php

/**
 * Table tl_gpcharts
 */
$GLOBALS['TL_DCA']['tl_gpcharts'] = array
(

	// Config
	'config' => array
	(
		'dataContainer'               => 'Table',
		'enableVersioning'            => true,
		'onload_callback' => array
		(
			array('tl_gpcharts', 'loadCss')
		),
		'sql' => array
		(
			'keys' => array
			(
				'id' => 'primary'
			)
		)
	),

	// List
	'list' => array
	(
		'sorting' => array
		(
			'mode'                    => 1,
			'fields'                  => array('title'),
			'flag'                    => 1,
			'panelLayout'             => 'filter;search,limit'
		),
		'label' => array
		(
			'fields'                  => array('title','subtitle'),
			'format'                  => '%s <span style="color:#b3b3b3;padding-left:3px;">[%s]</span>'
        ),
		'global_operations' => array
		(
			'all' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['MSC']['all'],
				'href'                => 'act=select',
				'class'               => 'header_edit_all',
				'attributes'          => 'onclick="Backend.getScrollOffset()" accesskey="e"'
			)
		),
		'operations' => array
		(
			'edit' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_gpcharts']['edit'],
				'href'                => 'act=edit',
				'icon'                => 'edit.gif'
			),
			'copy' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_charts']['copy'],
				'href'                => 'act=copy',
				'icon'                => 'copy.gif'
			),
			'delete' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_charts']['delete'],
				'href'                => 'act=delete',
				'icon'                => 'delete.gif',
				'attributes'          => 'onclick="if(!confirm(\'' . $GLOBALS['TL_LANG']['MSC']['deleteConfirm'] . '\'))return false;Backend.getScrollOffset()"'
			),
			'show' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_charts']['show'],
				'href'                => 'act=show',
				'icon'                => 'show.gif'
			)
		)
	),

	// Palettes
	'palettes' => array
	(
		'__selector__'  => array('backgroundColor','chartArea', 'useSeries','vAxis','hAxis','legend'),
		'default'                     => '{title_legend},title,subtitle;'.
										 '{data_legend},data;'.
										 '{type_legend},chartType;'.
										 '{dimensions_legend},height,width;'.
										 '{chartarea_legend},chartArea;'.
										 '{lineFormatting_legend},useSeries;'.
										 '{vAxis_legend},vAxis;'.
										 '{hAxis_legend},hAxis;'.
										 '{legend_legend},legend;'.
										 '{label_legend},name_x,name_y;'.
										 '{background_legend},backgroundColor;'.
										 '{general_legend},fontSize,colors,pointShape,pointSize,lineWidth,textcolor;'
	),
	'subpalettes' => array
	(
		'backgroundColor'             => 'backgroundColor_fill,backgroundColor_stroke,backgroundColor_strokeWidth',
		'chartArea'                   => 'chartArea_left,chartArea_top,chartArea_width,chartArea_height,chartArea_backgroundColor',
		'useSeries'                   => 'series',
		'vAxis'                       => 'vAxis_textStyle_color,vAxis_gridlines_count,vAxis_format,vAxis_formatCustom,vAxis_viewWindow_min,vAxis_viewWindow_max',
		'hAxis'                       => 'hAxis_textStyle_color,hAxis_slantedText',
		// 'hAxis_textStyle'             => 'hAxis_textStyle_color',
		// 'vAxis_textStyle'             => 'vAxis_textStyle_color',
		'legend'                      => 'legend_position'
	),

	// Fields
	'fields' => array
	(
		'id' => array
		(
			'sql'                     => "int(10) unsigned NOT NULL auto_increment"
		),
		'tstamp' => array
		(
			'sql'                     => "int(10) unsigned NOT NULL default '0'"
		),
		'title' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_gpcharts']['title'],
			'exclude'                 => true,
			'search'                  => true,
			'inputType'               => 'text',
			'eval'                    => array('mandatory'=>true, 'maxlength'=>128, 'tl_class'=>'w50'),
			'sql'                     => "varchar(128) NOT NULL default ''"
		),
		'alias' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_gpcharts']['alias'],
			'exclude'                 => true,
			'search'                  => true,
			'inputType'               => 'text',
			'eval'                    => array('rgxp'=>'alias', 'unique'=>true, 'maxlength'=>128, 'tl_class'=>'w50'),
			'save_callback' => array
			(
				array('tl_gpcharts', 'generateAlias')
			),
			'sql'                     => "varchar(128) COLLATE utf8_bin NOT NULL default ''"
		),
		'subtitle' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_gpcharts']['subtitle'],
			'exclude'                 => true,
			'search'                  => true,
			'inputType'               => 'text',
			'eval'                    => array('maxlength'=>128, 'tl_class'=>'w50'),
			'sql'                     => "varchar(128) NOT NULL default ''"
		),
		'data' => array
		(
		    'label'                   => &$GLOBALS['TL_LANG']['tl_gpcharts']['data'],
		    'exclude'                 => true,
		    'inputType'               => 'tableWizard',
		    'eval'                    => array('allowHtml'=>true, 'doNotSaveEmpty'=>true, 'style'=>'width:120px;height:20px'),
		    'xlabel'                  => array
		    (
		        array('tl_gpcharts', 'tableImportWizard')
		    ),
		    'sql'                     => "mediumblob NULL"
		),
		'chartType' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_gpcharts']['chartType'],
			'filter'                  => true,
			'inputType'               => 'select',
			'default'	              => 'line',
			'eval'                    => array( 'tl_class'=>'w50'),
			'options'                 => array('line','column', 'bar', 'area','SteppedArea'),
			'reference'               => &$GLOBALS['TL_LANG']['tl_gpcharts']['chartTypes'],
			'sql'                     => "varchar(12) NOT NULL default ''"
		),
	    'useSeries' => array
	    (
	      'label'                     => &$GLOBALS['TL_LANG']['tl_gpcharts']['useSeries'],
	      'inputType'                 => 'checkbox',
	      'eval'                      => array('submitOnChange'=>true),
	      'sql'                       => "char(1) NOT NULL default ''"
		),
		'series' => array
		(
			'label'			          => &$GLOBALS['TL_LANG']['tl_gpcharts']['series'],
			'exclude' 		          => true,
			'inputType' 	          => 'multiColumnWizard',
			'default'                 => array(
				array
				(
					'visibleInLegend' => true
				)
			),
			'eval' 			          => array
			(
				'columnFields' => array
				(
					'labelInLegend' => array
					(
						'label'                 => &$GLOBALS['TL_LANG']['tl_gpcharts']['seriesValue']['labelInLegend'],
						'exclude'               => true,
						'inputType'             => 'text',
						'eval' 			        => array('style'=>'width:130px')
					),
					'visibleInLegend' => array
					(
						'label'                 => &$GLOBALS['TL_LANG']['tl_gpcharts']['seriesValue']['visibleInLegend'],
						'exclude'               => true,
						'inputType'             => 'checkbox',
						'eval'                  => array('style'=>'width:40px')
					),
					'color' => array
					(
						'label' 		        => &$GLOBALS['TL_LANG']['tl_gpcharts']['seriesValue']['color'],
						'inputType' 		    => 'text',
						'eval'                  => array('colorpicker'=>true, 'rgxp'=>6,'rgxp'=>alnum,'tl_class'=>'w50 wizard','style'=>'width:90px')
					),
					'lineWidth' => array
					(
						'label'                 => &$GLOBALS['TL_LANG']['tl_gpcharts']['seriesValue']['lineWidth'],
						'exclude'               => true,
						'inputType'             => 'text',
						'eval' 			        => array('style'=>'width:50px')
					),
					'pointShape' => array
					(
						'label'                 => &$GLOBALS['TL_LANG']['tl_gpcharts']['seriesValue']['pointShape'],
						'exclude'               => true,
						'inputType'             => 'select',
						'options'            	=> array
						(
							'circle'     => 'Kreis',
							'triangle'   => 'Dreieck',
							'square'     => 'Quadradt',
							'diamond'    => 'Diamant',
							'star'       => 'Stern',
							'polygon'   => 'Polygon'
						),
						'eval' 			=> array('style' => 'width:100px', 'includeBlankOption'=>true, 'chosen'=>true)
					),
					'pointSize' => array
					(
						'label'                 => &$GLOBALS['TL_LANG']['tl_gpcharts']['seriesValue']['pointSize'],
						'exclude'               => true,
						'inputType'             => 'text',
						'eval' 			        => array('style'=>'width:100px')
					),
				)
			),
			'sql'                     => "blob NULL"
		),
		'height' => array
		(
		    'label'                   => &$GLOBALS['TL_LANG']['tl_gpcharts']['height'],
		    'exclude'                 => true,
			'default'	              => '500',
		    'inputType'               => 'text',
		    'eval'                    => array('mandatory'=>false,'rgxp'=>digit,'tl_class'=>'w50'),
		    'sql'                     => "varchar(4) NOT NULL default ''"
		),
		'width' => array
		(
		    'label'                   => &$GLOBALS['TL_LANG']['tl_gpcharts']['width'],
		    'exclude'                 => true,
			'default'	              => '',
		    'inputType'               => 'text',
		    'eval'                    => array('mandatory'=>false,'rgxp'=>digit,'tl_class'=>'w50'),
		    'sql'                     => "varchar(4) NOT NULL default ''"
		),
	    'chartArea' => array
	    (
	      'label'                     => &$GLOBALS['TL_LANG']['tl_gpcharts']['chartArea'],
	      'inputType'                 => 'checkbox',
	      'eval'                      => array('submitOnChange'=>true),
	      'sql'                       => "char(1) NOT NULL default ''"
		),
		'chartArea_left' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_gpcharts']['chartArea_left'],
			'exclude'                 => true,
			'default'	              => '5',
			'inputType'               => 'inputUnit',
			'options'                 => array('%', 'px'),
			'eval'                    => array('maxlength'=>100,'tl_class'=>'w50'),
			'sql'                     => "varchar(255) NOT NULL default ''"
		),
		'chartArea_top' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_gpcharts']['chartArea_top'],
			'exclude'                 => true,
			'default'	              => '5',
			'inputType'               => 'inputUnit',
			'options'                 => array('%', 'px'),
			'eval'                    => array('maxlength'=>100,'tl_class'=>'w50'),
			'sql'                     => "varchar(255) NOT NULL default ''"
		),
		'chartArea_width' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_gpcharts']['chartArea_width'],
			'exclude'                 => true,
			'default'	              => '90',
			'inputType'               => 'inputUnit',
			'options'                 => array('%', 'px'),
			'eval'                    => array('maxlength'=>100,'tl_class'=>'w50'),
			'sql'                     => "varchar(255) NOT NULL default ''"
		),
		'chartArea_height' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_gpcharts']['chartArea_height'],
			'exclude'                 => true,
			'default'	              => '90',
			'inputType'               => 'inputUnit',
			'options'                 => array('%', 'px'),
			'eval'                    => array('maxlength'=>100,'tl_class'=>'w50'),
			'sql'                     => "varchar(255) NOT NULL default ''"
		),
		'chartArea_backgroundColor' => array
		(
		    'label'                 => &$GLOBALS['TL_LANG']['tl_gpcharts']['chartArea_backgroundColor'],
		    'exclude'               => true,
			'default'	            => 'ffffff',
		    'inputType'             => 'text',
		    'eval'                  => array('mandatory'=>false,'colorpicker'=>true, 'rgxp'=>6,'rgxp'=>alnum,'tl_class'=>'w50 wizard'),
		    'sql'                   => "varchar(6) NOT NULL default ''"
		),
		'vAxis' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_gpcharts']['vAxis'],
			'inputType'               => 'checkbox',
			'eval'                    => array('submitOnChange'=>true),
			'sql'                     => "char(1) NOT NULL default ''"
		),
		'vAxis_format' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_gpcharts']['vAxis_format'],
			'filter'                  => true,
			'inputType'               => 'select',
			'default'	              => 'none',
			'eval'                    => array( 'tl_class'=>'w50'),
			'options'                 => array('none','decimal', 'scientific', 'currency', 'percent','short','long'),
			'reference'               => &$GLOBALS['TL_LANG']['tl_gpcharts']['vAxis_formats'],
			'sql'                     => "varchar(12) NOT NULL default ''"
		),
		'vAxis_formatCustom' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_gpcharts']['vAxis_formatCustom'],
			'exclude'                 => true,
			'search'                  => true,
			'inputType'               => 'text',
			'eval'                    => array('maxlength'=>128, 'tl_class'=>'w50','allowHtml'=>true),
			'sql'                     => "varchar(128) NOT NULL default ''"
		),
		// 'vAxis_textStyle' => array
		// (
		// 	'label'                   => &$GLOBALS['TL_LANG']['tl_gpcharts']['vAxis_textStyle'],
		// 	'inputType'               => 'checkbox',
		// 	'default'                 => '1',
		// 	'eval'                    => array('submitOnChange'=>true,'tl_class'=>'w50'),
		// 	'sql'                     => "char(1) NOT NULL default ''"
		// ),
		'vAxis_textStyle_color' => array
		(
		    'label'                   => &$GLOBALS['TL_LANG']['tl_gpcharts']['vAxis_textStyle_color'],
		    'exclude'                 => true,
			'default'	              => '606b74',
		    'inputType'               => 'text',
		    'eval'                    => array('mandatory'=>false, 'colorpicker'=>true, 'rgxp'=>6,'rgxp'=>alnum,'tl_class'=>'w50 wizard'),
		    'sql'                     => "varchar(6) NOT NULL default ''"
		),
		'vAxis_gridlines_count' => array
		(
		    'label'                   => &$GLOBALS['TL_LANG']['tl_gpcharts']['vAxis_gridlines_count'],
		    'exclude'                 => true,
			'default'	              => '',
		    'inputType'               => 'text',
		    'eval'                    => array('mandatory'=>false,'rgxp'=>digit,'tl_class'=>'w50'),
		    'sql'                     => "varchar(4) NOT NULL default ''"
		),
		// 'vAxis_maxValue' => array
		// (
		//     'label'                   => &$GLOBALS['TL_LANG']['tl_gpcharts']['vAxis_maxValue'],
		//     'exclude'                 => true,
		// 	'default'	              => '',
		//     'inputType'               => 'text',
		//     'eval'                    => array('mandatory'=>false,'rgxp'=>digit,'tl_class'=>'w50'),
		//     'sql'                     => "varchar(255) NOT NULL default ''"
		// ),
		// 'vAxis_minValue' => array
		// (
		//     'label'                   => &$GLOBALS['TL_LANG']['tl_gpcharts']['vAxis_minValue'],
		//     'exclude'                 => true,
		// 	'default'	              => '',
		//     'inputType'               => 'text',
		//     'eval'                    => array('mandatory'=>false,'rgxp'=>digit,'tl_class'=>'w50'),
		//     'sql'                     => "varchar(255) NOT NULL default ''"
		// ),
		'vAxis_viewWindow_min' => array
		(
		    'label'                   => &$GLOBALS['TL_LANG']['tl_gpcharts']['vAxis_viewWindow_min'],
		    'exclude'                 => true,
			'default'	              => '',
		    'inputType'               => 'text',
		    'eval'                    => array('mandatory'=>false,'rgxp'=>digit,'tl_class'=>'w50'),
		    'sql'                     => "varchar(255) NOT NULL default ''"
		),
		'vAxis_viewWindow_max' => array
		(
		    'label'                   => &$GLOBALS['TL_LANG']['tl_gpcharts']['vAxis_viewWindow_max'],
		    'exclude'                 => true,
			'default'	              => '',
		    'inputType'               => 'text',
		    'eval'                    => array('mandatory'=>false,'rgxp'=>digit,'tl_class'=>'w50'),
		    'sql'                     => "varchar(255) NOT NULL default ''"
		),
		'hAxis' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_gpcharts']['hAxis'],
			'inputType'               => 'checkbox',
			'eval'                    => array('submitOnChange'=>true),
			'sql'                     => "char(1) NOT NULL default ''"
		),
	    'hAxis_slantedText' => array
	    (
			'label'                     => &$GLOBALS['TL_LANG']['tl_gpcharts']['hAxis_slantedText'],
			'inputType'                 => 'checkbox',
			'eval'                      => array('tl_class'=>'w50'),
			'sql'                       => "char(1) NOT NULL default ''"
		),
		// 'hAxis_textStyle' => array
		// (
		// 	'label'                   => &$GLOBALS['TL_LANG']['tl_gpcharts']['hAxis_textStyle'],
		// 	'inputType'               => 'checkbox',
		// 	'default'                 => '1',
		// 	'eval'                    => array('submitOnChange'=>true),
		// 	'sql'                     => "char(1) NOT NULL default ''"
		// ),
		'hAxis_textStyle_color' => array
		(
		    'label'                   => &$GLOBALS['TL_LANG']['tl_gpcharts']['hAxis_textStyle_color'],
		    'exclude'                 => true,
			'default'	              => '606b74',
		    'inputType'               => 'text',
		    'eval'                    => array('mandatory'=>false, 'colorpicker'=>true, 'rgxp'=>6,'rgxp'=>alnum,'tl_class'=>'w50 wizard'),
		    'sql'                     => "varchar(6) NOT NULL default ''"
		),
	    'legend' => array
	    (
	      'label'                     => &$GLOBALS['TL_LANG']['tl_gpcharts']['legend'],
	      'inputType'                 => 'checkbox',
	      'eval'                      => array('submitOnChange'=>true),
	      'sql'                       => "char(1) NOT NULL default ''"
		),
		'legend_position' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_gpcharts']['legend_position'],
			'filter'                  => true,
			'inputType'               => 'select',
			'default'	              => 'none',
			'eval'                    => array(),
			'options'                 => array('none','bottom', 'left', 'in', 'right','top'),
			'reference'               => &$GLOBALS['TL_LANG']['tl_gpcharts']['legend_positions'],
			'sql'                     => "varchar(12) NOT NULL default ''"
		),
		'name_x' => array
		(
		    'label'                 => &$GLOBALS['TL_LANG']['tl_gpcharts']['name_x'],
		    'exclude'               => true,
		    'inputType'             => 'text',
		    'eval'                  => array('mandatory'=>false,'tl_class'=>'w50'),
			'sql'                   => "varchar(128) NOT NULL default ''"
		),
		'name_y' => array
		(
		    'label'                 => &$GLOBALS['TL_LANG']['tl_gpcharts']['name_y'],
		    'exclude'               => true,
		    'inputType'             => 'text',
		    'eval'                  => array('mandatory'=>false,'tl_class'=>'w50'),
			'sql'                   => "varchar(128) NOT NULL default ''"
		),
		'fontSize' => array
		(
		    'label'                 => &$GLOBALS['TL_LANG']['tl_gpcharts']['fontSize'],
		    'exclude'               => true,
			'default'	            => '12',
		    'inputType'             => 'text',
		    'eval'                  => array('rgxp'=>digit,'tl_class'=>'w50'),
		    'sql'                   => "varchar(4) NOT NULL default ''"
		),
		'colors' => array
		(
		    'label'                 => &$GLOBALS['TL_LANG']['tl_gpcharts']['colors'],
		    'exclude'               => true,
			'default'	            => '606b74',
		    'inputType'             => 'text',
		    'eval'                  => array('mandatory'=>false, 'colorpicker'=>true, 'rgxp'=>6,'rgxp'=>alnum,'tl_class'=>'w50 wizard'),
		    'sql'                   => "varchar(6) NOT NULL default ''"
		),
		'backgroundColor' => array
		(
			'label'                 => &$GLOBALS['TL_LANG']['tl_gpcharts']['backgroundColor'],
			'inputType'             => 'checkbox',
			'eval'                  => array('submitOnChange'=>true),
			'sql'                   => "char(1) NOT NULL default ''"
		),
		'backgroundColor_fill' => array
		(
		    'label'                 => &$GLOBALS['TL_LANG']['tl_gpcharts']['backgroundColor_fill'],
		    'exclude'               => true,
			'default'	            => 'ffffff',
		    'inputType'             => 'text',
		    'eval'                  => array('mandatory'=>false, 'colorpicker'=>true, 'rgxp'=>6,'rgxp'=>alnum,'tl_class'=>'w50 wizard'),
		    'sql'                   => "varchar(6) NOT NULL default ''"
		),
		'backgroundColor_stroke' => array
		(
		    'label'                 => &$GLOBALS['TL_LANG']['tl_gpcharts']['backgroundColor_stroke'],
		    'exclude'               => true,
			'default'	            => 'ffffff',
		    'inputType'             => 'text',
		    'eval'                  => array('mandatory'=>false, 'colorpicker'=>true, 'rgxp'=>6,'rgxp'=>alnum,'tl_class'=>'w50 wizard'),
		    'sql'                   => "varchar(6) NOT NULL default ''"
		),
		'backgroundColor_strokeWidth' => array
		(
		    'label'                 => &$GLOBALS['TL_LANG']['tl_gpcharts']['backgroundColor_strokeWidth'],
		    'exclude'               => true,
			'default'	            => '',
		    'inputType'             => 'text',
		    'eval'                  => array('rgxp'=>digit,'tl_class'=>'w50'),
		    'sql'                   => "varchar(4) NOT NULL default ''"
		),
	    'pointShape' => array
	    (
			'label'                 => &$GLOBALS['TL_LANG']['tl_gpcharts']['pointShape'],
			'filter'                => true,
			'inputType'             => 'select',
			'eval'                  => array('tl_class'=>'w50'),
			'options'               => array('circle', 'triangle', 'square', 'diamond', 'star','polygon'),
			'reference'             => &$GLOBALS['TL_LANG']['tl_gpcharts']['pointShapes'],
			'sql'                   => "varchar(12) NOT NULL default ''"
	    ),
		'pointSize' => array
		(
		    'label'                  => &$GLOBALS['TL_LANG']['tl_gpcharts']['pointSize'],
		    'exclude'                => true,
			'default'	             => '0',
		    'inputType'              => 'text',
		    'eval'                   => array('mandatory'=>false,'rgxp'=>digit,'tl_class'=>'w50'),
		    'sql'                    => "varchar(4) NOT NULL default ''"
		),
		'lineWidth' => array
		(
		    'label'                  => &$GLOBALS['TL_LANG']['tl_gpcharts']['lineWidth'],
		    'exclude'                => true,
			'default'	             => '2',
		    'inputType'              => 'text',
		    'eval'                   => array('mandatory'=>false,'rgxp'=>digit,'tl_class'=>'w50'),
		    'sql'                    => "varchar(4) NOT NULL default ''"
		),
		// 'strokeWidth' => array
		// (
		//     'label'                  => &$GLOBALS['TL_LANG']['tl_gpcharts']['strokeWidth'],
		//     'exclude'                => true,
		// 	'default'	             => '1',
		//     'inputType'              => 'text',
		//     'eval'                   => array('mandatory'=>false,'rgxp'=>digit,'tl_class'=>'w50'),
		//     'sql'                    => "varchar(4) NOT NULL default ''"
		// ),
		// 'bg_stroke' => array
		// (
		//     'label'     => &$GLOBALS['TL_LANG']['tl_gpcharts']['bg_stroke'],
		//     'exclude'   => true,
		// 	'default'	=> 'ffffff',
		//     'inputType' => 'text',
		//     'eval'      => array('mandatory'=>false,'rgxp'=>6,'rgxp'=>alnum,'tl_class'=>'w50'),
		//     'sql'       => "varchar(6) NOT NULL default ''"
		// ),




	)
);


/**
 * Class tl_attendance_label
 *
 * Zusätzliche Methoden, um den Anwesenheitslisten individuelle Label zu geben
 *
 * @copyright  Sebastian Buck 2014
 * @author     Sebastian Buck
 * @package    Attendance
 */
class tl_gpcharts extends Backend 
{


	/**
	 * Add a link to the table items import wizard
	 *
	 * @return string
	 */
	public function loadCss()
	{
		if (TL_MODE == 'BE')
		{
 			$GLOBALS['TL_CSS'][] = 'system/modules/gp_charts/assets/css/gpcharts_backend.css';  
		}
	}	

	/**
	 * Add a link to the table items import wizard
	 *
	 * @return string
	 */
	public function tableImportWizard()
	{
		return ' <a href="' . $this->addToUrl('key=table') . '" title="' . specialchars($GLOBALS['TL_LANG']['MSC']['tw_import'][1]) . '" onclick="Backend.getScrollOffset()">' . Image::getHtml('tablewizard.gif', $GLOBALS['TL_LANG']['MSC']['tw_import'][0], 'style="vertical-align:text-bottom"') . '</a> ' . Image::getHtml('demagnify.gif', '', 'title="' . specialchars($GLOBALS['TL_LANG']['MSC']['tw_shrink']) . '" style="vertical-align:text-bottom;cursor:pointer" onclick="Backend.tableWizardResize(0.9)"') . Image::getHtml('magnify.gif', '', 'title="' . specialchars($GLOBALS['TL_LANG']['MSC']['tw_expand']) . '" style="vertical-align:text-bottom; cursor:pointer" onclick="Backend.tableWizardResize(1.1)"');
	}


    /**
     * Auto-generate the FAQ alias if it has not been set yet
     *
     * @param mixed         $varValue
     * @param DataContainer $dc
     *
     * @return mixed
     *
     * @throws Exception
     */
    public function generateAlias($varValue, DataContainer $dc)
    {
        $autoAlias = false;

        // Generate alias if there is none
        if ($varValue == '')
        {
            $autoAlias = true;
            $varValue = StringUtil::generateAlias($dc->activeRecord->title);
        }

        $objAlias = $this->Database->prepare("SELECT id FROM tl_gpcharts WHERE alias=?")
                                   ->execute($varValue);

        // Check whether the news alias exists
        if ($objAlias->numRows > 1 && !$autoAlias)
        {
            throw new Exception(sprintf($GLOBALS['TL_LANG']['ERR']['aliasExists'], $varValue));
        }

        // Add ID to alias
        if ($objAlias->numRows && $autoAlias)
        {
            $varValue .= '-' . $dc->id;
        }

        return $varValue;
    }












}




