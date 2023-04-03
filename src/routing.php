<?php
$urlPath = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

/* $table = "`character`";
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

$heroes = $statement->fetchAll(PDO::FETCH_CLASS, "StVivian\Character"); */

// Routing
// Show all heroes:     /
//   +filter by team:   /team?id=# or /type?id=#
// Show one character:  /character?id=#
//   +edit              /edit?id=#
//   +delete            /delete?id=#
// Add one character:   /add
$routing = new \StVivian\Controllers\CharacterController();
if ('/' === $urlPath) {
    echo $routing->showCharacters();
} elseif ('/add' === $urlPath) {
    // Add
    echo $routing->showForm();
} elseif (isset($_GET['id'])) {
    if ('/team' === $urlPath) {
    // Show Team
        echo $routing->showCharacters(filter: 'team', id: $_GET['id']);
    } elseif ('/type' === $urlPath) {
    // Show Type
        echo $routing->showCharacters(filter: 'type', id: $_GET['id']);
    } elseif ('/character' === $urlPath) {
    // Show Character
    } elseif ('/edit' === $urlPath) {
    // Edit
    } elseif ('/delete' === $urlPath) {
    // Delete
    }
} else {
    exit(header('HTTP/1.1 404 Not Found'));
}
