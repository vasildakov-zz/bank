<?php

namespace Domain\Service;

use Domain\ValueObject\Uuid;

/**
 * IdentityGeneratorInterface
 *
 * @author Vasil Dakov <vasildakov@gmail.com>
 */
interface IdentityGeneratorInterface
{
    public function __invoke() : Uuid;
}
