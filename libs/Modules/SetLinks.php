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
        if(empty($_POST["bookmark"]))
        {
           return; 
        }
        $args = [["string", $_POST["bookmark"]]];
        $bookmarkId = $this->database->setDataParameterized($querys["setLink"], $args);
        
        if(!empty($_POST["theme"]))
        {
            $themes = explode(",", $_POST["theme"]);
            foreach ($themes as $theme)
            {
                $args = [["string", $theme]];
                $ret = $this->database->getDataArray($querys["getThemeId"], $args);
                $themeId = $ret[0]["id"];
                if($themeId == NULL)
                {
                    $themeId = $this->database->setDataParameterized($querys["setTheme"], $args);
                }
                $args = [["int", $bookmarkId], ["int", $themeId]];
                $this->database->setDataParameterized($querys["setRelation"], $args);
            }
        }
        if(!empty($_POST["themes"]))
        {
            foreach ($_POST["themes"] as $theme)
            {
                $args = [["string", $theme]];
                $ret = $this->database->getDataArray($querys["getThemeId"], $args);
                $themeId = $ret[0]["id"];
                $args = [["int", $bookmarkId], ["int", $themeId]];
                $this->database->setDataParameterized($querys["setRelation"], $args);
            }
        }
        
        
    }
    public function returnName()
    {
        return "SetLinks";
    }
}
