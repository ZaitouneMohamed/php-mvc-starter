    <?php include 'includes/navbar.php'; ?>
    <h1>Mail Details</h1>  
    <p><strong>ID:</strong> <?php echo htmlspecialchars($data['id']); ?></p>
    <p><strong>Mail:</strong> <?php echo htmlspecialchars($data['mail']); ?></p>
    <p><strong>Etat:</strong> <?php echo htmlspecialchars($data['etat']);
    ?></p>
    <p><strong>Deleted At:</strong> <?php echo htmlspecialchars($data['deleted_at'] ?? ''); ?></p>
    <p><strong>Created At:</strong> <?php echo htmlspecialchars($data['created_at']); ?></p>
    <p><strong>Updated At:</strong> <?php echo htmlspecialchars($data['updated_at']); ?></p>
</body>

<?php include 'includes/footer.php'; ?>