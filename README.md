# WP Hijack Plugin by Nicolas Lagios

![WP Hijack Banner](https://nicolaslagios.com/wp-content/uploads/2020/09/profile.jpg)

> Keep your WordPress theme and plugin customizations safe even after updates!

## Description

Important!!!
This is alpha version. Has been tested only on Virtualmin VPS.
Maybe it works on another servers (plesk, cpanel, etc) but keep in mind to have a backup of your files before run it.
In a future version I intend to change the whole philosophy of the Plugin. That is, instead of replacing content, rename the old file to _old and put the new modified file in its place. Tests will also be done on other servers (mainly for the problem with absolute paths) and backend management panel will be added.
Until then, Salut ;)

WP Hijack is a WordPress plugin developed by Nicolas Lagios that allows you to preserve your theme and plugin customizations even after updates. Instead of losing your changes, this plugin hijacks specific files and replaces their content with custom versions from within the plugin, ensuring your modifications remain intact.

**Please Note:** Modifying theme and plugin files directly is generally not recommended practice. It's preferable to use hooks, filters, and actions to extend or modify functionality to avoid issues during updates. WP Hijack is intended for use in specific scenarios where no filter or action is available for making your customizations.

## Features

- Simple and straightforward plugin setup.
- Safeguard your theme and plugin modifications.
- Easy-to-use management panel (coming soon in the next version).

## Installation

1. Download the latest release from the [GitHub repository](https://github.com/nicolaslagios/wp-hijack).
2. Upload the plugin folder to your WordPress installation's `wp-content/plugins` directory.
3. Activate the "WP Hijack" plugin from the WordPress admin dashboard.

## Usage

To use WP Hijack, follow these steps:

1. Open the plugin file (`bypasser.php`) and find the `$theme_replaced_files_array` and `$plugins_replaced_files_array`.
2. Add the file paths and their corresponding identifiers (e.g., function names) to the arrays for themes and plugins you want to preserve.
3. Create custom versions of those files and store them in the `custom-theme-files` and `custom-plugin-files` subfolders within the plugin.
4. After a theme or plugin update, WP Hijack will automatically replace the original files with your custom versions if the specified identifiers are found.

**Note:** The next version of the plugin will include a management panel for easier handling of file modifications.

## License

WP Hijack is open-source software licensed under the GNU General Public License, version 2.0 or later. See [LICENSE](https://www.gnu.org/licenses/gpl-2.0.html) for more details.

## Contact

If you have any questions, feedback, or issues, feel free to contact the author:

- Author: Nicolas Lagios
- Website: [https://nicolaslagios.com](https://nicolaslagios.com)
- Email: info@nicolaslagios.com

## Contributing

Contributions to this project are welcome. If you would like to improve the plugin or add new features, please submit a pull request.

## Changelog

- 0.0.1 (current version)
  - Initial release.

## Support

If you encounter any problems with the plugin or need assistance, please open an issue on the [GitHub repository](https://github.com/nicolaslagios/wp-hijack/issues).

Enjoy preserving your WordPress customizations with WP Hijack!
