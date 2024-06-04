<?php

class SampleModel
{
    public $sampleAttribute;

    public function __construct($sampleAttribute)
    {
        $this->$sampleAttribute = $sampleAttribute;
    }
}
