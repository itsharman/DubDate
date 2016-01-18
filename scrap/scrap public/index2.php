<?php

    // configuration
    require("../includes/config.php"); 
    
     // if user reached page via GET (as by clicking a link or via redirect)
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        render_next(false);
    }
    //     $viewnum = CS50::query("SELECT viewNum FROM users WHERE id = ?", $_SESSION["id"]);
        
    //     $last = CS50::query("SELECT MAX(id) FROM users");

    //     if($viewnum[0]["viewNum"] > $last[0]["MAX(id)"])
    //     {
    //         apologize("You've seen everybody!");
    //     }
        
    //     // render homepage
    //     render("home.php", ["title" => "home", "profile" => prof_lookup($viewnum[0]["viewNum"])]);
    // }
    
?>
