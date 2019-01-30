<?php

namespace Scrumpy\HtmlToProseMirror\Nodes;

class Text extends Node
{
    public function matching()
    {
        return $this->DOMNode->nodeName === '#text';
    }

    public function data()
    {
        return [
            'type' => 'text',
            'text' => ltrim($this->DOMNode->nodeValue, "\n"),
        ];
    }
}
