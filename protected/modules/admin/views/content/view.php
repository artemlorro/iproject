<hgroup id="main-title" class="thin">
	<h1><?=$this->view->tableName?></h1>
</hgroup>

<div class="with-padding">

	<div class="table-header button-height">
		<div class="float-right">

			<div class="float-left">
				<? if($this->view->searchBlocks): ?>
					<form id="searchForm" method="get" action="?">
						<? if ($this->view->searchBlocks): ?>
							<? foreach($this->view->searchBlocks as $key => $block): ?>
								<div class="float-left margin-left">
									<?=$this->view->fields[$key]['name']?>: <?=str_replace('large', '', $block)?>
								</div>
							<? endforeach; ?>
							<div class="float-left margin-left">
								<a href="javascript://" class="button blue-gradient glossy" onclick="$('#searchForm').submit()">Найти</a>
							</div>
						<? endif; ?>
					</form>
				<? endif; ?>
			</div>

			<?=$this->view->paginator ?>
		</div>

		<a href="/admin/content/edit/model/<?=$this->view->MODEL_NAME?>/" class="button icon-star blue-gradient glossy margin-right">Создать</a>
	</div>


	<table class="table responsive-table">

		<thead>
		<tr>
			<th scope="col" width="1%"><?=$this->view->idField?></th>
			<? foreach ($this->view->fields as $field): ?>
				<? if (!isset($field['skiplist']) || !$field['skiplist']): ?>
					<th scope="col" <? if($field['type'] == 'order'): ?>width="120"<? endif; ?>><?=$field['name']?></th>
				<? endif; ?>
			<? endforeach; ?>
			<th scope="col" width="80" class="align-right"></th>
		</tr>
		</thead>

		<tbody>

		<? foreach ($this->view->collection as $row): ?>
			<tr id="row-<?=$row[$this->view->idField]?>">
				<td><?=$row[$this->view->idField]?></td>
				<? foreach($this->view->fields as $key => $field): ?>
					<? if (!isset($field['skiplist']) || !$field['skiplist']): ?>
						<td>
							<? $value = $row[$key.'Value'] ?>
							<? include(Yii::app()->basePath.'/modules/admin/views/fieldtypes/viewblocks/' . $field['type'] . '.phtml'); ?>
						</td>
					<? endif; ?>
				<? endforeach; ?>
				<td class="low-padding align-right">
					<!--				class: show-on-parent-hover-->
					<div class="button-group compact">
						<a href="/admin/content/edit/model/<?=$this->view->MODEL_NAME?>/id/<?=$row[$this->view->idField]?>/<?=rand(111,999)?>" class="button icon-pencil">Edit</a>
						<a href="/admin/content/delete/model/<?=$this->view->MODEL_NAME?>/id/<?=$row[$this->view->idField]?>" class="button icon-trash with-tooltip confirm" title="Удалить"></a>
					</div>
				</td>
			</tr>
		<? endforeach; ?>

		</tbody>

	</table>

	<form method="post" action="" class="table-footer button-height large-margin-bottom">
		<div class="float-right">
			<?=$this->view->paginator ?>
		</div>
		<div style="clear:both"></div>
	</form>

</div>

<div style="display:none;">

	<? foreach ($this->view->collection as $row): ?>
		<div id="row-info-<?=$row[$this->view->idField]?>">
			<? foreach ($this->view->fields as $key => $field): ?>
				<? if (in_array($field['type'], array('text', 'date', 'datetime', 'parent', 'select', 'values', 'multiselect'))): ?>

					<strong><?=$field['name']?>:</strong>
					<? $value = $row[$key.'Value'] ?>
					<? include(Yii::app()->basePath.'/modules/admin/views/fieldtypes/viewblocks/' . $field['type'] . '.phtml'); ?>
					<br/>

				<? endif; ?>
			<? endforeach; ?>
		</div>
	<? endforeach; ?>

</div>