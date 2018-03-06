<?php

namespace Contao;

/**
 * Class GpChart
 *
 * Front end module "cd list".
 */
class ModuleCharts extends \Module
{

	/**
	 * Template
	 * @var string
	 */
	protected $strTemplate = 'mod_gpchart';


	/**
	 * Display a wildcard in the back end
	 * @return string
	 */
	public function generate()
	{
		if (TL_MODE == 'BE')
		{
			// dump($this);
			$objTemplate = new \BackendTemplate('be_wildcard');

			$objTemplate->wildcard = '### ' . utf8_strtoupper($GLOBALS['TL_LANG']['FMD']['chart']) . ' ###';
			$objTemplate->title = $this->title;
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

		// dump($this->chartId);
		$objChart = \ModelGpCharts::findByPk($this->chartId);

// dump($objChart);


		$rows = deserialize($objChart->diagramm_data);
		// $rows = array_reverse($rows);
		// dump($rows);
		// dump($this->line_index);

		$data = '';
		for ($i=0; $i < count($rows); $i++) { 
			$data .= "['".$rows[$i][0]."',".$rows[$i][1]."],";
		}
		$data = substr($data, 0, -1);


		// Return if no CDs were found
		if ($objChart === null)
		{
			return;
		}

		// dump($objChart);
		
		$arrChart = array
		(
			'id' => $objChart->id,
			'title' => $objChart->title,
			'subtitle' =>$objChart->subtitle,
			'diagramm_height' => $objChart->diagramm_height,
			'diagramm_width' => $objChart->diagramm_width,
			'diagramm_name_x' => $objChart->diagramm_name_x,
			'diagramm_name_y' => $objChart->diagramm_name_y,
			'diagramm_data' => $data,
			'diagramm_textcolor' => $objChart->diagramm_textcolor,
			'line_color' => $objChart->line_color,
			'bg_color' => $objChart->bg_color,
			'strokeWidth' => $objChart->strokeWidth,
			'bg_stroke' => $objChart->bg_stroke,
			'cssID' =>  $this->cssID
		);
		

		$this->Template->chart = $arrChart;
	}



	
}