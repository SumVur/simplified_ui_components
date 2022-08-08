<?php

namespace Barwenock\Ui;

use Barwenock\Ui\Xml\Reader\Reader;

class ComponentFactory
{
    public const ARGUMENTS_NODE = 'argument';
    public const ITEM_NODE = 'item';

    /**
     * [
     *    'general' => [
     *       new Fieldset(['name', 'children' => []])
     *    ]
     * ]
     *
     * $childComponent = [
     *   'name'
     *   'precision'
     * ];
     *
     * $arguments = [
     *   'precision'
     * ];
     *
     * @param array $componentData
     * @return array
     * @throws \Exception
     */
    public function create(array $componentData): array
    {
        $components = [];
        //[['general' => ['text' => ['name' => [], 'children' => [...]]]]]
        foreach ($componentData as $componentName => $childComponent) {
            $elementType = $childComponent[Reader::ELEMENT_TYPE];
            $componentClass = ElementTypes::getComponentByType($elementType);
            $childComponent = array_replace_recursive($childComponent, $this->getArguments($childComponent));
            $childComponent[Reader::CHILDREN] = $this->create($childComponent[Reader::CHILDREN]);
            $components[$componentName] = new $componentClass($childComponent);
        }

        return $components;
    }

    /**
     * @param array $component
     * @return array
     */
    private function getArguments(array &$component): array
    {
        $processedArguments = [];

        if (isset($component[self::ARGUMENTS_NODE])) {
            $argument = $component[self::ARGUMENTS_NODE];
            unset($component[self::ARGUMENTS_NODE]);

            if (isset($argument[self::ITEM_NODE])) {
                foreach ((array) $argument[self::ITEM_NODE] as $name => $value) {
                    $processedArguments[$name] = $value;
                }
            }
        }

        return $processedArguments;
    }
}
