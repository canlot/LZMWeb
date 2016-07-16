<div class="list-group col-md-6">

<?php
    if(!isset($this->data["GetTheme"]["themes"]))
        echo '<b>Keine Themen verfügbar</b>';
    else
    {
        foreach($this->data["GetTheme"]["themes"] as $value)
        {
            $active_tag = "";
            if(isset($_GET["theme"]) && $_GET["theme"] == $value["theme"])
                $active_tag = "active";
            echo '<a href="index.php?theme=' . urlencode($value["theme"]) . '" class="list-group-item ' . $active_tag .'">' . $value["theme"] . '</a>';
        }
    }
    
?>
</div>