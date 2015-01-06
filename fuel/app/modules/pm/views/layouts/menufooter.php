<p style="border-radius: 3px 3px;background-color: #00AEEF; text-align:center; color:white; border:1px solid">各紙紹介</p>
<div class="row">
	<?php foreach ($magazines as $row): ?>
	<div class="col-sm-4" style="background-color: #FFFF00; border:1px solid">
		<table>
		<tr>
		<td>
		<?=Html::anchor(Uri::base().MODULE_NAME.'/detail/?id='.$row['id'], Asset::img(MODULE_IMG_PATH.'/magazine/'.$row['id'].'.jpg', array('width'=>'80', 'height'=>'', 'alt'=>$row['title'], 'class'=>'img-responsive img-thumbnail')));?>
		</td>
		<td style="vertical-align:top">
		<div style="border-radius: 3px 3px;background-color:#00AEEF;text-decoration:bold;font-size:x-small;margin:0;color:white;padding:2px;height:16;">
			<?=Html::anchor(Uri::base().MODULE_NAME.'/detail/?id='.$row['id'], $row['title']);?>
			</div></a>
		</td>
		</tr>
		</table>
	</div>	
	<?php endforeach;?>
</div>
