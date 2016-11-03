<?php
require_once 'Module.php';
class SetLinks extends Module
{
    public function __construct(\DB\Database $database) 
    {
        parent::__construct($database);
    }
    public function execute($querys)
    {
        
        if(!empty($_POST["theme"]))
        {
            $themes = explode(",", $_POST["theme"]);
            foreach ($themes as $theme)
            {
                $args = [
                    "string" => $theme
                ];
                $id = $this->database->getDataArray($querys["getThemeId"], $args);
            }
        }
        if(!empty($_POST["themes"]))
        {
            foreach ($_POST["themes"] as $theme)
            {
                
                
            }
        }
        
        
    }
}
