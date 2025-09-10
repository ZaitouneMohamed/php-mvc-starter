
    <?php include 'includes/navbar.php'; ?>

  <section id="home" style="padding: 20px;">
    <h1>Home</h1>
    <p>Welcome to the home page!</p>
  </section>

  <?php $title = $data['title'] ?? 'Default Title'; ?>
  <h2><?php echo htmlspecialchars($title); ?></h2>

    <?php include 'includes/footer.php'; ?>
