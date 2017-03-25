<span id="link"><a class ="ghost-button" href='/store.php'>Purchase</a></span>
<span id="link"><a class ="ghost-button" href='/postad.php'>Sell </a></span>
<p>
<?php if(!empty($data)): ?>
    <form method=POST action='/'>
    <div class="tbl-header">
    <table class="table">
        <thead>
            <tr>
                <th>Image</th>
                <th>Title</th>
                <th>Description</th>
                <th>Price</th>
                <th>Date</th>
                <th>Remove</th>
            </tr>
        </thead>
        </table>
        </div>
        <div class="tbl-content">
            <table class="table">
                <tbody>
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
    </div>
    </form>
<?php endif; ?>
</p>

<p id="link" align="right"><a id="direct" class="ghost-button" style="border:0px" href='/logout.php'>Logout</a></p>
</div>