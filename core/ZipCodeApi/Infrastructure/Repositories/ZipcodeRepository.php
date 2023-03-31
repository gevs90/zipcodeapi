<?php

namespace Core\ZipCodeApi\Infrastructure\Repositories;

use App\Models\Zipcode as ZipcodeModel;
use Core\ZipCodeApi\Domain\Contracts\ZipcodeRepositoryContract;
use Core\ZipCodeApi\Domain\DataObjects\ZipcodeObject;
use Core\ZipCodeApi\Domain\ValueObjects\CodeId;
use Core\ZipCodeApi\Domain\Zipcode;

final class ZipcodeRepository implements ZipcodeRepositoryContract
{
    private ZipcodeModel $zipcodeModel;

    public function __construct()
    {
        $this->zipcodeModel = new ZipcodeModel;
    }

    public function find(CodeId $codeId): ?Zipcode
    {
        $zipcode = $this->zipcodeModel->with('federalEntity', 'municipality', 'settlements')->where('zipcode', $codeId->value())->firstOrFail();

        return new Zipcode(
            new ZipcodeObject($zipcode)
        );
    }
}
