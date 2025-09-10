<?php

declare(strict_types=1);

namespace App\Controller;
use Config\ValidationException;
use App\Model\Mail as MailModel;

final class MailController
{
    public static function index()
    {
        view('MailList', [
            'data' => MailModel::getAllMails($GLOBALS['pdo'])
        ]);
    }

    public static function show()
    {
        $id = $_GET['id'] ?? null;
        view('mailDetails', [
            'data' => MailModel::getMailById($GLOBALS['pdo'], $id)
        ]);
    }

    public static function create()
    {
        // Logic for showing a form to create a new mail
        view('mailCreate');
    }

    public static function store()
    {
        $validator = new ValidationException();

        // Validate required
        $validator->required('mail', $_POST['mail'] ?? '');

        // Validate email format
        $validator->email('mail', $_POST['mail'] ?? '');

        // Check if there are errors
        if ($validator->hasErrors()) {
             view('mailCreate', [
                'errors' => $validator->getErrors(),
                'old' => $_POST,
            ]);
            return;
        }
        echo "Storing new mail...";
    }
}
