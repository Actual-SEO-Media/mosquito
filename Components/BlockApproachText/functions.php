<?php

namespace Flynt\Components\BlockApproachText;

use Flynt\FieldVariables;

function getACFLayout(): array
{
    return [
        'name' => 'BlockApproachText',
        'label' => __('Block: Approach Service', 'flynt'),
        'sub_fields' => [
            [
                'label' => __('Content', 'flynt'),
                'name' => 'contentTab',
                'type' => 'tab',
                'placement' => 'top',
                'endpoint' => 0,
            ],
            [
                'label' => __('Layout', 'flynt'),
                'name' => 'layoutTab',
                'type' => 'button_group',
                'choices' => [
                    'right' => sprintf('<i class="dashicons dashicons-align-right" title="%1$s"></i>', __('Content on the left', 'flynt')),
                    'left' => sprintf('<i class="dashicons dashicons-align-left" title="%1$s"></i>', __('Content on the right', 'flynt'))
                ],
                'default_value' => 'right',
            ],
            [
                'label' => __('Subheading', 'flynt'),
                'name' => 'subheading',
                'type' => 'text',
                'default_value' => 'Our approach',
                'required' => 1,
            ],
            [
                'label' => __('Heading', 'flynt'),
                'name' => 'heading',
                'type' => 'text',
                'default_value' => 'Our commitment to reliable lighting',
                'required' => 1,
            ],
            [
                'label' => __('Introduction Text', 'flynt'),
                'name' => 'introText',
                'type' => 'textarea',
                'default_value' => 'Looking for dependable street lighting maintenance? Reach out to us to keep your streets safe and bright!',
                'required' => 1,
                'rows' => 4,
            ],
            [
                'label' => __('CTA Button', 'flynt'),
                'name' => 'ctaButton',
                'type' => 'group',
                'layout' => 'block',
                'sub_fields' => [
                    [
                        'label' => __('Text', 'flynt'),
                        'name' => 'ctaButtonText',
                        'type' => 'text',
                        'default_value' => 'CONTACT US',
                    ],
                    [
                        'label' => __('Link', 'flynt'),
                        'name' => 'ctaButtonLink',
                        'type' => 'link',
                        'return_format' => 'array',
                    ],
                ]
            ],
            [
                'label' => __('Services', 'flynt'),
                'name' => 'services',
                'type' => 'repeater',
                'layout' => 'block',
                'min' => 1,
                'max' => 4,
                'button_label' => __('Add Service', 'flynt'),
                'sub_fields' => [
                    [
                        'label' => __('Icon', 'flynt'),
                        'name' => 'icon',
                        'type' => 'image',
                        'preview_size' => 'thumbnail',
                        'return_format' => 'array',
                        'mime_types' => 'jpg,jpeg,png,svg,webp',
                        'instructions' => __('Image format: JPG, PNG, SVG, WebP.', 'flynt'),
                    ],
                    [
                        'label' => __('Title', 'flynt'),
                        'name' => 'title',
                        'type' => 'text',
                        'required' => 1,
                    ],
                    [
                        'label' => __('Description', 'flynt'),
                        'name' => 'description',
                        'type' => 'textarea',
                        'rows' => 3,
                        'required' => 1,
                    ],
                ]
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
                    [
                        'label' => __('Theme', 'flynt'),
                        'name' => 'theme',
                        'type' => 'select',
                        'allow_null' => 0,
                        'multiple' => 0,
                        'ui' => 1,
                        'ajax' => 0,
                        'choices' => [
                            'dark' => __('Dark', 'flynt'),
                            'light' => __('Light', 'flynt'),
                            'reset' => __('None', 'flynt'),
                        ],
                        'default_value' => 'dark',
                    ]
                ]
            ]
        ]
    ];
}