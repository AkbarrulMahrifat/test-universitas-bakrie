<?php
class QuestionModel
{
    public function countCombinations($points, $target = 100)
    {
        $memo = [];

        return $this->countWays(0, 0, $points, $target, $memo);
    }

    private function countWays($i, $currentSum, $points, $target, &$memo)
    {
        if ($currentSum == $target) return 1;

        if ($i >= count($points) || $currentSum > $target) return 0;

        $key = $i . '-' . $currentSum;

        if (isset($memo[$key])) return $memo[$key];

        $include = $this->countWays($i + 1, $currentSum + $points[$i], $points, $target, $memo);

        $exclude = $this->countWays($i + 1, $currentSum, $points, $target, $memo);

        $memo[$key] = $include + $exclude;

        return $memo[$key];
    }
}
