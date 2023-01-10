<?php
/**
 * The below functions take the single level array of items as an argument
 * and turn it into a multidimensional array structure (tree),
 * where each item has an array of sub-items.
 *
 * Each item should have at least an `id` and `parent_id`,
 * where the `parent_id` is `0` if it's top level.
 *
 * Source: http://goo.gl/p2GybZ
 */

// for object
function buildTreeFromObjects($items) {

    $childs = [];

    foreach ($items as $item)
        $childs[$item->parent_id][] = $item;

    foreach ($items as $item) if (isset($childs[$item->id]))
        $item->childs = $childs[$item->id];

    return $childs[0];
}

// or array version
function buildTreeFromArray($items) {

    $childs = [];

    foreach ($items as &$item) $childs[$item['parent_id']][] = &$item;
    unset($item);

    foreach ($items as &$item) if (isset($childs[$item['id']]))
        $item['childs'] = $childs[$item['id']];

    return $childs[0];
}

// usage:

$arrData = [
    // Business
    ['id' => 1, 'name' => 'Business', 'parent_id' => 0],
    ['id' => 5, 'name' => 'Books and magazines', 'parent_id' => 1],
    ['id' => 6, 'name' => 'Electronics and telecom', 'parent_id' => 1],

    // Computers
    ['id' => 2, 'name' => 'Computers', 'parent_id' => 0],

    // Health
    ['id' => 3, 'name' => 'Health', 'parent_id' => 0],
    ['id' => 7, 'name' => 'Addictions', 'parent_id' => 3],
    ['id' => 8, 'name' => 'Dentistry', 'parent_id' => 3],
    ['id' => 9, 'name' => 'Vision Care', 'parent_id' => 3],

    // Sports
    ['id' => 4, 'name' => 'Sports', 'parent_id' => 0],
    ['id' => 10, 'name' => 'Winter Sports', 'parent_id' => 4],
    ['id' => 11, 'name' => 'Ice skating', 'parent_id' => 10],
    ['id' => 12, 'name' => 'Sledding', 'parent_id' => 10],
];

$tree = buildTreeFromArray($arrData);