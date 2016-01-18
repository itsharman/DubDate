<?php
    //dump($match_names);
    if($match_names == NULL)
    {
        echo("<h1>Sorry, no matches yet!</h1>");
    }
    else
    {
        echo("<h1>Matches</h1>");
        foreach($match_names as $match)
        {
            echo("<form action=\"match_prof.php\" method=\"POST\"><input type=\"hidden\"
            name=\"matchname\" value=\"" . $match . "\" > <button class=\"btn btn-default\"
            type=\"submit\">" . $match . "</button></form>");
            
            echo("<form action=\"match.php\" method=\"POST\"><input type=\"hidden\"
            name=\"matchname\" value=\"" . $match . "\" > <button class=\"btn btn-default\"
            type=\"submit\">Chat with " . $match . "</button></form><br/>");
        }
    }
?>