<?php
/**
 * Ginq: Generator INtegrated Query
 * Copyright 2013, Atsushi Kanehara <akanehara@gmail.com>
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * PHP Version 5.3 or later
 *
 * @author     Atsushi Kanehara <akanehara@gmail.com>
 * @copyright  Copyright 2013, Atsushi Kanehara <akanehara@gmail.com>
 * @license    MIT License (http://www.opensource.org/licenses/mit-license.php)
 * @package    Ginq
 */

require_once dirname(dirname(__FILE__)) . "/iter.php";

/**
 * DropWhileIterator
 * @package Ginq
 */
class DropWhileIterator implements Iterator
{
    private $it;
    private $predicate;

    private $i;

    public function __construct($xs, $predicate)
    {
        $this->it = iter($xs);
        $this->predicate = $predicate;
    }

    public function current()
    {
        return $this->it->current();
    }

    public function key() 
    {
        return $this->i;
    }
    
    public function next()
    {
        $this->it->next();
        $this->i++;
    }

    public function rewind()
    {
        $this->i = 0;
        $this->it->rewind();
        $p = $this->predicate;
        while ($this->it->valid()) {
            if ($p($this->it->current(), $this->it->key())) {
                $this->it->next();
            } else {
                break;
            }
        }
    }

    public function valid()
    {
        return $this->it->valid();
    }
}
