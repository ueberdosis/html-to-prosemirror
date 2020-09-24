<?php

namespace HtmlToProseMirror\Test;

use League\CLImate\CLImate;
use PHPUnit\Framework\TestCase as BaseTestCase;

class TestCase extends BaseTestCase
{
    public function debugJson($data)
    {
        $climate = new CLImate;
        $climate->json($data);
        die();
    }
}
