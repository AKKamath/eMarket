<?php
    require("../models/mysql.php");
    function create_user($data)
    {
        $connection = connect("../models/config.json");
        mysqli_query($connection, "INSERT IGNORE INTO Users (Email, Name, Password, CollegeId, Gender) VALUES " .
        "(\""     . $data["Email"]                                     . "\"," . 
         "\""     . $data["Name"]                                      . "\"," . 
         "\""     . password_hash($data["Password"], PASSWORD_DEFAULT) . "\"," .
         "\""     . $data["CollegeId"]                                 . "\"," .
         "\""     . $data["Gender"]                                    . "\");");
        if(mysqli_affected_rows($connection) != 1)
            return -1;
        $rows = mysqli_fetch_row(mysqli_query($connection, "SELECT LAST_INSERT_ID() AS id"));
        mysqli_close($connection);
        return $rows;
    }
?>