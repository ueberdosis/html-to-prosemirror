> We need your support to maintain this package. 💖 https://github.com/sponsors/ueberdosis

# HTML to ProseMirror

Takes HTML and outputs ProseMirror compatible JSON.

[![](https://img.shields.io/packagist/v/ueberdosis/html-to-prosemirror.svg)](https://packagist.org/packages/ueberdosis/html-to-prosemirror)
[![Integrate](https://github.com/ueberdosis/html-to-prosemirror/workflows/Integrate/badge.svg?branch=main)](https://github.com/ueberdosis/html-to-prosemirror/actions)
[![](https://img.shields.io/packagist/dt/ueberdosis/html-to-prosemirror.svg)](https://packagist.org/packages/ueberdosis/html-to-prosemirror)
[![Sponsor](https://img.shields.io/static/v1?label=Sponsor&message=%E2%9D%A4&logo=GitHub)](https://github.com/sponsors/ueberdosis)

## Installation

```bash
composer require ueberdosis/html-to-prosemirror
```

## Usage

```php
(new \HtmlToProseMirror\Renderer)->render('<p>Example Text</p>')
```

## Output

```json
{
    "type": "doc",
    "content": [
        {
            "type": "paragraph",
            "content": [
                {
                    "type": "text",
                    "text": "Example Text"
                }
            ]
        }
    ]
}
```

## Contributing

Pull Requests are welcome.

## Credits

- [Hans Pagel](https://github.com/hanspagel)
- [localheinz](https://github.com/localheinz)
- [sauerbraten](https://github.com/sauerbraten)
- [WiebkeVog](https://github.com/WiebkeVog)
- [pa-bouly](https://github.com/pa-bouly)
- [All Contributors](../../contributors)

## Related packages

- [html-to-prosemirror-js](https://github.com/enVolt/html-to-prosemirror) by @enVolt

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
