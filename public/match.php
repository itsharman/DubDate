<?php

    // configuration
    require("../includes/config.php"); 
    
     // if user reached page via GET (as by clicking a link or via redirect)
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        $match_ids = [];
        $match_names = [];
        
        //find the ids i've matched to; fill $match_ids array.
        $rows = CS50::query("SELECT * FROM matches WHERE user1_id = ? OR user2_id = ?",
        $_SESSION["id"], $_SESSION["id"]);
        
        $k = count($rows);

        if($k == 0)
        {
            render("match_page.php", ["title" => "My Matches", "match_names" => $match_names]);
        }
        for ($i = 0; $i < $k; $i++)
        {
            if ($rows[$i]["user1_id"] == $_SESSION["id"])
            {
                $match_ids[$i] = $rows[$i]["user2_id"];
            }
            else
            {
                $match_ids[$i] = $rows[$i]["user1_id"];
            }
        }

        //convert these ids into real usernames for the view to use.
        for ($m_count = 0; $m_count < $k; $m_count++)
        {
            $names = CS50::query("SELECT username FROM users WHERE id = ?", $match_ids[$m_count]);
            $match_names[$m_count] = $names[0]["username"];
        }
        
        //dump($match_names);
        
        // render match_page
        render("match_page.php", ["title" => "My Matches", "match_names" => $match_names]);
    }
    
    // else if user reached page via POST (as by submitting a form via POST)
    else if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $_SESSION["chat_buddy"] = $_POST["matchname"];

        $id = CS50::query("SELECT id FROM users WHERE username = ?", $_SESSION["chat_buddy"]);
        
        //find where in the matches table I have matched with $_POST["matchname"]
        $rows = CS50::query("SELECT id FROM matches WHERE (user1_id = ? AND user2_id = ?)
        OR (user1_id = ? AND user2_id = ?)", $id[0]["id"], $_SESSION["id"], $_SESSION["id"], $id[0]["id"]);
        
        $_SESSION["temp_match"] = $rows[0]["id"];

        $messages = CS50::query("SELECT * FROM messages WHERE match_id = ?", $_SESSION["temp_match"]);
        
        // render private chatroom
        render("match_chat.php", ["title" => "Match Profile", "messages" => $messages,
        "chat_buddy" => $_SESSION["chat_buddy"]]);
    }
?>