<?php

namespace Scrumpy\HtmlToProseMirror\Nodes;

class CodeBlock extends Node
{
    public function matching()
    {
        return
            $this->DOMNode->nodeName === 'code' &&
            $this->DOMNode->parentNode->nodeName === 'pre';
    }

    public function data()
    {
        return [
            'type' => 'code_block',
        ];
    }
}
