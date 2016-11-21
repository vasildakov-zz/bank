<?php namespace Domain\Service {

    use Domain\ValueObject\Uuid;

    /**
     * $identity = (new Generator($adapter))();
     */
    interface IdentityGeneratorInterface
    {
        public function __invoke() : Uuid;
    }
}
