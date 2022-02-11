<?php

namespace HtmlToProseMirror\Nodes;

class HorizontalRule extends Node
{
    public function matching()
    {
        return $this->DOMNode->nodeName === 'hr';
    }

    public function data()
    {
        return [
            'type' => $this->lowerCamelCasedSyntax ? 'horizontalRule' : 'horizontal_rule',
        ];
    }
}
