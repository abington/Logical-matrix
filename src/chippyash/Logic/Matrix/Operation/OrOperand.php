<?php
/*
 * Matrix library
 *
 * @author Ashley Kitson <akitson@zf4.biz>
 * @copyright Ashley Kitson, UK, 2014
 * @licence GPL V3 or later : http://www.gnu.org/licenses/gpl.html
 */

namespace chippyash\Logic\Matrix\Operation;

use chippyash\Logic\Matrix\Operation\AbstractOpOperation;
use chippyash\Logic\Matrix\LogicalMatrix;

/**
 * OR each matrix item with the supplied operand
 */
class OrOperand extends AbstractOpOperation
{
    /**
     * @param LogicalMatrix $mA matrix to operate on
     * @param mixed $op operand
     * @return LogicalMatrix
     */
    protected function doOperation(LogicalMatrix $mA, $op)
    {
        $data = $mA->toArray();
        $lx = $mA->columns();
        $ly = $mA->rows();
        for ($x=0; $x<$lx; $x++) {
            for ($y=0; $y<$ly; $y++) {
                $data[$y][$x] = ($data[$y][$x] || $op);
            }
        }

        return new LogicalMatrix($data);
    }
}