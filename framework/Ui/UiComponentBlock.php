<?php

namespace Barwenock\Ui;

use Barwenock\Ui\Xml\Reader\Reader;

class UiComponentBlock
{
    /**
     * @var ComponentFactory
     */
    private ComponentFactory $componentFactory;

    /**
     * @var Reader
     */
    private Reader $componentReader;

    /**
     * @var ComponentRenderer
     */
    private ComponentRenderer $componentRenderer;

    public function __construct()
    {
        $this->componentReader = new Reader();
        $this->componentFactory = new ComponentFactory();
        $this->componentRenderer = new ComponentRenderer();
    }

    /**
     * @param string $nameOfComponent
     * @return string
     * @throws \Exception
     */
    public function __invoke(string $nameOfComponent): string
    {
        $componentData = $this->componentReader->read($nameOfComponent);
        $components = $this->componentFactory->create($componentData);
        return $this->componentRenderer->render($components);
    }
}
