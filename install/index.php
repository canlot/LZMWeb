<?php 
    define("INSTALL", FALSE);
?>
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
        <div style="width: 95%; margin: auto;">
            <div class="page-header">
                <h1>Konfiguration für den ersten Betrieb</h1>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Info</h3>
                        </div>
                        <div class="panel-body">
                <?php
                    $DbWork = FALSE;
                    $NoSubmitForm = FALSE;
                    require 'Install.php';
                    if($NoSubmitForm)
                    {
                        if(file_exists("./config/DatabaseInformation". ".php"))
                        {
                            echo '<div class ="alert alert-success" role="alert">' . 'Datenbank Konfigurationsdatei gefunden' . '</div>';
                            require_once './Database/Database.php';
                            require_once './config/DatabaseInformation.php';
                            $database = new DB\Database(DBInfo\DbHost, DBInfo\DbUser, DBInfo\DbPassword, DBInfo\DbName);
                            if($database->validConnection())
                            {
                                echo '<div class ="alert alert-success" role="alert">' . 'Verbindung mit der Datenbank hergestellt' . '</div>';
                                $DbWork = TRUE;
                            }
                            else
                            {
                                echo '<div class ="alert alert-danger" role="alert">' . 'Verbindung konnte nicht hergestellt werden';
                                echo '<span class="label label-danger">' . $database->errorMessage() . '</span>';
                                echo '</div>';
                                $DbWork = FALSE;
                            }
                        }
                        else
                        {
                            echo '<div class ="alert alert-danger" role="alert">' . 'Datenbank Konfigurationsdatei nicht gefunden' . '</div>';
                            $DbWork = FALSE;
                        }
                    }

                ?>
                        </div>
                    </div>
                </div>
                <?php
                    if(!$DbWork)
                    {
                        require 'Formular.php';
                    }
                    else
                    {
                        if(isset($_POST["install_sample"]))
                        {
                            
                        }
                        else
                        {
                            echo '<a href="index.php?install_sample=true" class="btn btn-primary btn-lg active" role="button">Installiere Beispieldaten</a>';
                        }
                    }
                ?>
            </div>
        </div>
    </body>
</html>