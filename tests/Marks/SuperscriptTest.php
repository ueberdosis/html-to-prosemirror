<?php

namespace HtmlToProseMirror\Test\Marks;

use HtmlToProseMirror\Renderer;
use HtmlToProseMirror\Test\TestCase;

class SuperscriptTest extends TestCase
{
    /** @test */
    public function superscript_gets_rendered_correctly()
    {
        $html = '<p><sup>Example Text</sup></p>';

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
                                    'type' => 'superscript',
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
