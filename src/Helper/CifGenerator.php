<?php
declare(strict_types=1);

namespace Chuano\Util\SpainDocumentGenerator\Helper;

use Exception;

class CifGenerator
{
    const FIRST_REGION_CODE = 1;
    const LAST_REGION_CODE = 52;
    const REGION_CODE_LENGTH = 2;

    const FIRST_CIF_NUMBER = 1;
    const LAST_CIF_NUMBER = 99999;
    const CIF_NUMBER_LENGTH = 5;

    const CIF_TYPES = ['A','B','C','D','F','G','H','P','Q','S'];

    private $numberGenerator;
    private $letterCalculator;

    public function __construct()
    {
        $this->numberGenerator = new NumberGenerator();
        $this->letterCalculator = new CifControlLetterCalculator();
    }

    public function generate(?string $type = null, ?string $separator = ''): string
    {
        try {
            $typeLetter = $type ?? $this->getRandomLetterType();
            $regionNumberPart = $this->numberGenerator->getNumber(
                self::FIRST_REGION_CODE,
                self::LAST_REGION_CODE,
                self::REGION_CODE_LENGTH
            );
            $numberPart = $this->numberGenerator->getNumber(
                self::FIRST_CIF_NUMBER,
                self::LAST_CIF_NUMBER,
                self::CIF_NUMBER_LENGTH
            );
            $number = $regionNumberPart . $numberPart;
            $letter = $this->letterCalculator->getControlLetter(
                $number,
                $typeLetter
            );

            return $typeLetter . $regionNumberPart . $numberPart . $separator . $letter;
        } catch (Exception $exception) {
            return $this->generate($type, $separator);
        }
    }

    private function getRandomLetterType(): string
    {
        $randomIndex = array_rand(self::CIF_TYPES);
        return self::CIF_TYPES[$randomIndex];
    }
}