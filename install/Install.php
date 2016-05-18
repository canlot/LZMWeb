<?php
defined("INSTALL") or die;
require_once './Database/Database.php';
    if(!isset($_POST["inputHost"]) or !isset($_POST["inputUser"]) or !isset($_POST["inputPassword"]) or !isset($_POST["inputDbName"]))
    {
        $NoSubmitForm = TRUE;
    }
    else 
    {
        $host = $_POST["inputHost"];
        $user = $_POST["inputUser"];
        $password = $_POST["inputPassword"];
        $database = $_POST["inputDbName"];
        if(empty($host) or empty($user) or empty( $password) or empty($database))
        {
               echo '<div class ="alert alert-warning" role="alert">' . 'Bitte tragen Sie alle Daten ein' . '</div>';
        }
        else
        {
            $conn = new \DB\Database($host, $user, $password, $database);
            if($conn->validConnection())
            {
                $DbWork = TRUE;
                
                try 
                {
                    if(file_exists("./config/DatabaseInformation". ".php"))
                        unlink("./config/DatabaseInformation". ".php");
                    $file_content = "<?php namespace DBInfo; " .
                            "const DbName = \"" . $database . "\"; " .
                            "const DbHost = \"" . $host . "\"; " .
                            "const DbUser = \"" . $user . "\"; " .
                            "const DbPassword = \"" . $password . "\"; ";
                    file_put_contents("./config/DatabaseInformation". ".php", $file_content);
                    require 'SetupDatabase.php';
                    $setup = new SetupDatabase($host, $user, $password, $database);
                    $returnvar = $setup->setUp();
                    echo '<div class ="alert alert-success" role="alert">' . 'Verbindung mit der Datenbank hergestellt' . '</div>';
                    echo '<div class ="alert alert-success" role="alert">' . 'Datenbank Konfigurationsdatei erstellt' . '</div>';
                    if($returnvar)
                    {
                        echo '<div class ="alert alert-success" role="alert">' . 'Tabellen erstellt' . '</div>';
                    }
                    else
                    {
                        echo '<div class ="alert alert-danger" role="alert">' . 'Datenbank Konfigurationsdatei konnte nicht erstellt werden';
                        echo '<span class="label label-danger">' . $returnvar . '</span>';
                        echo '</div>';
                    }
                } 
                catch (Exception $exc) 
                {
                    echo '<div class ="alert alert-danger" role="alert">' . 'Datenbank Konfigurationsdatei konnte nicht erstell werden';
                    echo '<span class="label label-danger">' . $exc->getTraceAsString() . '</span>';
                    echo '</div>';
                }
                
            }
            else
            {
                echo '<div class ="alert alert-danger" role="alert">' . 'Verbindung konnte nicht hergestellt werden, eine oder mehrere Eingaben sind falsch';
                echo '<span class="label label-danger">' . $conn->errorMessage() . '</span>';
                echo '</div>';
                $DbWork = FALSE;
            }
        }
    }   



