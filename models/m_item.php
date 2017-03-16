<?php
    require("../models/mysql.php");
    function fetch($data)
    {
        $connection = connect("../models/config.json");
        $rows = mysqli_query($connection, "SELECT Image, Name, Description, Price, SellDate, ContactInfo, SellerId FROM Sales WHERE ItemId = " . $data . ";");
        if(mysqli_num_rows($rows) == 0)
            return 0;
        $row = mysqli_fetch_row($rows);
        $ret = array(
                "image"    => $row[0],
                "name"     => $row[1],
                "desc"     => $row[2],
                "price"    => $row[3],
                "date"     => $row[4],
                "contact"  => $row[5],
                "seller"   => $row[6]
                );
        mysqli_close($connection);
        return $ret;
    }
?>