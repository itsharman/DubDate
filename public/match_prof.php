<?php

    // configuration
    require("../includes/config.php"); 
    
     // if user reached page via GET (as by clicking a link or via redirect)
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $matchlook = CS50::query("SELECT id FROM users WHERE username = ?", $_POST["matchname"]);
        
        // render homepage
        render("match_profile.php", ["title" => "match_prof", "profile" => prof_lookup($matchlook[0]["id"]), "match" => $matchlook[0]["id"] ]);
    }
    
?>