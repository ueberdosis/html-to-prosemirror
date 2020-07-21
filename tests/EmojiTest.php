<?php

namespace HtmlToProseMirror\Test;

use HtmlToProseMirror\Renderer;

class EmojiTest extends TestCase
{
    /** @test */
    public function emojis_are_transformed_correctly()
    {
        $html = "<p>🔥</p>";

        $json = [
            'type' => 'doc',
            'content' => [
                [
                    'type' => 'paragraph',
                    'content' => [
                        [
                            'type' => 'text',
                            'text' => "🔥",
                        ],
                    ],
                ],
            ],
        ];

        $this->assertEquals($json, (new Renderer)->render($html));
    }
}
