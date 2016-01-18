<?php
        
    // configuration
    require("../includes/config.php");

    // if user reached page via GET (as by clicking a link or via redirect)
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        //insert the posted message into the database.
        
        if(CS50::query("INSERT INTO messages (match_id, sender_id, message) VALUES(?, ?, ?)",
        $_SESSION["temp_match"], $_SESSION["id"], $_POST["message"]) == 0)
        {
            apologize("could not upload message to database");
        }
    }
    //regardless of whether we had to insert a new message, render current messages.
    $messages = CS50::query("SELECT * FROM messages WHERE match_id = ?", $_SESSION["temp_match"]);
    
    render("match_chat.php", ["title" => "Match Profile", "messages" => $messages,
    "chat_buddy" => $_SESSION["chat_buddy"]]);
?>