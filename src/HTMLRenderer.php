<?php

namespace BlockBuilder;

class HTMLRenderer
{
    private $templateDirectory;

    public function __construct($templateDirectory)
    {
        $this->templateDirectory = $templateDirectory;
    }

    public function render($template, array $variables = [])
    {
        ob_start();
        extract($variables);
        require "{$this->templateDirectory}/$template.php";
        $contents = ob_get_contents();
        ob_end_clean();

        return $contents;
    }
}
