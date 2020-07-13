> This repository has been migrated to a new organization (Read more: https://github.com/ueberdosis/tiptap/issues/759)

# HTML to ProseMirror

Takes HTML and outputs ProseMirror compatible JSON.

[![](https://img.shields.io/packagist/v/ueberdosis/html-to-prosemirror.svg)](https://packagist.org/packages/ueberdosis/html-to-prosemirror)
[![](https://api.travis-ci.org/ueberdosis/html-to-prosemirror.svg?branch=master)](https://travis-ci.org/ueberdosis/html-to-prosemirror)
[![](https://img.shields.io/packagist/dt/ueberdosis/html-to-prosemirror.svg)](https://packagist.org/packages/ueberdosis/html-to-prosemirror)

## Installation

```bash
composer require ueberdosis/html-to-prosemirror
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
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
