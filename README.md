# HTML to ProseMirror

Takes HTML and outputs ProseMirror compatible JSON.

[![](https://img.shields.io/packagist/v/scrumpy/html-to-prosemirror.svg)](https://packagist.org/packages/scrumpy/html-to-prosemirror)
[![](https://img.shields.io/packagist/dt/scrumpy/html-to-prosemirror.svg)](https://packagist.org/packages/scrumpy/html-to-prosemirror)
[![](https://api.travis-ci.org/scrumpy/html-to-prosemirror.svg?branch=master)](https://travis-ci.org/scrumpy/html-to-prosemirror)

## Installation

    composer require scrumpy/html-to-prosemirror

## Usage

    (new \Scrumpy\HtmlToProseMirror\Renderer)->render('<p>Example Text</p>')

## Output

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

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Credits

- [Hans Pagel](https://github.com/hanspagel)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.