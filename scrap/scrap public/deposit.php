<?php
        
    // configuration
    require("../includes/config.php");

    // if user reached page via GET (as by clicking a link or via redirect)
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        // render form
        render("deposit_form.php", ["title" => "Deposit"]);
    }
    
    // else if user reached page via POST (as by submitting a form via POST)
    else if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        if ($_POST["deposit"] > 1000)
        {
            apologize("Don't be TOOOO greedy!");
        }
        else
        {
            $plus_cash = $_POST["deposit"];
            CS50::query("UPDATE users SET cash = cash + ? WHERE id = ?", $plus_cash, $_SESSION["id"]);
            
            //record for history
            CS50::query("INSERT INTO history (user_id, transaction, datetime, symbol, shares, price) VALUES(?, 'DEP', NOW(), 'CASH', 1, ?)", $_SESSION["id"], $plus_cash);   

            //redirect to portfolio
            redirect("index.php");
        }
    }
    
?>
        