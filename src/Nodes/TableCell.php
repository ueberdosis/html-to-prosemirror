<?php

namespace HtmlToProseMirror\Nodes;

class TableCell extends Node
{
    protected $tagName = 'td';
    protected $nodeType = 'table_cell';
    protected $nodeTypeLowerCamelCased = 'tableCell';

    public function matching()
    {
        return $this->DOMNode->nodeName === $this->tagName;
    }

    public function data()
    {
        $data = [
            'type' => $this->lowerCamelCasedSyntax ? $this->nodeTypeLowerCamelCased : $this->nodeType,
        ];

        $attrs = [];
        if ($colspan = $this->DOMNode->getAttribute('colspan')) {
            $attrs['colspan'] = intval($colspan);
        }
        if ($colwidth = $this->DOMNode->getAttribute('data-colwidth')) {
            $widths = array_map(function ($w) {
                return intval($w);
            }, explode(',', $colwidth));
            if (count($widths) === $attrs['colspan']) {
                $attrs['colwidth'] = $widths;
            }
        }
        if ($rowspan = $this->DOMNode->getAttribute('rowspan')) {
            $attrs['rowspan'] = intval($rowspan);
        }

        if (!empty($attrs)) {
            $data['attrs'] = $attrs;
        }

        return $data;
    }
}
