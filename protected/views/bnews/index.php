<?php /* @var $this Controller */ $view = $this->view; ?>
<div id="main">
	<div id="page_title_line"><div id="news_main_title"><h1>Новости</h1></div><a class="rss" href="/bnews/rss"></a></div>
	<ul id="left_side_bar" class="side_bar_style">
		<? foreach($this->view->branches as $i): ?>
		<li><a <? if($this->view->branch == $i->id): ?>class="current"<?endif;?> href="/bnews/?branch=<?=$i->id?>"><?=$i->getName() ?></a></li>
		<? endforeach; ?>
	</ul>
	<div id="content_news">
		<div id="line_month">
			<select name="dropdown" class="dropdown" onchange="location.href='/bnews/?<?=($this->view->branch ? 'branch='.$this->view->branch.'&':'')?>year=' + $(this).val();">
				<? for($y = date('Y'); $y >= 2013; $y--): ?>
				<option value="<?=$y?>" <?if($y == $this->view->year):?>selected="selected"<? endif; ?>><?=$y?></option>
				<? endfor; ?>
			</select>
			<ul class="month">
				<? foreach(array('Январь','Февраль','Март','Апрель','Май',
					'Июнь','Июль','Август','Сентябрь','Октябрь','Ноябрь','Декабрь') as $k => $m): ?>
				<li><a <?if($k+1 == $this->view->month):?>class="current"<? endif; ?>
				       href="/bnews/?<?=($this->view->branch ? 'branch='.$this->view->branch.'&':'')?>year=<?=$this->view->year?>&month=<?=$k+1?>"><?=$m?></a></li>
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
							<a href="<?=$i->url()?>">
								<img src="<?=$preview['url']?>" alt="<?=$i->getName()?>">
							</a>
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
