<?php

    // configuration
    require("../includes/config.php");

    // if user reached page via GET (as by clicking a link or via redirect)
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        // else render form
        render("register_form.php", ["title" => "Register"]);
    }

    // else if user reached page via POST (as by submitting a form via POST)
    else if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        //validate that username isn't empty
        if (empty($_POST["username"])) 
        {
            apologize('Please provide a username.');
            //return false;
        }
        //if username is valid, validate that first person's name isn't empty
        else if (empty($_POST["name1"])) 
        {
            apologize('Please provide the first person\'s name.');
            //return false;
        }
        //if username & first person's name are valid, validate that second person's name isn't empty
        else if (empty($_POST["name2"])) 
        {
            apologize('Please provide the second person\'s name.');
            //return false;
        }
        //if username & names are valid, validate that password isn't empty
        else if (empty($_POST["password"])) 
        {
            apologize('Please provide a password.');
            //return false;
        }
        //if username, names, & password are valid, validate that confirmation of password is attempted
        else if (empty($_POST["confirmation"])) 
        {
            apologize('Please confirm your password.');
            //return false;
        }
        //if username, names, & password are valid, & if confirmation isn't empty, validate that password & confirmation match up
        else if ($_POST["password"] != $_POST["confirmation"]) 
        {
            apologize('Your password and confirmation don\'t match up.');
            //return false;
        }
        
        //dump(password_hash($_POST["password"]));
        //dump(password_hash($_POST["password"], PASSWORD_DEFAULT));
        //apologize(password_verify($_POST["password"], password_hash($_POST["password"], PASSWORD_DEFAULT)));

        //check if username already taken
        $rows = CS50::query("SELECT * FROM users WHERE username = ?", $_POST["username"]);
        if (count ($rows) == 1) 
        {
            apologize('Username already taken.');
            //return false;
        }
        
        else 
        {
            //if all previous steps are successful, register user
            CS50::query("INSERT IGNORE INTO users (username, hash, viewNum, name1, name2) 
            VALUES(?, ?, 1, ?, ?)", $_POST["username"], password_hash($_POST["password"], PASSWORD_DEFAULT), 
            $_POST["name1"], $_POST["name2"]);
            //get id of user
            $rows = CS50::query("SELECT LAST_INSERT_ID() AS id");
            $id = $rows[0]["id"];
            //remember id in $_SESSION
            $_SESSION["id"] = $id;
            //remember username
            $_SESSION["username"] = $row["username"];
            //redirect to index.php
            redirect("/profile.php");
        }
        
    }

?>