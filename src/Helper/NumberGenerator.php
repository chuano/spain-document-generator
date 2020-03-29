<?php
declare(strict_types=1);

namespace Chuano\Util\SpainDocumentGenerator\Helper;

class NumberGenerator
{
    const FILL_CHAR = '0';

    public function getNumber(int $minNumber, int $maxNumber, int $length): string
    {
        $randomNumber = (string)rand($minNumber, $maxNumber);
        return str_pad($randomNumber, $length, self::FILL_CHAR, STR_PAD_LEFT);
    }
}