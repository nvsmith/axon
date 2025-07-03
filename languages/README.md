# The `languages/` Directory

Last Updated: 03 JUL 2025

- [The `languages/` Directory](#the-languages-directory)
  - [Loading the Text Domain](#loading-the-text-domain)
  - [Add Text Domain To Your Root Stylesheet](#add-text-domain-to-your-root-stylesheet)

This folder stores translation files used to internationalize your theme. You can run a search and replace for this theme's text domain, `axon`, and replace it with your own.

To support translations:

-   Use a tool like **Poedit**, **Loco Translate**, or **WP-CLI** to generate `.po` and `.mo` files from a `.pot` template.

-   Translation file naming should follow this format:

    -   textdomain-locale.mo
    -   textdomain-locale.po

-   For example:

    -   axon-fr_FR.mo
    -   axon-fr_FR.po

-   These files should be placed in the following directory: `wp-content/themes/axon/languages/`

## Loading the Text Domain

In your theme’s setup file (`themes/axon/inc/theme-support.php`), register the `languages` directory using `load_theme_textdomain()`:

```php
// Load theme textdomain for translation support
function axon_load_textdomain() {
    load_theme_textdomain( 'axon', get_template_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'axon_load_textdomain' );
```

Make sure:

-   The text domain `axon` matches the one declared in your theme’s `style.css` header.
-   You wrap translatable text in `__()` or `_e()` throughout your theme.

## Add Text Domain To Your Root Stylesheet

In your `style.css` file, make sure you’ve declared the text domain like so:

```css
/*
Theme Name: Axon
Text Domain: axon
*/
```
