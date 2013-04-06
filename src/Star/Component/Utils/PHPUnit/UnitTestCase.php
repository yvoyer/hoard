<?php
/**
 * @author  Yannick Voyer (http://github.com/yvoyer)
 * @package Utils Component
 */

namespace Star\Component\Utils\PHPUnit;

/**
 * @author Yannick Voyer
 *
 * Base class for unit tests cases.
 * This class wraps reusable test cases assertions
 */
class UnitTestCase extends \PHPUnit_Framework_TestCase
{
    /**
     * Assert that the $class has the $option available in its consrtuct
     *
     * @param string $option
     * @param mixed  $value
     * @param string $class
     */
    protected function assertAttributeOptionalizable($option, $value, $class)
    {
        $options = array(
            $option => $value,
        );

        if (is_object($class)) {
            $class = get_class($class);
        }

        $object = new $class($options);
        $getter = "get" . ucfirst($option);
        $this->assertSame($value, $object->{$getter}(), "The {$class}::{$getter}() should return the same value as the option");
    }

    /**
     * Assert that the $attribute has setter and getter for $object
     *
     * @param string $attribute
     * @param object $object
     * @param mixed  $value
     */
    protected function assertSetterGetter($attribute, $object, $value)
    {
        $setter = "set" . ucfirst($attribute);
        $getter = "get" . ucfirst($attribute);
        $fullClassName = get_class($object);
        $aClass = explode('\\', $fullClassName);
        $class  = array_pop($aClass);

        $this->assertMethodExists($object, $setter);
        $this->assertSame($object, $object->{$setter}($value), "The {$class}::{$setter}() should return self");

        $this->assertMethodExists($object, $getter);
        $this->assertSame($value, $object->{$getter}(), "The {$class}::{$getter}() should return the same value as the one setted");

        if (is_bool($value)) {
            $this->assertMethodExists($object, $attribute);
            $this->assertSame($value, $object->{$attribute}(), "The {$class}::{$attribute}() should be a boolean");
        }
    }

    /**
     * Assert that the $method exists for $object
     *
     * @param object $object
     * @param string $method
     */
    protected function assertMethodExists($object, $method)
    {
        $class = get_class($object);
        $this->assertTrue(method_exists($object, $method), "The '{$method}' should exists for object: {$class}");
    }

    /**
     * Assert that the $method do not exists for $object
     *
     * @param object $object
     * @param string $method
     */
    protected function assertMethodDoNotExists($object, $method)
    {
        $class = get_class($object);
        $this->assertFalse(method_exists($object, $method), "The '{$method}' should not exists for object: {$class}");
    }
}