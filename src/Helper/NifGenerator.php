<?php
declare(strict_types=1);

namespace Chuano\Util\SpainDocumentGenerator\Helper;

use Exception;

class NifGenerator
{
    const FIRST_NIF_NUMBER = 1;
    const LAST_NIF_NUMBER = 99999999;
    const NUMBER_LENGTH = 8;

    private $numberGenerator;
    private $letterCalculator;

    public function __construct()
    {
        $this->numberGenerator = new NumberGenerator();
        $this->letterCalculator = new NifControlLetterCalculator();
    }

    public function generate(?string $separator = ''): string
    {
        try {
            $number = $this->numberGenerator->getNumber(
                self::FIRST_NIF_NUMBER,
                self::LAST_NIF_NUMBER,
                self::NUMBER_LENGTH
            );
            $controlLetter = $this->letterCalculator->getControlLetter($number);

            return $number . $separator . $controlLetter;
        } catch (Exception $exception) {
            return $this->generate($separator);
        }
    }
}