<?php
declare(strict_types=1);

namespace Tests\Helper;

use Chuano\Util\SpainDocumentGenerator\Helper\NifControlLetterCalculator;
use Exception;
use PHPUnit\Framework\TestCase;

class NifControlLetterCalculatorTest extends TestCase
{
    /**
     * @test
     * @throws Exception
     */
    public function sholud_get_Z_letter()
    {
        $number = '12345678';
        $result = (new NifControlLetterCalculator())->getControlLetter($number);
        $this->assertEquals('Z', $result);
    }
}