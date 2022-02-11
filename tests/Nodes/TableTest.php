<?php

namespace HtmlToProseMirror\Test\Nodes;

use HtmlToProseMirror\Renderer;
use HtmlToProseMirror\Test\TestCase;

class TableTest extends TestCase
{
    /** @test */
    public function table_gets_rendered_correctly()
    {
        $html = '<table><tbody>' .
            '<tr>' . '<th><p>text in header cell</p></th>' . '<th colspan="2" data-colwidth="100,0"><p>text in header cell with colspan 2</p></th>' . '</tr>' .
            '<tr>' . '<td rowspan="2"><p>paragraph 1 in cell with rowspan 2</p><p>paragraph 2 in cell with rowspan 2</p></td>' . '<td><p>foo</p></td>' . '<td><p>bar</p></td>' . '</tr>' .
            '<tr>' . '<td><p>foo</p></td>' . '<td><p>bar</p></td>' . '</tr>' .
            '</tbody></table>';

        $json = [
            'type'    => 'doc',
            'content' => [
                [
                    'type'    => 'table',
                    'content' => [
                        [
                            'type'    => 'table_row',
                            'content' => [
                                [
                                    'type'    => 'table_header',
                                    'content' => [
                                        [
                                            'type'    => 'paragraph',
                                            'content' => [
                                                [
                                                    'type' => 'text',
                                                    'text' => 'text in header cell',
                                                ],
                                            ],
                                        ],
                                    ],
                                ],
                                [
                                    'type'    => 'table_header',
                                    'attrs'   => [
                                        'colspan'  => 2,
                                        'colwidth' => [
                                            100,
                                            0,
                                        ],
                                    ],
                                    'content' => [
                                        [
                                            'type'    => 'paragraph',
                                            'content' => [
                                                [
                                                    'type' => 'text',
                                                    'text' => 'text in header cell with colspan 2',
                                                ],
                                            ],
                                        ],
                                    ],
                                ],
                            ],
                        ],
                        [
                            'type'    => 'table_row',
                            'content' => [
                                [
                                    'type'    => 'table_cell',
                                    'attrs'   => [
                                        'rowspan' => 2,
                                    ],
                                    'content' => [
                                        [
                                            'type'    => 'paragraph',
                                            'content' => [
                                                [
                                                    'type' => 'text',
                                                    'text' => 'paragraph 1 in cell with rowspan 2',
                                                ],
                                            ],
                                        ],
                                        [
                                            'type'    => 'paragraph',
                                            'content' => [
                                                [
                                                    'type' => 'text',
                                                    'text' => 'paragraph 2 in cell with rowspan 2',
                                                ],
                                            ],
                                        ],
                                    ],
                                ],
                                [
                                    'type'    => 'table_cell',
                                    'content' => [
                                        [
                                            'type'    => 'paragraph',
                                            'content' => [
                                                [
                                                    'type' => 'text',
                                                    'text' => 'foo',
                                                ],
                                            ],
                                        ],
                                    ],
                                ],
                                [
                                    'type'    => 'table_cell',
                                    'content' => [
                                        [
                                            'type'    => 'paragraph',
                                            'content' => [
                                                [
                                                    'type' => 'text',
                                                    'text' => 'bar',
                                                ],
                                            ],
                                        ],
                                    ],
                                ],
                            ],
                        ],
                        [
                            'type'    => 'table_row',
                            'content' => [
                                [
                                    'type'    => 'table_cell',
                                    'content' => [
                                        [
                                            'type'    => 'paragraph',
                                            'content' => [
                                                [
                                                    'type' => 'text',
                                                    'text' => 'foo',
                                                ],
                                            ],
                                        ],
                                    ],
                                ],
                                [
                                    'type'    => 'table_cell',
                                    'content' => [
                                        [
                                            'type'    => 'paragraph',
                                            'content' => [
                                                [
                                                    'type' => 'text',
                                                    'text' => 'bar',
                                                ],
                                            ],
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
    public function table_gets_rendered_correctly_with_lower_camel_casing()
    {
        $html = '<table><tbody>' .
            '<tr>' . '<th><p>text in header cell</p></th>' . '<th colspan="2" data-colwidth="100,0"><p>text in header cell with colspan 2</p></th>' . '</tr>' .
            '<tr>' . '<td rowspan="2"><p>paragraph 1 in cell with rowspan 2</p><p>paragraph 2 in cell with rowspan 2</p></td>' . '<td><p>foo</p></td>' . '<td><p>bar</p></td>' . '</tr>' .
            '<tr>' . '<td><p>foo</p></td>' . '<td><p>bar</p></td>' . '</tr>' .
            '</tbody></table>';

        $json = [
            'type'    => 'doc',
            'content' => [
                [
                    'type'    => 'table',
                    'content' => [
                        [
                            'type'    => 'tableRow',
                            'content' => [
                                [
                                    'type'    => 'tableHeader',
                                    'content' => [
                                        [
                                            'type'    => 'paragraph',
                                            'content' => [
                                                [
                                                    'type' => 'text',
                                                    'text' => 'text in header cell',
                                                ],
                                            ],
                                        ],
                                    ],
                                ],
                                [
                                    'type'    => 'tableHeader',
                                    'attrs'   => [
                                        'colspan'  => 2,
                                        'colwidth' => [
                                            100,
                                            0,
                                        ],
                                    ],
                                    'content' => [
                                        [
                                            'type'    => 'paragraph',
                                            'content' => [
                                                [
                                                    'type' => 'text',
                                                    'text' => 'text in header cell with colspan 2',
                                                ],
                                            ],
                                        ],
                                    ],
                                ],
                            ],
                        ],
                        [
                            'type'    => 'tableRow',
                            'content' => [
                                [
                                    'type'    => 'tableCell',
                                    'attrs'   => [
                                        'rowspan' => 2,
                                    ],
                                    'content' => [
                                        [
                                            'type'    => 'paragraph',
                                            'content' => [
                                                [
                                                    'type' => 'text',
                                                    'text' => 'paragraph 1 in cell with rowspan 2',
                                                ],
                                            ],
                                        ],
                                        [
                                            'type'    => 'paragraph',
                                            'content' => [
                                                [
                                                    'type' => 'text',
                                                    'text' => 'paragraph 2 in cell with rowspan 2',
                                                ],
                                            ],
                                        ],
                                    ],
                                ],
                                [
                                    'type'    => 'tableCell',
                                    'content' => [
                                        [
                                            'type'    => 'paragraph',
                                            'content' => [
                                                [
                                                    'type' => 'text',
                                                    'text' => 'foo',
                                                ],
                                            ],
                                        ],
                                    ],
                                ],
                                [
                                    'type'    => 'tableCell',
                                    'content' => [
                                        [
                                            'type'    => 'paragraph',
                                            'content' => [
                                                [
                                                    'type' => 'text',
                                                    'text' => 'bar',
                                                ],
                                            ],
                                        ],
                                    ],
                                ],
                            ],
                        ],
                        [
                            'type'    => 'tableRow',
                            'content' => [
                                [
                                    'type'    => 'tableCell',
                                    'content' => [
                                        [
                                            'type'    => 'paragraph',
                                            'content' => [
                                                [
                                                    'type' => 'text',
                                                    'text' => 'foo',
                                                ],
                                            ],
                                        ],
                                    ],
                                ],
                                [
                                    'type'    => 'tableCell',
                                    'content' => [
                                        [
                                            'type'    => 'paragraph',
                                            'content' => [
                                                [
                                                    'type' => 'text',
                                                    'text' => 'bar',
                                                ],
                                            ],
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
}
