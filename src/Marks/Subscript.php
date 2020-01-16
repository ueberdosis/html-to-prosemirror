<?php

namespace Scrumpy\HtmlToProseMirror\Marks;

class Subscript extends Mark
{
    public function matching()
    {
        return $this->DOMNode->nodeName === 'subscript';
    }

    public function data()
    {
        return [
            'type' => 'sub',
        ];
    }
}
