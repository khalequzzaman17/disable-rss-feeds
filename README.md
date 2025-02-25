# Disable RSS Feeds

A lightweight WordPress plugin to disable all RSS feeds on your website. This plugin provides a simple settings page to toggle the feature on or off.

---

## Features

- Disables all RSS feeds (RSS, RDF, RSS2, Atom, and comment feeds).
- Redirects feed requests to the homepage.
- Includes a settings page in the WordPress admin to enable or disable the feature.

---

## Installation

1. Download the plugin as a ZIP file or clone the repository into your `wp-content/plugins/` directory.
2. Go to **Plugins** in your WordPress admin dashboard.
3. Activate the "Disable RSS Feeds" plugin.
4. Navigate to **Settings > Disable RSS Feeds** to configure the plugin.

---

## Usage

1. **Enable/Disable RSS Feeds**:
   - Go to **Settings > Disable RSS Feeds**.
   - Check the box to disable RSS feeds or uncheck it to enable them.
   - Click "Save Settings".

2. **Test the Plugin**:
   - Visit your site's RSS feed URLs (e.g., `https://yourwebsite.com/feed/`) to ensure they are redirected to the homepage.

---

## Customization

- **Redirect to a Custom Page**:
  Replace `home_url()` with your desired URL in the `drf_disable_feeds` function in the plugin file.

- **Add More Options**:
  Extend the settings page to include additional features like logging or custom redirects.

---

## Contributing

Contributions are welcome! If you have any suggestions, bug reports, or feature requests, please open an issue or submit a pull request.

---

## License

This plugin is licensed under the GPLv2 (or later) license. See the [LICENSE](LICENSE) file for details.

---

## Changelog

### 1.0
- Initial release.
- Added settings page to toggle RSS feeds.
- Redirects all feed requests to the homepage.

---

## Support

If you need help with this plugin, please open an issue on GitHub or contact the author.

---

## Author

[Khalequzzaman](https://sysninja.net)

---

## Credits

- Inspired by the need to disable RSS feeds for security or performance reasons.
- Built with ❤️ for the WordPress community.
