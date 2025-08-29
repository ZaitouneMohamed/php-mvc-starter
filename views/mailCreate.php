    <?php include 'includes/navbar.php'; ?>

    <br>
    <form action="/mail/store" method="post" style="width: 50%; margin: auto;">
        <input type="hidden" name="">
        <div class="mb-3">
            <label for="emailInput" class="form-label">Email address</label>
            <input type="text" class="form-control" name="mail" placeholder="Enter your email">
            <?php if (!empty($errors['mail'])): ?>
                <div class="invalid-feedback">
                    <?= htmlspecialchars(implode(', ', $errors['mail'])) ?>
                </div>
            <?php endif; ?>
        </div><br>

        <label class="form-label">Status</label>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="status" id="activeRadio" value="1" checked>
            <label class="form-check-label" for="activeRadio">
                Active (1)
            </label>
        </div>
        <div class="form-check mb-3">
            <input class="form-check-input" type="radio" name="status" id="inactiveRadio" value="0">
            <label class="form-check-label" for="inactiveRadio">
                Inactive (0)
            </label>
        </div>
        <?php if (!empty($errors['status'])): ?>
            <div class="text-danger mb-3">
                <?= htmlspecialchars(implode(', ', $errors['status'])) ?>
            </div>
        <?php endif; ?>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>