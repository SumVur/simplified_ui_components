<?php

namespace Barwenock\Ui\Components\Form;

use Barwenock\Ui\Component;
use Barwenock\Ui\ComponentInterface;

/**
 * @api
 */
class Fieldset extends Component implements ComponentInterface
{
    /**
     * @var array|string[]
     */
    protected array $data = [
        self::TEMPLATE_CODE => 'form/fieldset',
        self::COMPONENT_CODE => 'collection'
    ];
}
