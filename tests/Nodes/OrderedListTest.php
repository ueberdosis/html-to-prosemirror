<?php

namespace HtmlToProseMirror\Test\Nodes;

use HtmlToProseMirror\Renderer;
use HtmlToProseMirror\Test\TestCase;

class OrderedListTest extends TestCase
{
    /** @test */
    public function ordered_list_gets_rendered_correctly()
    {
        $html = '<ol><li><p>Example</p></li><li><p>Text</p></li></ol>';

        $json = [
            'type' => 'doc',
            'content' => [
                [
                    'type' => 'ordered_list',
                    'attrs' => [
                        'order' => 1,
                    ],
                    'content' => [
                        [
                            'type' => 'list_item',
                            'content' => [
                                [
                                    'type' => 'paragraph',
                                    'content' => [
                                        [
                                            'type' => 'text',
                                            'text' => 'Example',
                                        ],
                                    ],
                                ],
                            ],
                        ],
                        [
                            'type' => 'list_item',
                            'content' => [
                                [
                                    'type' => 'paragraph',
                                    'content' => [
                                        [
                                            'type' => 'text',
                                            'text' => 'Text',
                                        ],
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ];

        $this->assertEquals($json, (new Renderer)->render($html));
    }

    /** @test */
    public function ordered_list_gets_rendered_correctly_with_lower_camel_casing()
    {
        $html = '<ol><li><p>Example</p></li><li><p>Text</p></li></ol>';

        $json = [
            'type' => 'doc',
            'content' => [
                [
                    'type' => 'orderedList',
                    'attrs' => [
                        'order' => 1,
                    ],
                    'content' => [
                        [
                            'type' => 'listItem',
                            'content' => [
                                [
                                    'type' => 'paragraph',
                                    'content' => [
                                        [
                                            'type' => 'text',
                                            'text' => 'Example',
                                        ],
                                    ],
                                ],
                            ],
                        ],
                        [
                            'type' => 'listItem',
                            'content' => [
                                [
                                    'type' => 'paragraph',
                                    'content' => [
                                        [
                                            'type' => 'text',
                                            'text' => 'Text',
                                        ],
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ];

        $this->assertEquals($json, (new Renderer)->withLowerCamelCasedSyntax()->render($html));
    }

    /** @test */
    public function ordered_list_has_correct_offset()
    {
        $html = '<ol start="3"><li><p>Example</p></li><li><p>Text</p></li></ol>';

        $json = [
            'type' => 'doc',
            'content' => [
                [
                    'type' => 'ordered_list',
                    'attrs' => [
                        'order' => 3,
                    ],
                    'content' => [
                        [
                            'type' => 'list_item',
                            'content' => [
                                [
                                    'type' => 'paragraph',
                                    'content' => [
                                        [
                                            'type' => 'text',
                                            'text' => 'Example',
                                        ],
                                    ],
                                ],
                            ],
                        ],
                        [
                            'type' => 'list_item',
                            'content' => [
                                [
                                    'type' => 'paragraph',
                                    'content' => [
                                        [
                                            'type' => 'text',
                                            'text' => 'Text',
                                        ],
                                    ],
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
