<?php

namespace Barwenock\Ui\Components\Form;

/**
 * @api
 */
class Price extends Field
{
    /**
     * @var array|string[]
     */
    protected array $data = [
        self::TEMPLATE_CODE => 'form/fieldset',
        self::COMPONENT_CODE => 'form/component/price'
    ];
}
