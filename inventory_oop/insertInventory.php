<!DOCTYPE html>
<html>
    <head>
        <title>Insert Inventory</title>
    </head>
    <body style="background-color: rgb(229,243,247);">
        <?php
            // setting variables to access database
            require_once('includes/bootstrap.php');
        
            $title = trim($_POST['Title']);
            $productionCompany = trim($_POST['ProductionCompany']);
            $yearReleased = trim($_POST['YearReleased']);

            if(isset($_POST['submitMovie'])) {
                $director = trim($_POST['Director']);
                $newMovie = new Movie(0, $title, $productionCompany, $yearReleased, $director);
                $result = $newMovie->create($dbc);
            } else if(isset($_POST['submitMusic'])) {
                $album = trim($_POST['Album']);
                $newMusic = new Music(0, $title, $productionCompany, $yearReleased, $album);
                $result = $newMusic->create($dbc);
            }

            if($result) {
                echo "The query was successfuly executed!";
            } else {
                echo "The query could not be executed";
            }
        ?>
    </body>
</html>