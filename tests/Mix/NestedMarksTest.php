<?php

namespace Scrumpy\HtmlToProseMirror\Test\Nodes;

use Scrumpy\HtmlToProseMirror\Renderer;
use Scrumpy\HtmlToProseMirror\Test\TestCase;

class NestedMarksTest extends TestCase
{
    /** @test */
    public function nested_marks_get_rendered_correctly()
    {
        $html = '<strong>right <em>wrong</em></strong>';

        $json = [
            'type' => 'doc',
            'content' => [
                [
                    'type' => 'text',
                    'text' => 'right ',
                    'marks' => [
                        [
                            'type' => 'bold',
                        ],
                    ],
                ],
                [
                    'type' => 'text',
                    'text' => 'wrong',
                    'marks' => [
                        [
                            'type' => 'bold',
                        ],
                        [
                            'type' => 'italic',
                        ],
                    ],
                ],
            ],
        ];

        // $this->outputJson((new Renderer)->render($html));

        $this->assertEquals($json, (new Renderer)->render($html));
    }
}
