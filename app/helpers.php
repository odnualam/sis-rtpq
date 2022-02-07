<?php

use App\Http\Traits\FileHelper;
use Symfony\Component\HttpFoundation\File\UploadedFile;

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
        return (date('Y') - 1).'-'.date('Y');
    }
}

if (! function_exists('__semester__')) {
    function __semester__($date) {
        if ($date >= 7 && $date <= 12) {
            $semester = 'Ganjil';
        } else {
            $semester = 'Genap';
        }

        return $semester;
    }
}

if (!function_exists('save_image')) {
    /**
     * Save the uploaded image.
     *
     * @param UploadedFile $file     Uploaded file.
     * @param int          $maxWidth
     * @param string       $path
     * @param Closure      $callback Custom file naming method.
     *
     * @return string File name.
     */
    function save_image(UploadedFile $file, $maxWidth = 150, $path = null, Closure $callback = null)
    {
        return FileHelper::saveImage($file, $maxWidth, $path, $callback);
    }
}
