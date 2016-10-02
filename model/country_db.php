<?php
function get_all_countries() {
    global $db;
    $query = 'SELECT * FROM countries
              ORDER BY countryCode';
    $statement = $db->prepare($query);
    $statement->execute();
    $countries = $statement->fetchAll();
    return $countries;
}
?>

