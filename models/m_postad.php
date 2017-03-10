<?php
    require("../models/mysql.php");
    function create_sale($data)
    {
        $connection = connect("../models/config.json");
        mysqli_query($connection, "INSERT INTO Sales (Image, Name, Description, ContactInfo, Price, College, Category, SellerId, SellDate) VALUES " .
        "(\""     . $data["Image"]        . "\"," . 
         "\""     . $data["Name"]         . "\"," . 
         "\""     . $data["Description"]  . "\"," .
         "\""     . $data["ContactInfo"]  . "\"," .
         "\""     . $data["Price"]        . "\"," . 
         "\""     . $data["College"]      . "\"," .
         "\""     . $data["Category"]     . "\"," .
         "\""     . $data["SellerId"]     . "\"," .
         "CURDATE());");
         mysqli_close($connection);
    }
?>
