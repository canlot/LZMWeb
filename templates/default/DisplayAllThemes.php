<div class="list-group col-md-6">

<?php
    if(!isset($this->data["GetTheme"]["themes"]))
        echo '<b>Keine Themen verfügbar</b>';
    else
    {
        $site = "site=" . array_search(TRUE, $sites); //Will search for the current Site to show in index.php $sites and give the key back
        foreach($this->data["GetTheme"]["themes"] as $value)
        {
            $active_tag = "";
            if(isset($_GET["theme"]) && $_GET["theme"] == $value["theme"])
                $active_tag = "active";
            echo '<a href="index.php?' . $site . '&theme=' . urlencode($value["theme"]) . '" class="list-group-item ' . $active_tag .'">' . $value["theme"] . '</a>';
        }
    }
?>
</div>