<?php
// middlewares/auth.php

if (empty($_SESSION['user'])) {
    //http_response_code(403);
    // header('Location: /login');
    exit;
}
