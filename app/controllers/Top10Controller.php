<?php
require_once __DIR__ . '/../models/Top10Model.php';

class Top10Controller
{
    private $top10Model;

    public function __construct()
    {
        $this->top10Model = new Top10Model();
    }

    public function getTop10()
    {
        return $this->top10Model->getTop10();
    }
}
