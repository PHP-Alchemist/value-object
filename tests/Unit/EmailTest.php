<?php

namespace ValueObject\Unit;

use PHPAlchemist\ValueObject\Model\Email;
use PHPAlchemist\ValueObject\Model\VONumber;
use PHPUnit\Framework\TestCase;

class EmailTest extends TestCase
{
    const string VALID_EMAIL_VALUE = 'stuff@things.net';

    public function testInvalidEmail() : void
    {
        $this->expectExceptionMessage('Invalid email address');
        $invalidEmailValue = 'stuff@things';
        new Email($invalidEmailValue);
    }

    public function testValidEmail() : void
    {
        $emailObject = new Email(self::VALID_EMAIL_VALUE);

        $this->assertEquals(self::VALID_EMAIL_VALUE, $emailObject->getValue());
    }

    public function testEquals() : void
    {
        $emailObject      = new Email(self::VALID_EMAIL_VALUE);
        $comparitiveEmail = new Email(self::VALID_EMAIL_VALUE);

        $this->assertTrue($emailObject->equals($comparitiveEmail));
    }

    public function testLength() : void
    {
        $expectedLength = 16;
        $emailObject    = new Email(self::VALID_EMAIL_VALUE);

        $this->assertInstanceOf(VONumber::class, $emailObject->length());
        $this->assertequals($expectedLength, $emailObject->length()->getValue());
    }

    public function testGetUser() : void
    {
        $emailObject = new Email(self::VALID_EMAIL_VALUE);
        $this->assertEquals('stuff', $emailObject->getUser());
    }

    public function testGetDomain() : void
    {
        $emailObject = new Email(self::VALID_EMAIL_VALUE);
        $this->assertEquals('things.net', $emailObject->getDomain());
    }

    public function testGetTLD() : void
    {
        $emailObject = new Email(self::VALID_EMAIL_VALUE);
        $tld         = $emailObject->getTld();
        $this->assertEquals('net', $tld);
        $this->assertTrue(is_string($tld));
    }
}
