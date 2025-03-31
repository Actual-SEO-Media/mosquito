<?php

namespace Flynt\Components\BlockHero;

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
            ]
        ]
    ];
}