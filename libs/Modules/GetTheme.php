<?php
require_once 'Module.php';;

class GetTheme extends Module
{
    public function __construct(DB\Database $database)
    {
        parent::__construct($database);
    }
    public function returnData($queries)
    {
        $args = NULL;
        $datareturn = array();
        $datareturn["themes"] = $this->database->getDataArray($queries["getAllThemes"], $args);
        return $datareturn;
    }
    public function returnName()
    {
        return "GetTheme";
    }
}
