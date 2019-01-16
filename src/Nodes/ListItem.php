<?php

namespace Scrumpy\HtmlToProseMirror\Nodes;

class ListItem extends Node
{
    public function matching()
    {
        return $this->DOMNode->nodeName === 'li';
    }

    public function data()
    {
        return [
            'type' => 'list_item',
        ];
    }
}
