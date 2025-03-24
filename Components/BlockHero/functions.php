<?php

/**
 * Configuration for the ACF fields used in the BlockHero component
 */

use ACFComposer\ACFComposer;
use Flynt\Utils\Options;

add_filter('Flynt/addComponentData?name=BlockHero', function ($data) {
    // You can manipulate the data here if needed
    return $data;
});

add_action('Flynt/afterRegisterComponents', function () {
    ACFComposer::registerFieldGroup([
        'name' => 'blockHeroFields',
        'title' => 'Block Hero',
        'fields' => [
            [
                'label' => 'General',
                'name' => 'generalTab',
                'type' => 'tab',
                'placement' => 'top',
            ],
            [
                'label' => 'Content',
                'name' => 'contentHtml',
                'type' => 'wysiwyg',
                'delay' => 0,
                'media_upload' => 0,
                'instructions' => 'Use the <span class="highlight">text</span> to add the yellow underline highlight.',
                'default_value' => '<h1>Your trusted <span class="highlight">partner</span><br>in city maintenance</h1><p>Comprehensive solutions for cleaning, waste disposal, and infrastructure upkeep to make every street shine.</p>',
            ],
            [
                'label' => 'Primary Button Text',
                'name' => 'primaryButtonText',
                'type' => 'text',
                'default_value' => 'MAKE A REQUEST',
            ],
            [
                'label' => 'Primary Button Link',
                'name' => 'primaryButtonLink',
                'type' => 'link',
                'return_format' => 'array',
            ],
            [
                'label' => 'Secondary Button Text',
                'name' => 'secondaryButtonText',
                'type' => 'text',
                'default_value' => 'OUR SERVICES',
            ],
            [
                'label' => 'Secondary Button Link',
                'name' => 'secondaryButtonLink',
                'type' => 'link',
                'return_format' => 'array',
            ],
            [
                'label' => 'Image',
                'name' => 'image',
                'type' => 'image',
                'preview_size' => 'medium',
                'instructions' => 'Image is displayed below the hero text content.',
                'required' => 0,
                'mime_types' => 'gif,jpg,jpeg,png,svg',
            ],
            [
                'label' => 'Image Position',
                'name' => 'imagePosition',
                'type' => 'select',
                'allow_null' => 1,
                'multiple' => 0,
                'choices' => [
                    'below' => 'Below Content (Default)',
                    'above' => 'Above Content',
                ],
                'conditional_logic' => [
                    [
                        [
                            'fieldPath' => 'image',
                            'operator' => '!=empty',
                        ],
                    ],
                ],
            ],
            [
                'label' => 'Options',
                'name' => 'optionsTab',
                'type' => 'tab',
                'placement' => 'top',
            ],
            [
                'label' => 'Theme',
                'name' => 'theme',
                'type' => 'select',
                'allow_null' => 0,
                'multiple' => 0,
                'ui' => 1,
                'ajax' => 0,
                'choices' => [
                    '' => 'Default',
                    'dark' => 'Dark',
                    'light' => 'Light',
                ],
                'default_value' => '',
            ],
        ],
        'location' => [
            [
                [
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'page',
                ],
            ],
        ],
    ]);
});
