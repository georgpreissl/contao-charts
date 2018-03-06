<?php

namespace Contao;

/**
 * Class GpChart
 *
 * Front end module "cd list".
 */
class ContentGpCharts extends \ContentElement
{

	/**
	 * Template
	 * @var string
	 */
	protected $strTemplate = 'mod_gpcharts';


	/**
	 * Display a wildcard in the back end
	 * @return string
	 */
	public function generate()
	{
		$this->chart = \GpChartsModel::findByPk($this->chartId);

		// Return if no charts were found
		if ($this->chart === null)
		{
			return;
		}


		if (TL_MODE == 'BE')
		{
			// dump($this);
			$objTemplate = new \BackendTemplate('be_wildcard');

			$objTemplate->wildcard = '### ' . utf8_strtoupper($GLOBALS['TL_LANG']['FMD']['gpcharts']) . ' ###';
			$objTemplate->title = $this->chart->title;
			$objTemplate->id = $this->id;
			$objTemplate->link = $this->name;
			$objTemplate->href = 'contao/main.php?do=themes&amp;table=tl_module&amp;act=edit&amp;id=' . $this->id;

			return $objTemplate->parse();
		}

		return parent::generate();
	}


	/**
	 * Generate the module
	 */
	protected function compile()
	{


		$props = array(
			// 'title' => array(
			// 	'default' => '',
			// 	'type' => 'string'
			// ),
			'width' => array(
				'default' => '',
				'type' => 'number'
			),
			'height' => array(
				'default' => 0,
				'type' => 'number'
			),
			'colors' => array(
				'default' => '000000',
				'type' => 'array'
			),
			'fontSize' => array(
				'default' => 12,
				'type' => 'number'
			),
			'lineWidth' => array(
				'default' => 2,
				'type' => 'number'
			),
			'series' => array(
				'default' => '',
				'type' => 'number'
			),
			'pointShape' => array(
				'default' => 'circle',
				'type' => 'string'
			),		
			'pointSize' => array(
				'default' => 0,
				'type' => 'number'
			),		
			'backgroundColor' => array(
				'default' => '',
				'type' => 'string',
				'data' => array(
					'backgroundColor_fill' => array(
						'default' => 'ffffff',
						'type' => 'string'
					),
					'backgroundColor_stroke' => array(
						'default' => '',
						'type' => 'string'
					),
					'backgroundColor_strokeWidth' => array(
						'default' => '',
						'type' => 'number'
					)

				)
			),	
			'chartArea' => array(
				'default' => '',
				'type' => 'string',
				'data' => array(
					'chartArea_left' => array(
						'default' => '',
						'type' => 'string'
					),
					'chartArea_top' => array(
						'default' => '',
						'type' => 'string'
					),		
					'chartArea_width' => array(
						'default' => '',
						'type' => 'string'
					),
					'chartArea_height' => array(
						'default' => '',
						'type' => 'string'
					),
					'chartArea_backgroundColor' => array(
						'default' => '',
						'type' => 'string'
					)
				)
			),
			'vAxis' => array(
				'default' => '',
				'type' => 'string',
				'data' => array(
					'vAxis_format' => array(
						'default' => '',
						'type' => 'string'
					),
					'vAxis_textStyle' => array(
						'default' => '',
						'type' => 'string',					
						'data' => array(
							'vAxis_textStyle_color' => array(
								'name' => 'color',
								'default' => '',
								'type' => 'string'
							)
						)
					),
					'vAxis_gridlines' => array(
						'default' => '',
						'type' => 'string',					
						'data' => array(
							'vAxis_gridlines_count' => array(
								'name' => 'count',
								'default' => '',
								'type' => 'number'
							)
						)
					),
					'vAxis_viewWindow' => array(
						'default' => '',
						'type' => 'string',					
						'data' => array(
							'vAxis_viewWindow_min' => array(
								'default' => '',
								'type' => 'number'
							),
							'vAxis_viewWindow_max' => array(
								'default' => '',
								'type' => 'number'
							)
						)
					),
					'vAxis_minValue' => array(
						'default' => '',
						'type' => 'number'
					),
					'vAxis_maxValue' => array(
						'default' => '',
						'type' => 'number'
					)
				)
			),
			'hAxis' => array(
				'default' => '',
				'type' => 'string',
				'data' => array(
					'hAxis_slantedText' => array(
						'default' => '',
						'type' => 'string'
					),
					'hAxis_textStyle' => array(
						'default' => '',
						'type' => 'string',					
						'data' => array(
							'hAxis_textStyle_color' => array(
								'default' => '',
								'type' => 'string'
							)
						)
					)
				)
			),
			'legend' => array(
				'default' => '',
				'type' => 'string',
				'data' => array(
					'legend_position' => array(
						'default' => '',
						'type' => 'string'
					)
				)
			)			
		);










		// Prepare the data string

		$arrRows = deserialize($this->chart->data);

		$this->chart->cols = count($arrRows[0]);

		$data = '[';
		for ($i=0; $i < count($arrRows); $i++) {
			$cols = $arrRows[$i];

			
			$rowStr = '[';

			for ($z=0; $z < count($cols); $z++) {


				// $bv = $arrRows[$i][1];
				$bv = $cols[$z];
				$bv = str_replace(".", "", $bv);
				$bv = str_replace(",", ".", $bv);

				if ($z==0) {
					$rowStr .= "'".$bv."',";
				} else {
					$rowStr .= $bv.",";
				}
			}
			$rowStr = substr($rowStr, 0, -1);
			$rowStr .= '],';

			$data .= $rowStr;
		}
		$data = substr($data, 0, -1);
		$data .= ']';

// printf('<pre>%s</pre>', print_r($data,true));

		$this->chart->data = $data;




		if ($this->chart->chartArea == 1)
		{
			$this->chart->chartArea_left = $this->checkAreaValue($this->chart->chartArea_left,'10%');
			$this->chart->chartArea_top = $this->checkAreaValue($this->chart->chartArea_top,'10%');
			$this->chart->chartArea_width = $this->checkAreaValue($this->chart->chartArea_width,'90%');
			$this->chart->chartArea_height = $this->checkAreaValue($this->chart->chartArea_height,'90%');
		}

		if($this->chart->vAxis_formatCustom != '')
		{
			$this->chart->vAxis_format = $this->chart->vAxis_formatCustom;
		}

		if($this->chart->vAxis_gridlines_count != '')
		{
			$this->chart->vAxis_gridlines = '1';
		}

		if($this->chart->vAxis_viewWindow_min != '' || $this->chart->vAxis_viewWindow_max != '')
		{
			$this->chart->vAxis_viewWindow = '1';
		}

		if($this->chart->vAxis_textStyle_color != '606b74')
		{
			$this->chart->vAxis_textStyle = '1';
		}
		if($this->chart->hAxis_textStyle_color != '606b74')
		{
			$this->chart->hAxis_textStyle = '1';
		}



		$options = $this->collectProps($props,$this->chart,array());





		// Prepare the individual line formatting

		$arrSeries = deserialize($this->chart->series);
		$arrSeriesUsed = array();

		for ($i=0; $i < count($arrSeries) ; $i++) {


			$arrLine = array();
			$arrCol = $arrSeries[$i];

			$lineWidth = $arrCol['lineWidth'];
			$labelInLegend = $arrCol['labelInLegend'];
			$pointShape = $arrCol['pointShape'];
			$pointSize = $arrCol['pointSize'];
			$visibleInLegend = $arrCol['visibleInLegend'];
			$lnColor = $arrCol['color'];

			$lineWidthDef = $this->chart->lineWidth == '' ? '2' : $this->chart->lineWidth;
			$lineWidth = $lineWidth == '' ? $lineWidthDef : $lineWidth;

			if ($pointShape != '')
			{
				$arrLine['pointShape'] = $pointShape;
			}

			if ($pointSize != '')
			{
				$arrLine['pointSize'] = $pointSize;
			}

			if ($labelInLegend != '')
			{
				$arrLine['labelInLegend'] = $labelInLegend;
			}

			if ($visibleInLegend == '')
			{
				$arrLine['visibleInLegend'] = 'false';
			}

			if ($lnColor != '')
			{
				$arrLine['color'] = $lnColor;
			}
			if ($lineWidth != '')
			{
				$arrLine['lineWidth'] = $lineWidth;
			}
			$arrSeriesUsed[$i] = $arrLine;

		}

		$this->chart->series = $arrSeries;		
		$options['series'] = $arrSeriesUsed;

		$this->chart->options = $options;


	// printf('<pre>%s</pre>', print_r($this->chart,true));	


		$this->Template->chart = $this->chart;
	}




	public function collectProps($arr,$chart,$arrReturn)
	{
		foreach ($arr as $key => $value) 
		{
			$default = $arr[$key]['default'];
			$chartVal = $chart->$key;

			if($chartVal != $default) 
			{
				if ($arr[$key]['data']) 
				{
					$arrNew = $arr[$key]['data'];
					// var_dump($arrNew);
					$chartVal = $this->collectProps($arrNew,$chart,array());
				}
				$arrProp = explode('_',$key);
				$strProp = $arrProp[count($arrProp)-1];
				$arrReturn[$strProp] = $chartVal;
			};
		};
		return $arrReturn;
	}






	public function checkAreaValue($v,$default)
	{
		$arrV = deserialize($v);
		// var_dump($arrV);
		if ($arrV != NULL) {
			if ($arrV['value'] != '') {
				$unit = $arrV['unit'] == '%' ? $arrV['unit'] : '';
				$strR = $arrV['value'] . $unit;
			} else {
				$strR = '';
			}
		} else {
			$strR = $default;
		}
		return $strR;
	}
	
}