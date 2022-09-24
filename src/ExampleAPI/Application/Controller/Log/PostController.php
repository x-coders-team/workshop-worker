<?php

namespace ExampleAPI\Application\Controller\Log;

use ExampleAPI\Application\Response\PostLogResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use OpenApi\Attributes as OA;
use Symfony\Component\Routing\Annotation\Route;
use Nelmio\ApiDocBundle\Annotation\Model;

class PostController extends AbstractController
{
    #[OA\Post(
        path: '/api/v1/log',
        operationId: 'post-log-api',
        description: 'Send message to save entry to log file',
        responses: [
            new OA\Response(
                response: 200,
                description: 'Success send message log data',
                content: new OA\JsonContent(
                    ref: new Model(type: PostLogResponse::class)
                )
            ),
        ]
    )]
    #[Route(path: '/api/v1/log', name: 'post-log-api', methods: ['POST'])]
    public function Post(Request $request): Response
    {
        return new Response('OK', 200);
    }
}
