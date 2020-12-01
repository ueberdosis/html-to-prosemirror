<?php

namespace HtmlToProseMirror\Test;

use HtmlToProseMirror\Renderer;

class ConfiguredNodesTest extends TestCase
{
    /** @test */
    public function paragraph_is_enabled_by_default()
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
    public function paragraph_is_enabled_explicitly()
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

        $this->assertEquals($json, (new Renderer)->withNodes([
            \HtmlToProseMirror\Nodes\Text::class,
            \HtmlToProseMirror\Nodes\Paragraph::class,
        ])->render($html));
    }

    /** @test */
    public function all_nodes_are_disabled()
    {
        $html = '<p>Example Text</p>';

        $json = [
            'type' => 'doc',
            'content' => [],
        ];

        $this->assertEquals($json, (new Renderer)->withNodes([])->render($html));
    }

    /** @test */
    public function paragraph_is_replaced_with_a_custom_integration()
    {
        $html = '<div>Example Text</div>';

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

        $this->assertEquals($json, (new Renderer)->replaceNode(
            \HtmlToProseMirror\Nodes\Paragraph::class,
            \HtmlToProseMirror\Test\Nodes\Custom\Paragraph::class
        )->render($html));
    }
}
