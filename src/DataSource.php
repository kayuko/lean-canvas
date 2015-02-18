<?php namespace Kayuko\LeanCanvas;


class DataSource
{
    protected $cells = [
        'CUSTOMERS',
        'PROBLEM',
        'UVP',
        'SOLUTION',
        'CHANNELS',
        'REVENUES',
        'COSTS',
        'METRICS',
        'ADVANTAGE'
    ];

    protected $data = [];

    public $source_path = '';


    public function __construct($source_path)
    {
        if (!is_dir(__DIR__.'/../'.$source_path)) {
            echo 'source path is not a directory';
            exit(-1);
        }
        $this->source_path = realpath(__DIR__.'/../'.$source_path).'/';
    }

    public function checkSourceFiles() {
        foreach($this->cells as $cell) {
            $file_path = $this->source_path.strtolower($cell).'.txt';

            if (!$this->sourceFileExists($file_path)) {
                echo $file_path.' not found',"\n";
                return false;
            }

        }
        return true;
    }

    public function getCellsContents()
    {
        foreach($this->cells as $cell) {
            $this->data[$cell] = file_get_contents($this->source_path.strtolower($cell).'.txt');
        }

        return $this->data;
    }

    public function getTemplate($name = 'LeanCanvas.odt')
    {
        $tpl_file = $this->source_path.'template/'.$name;
        if (file_exists($tpl_file)) {
            return $tpl_file;
        }
        return __DIR__.'/../template/'.$name;
    }

    protected function sourceFileExists($file) {
        if (!file_exists($file)) {
            return false;
        }
        return true;
    }
}
