<?php

namespace Scrumpy\HtmlToProseMirror\Marks;

class Italic extends Mark
{
    public function matching()
    {
        return $this->DOMNode->nodeName === 'em';
    }

    public function data()
    {
        return [
            'type' => 'italic',
        ];
    }
}
