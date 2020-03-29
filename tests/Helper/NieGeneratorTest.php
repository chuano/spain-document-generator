<?php
declare(strict_types=1);

namespace Tests\Helper;

use Chuano\Util\SpainDocumentGenerator\Helper\NieGenerator;
use Exception;
use PHPUnit\Framework\TestCase;

class NieGeneratorTest extends TestCase
{
    const NIF_LENGTH_WITHOUT_SEPARATOR = 9;

    /**
     * @test
     * @throws Exception
     */
    public function sould_get_nie_without_separator()
    {
        $generator = new NieGenerator();
        $nie = $generator->generate();
        $this->assertEquals(self::NIF_LENGTH_WITHOUT_SEPARATOR, strlen($nie));
    }

    /**
     * @test
     * @throws Exception
     */
    public function should_get_nie_with_separator()
    {
        $separator = '-';
        $generator = new NieGenerator();
        $nie = $generator->generate($separator);
        $this->assertEquals(self::NIF_LENGTH_WITHOUT_SEPARATOR + strlen($separator), strlen($nie));
        $this->assertStringContainsString($separator, $nie);
    }
}