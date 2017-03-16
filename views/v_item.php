<h1>Welcome, <a href='/'>abc</a></h1><a href='/postad'>Sell Item</a></br>
<a href='/store'>Go to Store</a></br>
<a href='/logout'>Logout</a><br><div>
<span id='msg'></span><br>

<table style='
        border: 2px solid wheat;'>
			<tr>
				<th>Image</td>
				<th>Title</td>
				<th>Description</td>
				<th>Price</td>
				<th>Date</td>
				<th>Contact</td>
			</tr>
			<tr>
				<td><img width=100px height=50px src= <?= "images/". htmlspecialchars($data["image"])?>></td>
				<td><?= htmlspecialchars($data["name"]) ?></td>
				<td><?= htmlspecialchars($data["desc"]) ?></td>
				<td><?= $data["price"] == -1 ? "On Donation" : htmlspecialchars($data["price"]) ?></td>
				<td><?= htmlspecialchars($data["date"]) ?></td>
				<td><?= htmlspecialchars($data["contact"]) ?></td>
			</tr>
			<tr>
				<td colspan='6'>
					<a href=<?= '/store.php?id=' . htmlspecialchars($data["seller"])?>>View all items from this Seller</a>
				</td>
			</tr>
		</table>

</div>