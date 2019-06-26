<?php

namespace Scrumpy\HtmlToProseMirror\Test\Nodes;

use Scrumpy\HtmlToProseMirror\Renderer;
use Scrumpy\HtmlToProseMirror\Test\TestCase;

class BoldTest extends TestCase
{
    /** @test */
    public function strong_gets_rendered_correctly()
    {
        $html = '<p><strong>Example Text</strong></p>';

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
                                    'type' => 'bold',
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
