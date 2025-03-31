<?php

namespace Flynt\Components\BlockHero;

use Flynt\FieldVariables;

function getACFLayout(): array
{
    return [
        'name' => 'blockHero',
        'label' => __('Block: Hero', 'flynt'),
        'sub_fields' => [
            [
                'label' => __('Content', 'flynt'),
                'name' => 'contentTab',
                'type' => 'tab',
                'placement' => 'top',
                'endpoint' => 0,
            ],
            [
                'label' => __('Headline', 'flynt'),
                'name' => 'headline',
                'type' => 'text',
                'required' => 1,
            ],
            [
                'label' => __('Subheadline', 'flynt'),
                'name' => 'subheadline',
                'type' => 'textarea',
                'rows' => 3,
                'required' => 1,
            ],
            [
                'label' => __('Primary Button', 'flynt'),
                'name' => 'primaryButtonGroup',
                'type' => 'group',
                'layout' => 'row',
                'sub_fields' => [
                    [
                        'label' => __('Label', 'flynt'),
                        'name' => 'label',
                        'type' => 'text',
                    ],
                    [
                        'label' => __('Link', 'flynt'),
                        'name' => 'link',
                        'type' => 'link',
                        'return_format' => 'array',
                    ],
                ],
            ],
            [
                'label' => __('Secondary Button', 'flynt'),
                'name' => 'secondaryButtonGroup',
                'type' => 'group',
                'layout' => 'row',
                'sub_fields' => [
                    [
                        'label' => __('Label', 'flynt'),
                        'name' => 'label',
                        'type' => 'text',
                    ],
                    [
                        'label' => __('Link', 'flynt'),
                        'name' => 'link',
                        'type' => 'link',
                        'return_format' => 'array',
                    ],
                ],
            ],
            [
                'label' => __('Hero Image', 'flynt'),
                'instructions' => __('Image-Format: JPG, PNG, SVG, WebP.', 'flynt'),
                'name' => 'backgroundImage',
                'type' => 'image',
                'preview_size' => 'medium',
                'required' => 1,
                'mime_types' => 'jpg,jpeg,png,svg,webp',
            ],
            [
                'label' => __('Options', 'flynt'),
                'name' => 'optionsTab',
                'type' => 'tab',
                'placement' => 'top',
                'endpoint' => 0
            ],
            [
                'label' => '',
                'name' => 'options',
                'type' => 'group',
                'layout' => 'row',
                'sub_fields' => [
                    FieldVariables\getTheme()
                ]
            ]
        ]
    ];
}