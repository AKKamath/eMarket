</div>
<!--<a class="ghost-button" style="border:0px" href="/postad.php">Sell Item</a><br>
-->
<div id="sidebar">
<p id="heading"><span id = "option_font">Category</span></p>
<p>
<a class="ghost-button" style="border: 0px ; text-align:left" href="/store.php?">All</a><br>
<a class="ghost-button" style="border: 0px ; text-align:left" href="/store.php?category=1">Books</a><br>
<a class="ghost-button" style="border: 0px ; text-align:left" href="/store.php?category=2">Clothing</a><br>
<a class="ghost-button" style="border: 0px ; text-align:left" href="/store.php?category=3">Electronics</a><br>
<a class="ghost-button" style="border: 0px ; text-align:left" href="/store.php?category=4">Furniture</a><br>
<a class="ghost-button" style="border: 0px ; text-align:left" href="/store.php?category=5">Sports</a><br>
<a class="ghost-button" style="border: 0px ; text-align:left" href="/store.php?category=6">Vehicle</a><br>
<a class="ghost-button" style="border: 0px ; text-align:left" href="/store.php?category=6">Others</a><br>
</p>
</div>

<div id="rightbar"> 
<p id="heading"><span id = "Submit">College</span></p>
        <p>
    
            
            <a class="ghost-button" style="border:0px; text-align: left;" href="/store.php?college=0">All</a><br>
            <a class="ghost-button" style="border:0px; text-align: left;" href="/store.php?college=31">IIT Delhi</a><br>
            <a class="ghost-button" style="border:0px; text-align: left;" href="/store.php?college=33">IIT Guwahati</a><br>
            <a class="ghost-button" style="border:0px; text-align: left;" href="/store.php?college=12">BITS Pilani</a><br>
            <a class="ghost-button" style="border:0px; text-align: left;" href="/store.php?college=78">NIT Jaipur</a><br>
            <a class="ghost-button" style="border:0px; text-align: left;" href="/store.php?college=18">DTU New Delhi</a><br>
        </p>
    
    <p id="heading"><span id = "Submit">Options</span></p>
    <p>
    <?php if(!empty($_SESSION["id"])): ?>
    <a id="direct" class="ghost-button" style="border:0px" href='/logout.php'>Logout</a>
    <a id="direct" class="ghost-button" style="border:0px" href='/postad.php'>Sell</a>
    <?php else: ?>
    <a id="direct" class="ghost-button" style="border:0px" href='/login.php'>Log In</a>
    <?php endif ?>
    </p>
<span id="msg"></span><br>
</div>

<div id="mainContent">
 <table class="table">   


    <thead class="tbl-header">
        <tr>
            <th id="img">Image</th>
            <th id="title">Title</th>
            <th id="price">Price</th>
            <th id="details">Details</th>
            <!--<th></th>-->
            <!-- <th>College</th> -->
            <!-- <th>Category</th>
            <th>Date</th>
            <th>Contact Seller</th> -->
        </tr>
    </thead>
    
    

    
    
        
    <tbody class="tbl-content">
        <?php if(!empty($data))
            foreach ($data as $obj): ?>
            <tr id="table_row">
                <td id="img"><img width="90px" height="50px" src= "<?php echo "images/" . htmlspecialchars($obj->imgSource) ?>" onerror="this.onerror=null;this.src='/img/ajax-loader.gif';"></td>
                <td id="title"><b><?= htmlspecialchars($obj->name) ?></b></td>
                <td id="price"><b><?= $obj->price == -1 ? "On Donation" : htmlspecialchars($obj->price) ?></b></td>
                <td id="details"><button class="myButton">Details</button></td>
                <td class="hidden" vis="1" colspan="1" ><p class="recieved"><b class="college">College: <?= htmlspecialchars($obj->college) ?></b><br>
                <b class="category">Category: <?= htmlspecialchars($obj->category) ?></b><br>
                <b class="date">Date: <?= htmlspecialchars($obj->sellDate) ?></b><br>
                <b><a class="cont" href= <?= "item.php?id=" . htmlspecialchars($obj->seller) ?>>Contact Seller</a></b></p></td>
            </tr>
        <?php endforeach ?>
    </tbody>



</table>

