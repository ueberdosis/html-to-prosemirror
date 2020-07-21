<?php

namespace HtmlToProseMirror\Test\Nodes;

use HtmlToProseMirror\Renderer;
use HtmlToProseMirror\Test\TestCase;

class HeadingTest extends TestCase
{
    /** @test */
    public function h1_gets_rendered_correctly()
    {
        $html = '<h1>Example Text</h1>';

        $json = [
            'type' => 'doc',
            'content' => [
                [
                    'type' => 'heading',
                    'attrs' => [
                        'level' => 1,
                    ],
                    'content' => [
                        [
                            'type' => 'text',
                            'text' => 'Example Text',
                        ],
                    ],
                ],
            ],
        ];

        $this->assertEquals($json, (new Renderer)->render($html));
    }

    /** @test */
    public function h2_gets_rendered_correctly()
    {
        $html = '<h2>Example Text</h2>';

        $json = [
            'type' => 'doc',
            'content' => [
                [
                    'type' => 'heading',
                    'attrs' => [
                        'level' => 2,
                    ],
                    'content' => [
                        [
                            'type' => 'text',
                            'text' => 'Example Text',
                        ],
                    ],
                ],
            ],
        ];

        $this->assertEquals($json, (new Renderer)->render($html));
    }
}
