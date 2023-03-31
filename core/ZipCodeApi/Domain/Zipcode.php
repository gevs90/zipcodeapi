<?php
namespace Core\ZipCodeApi\Domain;

use Core\ZipCodeApi\Domain\DataObjects\ZipcodeObject;

final class Zipcode
{
    private ZipcodeObject $zipcodeObject;

    /**
     * @param ZipcodeObject $zipcodeObject
     */
    public function __construct(ZipcodeObject $zipcodeObject)
    {
        $this->zipcodeObject = $zipcodeObject;
    }

    /**
     * @return ZipcodeObject
     */
    public function code(): ZipcodeObject
    {
        return $this->zipcodeObject;
    }
}
