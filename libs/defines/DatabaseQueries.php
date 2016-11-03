<?php

$queries = [
    "getLinksWithoutUser" => "select Links.link as link from Links inner join Relation on Links.id = Relation.link inner join Theme on Theme.id = Relation.theme where Theme.theme = ?",
    "getLinksWithUser" => "select Links.link from Links inner join Relation on Links.id = Relation.link inner join Theme on Theme.id = Relation.theme where Theme.theme = ? and Links.user = ? ",
    "getAllThemes" => "select theme from Theme",
    "getThemeId" => "select id from Theme where Theme.theme = ?",
    "setLink" => "insert into Links(link) values(?)",
    "setTheme" => "insert into Theme(theme) values(?)"
];