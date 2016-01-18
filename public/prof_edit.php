<?php

    // configuration
    require("../includes/config.php");

    // if user reached page via GET (as by clicking a link or via redirect)
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        render("prof_form.php", ["title" => "Edit"]);
    }
    
    // else if user reached page via POST (as by submitting a form via POST)
    else if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        //insert new interest into interests database
        CS50::query("INSERT INTO interests (user_id, interest) VALUES(?, ?)", $_SESSION["id"], $_POST["interest"]);

        // render updated profile
        render("prof_page.php", ["title" => "Profile", "profile" => prof_lookup($_SESSION["id"])]);
    }
    
?>