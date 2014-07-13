# chippyash/logical-matrix

## Quality Assurance

[![Build Status](https://travis-ci.org/chippyash/Matrix.svg?branch=master)](https://travis-ci.org/chippyash/Matrix)
[![Coverage Status](https://coveralls.io/repos/chippyash/Matrix/badge.png)](https://coveralls.io/r/chippyash/Matrix)
[![SensioLabsInsight](https://insight.sensiolabs.com/projects/b8a7e3f8-d33a-435f-a0e7-a4fdfb2e8318/mini.png)](https://insight.sensiolabs.com/projects/b8a7e3f8-d33a-435f-a0e7-a4fdfb2e8318)

## What?

This library aims to provide logic matrix functionality and builds on the
chippyash/Matrix matrix data structure library:

*  Everything has a test case
*  It's PHP 5.4+

### Operations supported

*  AndMatrix - return the result of two matrices ANDed
*  AndOperand - return matrix ANDed with a boolean operand
*  Not - return !matrix
*  OrMatrix - return the result of two matrices ORed
*  OrOperand - return matrix ORed with a boolean operand
*  XorMatrix - return the result of two matrices XORed
*  XorOperand - return matrix XORed with a boolean operand

The library is released under the [GNU GPL V3 or later license](http://www.gnu.org/copyleft/gpl.html)

## How

Please see the [Basic Matrix](https://github.com/chippyash/Matrix) for underlying
functionality.  Anything you can do with a Matrix, you can do with a LogicalMatrix.

### Coding Basics

A LogicalMatrix is a matrix for which all entries are a boolean value; true or false

A shortcut for a single item matrix is to supply a single array

<pre>
    use chippyash\Logic\Matrix\LogicalMatrix;

    $mA = new LogicalMatrix([]);  //empty matrix
    $mA = new LogicalMatrix([[]]);  //empty matrix
    $mA = new LogicalMatrix([true]);  //single item matrix
    $mA = new LogicalMatrix([2, false]);  //1x2 matrix
    $mA = new LogicalMatrix([2, false],[true, 'foo']);  //2x2 matrix
</pre>

N.B.  A matrix construction values are converted to their boolean equivalent, so
'' = false, 'foo' = true, 1 = true, 0 = false etc, according to normal PHP casting
rules for boolean.

As with any TDD application, the tests tell you everything you need to know about
the SUT.  Read them!  However for the short of temper amongst us, the salient
points are:

A Logical Matrix type is supplied

*  LogicalMatrix(array $source, bool $normalizeDefault = false)

#### Logical Matrices have additional attributes over and above a Matrix

*  Attributes always return a boolean.
*  You can use the is() method of a Matrix to test for an attribute
*  Attributes implement the chippyash\Matrix\Interfaces\AttributeInterface

<pre>
    //assuming $mA is a LogicalMatrix - this will return true
    if ($mA->is('Logical')) {}
    //is the same as, which can also be used on ordinary matrices
    $attr = new Logic\Matrix\Attribute\IsLogical();
    if ($attr($mA) {}
</pre>

#### Logical Matrices have operations

*  Operations always returns a Logical Matrix
*  The original matrix is untouched
*  You can use the magic __invoke functionality
*  Operations implement the chippyash\Logical\Matrix\Interfaces\OperationInterface

<pre>
    $mC = $mA("AndMatrix", $mB);
    //same as :
    $comp = new Logic\Matrix\Operation\AndMatrix;
    $mC = $comp($mA, $mB);
</pre>

#### The magic invoke methods allow you to write in a functional way

<pre>
        $fAnd = new AndMatrix();
        $fOr = new OrOperand();
        //($mA && $mB) || true
        return $fOr($fAnd($mA, $mB), true);
</pre>

### Changing the library

1.  fork it
2.  write the test
3.  amend it
4.  do a pull request

Found a bug you can't figure out?

1.  fork it
2.  write the test
3.  do a pull request

NB. Make sure you rebase to HEAD before your pull request

## Where?

The library is hosted at [Github](https://github.com/chippyash/Logical-matrix). It is
available at [Packagist.org](https://packagist.org/packages/chippyash/logical-matrix)

### Installation

Install [Composer](https://getcomposer.org/)

#### For production

add

<pre>
    "chippyash/logical-matrix": "~1.0"
</pre>

to your composer.json "requires" section

#### For development

Clone this repo, and then run Composer in local repo root to pull in dependencies

<pre>
    git clone git@github.com:chippyash/Logical-matrix.git LogicMatrix
    cd LogicMatrix
    composer update
</pre>

To run the tests:

<pre>
    cd LogicMatrix
    vendor/bin/phpunit -c test/phpunit.xml test/
</pre>