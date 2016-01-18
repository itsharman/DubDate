<?php require("../views/render_messages.php"); ?>

<form action="messages.php" method="post">
    <fieldset>
        <div class="form-group">
            <input class="form-control" name="message" placeholder="New Message" type="text"/>
        </div>
        <div class="form-group">
            <button class="btn btn-default" type="submit">Send</button>
        </div>
    </fieldset>
</form>

<a class = "btn btn-default" href = "messages.php">
        Refresh
</a>

