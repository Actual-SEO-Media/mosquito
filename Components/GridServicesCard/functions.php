<?php

namespace Flynt\Components\GridServicesCard;

use Flynt\FieldVariables;


function getACFLayout(): array
{
    return [
        'name' => 'gridServicesCard',
        'label' => __('Grid: Services Card', 'flynt'),
        'sub_fields' => [
            [
                'label' => __('Content', 'flynt'),
                'name' => 'contentTab',
                'type' => 'tab',
                'placement' => 'top',
                'endpoint' => 0
            ],
            [
                'label' => __('Featured Image (Optional)', 'flynt'),
                'name' => 'featuredImage',
                'type' => 'image',
                'preview_size' => 'medium',
                'instructions' => __('Optional image displayed to the left of the service cards. Leave empty to hide.', 'flynt'),
                'mime_types' => 'jpg,jpeg,png,svg,webp',
                'wrapper' => [
                    'width' => 50
                ],
            ],
            [
                'label' => __('Title Alignment', 'flynt'),
                'name' => 'titleAlignment',
                'type' => 'button_group',
                'choices' => [
                    'left' => sprintf('<i class="dashicons dashicons-editor-alignleft" title="%1$s"></i>', __('Align items left', 'flynt')),
                    'center' => sprintf('<i class="dashicons dashicons-editor-aligncenter" title="%1$s"></i>', __('Align items center', 'flynt'))
                ],
                'default_value' => 'left'
            ],
            [
                'label' => __('Theme', 'flynt'),
                'name' => 'theme',
                'type' => 'select',
                'instructions' => __('Select a theme for this component.', 'flynt'),
                'choices' => [
                    'reset' => __('Default', 'flynt'),
                    'light' => __('Light', 'flynt'),
                    'dark' => __('Dark', 'flynt')
                ],
                'default_value' => 'reset'
            ],
            [
                'label' => __('Title', 'flynt'),
                'instructions' => __('Add a headline and optional description text.', 'flynt'),
                'name' => 'preContentHtml',
                'type' => 'wysiwyg',
                'tabs' => 'visual,text',
                'media_upload' => 0,
                'delay' => 0,
            ],
            [
                'label' => __('Call to Action Button', 'flynt'),
                'name' => 'ctaButton',
                'type' => 'group',
                'layout' => 'block',
                'sub_fields' => [
                    [
                        'label' => __('Show Button', 'flynt'),
                        'name' => 'showButton',
                        'type' => 'true_false',
                        'default_value' => 0,
                        'ui' => 1,
                    ],
                    [
                        'label' => __('Button Text', 'flynt'),
                        'name' => 'buttonText',
                        'type' => 'text',
                        'default_value' => __('ALL SERVICES', 'flynt'),
                        'conditional_logic' => [
                            [
                                [
                                    'fieldPath' => 'showButton',
                                    'operator' => '==',
                                    'value' => 1,
                                ],
                            ],
                        ],
                    ],
                    [
                        'label' => __('Button Link', 'flynt'),
                        'name' => 'buttonLink',
                        'type' => 'link',
                        'return_format' => 'array',
                        'conditional_logic' => [
                            [
                                [
                                    'fieldPath' => 'showButton',
                                    'operator' => '==',
                                    'value' => 1,
                                ],
                            ],
                        ],
                    ],
                ],
            ],
            [
                'label' => __('Service Cards', 'flynt'),
                'name' => 'serviceCards',
                'type' => 'repeater',
                'collapsed' => '',
                'layout' => 'block',
                'button_label' => __('Add Service Card', 'flynt'),
                'sub_fields' => [
                    [
                        'label' => __('Icon', 'flynt'),
                        'instructions' => __('Icon for the service. Format: SVG preferred.', 'flynt'),
                        'name' => 'icon',
                        'type' => 'image',
                        'preview_size' => 'medium',
                        'mime_types' => 'jpg,jpeg,png,svg,webp',
                        'wrapper' => [
                            'width' => 30
                        ],
                    ],
                    [
                        'label' => __('Title', 'flynt'),
                        'name' => 'title',
                        'type' => 'text',
                        'required' => 1,
                        'wrapper' => [
                            'width' => 70
                        ],
                    ],
                    [
                        'label' => __('Description', 'flynt'),
                        'name' => 'description',
                        'type' => 'textarea',
                        'rows' => 3,
                        'wrapper' => [
                            'width' => 70
                        ],
                    ],
                    [
                        'label' => __('Link', 'flynt'),
                        'name' => 'link',
                        'type' => 'link',
                        'return_format' => 'array',
                        'wrapper' => [
                            'width' => 70
                        ],
                    ]
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
                    FieldVariables\getTheme(),
                    [
                        'label' => __('Max Columns', 'flynt'),
                        'name' => 'maxColumns',
                        'type' => 'number',
                        'default_value' => 2,
                        'min' => 1,
                        'max' => 4,
                        'step' => 1
                    ],
                    [
                        'label' => __('Show Card Border', 'flynt'),
                        'name' => 'showBorder',
                        'type' => 'true_false',
                        'default_value' => 1,
                        'ui' => 1
                    ],
                    [
                        'label' => __('Arrow on Hover', 'flynt'),
                        'name' => 'showArrow',
                        'type' => 'true_false',
                        'default_value' => 1,
                        'ui' => 1
                    ]
                ]
            ]
        ]
    ];
}