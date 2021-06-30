<?php

namespace App\Classes;

class ReadFile
{
    private string $fileName;

    public function __construct($fileName)
    {
        $this->fileName = $fileName;
    }

    public function readCsvFile(): array
    {
        $content = [];
        if (($handle = fopen($this->fileName, "r")) !== FALSE) {
            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                $content[] = $data;
            }
            fclose($handle);
        }

        return $content;
    }
}

//    public function writeCsvFile($content)
//    {
//        $fp = fopen($this->fileName, 'w');
//
//        foreach ($content as $fields) {
//            fputcsv($fp, $fields);
//        }

//        fclose($fp);
//    }
