<?php
require_once 'Model/QuestionModel.php';

class QuestionController
{
    public function index()
    {
        require 'View/form.php';
    }

    public function process()
    {
        $questions = [20, 30, 50, 10, 40];

        $model = new QuestionModel();
        $totalCombinations = $model->countCombinations($questions);

        require 'view/form.php';
    }
}
