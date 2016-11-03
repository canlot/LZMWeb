<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<form action="index.php" method="post" class="navbar-form">
    <div class="list-group col-md-6">
    <ul class="list-group">
    <?php
        $DisplayAllThemesSHOW = FALSE;
        include_once 'DisplayAllThemes.php';
    ?>
    </ul>
    </div>
    <div class="list-group col-md-6">
        <div class="">
            <label for="theme" style="width: 100%">Weitere Themen mit Komma trennen!</label>
            <input type="text" style="width: 100%" name="theme" class="form-control" id="theme" placeholder="Thema">
        </div>
        <div class="" style="margin-top: 20px">
            <label for="bookmark" style="width: 100%">Lesezeichen URL</label>
            <input type="text" style="width: 100%" name="bookmark" class="form-control" id="bookmark" placeholder="Lesezeichen">
        </div>
        <button type="submit" style="margin-top: 20px;" class="btn btn-default">Lesezeichen erstellen</button>
    </div>
    
</form>