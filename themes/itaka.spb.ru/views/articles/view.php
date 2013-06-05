<? $page = $this->view->page; ?>
<div id="main">
	<div id="page_title_line">
		<h1><?=$page->name ?></h1>
	</div>
	<div id="content_news" style="padding-left:0">
		<div class="article_block">
			<div class="article_text">
				<?=$page->content ?>
			</div>
		</div>
	</div>
</div>
