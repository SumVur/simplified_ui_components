<?php

namespace Barwenock\Routes;

class FrontController
{
    /**
     * @return string|null
     */
    public function dispatch(): ?string
    {
        /** @var ControllerInterface $controller */
        foreach ($this->getControllers() as $controller) {
            if ($controller->match($_SERVER)) {
                return $controller->execute($_SERVER);
            }
        }

        return '';
    }

    /**
     * @return StandardController[]
     */
    private function getControllers(): array
    {
        return [
            new StandardController()
        ];
    }
}
