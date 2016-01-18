<?php

    // configuration
    require("../includes/config.php"); 
    
     // if user reached page via GET (as by clicking a link or via redirect)
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        //logic to deal with this new proposal
        $viewNum = CS50::query("SELECT viewNum FROM users WHERE id = ?", $_SESSION["id"]);
        $viewnum = $viewNum[0]["viewNum"];
        
        //try deleting the complement of this proposal. if deletion works, we have a match.
        //deletion is optional, but an optimization to keep proposals table small.
        if (CS50::query("DELETE FROM proposals WHERE user_id = ? AND proposee_id = ?", 
        $viewnum, $_SESSION["id"]))
        {
            //we have a match; insert into match table.
            CS50::query("INSERT INTO matches (user1_id, user2_id) VALUES(?, ?)",
            $_SESSION["id"], $viewnum);
        }
        else
        {
            // no match yet; insert proposal into proposals table
            CS50::query("INSERT INTO proposals (user_id, proposee_id) VALUES(?, ?)",
            $_SESSION["id"], $viewnum);
        }
        
        //show the next profile. This function is defined in helpers.php
        render_next();
    }
    
?>