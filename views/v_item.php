<!--<h1>Welcome, <a href='/'>abc</a></h1><a href='/postad'>Sell Item</a></br>
<a href='/store'>Go to Store</a></br>
<a href='/logout'>Logout</a><br><div>
<span id='msg'></span><br>-->

<div class="tbl-header">
<table class="table">
	<thead>
			<tr>
				<th>Image</th>
				<th>Title</th>
				<th>Description</th>
				<th>Price</th>
				<th>Date</th>
				<th>Contact</th>
			</tr>
	</thead>
	</table>
	</div>
	<div class="tbl-content">
		<table class="table">
			<tbody>
			<tr id="table_row">
				<td><img width=100px height=50px src= <?= "images/". htmlspecialchars($data["image"])?>></td>
				<td><?= htmlspecialchars($data["name"]) ?></td>
				<td id="description"><?= htmlspecialchars($data["desc"]) ?></td>
				<td><?= $data["price"] == -1 ? "On Donation" : htmlspecialchars($data["price"]) ?></td>
				<td><?= htmlspecialchars($data["date"]) ?></td>
				<td id="contact"><?= htmlspecialchars($data["contact"]) ?></td>
			</tr>
			<tr>
				<td colspan='6'>
					<a id="link" href=<?= '/store.php?id=' . htmlspecialchars($data["seller"])?>>View all items from this Seller</a>
				</td>
			</tr>
			</tbody>
		</table>
		</div>

</div>