<?php

/**
 * Block Editor related adjustments.
 */

namespace Flynt\BlockEditor;

/*
 * Disable Full Site Editing
 */
define('DISABLE_FSE', '__return_true');

/*
 * Disable Templates and Template Parts in Block Editor
 */
add_filter('block_editor_settings_all', function (array $settings): array {
    $settings['supportsTemplateMode'] = false;
    return $settings;
}, 10);

/*
 * Remove editor from Wordpress pages, since Flynt uses ACF.
 */
add_action('init', function (): void {
    remove_post_type_support('page', 'editor');
    remove_action('wp_enqueue_scripts', 'wp_enqueue_classic_theme_styles');
});

/*
 * Remove Gutenberg block related styles on front-end, when a post has no blocks.
 */
add_action('wp_enqueue_scripts', function (): void {
    if (has_blocks()) {
        return;
    }

    wp_dequeue_style('core-block-supports');
    wp_dequeue_style('wp-block-library');
    wp_dequeue_style('wp-block-library-theme');
    wp_dequeue_style('wp-global-styles');
    wp_dequeue_style('block-style-variation-styles');
});

add_filter('use_block_editor_for_post_type', function ($use_block_editor, $post_type) {
    if (in_array($post_type, ['post', 'page'])) {
        return false;
    }
    return $use_block_editor;
}, 10, 2);