<?php
function get_all_products() {
    global $db;
    $query = 'SELECT * FROM products
              ORDER BY productCode';
    $statement = $db->prepare($query);
    $statement->execute();
    $products = $statement->fetchAll();
    return $products;
}

function get_product($code) {
    global $db;
    $query = 'SELECT * FROM products
              WHERE productCode = :code';
    $statement = $db->prepare($query);
    $statement->bindValue(":code", $code);
    $statement->execute();
    $product = $statement->fetch();
    $statement->closeCursor();
    return $product;
}

function delete_product($code) {
    global $db;
    $query = 'DELETE FROM products
              WHERE code = :code';
    $statement = $db->prepare($query);
    $statement->bindValue(':code', $code);
    $statement->execute();
    $statement->closeCursor();
}

function add_product($code, $name, $version, $date) {
    global $db;
    $query = 'INSERT INTO products
                 (productCode, name, version, releaseDate)
              VALUES
                 (:code, :name, :version, :date)';
    $statement = $db->prepare($query);
    $statement->bindValue(':code', $code);
    $statement->bindValue(':name', $name);
    $statement->bindValue(':version', $version);
    $statement->bindValue(':date', $date);
    $statement->execute();
    $statement->closeCursor();
}
?>