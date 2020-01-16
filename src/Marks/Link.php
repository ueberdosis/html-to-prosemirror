<?php

namespace Scrumpy\HtmlToProseMirror\Marks;

class Link extends Mark
{
    public function matching()
    {
        return $this->DOMNode->nodeName === 'a';
    }

    public function data()
    {
        return [
            'type' => 'link',
            'attrs' => [
                'href' => $this->DOMNode->getAttribute('href'),
                'target' => $this->DOMNode->getAttribute('target'),
                'rel' => $this->DOMNode->getAttribute('rel'),
            ],
        ];
    }
}
