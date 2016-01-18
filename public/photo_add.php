<?php

    // configuration
    require("../includes/config.php");

    // if user reached page via GET (as by clicking a link or via redirect)
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        render("photo_add.php", ["title" => "Add Photo"]);
    }
    
    // else if user reached page via POST (as by submitting a form via POST)
    else if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        //http://www.w3schools.com/php/php_file_upload.asp
        $target_dir = "uploads/";
        
        //change the name of the file
        $_FILES["fileToUpload"]["name"] = $_SESSION["id"] . ".png";
        //echo "NAME--" . $_FILES["fileToUpload"]["name"] . "--END";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $uploadOk = 1;
        $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
        
        // Check if image file is a actual image or fake image
        if(isset($_POST["submit"])) 
        {
            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
            if($check !== false) 
            {
                //we can remove this line as it is not an error
                //echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            }
            else
            {
                apologize("File is not an image.");
                $uploadOk = 0;
            }
        }
        // Check if file already exists
        if (file_exists($target_file)) 
        {
            //delete what's currently there
            unlink($target_dir . basename($_FILES["fileToUpload"]["name"]));
        }
        // Check file size
        if ($_FILES["fileToUpload"]["size"] > 500000) 
        {
            apologize("Sorry, your file is too large.");
            $uploadOk = 0;
        }
        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) 
        {
            apologize("Sorry, only JPG, JPEG, PNG & GIF files are allowed.");
            $uploadOk = 0;
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) 
        {
            apologize("Sorry, your file was not uploaded.");
        } 
        // if everything is ok, try to upload file
        else 
        {
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) 
            {
                //not needed
                //echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
            } 
            else 
            {
                apologize("Sorry, there was an error uploading your file.");
            }
        }
    }
    render("prof_page.php", ["title" => "Profile", "profile" => prof_lookup($_SESSION["id"])]);
?>