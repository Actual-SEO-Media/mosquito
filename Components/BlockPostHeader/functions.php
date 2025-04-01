<?php

namespace Flynt\Components\BlockPostHeader;

use Flynt\Utils\Options;

add_filter('Flynt/addComponentData?name=BlockPostHeader', function (array $data): array {
    $data['dateFormat'] = get_option('date_format');

    if (isset($data['post']) && isset($data['post']->author)) {
        $authorId = $data['post']->author->ID;
        $data['post']->author->description = get_user_meta($authorId, 'description', true);
    }

    return $data;
});

Options::addTranslatable('BlockPostHeader', [
    [
        'label' => __('Colors', 'flynt'),
        'name' => 'colorsTab',
        'type' => 'tab',
        'placement' => 'top',
        'endpoint' => 0
    ],
    [
        'label' => '',
        'name' => 'colors',
        'type' => 'group',
        'sub_fields' => [
            [
                'label' => __('Background Color', 'flynt'),
                'name' => 'backgroundColor',
                'type' => 'color_picker',
                'default_value' => '#0f2a1b',
                'wrapper' => [
                    'width' => '50',
                ],
            ],
            [
                'label' => __('Text Color', 'flynt'),
                'name' => 'textColor',
                'type' => 'color_picker',
                'default_value' => '#ffffff',
                'wrapper' => [
                    'width' => '50',
                ],
            ],
        ],
    ],
    [
        'label' => __('Labels', 'flynt'),
        'name' => 'labelsTab',
        'type' => 'tab',
        'placement' => 'top',
        'endpoint' => 0
    ],
    [
        'label' => '',
        'name' => 'labels',
        'type' => 'group',
        'sub_fields' => [
            [
                'label' => __('Date Format', 'flynt'),
                'name' => 'dateFormat',
                'type' => 'text',
                'default_value' => 'M j, Y',
                'wrapper' => [
                    'width' => '50',
                ],
            ],
        ],
    ],
]);
