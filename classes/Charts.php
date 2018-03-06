<?php

/**
 *
 * Copyright (c) 2015 gfg-development
 *
 * @link    http://www.gfg-development.de
 * @license http://www.gnu.org/licenses/lgpl-3.0.html LGPL
 */

class Charts
{
	private $m_lists = array();

	/**
	 * Create the Link from the information
	 */

	private function getLinks($data)
	{
		$links = array();
		foreach($data as $key => $d)
		{
			for($i = 0; $i < count($d); $i++)
			{
				if($d[$i]['linksource'] == 'local')											// 'external' = external, '' = external, 'local' = local, 'page' = local page
				{
					$file = FilesModel::findById($d[$i]['file']);
					$d[$i]['url'] = Environment::get('base') . $file->path;
				}
				elseif($d[$i]['linksource'] == 'page')
				{
					$page = PageModel::findPublishedById($d[$i]['page']);
					if($page != NULL)
					{
						//$d[$i]['url'] = $page->getFrontendUrl();     // Only since 3.2.0 beta 2
						$d[$i]['url'] = \Controller::generateFrontendUrl($page->row());
					}
					else
					{
						$d[$i]['url'] = '';
					}
				}
				if(!empty($d[$i]['target']))
				{
					$d[$i]['target'] = ($d[$i]['target'] == "self") ? False : True;
				}
				else
				{
					$d[$i]['target'] = ($this->m_lists[$d[$i]['pid']] == 0) ? False : True;
				}
			}
			$links[$key] = $d;
		}
		return $links;
	}

	/**
	 * Gets the information for the template
	 */
	function getVars($lists, $sorting, $use_subtitles)
	{
			$template = array();
			/** @var \Contao\Database\Result $rs */
			$rs = Database::getInstance()->query("SELECT id,target FROM tl_linkslist_list");
			$linkslists = $rs->fetchAllAssoc();
			for($i = 0; $i<count($linkslists); $i++)
			{
				$this->m_lists[$linkslists[$i]['id']] = $linkslists[$i]['target'];
			}

            //$moduleParams = Database::getInstance()->prepare("SELECT * FROM tl_module WHERE id=?")
            //        ->limit(1)
            //        ->execute($id);
            //$lists = unserialize($moduleParams->linkslist_id);
            $where = 'WHERE ';
            $order = '';

            switch($sorting)//$moduleParams->linkslist_sorting)
            {
                case 'A':
                    $order = 'name';
                    break;
                case 'B':
                    $order = 'url';
                    break;
                case 'C':
                    $order = 'tstamp DESC';
                    break;
                case 'D':
                    $order = 'tstamp';
                    break;
                default:
                    $order = 'name';
            }

            if($use_subtitles == 0)
            {
                $first = true;
                foreach($lists as $listId)
                {
                    if(!$first)
                    {
                        $where .= ' OR ';
                    }
                    $where .= 'pid = '.$listId;
                    $first = false;
                }

                $sql = 'SELECT * FROM tl_linkslist_link '.$where.' ORDER BY '.$order;
                /** @var \Contao\Database\Result $rs */
                $rs = Database::getInstance()
                    ->query($sql);
                $data[''] = $rs->fetchAllAssoc();
                $template['data'] = $this->getLinks($data);
                $template['subtitles'] = false;
            }
            else
            {
                $links = array();
                foreach($lists as $listId)
                {
                    $rs = Database::getInstance()
                        ->query('SELECT * FROM tl_linkslist_link WHERE pid = '.$listId.' ORDER BY '.$order);
                    $data = $rs->fetchAllAssoc();

                    $listParams = Database::getInstance()->prepare("SELECT * FROM tl_linkslist_list WHERE id=?")
                        ->limit(1)
                        ->execute($listId);
                    $links[$listParams->name] = $data;
                }
                $template['data'] = $this->getLinks($links);
                $template['subtitles'] = true;
            }
			return $template;
	}
}

?>
