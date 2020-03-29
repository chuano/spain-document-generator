<?php
declare(strict_types=1);

namespace Chuano\Util\SpainDocumentGenerator\Helper;

use Exception;

class CifControlLetterCalculator
{
    const CONTROL_DIGIT_LETTERS = ['','A','B','C','D','E','F','G','H','I','J'];
    const DEFAULT_CONTROL_DIGIT = '0';
    const TYPE_LETTERS_WITH_CONTROL_DIGIT_NOT_NUMERIC = ['N','P','Q','R','S','W'];
    const NUMBER_LENGTH = 7;
    const CONSANT_NUMBER = 10;

    /**
     * @throws Exception
     */
    public function getControlLetter(string $number, string $typeLetter): string
    {
        self::checkNumber($number);
        $index = $this->calcControlDigitLetterIndex($number);

        if (in_array($typeLetter, self::TYPE_LETTERS_WITH_CONTROL_DIGIT_NOT_NUMERIC)) {
            return self::CONTROL_DIGIT_LETTERS[$index] ?? self::DEFAULT_CONTROL_DIGIT;
        }
        if ($index > 9) {
            return '0';
        }
        return (string)$index;
    }

    /**
     * @throws Exception
     */
    private static function checkNumber(string $number): void
    {
        if (strlen((string)$number) != self::NUMBER_LENGTH) {
            throw new Exception('Invalid number');
        }

        if (!is_numeric($number)) {
            throw new Exception('Invalid number');
        }
    }

    public function calcControlDigitLetterIndex(string $number): int
    {
        $sumEvenAndOdd = $this->calcEvenPositionsNumber($number) + $this->calcOddPositionsNumber($number);
        $unitPartFromNumber = (int)substr((string)$sumEvenAndOdd, strlen((string)$sumEvenAndOdd) - 1, 1);
        return (self::CONSANT_NUMBER - (int)$unitPartFromNumber);
    }

    public function calcEvenPositionsNumber(string $number): int
    {
        $sum = 0;
        for ($i = 1; $i < strlen($number); $i += 2) {
            $sum += $number[$i];
        }
        return $sum;
    }

    public function calcOddPositionsNumber(string $number): int
    {
        $sum = 0;
        for ($i = 0; $i < strlen($number); $i += 2) {
            $product = (string)($number[$i] * 2);
            $sum += $this->sumDigitsFromNumnber($product);
        }
        return $sum;
    }

    private function sumDigitsFromNumnber(string $number): int
    {
        $sum = 0;
        for ($a = 0; $a < strlen($number); $a++) {
            $sum += (int)$number[$a];
        }
        return $sum;
    }
}