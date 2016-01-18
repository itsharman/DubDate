<h1>Username:</h1>

    <?=$user[0]["username"]?>

<h1>Interests:</h1>
<ul>
    <?php 
        //echo("<li>" + $interest[0]["interest"] + "</li>");
        foreach($interest as $interests)
        {
            echo("<li>" . $interests["interest"] . "</li>");
        }
    ?>
</ul>

<?php
    $viewnum = CS50::query("SELECT viewNum FROM users WHERE id = ?", $_SESSION["id"]);
?>

<a href="/"><img alt="Coupler" src="/uploads/<?=$viewnum[0]['viewNum']?>.png"/></a>

<a class = "btn btn-default" href = "yes.php">
        Yes
</a>
<a class = "btn btn-default" href = "no.php">
        No
</a>