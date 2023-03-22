<?php

require_once('../__connec.php');
require_once('../config/twig.php');

$table = "`character`";
$pdo = new \PDO(DSN, USER, PASS);
$query = "SELECT * FROM $table";
if (isset($_GET['team'])) {
    switch ($_GET['team']) {
        case 'incr8':
            $teamID = 1;
            break;
        case 'viv7':
            $teamID = 2;
            break;
        case 'vigilantes':
            $query .= " WHERE type_id = 4";
            break;
        case 'villains':
            $query .= " WHERE type_id = 3";
            break;
        default:
            $teamID = 0;
    }
}
if (isset($teamID) && $teamID > 0) {
    $query .= " WHERE team_id=$teamID";
}
$statement = $pdo->query($query);

$heroes = $statement->fetchAll(PDO::FETCH_CLASS, "StVivian\Character");

echo $twig->render('layout.html.twig', ['characters' => $heroes]);
