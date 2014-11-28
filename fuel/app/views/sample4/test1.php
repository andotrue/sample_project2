<!DOCTYPE HTML>
 <html>
 <head>
 <meta charset="utf-8">
 <title>メール送信</title>
 </head>
 <body>
 <?php echo $mail_form;?>
 <?php foreach($errors as $val):?>
 <?php echo $val.'<br>';?>
 <?php endforeach;?>
 </body>
 </html>