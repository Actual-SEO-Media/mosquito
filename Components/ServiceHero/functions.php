<?php

namespace Flynt\Components\ServiceHero;

use Flynt\FieldVariables;

function getACFLayout(): array
{
    return [
        'name' => 'serviceHero',
        'label' => __('Service Hero', 'flynt'),
        'sub_fields' => [
            [
                'label' => __('Content', 'flynt'),
                'name' => 'contentTab',
                'type' => 'tab',
                'placement' => 'top',
                'endpoint' => 0,
            ],
            [
                'label' => __('Title', 'flynt'),
                'name' => 'title',
                'type' => 'text',
                'required' => 1,
                'default_value' => 'Street lighting maintenance',
            ],
            [
                'label' => __('Description', 'flynt'),
                'name' => 'description',
                'type' => 'textarea',
                'rows' => 3,
                'default_value' => 'Maintaining and repairing street lighting to ensure safety and efficiency.',
            ],
            [
                'label' => __('Background Image', 'flynt'),
                'instructions' => __('Image-Format: JPG, PNG, SVG. Recommended size: 1920×800px.', 'flynt'),
                'name' => 'backgroundImage',
                'type' => 'image',
                'preview_size' => 'medium',
                'mime_types' => 'jpg,jpeg,png,svg',
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
                    FieldVariables\getTheme('dark'),
                    FieldVariables\getTextAlignment([
                        'default' => 'center'
                    ]),
                ]
            ]
        ]
    ];
}