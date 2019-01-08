<?php

namespace PhpMyAdmin\SqlParser\Tests\Parser;

use PhpMyAdmin\SqlParser\Tests\TestCase;

class DeleteStatementTest extends TestCase
{
    /**
     * @dataProvider testDeleteProvider
     *
     * @param mixed $test
     */
    public function testDelete($test)
    {
        $this->runParserTest($test);
    }

    public function testDeleteProvider()
    {
        return [
            ['parser/parseDelete'],
            ['parser/parseDelete2'],
            ['parser/parseDelete3'],
            ['parser/parseDelete4'],
            ['parser/parseDelete5'],
            ['parser/parseDelete6'],
            ['parser/parseDelete7'],
            ['parser/parseDelete8'],
            ['parser/parseDelete9'],
            ['parser/parseDelete10'],
            ['parser/parseDelete11'],
            ['parser/parseDelete12'],
            ['parser/parseDeleteErr1'],
            ['parser/parseDeleteErr2'],
            ['parser/parseDeleteErr3'],
            ['parser/parseDeleteErr4'],
            ['parser/parseDeleteErr5'],
            ['parser/parseDeleteErr6'],
            ['parser/parseDeleteErr7'],
            ['parser/parseDeleteErr8'],
            ['parser/parseDeleteErr9'],
            ['parser/parseDeleteErr10'],
            ['parser/parseDeleteErr11'],
            ['parser/parseDeleteErr12'],
            ['parser/parseDeleteJoin'],
        ];
    }
}
