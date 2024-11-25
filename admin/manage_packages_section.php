<h3>Manage Packages</h3>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Hotel Name</th>
            <th>Bed Type</th>
            <th>Price</th>
            <th>Status</th>
           
        </tr>
    </thead>
    <tbody>
        <?php while ($package = $packages->fetch_assoc()): ?>
            <tr>
                <td><?= $package['id'] ?></td>
                <td><?= $package['hotel_name'] ?></td>
                <td><?= $package['bed_type'] ?></td>
                <td><?= $package['price'] ?></td>
                <td><?= $package['status'] ?></td>
               
            </tr>
        <?php endwhile; ?>
    </tbody>
</table>
