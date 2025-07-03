<?php
class QuestionModel
{
    public function findCombinations($questions, $target = 100)
    {
        $result = [];
        $this->findWays(0, [], 0, $questions, $target, $result);
        return $result;
    }

    private function findWays($i, $currentCombo, $currentSum, $questions, $target, &$result)
    {
        if ($currentSum == $target) {
            // Simpan kombinasi
            $result[] = $currentCombo;
            return;
        }

        if ($i >= count($questions) || $currentSum > $target) {
            return;
        }

        // reformat key dari question yang dipilih
        $newFormatQuestion['Pertanyaan ' . $i + 1] = $questions[$i];

        // Pilih poin ke-i
        $this->findWays(
            $i + 1,
            array_merge($currentCombo, $newFormatQuestion),
            $currentSum + $questions[$i],
            $questions,
            $target,
            $result
        );

        // Lewati poin ke-i
        $this->findWays(
            $i + 1,
            $currentCombo,
            $currentSum,
            $questions,
            $target,
            $result
        );
    }
}
