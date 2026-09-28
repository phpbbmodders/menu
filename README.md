# phpBB Modders Menu

[![Tests](https://github.com/phpbbmodders/menu/actions/workflows/tests.yml/badge.svg)](https://github.com/phpbbmodders/menu/actions/workflows/tests.yml) [![Lint](https://github.com/phpbbmodders/menu/actions/workflows/lint.yml/badge.svg)](https://github.com/phpbbmodders/menu/actions/workflows/lint.yml)

A simple dropdown navigation menu for your board; the links are edited by hand in the template.

## Features

- Dropdown menu above the board's navbar, with nested sub-menus.
- Entries can be shown to one group only with `{% if S_GROUP_<id> %}`. Those switches come from the **Group Switches** extension (`phpbbmodders/groupswitches`); without it, group-only entries stay hidden. The shipped template uses group 528 as its example.
- Collapses behind a **Menu** button on small screens.
- No ACP settings: edit the links in `styles/all/template/event/overall_header_navbar_before.html`, then purge the board cache.

## Requirements

- phpBB 3.3.0 or later
- PHP 7.4 or later

## Installation

1. Copy the extension to `/ext/phpbbmodders/menu`
2. In the Administration Control Panel, go to **Customise → Manage extensions**
3. Enable the **phpBB Modders Menu** extension
4. Edit the links in `styles/all/template/event/overall_header_navbar_before.html` and purge the board cache

### Upgrading from `modders/menu`

This extension was previously published as `modders/menu`. To switch:

1. Disable the old "modders_menu" extension in the ACP (do not delete its data; it has none).
2. Delete the `phpBB/ext/modders/menu` folder.
3. Upload this version to `phpBB/ext/phpbbmodders/menu` and enable it. The old extension's leftover record is removed automatically.
4. Purge the board cache (ACP > General > Purge the cache).

If you disable the old extension from the command line (`bin/phpbbcli.php`) instead of the ACP, run `bin/phpbbcli.php cache:purge` before enabling the new one; the command-line disable doesn't clear the cache.

## Contributing

Contributions are welcome!

- **Bug reports**: [Open an issue](https://github.com/phpbbmodders/menu/issues).
- **Everything else** (questions, feature requests, ideas, general discussion): [Use Discussions](https://github.com/orgs/phpbbmodders/discussions), or the [community forum](https://www.phpbbmodders.com/community/).
- Pull requests are welcome for bug fixes or discussed features.

## Acknowledgments

- Kailey Snay and bonelifer.
- Menu design and mobile fixes by Daniel James ([danieltj27](https://github.com/danieltj27)) in #1, #2 and #4.
- Code review, bug fixes, and documentation assisted by [Claude](https://www.anthropic.com/claude).

## License

This extension is licensed under the **GNU General Public License v2.0**.

See [license.txt](license.txt) for more information.
