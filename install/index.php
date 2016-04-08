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
                    if(file_exists("./config/DatabaseInformation"
                            . ".php"))
                    {
                        echo '<div class ="alert alert-success" role="alert">' . 'Datenbank Konfigurationsdatei gefunden' . '</div>';
                        require './Database/Database.php';
                        require './config/DatabaseInformation.php';
                        $database = new DB\Database(DBInfo\DbHost, DBInfo\DbUser, DBInfo\DbPassword, DBInfo\DbName);
                        if($database->validConnection())
                        {
                            echo '<div class ="alert alert-success" role="alert">' . 'Verbindung mit der Datenbank hergestellt' . '</div>';
                        }
                        else
                        {
                            echo '<div class ="alert alert-danger" role="alert">' . 'Verbindung konnte nicht hergestellt werden';
                            echo '<span class="label label-danger">' . $database->errorMessage() . '</span>';
                            echo '</div>';
                        }
                    }
                    else
                    {
                        echo '<div class ="alert alert-danger" role="alert">' . 'Datenbank Konfigurationsdatei nicht gefunden' . '</div>';
                    }


                ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Datenbank-Eingaben</h3>
                        </div>
                        <div class="panel-body">
                            <form class="form-horizontal">
                                <div class="form-group">
                                  <label for="inputHost" class="col-sm-4 control-label">Host</label>
                                  <div class="col-sm-8">
                                    <input type="value" class="form-control" id="inputHost" name="inputHost" placeholder="Host">
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label for="inputUser" class="col-sm-4 control-label">Benutzername</label>
                                  <div class="col-sm-8">
                                    <input type="value" class="form-control" id="inputUser" name="inputUser" placeholder="Benutzername">
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label for="inputPassword" class="col-sm-4 control-label">Passwort</label>
                                  <div class="col-sm-8">
                                    <input type="password" class="form-control" id="inputPassword" name="inputPassword" placeholder="Passwort">
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label for="inputDbName" class="col-sm-4 control-label">Datanbankname</label>
                                  <div class="col-sm-8">
                                    <input type="value" class="form-control" id="inputDbName" name="inputDbName" placeholder="Datenbank">
                                  </div>
                                </div>
                                <div class="form-group">
                                  <div class="col-sm-offset-4 col-sm-8">
                                    <button type="submit" class="btn btn-default">Speichern</button>
                                  </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>