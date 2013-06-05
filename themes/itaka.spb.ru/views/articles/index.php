<?php
/* @var $this Controller */
$view = $this->view;
$bu = Yii::app()->request->baseUrl;
?>
<div id="main">
	<div id="page_title_line"><div id="news_main_title"><h1>Статьи</h1></div></div>
	<div id="content_news" style="padding-left:0;">
		<div id="line_month">
			<select name="dropdown" class="dropdown" onchange="location.href='<?= $bu ?>/articles/?year=' + $(this).val();">
				<? for($y = date('Y'); $y >= 2013; $y--): ?>
				<option value="<?=$y?>" <?if($y == $this->view->year):?>selected="selected"<? endif; ?>><?=$y?></option>
				<? endfor; ?>
			</select>
			<ul class="month">
				<? foreach(array('Январь','Февраль','Март','Апрель','Май',
					'Июнь','Июль','Август','Сентябрь','Октябрь','Ноябрь','Декабрь') as $k => $m): ?>
				<li><a <?if($k+1 == $this->view->month):?>class="current"<? endif; ?>
				       href="<?= $bu ?>/articles/?year=<?=$this->view->year?>&month=<?=$k+1?>"><?=$m?></a></li>
				<? endforeach; ?>
			</ul>
		</div>
		<div class="panel">
			<div style="display:block">
				<? if($this->view->list): ?>
				<? foreach($this->view->list as $k => $i): ?>
				<div class="news_entry">
					<div class="subentry">
						<div class="entry_date" style="clear:both"><?=date('d.m.Y', strtotime($i->getDt()))?></div>
						<? $preview = $i->getPreview(); if($preview): ?>
						<div class="entry_img">
                            <?= CHtml::link(CHtml::image($bu.$preview['url'], $i->name), $i->url()) ?>
						</div>
						<? endif; ?>
						<div class="entry_text">
							<a href="<?=$i->url()?>" class="title_link"><?=$i->getName()?></a>
							<?=$i->getAnn()?>
						</div>
					</div>
				</div>
					<? if($k+1 != count($this->view->list)): ?><div class="separator_line"></div><? endif; ?>
				<? endforeach; ?>
				<? else: ?>
					<div style="margin:20px 5px;">Новостей с этом месяце не найдено.</div>
				<? endif; ?>
			</div>
		</div>
	</div>
</div>
