<a id="readme-top"></a>

# Axon Theme

<a href="https://outpostwebstudio.com/" target="_blank" rel="author">Nate @ Outpost Web Studio</a> | Last Updated: 24 JUN 2025

-   [Axon Theme](#axon-theme)
    -   [About This Project](#about-this-project)
    -   [Installation](#installation)
    -   [Scaffold Branch Strategy](#scaffold-branch-strategy)
    -   [Theme Structure](#theme-structure)
        -   [Hierarchy \& Roles](#hierarchy--roles)
            -   [Back-end](#back-end)
            -   [Front-end](#front-end)
            -   [Theme Root Files](#theme-root-files)
            -   [Directory Summary](#directory-summary)
    -   [Theme Directories \& Files](#theme-directories--files)
        -   [Static Homepage \& Blog Setup](#static-homepage--blog-setup)
        -   [Root Files](#root-files)
        -   [Assets (`assets/`)](#assets-assets)
        -   [Components (`components/`)](#components-components)
        -   [Includes (`inc/`)](#includes-inc)
        -   [Languages \& Translation (`languages/`)](#languages--translation-languages)
        -   [Template Parts/Partials (`parts/`)](#template-partspartials-parts)
        -   [Templates (`templates/`)](#templates-templates)
    -   [WooCommerce Integration](#woocommerce-integration)
        -   [Requirements For WooCommerce Layouts](#requirements-for-woocommerce-layouts)
        -   [Optional Template Overrides](#optional-template-overrides)
    -   [CSS Styles](#css-styles)
        -   [Structure](#structure)
        -   [Class Names](#class-names)
        -   [Styling Guidelines](#styling-guidelines)
            -   [Layouts \& Document Flow](#layouts--document-flow)
            -   [Spacing (Margins \& Padding)](#spacing-margins--padding)
            -   [Class Naming Consistency](#class-naming-consistency)
    -   [Troubleshooting](#troubleshooting)
    -   [Developer Tips](#developer-tips)
    -   [Contributing](#contributing)
    -   [License](#license)
    -   [Contact](#contact)

## About This Project

Axon is a minimalist, dependency-free WordPress theme built for clarity, speed, and extensibility. It's meant to be developer-friendly, WooCommerce-compatible, and designed as a clean starting point for custom site builds and easy modular development, targeting PHP 8+ environments.

<!-- <div align="center">

![screenshot1](screenshots/screenshot1.png "before")
![screenshot2](screenshots/screenshot2.png "after")

</div> -->

## Installation

1. Clone or download this repository into your WordPress themes directory.
2. Activate the theme in your WordPress dashboard under **Appearance → Themes → Axon**.

## Scaffold Branch Strategy

The `scaffold` branch contains a clean, minimal version of the Axon theme. It includes the core file structure, empty folders, a .gitignore file, and this README. All files are intended as starting points only—blank and fully customizable; feel free to delete them if they aren't necessary for your project. This branch serves as a permanent foundation for new themes, forks, or major rebuilds.

> -   Avoid developing features directly on this branch; instead, create new branches from it as needed.
> -   If you are developing off of this branch, remember to swap out the placeholder `screenshot.png` with your own image once you finish.

```
# scaffold branch

wp-content/themes/axon/
├── 404.php
├── archive.php
├── comments.php
├── footer.php
├── front-page.php
├── functions.php
├── header.php
├── home.php
├── index.php
├── page.php
├── screenshot.png   # Replace this placeholder with your own image #
├── search.php
├── searchform.php
├── sidebar.php
├── single.php
├── style.css
├── woocommerce.php
│
├── assets/
│   ├── css/
│   ├── js/
│   └── images/
│
├── components/
│
├── inc/
│   ├── custom-functions.php
│   ├── enqueue.php
│   ├── setup.php
│   ├── template-tags.php
│   └── woocommerce-hooks.php
│
├── languages/
│   ├── README.md
│
├── parts/
│   ├── content-archive.php
│   ├── content-page.php
│   ├── content-search.php
│   ├── content-single.php
│   └── content-none.php
│
└── templates/
    ├── template-fullwidth.php
    └── template-sidebar-left.php
    └── template-sidebar-right.php
```

## Theme Structure

### Hierarchy & Roles

From a high-level perspective, the theme structure follows a clear separation of concerns:

#### Back-end

-   **`inc/`**
    Contains all PHP logic, setup functions, hooks, and utilities. The files within are meant to power the theme behind the scenes but do not directly output front-end markup.
-   **`languages/`**
    This optional folder can be used to store translation files for the theme. (You can delete this folder and its instructional README file if you don't plan to include translation support in your theme.)

#### Front-end

From **largest to smallest** rendering scope:

-   **`templates/`**
    Full-page layout templates (e.g. full-width pages, sidebar layouts).

-   **`parts/`**
    Reusable sections or layout blocks used inside templates (e.g. post loops, hero banners, or feature sections).

-   **`components/`**
    Small, modular UI elements such as buttons, cards, alerts, or containers. These can be reused within templates, parts, or even inside other components.

-   **`assets/`**
    A non-hierarchical directory that contains front-end resources like CSS, JavaScript, and image files used throughout the theme. While not part of the rendering scope hierarchy, it's essential for styling and interactivity.

#### Theme Root Files

Located in the root of the theme directory, these files are directly utilized by WordPress and serve as the backbone of the theme’s rendering logic:

-   **Template hierarchy files**: `index.php`, `page.php`, `single.php`, `archive.php`, etc. — control how various types of content are displayed.
-   **Global layout files**: `header.php`, `footer.php`, `sidebar.php` — automatically loaded by WordPress using functions like `get_header()` and `get_footer()`.
-   These files tie together the templates, parts, components, and assets into a complete and functional WordPress theme.

#### Directory Summary

| Concept                     | Role                            | Where It Lives | Used For                                                                                  |
| --------------------------- | ------------------------------- | -------------- | ----------------------------------------------------------------------------------------- |
| `includes`                  | Backend functions / logic       | `inc/`         | Theme setup, hooks, utility functions, enqueue scripts/styles, etc.                       |
| `translations`              | Language translation files      | `languages/`   | Theme translation support (optional)                                                      |
| `templates`                 | Full-page layout templates      | `templates/`   | Custom page layouts like full-width or sidebar pages                                      |
| `template parts (partials)` | Page sections / content blocks  | `parts/`       | Reusable sections like post loops, hero areas, or layout variants                         |
| `components`                | Reusable UI elements            | `components/`  | Discrete, modular elements like buttons, cards, alerts, containers                        |
| `css`, `js`, `img`          | Theme styling and scripts       | `assets/`      | Organized front-end resources: CSS, JS, and images used across theme                      |
| **Root**                    | Core templates & WP entry files | Theme root     | Required files like `style.css`, `functions.php`, `index.php`, `header.php`, `footer.php` |

## Theme Directories & Files

### Static Homepage & Blog Setup

This theme includes two optional root template files if you want separate home and blog pages:

-   **front-page.php** – Used for the static homepage when set in **Settings → Reading** as “Homepage.” Customize this to create a unique landing page layout.
-   **home.php** – Used for the Posts page (your blog index) when set in **Settings → Reading** as “Posts page.” Controls how your blog posts are displayed.

To enable this setup:

1. Create two pages in the WordPress admin, _Home_ and _Blog_.
2. Go to **Settings → Reading**.
3. Set: **Your homepage displays → A static page**.

    - Choose _Home_ as the **Homepage**
    - Choose _Blog_ as the **Posts page**

WordPress will then automatically use `front-page.php` for the homepage and `home.php` for the blog. If either file is missing, WordPress will fall back to `page.php` or `index.php` as needed.

### Root Files

-   **404.php**: Fallback template displayed when no content is found (Page Not Found).
-   **archive.php**: Handles list views for post archives (categories, tags, dates).
-   **comments.php**: Manages the display of comments and comment form on posts and pages.
-   **footer.php**: Contains closing HTML, footer markup, and `wp_footer()` hook.
-   **front-page.php**: Custom static homepage template.
-   **functions.php**: Theme setup file. Loads helper files, registers menus, widgets, and theme supports.
-   **header.php**: Outputs site `<head>` section, opening HTML tags, and site header/navigation. This global site header must remain in the root.
-   **home.php**: Custom blog index template (Posts page).
-   **index.php**: Default fallback template for any query not covered by other templates.
-   **page.php**: Template for static pages created in WordPress admin.
-   **screenshot.png**: Thumbnail image shown in the WordPress dashboard for this theme.
-   **search.php**: Displays search results.
-   **searchform.php**: Contains the markup for the search form.
-   **sidebar.php**: Defines widget areas and sidebar markup.
-   **single.php**: Template for individual blog posts.
-   **style.css**: Main stylesheet with theme metadata header and default styles.
-   **woocommerce.php**: Basic WooCommerce compatibility wrapper, loading shop templates when active.
    -   If you don't intend to use WooCommerce, delete this file and the `inc/woocommerce-hooks.php` file.

### Assets (`assets/`)

-   **css/**: Place custom styles or compiled CSS files here (e.g., `theme.css`).
-   **js/**: Add vanilla JavaScript files (e.g., navigation toggles) here.
-   **images/**: Store any static images used by your theme (icons, placeholders).

### Components (`components/`)

-   **reusable UI elements**: buttons, cards, icons, alerts, carousels, CTAs, etc.
-   **layout elements**: containers, rows, and columns.

### Includes (`inc/`)

-   **custom-functions.php**: Miscellaneous helper functions for your theme.
-   **enqueue.php**: Registers and enqueues theme scripts and styles.
-   **setup.php**: Sets up theme supports (title tag, post thumbnails, HTML5) and registers menus/sidebars.
-   **template-tags.php**: Custom template tag functions to reuse throughout your templates.
-   **woocommerce-hooks.php**: Add or override WooCommerce hooks and filters.

### Languages & Translation (`languages/`)

-   **README.md**: A simple explanation file that explains how to (optionally) include translation support for the theme.

### Template Parts/Partials (`parts/`)

Reusable pieces of markup for different contexts. Each file corresponds to content loops:

-   **content-archive.php**: Markup for items in archive lists.
-   **content-page.php**: Markup for static pages.
-   **content-search.php**: Markup for individual search results.
-   **content-single.php**: Markup for single post content.
-   **content-none.php**: Displayed when no content is available.

### Templates (`templates/`)

Custom page markup for the full page.

-   **template-fullwidth.php**: Page layout without a sidebar.
-   **template-sidebar-left.php**: Page layout with the sidebar/widget area on the left.
-   **template-sidebar-right.php**: Page layout with the sidebar/widget area on the right.

## WooCommerce Integration

This theme includes basic WooCommerce compatibility to support standard eCommerce features out of the box. If you don't intend to use WooCommerce, delete the root `woocommerce.php` file from your project.

### Requirements For WooCommerce Layouts

The `woocommerce.php` file in the theme root acts as a **layout wrapper** for all WooCommerce-generated pages—such as the Shop, Cart, Checkout, and My Account pages. It allows the theme to apply its own structure (like the header, footer, main container, and sidebar) around WooCommerce’s content.

By default, WooCommerce falls back to this file (if it exists) instead of using its own wrapper templates. This ensures consistency in layout across your site and store.

> If no `woocommerce.php` is provided, WooCommerce will fall back to `page.php` or its internal wrappers.

### Optional Template Overrides

If deeper customization is needed, you can override specific WooCommerce templates by creating a `/woocommerce/` folder in your theme.

```
axon/
├── woocommerce/
│   ├── archive-product.php
│   ├── single-product.php
│   ├── cart/cart.php
│   └── checkout/form-checkout.php
```

-   **archive-product.php**: Shop/product archive layout
-   **single-product.php**: Single product view.
-   **cart/cart.php**: Cart contents
-   **checkout/form-checkout.php**: Layout for the Checkout page

**To override a template:**

1. Locate the original file in the WooCommerce plugin’s `/templates/` directory.
2. Copy it into the same relative path in your theme’s `/woocommerce/` folder.
3. Modify as needed.

> ⚠️ Only override templates you truly need to change in order to reduce future maintenance when WooCommerce updates its templates.

## CSS Styles

### Structure

This theme uses a minimal, **Bootstrap-inspired structure** to keep HTML consistent and easy to target for flexbox or grid layouts. Front-end elements are wrapped in a hierarchy of containers > rows > columns (with class names of `.container`, `.row`, and `.col`).

### Class Names

All classes follow the **BEM (Block–Element–Modifier)** naming convention for clarity and modularity:

-   `block`: The standalone component (`site-header`, `site-main`)
-   `block__element`: A nested part of the block (`site-header__nav`)
-   `block__element--modifier`: A variation or state (`site-header__nav--expanded`)

This approach makes styles easy to understand, maintain, and override as needed.

### Styling Guidelines

#### Layouts & Document Flow

Work with the foundational structure:

-   Containers: handle global alignment and max-width constraints.
-   Rows: align columns and handle horizontal flow.
-   Columns: handle the content and **should receive most of the spacing and styling.**

> Rule of Thumb: style columns first, then rows, and only style containers when necessary.

#### Spacing (Margins & Padding)

When deciding what/how to style, prioritize inner/specific elements over outer/general elements to keep large, structural parts of templates as consistent as possible.

-   Apply spacing to the inner-most element whenever possible.
-   Prefer padding inside a column for internal spacing.
-   Use margin on columns for external spacing between sibling elements.
-   Avoid padding on rows unless absolutely needed.
-   Only use spacing on containers for overall page layout tweaks.

#### Class Naming Consistency

Be specific with modifier classes. Use modifiers for spacing or visual variations, not layout behavior:

-   ✅ `.site-footer__col--fullwidth`
-   ✅ `.button--large`
-   ❌ `.site-footer__row--margin-bottom-20px`

Keep modifier names meaningful. Use intent-driven naming instead of raw CSS values:

-   ✅ `.button--padded`
-   ✅ `.button--highlighted`
-   ❌ `.button--margin-top-20`

## Troubleshooting

If you run into issues, try the following steps:

1. **Blank Screen / White Screen of Death**

    - Enable `WP_DEBUG` in your `wp-config.php` to display errors or log them to `wp-content/debug.log`.
    - Check for missing PHP files or syntax errors in your theme’s PHP includes.

2. **Styles or Scripts Not Loading**

    - Confirm your `enqueue.php` paths and `wp_enqueue_style`/`wp_enqueue_script` handles.
    - Verify that `get_template_directory_uri()` is returning the correct URL.
    - Clear browser cache or disable caching plugins during development.

3. **Missing Template Parts**

    - Ensure filenames in `get_template_part()` match the actual files in `parts/` (case-sensitive).
    - Check your theme’s folder name for correct casing (e.g., `axon`).

4. **Widget Areas Not Appearing**

    - Confirm that you registered sidebars in `setup.php` with unique IDs.
    - Verify that your `sidebar.php` template calls `dynamic_sidebar()` correctly.

5. **WooCommerce Layout Issues**

    - If shop templates aren’t overriding, ensure `woocommerce.php` is present or hooks are correctly added in `woocommerce-hooks.php`.
    - Flush permalinks (Settings → Permalinks) after adding custom post types or rewrite rules.

6. **404 Errors on Custom Templates**

    - Ensure custom page templates have a valid /\* Template Name: \*/ header comment.
    - Re-save the page in WP admin to refresh its template assignment.

## Developer Tips

-   Use `.gitkeep` files in empty directories so they’re tracked by Git until real files are added.
-   Sync ACF JSON: If using ACF, enable JSON export (`acf_json` folder in theme) to keep field groups in version control.
-   PHP Code Standards: Run `phpcs --standard=WordPress` and `phpcbf` to auto-fix coding style issues.
-   IDE Helpers: Add [WordPress PHPStorm stubs](https://github.com/WordPress/phpstorm-stubs) or [phpstan-wordpress](https://github.com/szepeviktor/phpstan-wordpress) for better code intelligence.
-   Local Snapshots: Export your local DB before major refactors so you can restore content layouts quickly.
-   BrowserSync / LiveReload: Integrate a task runner to auto-refresh the browser on CSS/JS changes.

## Contributing

Contributions are welcome! Please open an issue or submit a pull request with any improvements or fixes.

## License

This project is licensed under the [GNU GPL v2 or later](https://www.gnu.org/licenses/gpl-2.0.html).

## Contact

Nate: [Website](https://outpostwebstudio.com/lets-talk-shop/) | [GitHub](https://github.com/nvsmith)

<p align="right">(<a href="#readme-top">back to top</a>)</p>
