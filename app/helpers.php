<?php

/**
 * Combine those first letters together.
 */
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
