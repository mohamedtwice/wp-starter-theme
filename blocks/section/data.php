<?php

use Sehrgut\StarterTheme\Lib\BlocksManager;

$data = [
    'content_blocks' => BlocksManager::resolveBlocks($block['blocks'], $post),
];
