<?php

namespace Barwenock\Ui\Components\Form;

use Barwenock\Ui\Component;
use Barwenock\Ui\ComponentInterface;

/**
 * @api
 */
class Form extends Component implements ComponentInterface
{
    /**
     * @inheritDoc
     */
    public function prepare(): void
    {
        $this->data[self::TEMPLATE_CODE] = 'form';
    }
}
