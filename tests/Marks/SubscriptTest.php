<?php

namespace HtmlToProseMirror\Test\Marks;

use HtmlToProseMirror\Renderer;
use HtmlToProseMirror\Test\TestCase;

class SubscriptTest extends TestCase
{
    /** @test */
    public function subscript_gets_rendered_correctly()
    {
        $html = '<p><sub>Example Text</sub></p>';

        $json = [
            'type' => 'doc',
            'content' => [
                [
                    'type' => 'paragraph',
                    'content' => [
                        [
                            'type' => 'text',
                            'text' => 'Example Text',
                            'marks' => [
                                [
                                    'type' => 'subscript',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ];

        $this->assertEquals($json, (new Renderer)->render($html));
    }
}
