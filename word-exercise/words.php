<?php
class Words
{
    public $wordToTranslate;
    public $translation;

    function __construct($wordToTranslate, $translation)
    {
        $this->wordToTranslate = $wordToTranslate;
        $this->translation = $translation;
    }

    public function getTranslation()
    {
        return $this->translation;
    }

    public function getWordToTranslate()
    {
        return $this->wordToTranslate;
    }
}
?>