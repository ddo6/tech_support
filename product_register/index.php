<?php
require('../model/database.php');
require('../model/customer_db.php');
require('../model/product_db.php');
require('../model/registration_db.php');

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {        
        $action = 'view_login';
        if (isset($_SESSION['user'])) {
            $action = 'register_product';
        }
    }
}

switch($action) {
    case 'view_login':
        // Clear login data
        $email = '';
        
        include 'customer_login.php';
        break;
    case 'login':
        $email = filter_input(INPUT_POST, 'email');
        if (is_valid_customer_login($email)) {
            $customer = get_customer_by_email($email);
            $products = get_all_products();
            include 'product_register.php';
        } else {
            $error_message = 'Login failed. Invalid email.';
            include 'customer_login.php';
        }
        break;
    case 'register_product':
        $customer = filter_input(INPUT_POST, 'customer');
        $code = filter_input(INPUT_POST, 'code');
        $date = date('Y-m-d');
        add_registration($customer, $code, $date);
        include 'registration_confirmation.php';
        break;
    default:
        display_error("Unknown action: " . $action);
        break;
}

?>