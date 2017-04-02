<!DOCTYPE html>
<html>
<head>
    
    <meta charset = "utf-8">
    <meta name = "viewport" content="width=device-width, initial-scale=1">
    
    <title><?= htmlspecialchars($title) ?></title>
    
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    
    <!-- http://jquery.com/ -->
    <script src="js/jquery-1.11.3.min.js"></script>
    
    <!-- http://underscorejs.org/ -->
    <script src="js/underscore-min.js"></script>
    
    <!--Might remove it later-- https://github.com/twitter/typeahead.js/ -->
    <script src="js/typeahead.jquery.min.js"></script>
    
    <script type="text/javascript" src="js/scripts.js"></script>
    
    <!--jquery form vaidation-->
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>
    
    
</head>
<body>
    <div id="background"></div>
    <div class="container">
        <div id="top">

            <div id="title_main"><h1>SELLR.</h1></div>

            
            <?php if(!empty($_SESSION["id"])): ?>
                <h6>Welcome, <a style="text-decoration:none" href = "/"><?= htmlspecialchars($_SESSION["name"]); ?></a></h6>
            <?php endif ?>
            

    </div>
    
    <div id="middle">