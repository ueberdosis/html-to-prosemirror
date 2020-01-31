# HTML to ProseMirror

Takes HTML and outputs ProseMirror compatible JSON.

[![](https://img.shields.io/packagist/v/scrumpy/html-to-prosemirror.svg)](https://packagist.org/packages/scrumpy/html-to-prosemirror)
[![](https://api.travis-ci.org/scrumpy/html-to-prosemirror.svg?branch=master)](https://travis-ci.org/scrumpy/html-to-prosemirror)
[![](https://img.shields.io/packagist/dt/scrumpy/html-to-prosemirror.svg)](https://packagist.org/packages/scrumpy/html-to-prosemirror)

## Installation

```bash
composer require scrumpy/html-to-prosemirror
```

## Usage

```php
(new \Scrumpy\HtmlToProseMirror\Renderer)->render('<p>Example Text</p>')
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
- [sauerbraten](https://github.com/sauerbraten)
- [WiebkeVog](https://github.com/WiebkeVog)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
