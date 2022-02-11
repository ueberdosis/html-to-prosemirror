<?php

namespace HtmlToProseMirror\Nodes;

class HardBreak extends Node
{
    public function matching()
    {
        return $this->DOMNode->nodeName === 'br';
    }

    public function data()
    {
        return [
            'type' => $this->lowerCamelCasedSyntax ? 'hardBreak' : 'hard_break',
        ];
    }
}
