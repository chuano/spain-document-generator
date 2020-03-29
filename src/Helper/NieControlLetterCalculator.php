<?php
declare(strict_types=1);

namespace Chuano\Util\SpainDocumentGenerator\Helper;

use Exception;

class NieControlLetterCalculator
{
    const DIVISOR = 23;
    const X_REPLACEMENT = '0';
    const Y_REPLACEMENT = '1';
    const Z_REPLACEMENT = '2';
    const LETTER = ['T','R','W','A','G','M','Y','F','P','D','X','B','N','J','Z','S','Q','V','H','L','C','K','E'];

    /**
     * @throws Exception
     */
    public function getControlLetter(string $firstLetter, string $number): string
    {
        $this->checkNumber($number);
        $firstLetterReplacement = $this->getFirstLetterReplacement($firstLetter);
        $letterIndex = (int)($firstLetterReplacement . $number) % self::DIVISOR;
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
        if (strlen((string)$number) != 7) {
            throw new Exception('Invalid number');
        }

        if (!is_numeric($number)) {
            throw new Exception('Invalid number');
        }
    }

    private function getFirstLetterReplacement(string $firstLetter): string
    {
        if ($firstLetter == 'X') {
            return self::X_REPLACEMENT;
        } else if ($firstLetter == 'Y') {
            return self::Y_REPLACEMENT;
        } else {
            return self::Z_REPLACEMENT;
        }
    }
}