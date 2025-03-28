<?php

namespace Flynt\Components\SideBySide;

use Flynt\FieldVariables;

function getACFLayout(): array
{
    return [
        'name' => 'sideBySide',
        'label' => __('Block: Side by Side', 'flynt'),
        'sub_fields' => [
            [
                'label' => __('Content', 'flynt'),
                'name' => 'contentTab',
                'type' => 'tab',
                'placement' => 'top',
                'endpoint' => 0,
            ],
            [
                'label' => __('Image Position', 'flynt'),
                'name' => 'imagePosition',
                'type' => 'button_group',
                'choices' => [
                    'left' => sprintf('<i class=\'dashicons dashicons-align-left\' title=\'%1$s\'></i>', __('Image on the left', 'flynt')),
                    'right' => sprintf('<i class=\'dashicons dashicons-align-right\' title=\'%1$s\'></i>', __('Image on the right', 'flynt'))
                ],
                'default_value' => 'left',
            ],
            [
                'label' => __('Image', 'flynt'),
                'instructions' => __('Image-Format: JPG, PNG, SVG, WebP.', 'flynt'),
                'name' => 'image',
                'type' => 'image',
                'preview_size' => 'medium',
                'required' => 1,
                'mime_types' => 'jpg,jpeg,png,svg,webp',
            ],
            [
                'label' => __('Heading', 'flynt'),
                'name' => 'heading',
                'type' => 'text',
                'required' => 1,
                'default_value' => 'Mosquito-Free Living',
            ],
            [
                'label' => __('Subheading', 'flynt'),
                'name' => 'subheading',
                'type' => 'text',
                'required' => 0,
                'default_value' => 'Protecting your home and family together',
            ],
            [
                'label' => __('Description', 'flynt'),
                'name' => 'description',
                'type' => 'textarea',
                'required' => 1,
                'default_value' => 'Delivering professional mosquito elimination, prevention systems, and ongoing protection to keep your outdoor spaces comfortable and safe year-round.',
            ],
            [
                'label' => __('Primary Button', 'flynt'),
                'name' => 'primaryButton',
                'type' => 'group',
                'layout' => 'block',
                'sub_fields' => [
                    [
                        'label' => __('Label', 'flynt'),
                        'name' => 'label',
                        'type' => 'text',
                        'default_value' => 'REQUEST A FREE QUOTE',
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
                'name' => 'secondaryButton',
                'type' => 'group',
                'layout' => 'block',
                'sub_fields' => [
                    [
                        'label' => __('Label', 'flynt'),
                        'name' => 'label',
                        'type' => 'text',
                        'default_value' => 'ALL SERVICES',
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
                'label' => __('Trust Indicator', 'flynt'),
                'name' => 'trustIndicator',
                'type' => 'text',
                'default_value' => 'Enjoy bite-free outdoor living all season long',
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