<a id="readme-top"></a>

# Axon Theme

<a href="https://outpostwebstudio.com/" target="_blank" rel="author">Nate @ Outpost Web Studio</a> | Last Updated: 02 JUL 2025

-   [Axon Theme](#axon-theme)
    -   [About This Project](#about-this-project)
    -   [Installation](#installation)
    -   [Scaffold Branch Strategy](#scaffold-branch-strategy)
    -   [Hierarchy \& Responsibilities](#hierarchy--responsibilities)
        -   [Back-End Structure](#back-end-structure)
        -   [Front-End Structure](#front-end-structure)
        -   [Theme Root Files](#theme-root-files)
        -   [Responsibilities Summary](#responsibilities-summary)
    -   [Static Homepage \& Blog Setup](#static-homepage--blog-setup)
    -   [Theme Directories \& Files](#theme-directories--files)
        -   [Front-End Resources - `assets/`](#front-end-resources---assets)
        -   [Back-End Logic \& Setup - `inc/`](#back-end-logic--setup---inc)
        -   [Translations - `languages/` (Optional)](#translations---languages-optional)
        -   [Modular Theme Rendering - `templates/`](#modular-theme-rendering---templates)
            -   [`templates/layouts/`](#templateslayouts)
            -   [`templates/parts/`](#templatesparts)
            -   [`templates/components/`](#templatescomponents)
        -   [Root-Level Template Files](#root-level-template-files)
    -   [WooCommerce Integration](#woocommerce-integration)
        -   [Requirements For WooCommerce Layouts](#requirements-for-woocommerce-layouts)
        -   [Optional Template Overrides](#optional-template-overrides)
    -   [Styles](#styles)
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

Axon is a minimalist, dependency-free WordPress theme built for clarity, speed, and extensibility. It's meant to be developer-friendly, WooCommerce-compatible, and designed as a clean starting point for custom site builds and easy modular development.

<!-- <div align="center">

![screenshot1](screenshots/screenshot1.png "before")
![screenshot2](screenshots/screenshot2.png "after")

</div> -->

## Installation

1. Clone or download this repository into your WordPress themes directory.
2. Activate the theme in your WordPress dashboard under **Appearance → Themes → Axon**.

## Scaffold Branch Strategy

The `scaffold` branch will maintain a clean, minimal version of the Axon theme. It includes all basic directories, root files for core WP functionality, basic templates, back-end support features, a .gitignore file, and this README document.

All files are intended as starting points only—minimally developed and fully customizable; feel free to delete them if they aren't necessary for your project. This branch serves as a permanent foundation for new themes, forks, or major rebuilds.

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
│
├── languages/
│
└── templates/
    ├── components/
    └── layouts/
    └── parts
```

## Hierarchy & Responsibilities

The theme follows a modular, separation-of-concerns approach, with a clear distinction between back-end logic, front-end rendering, and supporting assets.

### Back-End Structure

-   `functions.php` - Acts as the central loader and routing hub for all logic files.
-   `inc/` - Contains all PHP logic, theme setup, hooks, and utility functions. These files power the theme behind the scenes and do **not** directly output front-end markup.
-   `languages/` - Stores translation files for internationalization (`.pot`, `.mo`, `.po`). This folder is optional and can be removed if you don’t plan to support translations.

### Front-End Structure

The `templates/` directory houses all modular rendering files used to build the front-end UI, **excluding** global layout files like `header.php` and `footer.php`, which live in the theme root.

From **largest to smallest rendering scope**:

-   `templates/layouts/` - Large structural templates that define the overall layout of a page (e.g., full-width, with-sidebar). High reusability across multiple views.

-   `templates/parts/` - Reusable content regions or page sections used within templates (e.g., post loops, hero sections, featured areas). Typically context-aware and may depend on WordPress template logic.

-   `templates/components/` - Small, UI-focused building blocks such as buttons, cards, or alerts. These are purely presentational and can be used inside parts, layouts, or other components.

-   `assets/` - Holds all static resources like CSS, JavaScript, and images. While not part of the rendering hierarchy, it supports the visual and interactive layers of the theme.

### Theme Root Files

The root of the theme contains all files required by WordPress’s template hierarchy and global structure.

### Responsibilities Summary

| Concept                       | Description                      | Directory               | Used For                                                                                  |
| ----------------------------- | -------------------------------- | ----------------------- | ----------------------------------------------------------------------------------------- |
| **Includes**                  | Theme logic & setup              | `inc/`                  | Backend functionality: setup functions, hooks, enqueueing styles/scripts, utility logic   |
| **Translations**              | Language file support            | `languages/`            | Internationalization (`.pot`, `.po`, `.mo` files) — optional, safe to remove if unused    |
| **Layouts**                   | Page-level structural templates  | `templates/layouts/`    | Overall layouts like full-width or with-sidebar wrappers                                  |
| **Template Parts (Partials)** | Content sections and view blocks | `templates/parts/`      | Reusable post loops, hero sections, feature areas — often WP-context-aware                |
| **Components**                | Presentational UI elements       | `templates/components/` | Modular design elements like buttons, cards, badges, alerts                               |
| **Assets**                    | Front-end resources              | `assets/`               | Non-hierarchical folder containing `css/`, `js/`, and `img/` assets                       |
| **Root**                      | Core templates & WordPress files | Theme root              | Required files like `style.css`, `functions.php`, `index.php`, `header.php`, `footer.php` |

## Static Homepage & Blog Setup

This theme supports a **static homepage + blog posts page** configuration using two special root template files:

-   `front-page.php` – Used as the homepage when **Settings → Reading → “Homepage”** is set to a static page.
-   `home.php` – Used as the blog posts index when **Settings → Reading → “Posts page”** is set.

To enable this:

1. In your WP Admin, create two pages: one titled _Home_, one titled _Blog_
2. Go to **Settings → Reading**
3. Set:

    - **Homepage** → _Home_
    - **Posts page** → _Blog_

WordPress will then:

-   Use `front-page.php` for the homepage.
-   Use `home.php` for the blog archive.

If either file is missing, WP will fall back to `page.php` or `index.php` as needed.

## Theme Directories & Files

### Front-End Resources - `assets/`

Static assets like stylesheets, scripts, images, and icons.

### Back-End Logic & Setup - `inc/`

Contains files that register, configure, or extend WordPress behavior, including enqueuing styles and scripts. No front-end markup lives here.

### Translations - `languages/` (Optional)

Can hold `.pot`, `.po`, or `.mo` files for translation support.
If unused, you can delete this directory.

### Modular Theme Rendering - `templates/`

Houses modular rendering files for layout, content sections, and UI elements. These are **not part of the core template hierarchy**, but are included manually via `get_template_part()`.

#### `templates/layouts/`

Structural scaffolding for pages (e.g. grid containers, full-width layout, with-sidebar layout).

Examples:

-   `full-width.php`
-   `with-sidebar.php`

#### `templates/parts/`

Reusable content blocks or context-aware markup for things like post loops or hero areas.

Examples:

-   `content-archive.php`
-   `content-single.php`
-   `content-none.php`
-   `hero-banner.php`

#### `templates/components/`

Small UI elements that can be reused anywhere (inside layouts, parts, or templates).

Examples:

-   `button.php`
-   `card.php`
-   `alert.php`

### Root-Level Template Files

These files live in the theme root and are directly used by WordPress via the template hierarchy:

| File              | Purpose                                                                               |
| ----------------- | ------------------------------------------------------------------------------------- |
| `index.php`       | Universal fallback for any request                                                    |
| `front-page.php`  | Homepage layout (if using static homepage)                                            |
| `home.php`        | Blog index (Posts page)                                                               |
| `page.php`        | Static page template                                                                  |
| `single.php`      | Single blog post view                                                                 |
| `archive.php`     | Archive views (categories, tags, authors, dates)                                      |
| `search.php`      | Displays search results                                                               |
| `404.php`         | Fallback when no content is found                                                     |
| `comments.php`    | Renders comments and comment form                                                     |
| `searchform.php`  | Custom search form markup (optional override)                                         |
| `header.php`      | Site `<head>` and opening HTML (called via `get_header()`)                            |
| `footer.php`      | Footer markup and closing HTML (called via `get_footer()`)                            |
| `sidebar.php`     | Sidebar content area — includes widgets or custom markup (called via `get_sidebar()`) |
| `functions.php`   | Theme bootstrap: loads includes, registers theme support, hooks, menus, and assets    |
| `style.css`       | Main stylesheet with theme metadata in header comment                                 |
| `screenshot.png`  | Dashboard thumbnail preview for this theme                                            |
| `woocommerce.php` | Optional WooCommerce compatibility wrapper — loads WooCommerce templates if active.   |

## WooCommerce Integration

This theme includes basic WooCommerce compatibility to support standard eCommerce features out of the box. If you’re not using WooCommerce, you can safely delete `woocommerce.php` and `inc/woocommerce-hooks.php`

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

-   `archive-product.php` - Shop/product archive layout
-   `single-product.php` - Single product view.
-   `cart/cart.php` - Cart contents
-   `checkout/form-checkout.php` - Layout for the Checkout page

**To override a template:**

1. Locate the original file in the WooCommerce plugin’s `/templates/` directory.
2. Copy it into the same relative path in your theme’s `/woocommerce/` folder.
3. Modify as needed.

> ⚠️ Only override templates you truly need to change in order to reduce future maintenance when WooCommerce updates its templates.

## Styles

### Structure

This theme uses a minimal, **Bootstrap-inspired structure** to keep HTML consistent and easy to target for flexbox or grid layouts. Front-end elements are wrapped in a hierarchy of containers > rows > columns (with class names of `.container`, `.row`, and `.col`). This allows for a separation of concerns between semantic HTML elements (e.g. `section`) vs. purely a presentational/layout elements (e.g. `div class = "container"`).

### Class Names

All classes follow the **BEM (Block–Element–Modifier)** naming convention for clarity and modularity:

-   `block`: The standalone component (`.site-header`, `.site-main`)
-   `block__element`: A nested part of the block (`.site-header__nav`)
-   `block__element--modifier`: A variation or state (`.site-header__nav--expanded`)

This approach makes styles easy to understand, maintain, and override as needed.

### Styling Guidelines

#### Layouts & Document Flow

Work with the foundational structure to easily maintain site-wide consistency:

-   Containers: handle global alignment and max-width constraints.
-   Rows: align columns and handle horizontal flow.
-   Columns: handle the content and **should receive most of the spacing and styling.**

> Rule of Thumb: style columns first, then rows, and style containers sparingly. Styling semantic HTML elements like `section` or `article` should only be done if necessary.

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
