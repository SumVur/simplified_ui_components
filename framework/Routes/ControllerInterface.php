<?php

namespace Barwenock\Routes;

interface ControllerInterface
{
    /**
     * @param array $server
     * @return bool
     */
    public function match(array $server): bool;

    /**
     * @param array $server
     * @return string
     */
    public function execute(array $server): string;
}
