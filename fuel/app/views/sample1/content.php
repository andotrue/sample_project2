<div class="content">
 <h1>ようこそ<?=Auth::get_screen_name()?>さん</h1>
 <p><?=$description?></p>
 <table width="100%" border="1">
 <tr>
 <th scope="col">タイトル</th>
 <th scope="col">内容</th>
 </tr>
 <?php foreach ($query as $row): ?>
 <tr>
 <td><?=$row['title']?></td>
 <td><?=$row['content']?></td>
 </tr>
 <?php endforeach;?>
 </table>
 <p><a href="logout">ログアウト</a></p>
 </div>