<?php

namespace Tosj\Message;

class MessageTest extends \PHPUnit_Framework_TestCase
{

    public function testGetMessage() 
    {
      $msg = new \Tosj\Message\Message(true);

      // Test if msg unset
      $res = $msg->getMessage();
      $this->assertNull($res, "Expected Null");


      // Test to set msg
      $message = ['type' => 'error', 'msg' => 'Test message'];
      $msg->setMessage($message);
      $res = $msg->getMessage();
      $this->assertTrue(is_string($res), "Expected string");
    }
}
