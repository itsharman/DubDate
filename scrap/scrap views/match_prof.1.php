<h1>Username:</h1>
    <?php echo($_POST["matchname"]); ?>

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

<div class="form-group">
    <input class="form-control" name="confirmation" placeholder="Message" type="message"/>
</div>
<div class="form-group">
    <button class="btn btn-default" type="submit">Send</button>
</div>