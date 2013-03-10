<?php
/**
 * @author  Yannick Voyer (http://github.com/yvoyer)
 * @package Hoard Component
 */

// namespace Star\Component\Hoard\Tests\Builder;

// use Star\Component\Hoard\Builder\ItemBuilder;
// use Star\Component\Hoard\Tests\HoardTestCase;

// class ItemBuilderTest extends HoardTestCase
// {
//     const INSTANCE_CLASS = "Star\Component\Hoard\Model\Item";

//     public function testCreateItemFromTemplate()
//     {
//         $name    = uniqid("name");
//         $price   = rand();
//         $isMagic = true;

//         $template = $this->getMockTemplate();
//         $template->expects($this->once())
//             ->method("getName")
//             ->will($this->returnValue($name));
//         $template->expects($this->once())
//             ->method("getValue")
//             ->will($this->returnValue($price));
//         $template->expects($this->once())
//             ->method("isMagic")
//             ->will($this->returnValue($isMagic));

//         $builder = $this->getBuilder();
//         $item = $builder->create($template);

//         $this->assertInstanceOf(self::INSTANCE_CLASS, $item);
//         $this->assertSame($name, $item->getName());
//         $this->assertSame($price, $item->getValue());
//         $this->assertSame($isMagic, $item->isMagic());
//     }

// //     public function testCreateItemWithNoTemplateCreateATemplate()
// //     {
// //         $builder = $this->getBuilder();
// //         $this->markTestIncomplete("todo");
// //     }

//     private function getBuilder()
//     {
//         $this->markTestSkipped("Deprecated");
//         return new ItemBuilder(self::INSTANCE_CLASS);
//     }
// }
