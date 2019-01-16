<?php

namespace Scrumpy\HtmlToProseMirror;

use Exception;
use DOMElement;
use DOMDocument;

class Renderer
{
    protected $document;

    protected $storedMarks = [];

    protected $marks = [
        Marks\Link::class,
        Marks\Bold::class,
        Marks\Code::class,
        Marks\Italic::class,
    ];

    protected $nodes = [
        Nodes\BulletList::class,
        Nodes\CodeBlock::class,
        Nodes\CodeBlockWrapper::class,
        Nodes\HardBreak::class,
        Nodes\Heading::class,
        Nodes\ListItem::class,
        Nodes\OrderedList::class,
        Nodes\Paragraph::class,
        Nodes\Text::class,
        Nodes\User::class,
    ];

    public function render(string $value): array
    {
        $this->setDocument($value);

        $content = $this->renderChildren(
            $this->getDocumentBody()
        );

        return [
            'type' => 'doc',
            'content' => $content,
        ];
    }

    private function setDocument(string $value): Renderer
    {
        libxml_use_internal_errors(true);

        $this->document = new DOMDocument;
        $this->document->loadHTML(
            $this->stripWhitespace($value)
        );

        return $this;
    }

    private function stripWhitespace(string $value): string
    {
        $value = str_replace("  ", "", $value);
        return preg_replace("/\r|\n/", "", $value);
    }

    private function getDocumentBody(): DOMElement
    {
        return $this->document->getElementsByTagName('body')->item(0);
    }

    private function renderChildren($node): array
    {
        $nodes = [];

        foreach ($node->childNodes as $child) {
            if ($class = $this->getMatchingNode($child)) {
                $item = $class->data();

                if ($item === null) {
                    $nodes = array_merge($nodes, $this->renderChildren($child));
                    continue;
                }

                if ($child->hasChildNodes()) {
                    $item = array_merge($item, [
                        'content' => $this->renderChildren($child),
                    ]);
                }

                if (count($this->storedMarks)) {
                    $item = array_merge($item, [
                        'marks' => $this->storedMarks,
                    ]);
                    $this->storedMarks = [];
                }

                array_push($nodes, $item);
            }

            if ($class = $this->getMatchingMark($child)) {
                array_push($this->storedMarks, $class->data());

                if ($child->hasChildNodes()) {
                    $nodes = array_merge($nodes, $this->renderChildren($child));
                }
            }
        }

        return $nodes;
    }

    private function getMatchingNode($item)
    {
        return $this->getMatchingClass($item, $this->nodes);
    }

    private function getMatchingMark($item)
    {
        return $this->getMatchingClass($item, $this->marks);
    }

    private function getMatchingClass($node, $classes)
    {
        foreach ($classes as $class) {
            $instance = new $class($node);

            if ($instance->matching()) {
                return $instance;
            }
        }

        return false;
    }
}

