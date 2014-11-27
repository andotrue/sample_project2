<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>Eメール</title>
</head>
<body>
メール送信
<form name="form1" method="post" action="sendmail">
 <table width="100%" border="1">
 <tr>
 <th scope="row">宛先</th>
 <td><label for="to"></label>
 <input name="to" type="text" id="to" size="40"></td>
 </tr>
 <tr>
 <th scope="row">送信元</th>
 <td><label for="from"></label>
 <input name="from" type="text" id="from" size="40"></td>
 </tr>
 <tr>
 <th scope="row">表題</th>
 <td><label for="subject"></label>
 <input name="subject" type="text" id="subject" size="40"></td>
 </tr>
 <tr>
 <th scope="row">内容</th>
 <td><label for="body"></label>
 <textarea name="body" id="body" cols="40" rows="5"></textarea></td>
 </tr>
 <tr>
 <th colspan="2" scope="row"><input type="submit" name="button" id="button" value="送信"></th>
 </tr>
 </table>
</form>
</body>
</html>