<?php

namespace Core\ZipCodeApi\Application;

use Core\ZipCodeApi\Domain\Contracts\ZipcodeRepositoryContract;
use Core\ZipCodeApi\Domain\ValueObjects\CodeId;
use Core\ZipCodeApi\Domain\Zipcode;

final class GetZipcodeUseCase
{
    /**
     * @var ZipcodeRepositoryContract
     */
    private ZipcodeRepositoryContract $zipcodeRepositoryContract;

    /**
     * @param ZipcodeRepositoryContract $zipcodeRepositoryContract
     */
    public function __construct(ZipcodeRepositoryContract $zipcodeRepositoryContract)
    {
        $this->zipcodeRepositoryContract = $zipcodeRepositoryContract;
    }

    /**
     * @param string $code
     * @return Zipcode|null
     */
    public function zipcode(string $code): ?Zipcode
    {
        $codeId = new CodeId($code);
        return $this->zipcodeRepositoryContract->find($codeId);
    }
}
