<?php

namespace Barwenock\Ui;

use Barwenock\Ui\Components\Form\Field;
use Barwenock\Ui\Components\Form\Fieldset;
use Barwenock\Ui\Components\Form\Form;
use Barwenock\Ui\Components\Form\Image;
use Barwenock\Ui\Components\Form\Price;
use Barwenock\Ui\Components\Form\Text;
use Barwenock\Ui\Components\Form\Textarea;

class ElementTypes
{
    /**
     * @var array|string[]
     */
    private static array $componentTypes = [
        'text' => Text::class,
        'textarea' => Textarea::class,
        'form' => Form::class,
        'field' => Field::class,
        'image' => Image::class,
        'price' => Price::class,
        'fieldset' => Fieldset::class
    ];

    /**
     * @param string $component
     * @return string
     * @throws \Exception
     */
    public static function getComponentByType(string $component): string
    {
        if (!isset(self::$componentTypes[$component])) {
            throw new \Exception('Given component was not mapped to the class ' . $component);
        }

        return self::$componentTypes[$component];
    }
}
