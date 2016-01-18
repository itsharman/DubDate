<!DOCTYPE html>

<html>

    <head>

        <!-- http://getbootstrap.com/ -->
        <link href="/css/bootstrap.min.css" rel="stylesheet"/>
        
        <link href="/css/dubdatestyle.css" rel="stylesheet"/>

        <?php if (isset($title)): ?>
            <title>Dubdate: <?= htmlspecialchars($title) ?></title>
        <?php else: ?>
            <title>Dubdate</title>
        <?php endif ?>

        <!-- https://jquery.com/ -->
        <script src="/js/jquery-1.11.3.min.js"></script>

        <!-- http://getbootstrap.com/ -->
        <script src="/js/bootstrap.min.js"></script>

        <script src="/js/scripts.js"></script>

    </head>

    <body>

        <div id = "all">
            <div id = "logo">
                <a href="/">Dubdate</a>
            </div>
            <?php if (!empty($_SESSION["id"])): ?>
                <div id = "nav">
                <!--<div id = "content">-->
                <ul class="nav nav-pills">
                    <li><a href="index.php">Home Page</a></li>
                    <li><a href="profile.php">Profile</a></li>
                    <li><a href="match.php">Matches</a></li>
                    <!--<li><a href="chatroom.php">Chat Room</a></li>-->
                    <li><a href="logout.php"><strong>Log Out</strong></a></li>
                </ul>
                </div>
            <?php endif ?>
            <div id="middle">
