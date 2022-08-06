<?php

namespace Barwenock\Ui\Components\Form;

use Barwenock\Ui\Component;
use Barwenock\Ui\ComponentInterface;

/**
 * @api
 */
class Field extends Component implements ComponentInterface
{
    protected array $data = [
        self::TEMPLATE_CODE => 'form/text',
        self::COMPONENT_CODE => 'element'
    ];
}
