<?php

namespace Core\ZipCodeApi\Domain\DataObjects;

use App\Models\Zipcode;

final class ZipcodeObject
{
    private array $data;

    public function __construct(Zipcode $zipcode)
    {
        $this->process($zipcode);
    }

    private function process(Zipcode $zipcode) {
        $this->data = [
            'zip_code' => $zipcode->zipcode,
            'locality' => $zipcode->locality,
            'federal_entity' => [
                'key' => $zipcode->federalEntity->key,
                'name' => $zipcode->federalEntity->name,
                'code' => $zipcode->federalEntity->code,
            ],
            'settlements' => $zipcode->settlements->map(function($settlement) {
                return [
                    'key' => $settlement->key,
                    'name' => $settlement->name,
                    'zone_type' => $settlement->zone_type,
                    'settlement_type' => [
                        'name' => $settlement->settlement_type
                    ],
                ];
            }),
            'municipality' => [
                'key' => $zipcode->municipality->key,
                'name' => $zipcode->municipality->name

            ]
        ];
    }

    public function value(): array
    {
        return $this->data;
    }
}
