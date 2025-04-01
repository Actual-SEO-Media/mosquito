<?php

namespace Flynt\Components\MinimalistFooter;

use Flynt\Utils\Options;
use Timber\Timber;

add_action('init', function (): void {
    register_nav_menus([
        'footer_navigation' => __('Footer Navigation', 'flynt')
    ]);
});

add_filter('Flynt/addComponentData?name=NavigationFooter', function (array $data): array {
    $data['menu'] = Timber::get_menu('footer_navigation') ?? Timber::get_pages_menu();

    // Add location data
    $data['locations'] = [
        'houston' => [
            'title' => 'Houston',
            'address' => '7915 B Wood Duck Park',
            'city_state_zip' => 'Humble, TX 77396',
            'phone' => '(713) 344-1984',
            'phone_link' => '7133441984',
            'email' => 'info@texanmosquitosystems.com'
        ],
        'manvel' => [
            'title' => 'Manvel',
            'address' => '3223 Summerland Dr',
            'city_state_zip' => 'Manvel, TX 77578',
            'phone' => '(832) 241-2255',
            'phone_link' => '8322412255',
            'email' => 'info@texanmosquitosystems.com'
        ],
        'rosharon' => [
            'title' => 'Rosharon',
            'address' => '6806 Trailview Ct',
            'city_state_zip' => 'Rosharon, TX 77583',
            'phone' => '(281) 962-4362',
            'phone_link' => '2819624362',
            'email' => 'info@texanmosquitosystems.com'
        ],
        'dallas' => [
            'title' => 'Dallas',
            'address' => '2695 Villa Creek Dr Ste. B126',
            'city_state_zip' => 'Dallas, TX 75234',
            'phone' => '(214) 390-6131',
            'phone_link' => '2143906131',
            'email' => 'info@texanmosquitosystems.com'
        ]
    ];

    return $data;
});

Options::addTranslatable('NavigationFooter', [
    [
        'label' => __('Content', 'flynt'),
        'name' => 'contentTab',
        'type' => 'tab',
        'placement' => 'top',
        'endpoint' => 0
    ],
    [
        'label' => __('Copyright Text', 'flynt'),
        'name' => 'copyrightText',
        'type' => 'text',
        'default_value' => '© ' . date_i18n('Y') . ' Texan Mosquito Systems. All Rights Reserved.',
        'required' => 1,
    ],
    [
        'label' => __('Theme', 'flynt'),
        'name' => 'theme',
        'type' => 'select',
        'choices' => [
            'dark' => 'Dark',
            'light' => 'Light',
            'reset' => 'Default'
        ],
        'default_value' => 'dark',
        'required' => 1,
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
                'label' => __('Aria Label', 'flynt'),
                'name' => 'ariaLabel',
                'type' => 'text',
                'default_value' => __('Footer Navigation', 'flynt'),
                'required' => 1,
            ],
        ],
    ],
]);