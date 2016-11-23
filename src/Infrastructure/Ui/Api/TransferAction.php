<?php
declare(strict_types = 1);

namespace Infrastructure\Ui\Api;

use Psr\Http\Message\ResponseInterface as Request;
use Psr\Http\Message\ServerRequestInterface as Response;
use League\Tactician\CommandBus;

use Domain\Transfer\MakeTransferCommand;

/**
 * Class TransferAction
 *
 * @author Vasil Dakov <vasildakov@gmail.com>
 */
class TransferAction
{
    /**
     * @var CommandBus
     */
    private $bus;

    /**
     * @param CommandBus
     */
    public function __construct(CommandBus $bus)
    {
        $this->bus = $bus;
    }

    /**
     * @param  Request  $request
     * @param  Response $response
     * @param  callable $next
     * @return Response
     */
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
