<?php include '../view/header.php'; ?>
<main>
    <h1>View/Update Customer</h1>
    <form action="index.php" method="post" id="edit_customer_form">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <input type="hidden" name="action" value="update_customer">

        <label>First Name:</label>
        <input type="text" name="fname"
               value="<?php echo $customers['firstName']; ?>"><br>

        <label>Last Name:</label>
        <input type="text" name="lname"
               value="<?php echo $customers['lastName']; ?>"><br>
        
        <label>Address:</label>
        <input type="text" name="address" size="45"
               value="<?php echo $customers['address']; ?>"><br>
        
        <label>City:</label>
        <input type="text" name="city"
               value="<?php echo $customers['city']; ?>"><br>
        
        <label>State:</label>
        <input type="text" name="state"
               value="<?php echo $customers['state']; ?>"><br>
        
        <label>Postal Code:</label>
        <input type="text" name="zip"
               value="<?php echo $customers['postalCode']; ?>"><br>
        
        <label>Country Code:</label>
        <input type="text" name="country" size="5"
               value="<?php echo $customers['countryCode']; ?>"><br>
        
        <label>Phone:</label>
        <input type="text" name="phone"
               value="<?php echo $customers['phone']; ?>"><br>
        
        <label>Email:</label>
        <input type="text" name="email" size="40"
               value="<?php echo $customers['email']; ?>"><br>
        
        <label>Password:</label>
        <input type="text" name="password"
               value="<?php echo $customers['password']; ?>"><br>
        
        <label>&nbsp;</label>
        <input type="submit" value="Update Customer"><br>
        </form>
    <p class="last_paragraph">
        <a href="index.php?action=list_customers">Search Customers</a>
    </p>

</main>
<?php include '../view/footer.php'; ?>
