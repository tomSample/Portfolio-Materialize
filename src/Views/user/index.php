<h1>Users</h1>
<ul>
    <?php foreach ($users as $user): ?>
        <li><?php echo $user['prenom'] . ' ' . $user['nom'] . ' (' . $user['email'] . ')'; ?></li>
    <?php endforeach; ?>
</ul>
