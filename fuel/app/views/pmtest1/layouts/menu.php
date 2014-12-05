<table class="table table-condensed">
	<thead>
		<tr>
			<th><h4>各紙紹介</h3></th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($magazines as $row): ?>
		<tr>
			<td><h6><?=Html::anchor(Uri::base().Uri::segment(1).'/detail/?id='.$row['id'], $row['title']);?><h6></td>
		</tr>
		<?php endforeach;?>
	</tbody>
</table>
