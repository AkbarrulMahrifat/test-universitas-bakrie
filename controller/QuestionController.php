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

        // Validasi karakter input
        $inputQuestions = str_replace(' ', '', $inputQuestions); // menghapus spasi
        $inputQuestions = preg_replace('/\s+/', '', $inputQuestions); // menghapus spasi berlebih
        $inputQuestions = preg_replace('/[^\d,]/', '', $inputQuestions); // menghapus karakter selain angka dan koma

        if (preg_match('/[^0-9,]/', $inputQuestions)) {
            $error[] = 'Soal hanya boleh berisi angka dan koma.';
        }

        //set variable questions dan target
        $arrayQuestions = explode(',', $inputQuestions);
        $questions = array_map('intval', $arrayQuestions);
        $target = intval($inputTarget);

        //validasi questiosns dan target
        $inputQuestions = trim($inputQuestions);
        if (count($questions) > 10) {
            $error[] = 'Jumlah soal tidak boleh lebih dari 10.';
        }
        if ($target < 10 || $target > 100) {
            $error[] = 'Target nilai harus berada dalam rentang 10 - 100.';
        }
        if (count($questions) < 1) {
            $error[] = 'Minimal 1 soal harus diisi.';
        }
        if (count($questions) != count(array_filter($questions))) {
            $error[] = 'Soal tidak boleh berisi angka nol.';
        }
        if (count($questions) != count(array_filter($questions, function ($q) {
            return $q > 0;
        }))) {
            $error[] = 'Soal harus berisi angka positif.';
        }

        if (!empty($error)) {
            require 'view/form.php';
            return;
        }

        $model = new QuestionModel();
        $targetCombinations = $model->findCombinations($questions, $target);
        $totalCombinations = count($targetCombinations);

        require 'view/form.php';
        require 'view/result.php';
    }
}
