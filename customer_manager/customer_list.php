<?php include '../view/header.php'; ?>
<main>
    <h1>Customer List</h1>

    <div id="main">
        <!-- search customers by last name -->
        <form action="index.php" method="post" id="search_customer">
            <input type="hidden" name="action" value="search_customer">
            <input type="text" name="lname" value="">
            <input type="submit" value="Search"><br>
        </form>
        <!-- display a table of customers -->
        <table>
            <tr>
                <th>Name</th>
                <th>Email Address</th>
                <th>City</th>
                <th>&nbsp;</th>
            </tr>
            <?php foreach ($customers as $customer) : ?>
            <tr>
                <td><?php echo $customer['firstName'] . " ". $customer['lastName']; ?></td>
                <td><?php echo $customer['email']; ?></td>
                <td><?php echo $customer['city']; ?></td>
                <!-- select the customer -->
                <td><form action="" method="post">
                    <input type="hidden" name="action"
                           value="show_customer">
                    <input type="hidden" name="id"
                           value="<?php echo $customer['customerID']; ?>">
                    <input type="submit" value="Select">
                </form></td>
            </tr>
            <?php endforeach; ?>
        </table>      
    </div>
</main>
<?php include '../view/footer.php'; ?>