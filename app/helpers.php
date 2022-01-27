<?php

if (! function_exists('getInitials')) {
    function getInitials($string = null) {
        return array_reduce(
            explode(' ', $string),
            function ($initials, $word) {
                return sprintf('%s%s', $initials, substr($word, 0, 1));
            },
            ''
        );
    }
}

if (! function_exists('__tahun_ajaran__')) {
    function __tahun_ajaran__() {
        return (date("Y")-1)."-".date('Y');
    }
}

if (! function_exists('__semester__')) {
    function __semester__($date) {
        if ($date >= 7 && $date <= 12) {
            $semester = "Ganjil";
        } else {
            $semester = "Genap";
        }
        return $semester;
    }
}
