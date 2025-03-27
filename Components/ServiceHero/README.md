# Service Hero

A hero section component designed for service pages. It displays a featured image alongside a title, subtitle, and description. Below the hero section, it can display up to three featured services from a custom post type.

## Usage

1. Make sure you have a custom post type named 'service' set up in your WordPress installation
2. Add the component to your template using ACF Flexible Content or directly in a template file
3. Configure the component settings in the WordPress admin

## ACF Fields

| Field Name    | Field Type   | Description                                  |
|---------------|--------------|----------------------------------------------|
| title         | Text         | Main headline for the hero section           |
| subtitle      | Text         | Secondary headline (optional)                |
| description   | WYSIWYG      | Descriptive text for the hero section        |
| featuredImage | Image        | Hero background or featured image            |
| services      | Relationship | Featured services to display (up to 3)       |
| cta           | Group        | Call to action button with label and link    |
| options       | Group        | Component styling options (theme, etc)       |

## Theme Support

This component supports light and dark themes using the Flynt theming system. Set the `theme` option to change the appearance.