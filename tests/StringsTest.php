<?php

use PHPUnit\Framework\TestCase;

class StringsTest extends TestCase
{
    /**
     * @see https://www.php.net/manual/en/language.types.string.php
     */
    public function testVariableParsing()
    {
        $foo = 'world';

        // Double quotes.
        $this->assertEquals('Hello world', "Hello $foo");

        // Single quotes.
        $this->assertEquals('Hello $foo', 'Hello $foo');

        $this->assertEquals('Hello world', "Hello ${foo}");

        $this->assertEquals('Hello world', "Hello " . $foo);

        $this->assertEquals('Hello world', <<<LABEL
Hello $foo
LABEL);

        $this->assertEquals('Hello $foo', <<<'LABEL'
Hello $foo
LABEL);
    }

    /**
     * @see https://www.php.net/manual/en/ref.strings.php
     */
    public function testStringFunctions()
    {
        // trim — Strip whitespace (or other characters) from the beginning and end of a string
        $this->assertEquals('Hello', trim('  Hello         '));
        $this->assertEquals('Hello', trim('....Hello......', '.'));

        // ltrim — Strip whitespace (or other characters) from the beginning of a string
        $this->assertEquals('Hello', ltrim('.......Hello', '.'));

        // rtrim — Strip whitespace (or other characters) from the end of a string
        $this->assertEquals('Hello', rtrim('Hello......', '.'));

        // strtoupper — Make a string uppercase
        $this->assertEquals('HELLO', strtoupper('hello'));

        // strtolower — Make a string lowercase
        $this->assertEquals('hello', strtolower('HeLlO'));

        // ucfirst — Make a string's first character uppercase
        $this->assertEquals('Nikolai', ucfirst('nikolai'));

        // lcfirst — Make a string's first character lowercase
        $this->assertEquals('hello', lcfirst('Hello'));

        // strip_tags — Strip HTML and PHP tags from a string
        $this->assertEquals('Hello', strip_tags('<p><h1>Hello</h1></p>'));

        // htmlspecialchars — Convert special characters to HTML entities
        $this->assertEquals('&lt;p&gt;&lt;h1&gt;Hello&lt;/h1&gt;&lt;/p&gt;', htmlspecialchars('<p><h1>Hello</h1></p>'));

        // addslashes — Quote string with slashes
        $this->assertEquals("O\'Reilly", addslashes("O'Reilly"));

        // strcmp — Binary safe string comparison
        $this->assertEquals(0, strcmp('hello', 'hello'));

        // strncasecmp — Binary safe case-insensitive string comparison of the first n characters
        $this->assertEquals(0, strcasecmp('Hello', 'hello'));

        // str_replace — Replace all occurrences of the search string with the replacement string
        $this->assertEquals('Hello', str_replace('t', 'l', 'Hetto'));

        // strpos — Find the position of the first occurrence of a substring in a string
        $this->assertEquals(1, strpos('Hello', 'e'));

        // strstr — Find the position of the first occurrence of a substring in a string
        $this->assertEquals('Nick Nechai', strstr('Hello Nick Nechai', 'N'));

        // strrchr — Find the last occurrence of a character in a string
        $this->assertEquals('Nechai', strrchr('Hello Nick Nechai', 'N'));

        // substr — Return part of a string
        $this->assertEquals('Hello', substr('Hello Nick Nechai', 0, 5));

        // sprintf — Return a formatted string
        $this->assertEquals('I am Nick. Today is 12 july', sprintf('I am %s. Today is %d july', 'Nick', 12));
    }
}