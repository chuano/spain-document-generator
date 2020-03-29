<?php
declare(strict_types=1);

namespace Chuano\Util\SpainDocumentGenerator;

use Chuano\Util\SpainDocumentGenerator\Helper\CifGenerator;
use Chuano\Util\SpainDocumentGenerator\Helper\NieGenerator;
use Chuano\Util\SpainDocumentGenerator\Helper\NifGenerator;

class SpainDocumentGenerator
{
    public static function cif(?string $type = null, ?string $separator = ''): string
    {
        $cifGenerator = new CifGenerator();
        return $cifGenerator->generate($type, $separator);
    }

    public static function nie(?string $separator = ''): string
    {
        $nieGenerator = new NieGenerator();
        return $nieGenerator->generate($separator);
    }

    public static function nif(?string $separator = ''): string
    {
        $nifGenerator = new NifGenerator();
        return $nifGenerator->generate($separator);
    }
}