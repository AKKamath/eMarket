</div><div id="main"><span id="link"><a class ="ghost-button" href='/store.php'>Purchase</a></span>
<span id="link"><a class ="ghost-button" href='/postad.php'>Sell </a></span><br><br><br>
<span id="link"><button class ="ghost-button" id="myitems_button">My Items </button></span>
<span id="link"><a class ="ghost-button" href='/logout.php'>Logout </a></span></p>
</div>
<?php if(!empty($data)): ?>
    <form method=POST action='/'>
        

    <table class="table" id="myitems">
        <thead class="tbl-header">
            <tr>
                <th>Image</th>
                <th>Title</th>
                <th>Description</th>
                <th>Price</th>
                <th>Date</th>
                <th>Remove</th>
            </tr>
        </thead>
            
                <tbody class="tbl-content">
                <?php foreach ($data as $obj): ?>
                <tr>
                    <td><img width="100px" height="50px" src= "<?php echo "images/" . $obj["image"]; ?>" onerror="this.onerror=null;this.src='/img/ajax-loader.gif';"></td>
                    <td><?= $obj["name"]; ?></td>
                    <td><?= $obj["desc"]; ?></td>
                    <td><?= $obj["price"] == -1 ? "On Donation" : $obj["price"]; ?></td>
                    <td><?= $obj["date"]; ?></td>
                    <td><button class="myButton" name="delete" value= <?= $obj["item"]; ?>>Delete</button></td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
    </form>
<?php endif; ?>
</p>

<!--<p id="link" align="right"><a id="direct" class="ghost-button" style="border:0px" href='/logout.php'>Logout</a></p>-->
