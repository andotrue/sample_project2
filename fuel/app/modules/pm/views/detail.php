<p style="background-color: #00AEEF; text-align:center; color:white; border:1px solid">各誌紹介　詳細</p>
<div class="container">
	<div class="row">
		<?/****画像****/ ?>	
		<div class="col-sm-8" style="background:white; border:0px solid">
		<?php echo Asset::img('pmtest1/magazine/'.$article['id'].'.jpg', array('width'=>'', 'height'=>'', 'alt'=>$article['title'], 'class'=>'img-responsive img-rounded')); ?>
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
	
	<div class="row">
	</div>
		
</div>
