<?php

namespace Scrumpy\HtmlToProseMirror\Marks;

class Sub extends Mark
{
    public function matching()
    {
        return $this->DOMNode->nodeName === 'sub';
    }

    public function data()
    {
        return [
            'type' => 'sub',
        ];
    }
}
