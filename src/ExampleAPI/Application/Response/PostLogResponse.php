<?php

namespace ExampleAPI\Application\Response;

use JsonSerializable;
use OpenApi\Attributes as OA;

class PostLogResponse implements JsonSerializable
{
    /**
     * @param bool $isError
     */
    public function __construct(
        private readonly bool $isError
    )
    {

    }

    /**
     * @return bool
     */
    #[OA\Property(
        title: 'error',
        description: 'Error flag',
        type: 'boolean',
        default: false,
        example: false
    )]
    public function isError(): bool
    {
        return $this->isError;
    }

    /**
     * @return array
     */
    public function jsonSerialize(): array
    {
        return [
            'error' => $this->isError()
        ];
    }
}