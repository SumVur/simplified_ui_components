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
        $directoryIterator = new \DirectoryIterator(
            ROUTES_PATH . DIRECTORY_SEPARATOR . '*' . DIRECTORY_SEPARATOR . $componentName . '.xml'
        );

        foreach ($directoryIterator as $file) {
            $fileList[] = $file->getPath();
        }

        return $fileList;
    }
}
