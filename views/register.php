<!-- register.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    <div class="container mt-5">
        <h2 class="mb-4">Register</h2>
        <form action="/register-auth" method="POST">
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" name="username" value="<?= htmlspecialchars($old['username'] ?? '') ?>">
                <?php if (!empty($errors['username'])): ?>
                    <div>
                        <?= htmlspecialchars(implode(', ', $errors['username'])) ?>
                    </div>
                <?php endif; ?>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" id="email" value="<?= htmlspecialchars($old['email'] ?? '') ?>" name="email">
                <?php if (!empty($errors['email'])): ?>
                    <div>
                        <?= htmlspecialchars(implode(', ', $errors['email'])) ?>
                    </div>
                <?php endif; ?>
            </div>
            <div class="mb-3 position-relative">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="register-password" name="password">
                <button type="button" class="btn btn-sm btn-outline-secondary position-absolute top-50 end-0 translate-middle-y me-2" onclick="togglePassword('register-password', this)">Show</button>
                <?php if (!empty($errors['password'])): ?>
                    <div>
                        <?= htmlspecialchars(implode(', ', $errors['password'])) ?>
                    </div>
                <?php endif; ?>
            </div>
            <button type="submit" class="btn btn-primary">Register</button>
            <p class="mt-3">Already have an account? <a href="/login">Login</a></p>
        </form>
    </div>

    <script>
        function togglePassword(inputId, button) {
            const input = document.getElementById(inputId);
            if (input.type === "password") {
                input.type = "text";
                button.textContent = "Hide";
            } else {
                input.type = "password";
                button.textContent = "Show";
            }
        }
    </script>
</body>

</html>