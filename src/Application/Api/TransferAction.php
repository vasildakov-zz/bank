<?php
declare(strict_types = 1);

namespace Application\Api;

use Psr\Http\Message\ResponseInterface as Request;
use Psr\Http\Message\ServerRequestInterface as Response;
use League\Tactician\CommandBus;
use Domain\Transfer\MakeTransferCommand;

class TransferAction
{
    /**
     * @var League\Tactician\CommandBus
     */
    private $bus;

    /**
     * @param League\Tactician\CommandBus
     */
    public function __construct(CommandBus $bus)
    {
        $this->bus = $bus;
    }


    public function __invoke(Request $request, Response $response, $next)
    {
        $this->bus->execute(
            new MakeTransferCommand(
                $request->get('source'),
                $request->get('destination'),
                $request->get('amount')
            )
        );

        return new JsonResponse(200);
    }
}
