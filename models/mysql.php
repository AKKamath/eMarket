<?php
    ini_set("display_errors", true);
    error_reporting(E_ALL);
    function connect($path)
    {
        // Read MySQL details
        $config = file_get_contents($path);
        $options = json_decode($config);
        $options = $options->{"database"};
        $username = $options->{"username"};
        $password = $options->{"password"};
        $host = $options->{"host"};
        $DB = $options->{"name"};
    
        // Initialize connection
        $connection = mysqli_connect($host, "root", $password, "Proj_2");
        return $connection;
    }
?>