<?php

namespace Barwenock\Ui\Components\Form;

use Barwenock\Ui\ComponentInterface;
use Barwenock\Ui\Component;

/**
 * @api
 */
class Form extends Component implements ComponentInterface
{
    protected array $data = [
        self::TEMPLATE_CODE => 'form',
        self::COMPONENT_CODE => 'form'
    ];
}
