<!DOCTYPE html>
 <html>
 <head>
 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width,minimum-scale=1">
 <title><?=$title?></title>

 <link rel="stylesheet" href="http://code.jquery.com/mobile/1.0.1/jquery.mobile-1.0.1.min.css" />
 <script src="http://code.jquery.com/jquery-1.6.4.min.js"></script>
 <script src="http://code.jquery.com/mobile/1.0.1/jquery.mobile-1.0.1.min.js"></script>

 <?php //echo Asset::css('jquery.mobile.min.css')?>
 <?php //echo Asset::js(array('jquery.min.js','jquery.mobile.min.js'))?>
</head>
<body>
	<div data-role="page" id="page1">
		 <div data-role="header">
			 <h1><?=$site_name?></h1>
		 </div>
		 <div data-role="content">
			 <ul data-role="listview">
				 <li><a href="#page2">2 ページ</a></li>
				 <li><a href="#page3">3 ページ</a></li>
				 <li><a href="http://google.co.jp" rel="external">Google</a></li>
			 </ul>
		 </div>
		 <div data-role="footer">
			 <h4><?=$footer?></h4>
		 </div>
	</div>

	<div data-role="page" id="page2" data-add-back-btn="true">
		 <div data-role="header">
			 <h1>2 ページ</h1>
		 </div>
		 <div data-role="content">
			 ここに2ページ目のコンテンツを表示します。
		 </div>
		 <div data-role="footer">
			 <h4><?=$footer?></h4>
		 </div>
	</div>

	<div data-role="page" id="page3" data-add-back-btn="true">
		 <div data-role="header">
			 <h1>3 ページ</h1>
		 </div>
		 <div data-role="content">
			 ここに3ページ目のコンテンツを表示します。
		 </div>
		 <div data-role="footer">
			 <h4><?=$footer?></h4>
		 </div>
	</div>
</body>
</html>