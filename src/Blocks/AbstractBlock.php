<?php
namespace BlockBuilder\Block;

abstract class AbstractBlock
{
    const TEMPLATE = "/textblock";
    public $title;

    public function matchesRequirements($fields)
    {
        foreach ($this->getRequired() as $requiredField) {
           if (!in_array($requiredField, $fields)) {

              return false;
           }
        }

        return true;
    }

    abstract protected function getRequired();
}
