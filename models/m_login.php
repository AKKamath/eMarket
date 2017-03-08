<?php
    require("../models/mysql.php");
    function check($data)
    {
        $connection = connect("../models/config.json");
        $rows = mysqli_fetch_row(mysqli_query($connection, "SELECT Id, Name, Gender, Password FROM Users WHERE Email = \"" . $data["email"] . "\";"));
        if(empty($rows))
            return 0;
        else if(!password_verify($data["password"], $rows[3]))
            return -1;
            
        $data = array(
            "id" => $rows[0],
            "name" => $rows[1],
            "sex" => $rows[2],
            "email" => $data["email"]
            );
        return $data;
    }
?>