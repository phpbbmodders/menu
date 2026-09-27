# phpBB Modders Menu

The site navigation menu used on phpbbmodders.com.

## Installation

Copy the extension to `phpBB/ext/phpbbmodders/menu`.

Go to "ACP" > "Customise" > "Extensions" and enable the "phpBB Modders Menu" extension.

### Upgrading from `modders/menu`

This extension was previously published as `modders/menu`. To switch:

1. Disable the old "modders_menu" extension in the ACP (do not delete its data; it has none).
2. Delete the `phpBB/ext/modders/menu` folder.
3. Upload this version to `phpBB/ext/phpbbmodders/menu` and enable it. The old extension's leftover record is removed automatically.
4. Purge the board cache (ACP > General > Purge the cache).

## License

[GPLv2](license.txt)
