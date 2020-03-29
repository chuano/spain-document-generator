<?php
declare(strict_types=1);

namespace Tests\Helper;

use Chuano\Util\SpainDocumentGenerator\Helper\CifGenerator;
use Exception;
use PHPUnit\Framework\TestCase;

class CifGeneratorTest extends TestCase
{
    const NIF_LENGTH_WITHOUT_SEPARATOR = 9;

    /**
     * @test
     * @throws Exception
     */
    public function should_get_cif_without_separator()
    {
        $generator = new CifGenerator();
        $number = $generator->generate();
        $this->assertEquals(self::NIF_LENGTH_WITHOUT_SEPARATOR, strlen($number));
    }

    /**
     * @test
     * @throws Exception
     */
    public function should_get_cif_with_separator()
    {
        $separator = '-';
        $generator = new CifGenerator();
        $number = $generator->generate('A', $separator);
        $this->assertEquals(self::NIF_LENGTH_WITHOUT_SEPARATOR + strlen($separator), strlen($number));
    }
}