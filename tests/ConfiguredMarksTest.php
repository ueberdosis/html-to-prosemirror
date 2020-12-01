<?php

namespace HtmlToProseMirror\Test;

use HtmlToProseMirror\Renderer;

class ConfiguredMarksTest extends TestCase
{
    /** @test */
    public function bold_is_enabled_by_default()
    {
        $html = '<strong>Example Text</strong>';

        $json = [
            'type' => 'doc',
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
        ];

        $this->assertEquals($json, (new Renderer)->render($html));
    }

    /** @test */
    public function bold_is_enabled_explicitly()
    {
        $html = '<strong>Example Text</strong>';

        $json = [
            'type' => 'doc',
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
        ];

        $this->assertEquals($json, (new Renderer)->withMarks([
            \HtmlToProseMirror\Marks\Bold::class,
        ])->render($html));
    }

    /** @test */
    public function all_marks_are_disabled()
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
                        ],
                    ],
                ],
            ],
        ];

        $this->assertEquals($json, (new Renderer)->withMarks([])->render($html));
    }

    /** @test */
    public function bold_is_replaced_with_a_custom_integration()
    {
        $html = '<p><b>Example Text</b></p>';

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

        $this->assertEquals($json, (new Renderer)->replaceMark(
            \HtmlToProseMirror\Marks\Bold::class,
            \HtmlToProseMirror\Test\Marks\Custom\Bold::class
        )->render($html));
    }
}
