<?php
namespace BlockBuilder\Block;

class TextBlock extends AbstractBlock
{
    const TEMPLATE = "textblock";
    public $title;
    public $description;

    protected function getRequired()
    {
        return [
            'title'
        ];
    }
}
