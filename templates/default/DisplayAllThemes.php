<div class="list-group">

<?php
    if(!isset($this->data["GetTheme"]["themes"]))
        echo '<b>Keine Themen verfügbar</b>';
    else
    {
        foreach($this->data["GetTheme"]["themes"] as $value)
        {
            echo '<a href="index.php?theme=' . $value["theme"] . '" class="list-group-item">' . $value["theme"] . '</a>';
        }
    }
    
?>
</div>