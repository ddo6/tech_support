<?php
require('../model/database.php');
require('../model/technician_db.php');

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'list_technicians';
    }
}

// technicians
if ($action == 'list_technicians') {
    // list all technicians
    $technicians = get_all_technicians();
   include('technician_list.php');
} else if ($action == 'delete_technician') {
    // delete a technician
    $id = filter_input(INPUT_POST, 'id');
    if ($id == NULL || $id == FALSE) {
        $error = "Missing or incorrect technician ID.";
        include('../errors/error.php');
    } else { 
        delete_technician($id);
        header("Location: .");
    }
} else if ($action == 'show_add_form') {
    // call page to add a technician
    include('technician_add.php');    
} else if ($action == 'add_technician') {
    // add a technician
    $fname = filter_input(INPUT_POST, 'fname');
    $lname = filter_input(INPUT_POST, 'lname');
    $email = filter_input(INPUT_POST, 'email');
    $phone = filter_input(INPUT_POST, 'phone');
    $password = filter_input(INPUT_POST, 'password');
    if ($fname == NULL || $fname == FALSE || 
        $lname == NULL || $lname == FALSE || 
        $email == NULL || $email == FALSE || 
        $phone == NULL || $phone == FALSE ||
        $password == NULL || $password == FALSE) {
        $error = "Invalid technician data. Check all fields and try again.";
        include('../errors/error.php');
    } else { 
        add_technician($id, $fname, $lname, $email, $phone, $password);
        header("Location: .");
    }
}
?>