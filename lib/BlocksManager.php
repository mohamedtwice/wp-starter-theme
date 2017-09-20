<?php

namespace Sehrgut\StarterTheme\Lib;

class BlocksManager
{

    private static $blocks = [
        // Available blocks
        'wysiwyg'
    ];

    public static function resolveBlocks($content_blocks, $post, $templates = ['template'])
    {
        if (!is_array($content_blocks)) { return []; }

        return array_map(function($block) use ($post, $templates) {
            $data = [
                'data' => array_merge(
                    $block,
                    static::blockData($block['acf_fc_layout'], $block, $post)
                ),
                'templates' => []
            ];

            foreach ($templates as $template) {
                $data['templates'][$template] = static::templatePath($block['acf_fc_layout'], $template);

                // keep the default template in the root of $data
                if ($template === 'template') {
                    $data['template'] = static::templatePath($block['acf_fc_layout'], $template);
                }
            }

            return $data;
        }, $content_blocks);
    }

    public static function blockData($block_slug, $block, $post)
    {
        // get $data variable
        $data_path = static::dataPath($block_slug);
        if (file_exists($data_path)) {
            include($data_path);
            return $data;
        } else {
            return [];
        }
    }

    public static function getBlocks(array $blocks)
    {
        $blocks = array_intersect($blocks, static::$blocks);

        return array_map(function($block) {
            include(static::fieldsPath($block));

            // $fields is assigned in the included file.
            return $fields;
        }, $blocks);
    }

    public static function dataPath($block_slug)
    {
        return sprintf('%s/data.php', static::path($block_slug));
    }

    public static function fieldsPath($block_slug)
    {
        return sprintf('%s/fields.php', static::path($block_slug));
    }

    public static function templatePath($block_slug, $name = 'template')
    {
        // Only a relative path here, as twig searches the template
        // relative to its registered template directories.
        return sprintf('blocks/%s/%s.twig', $block_slug, $name);
    }

    protected static function path($block_slug)
    {
        return sprintf(
            '%s/blocks/%s',
            get_template_directory(),
            $block_slug
        );
    }
}
