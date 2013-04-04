<?php
/**
 * @author  Yannick Voyer (http://github.com/yvoyer)
 * @package Hoard Component
 */

namespace Star\HoardBundle\Tests\Functional;

class EmptyDataSet extends \PHPUnit_Extensions_Database_DataSet_AbstractDataSet
{
    /**
     * Creates an iterator over the tables in the data set. If $reverse is
     * true a reverse iterator will be returned.
     *
     * @param bool $reverse
     * @return PHPUnit_Extensions_Database_DataSet_ITableIterator
     */
    protected function createIterator($reverse = FALSE)
    {
        return new \PHPUnit_Extensions_Database_DataSet_DefaultTableIterator(
            array(), $reverse
        );
    }
}