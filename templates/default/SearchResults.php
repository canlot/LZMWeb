<ul class="list-group">
<?php
    if(isset($this->data["GetLinks"]["links"]))
    {
        if($this->data["GetLinks"]["links"] == FALSE)
            echo '<b>Keine Links unter diesem Thema</b>';
        else
        {
            foreach($this->data["GetLinks"]["links"] as $value)
            {
                echo '<li class="list-group-item" style="width: 100%">' . $value["link"] . '</li>';
            }
        }
    }
?>
</ul>