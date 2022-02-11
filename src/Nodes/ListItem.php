<?php

namespace HtmlToProseMirror\Nodes;

class ListItem extends Node
{
    public $wrapper = [
        'type' => 'paragraph',
    ];

    public function matching()
    {
        return $this->DOMNode->nodeName === 'li';
    }

    public function data()
    {
        if ($this->DOMNode->childNodes->length === 1
                && $this->DOMNode->childNodes[0]->nodeName == "p") {
            $this->wrapper = null;
        }

        return [
            'type' => $this->lowerCamelCasedSyntax ? 'listItem' : 'list_item',
        ];
    }
}
