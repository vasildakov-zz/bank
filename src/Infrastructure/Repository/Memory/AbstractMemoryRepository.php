<?php

declare(strict_types = 1);

namespace Infrastructure\Repository\Memory;

abstract class AbstractMemoryRepository
{
    /**
     * @var array
     */
    protected $items = [];


    public function count()
    {
        return count($this->items);
    }


    public function add($object, $key = null)
    {
    }


    public function delete($key)
    {
    }


    public function get($key)
    {
    }


    public function keys()
    {
        return array_keys($this->items);
    }


    public function keyExists($key)
    {
        return isset($this->items[$key]);
    }
}
