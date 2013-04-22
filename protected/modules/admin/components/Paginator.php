<?php

class Paginator
{
	const NUM_LINKS = 2;

	public function init($count_rows = 0, $per_page = 20, $cur_page = 1, $url = '', $ajaxShowBlock = false)
	{
		$num_links = self::NUM_LINKS;

		if ($count_rows == 0 || $per_page == 0) {
			return '';
		}

		$num_pages = ceil($count_rows / $per_page);

		if ($num_pages == 1) {
			return '';
		}

		if (!is_numeric($cur_page)) {
			$cur_page = 0;
		}

		$uri_page_number = $cur_page;

		$start = (($cur_page - $num_links) > 0) ? $cur_page - ($num_links - 1) : 1;
		$end   = (($cur_page + $num_links) < $num_pages) ? $cur_page + $num_links : $num_pages;

		$output = '<div class="button-group">';

		if  ($cur_page > ($num_links + 1)) {
			if ($ajaxShowBlock) {
				$output .= ' ';
			} else {
				$output .= '<a href="'.$this->getUrl($url, 1).'" title="Первая страница" class="button blue-gradient glossy"><span class="icon-previous"></span></a>';
			}
		}

		if  ($cur_page != 1) {
			if ($ajaxShowBlock) {
				$output .= ' <a class="previous" showblock="'.$ajaxShowBlock.'" href="#" url="'.$this->getUrl($url, $cur_page - 1).'" dojoType="wb.Paginator.Link"></a> ';
			} else {
				$output .= '<a href="'.$this->getUrl($url, $cur_page - 1).'" title="Предыдущая страница" class="button blue-gradient glossy"><span class="icon-backward"></span></a>';
			}
		}

		$output .= '</div><div class="button-group">';

		for ($loop = $start -1; $loop <= $end; $loop++)
		{
			$i = ($loop * $per_page) - $per_page;

			if ($i >= 0) {
				if ($cur_page == $loop) {
					$output .= '<a href="#" title="Страница '.$loop.'" class="button blue-gradient glossy active">'.$loop.'</a>';
				} else {
					$n = ($i == 0) ? '' : $i;
					if ($ajaxShowBlock) {
						$output .= '<li><a showblock="'.$ajaxShowBlock.'" href="#" url="'.$this->getUrl($url, $loop).'" dojoType="wb.Paginator.Link" page="'.$loop.'"></a></li>';
					} else {
						$output .= '<a href="'.$this->getUrl($url, $loop).'" title="Страница '.$loop.'" class="button blue-gradient glossy">'.$loop.'</a>';
					}
				}
			}
		}
		$output .= '</div><div class="button-group">';

		if ($cur_page < $num_pages) {
			if ($ajaxShowBlock) {
				$output .= ' <a class="next" showblock="'.$ajaxShowBlock.'" href="#" url="'.$this->getUrl($url, $cur_page + 1).'" dojoType="wb.Paginator.Link"></a> ';
			} else {
				$output .= '<a href="'.$this->getUrl($url, $cur_page + 1).'" title="Следующая страница" class="button blue-gradient glossy"><span class="icon-forward"></span></a>';
			}
		}

		if (($cur_page + $num_links) < $num_pages) {
			$i = $num_pages;
			if ($ajaxShowBlock) {
				$output .= ' ';
			} else {
				$output .= '<a href="'.$this->getUrl($url, $i).'" title="Последняя страница" class="button blue-gradient glossy"><span class="icon-next"></span></a>';
			}
		}

		$output = preg_replace("#([^:])//+#", "\\1/", $output);

		return $output . '</div>';
	}

	protected function getUrl($url, $page)
	{
		return strtr($url, array('#' => $page, '_PAGE_' => $page));
	}
}