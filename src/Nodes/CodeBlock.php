<?php

namespace HtmlToProseMirror\Nodes;

class CodeBlock extends Node
{
    public function matching()
    {
        return
            $this->DOMNode->nodeName === 'code' &&
            $this->DOMNode->parentNode->nodeName === 'pre';
    }

    private function getLanguage()
    {
        return preg_replace("/^language-/", "", $this->DOMNode->getAttribute('class'));
    }

    public function data()
    {
        $type = $this->lowerCamelCasedSyntax ? 'codeBlock' : 'code_block';
        if ($language = $this->getLanguage()) {
            return [
                'type' => $type,
                'attrs' => [
                    'language' => $this->getLanguage(),
                ],
            ];
        }

        return [
            'type' => $type,
        ];
    }
}
