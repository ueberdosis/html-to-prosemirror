<?php

namespace HtmlToProseMirror\Test\Nodes;

use HtmlToProseMirror\Renderer;
use HtmlToProseMirror\Test\TestCase;

class HorizontalRuleTest extends TestCase
{
    /** @test */
    public function hr_gets_rendered_correctly()
    {
        $html = '<p>Horizontal</p><hr /><p>Rule</p>';

        $json = [
            'type' => 'doc',
            'content' => [
                [
                    'type' => 'paragraph',
                    'content' => [
                        [
                            'type' => 'text',
                            'text' => 'Horizontal',
                        ],
                    ],
                ],
                [
                    'type' => 'horizontal_rule',
                ],
                [
                    'type' => 'paragraph',
                    'content' => [
                        [
                            'type' => 'text',
                            'text' => 'Rule',
                        ],
                    ],
                ],
            ],
        ];

        $this->assertEquals($json, (new Renderer)->render($html));
    }

    /** @test */
    public function hr_gets_rendered_correctly_with_lower_camel_casing()
    {
        $html = '<p>Horizontal</p><hr /><p>Rule</p>';

        $json = [
            'type' => 'doc',
            'content' => [
                [
                    'type' => 'paragraph',
                    'content' => [
                        [
                            'type' => 'text',
                            'text' => 'Horizontal',
                        ],
                    ],
                ],
                [
                    'type' => 'horizontalRule',
                ],
                [
                    'type' => 'paragraph',
                    'content' => [
                        [
                            'type' => 'text',
                            'text' => 'Rule',
                        ],
                    ],
                ],
            ],
        ];

        $this->assertEquals($json, (new Renderer)->withLowerCamelCasedSyntax()->render($html));
    }
}
