<?php

namespace Flynt;

class SvgSupport
{
    public static function register()
    {
        add_filter('upload_mimes', [self::class, 'addSvgMimeType']);
        add_filter('wp_prepare_attachment_for_js', [self::class, 'fixSvgDisplay']);
        add_filter('wp_handle_upload_prefilter', [self::class, 'sanitizeSvgUploads']);
        add_filter('wp_get_attachment_image_src', [self::class, 'fixSvgDimensions'], 10, 4);
        add_action('admin_head', [self::class, 'addSvgAdminStyles']);
        add_filter('wp_check_filetype_and_ext', [self::class, 'checkFiletypeAndExt'], 10, 4);
    }

    public static function addSvgMimeType($mimes)
    {
        $mimes['svg'] = 'image/svg+xml';
        $mimes['svgz'] = 'image/svg+xml';
        return $mimes;
    }

    public static function fixSvgDisplay($response)
    {
        if ($response['mime'] === 'image/svg+xml') {
            $response['sizes'] = [
                'full' => [
                    'url' => $response['url'],
                    'width' => $response['width'] ?: 150,
                    'height' => $response['height'] ?: 150,
                    'orientation' => 'landscape'
                ],
                'medium' => [
                    'url' => $response['url'],
                    'width' => 300,
                    'height' => 300,
                    'orientation' => 'landscape'
                ],
                'thumbnail' => [
                    'url' => $response['url'],
                    'width' => 150,
                    'height' => 150,
                    'orientation' => 'landscape'
                ],
            ];
        }
        return $response;
    }

    public static function sanitizeSvgUploads($file)
    {
        if ($file['type'] === 'image/svg+xml') {
            // Read the file content
            $file_content = file_get_contents($file['tmp_name']);

            // Basic sanitization
            $sanitized = preg_replace('/(<script[^>]*>.*?<\/script>|<use[^>]*>.*?<\/use>|on[a-z]+\s*=\s*"[^"]*")/is', '', $file_content);

            // Write sanitized content back to file
            file_put_contents($file['tmp_name'], $sanitized);
        }
        return $file;
    }

    public static function fixSvgDimensions($image, $attachment_id, $size, $icon)
    {
        if (get_post_mime_type($attachment_id) === 'image/svg+xml') {
            if (!$image[1] || !$image[2]) {
                $upload_dir = wp_upload_dir();
                $base_url = $upload_dir['baseurl'];
                $path = str_replace($base_url, $upload_dir['basedir'], $image[0]);

                if (file_exists($path)) {
                    $svg_content = file_get_contents($path);
                    $svg = simplexml_load_string($svg_content);

                    if ($svg) {
                        $attributes = $svg->attributes();
                        if (isset($attributes->width) && isset($attributes->height)) {
                            $image[1] = (int) $attributes->width;
                            $image[2] = (int) $attributes->height;
                        } elseif (isset($attributes->viewBox)) {
                            $viewbox = explode(' ', $attributes->viewBox);
                            if (count($viewbox) === 4) {
                                $image[1] = (int) $viewbox[2];
                                $image[2] = (int) $viewbox[3];
                            }
                        }
                    }
                }
            }
        }
        return $image;
    }

    public static function addSvgAdminStyles()
    {
        echo '<style>
            .attachment-info .svg img,
            .media-toolbar .attachment-preview.type-svg img,
            .media-modal .attachment-preview.type-svg img {
                width: 100%;
                height: auto;
                padding: 0;
            }
        </style>';
    }

    public static function checkFiletypeAndExt($data, $file, $filename, $mimes)
    {
        $filetype = wp_check_filetype($filename, $mimes);
        if ('svg' === $filetype['ext']) {
            $data['ext'] = 'svg';
            $data['type'] = 'image/svg+xml';
        }
        return $data;
    }
}