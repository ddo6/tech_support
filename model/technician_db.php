<?php
function get_all_technicians() {
    global $db;
    $query = 'SELECT * FROM technicians
              ORDER BY techID';
    $statement = $db->prepare($query);
    $statement->execute();
    $technicians = $statement->fetchAll();
    return $technicians;
}

function get_technician($id) {
    global $db;
    $query = 'SELECT * FROM technicians
              WHERE techID = :id';
    $statement = $db->prepare($query);
    $statement->bindValue(":id", $id);
    $statement->execute();
    $technician = $statement->fetch();
    $statement->closeCursor();
    return $technician;
}

function delete_technician($id) {
    global $db;
    $query = 'DELETE FROM technicians
              WHERE techID = :id';
    $statement = $db->prepare($query);
    $statement->bindValue(':id', $id);
    $statement->execute();
    $statement->closeCursor();
}

function add_technician($id, $fname, $lname, $email, $phone, $password) {
    global $db;
    $query = 'INSERT INTO technicians
                 (techID, firstName, lastName, email, phone, password)
              VALUES
                 (:id, :fname, :lname, :email, :phone, :password)';
    $statement = $db->prepare($query);
    $statement->bindValue(':id', $id);
    $statement->bindValue(':fname', $fname);
    $statement->bindValue(':lname', $lname);
    $statement->bindValue(':email', $email);
    $statement->bindValue(':phone', $phone);
    $statement->bindValue(':password', $password);
    $statement->execute();
    $statement->closeCursor();
}
?>