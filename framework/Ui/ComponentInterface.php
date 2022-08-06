<?php

namespace Barwenock\Ui;

/**
 * @api
 */
interface ComponentInterface
{
    public const TEMPLATE_CODE = 'template';
    public const COMPONENT_CODE = 'component';

    /**
     * @return array
     */
    public function getData(): array;

    /**
     * You are able to change the data with prepare
     *
     * @return void
     */
    public function prepare(): void;
}
