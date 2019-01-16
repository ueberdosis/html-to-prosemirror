<?php

namespace Scrumpy\HtmlToProseMirror\Test;

use Scrumpy\HtmlToProseMirror\Renderer;
use Scrumpy\HtmlToProseMirror\Test\TestCase;

class WhitespaceTest extends TestCase
{
    /** @test */
    public function new_line_characters_are_stripped()
    {
        $html = "<p>Example\n Text</p>";

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
}