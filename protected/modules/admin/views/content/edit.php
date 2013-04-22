<script type="text/javascript">
	var MODEL_NAME = '<?=$this->view->MODEL_NAME?>';
	var ROW_ID = <?=(int)@$this->view->id?>;
</script>


<hgroup id="main-title" class="thin">
	<h1><?=$this->view->tableName?> (<?=strToUpper($this->view->idField)?>:&nbsp;<?=$this->view->id?>)</h1>
</hgroup>

<div class="margin-left margin-top margin-bottom">
	<a href="<?=$this->view->backUrl?>" class="button tiny icon-backward">Back</a>
</div>

<div class="with-padding">

	<form id="editForm" method="post" action="/admin/content/save/model/<?=$this->view->MODEL_NAME?>/id/<?=(int)@$this->view->id?>">
		<? foreach ($this->view->fields as $key => $field): ?>
			<? if ($field['type'] != 'order'): ?>
				<p><?=$field['name']?></p>
				<?=$this->view->editBlocks[$key]?>
			<? endif; ?>
		<? endforeach; ?>

		<p class="large-margin-top">
			<a href="javascript://" class="button blue-gradient glossy" onclick="$('#editForm').submit()">Сохранить</a>
		</p>
	</form>

</div>

<div class="margin-left margin-top margin-bottom">
	<a href="<?=$this->view->backUrl?>" class="button tiny icon-backward">Back</a>
</div>