<div>
    <ul>
<?php
    
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
    $array = $this->controller->getLinks("Computer");
    if($array == FALSE)
        echo '<b>Keine Links unter disem Thema</b>';
    else
    {
        foreach($array as $value)
        {
            echo '<li>' . $value . '<li>';
        }
    }
?>
    </ul>
</div>