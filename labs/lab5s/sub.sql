SELECT *
FROM    Employee e LEFT JOIN
        EmployeePay ep ON e.EmployeeID = ep.EmployeeID
WHERE   ep.EffectiveDate =
        (SELECT MAX(EffectiveDate)
        FROM EmployeePay eps
        WHERE eps.EmployeeID = ep.EmployeeID)