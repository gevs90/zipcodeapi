<?php

namespace Core\ZipCodeApi\Infrastructure;

use Core\ZipCodeApi\Application\GetZipcodeUseCase;
use Core\ZipCodeApi\Domain\Zipcode;
use Core\ZipCodeApi\Infrastructure\Repositories\ZipcodeRepository;
use Illuminate\Http\Request;

class GetZipcodeController
{
    /**
     * @var ZipcodeRepository
     */
    private ZipcodeRepository $zipcodeRespository;

    /**
     * @param ZipcodeRepository $zipcodeRepository
     */
    public function __construct(ZipcodeRepository $zipcodeRepository)
    {
        $this->zipcodeRespository = $zipcodeRepository;
    }

    /**
     * @param Request $request
     * @return Zipcode|null
     */
    public function zipcode(Request $request): ?Zipcode
    {
        $code = $request->zipcode;

        $getZipcodeCase = new GetZipcodeUseCase($this->zipcodeRespository);
        return $getZipcodeCase->zipcode($code);
    }
}
