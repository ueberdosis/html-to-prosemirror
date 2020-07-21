<?php

namespace HtmlToProseMirror\Test\Nodes;

use HtmlToProseMirror\Renderer;
use HtmlToProseMirror\Test\TestCase;

class ParagraphTest extends TestCase
{
    /** @test */
    public function simple_text_gets_rendered_correctly()
    {
        $html = '<p>Example Text</p>';

        $json = [
            'type' => 'doc',
            'content' => [
                [
                    'type' => 'paragraph',
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
    public function multiple_nodes_get_rendered_correctly()
    {
        $html = '<p>Example</p><p>Text</p>';

        $json = [
            'type' => 'doc',
            'content' => [
                [
                    'type' => 'paragraph',
                    'content' => [
                        [
                            'type' => 'text',
                            'text' => 'Example',
                        ],
                    ],
                ],
                [
                    'type' => 'paragraph',
                    'content' => [
                        [
                            'type' => 'text',
                            'text' => 'Text',
                        ],
                    ],
                ],
            ],
        ];

        $this->assertEquals($json, (new Renderer)->render($html));
    }
}
