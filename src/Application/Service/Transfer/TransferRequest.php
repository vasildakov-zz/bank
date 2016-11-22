<?php
declare(strict_types = 1);

namespace Application\Service\Transfer;

/**
 * Class TransferRequest
 *
 * @author Vasil Dakov <vasildakov@gmail.com>
 */
class TransferRequest
{
    /**
     * @var string
     */
    private $source;

    /**
     * @var string
     */
    private $destination;

    /**
     * @var float
     */
    private $amount;

    /**
     * @param string $source
     * @param string $destination
     * @param float  $amount
     */
    public function __construct(string $source, string $destination, float $amount)
    {
        $this->source      = $source;
        $this->destination = $destination;
        $this->amount      = $amount;
    }

    /**
     * @return string
     */
    public function source() : string
    {
        return $this->source;
    }

    /**
     * @return string
     */
    public function destination() : string
    {
        return $this->destination;
    }

    /**
     * @return float
     */
    public function amount() : float
    {
        return $this->amount;
    }
}
