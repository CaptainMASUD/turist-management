<h3>Payment History</h3>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Payment ID</th>
            <th>User Name</th>
            <th>Package Name</th>
            <th>Payment Method</th>
        </tr>
    </thead>
    <tbody>
        <?php
        // Query to fetch payment data (without payment_details and payment_date)
        $payments = $conn->query("SELECT payments.id as payment_id, users.name as user_name, packages.hotel_name as package_name, 
                                  payments.payment_method
                                  FROM payments
                                  JOIN users ON payments.user_id = users.id
                                  JOIN packages ON payments.package_id = packages.id");

        // Loop through the payments data and display it
        while ($payment = $payments->fetch_assoc()):
        ?>
            <tr>
                <td><?= $payment['payment_id'] ?></td>
                <td><?= $payment['user_name'] ?></td>
                <td><?= $payment['package_name'] ?></td>
                <td><?= $payment['payment_method'] ?></td>
            </tr>
        <?php endwhile; ?>
    </tbody>
</table>
