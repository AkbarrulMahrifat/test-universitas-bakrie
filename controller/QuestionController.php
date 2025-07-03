<?php
require_once 'model/QuestionModel.php';

class QuestionController
{
    public function index()
    {
        require 'view/form.php';
    }

    public function process()
    {
        // input soal dan target dari form
        $inputQuestions = isset($_POST['soal']) ? $_POST['soal'] : '';
        $inputTarget = isset($_POST['target']) ? $_POST['target'] : '';

        // Validasi input
        $error = [];
        if (empty($inputQuestions) || empty($inputTarget)) {
            $error[] = 'Soal dan target tidak boleh kosong.';
        }

        //validasi soal
        $inputQuestions = trim($inputQuestions);
        if (preg_match('/[^0-9,]/', $inputQuestions)) {
            $error[] = 'Soal hanya boleh berisi angka dan koma.';
        }

        if (!empty($error)) {
            require 'view/form.php';
            return;
        }

        //set variable questions dan target
        $arrayQuestions = explode(',', $inputQuestions);
        $questions = array_map('intval', $arrayQuestions);
        $target = intval($inputTarget);

        $model = new QuestionModel();
        $targetCombinations = $model->findCombinations($questions, $target);
        $totalCombinations = count($targetCombinations);

        require 'view/form.php';
        require 'view/result.php';
    }
}
