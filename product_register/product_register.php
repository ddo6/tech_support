<?php include '../view/header.php'; ?>
<main>
    <h1>Register Product</h1>
    <div id="main">
        <form action="." method="post" id="register_form">
            <input type="hidden" name="action" value="register_product">
            
            <input type="hidden" name="customer" value="<?php echo $customer['customerID']; ?>">
            
            <label>Customer: <?php echo $customer['firstName'] . " ". $customer['lastName']; ?></label>
            
            <label>Product:</label>
            <select name="code">
                <?php foreach ($products as $product) : ?>
                    <option value="<?php echo $product['productCode']; ?>">
                        <?php echo $product['name']; ?>
                    </option>
                <?php endforeach; ?>
            </select>
            <input type="submit" value="Register Product">
        </form>
    </div>
</main>
<?php include '../view/footer.php'; ?>