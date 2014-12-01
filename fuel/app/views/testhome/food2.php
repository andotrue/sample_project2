<html>
	<head>
		<meta charset="UTF-8" />
		<title><?=$title?></title>
	</head>
	<body>
		<table border="1">
			<thead>
				<tr>
					<th>ID</th>
					<th>名前</th>
					<th>金額</th>
					<th>備考</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($foods as $food): ?>
				<tr>
					<td><?=$food["id"]?></td>
					<td><?=$food["name"]?></td>
					<!-- td><?=$food["price"]?></td -->
					<td><?=$food["price2"]?></td>
					<td><?=$food["notes"]?></td>
				</tr>
				<?php endforeach;?>
			</tbody>
		</table>
	</body>
</html>