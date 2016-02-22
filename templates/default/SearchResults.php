<div>
    <ul>
<?php
    
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
    var_dump($this->data);
    if(isset($this->data["GetLinks"]["theme"]))
        echo '<b>Keine Links unter diesem Thema</b>';
    else
    {
        foreach($this->data["GetLinks"]["link"] as $value)
        {
            echo '<li>' . $value . '<li>';
        }
    }
?>
    </ul>
</div>