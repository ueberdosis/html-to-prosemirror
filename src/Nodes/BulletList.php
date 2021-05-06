<?php

namespace HtmlToProseMirror\Nodes;

class BulletList extends Node
{
    public function matching()
    {
        return $this->DOMNode->nodeName === 'ul';
    }

    public function data()
    {
        return [
            'type' => $this->lowerCamelCasedSyntax ? 'bulletList' : 'bullet_list',
        ];
    }
}
