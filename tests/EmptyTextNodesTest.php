<?php

namespace HtmlToProseMirror\Test;

use HtmlToProseMirror\Renderer;

class EmptyTextNodesTest extends TestCase
{
    /** @test */
    public function output_must_not_have_empty_text_nodes()
    {
        $html = "<em><br />\n</em>";

        $json = [
            'type' => 'doc',
            'content' => [
                [
                    'type' => 'hard_break',
                    'marks' => [
                        [
                            'type' => 'italic',
                        ],
                    ],
                ],
            ],
        ];

        $this->assertEquals($json, (new Renderer)->render($html));
    }
}
