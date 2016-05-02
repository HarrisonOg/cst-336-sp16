<!DOCTYPE html>
<html>
    <head>
        <title> </title>
    </head>
    <body>
        <div>
            <?php
            $saltedAndHashedPassword = hash("sha1","gH_*" . $_POST["password"] . "_9\$xP");
            echo $saltedAndHashedPassword;
            ?>
        </div>
    </body>
</html>