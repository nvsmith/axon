<a id="readme-top"></a>

# Axon Theme

<a href="https://outpostwebstudio.com/" target="_blank" rel="author">Nate @ Outpost Web Studio</a> | Last Updated: 15 JUL 2025

-   [Axon Theme](#axon-theme)
    -   [About This Project](#about-this-project)
    -   [Installation](#installation)
    -   [Scaffold Branch Strategy](#scaffold-branch-strategy)
    -   [Hierarchy \& Responsibilities](#hierarchy--responsibilities)
        -   [Back-End Structure](#back-end-structure)
            -   [Translation Helper](#translation-helper)
        -   [Front-End Structure](#front-end-structure)
            -   [When \& Where To Use](#when--where-to-use)
        -   [Theme Root Files](#theme-root-files)
        -   [Project Structure Reference](#project-structure-reference)
    -   [Static Homepage \& Blog Setup](#static-homepage--blog-setup)
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

> -   Avoid developing features directly on this branch; instead, create new branches from it as needed.
> -   If you are developing off of this branch, remember to swap out the placeholder `screenshot.png` with your own image once you finish.

All files are intended as starting points only—minimally developed and fully customizable; feel free to delete them if they aren't necessary for your project. This branch serves as a permanent foundation for new themes, forks, or major rebuilds.

| **File/Directory**      | **Description**                                          |
| ----------------------- | -------------------------------------------------------- |
| 📂 `assets/`            | Front-end resources                                      |
| └─ 📂 `css/`            | Stylesheets                                              |
| └─ 📂 `js/`             | Scripts                                                  |
| └─ 📂 `img/`            | Images & icons                                           |
| 📂 `components/`        | Modular, reusable UI elements                            |
| 📂 `inc/`               | Theme logic and configuration                            |
| └─ `dev-tools.php`      | Utility tools for development and debugging              |
| └─ `enqueue.php`        | Registers & enqueues CSS/JS files                        |
| └─ `menus.php`          | Registers navigation menus                               |
| └─ `theme-support.php`  | Enables core features                                    |
| └─ `widgets.php`        | Registers sidebars (widget areas)                        |
| 📂 `languages/`         | Translation files for internationalization               |
| 📂 `templates/`         | Front-end rendering                                      |
| └─ 📂 `components/`     | Modular UI elements                                      |
| └─ 📂 `layouts/`        | Developer-only, large structure shells                   |
| └─ 📂 `page-templates/` | User-selectable templates for individual pages           |
| └─ 📂 `parts/`          | Partials (reusable template sections)                    |
| `404.php`               | Template for "Page Not Found"                            |
| `archive.php`           | Template for archive pages                               |
| `comments.php`          | Template for rendering comments                          |
| `footer.php`            | Footer layout, called by `get_footer()`                  |
| `front-page.php`        | Template for static homepage (set in Settings → Reading) |
| `functions.php`         | Main logic entry point — loads files from `inc/`         |
| `header.php`            | Header layout, called by `get_header()`                  |
| `home.php`              | Blog posts template (if front page is static)            |
| `index.php`             | Fallback template if no other matches (REQUIRED)         |
| `page.php`              | Default static page template                             |
| `README.md`             | This informative document: "Axon Theme"                  |
| `screenshot.png`        | Theme preview image (Dashboard → Apperance → Themes)     |
| `search.php`            | Template for search results page                         |
| `searchform.php`        | Custom search form                                       |
| `sidebar.php`           | Sidebar markup (optional if your theme uses sidebars)    |
| `single.php`            | Template for single post types                           |
| `style.css`             | Theme metadata + base styles (REQUIRED)                  |
| `woocommerce.php`       | WooCommerce template override                            |

## Hierarchy & Responsibilities

The theme follows a modular, separation-of-concerns approach, with a clear distinction between back-end logic, front-end rendering, and supporting assets.

### Back-End Structure

-   `functions.php` - Acts as the central loader and routing hub for all logic files.
-   `inc/` - Contains all PHP logic, theme setup, hooks, and utility functions. These files power the theme behind the scenes and do **not** directly output front-end markup.
-   `languages/` - Stores translation files for internationalization (`.pot`, `.mo`, `.po`). This folder is optional and can be removed if you don’t plan to support translations.

#### Translation Helper

To simplify localization, the theme includes a helper function, `theme_get_text_domain()` (defined in `inc/theme-support.php`) to dynamically fetch the theme’s text domain. You can call this function in any of your theme's files.

**Example usage:**

```php
__( 'Read more', theme_get_text_domain() );
```

This function returns the `Text Domain` value specified in the `style.css` file header. It is primarily used in translation functions like `__()` or `_e()` to avoid hardcoding the domain and ensure portability into other themes.

**Note For Custom Theme Development**

If you develop from this Axon theme, be sure to replace this helper function's fallback text domain with your own!

```php
// Replace 'axon' with your own theme's text domain
$domain = wp_get_theme()->get( 'TextDomain' ) ?: 'axon';
```

### Front-End Structure

The `templates/` directory houses all modular rendering files used to build the front-end UI, **excluding** global layout files like `header.php` and `footer.php`, which live in the theme root.

From **largest to smallest rendering scope**:

-   `templates/page-templates/` — Custom page templates that define the structure and layout of specific WordPress pages (e.g., About, FAQ, Contact). They must contain a `/** Template Name: … */` header that WordPress lists in **Page Attributes → Template**. These templates are selectable in the WordPress Dashboard when editing a page and typically load reusable layouts or content parts. They provide a flexible way to define unique page types while keeping logic cleanly separated from global layout code.

-   `templates/layouts/` - Large structural layout templates (e.g., full-width, with-sidebar) that define reusable page scaffolding. These layouts are typically loaded by page templates or archive templates and help maintain consistent structure across different pages.

-   `templates/parts/` - Reusable content regions or partials used within templates or layouts (e.g., post loops, hero sections, featured content). These are often context-aware and rely on WordPress template logic like `the_post()`.

-   `templates/components/` - Small, UI-focused building blocks such as buttons, cards, or alerts. These are purely presentational and can be used inside parts, layouts, or other components. They should not contain business logic.

-   `assets/` - Holds all static resources like CSS, JavaScript, and images. While not part of the rendering hierarchy, it supports the visual and interactive layers of the theme.

#### When & Where To Use

-   Use Page‑Templates only for pages that users will explicitly assign from the back-end.
-   Use Layouts for shared structural shells among core templates.
-   Use Parts for self‑contained sections that can be reused inside layouts or page‑templates.
-   Use Components for tiny UI pieces inside parts.

### Theme Root Files

The root of the theme contains all files required by WordPress’s template hierarchy and global structure.

### Project Structure Reference

| Concept          | Description                    | Directory    | Used For                                                                                  |
| ---------------- | ------------------------------ | ------------ | ----------------------------------------------------------------------------------------- |
| **Assets**       | Front-end resources            | `assets/`    | Contains `css/`, `js/`, and `img/` — supports the visual and interactive layers of theme  |
| **Includes**     | Theme logic & setup            | `inc/`       | Backend functionality: setup functions, hooks, enqueueing styles/scripts, utility logic   |
| **Translations** | Language file support          | `languages/` | Internationalization (`.pot`, `.po`, `.mo` files) — optional, safe to remove if unused    |
| **Templates**    | View layer rendering structure | `templates/` | Houses all front-end partials, components, layouts, and custom page templates             |
| **Root**         | Core templates & WP files      | Theme root   | Required files like `style.css`, `functions.php`, `index.php`, `header.php`, `footer.php` |

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

## WooCommerce Integration

This theme includes basic WooCommerce compatibility to support standard eCommerce features out of the box. If you’re not using WooCommerce, you can safely delete `woocommerce.php` and `inc/woocommerce-hooks.php`

### Requirements For WooCommerce Layouts

The `woocommerce.php` file in the theme root acts as a **layout wrapper** for all WooCommerce-generated pages—such as the Shop, Cart, Checkout, and My Account pages. It allows the theme to apply its own structure (like the header, footer, main container, and sidebar) around WooCommerce’s content.

By default, WooCommerce falls back to this file (if it exists) instead of using its own wrapper templates. This ensures consistency in layout across your site and store.

> If no `woocommerce.php` is provided, WooCommerce will fall back to `page.php` or its internal wrappers.

### Optional Template Overrides

If deeper customization is needed, you can override specific WooCommerce templates by creating a `/woocommerce/` folder in your theme.

| **File or Folder**              | **Purpose / Description**                                |
| ------------------------------- | -------------------------------------------------------- |
| 📂 `woocommerce/`               | WooCommerce override directory for theme customization   |
| └─ `archive-product.php`        | Template for the **shop/product archive** page           |
| └─ `single-product.php`         | Template for viewing **individual product pages**        |
| └─ `cart/cart.php`              | Template for displaying the **cart contents**            |
| └─ `checkout/form-checkout.php` | Template for rendering the **checkout form/page layout** |

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
