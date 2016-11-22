<?php
declare(strict_types = 1);

namespace Infrastructure\Api;

use Psr\Http\Message\ResponseInterface as Request;
use Psr\Http\Message\ServerRequestInterface as Response;

use League\Tactician\CommandBus;

use Domain\Transfer\TransferRequest; // the command

class TransferAction
{
    /**
     * @var CommandBus
     */
    private $bus;

    /**
     * @param CommandBus $bus
     */
    public function __construct(CommandBus $bus)
    {
        $this->bus = $bus;
    }


    public function __invoke(Request $request, Response $response, $next)
    {
        $this->bus->execute(new TransferRequest($source, $destination, $amount));

        return new JsonResponse(200);
    }
}
