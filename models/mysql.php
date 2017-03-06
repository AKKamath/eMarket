<?php
    function connect()
    {
        $path = "config.json";
        // Read MySQL details
        $config = file_get_contents($path);
        $options = json_decode($config);
        $options = $options->{"database"};
        $username = $options->{"username"};
        $password = $options->{"password"};
        $host = $options->{"host"};
        $DB = $options->{"name"};
    
        // Initialize connection
        $connection = mysqli_connect($host, $username, $password, $DB);
        return $connection;
    }
?>