<?php

class Node
{
    private $_iData; // data item (key)

    public function __construct($key)
    {
        $this->_iData = $key;
    }

    public function getKey()
    {
        return $this->_iData;
    }
}

class Heap
{
    private $_heapArray;
    private $_currentSize;

    public function __construct()
    {
        $_heapArray = array();
        $this->_currentSize = 0;
    }

    /**
     * Delete item with max key (assumes non-empty list)
     */
    public function remove()
    {
        $root = $this->_heapArray[0];
        // put last element into root
        $this->_heapArray[0] = $this->_heapArray[--$this->_currentSize];
        // "sift" the root
        $this->bubbleDown(0);

        return $root; // return reference to removed root
    }

    /**
     * The "sift" process
     * (heap formation from our array of nodes)
     *
     * @param type $index
     */
    public function bubbleDown($index)
    {
        $largerChild = null;
        $top = $this->_heapArray[$index]; // save root
        while ($index < (int)($this->_currentSize/2)) { // not on bottom row
            $leftChild = 2 * $index + 1;
            $rightChild = $leftChild + 1;

            // find larger child
            if ($rightChild < $this->_currentSize
                    && $this->_heapArray[$leftChild] < $this->_heapArray[$rightChild]) // right child exists?
            {
                $largerChild = $rightChild;
            } else {
                $largerChild = $leftChild;
            }

            // top >= largerChild?
            if ($top->getKey() >= $this->_heapArray[$largerChild]->getKey()) {
                break;
            }

            // shift child up
            $this->_heapArray[$index] = $this->_heapArray[$largerChild];
            $index = $largerChild; // go down
        }

        $this->_heapArray[$index] = $top; // root to index
    }

    public function insertAt($index, Node $newNode)
    {
        $this->_heapArray[$index] = $newNode;
    }

    public function incrementSize()
    {
        $this->_currentSize++;
    }

    public function getSize()
    {
        return $this->_currentSize;
    }

    public function asArray()
    {
        $arr = array();
        for ($j = 0; $j < sizeof($this->_heapArray); $j++) {
            $arr[] = $this->_heapArray[$j]->getKey();
        }

        return $arr;
    }
}

function heapsort(Heap $Heap)
{
    $size = $Heap->getSize();
    // "sift" all nodes,
    // except lowest level (it means only for half of nodes array)
    // we skip lowest level, because lowest level don't have children
    for ($j = (int)($size/2) - 1; $j >= 0; $j--) { // make array into heap
        $Heap->bubbleDown($j);
    }

    // display heap
//    $arr = $Heap->asArray();
//    echo "Heap : ";
//    foreach ($arr as $val) {
//        echo $val . " ";
//    }

    // sort the heap
    for ($j = $size-1; $j >= 0; $j--) {
        $BiggestNode = $Heap->remove();
        // use same nodes array
        // for sorted elements
        $Heap->insertAt($j, $BiggestNode);
    }

    return $Heap->asArray(); // get sorted array
}

// Example:
$arr = array(81,6,23,38,95,71,72,39,34,53);
$Heap = new Heap();
foreach ($arr as $key => $val) {
    $Node = new Node($val);
    $Heap->insertAt($key, $Node);
    $Heap->incrementSize();
}
$result = heapsort($Heap);
print_r($result);
