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

/**
 * RangeInfIterator
 * @package Ginq
 */
class RangeInfIterator implements Iterator
{
    private $start;
    private $step;

    private $i;
    private $x;

    public function __construct($start, $step)
    {
        $this->start = $start;
        $this->step  = $step;
    }

    public function current()
    {
        return $this->x;
    }

    public function key() 
    {
        return $this->i;
    }

    public function next()
    {
        $this->i++;
        $this->x += $this->step;
    }

    public function rewind()
    {
        $this->i = 0;
        $this->x = $this->start;
    }

    public function valid()
    {
        return true;
    }
}
