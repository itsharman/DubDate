<?php
        
    // configuration
    require("../includes/config.php");

    // if user reached page via GET (as by clicking a link or via redirect)
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        // render form
        render("register_form.php", ["title" => "Register"]);
    }

    // else if user reached page via POST (as by submitting a form via POST)
    else if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        if (empty($_POST["username"]) || empty($_POST["password"]))
        {
            apologize("Please enter a username and password!");
        }
        if ($_POST["password"] != $_POST["confirmation"])
        {
            apologize("Passwords do not match!");
        }
  
        
        $result = CS50::query("INSERT IGNORE INTO users (username, hash, cash) VALUES(?, ?, 10000.0000)", $_POST["username"], password_hash($_POST["password"], PASSWORD_DEFAULT));

        
        //string password_hash ( string $password , integer $algo [, array $options ] )
        if ($result == 0)
        {
            //username already exiss
            apologize("That username already exists!");
        }
        //$rows = CS50::query("SELECT cash FROM users WHERE id = ?", $_SESSION["id"]);
        
        $rows = CS50::query("SELECT LAST_INSERT_ID() AS id");
        $id = $rows[0]["id"];
        $_SESSION["id"] = $id;
        
        //redirect to index.php
        redirect("index.php");
        
    }
?>