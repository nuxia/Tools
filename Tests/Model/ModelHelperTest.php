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
    /**
     * @covers \Nuxia\Component\Tools\Model\ModelHelper::getModelName
     */
    public function testGetModelName()
    {
        $object = new \stdClass();

        $this->assertEquals(ModelHelper::getModelName($object, 'classify'), 'StdClass');
        $this->assertEquals(ModelHelper::getModelName($object, 'tableize'), 'std_class');
        $this->assertEquals(ModelHelper::getModelName($object), 'std_class');
        $this->assertEquals(ModelHelper::getModelName($object, 'lower'), 'stdclass');
        $this->assertEquals(ModelHelper::getModelName($object, 'camelize'), 'stdClass');

        $this->setExpectedException('\RuntimeException');
        ModelHelper::getModelName($object, 'invalid-format');
    }
}

