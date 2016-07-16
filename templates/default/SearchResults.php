<div class="list-group col-md-6">
    <ul>
<?php
    if(isset($this->data["GetLinks"]["links"]))
    {
        if($this->data["GetLinks"]["links"] == FALSE)
            echo '<b>Keine Links unter diesem Thema</b>';
        else
        {
            foreach($this->data["GetLinks"]["links"] as $value)
            {
                echo '<li class="list-group-item">' . $value["link"] . '</li>';
            }
        }
    }
?>
    </ul>
</div>