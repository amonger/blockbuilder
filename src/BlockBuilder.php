<?php

namespace BlockBuilder;

class BlockBuilder
{
  protected $blockDefintionMap = [];
  protected $blockStore = [];
  protected $HTMLRenderer;

  public function __construct(array $blockDefinitions, HTMLRenderer $HTMLRenderer)
  {
      foreach ($blockDefinitions as $blockDefinition){
          $this->blockDefintionMap[$blockDefinition] = $blockDefinition;
      }
      $this->HTMLRenderer = $HTMLRenderer;
  }

  private function getObject($object)
  {
    if (!isset($blockStore[$object])) {
        $blockStore[$object] = new $object;
    }

    return clone $blockStore[$object];
  }

  public function render($blockClass, array $defintions = [])
  {
    $block = $this->getObject($blockClass);
    if (!$block->matchesRequirements(array_keys($defintions))) {
      throw new \Exception($template . ' Doesn\'t match requirements');
    }
    foreach ($defintions as $key => $definition) {
        $block->$key = $definition;
    }
    return $this->HTMLRenderer->render($block::TEMPLATE, $defintions);
  }
}
