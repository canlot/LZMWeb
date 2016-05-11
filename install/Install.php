<?php
defined("INSTALL") or die;
require_once './Database/Database.php';
    if(!isset($_POST["inputHost"]) or !isset($_POST["inputUser"]) or !isset($_POST["inputPassword"]) or !isset($_POST["inputDbName"]))
    {
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
                
            }
            else
            {
                echo '<div class ="alert alert-danger" role="alert">' . 'Verbindung konnte nicht hergestellt werden, eine oder mehrere Eingaben sind falsch';
                echo '<span class="label label-danger">' . $conn->errorMessage() . '</span>';
                echo '</div>';
            }
        }
    }   



