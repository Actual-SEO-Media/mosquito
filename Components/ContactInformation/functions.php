<?php

namespace Flynt\Components\ContactInformation;

use Flynt\Utils\Asset;
use Flynt\Utils\Options;

add_filter('Flynt/addComponentData?name=ContactInformation', function (array $data): array {
    $contactInfo = Options::getGlobal('ContactInformation', 'contactDetails');
    $data['contactInfo'] = [
        'location' => [
            'content' => $contactInfo['location'] ?? '',
            'icon' => Asset::getIcon('map-pin')
        ],
        'phones' => [
            'primary' => $contactInfo['primaryPhone'] ?? '',
            'secondary' => $contactInfo['secondaryPhone'] ?? '',
            'icon' => Asset::getIcon('phone')
        ],
        'email' => [
            'address' => $contactInfo['email'] ?? '',
            'icon' => Asset::getIcon('envelope')
        ]
    ];

    // Get social media data separately
    $socialMedia = $contactInfo['socialMedia'] ?? [];
    $data['socialMedia'] = array_map(function ($item) {
        return [
            'platform' => $item['platform'],
            'url' => $item['url'],
            'icon' => Asset::getIcon($item['platform'])
        ];
    }, $socialMedia);

    $data['labels'] = Options::getGlobal('ContactInformation', 'labels');

    return $data;
});

Options::addGlobal('ContactInformation', [
    [
        'label' => __('Contact Information', 'flynt'),
        'name' => 'contactDetails',
        'type' => 'group',
        'sub_fields' => [
            [
                'label' => __('Location Address', 'flynt'),
                'name' => 'location',
                'type' => 'textarea',
                'rows' => 3,
                'default_value' => "125 GREENFIELD AVENUE,\nSPRINGFIELD, NY 10234, USA",
            ],
            [
                'label' => __('Primary Phone', 'flynt'),
                'name' => 'primaryPhone',
                'type' => 'text',
                'default_value' => '+1 (555) 867-4321',
            ],
            [
                'label' => __('Secondary Phone', 'flynt'),
                'name' => 'secondaryPhone',
                'type' => 'text',
                'default_value' => '+1 (555) 934-2876',
            ],
            [
                'label' => __('Email Address', 'flynt'),
                'name' => 'email',
                'type' => 'text',
                'default_value' => 'INFO@EXAMPLE.COM',
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
        ],
    ],
    [
        'label' => __('Labels', 'flynt'),
        'name' => 'labels',
        'type' => 'group',
        'sub_fields' => [
            [
                'label' => __('Location Label', 'flynt'),
                'name' => 'locationLabel',
                'type' => 'text',
                'default_value' => __('Location:', 'flynt'),
            ],
            [
                'label' => __('Phones Label', 'flynt'),
                'name' => 'phonesLabel',
                'type' => 'text',
                'default_value' => __('Phones:', 'flynt'),
            ],
            [
                'label' => __('Email Label', 'flynt'),
                'name' => 'emailLabel',
                'type' => 'text',
                'default_value' => __('Email:', 'flynt'),
            ],
            [
                'label' => __('Social Label', 'flynt'),
                'name' => 'socialLabel',
                'type' => 'text',
                'default_value' => __('Social Media', 'flynt'),
            ],
        ],
    ],
]);

function getACFLayout(): array
{
    return [
        'name' => 'contactInformation',
        'label' => __('Contact Information', 'flynt'),
        'sub_fields' => [
            [
                'label' => __('Theme', 'flynt'),
                'name' => 'theme',
                'type' => 'select',
                'choices' => [
                    '' => __('Default', 'flynt'),
                    'dark' => __('Dark', 'flynt'),
                    'light' => __('Light', 'flynt'),
                ],
                'default_value' => 'dark',
            ]
        ]
    ];
}