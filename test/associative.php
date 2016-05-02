<?php
    
    $firstEmployee = ["name" => "Jason",
                    "department" => null];

    $itDepartment = ["name" => "IT",
                    "employees" => [$firstEmployee]];
                    
    $firstEmployee["department"] = $itDepartment;
    
var_dump($firstEmployee);
?>