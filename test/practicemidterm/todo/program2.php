
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
                                    <tr style="background-color:#FFFFFF">
                                        <td>2</td>
                                        <td>A report shows students that have assignments with a grade lower than 50, ordered by grade, in ascending order</td>
                                        <td width="20" align="center">15</td>
                                    </tr>
                                    <tr style="background-color:#FFC0C0">
                                        <td>3</td>
                                        <td>A report lists those assignments that have not been graded and their due date, ordered by due date, ascending</td>
                                        <td width="20" align="center">15</td>
                                    </tr>
                                    <tr style="background-color:#FFC0C0">
                                        <td>4</td>
                                        <td>A report shows the Gradebook, which includes first name, last name, assignment title, and grade. It should be ordered by last name and assignment title </td>
                                        <td align="center">15</td>
                                    </tr>
                                    <tr style="background-color:#FFC0C0">
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
        echo"<tr><td>" . $row['firstName'] . "</td><td>" . $row['lastName'] . "</td><td>" . $row['grade']."</td></tr>";
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
    
    
    //*******************Part D
    //Structure the select
    $partDsql = "";
    //prepare the sql
    
    
    
?>

<footer></footer> 
</body>
</html>