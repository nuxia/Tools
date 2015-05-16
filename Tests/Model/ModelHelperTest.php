<?php

namespace Nuxia\Component\Tools\Tests\Model;

use Nuxia\Component\Tools\Model\ModelHelper;

/**
 * Unit tests for {@see \Nuxia\Component\Tools\Model\ModelHelper} 
 * 
 * @author Yannick Snobbert <yannick.snobbert@gmail.com>
 */
class ModelHelperTest extends \PHPUnit_Framework_TestCase
{
    public function testGetModelName()
    {
        $object = new \stdClass();

        $this->assertEquals('StdClass', ModelHelper::getModelName($object, 'classify'));
        $this->assertEquals('std_class', ModelHelper::getModelName($object, 'tableize'));
        $this->assertEquals('std_class', ModelHelper::getModelName($object));
        $this->assertEquals('stdclass', ModelHelper::getModelName($object, 'lower'));
        $this->assertEquals('stdClass', ModelHelper::getModelName($object, 'camelize'));

        $this->setExpectedException('\RuntimeException');
        $this->assertEquals('stdClass', ModelHelper::getModelName($object, 'invalid-format'));
    }
}

