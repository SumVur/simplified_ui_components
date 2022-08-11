<?php

namespace Barwenock\Ui;

use Barwenock\Ui\Xml\Reader\Reader;

class ComponentRenderer
{
    /**
     * @param array $components
     * @return array
     */
    private function __render(array $components): array
    {
        $data = [];

        /** @var ComponentInterface $component */
        foreach ($components as $component) {
            $component->prepare();
            $componentData = $component->getData();
            $children = $this->__render($componentData[Reader::CHILDREN]);
            unset($componentData[Reader::CHILDREN]);
            $data[$component->getName()] = $componentData;
            $data[$component->getName()]['children'] = $children;
        }

        return $data;
    }

    /**
     * @param array $componentData
     * @return string
     */
    public function render(array $componentData): string
    {
        return '<script type="simplified/ui-components">' . json_encode($this->__render($componentData)) . '</script>';
    }
}
