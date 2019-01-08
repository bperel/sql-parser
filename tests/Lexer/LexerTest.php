<?php

namespace PhpMyAdmin\SqlParser\Tests\Lexer;

use PhpMyAdmin\SqlParser\Exceptions\LexerException;
use PhpMyAdmin\SqlParser\Lexer;
use PhpMyAdmin\SqlParser\Tests\TestCase;

class LexerTest extends TestCase
{
    /**
     * @runInSeparateProcess
     * @preserveGlobalState disabled
     */
    public function testError()
    {
        $lexer = new Lexer('');

        $lexer->error('error #1', 'foo', 1, 2);
        $lexer->error(
            sprintf('%2$s #%1$d', 2, 'error'),
            'bar',
            3,
            4
        );

        $this->assertEquals(
            $lexer->errors,
            [
                new LexerException('error #1', 'foo', 1, 2),
                new LexerException('error #2', 'bar', 3, 4),
            ]
        );
    }

    /**
     * @expectedException \PhpMyAdmin\SqlParser\Exceptions\LexerException
     * @expectedExceptionMessage strict error
     * @expectedExceptionCode 4
     */
    public function testErrorStrict()
    {
        $lexer = new Lexer('');
        $lexer->strict = true;

        $lexer->error('strict error', 'foo', 1, 4);
    }

    /**
     * @dataProvider testLexProvider
     *
     * @param mixed $test
     */
    public function testLex($test)
    {
        $this->runParserTest($test);
    }

    public function testLexProvider()
    {
        return [
            ['lexer/lex'],
            ['lexer/lexUtf8'],
            ['lexer/lexBool'],
            ['lexer/lexComment'],
            ['lexer/lexCommentEnd'],
            ['lexer/lexDelimiter'],
            ['lexer/lexDelimiter2'],
            ['lexer/lexDelimiterErr1'],
            ['lexer/lexDelimiterErr2'],
            ['lexer/lexDelimiterErr3'],
            ['lexer/lexDelimiterLen'],
            ['lexer/lexKeyword'],
            ['lexer/lexKeyword2'],
            ['lexer/lexNumber'],
            ['lexer/lexOperator'],
            ['lexer/lexString'],
            ['lexer/lexStringErr1'],
            ['lexer/lexSymbol'],
            ['lexer/lexSymbolErr1'],
            ['lexer/lexSymbolErr2'],
            ['lexer/lexSymbolErr3'],
            ['lexer/lexSymbolUser'],
            ['lexer/lexWhitespace'],
            ['lexer/lexLabel1'],
            ['lexer/lexLabel2'],
            ['lexer/lexNoLabel'],
        ];
    }
}
