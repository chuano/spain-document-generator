<?php
declare(strict_types=1);

namespace Tests\Helper;

use Chuano\Util\SpainDocumentGenerator\Helper\NifGenerator;
use Exception;
use PHPUnit\Framework\TestCase;

class NifGeneratorTest extends TestCase
{
    const NIF_LENGTH_WITHOUT_SEPARATOR = 9;

    /**
     * @test
     * @throws Exception
     */
    public function sould_get_nif_without_separator()
    {
        $generator = new NifGenerator();
        $nif = $generator->generate();
        $this->assertEquals(self::NIF_LENGTH_WITHOUT_SEPARATOR, strlen($nif));
    }

    /**
     * @test
     * @throws Exception
     */
    public function should_get_nif_with_separator()
    {
        $separator = '-';
        $generator = new NifGenerator();
        $nif = $generator->generate($separator);
        $this->assertEquals(self::NIF_LENGTH_WITHOUT_SEPARATOR + strlen($separator), strlen($nif));
        $this->assertStringContainsString($separator, $nif);
    }
}