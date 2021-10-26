<?php
// get the json
$json_employees = file_get_contents('employees.json');

// parse the json into an array (make it iterable) 
$array_employees = json_decode($json_employees,true);

// get the length of the employees array
$nbr = count($array_employees);

// declare an empty array for the filtered employees
$filtered_employees = array();

// loop over the employees array
for($x=0; $x<$nbr; $x++) {
    // get the registered year of the employee
    $registered_year = date('Y', strtotime($array_employees[$x]["registered"]));
    // get the last year (2020)
    $last_year=date("Y",strtotime("-1 year"));
    if($array_employees[$x]["isActive"]==1 && $registered_year==$last_year){
        $filtered_employees[] = $array_employees[$x];
    }
}
// create the filtered employees json
$returned_json= json_encode($filtered_employees);
echo $returned_json;
?>