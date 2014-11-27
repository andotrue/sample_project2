<h2>Listing <span class='muted'>Sample2s</span></h2>
<br>
<?php if ($sample2s): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Title</th>
			<th>Content</th>
			<th>&nbsp;</th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($sample2s as $item): ?>		<tr>

			<td><?php echo $item->title; ?></td>
			<td><?php echo $item->content; ?></td>
			<td>
				<div class="btn-toolbar">
					<div class="btn-group">
						<?php echo Html::anchor('sample2/view/'.$item->id, '<i class="icon-eye-open"></i> View', array('class' => 'btn btn-small')); ?>						<?php echo Html::anchor('sample2/edit/'.$item->id, '<i class="icon-wrench"></i> Edit', array('class' => 'btn btn-small')); ?>						<?php echo Html::anchor('sample2/delete/'.$item->id, '<i class="icon-trash icon-white"></i> Delete', array('class' => 'btn btn-small btn-danger', 'onclick' => "return confirm('Are you sure?')")); ?>					</div>
				</div>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Sample2s.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('sample2/create', 'Add new Sample2', array('class' => 'btn btn-success')); ?>

</p>
