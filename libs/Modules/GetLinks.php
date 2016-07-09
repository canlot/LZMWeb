<?php
require_once 'Module.php';

class GetLinks extends Module
{
    public function __construct(DB\Database $database)
    {
        parent::__construct($database);
    }
    public function returnData($queries)
    { 
        
        if(!isset($_GET["theme"]))
            return;

        $args = [
            "string" => $_GET["theme"]
        ];
        $datareturn = array();
        $datareturn["links"] = $this->database->getDataArray($queries["getLinksWithoutUser"], $args);
        return $datareturn;
    }
    public function returnName()
    {
        return "GetLinks";
    }
}
