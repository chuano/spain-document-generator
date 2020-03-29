#Random Spain ID generator
Spanish CIF, NIF and NIE random generator.

## Installation
```sh
composer require chuano/spain-document-generator
```

## Usage
All parameters are optional. By default the separator will be empty and the type will be B.

```php
<?php
require_once 'vendor/autoload.php';

use Chuano\Util\SpainDocumentGenerator\SpainDocumentGenerator;

$generator = new SpainDocumentGenerator();

// CIF type 'B' and control digit separator char '-'
$cif = $generator->cif('B', '-');
// Control digit char '-'
$nif = $generator->nif('-');
// Control digit char '-'
$nie = $generator->nie('-');
```

