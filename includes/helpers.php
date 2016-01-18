<?php

    /**
     * helpers.php
     *
     * Computer Science 50
     * Problem Set 7
     *
     * Helper functions.
     */

    require_once("config.php");

    /**
     * Apologizes to user with message.
     */
    function apologize($message)
    {
        render("apology.php", ["message" => $message]);
    }

    /**
     * Facilitates debugging by dumping contents of argument(s)
     * to browser.
     */
    function dump()
    {
        $arguments = func_get_args();
        require("../views/dump.php");
        exit;
    }

    /**
     * Logs out current user, if any.  Based on Example #1 at
     * http://us.php.net/manual/en/function.session-destroy.php.
     */
    function logout()
    {
        // unset any session variables
        $_SESSION = [];

        // expire cookie
        if (!empty($_COOKIE[session_name()]))
        {
            setcookie(session_name(), "", time() - 42000);
        }

        // destroy session
        session_destroy();
    }

    /**
     * Given a user id, returns relevant info for profile.
     */
    function prof_lookup($id)
    {
        //query database for user's information, given id.
        $username = CS50::query("SELECT username FROM users WHERE id = ?", $id);
        $interests = CS50::query("SELECT * FROM interests WHERE user_id = ?", $id);
        $name1 = CS50::query("SELECT name1 FROM users WHERE id = ?", $id);
        // dump($name1);
        $name2 = CS50::query("SELECT name2 FROM users WHERE id = ?", $id);
        $imagesrc = "/uploads/" . $id . ".png";
        // return profile as an associative array
        return [
            "username" => $username[0]["username"],
            "name1" => $name1[0]["name1"],
            "name2" => $name2[0]["name2"],
            "interests" => $interests,
            "imagesrc" => $imagesrc
        ];
    }
    /**
    * Renders the next profile to view.
    */
    function render_next()
    {
        //find current viewnum
        $viewNum = CS50::query("SELECT viewNum FROM users WHERE id = ?", $_SESSION["id"]);
        $viewnum = $viewNum[0]["viewNum"];
        //find id of last viable profile
        $last = CS50::query("SELECT MAX(id) FROM users");
        
        //increment viewnum to next viable profile
        do
        {
            CS50::query("UPDATE users SET viewNum = viewNum + 1 WHERE id = ?", $_SESSION["id"]);
            $viewnum++;
            if($viewnum > $last[0]["MAX(id)"])
            {
                apologize("You've seen e'rybody!");
                break;
            }
        }
        while (count(CS50::query("SELECT * FROM users WHERE id = ?", $viewnum)) == 0 
        || $viewnum == $_SESSION["id"]);
    
        // render homepage; show new profile.
        render("home.php", ["title" => "home", "profile" => prof_lookup($viewnum)]);
    }

    /**
     * Redirects user to location, which can be a URL or
     * a relative path on the local host.
     *
     * http://stackoverflow.com/a/25643550/5156190
     *
     * Because this function outputs an HTTP header, it
     * must be called before caller outputs any HTML.
     */
    function redirect($location)
    {
        if (headers_sent($file, $line))
        {
            trigger_error("HTTP headers already sent at {$file}:{$line}", E_USER_ERROR);
        }
        header("Location: {$location}");
        exit;
    }

    /**
     * Renders view, passing in values.
     * takes a string and an associative array.
     * ex usage for $message: ["bool" = true; "id" = $_SESSION["id"]; "push" = $_POST['message']];
     */
    function render($view, $values = [])
    {
        // if view exists, render it
        if (file_exists("../views/{$view}"))
        {
            // extract variables into local scope
            extract($values);

            // render view (between header and footer)
            require("../views/header.php");
            require("../views/{$view}");
            require("../views/footer.php");
            exit;
        }

        // else err
        else
        {
            trigger_error("Invalid view: {$view}", E_USER_ERROR);
        }
    }

?>