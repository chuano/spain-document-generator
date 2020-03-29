<?php
declare(strict_types=1);

namespace Tests\Helper;

use Chuano\Util\SpainDocumentGenerator\Helper\NieControlLetterCalculator;
use Exception;
use PHPUnit\Framework\TestCase;

class NieControlLetterCalculatorTest extends TestCase
{
    /**
     * @test
     * @throws Exception
     */
    public function sholud_get_Z_letter()
    {
        $firstLetter = 'Y';
        $number = '2345678';
        $result = (new NieControlLetterCalculator())->getControlLetter($firstLetter, $number);
        $this->assertEquals('Z', $result);
    }

    /**
     * @test
     * @throws Exception
     */
    public function sholud_get_T_letter()
    {
        $firstLetter = 'X';
        $number = '2345678';
        $result = (new NieControlLetterCalculator())->getControlLetter($firstLetter, $number);
        $this->assertEquals('T', $result);
    }
}