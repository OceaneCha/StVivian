<?php
require_once('../__connec.php');
require_once('../config/twig.php');
?>
<!DOCTYPE html>
<html>

<head>
    <title>St Vivian — Vivacious 7</title>

    <meta charset="utf-8" />
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.2.0/mdb.min.css" rel="stylesheet" />
</head>

<body class="bg-light bg-gradient">
    <!--Main Navigation-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="nav navbar-nav me-auto">
                    <li class="navbar-item">
                        <a class="nav-link" href="index.html">
                            <i class="fas fa-home"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="incr8.html">Incredible 8</a>
                    </li>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="viv7.html">Vivacious 7</a>
                    </li>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="vigilantes.html">Vigilantes</a>
                    </li>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="villains.html">Villains</a>
                    </li>
                </ul>
                <ul class="nav navbar-nav ms-auto">
                    <li class="navbar-item">
                        <a class="nav-link" href="add.php">Add</a>
                    </li>
                </ul>
            </div>
        </div>


    </nav>
    <!--Main Navigation-->
    <main class="d-flex justify-content-center">
        <div class="container mt-2 row row-cols-1 row-cols-md-3 g-4">

            <?php
            use StVivian\Character;
            $character = new Character();
            $table = "`character`";
            $pdo = new \PDO(DSN, USER, PASS);
            if(isset($_GET['team'])) {
                switch ($_GET['team']) {
                    case 'incr8':
                        $teamID = 1;
                        $query = "SELECT * FROM $table where team_id=$teamID";
                        break;
                    case 'viv7':
                        $teamID = 2;
                        $query = "SELECT * FROM $table where team_id=$teamID";
                        break;
                    case 'vigilantes':
                        $query = "SELECT * FROM $table where type_id=4";
                        break;
                    case 'villains':
                        $query = "SELECT * FROM $table where type_id=3";
                        break;
                    default:
                        $query = "SELECT * FROM $table";
                }
            } else {
                $query = "SELECT * FROM $table";
            }
            $statement = $pdo->query($query);

            $heroes = $statement->fetchAll(PDO::FETCH_CLASS, "StVivian\Character");
            
            $civilian = false;

            foreach($heroes as $hero){
                if ($hero->getTeamId() != null) {
                    $civilian = false;
                    $id = $hero->getTeamId();
                    $query = "SELECT name FROM team WHERE id=$id";
                    $statement = $pdo->query($query);

                    $teams = $statement->fetchAll(PDO::FETCH_OBJ);
                } else {
                    $civilian = true;
                }?>
                <div class="col">
                    <div class="card border border-dark bg-dark text-white mb-3 h-100">
                        <img src="<?=$hero->getPicture()?>" class="card-img-top"
                            alt="" />
                        <div class="card-body">
                            <h5 class="card-title"><?=($hero->getFirstname() != null) ? 'AKA '.$hero->getFirstname().' '.$hero->getLastname() : $hero->getAlias()?></h5>
                            <p class="card-text"><?=($hero->getBiography() != null) ? $hero->getBiography() : "Biography not available."?></p>
                        </div>
                        <div class="card-footer text-center">
                            <?php if (!$civilian) {
                                foreach($teams as $team) {?>
                            <small class="text-muted"><?=$team->name?></small>
                            <?php }} else {?>
                            <small class="text-muted">Civilian</small>
                            <?php } ?>
                        </div>
                    </div>                    
                </div>
            <?php } ?>
        </div>
    </main>
    <!--Main layout-->

    <!--Footer-->
    <footer>

    </footer>
    <!--Footer-->
</body>

</html>