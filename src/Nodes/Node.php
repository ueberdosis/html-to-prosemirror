<?php

namespace HtmlToProseMirror\Nodes;

class Node
{
    public $wrapper = null;

    public $type = 'node';

    protected $DOMNode;

    protected $lowerCamelCasedSyntax;

    public function __construct($DOMNode, bool $lowerCamelCasedSyntax = false)
    {
        $this->DOMNode = $DOMNode;
        $this->lowerCamelCasedSyntax = $lowerCamelCasedSyntax;
    }

    public function matching()
    {
        return false;
    }

    public function data()
    {
        return [];
    }
}
