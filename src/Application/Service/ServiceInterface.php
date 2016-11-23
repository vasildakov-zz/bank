<?php
namespace Application\Service;

/**
 * Interface ServiceInterface
 *
 * @package Application\Service
 */
interface ServiceInterface
{
    /**
     * @param $request
     * @return mixed
     */
    public function __invoke($request = null);
}
