<?php

namespace Scrumpy\HtmlToProseMirror\Marks;

class Bold extends Mark
{
    public function matching()
    {
        return $this->DOMNode->nodeName === 'strong';
    }

    public function data()
    {
        return [
            'type' => 'bold',
        ];
    }
}
