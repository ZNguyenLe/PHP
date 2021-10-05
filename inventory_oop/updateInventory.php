<!DOCTYPE html>
<html>
<head>
    <title>UPDATE Inventory Database</title>
</head>

<body style="background-color: rgb(229,243,247);">
<h3>UPDATING inventory in the Database</h3>
<h4>Programmed by Nguyen Le</h4>
    <?php
        require_once('includes/bootstrap.php');

        $title = trim($_POST['Title']);
        $director = trim($_POST['Director']);
        $album = trim($_POST['Album']);
        //find the movie with the ::find method

        $movie = Movie::find($dbc, $title);
        $movie->setDirector($director);
        $result = $movie->update($dbc);

        $music = Music::find($dbc, $title);
        $music->setAlbum($album);
        $result = $music->update($dbc);
 
        if ($result) {
            echo "The UPDATE query was successful.";
        }   else {
            echo "The UPDATE query FAILED!";
        }
    ?>
</body>
</html>
