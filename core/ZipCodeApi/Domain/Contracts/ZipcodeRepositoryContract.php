<?php

namespace Core\ZipCodeApi\Domain\Contracts;

use Core\ZipCodeApi\Domain\ValueObjects\CodeId;
use Core\ZipCodeApi\Domain\Zipcode;

interface ZipcodeRepositoryContract
{
    public function find(CodeId $codeId): ?Zipcode;
}
