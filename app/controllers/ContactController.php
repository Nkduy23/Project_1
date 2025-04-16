<?php

namespace App\Controllers;

class ContactController
{
    public function contactPage()
    {
        require_once __DIR__ . '/../Views/pages/contact.php';
    }

    public function contactInfo()
    {
        require_once __DIR__ . '/../Views/pages/info.php';
    }

    public function contactNews()
    {
        require_once __DIR__ . '/../Views/pages/news.php';
    }
}
