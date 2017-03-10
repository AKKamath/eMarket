<h1>Welcome, <?= htmlspecialchars($_SESSION["name"]) ?></h1>
<a href='/postad.php'>Sell Item</a><br>
<a href='/store.php'>Go to Store</a><br>
<a href='/logout.php'>Logout</a>
<?php if(!empty($data)): ?>
    <form method=POST action='/'>
    <table style="border: 2px solid wheat;">
    	<tbody>
    	    <tr>
        		<th>Image</th>
        		<th>Title</th>
        		<th>Description</th>
        		<th>Price</th>
        		<th>Date</th>
        		<th>Remove</th>
    		</tr>
    		
    		    <?php foreach ($data as $obj): ?>
        		<tr>
    				<td><img width="100px" height="50px" src= "<?php echo "images/" . $obj["image"]; ?>"></td>
    				<td><?= $obj["name"]; ?></td>
    				<td><?= $obj["desc"]; ?></td>
    				<td><?= $obj["price"] == -1 ? "On Donation" : $obj["price"]; ?></td>
    				<td><?= $obj["date"]; ?></td>
                    <td><button name="delete" value= <?= $obj["item"]; ?>>Delete</button></td>
    			</tr>
			<?php endforeach ?>
		</tbody>
	</table>
	</form>
<?php endif; ?>