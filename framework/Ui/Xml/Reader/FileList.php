<?php

namespace Barwenock\Ui\Xml\Reader;

class FileList
{
    /**
     * @param string $componentName
     * @return array
     */
    public function getFiles(string $componentName): array
    {
        $fileList = [];
        //@TODO: change this to wildcard
        $directoryIterator = new \DirectoryIterator(
            ROUTES_PATH . DIRECTORY_SEPARATOR . 'product'
        );

        foreach ($directoryIterator as $file) {
            if ($file->isDot()) continue;
            if ($file->getBasename() === $componentName . '.xml') {
                $fileList[] = $file->getPath() . DIRECTORY_SEPARATOR . $file->getBasename();
            }
        }

        return $fileList;
    }
}
