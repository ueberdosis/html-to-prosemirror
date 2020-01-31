<?php

namespace Scrumpy\HtmlToProseMirror\Test\Nodes;

use Scrumpy\HtmlToProseMirror\Renderer;
use Scrumpy\HtmlToProseMirror\Test\TestCase;

class LinkTest extends TestCase
{
    /** @test */
    public function link_gets_rendered_correctly()
    {
        $html = '<a href="https://scrumpy.io" target="_blank" rel="noopener">Example Link</a>';

        $json = [
            'type' => 'doc',
            'content' => [
                [
                    'type' => 'text',
                    'text' => 'Example Link',
                    'marks' => [
                        [
                            'type' => 'link',
                            'attrs' => [
                                'href' => 'https://scrumpy.io',
                                'target' => '_blank',
                                'rel' => 'noopener',
                            ],
                        ],
                    ],
                ],
            ],
        ];

        $this->assertEquals($json, (new Renderer)->render($html));
    }
}
