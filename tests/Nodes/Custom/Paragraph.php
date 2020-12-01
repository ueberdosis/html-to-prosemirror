<?php

namespace HtmlToProseMirror\Test\Nodes\Custom;

use HtmlToProseMirror\Nodes\Node;

class Paragraph extends Node
{
    public function matching()
    {
        return $this->DOMNode->nodeName === 'div';
    }

    public function data()
    {
        return [
            'type' => 'paragraph',
        ];
    }
}
