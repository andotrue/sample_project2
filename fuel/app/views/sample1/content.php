<div class="content">
 <h1>ようこそ<?=$title?></h1>
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
 </div>