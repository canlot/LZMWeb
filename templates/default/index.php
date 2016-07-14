
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
        <title></title>
    </head>
    <body>
        <div class="container">
            <div class="header clearfix">
                <h1>Lesezeichen Manager</h1>
                <nav>
                    <ul class="nav nav-pills pull-right">
                        <li role="presentation">
                            <a href="index.php?site=main">Leszeichen ansehen</a>
                        </li>
                        <li role="presentation">
                            <a href="index.php?site=add">Lesezeichen hinzufügen</a>
                        </li>
                    </ul>
                </nav>
            </div>
        <?php
            include_once 'SearchResults.php';
            include_once 'DisplayAllThemes.php';
        ?>
        </div>
    </body>
</html>

