<?php require_once 'includes/navbar.php'  ?>

<div class="container my-5">
  <div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Posts</h2>
    <button class="btn btn-success">
      <i class="fas fa-plus me-2"></i>Add Post
    </button>
  </div>

  <div class="table-responsive">
    <table class="table table-bordered align-middle table-hover">
      <thead class="table-dark">
        <tr>
          <th>Username</th>
          <th>Title</th>
          <th>Description</th>
          <th>Image</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <!-- Sample Row -->
         <?php foreach ($data as $item) : ?>
            <tr>
              <td><?= htmlspecialchars($item['username']) ?></td>
              <td><?= htmlspecialchars($item['title']) ?></td>
              <td><?= htmlspecialchars($item['description']) ?></td>
              <td><img src="https://via.placeholder.com/80x60" alt="Post Image" class="post-img" /></td>
              <td class="action-buttons">
                <button class="btn btn-info btn-sm">
                  <i class="fas fa-eye"></i> Show
                </button>
                <button class="btn btn-primary btn-sm">
                  <i class="fas fa-edit"></i> Update
                </button>
                <button class="btn btn-danger btn-sm">
                  <i class="fas fa-trash"></i> Delete
                </button>
              </td>
            </tr>
           <?php endforeach ?>

        <!-- You can copy this <tr> for more posts -->
      </tbody>
    </table>
  </div>
</div>

<?php require_once 'includes/footer.php'  ?>

