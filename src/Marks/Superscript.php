<?php

namespace Scrumpy\HtmlToProseMirror\Marks;

class Superscript extends Mark
{
    public function matching()
    {
        return $this->DOMNode->nodeName === 'superscript';
    }

    public function data()
    {
        return [
            'type' => 'sup',
        ];
    }
}
