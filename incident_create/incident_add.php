<?php include '../view/header.php'; ?>
<main>
    <h1>Register Product</h1>
    <div id="main">
        <form action="." method="post" id="incident_form">
            <input type="hidden" name="action" value="create_incident">
            
            <input type="hidden" name="customer_id" value="<?php echo $customer['customerID']; ?>">
            
            <label>Customer: <?php echo $customer['firstName'] . " ". $customer['lastName']; ?></label>
            
            <label>Product:</label>
            <select name="product">
                <?php foreach ($registrations as $registration) : ?>
                    <option value="<?php echo $registration['productCode']; ?>">
                        <?php echo $registration['name']; ?>
                    </option>
                <?php endforeach; ?>
            </select>
            
            <label>Title:</label>
            <input type="text" name="title" />
            <br />
            
            <label>Description:</label>
            <textarea name="description"></textarea>
            
            <input type="submit" value="Create Incident" />
        </form>
    </div>
</main>
<?php include '../view/footer.php'; ?>