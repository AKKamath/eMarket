<?php
    require("../models/mysql.php");
    function fetch_sales($id)
    {
        $connection = connect("../models/config.json");
        $rows = mysqli_query($connection, "SELECT Image, Name, Description, Price, SellDate, ItemId FROM Sales WHERE SellerId = \"" . $id . "\";");
        if(mysqli_num_rows($rows) == 0)
            return 0;
        while($row = mysqli_fetch_row($rows))
        {
            $data[] = array(
                "image" => $row[0],
                "name"  => $row[1],
                "desc"  => $row[2],
                "price" => $row[3],
                "date"  => $row[4],
                "item"  => $row[5]
                );
        }
        mysqli_close($connection);
        return $data;
    }
    function del_sale($id)
    {
        $connection = connect("../models/config.json");
        $rows = mysqli_fetch_row(mysqli_query($connection, "SELECT Image FROM Sales WHERE ItemId = " . $id . ";"));
        mysqli_query($connection, "DELETE FROM Sales WHERE ItemId = " . $id .";");
        mysqli_close($connection);
        return $rows[0];
    }
?>