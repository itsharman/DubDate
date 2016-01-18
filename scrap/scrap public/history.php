<?php

    // configuration
    require("../includes/config.php");
    
    $history = CS50::query("SELECT * FROM history WHERE user_id = ?", $_SESSION["id"]);
    
    // render history
    render("history.php", ["history" => $history, "title" => "Portfolio"]);
?>

<!--"positions" => $positions,-->

<!--number_format($stock["price"], 3)-->