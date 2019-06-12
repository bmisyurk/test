<?php

//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//ini_set('error_reporting', E_ALL);

class DoublicateChecker
{
    private $files = [];
    private $dublicates = [];
    private $path;
    private $outfile;

    public function __construct(string $path, string $outfile = 'name.txt')
    {
        $this->outfile = $outfile;
        $this->path = $path;
        if ($path === null) {
            throw new \Exception('');
        }
    }

    private function findFilesFromDirectory(string $path) : void
    {
        if (is_dir($path)) {
            $cleanPath = array_diff(scandir($path), ['.', '..']);
            foreach ($cleanPath as $content) {
                $finalPath = $path . '/' . $content;
                $this->findFilesFromDirectory($finalPath);
            }
        } else if (is_file($path)) {
            $index = md5_file($path);
            $this->files[$index] === null
                ? $this->files[$index] = $path
                : $this->dublicates[$index][] = $path;

        }
    }

    public function output() : void
    {
        $this->findFilesFromDirectory($this->path);

        $dubstr = 'DUBLICATES:' . PHP_EOL;
        foreach ($this->dublicates as $index => $dpaths) {
            $dubstr .= $this->files[$index] . PHP_EOL;

           foreach ($dpaths as $dublicate) {
              $dubstr .= $dublicate . PHP_EOL;
            }
            $dubstr .= ' ' . PHP_EOL;
        }

        file_put_contents($this->outfile, $dubstr);
    }
}


$dc = new DoublicateChecker('/Users/bmisyurk/Desktop/my_mamp/apache2/htdocs');
$dc->output();
