<?php

    // configuration
    require("../includes/config.php");

    // if user reached page via GET (as by clicking a link or via redirect)
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        //render buy_form.php
        render("buy_form.php", ["title" => "Buy"]);
    }
    else if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $stock = lookup(strtoupper($_POST["symbol"]));
        if ($stock === false)
        {
            apologize("Symbol not found!");
        }
        if (preg_match("/^\d+$/", $_POST["shares"]) === false)
        {
            apologize("please buy a whole, positive number of stocks!");
        }
        $cash = CS50::query("SELECT cash FROM users WHERE id = ?", $_SESSION["id"]);
        $value = $stock["price"] * $_POST["shares"];
        if ($cash[0]["cash"] < $value)
        {
            apologize("You can't afford that!");
        }
        
        //insert new stock and shares into portfolios
        CS50::query("INSERT INTO portfolios (user_id, symbol, shares) VALUES(?, ?, ?) ON DUPLICATE KEY UPDATE shares = shares + VALUES(shares)", $_SESSION["id"], $stock["symbol"], $_POST["shares"]);    
        
        //decrement cash
        CS50::query("UPDATE users SET cash = cash - ? WHERE id = ?", $value, $_SESSION["id"]);
        
        //record for history
        CS50::query("INSERT INTO history (user_id, transaction, datetime, symbol, shares, price) VALUES(?, 'BUY', NOW(), ?, ?, ?)", $_SESSION["id"], $stock["symbol"], $_POST["shares"], $stock["price"]);
        
        //redirect to portfolio
        redirect("index.php");
    }
?>



    // $value = $POST["shares"] * $stock["price"];

