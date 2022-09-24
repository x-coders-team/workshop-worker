<?php

namespace ExampleAPI\Application\Response;

use JsonSerializable;
use OpenApi\Attributes as OA;

class GetLogResponse implements JsonSerializable
{
    /**
     * @param array $data
     */
    public function __construct(
        private readonly array $data
    ){

    }

    /**
     * @return array[]
     */
    public function jsonSerialize(): array
    {
        return [
            'data' => $this->getData()
        ];
    }

    /**
     * @return array
     */

    #[OA\Property(
        title: 'data',
        type: 'array',
        items: new OA\Items(type: 'string')
    )]
    public function getData(): array
    {
        return $this->data;
    }
}