<?php

namespace Scrumpy\HtmlToProseMirror\Marks;

class Sup extends Mark
{
    public function matching()
    {
        return $this->DOMNode->nodeName === 'sup';
    }

    public function data()
    {
        return [
            'type' => 'sup',
        ];
    }
}
