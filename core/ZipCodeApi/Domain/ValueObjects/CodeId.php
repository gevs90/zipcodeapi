<?php

namespace Core\ZipCodeApi\Domain\ValueObjects;

use Illuminate\Support\Facades\Validator;
use InvalidArgumentException;

final class CodeId
{
    private string $value;

    /**
     * @param string $code
     * @throws InvalidArgumentException
     */
    public function __construct(string $code)
    {
        $this->validate($code);
        $this->value = $code;
    }

    private function validate(string $code): void
    {

        $validator = Validator::make(
            ['code' => $code],
            ['code' => 'numeric|digits:5']
        );

        if ($validator->fails()) {
            throw new InvalidArgumentException(
                sprintf('<%s>: The length of the postal codes is 5, it was obtained: %s', CodeId::class, $code)
            );
        }
    }

    public function value(): string
    {
        return $this->value;
    }
}

