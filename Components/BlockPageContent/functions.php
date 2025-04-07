<?php

namespace Flynt\Components\BlockPageContent;

add_filter('Flynt/addComponentData?name=BlockPageContent', function (array $data): array {
    $data['pre_title'] = get_field('pre_title', $data['post']->ID);
    $data['hero_background_image'] = get_field('hero_background_image', $data['post']->ID);
    $data['hero_content'] = get_field('hero_content', $data['post']->ID);

    return $data;
});