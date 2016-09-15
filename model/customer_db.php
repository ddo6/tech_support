<?php
function get_all_customers() {
    global $db;
    $query = 'SELECT * FROM customers
              ORDER BY customerID';
    $statement = $db->prepare($query);
    $statement->execute();
    $customers = $statement->fetchAll();
    return $customers;
}

function get_customer($id) {
    global $db;
    $query = 'SELECT * FROM customers
              WHERE customerID = :id';
    $statement = $db->prepare($query);
    $statement->bindValue(":id", $id);
    $statement->execute();
    $customer = $statement->fetch();
    $statement->closeCursor();
    return $customer;
}

function get_customer_by_email($email) {
    global $db;
    $query = 'SELECT * FROM customers WHERE email = :email';
    $statement = $db->prepare($query);
    $statement->bindValue(':email', $email);
    $statement->execute();
    $customer = $statement->fetch();
    $statement->closeCursor();
    return $customer;
}

function search_customer($lname) {
    global $db;
    $query = 'SELECT * FROM customers
              WHERE lastName = :lname';
    $statement = $db->prepare($query);
    $statement->bindValue(":lname", $lname);
    $statement->execute();
    $customers = $statement->fetchAll();
    return $customers;
}

function update_customer($id, $fname, $lname, $address, $city, $state, $zip, $country, $phone, $email, $password) {
    global $db;
    $query = 'UPDATE customers
              SET firstName = :fname, lastName = :lname,
                  address = :address, city = :city, state = :state, postalCode = :zip, countryCode = :country,
                  phone = :phone, email = :email, password = :password
              WHERE customerID = :id';
    $statement = $db->prepare($query);
    $statement->bindValue(':id', $id);
    $statement->bindValue(':fname', $fname);
    $statement->bindValue(':lname', $lname);
    $statement->bindValue(':address', $address);
    $statement->bindValue(':city', $city);
    $statement->bindValue(':state', $state);
    $statement->bindValue(':zip', $zip);
    $statement->bindValue(':country', $country);
    $statement->bindValue(':phone', $phone);
    $statement->bindValue(':email', $email);
    $statement->bindValue(':password', $password);
    $statement->execute();
    $statement->closeCursor();
}

function is_valid_customer_login($email) {
    global $db;
    $query = '
        SELECT * FROM customers
        WHERE email = :email';
    $statement = $db->prepare($query);
    $statement->bindValue(':email', $email);
    $statement->execute();
    $valid = ($statement->rowCount() == 1);
    $statement->closeCursor();
    return $valid;
}
?>