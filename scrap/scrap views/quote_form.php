<form action="quote.php" method="post">
    <p>hello</p>
    <fieldset>
        <div class="form-group">
            <input autocomplete="off" autofocus class="form-control" name="symbol" placeholder="Symbol" type="text"/>
        </div>
        <div class="form-group">
            <button class="btn btn-default" type="submit">
                Get Quote
            </button>
        </div>
    </fieldset>
</form>

<div>
    <?php echo($user); ?>
</div>
<ul>
    <?php 
        foreach($interest as $interests)
            {
                echo("<li>" + $interests["interest"] + "</li>");
            }
    ?>
</ul>
<!--
form input: symbol user wants to look up.
form action: send to controller, quote.php.
-->