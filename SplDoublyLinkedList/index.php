<?php

$a = new \SplDoublyLinkedList;

if ($a instanceof \SplDoublyLinkedList) {
    $a->add(0, 'Paulus');
    $a->add(1, 'Gandung');
    $a->add(2, 'Prakosa');

    // then, iterate over that because \SplDoublyLinkedList
    // is implementing \Iterator interface.
    foreach ($a as $value) {
        echo sprintf("%s\n", $value);
    }
}


/**
spl 双向链表，主要插入的数组，然后需要指定数组的键值。一个链表保存的数组的键值，一个链表保存的数组的值


**/

