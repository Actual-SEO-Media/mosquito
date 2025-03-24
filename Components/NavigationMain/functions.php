<?php
namespace Flynt\Components\NavigationMain;
use Flynt\Utils\Asset;
use Flynt\Utils\Options;
use Timber\Timber;

add_action('init', function (): void {
    register_nav_menus([
        'navigation_main' => __('Navigation Main', 'flynt')
    ]);
});

add_filter('Flynt/addComponentData?name=NavigationMain', function (array $data): array {
    $data['menu'] = Timber::get_menu('navigation_main') ?? Timber::get_pages_menu();

    $data['logo'] = [
        'src' => get_theme_mod('custom_logo') ? wp_get_attachment_image_url(get_theme_mod('custom_logo'), 'full') : Asset::requireUrl('assets/images/logo.svg'),
        'alt' => get_bloginfo('name')
    ];
    $contactInfo = Options::getGlobal('NavigationMain', 'contactInfo');
    $data['contactInfo'] = [
        'phone' => $contactInfo['phone'] ?? '',
        'email' => $contactInfo['email'] ?? '',
        'phone_icon' => Asset::getIcon('phone'),
        'email_icon' => Asset::getIcon('envelope')
    ];

    $socialMedia = Options::getGlobal('NavigationMain', 'socialMedia');
    $data['socialMedia'] = array_map(function ($socialMediaItem) {
        return [
            'platform' => $socialMediaItem['platform'],
            'url' => $socialMediaItem['url'],
            'icon' => Asset::getIcon($socialMediaItem['platform'])
        ];
    }, $socialMedia);

    return $data;
});

// Keep your existing translatable options for navigation labels
Options::addTranslatable('NavigationMain', [
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
                'default_value' => __('Main Navigation', 'flynt'),
                'required' => 1,
                'wrapper' => [
                    'width' => '50',
                ],
            ],
        ],
    ],
]);

Options::addGlobal('NavigationMain', [
    [
        'label' => __('Top Bar', 'flynt'),
        'name' => 'topBarTab',
        'type' => 'tab',
        'placement' => 'top',
        'endpoint' => 0
    ],
    [
        'label' => __('Contact Information', 'flynt'),
        'name' => 'contactInfo',
        'type' => 'group',
        'sub_fields' => [
            [
                'label' => __('Phone Number', 'flynt'),
                'name' => 'phone',
                'type' => 'text',
                'default_value' => '+1 234 567 890',
            ],
            [
                'label' => __('Email Address', 'flynt'),
                'name' => 'email',
                'type' => 'text',
                'default_value' => 'info@example.com',
            ],
        ],
    ],
    [
        'label' => __('Social Media', 'flynt'),
        'name' => 'socialMedia',
        'type' => 'repeater',
        'layout' => 'table',
        'button_label' => __('Add Social Media', 'flynt'),
        'sub_fields' => [
            [
                'label' => __('Platform', 'flynt'),
                'name' => 'platform',
                'type' => 'select',
                'choices' => [
                    'facebook' => 'Facebook',
                    'twitter' => 'Twitter',
                    'instagram' => 'Instagram',
                    'youtube' => 'YouTube',
                ],
            ],
            [
                'label' => __('URL', 'flynt'),
                'name' => 'url',
                'type' => 'url',
            ],
        ],
    ],
]);
