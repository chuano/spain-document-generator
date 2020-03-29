<?php
declare(strict_types=1);

namespace Chuano\Util\SpainDocumentGenerator\Helper;

use Exception;

class NieGenerator
{
    const FIRST_NIE_NUMBER = 1;
    const LAST_NIE_NUMBER = 9999999;
    const NUMBER_LENGTH = 7;
    const FIRST_LETTERS = ['X', 'Y', 'Z'];

    private $numberGenerator;
    private $letterCalculator;

    public function __construct()
    {
        $this->numberGenerator = new NumberGenerator();
        $this->letterCalculator = new NieControlLetterCalculator();
    }

    public function generate(?string $separator = ''): string
    {
        try {
            $firstLetter = $this->getRandomFirstLetter();
            $number = $this->numberGenerator->getNumber(
                self::FIRST_NIE_NUMBER,
                self::LAST_NIE_NUMBER,
                self::NUMBER_LENGTH
            );
            $controlLetter = $this->letterCalculator->getControlLetter(
                $firstLetter,
                $number
            );

            return $firstLetter . $number . $separator . $controlLetter;
        } catch (Exception $exception) {
            return $this->generate($separator);
        }
    }

    private function getRandomFirstLetter(): string
    {
        $randomIndex = array_rand(self::FIRST_LETTERS);
        return self::FIRST_LETTERS[$randomIndex];
    }
}