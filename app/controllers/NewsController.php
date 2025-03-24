<?php
require_once __DIR__ . '/../models/NewsModel.php';

class NewsController
{
    private $newsModel;

    public function __construct()
    {
        $this->newsModel = new NewsModel();
    }

    public function getAllNews()
    {
        return $this->newsModel->getAllNews();
    }

    public function getFeaturedNews()
    {
        return $this->newsModel->getFeaturedNews();
    }
}
