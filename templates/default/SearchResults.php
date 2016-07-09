<div>
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
                echo '<li>' . $value["link"] . '</li>';
            }
        }
    }
?>
    </ul>
</div>