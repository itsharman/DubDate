<?php
//scrap
        $interest = CS50::query("SELECT * FROM interests WHERE user_id = ?", $_SESSION["id"]);
        //dump($interest[0]["interest"]);
        $user = CS50::query("SELECT username FROM users WHERE id = ?", $_SESSION["id"]);
        //dump($user);
        
        //dump($user[0]["username"]);
        
        // for($i = 0, $k = count($profile["interests"]); $i < $k; $i++)
        // {
        //     echo($profile["interests"][$i]["interest"] . "<br/>");
        // }
        
        $interest = CS50::query("SELECT * FROM interests WHERE user_id = ?", $_SESSION["id"]);
        //dump($interest[0]["interest"]);
        $user = CS50::query("SELECT username FROM users WHERE id = ?", $_SESSION["id"]);
        //dump($user);
        //dump($user[0]["username"]);
        
        
        // //dump($_SESSION["id"]);
        // $viewNum = CS50::query("SELECT viewNum FROM users WHERE id = ?", $_SESSION["id"]);
        // //dump($viewNum[0]["viewNum"]);
        // $viewnum = $viewNum[0]["viewNum"];
        // $last = CS50::query("SELECT MAX(id) FROM users");
        
        // //dump(count(CS50::query("SELECT * FROM users WHERE id = ?", $viewnum)));
        // //dump($truth);
        // //dump($viewnum);
        // //dump($_SESSION["id"]);

        
        // //figure out who to show next
        // while((count(CS50::query("SELECT * FROM users WHERE id = ?", $viewnum)) == 0 
        // || $viewnum == $_SESSION["id"] || $truth));
        // {
        //     if((count(CS50::query("SELECT * FROM users WHERE id = ?", $viewnum)) == 0))
        //     {
        //         apologize("1");
        //     }
        //     if($viewnum == $_SESSION["id"])
        //     {
        //         apologize("2");
        //     }
        //     if($truth)
        //     {
        //         apologize("3");
        //     }
        //     if($viewnum > $last[0]["MAX(id)"])
        //     {
        //         apologize("4");
        //     }
        //     //apologize("got here");
        //     $truth = false;
        //     CS50::query("UPDATE users SET viewNum = viewNum + 1 WHERE id = ?", $_SESSION["id"]);
        //     $viewnum++;
        // }
        // if($viewnum > $last[0]["MAX(id)"])
        // {
        //     apologize("You've seen e'rybody!");
        // }
        // // render homepage
        // render("home.php", ["title" => "home", "profile" => prof_lookup($viewnum)]);
        
                
        //apologize("hi");
        // $viewNum = CS50::query("SELECT viewNum FROM users WHERE id = ?", $_SESSION["id"]);
        // $viewnum = $viewNum[0]["viewNum"];
        // $last = CS50::query("SELECT MAX(id) FROM users");
        // do
        // {
        //     CS50::query("UPDATE users SET viewNum = viewNum + 1 WHERE id = ?", $_SESSION["id"]);
        //     $viewnum++;
        //     if($viewnum > $last[0]["MAX(id)"])
        //     {
        //         apologize("You've seen e'rybody!");
        //         break;
        //     }
        // }
        // while(count(CS50::query("SELECT * FROM users WHERE id = ?", $viewnum)) == 0 
        // || $viewnum == $_SESSION["id"]);
        
        // redirect("/index.php");

?>