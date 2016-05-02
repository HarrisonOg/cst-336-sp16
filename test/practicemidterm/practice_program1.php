<?php


function letterList(){
    for($i=65; $i<=90; $i++)
    {
        $ch = char($i);
        echo "<option value=".$ch.">".$ch."</option>";
    }
}

function sizeList(){
    for($i=6; $i<=10; $i++)
    {
        echo "<option value=".$i.">".$i."</option>";
    }
}

?>

<!DOCTYPE html>
<html>
    <head>
        <title> </title>
        <link rel="stylesheet" type="text/css" href="practice1.css">
    </head>
    <body>
        <h1>Find the Letter!</h1>
        <br>
        <h3>Letter to find:</h3>
        <?php echo $_GET["findLetter"]; ?>
        <br>
        <h3>Size:</h3>
        <?php echo $_GET["size"]; ?>
        <br>
        <h3>Letter to Omit:</h3>
        <?php echo $_GET["excludeLetter"]; ?>
        <br>
    </body>
</html>