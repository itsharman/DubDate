<?php
        
    // configuration
    require("../includes/config.php");

    // if user reached page via GET (as by clicking a link or via redirect)
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        // render form
        render("chatroom.php", ["title" => "Chat Room"]);
    }
    else
    {
        //redirect to portfolio
        redirect("index.php");
    }
?>