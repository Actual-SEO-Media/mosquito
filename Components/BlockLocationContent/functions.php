<?php

namespace Flynt\Components\BlockLocationContent;

add_filter('Flynt/addComponentData?name=BlockLocationContent', function (array $data): array {
    $data['contact_information'] = get_field('contact_information');
    $data['business_services'] = get_field('business_services');
    $data['business_hours'] = get_field('business_hours');
    $data['google_map'] = get_field('google_map');

    return $data;
});
