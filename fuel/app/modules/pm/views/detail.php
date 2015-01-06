<p style="background-color: #00AEEF; text-align:center; color:white; border:1px solid">各誌紹介　詳細</p>
<div class="container">
	<div class="row">
		<?/****画像****/ ?>	
		<div class="col-sm-8" style="background:white; border:0px solid">
		<?php echo Asset::img(MODULE_IMG_PATH.'/magazine/'.$article['id'].'.jpg', 
							array(
								'width'=>'100%', 
								'height'=>'', 
								'title'=>$article['title'],
								'data-captioner-start-closed' => "false",
								'role'=>"caption",
								'data-captioner-type'=>"animated",
								'alt'=>$article['discription'],
								'class'=>'img-responsive img-rounded'
							));
		 ?>
		 
		<div class="grid">
		<figure class="effect-julia" style="min-width:100%; max-width:100%; min-height:100%; max-height:100%; height:500px">
		<?php echo Asset::img(MODULE_IMG_PATH.'/magazine/'.$article['id'].'.jpg', 
							array(
								'width'=>'100%', 
								'height'=>'', 
								'title'=>$article['title'],
								//'data-captioner-start-closed' => "false",
								//'role'=>"caption",
								//'data-captioner-type'=>"animated",
								//'alt'=>$article['discription'],
								'class'=>'img-responsive img-rounded'
							));
		 ?>						
		<figcaption>
		<div style="padding: 22em 0em 0em 0em;">
			<p style="display:"><a href="http://amazon.co.jp" role="button">この号をAmazon.co.jpで購入する</a></p>
			<p style="display:"><a href="#" role="button">この雑誌を定期購読する</a></p>
		</div>
		</figcaption>			
		</figure>
		</div>

		</div>
		<?/****説明文****/ ?>	
		<div class="col-sm-4" style="background:white; border:1px solid; text-align:center; font-size:small;">
		<p><?=$article['title']; ?> xxxx年x月号</p>
		<p>定価：xxx円</p>
		<p>発売日：xxxx-xx-xx</p>
		<p>バックナンバー</p>
		<p>パズルの解き方</p>
		</div>
	</div>

	<hr>

	<div class="row">
		<?/****記事****/ ?>	
		<div class="col-sm-12" style="background:white; border:0px solid">
		<p><?=$article['discription']; ?></p>
		<?/****ボタン****/ ?>	
		<p style="text-align:right"><a href="#" class="btn btn-primary btn-lg active" role="button">この号をAmazon.co.jpで購入する</a><p>
		<p style="text-align:right"><a href="#" class="btn btn-primary btn-lg active" role="button">この雑誌を定期購読する</a><p>
		</div>	
		</div>
	
</div>

<p style="background-color: #339900; text-align:center; color:white; border:1px solid">懸賞応募</p>
<div class="container">
	<div class="row">
		<div class="col-sm-12" style="background:white; border:0px solid">
		<table>
		<tr>
		<td>
		<img src="">
		</td>
		<td>
		xxxx年x月号<br />
		締切日:xxxx-xx-xx<br />
		<?=Html::anchor(Uri::base().MODULE_NAME.'/apply/form/', '懸賞に応募する');?><br />
		</td>
		</tr>
		</table>
		</div>
	</div>
</div>

