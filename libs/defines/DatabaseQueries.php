<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$querys = [
    "getLinksWithoutUser" => "select Links.link from Links " +
                "inner join Relation " +
                "on Links.id = Relation.link " +
                "inner join Theme " +
                "on Theme.id = Relation.theme " +
                "where Theme.theme = '?' and Links.user = ''",
    "getLinksWithUser" => "select Links.link from Links " +
                "inner join Relation " +
                "on Links.id = Relation.link " +
                "inner join Theme " +
                "on Theme.id = Relation.theme " +
                "where Theme.theme = '?' and Links.user = ? "
];