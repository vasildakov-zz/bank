<?php
declare(strict_types = 1);

namespace Application\Api;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Zend\Diactoros\Response\JsonResponse;
use League\Tactician\CommandBus;

use Domain\Command\PingCommand;

/**
 * Class PingAction
 *
 * @author Vasil Dakov <vasildakov@gmail.com>
 */
class PingAction
{
    /**
     * @var League\Tactician\CommandBus
     */
    private $bus;

    /**
     * @param League\Tactician\CommandBus $bus
     */
    public function __construct(CommandBus $bus)
    {
        $this->bus = $bus;
    }

    /**
     * @param  ServerRequestInterface $request
     * @param  ResponseInterface      $response
     * @param  callable|null          $next
     * @return JsonResponse
     */
    public function __invoke(Request $request, Response $response, callable $next = null)
    {
        $command = new PingCommand();

        $time = $command->getCommandTime();

        $this->bus->handle($command);

        return new JsonResponse(['ack' => $time]);
    }
}
