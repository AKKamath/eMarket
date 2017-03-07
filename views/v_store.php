<a href="/postad.php">Sell Item</a><br>
<ul>
	<li><a href="/store.php?">All</a></li>
	<li><a href="/store.php?category=1">Books</a></li>
	<li><a href="/store.php?category=2">Clothing</a></li>
	<li><a href="/store.php?category=3">Electronics</a></li>
	<li><a href="/store.php?category=4">Furniture</a></li>
	<li><a href="/store.php?category=5">Sports</a></li>
	<li><a href="/store.php?category=6">Vehicle</a></li>
	<li><a href="/store.php?category=7">Others</a></li>
</ul>
<div>
	<form>
		<select name="college">
				<option value="0" selected="" disabled="">Select College</option>
				<option value="0">All</option>
                <option value="31">Indian Institute of Technology, Delhi</option>
                <option value="33">Indian Institute of Technology, Guwahati</option>
                <option value="12">Birla Institute of Technology and Science, Pilani</option>
                <option value="78">National Institute of Technology, Jaipur</option>
                <option value="18">Delhi Technological University, New Delhi</option>
		</select>
		<input type="submit">
	</form>
	<br>
    <span id="msg"></span><br>

	<table style="border: 2px solid wheat;">
    	<tbody>
    	    <tr>
        		<th>Image</th>
        		<th>Title</th>
        		<th>Price</th>
        		<th>College</th>
        		<th>Category</th>
        		<th>Date</th>
        		<th>Contact Seller</th>
    		</tr>
    		<?php if(!empty($data))
    		    foreach ($data as $obj): ?>
        		<tr>
    				<td><img width="100px" height="50px" src= "<?php echo $obj->imgSource; ?>"></td>
    				<td><?= $obj->name; ?></td>
    				<td><?= $obj->price ?></td>
    				<td><?= $obj->college; ?></td>
    				<td><?= $obj->category; ?></td>
    				<td><?= $obj->sellDate; ?></td>
                    <td><a href= <?= $obj->seller ?>>Contact Seller</a></td>
    			</tr>
			<?php endforeach ?>
		</tbody>
	</table>
</div>