<!--render username-->
<!--<h1>Username:</h1>-->
<?=$profile["username"]?>
<h1></h1>
<?=$profile["name1"]?> & <?=$profile["name2"]?>

<br/>

<!--render prof pic-->
<a href="/"><img alt="DubDate" src="<?=$profile["imagesrc"]?>"/></a>

<!--<a href="/"><img alt="/uploads/happydog.png" src="/uploads/happydog.png"/></a>-->


<br/>

<!--render interests-->
<h1>Interests:</h1>

    <?php 
        foreach($profile["interests"] as $interest)
        {
            echo($interest["interest"] . "<br/>");
        }
    ?>

<br/>