<?php

namespace Scrumpy\HtmlToProseMirror\Nodes;

class Paragraph extends Node
{
    public function matching()
    {
        return $this->DOMNode->nodeName === 'p' || $this->DOMNode->nodeName === 'br';
    }

    public function data()
    {
        return [
            'type' => 'paragraph',
        ];
    }
}
