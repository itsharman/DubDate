<?php
        
    // configuration
    require("../includes/config.php");

    // if user reached page via GET (as by clicking a link or via redirect)
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        // render profile
        render("prof_page.php", ["title" => "Profile", "profile" => prof_lookup($_SESSION["id"])]);
    }
    
?>