<?php

namespace Barwenock\Ui\Xml\Reader;

class Reader
{
    private const KEY_ATTRIBUTE = 'name';
    public const ELEMENT_TYPE = 'elementType';
    public const CHILDREN = 'children';

    /**
     * @var FileList
     */
    private FileList $fileList;

    public function __construct()
    {
        $this->fileList = new FileList();
    }

    /**
     * @param string $content
     * @param string $typeCode
     * @return \SimpleXMLElement
     * @throws \Exception
     */
    private function getXmlDomDocument(string $content, string $typeCode): \SimpleXMLElement
    {
        try {
            $dom = new \SimpleXMLElement($content);
        } catch (\Exception $e) {
            throw new \Exception('We were not able to parse component: ' . $typeCode);
        }

        return $dom;
    }

    /**
     * @param \SimpleXMLElement $simpleXMLElement
     * @return array
     * @throws \Exception
     */
    private function toArray(\SimpleXMLElement $simpleXMLElement)
    {
        $processed = [];
        /** @var \SimpleXMLElement $child */
        foreach ($simpleXMLElement as $child) {
            $children = $this->toArray($child);
            $attributes = $child->attributes();
            $attributes[self::ELEMENT_TYPE] = $child->getName();

            if (!isset($attributes[self::KEY_ATTRIBUTE])) {
                throw new \Exception('Key attribute should be specified for all the nodes');
            }

            $processed[(string) $attributes[self::KEY_ATTRIBUTE]] = $attributes;
            $processed[(string) $attributes[self::KEY_ATTRIBUTE]][self::CHILDREN] = $children;
        }

        return $processed;
    }

    /**
     * @param string $componentName
     * @return array
     * @throws \Exception
     */
    public function read(string $componentName): array
    {
        $result = [];
        foreach ($this->fileList->getFiles($componentName) as $file) {
            $content = file_get_contents($file);
            $dom = $this->getXmlDomDocument($content, $componentName);
            $result = array_replace_recursive($result, $this->toArray($dom));
        }

        return $result;
    }
}
