<?php

require_once "vendor/autoload.php";
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
// $yaml = new \Symfony\Component\Yaml\Parser();
// $rendered = $yaml->parse(file_get_contents('blocks.yml'));
//
// $blockBuilder = new \BlockBuilder\BlockBuilder($rendered);
//
// var_dump($blockBuilder);

/**
 * Block definition takes a
 */

use \BlockBuilder\Block\TextBlock;
use \BlockBuilder\BlockBuilder;
use \BlockBuilder\HTMLRenderer;
// Implements definition interface

$htmlRenderer = new HTMLRenderer(__DIR__ . "/template");
$blockBuilder = new BlockBuilder([
  TextBlock::class,
], $htmlRenderer);

echo $blockBuilder->render(TextBlock::class, [
    'title' => 'test',
    'description' => 'description'
]);
