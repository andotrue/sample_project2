<p style="background-color: #00AEEF; text-align:center; color:white; border:1px solid">各紙紹介</p>
<div class="row">
	<?php foreach ($magazines as $row): ?>
	<div class="col-sm-4" style="background-color: #FFFF00; border:1px solid">
		<h6><?=Html::anchor(Uri::base().Uri::segment(1).'/detail/?id='.$row['id'], $row['title']);?><h6>
		<?php echo Asset::img('pmtest1/magazine/'.$row['id'].'.jpg', array('width'=>'', 'height'=>'', 'alt'=>$row['title'], 'class'=>'img-responsive img-thumbnail')); ?>
	</div>	
	<?php endforeach;?>
</div>
