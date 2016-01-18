<?php

    // configuration
    require("../includes/config.php"); 
    
     // if user reached page via GET (as by clicking a link or via redirect)
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        $match_names = [];
        
        //people I've proposed to
        $proposees = CS50::query("SELECT proposee_id FROM proposals WHERE user_id = ?", $_SESSION["id"]);
        //dump($proposees);
        
        //people I've received proposals from
        $proposers = CS50::query("SELECT user_id FROM proposals WHERE proposee_id = ?", $_SESSION["id"]);
        //dump($proposers[0]["user_id"]);
        
        if(count($proposers) == 0 || count($proposees) == 0)
        {
            render("match_page.php", ["title" => "My Matches", "match_names" => $match_names]);
        }
        else
        {
            //compare the two lists; find any matches; fill the match array.
            $counter = 0;
            $match_ids = [];
            for($i = 0, $k = count($proposees); $i < $k; $i++)
            {
                for($j = 0, $l = count($proposers); $j < $l; $j++)
                {
                    if($proposees[$i]["proposee_id"] == $proposers[$j]["user_id"])
                    {
                        $match_ids[$counter] = $proposees[$i]["proposee_id"];
                        $counter++;
                    }
                }
            }
            
            //dump($match_ids);
            
            if(count($match_ids) == 0)
            {
                render("match_page.php", ["title" => "My Matches", "match_names" => $match_names]);
            }
            
            $m_count = 0;
            
            for ($i = 0, $k = count($match_ids); $i < $k; $i++)
            {
                $names = CS50::query("SELECT username FROM users WHERE id = ?", $match_ids[$i]);
                $match_names[$m_count] = $names[0]["username"];
                $m_count++;
            }
            
            //dump($match_names);
            
            // render match_page
            render("match_page.php", ["title" => "My Matches", "match_names" => $match_names]);
        }
    }
    
    // else if user reached page via POST (as by submitting a form via POST)
    else if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $interest = CS50::query("SELECT * FROM interests WHERE user_id = ?", $_POST["matchname"]);
        //dump($interest[0]["interest"]);
    
        // render form
        render("match_prof.php", ["title" => "Match Profile", "interest" => $interest, "user" => $_POST["matchname"]]);
    }
    
?>