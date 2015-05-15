<?php

namespace Nuxia\Component\Tools\Model;

use Doctrine\Common\Inflector\Inflector;

/**
 * This class provides helper method for objects
 *
 * @author Yannick Snobbert <yannick.snobbert@gmail.com>
 */
class ModelHelper
{
    /**
     * @param  object $object
     * @param  string $format : lower|tableize|classify|camelize
     *
     * @return string
     *
     * @throws \RuntimeException
     */
    public static function getModelName($object, $format = 'tableize')
    {
        $reflection = new \ReflectionClass(get_class($object));
        $className = $reflection->getShortName();

        switch ($format) {
            case 'lower':
                return strtolower($className);
            case 'tableize':
                return Inflector::tableize($className);
            case 'classify':
                return Inflector::classify($className);
            case 'camelize':
                return Inflector::camelize($className);
            default:
                throw new \RuntimeException('Invalid format');
        }
    }
}

