<?php
    $DisplayAllThemesSHOW = TRUE;
    $sites = array("showbookmarks" => FALSE, "createbookmarks" => FALSE, "start" => FALSE);
    if(isset($_GET["site"]))
            {
                if(array_key_exists($_GET["site"], $sites))
                    $sites[$_GET["site"]] = TRUE;
                else
                    $sites["start"] = TRUE;
            }
            else
                $sites["start"] = TRUE;
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="templates/default/style/main.css">
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
        <title></title>
    </head>
    <body>
        <div class="container" id="main-container">
            <nav class="navbar navbar-default">
                <div class="container-fluid">
                  <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                      <span class="sr-only">Toggle navigation</span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">LZM Web</a>
                  </div>
                  <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav navbar-right">
                      <li class="<?php echo ($sites["showbookmarks"])?"active":"" ?>"><a href="index.php?site=showbookmarks">Lesezeichen anzeigen</a></li>
                      <li class="<?php echo ($sites["createbookmarks"])?"active":"" ?>"><a href="index.php?site=createbookmarks">Lesezeichen erstellen</a></li>
                    </ul>
                  </div><!--/.nav-collapse -->
                </div><!--/.container-fluid -->
            </nav>
        <?php
            if($sites["showbookmarks"])
                include_once 'Display.php';
            elseif($sites["createbookmarks"])
                include_once 'CreateBookmark.php';
            elseif($sites["start"])
                include_once 'Start.php';
        ?>
        </div>
    </body>
</html>

