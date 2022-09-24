<?php

namespace ExampleAPI\Application\Controller\Log;


use ExampleAPI\Application\Response\GetLogResponse;

use Nelmio\ApiDocBundle\Annotation\Model;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use OpenApi\Attributes as OA;
use Symfony\Component\Routing\Annotation\Route;

class GetController extends AbstractController
{
    #[OA\Get(
        path: '/api/v1/log',
        operationId: 'get-log-api',
        description: 'Retrieve all entry log file',
        responses: [
            new OA\Response(
                response: 200,
                description: 'Success retrieve log data',
                content: new OA\JsonContent(
                    ref: new Model(type: GetLogResponse::class)
                )
            ),
        ]
    )]
    #[Route(path: '/api/v1/log', name: 'get-log-api', methods: ['GET'])]
    public function Get(Request $request): Response
    {
        return new Response('OK', 200);
    }
}
