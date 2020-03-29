<?php
declare(strict_types=1);

namespace Tests\Helper;

use Chuano\Util\SpainDocumentGenerator\Helper\CifControlLetterCalculator;
use Exception;
use PHPUnit\Framework\TestCase;

class CifControlLetterCalculatorTest extends TestCase
{
    /**
     * @test
     * @throws Exception
     */
    public function should_get_0_digit_control() {
        $number = '4161292';
        $calculator = new CifControlLetterCalculator();
        $this->assertEquals('0', $calculator->getControlLetter($number, 'H'));
    }

    /**
     * @test
     * @throws Exception
     */
    public function should_get_E_digit_control() {
        $number = '2387441';
        $calculator = new CifControlLetterCalculator();
        $this->assertEquals('E', $calculator->getControlLetter($number, 'P'));
    }

    /**
     * @test
     * @throws Exception
     */
    public function should_get_9_digit_control() {
        $number = '1315919';
        $calculator = new CifControlLetterCalculator();
        $this->assertEquals('9', $calculator->getControlLetter($number, 'C'));
    }
}