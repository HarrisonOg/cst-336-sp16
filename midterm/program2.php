<!--To be quote honest I feel like if I had another hour I could have gotten all the points for this program.-->
<!--I work way too slowly to get a good grade on this midterm.-->



<!DOCTYPE HTML>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="main.css">
  <!-- basic.html -->
  <title>Midterm Program 2</title>
 
</head>
<body>
  <h1>Midterm Program 2</h1>
  <br>
  <br>
  <p>Rubric</p>
<br>

                                <table border="1" width="600">
                                    <tbody><tr>
                                        <th>#</th>
                                        <th>Task Description</th>
                                        <th>Points</th>
                                    </tr>
                                    <tr style="background-color:#99E999">
                                        <td>1</td>
                                        <td>A report shows all female students ordered by last name, from A to Z</td>
                                        <td width="20" align="center">10</td>
                                    </tr>
                                    <tr style="background-color:#99E999">
                                        <td>2</td>
                                        <td>A report shows students that have assignments with a grade lower than 50, ordered by grade, in ascending order</td>
                                        <td width="20" align="center">15</td>
                                    </tr>
                                    <tr style="background-color:#FFC0C0">
                                        <td>3</td>
                                        <td>A report lists those assignments that have not been graded and their due date, ordered by due date, ascending</td>
                                        <td width="20" align="center">15</td>
                                    </tr>
                                    <tr style="background-color:#99E999">
                                        <td>4</td>
                                        <td>A report shows the Gradebook, which includes first name, last name, assignment title, and grade. It should be ordered by last name and assignment title </td>
                                        <td align="center">15</td>
                                    </tr>
                                    <tr style="background-color:#FFFFFF">
                                        <td>5</td>
                                        <td>A report lists each student along with his/her average grade, ordered by average grade, from highest to lowest</td>
                                        <td width="20" align="center">15</td>
                                    </tr>
                                    <tr style="background-color:#99E999">
                                        <td>6</td>
                                        <td>This rubric is properly included AND UPDATED (BONUS)</td>
                                        <td width="20" align="center">2</td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>T O T A L </td>
                                        <td width="20" align="center"><b></b></td>
                                    </tr>
                                </tbody></table>
                            
                            <br>
                            <br>
<?php

// Set the Cloud 9 MySQL related information...this is set in stone by C9!
    $servername = getenv('IP');
    $dbPort = 3306;
    
    // Which database (the name of the database in phpMyAdmin)?
    $database = "midterm";
    
    // My user information...I could have prompted for password, as well, or stored in the
    // environment, or, or, or (all in the name of better security)
    $username = "harrisonog";
    $password = "";
    
    // Establish the connection and then alter how we are tracking errors (look those keywords up)
    $dbConn = new PDO("mysql:host=$servername;port=$dbPort;dbname=$database", $username, $password);
    $dbConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
    
    
    //PART A
    // Structure the select
    $sql = "SELECT * FROM `m_students` WHERE `gender` LIKE 'F'";

    // Prepare the SQL...the DBMS uses this to figure out how best to execute the query
    $stmt = $dbConn->prepare($sql);
    
    // Execute the query
    $stmt -> execute ();
    
    echo "<br><br> Performing: Part A <br><br>";
    
    echo "<table>";
    echo "<tr><th>firstName</th><th>lastName</th></tr>";
    while($row = $stmt->fetch())  {
        echo"<tr><td>" . $row['firstName'] . "</td><td>" . $row['lastName'] . "</td></tr>";
    }
    
    echo "</table>";
    echo "<br />";
    echo "<br />";
    echo "<br />";
    
    
    //******************PART B
    //Structure the select
    $partBsql = "SELECT * FROM `m_students` INNER JOIN `m_gradebook` ON `m_students`.studentId=`m_gradebook`.studentId WHERE `grade` < 50 ORDER BY `grade`";
     // Prepare the SQL...the DBMS uses this to figure out how best to execute the query
    $Bstmt = $dbConn->prepare($partBsql);
    
    // Execute the query
    $Bstmt -> execute ();
    
    echo "<br /><br /> Performing: Part B <br /><br />";
  
  
    //table
    echo "<table>";
    echo "<tr><th>firstName</th><th>lastName</th><th>grade</th></tr>";
    while($rowB = $Bstmt->fetch()) {
        echo"<tr><td>" . $rowB['firstName'] . "</td><td>" . $rowB['lastName'] . "</td><td>" . $rowB['grade']."</td></tr>";
    }
    echo "</table>";
    echo "<br />";
    echo "<br />";
    echo "<br />";
    
    //******************Part C
    //Structure the select
    //$partCsql = "";
    //prepare the SQL    
    //$Cstmt = $dbConn->prepare($partCsql);
    //$Cstmt -> execute();
    
    echo "<br /><br /> Performing: Part C <br /><br />";
    echo "<table>";
    echo "<tr><th>firstName</th><th>lastName</th><th>grade</th></tr>";
    // while($rowC = $Cstmt->fetch()) {
        echo"<tr><td>" . $row['firstName'] . "</td><td>" . $row['lastName'] . "</td><td>" . $row['grade']."</td></tr>";
    // }
    echo "</table>";
    echo "<br />";
    echo "<br />";
    echo "<br />";
    
    //*******************Part D
    //Structure the select
    $partDsql = "SELECT `m_gradebook`.*, `m_students`.*, `m_assignments`.*"
        . "FROM `m_gradebook`"
        . " JOIN `m_students`"
        . " ON `m_students`.`studentId` = `m_gradebook`.`studentId`"
        . " JOIN `m_assignments`"
        . " ON `m_assignments`.`assignmentId` = `m_gradebook`.`assignmentId`"
        . "ORDER BY `m_students`.`lastName`, `m_assignments`.`title` LIMIT 0, 30 ";    
    //prepare the sql
    $Dstmt = $dbConn->prepare($partDsql);
    $Dstmt ->execute();
    //table
    echo "<br /><br /> Performing: Part D <br /><br />";
    
    echo "<table>";
    echo "<tr><th>firstName</th><th>lastName</th><th>title</th><th>grade</th></tr>";
    while($rowD = $Dstmt->fetch()) {
        echo"<tr><td>" . $rowD['firstName'] . "</td><td>" . $rowD['lastName'] . "</td><td>" . $rowD['title'] . "</td><td>" . $rowD['grade']."</td></tr>";
    }
    echo "</table>";
    echo "<br />";
    echo "<br />";
    echo "<br />";
    
    //*******************Part E
     //Structure the select
    $partEsql = "SELECT `m_gradebook`.*, `m_students`.*, `m_assignments`.*"
        . "FROM `m_gradebook`"
        . " JOIN `m_students`"
        . " ON `m_students`.`studentId` = `m_gradebook`.`studentId`"
        . " JOIN `m_assignments`"
        . " ON `m_assignments`.`assignmentId` = `m_gradebook`.`assignmentId`"
        . "ORDER BY `m_students`.`lastName`, `m_assignments`.`title` LIMIT 0, 30 ";  
    $Estmt = $dbConn->prepare($partEsql);
    $Estmt -> execute();
    
     echo "<br /><br /> Performing: Part D <br /><br />";
     echo "<table>";
     echo "<tr><th>studentId</th><th>firstName</th><th>lastName</th><th>gradeAverage</th></tr>";
     $ctr =1;
     $runTot =0;
     while($rowE = $Estmt->fetch()){
        if($ctr=3){
            $runTot += $rowE['grade'];
            $avg = $runTot / 3;
            echo"<tr><td>" . $rowE['studentId'] . "</td><td>" . $rowE['firstName'] . "</td><td>" . $rowE['lastName'] . "</td><td>" . $avg ."</td></tr>";
            $ctr = 1;
            $runTot = 0;
        }
        else{
            $runTot += $rowE['grade'];
            $ctr++;
        }
     }
    echo "</table>";
    echo "<br />";
    echo "<br />";
    echo "<br />";
?>

<footer></footer> 
</body>
</html>