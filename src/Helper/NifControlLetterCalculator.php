<?php
declare(strict_types=1);

namespace Chuano\Util\SpainDocumentGenerator\Helper;

use Exception;

class NifControlLetterCalculator
{
    const DIVISOR = 23;
    const LETTER = ['T','R','W','A','G','M','Y','F','P','D','X','B','N','J','Z','S','Q','V','H','L','C','K','E'];

    /**
     * @throws Exception
     */
    public function getControlLetter(string $number): string
    {
        self::checkNumber($number);
        $letterIndex = (int)$number % self::DIVISOR;
        if (!array_key_exists($letterIndex, self::LETTER)) {
            throw new Exception('Letter not found');
        }

        return self::LETTER[$letterIndex];
    }

    /**
     * @throws Exception
     */
    private static function checkNumber(string $number): void
    {
        if (strlen((string)$number) != 8) {
            throw new Exception('Invalid number');
        }

        if (!is_numeric($number)) {
            throw new Exception('Invalid number');
        }
    }
}