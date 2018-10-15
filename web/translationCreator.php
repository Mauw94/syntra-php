<?php

class TranslationCreator
{
    public $words_to_translate = array();
    public $translations = array();
    public $file_lines = array();
    private $lines = array();

    function __construct($file_location)
    {
        $this->file_lines = file($file_location);
    }

    function create_word_arrays()
    {
        for ($i = 0; $i < count($this->file_lines); $i++) {
            array_push($this->lines, explode(",", $this->file_lines[$i]));
        }

        foreach ($this->lines as $line) {
            array_push($this->words_to_translate, $line[0]);
            array_push($this->translations, $line[1]);
        }
    }

    function print_wordsToTranslate()
    {
        foreach ($this->words_to_translate as $word) {
            echo $word . "<br>";
        }
    }

    function print_translations()
    {
        foreach ($this->translations as $translation) {
            echo $translation . "<br>";
        }
    }

    /**
     * Get the value of translations
     */
    public function getTranslations()
    {
        return $this->translations;
    }

    /**
     * Set the value of translations
     *
     * @return  self
     */
    public function setTranslations($translations)
    {
        $this->translations = $translations;

        return $this;
    }

    /**
     * Get the value of words_to_translate
     */
    public function getWords_to_translate()
    {
        return $this->words_to_translate;
    }

    /**
     * Set the value of words_to_translate
     *
     * @return  self
     */
    public function setWords_to_translate($words_to_translate)
    {
        $this->words_to_translate = $words_to_translate;

        return $this;
    }
}
?>