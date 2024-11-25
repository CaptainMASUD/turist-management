<h3>Manage Users</h3>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Username</th>
            <th>Address</th>
            <th>Role</th>

        </tr>
    </thead>
    <tbody>
        <?php while ($user = $users->fetch_assoc()): ?>
            <tr>
                <td><?= $user['id'] ?></td>
                <td><?= $user['name'] ?></td>
                <td><?= $user['username'] ?></td>
                <td><?= $user['address'] ?></td>
                <td><?= $user['role'] ?></td>
               
            </tr>
        <?php endwhile; ?>
    </tbody>
</table>
