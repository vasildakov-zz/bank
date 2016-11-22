<?php namespace Domain\Entity;

interface AccountInterface
{
    public function deposit($amount);

    public function withdraw($amount);
}
