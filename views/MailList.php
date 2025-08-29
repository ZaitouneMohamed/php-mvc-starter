    <?php include 'includes/navbar.php'; ?>

    <br>

    <a href="/mail/create">create</a>

    <table border="1" cellpadding="5" cellspacing="0">
        <thead>
            <tr>
                <th>ID</th>
                <th>Mail</th>
                <th>Etat</th>
                <th>Deleted At</th>
                <th>Created At</th>
                <th>Updated At</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data as $item): ?>
                <tr>
                    <td><?php echo htmlspecialchars($item['id']); ?></td>
                    <td><?php echo htmlspecialchars($item['mail']); ?></td>
                    <td><?php echo htmlspecialchars($item['etat']); ?></td>
                    <td><?php echo htmlspecialchars($item['deleted_at'] ?? ''); ?></td>
                    <td><?php echo htmlspecialchars($item['created_at']); ?></td>
                    <td><?php echo htmlspecialchars($item['updated_at']); ?></td>
                    <td>
                        <a href="/mail/details?id=<?= $item['id'] ?>">details</button>
                    </td>

                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>