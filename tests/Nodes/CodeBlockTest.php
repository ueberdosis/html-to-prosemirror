<?php

namespace HtmlToProseMirror\Test\Nodes;

use HtmlToProseMirror\Renderer;
use HtmlToProseMirror\Test\TestCase;

class CodeBlockTest extends TestCase
{
    /** @test */
    public function code_block_gets_rendered_correctly()
    {
        $html = '<pre><code>Example Text</code></pre>';

        $json = [
            'type' => 'doc',
            'content' => [
                [
                    'type' => 'code_block',
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
    public function code_block_with_language_gets_rendered_correctly()
    {
        $html = '<pre><code class="language-css">body { display: none }</code></pre>';

        $json = [
            'type' => 'doc',
            'content' => [
                [
                    'type' => 'code_block',
                    'attrs' => [
                        'language' => 'css',
                    ],
                    'content' => [
                        [
                            'type' => 'text',
                            'text' => 'body { display: none }',
                        ],
                    ],
                ],
            ],
        ];

        $this->assertEquals($json, (new Renderer)->render($html));
    }
}
