<?php namespace Kayuko\LeanCanvas;

class Generator
{
    /**
     * @var \Odf
     */
    protected $odf;

    /**
     * @var array
     */
    protected $data;


    public function __construct(\Odf $odf, $data)
    {
        $this->odf = $odf;
        $this->data = $data;
    }


    public function generate($output = '../canvas.odt')
    {
        foreach($this->data as $var_name => $value) {
            $this->odf->setVars($var_name, $value, true, 'UTF-8');
        }

        $this->odf->saveToDisk($output);
    }
}
