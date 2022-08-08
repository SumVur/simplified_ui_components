<?php

namespace Barwenock\Ui;

/**
 * @api
 */
class Component implements ComponentInterface
{
    /**
     * @var array
     */
    protected array $data = [];

    /**
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->data = array_replace($this->data, $data);
    }

    public function prepare(): void
    {
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->data['name'];
    }

    /**
     * @return array
     */
    public function getData(): array
    {
        return $this->data;
    }
}