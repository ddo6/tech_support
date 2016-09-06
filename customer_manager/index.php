<?php
require('../model/database.php');
require('../model/customer_db.php');

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'list_customers';
    }
}

// customers
if ($action == 'list_customers') {
    // list all customers
    $customers = get_all_customers();
    include('customer_list.php');
} else if ($action == 'search_customer') {
    // search customers
    $lname = filter_input(INPUT_POST, 'lname');
    if ($lname == NULL || $lname == FALSE) {
        $error = "Missing or incorrect last name.";
        include('../errors/error.php');
    } else { 
        $customers = search_customer($lname);
        include('customer_list.php');
    }   
}  else if ($action == 'show_customer') {
    // call page to view or edit customer information
    $id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
    $customers = get_customer($id);
    include('customer_view.php');
}   else if ($action == 'update_customer') {
    // update customer information
    $id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
    $fname = filter_input(INPUT_POST, 'fname');
    $lname = filter_input(INPUT_POST, 'lname');
    $address = filter_input(INPUT_POST, 'address');
    $city = filter_input(INPUT_POST, 'city');
    $state = filter_input(INPUT_POST, 'state');
    $zip = filter_input(INPUT_POST, 'zip');
    $country = filter_input(INPUT_POST, 'country');
    $phone = filter_input(INPUT_POST, 'phone');
    $email = filter_input(INPUT_POST, 'email');
    $password = filter_input(INPUT_POST, 'password');
    if ($fname == NULL || $fname == FALSE || 
        $lname == NULL || $lname == FALSE || 
        $address == NULL || $address == FALSE || 
        $city == NULL || $city == FALSE || 
        $state == NULL || $state == FALSE || 
        $zip == NULL || $zip == FALSE || 
        $country == NULL || $country == FALSE || 
        $phone == NULL || $phone == FALSE ||
        $email == NULL || $email == FALSE || 
        $password == NULL || $password == FALSE) {
        $error = "Invalid customer data. Check all fields and try again.";
        include('../errors/error.php');
    } else { 
        update_customer($id, $fname, $lname, $address, $city, $state, $zip, $country, $phone, $email, $password);
        header("Location: .");
    }
}
?>