<?php

namespace Barwenock\Routes;

use Barwenock\Ui\UiComponentBlock;

class StandardController implements ControllerInterface
{
    private const VIEW_NAME = 'page.phtml';

    /**
     * @var UiComponentBlock
     */
    private UiComponentBlock $uiComponentBlock;

    public function __construct()
    {
        $this->uiComponentBlock = new UiComponentBlock();
    }
    
    /**
     * @param array $server
     * @return bool
     */
    public function match(array $server): bool
    {
        return true;
    }

    /**
     * @param array $server
     * @return string
     */
    public function execute(array $server): string
    {
        // product/edit
        $requestURI = ltrim($server['REQUEST_URI'], "/");
        $parts = explode("/", $requestURI);
        $firstPart = reset($parts);
        $uiComponentBlock = $this->uiComponentBlock;
        return include_once $this->getView($firstPart);
    }

    /**
     * @param string $firstPart
     * @return string
     */
    private function getView(string $firstPart): string
    {
        return ROUTES_PATH . DIRECTORY_SEPARATOR .
            $firstPart . DIRECTORY_SEPARATOR .
            self::VIEW_NAME;
    }
}
