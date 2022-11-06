<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Two_Way
{
    public function algoritma($text, $word)
    {
        // $text = "#basketball";
        // $word = "#bask";
        $n = strlen($text) - 1;
        $m = strlen($word) - 1;
        $results = $this->runner($text, $word, $n, $m);

        return $results;
    }


    function runner($text, $word, $n, $m)
    {
        $l1 = [];
        $x = $this->constant_space($word, $m);
        $use_memory = true;
        $index = $x[0];
        $p = $x[1];

        if ($index - 1 > $m / 2 || !substr($word, $index, $index + $p) == substr($word, 1, $index)) {
            $p = max(strlen(substr($word, 1, $index)), strlen(substr($word, $index)) + 1);
            $use_memory = false;
        }
        $i = 1;
        $memory = 0;

        while ($i <= $n - $m + 1) {
            $j = max($index - 1, $memory);
            while ($j < $m && $text[$i + $j] == $word[$j + 1])
                $j++;
            if ($j < $m) {
                $i = $i + $j + 2 - $index;
                $memory = 0;
                continue;
            }
            $j = max($index - 1, $memory);
            while ($j > $memory && $text[$i + $j - 1] == $word[$j])
                $j--;

            if ($j == $memory) {
                array_push($l1, $i);
            }

            $i += $p;
            $memory = $use_memory ? $m - $p : 0;
        }
        return $l1;
    }

    function constant_space($text, $n)
    {
        $x = $this->constant_space1($text, $n, true);
        return $x;
    }

    function constant_space1($text, $n, $flag)
    {
        $out = 1;
        $p = 1;
        $i = 2;

        while ($i <= $n) {
            $r = ($i - $out) % $p;
            if ($text[$i] == $text[$out + $r]) $i++;
            else if ($this->less_or_great($text[$i], $text[$out + $r], $flag)) {
                $p = $i + 1 - $out;
                $i++;
            } else {
                $out = $i - $r;
                $i = $i - $r + 1;
                $p = 1;
            }
        }
        return [$out, $p];
    }

    function less_or_great($a, $b, $flag)
    {
        if ($flag) return $a < $b;
        return $a > $b;
    }
}
