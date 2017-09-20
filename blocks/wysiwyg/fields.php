<?php

$fields = [
    'key' => 'field_wysiwyg_block',
    'label' => __('Basic Content Block', 'wp-starter-theme'),
    'name' => 'wysiwyg',
    'display' => 'block',
    'sub_fields' => [
        [
            'key' => 'field_wysiwyg_content',
            'label' => __('Content', 'wp-starter-theme'),
            'name' => 'content',
            'type' => 'wysiwyg',
            'media_upload' => 1,
            'tabs' => 'all',
            'toolbar' => 'full',
        ],
    ]
];
