<?php
// middlewares/auth.php

if (!isset($_SESSION)) {
    session_start();
}

if (empty($_SESSION['user'])) {
    http_response_code(403);
    // header('Location: /login');
    exit;
}
