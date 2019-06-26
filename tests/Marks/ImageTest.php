<?php

namespace Scrumpy\HtmlToProseMirror\Test\Nodes;

use Scrumpy\HtmlToProseMirror\Renderer;
use Scrumpy\HtmlToProseMirror\Test\TestCase;

class ImageTest extends TestCase
{
    /** @test */
    public function image_gets_rendered_as_link()
    {
        $html = '<img src="https://example.com/eggs.png" alt="The Finished Dish" />';

        $json = [
            'type' => 'doc',
            'content' => [
                [
                    'type' => 'text',
                    'text' => 'https://example.com/eggs.png',
                    'marks' => [
                        [
                            'type' => 'link',
                            'attrs' => [
                                'href' => 'https://example.com/eggs.png',
                            ],
                        ],
                    ],
                ],
            ],
        ];

        $this->assertEquals($json, (new Renderer)->render($html));
    }
}
