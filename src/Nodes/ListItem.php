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
        if (count($this->DOMNode->childNodes) > 1) {
            $this->wrapper = [
                'type' => 'paragraph',
            ];
        }

        return [
            'type' => 'list_item',
        ];
    }
}
