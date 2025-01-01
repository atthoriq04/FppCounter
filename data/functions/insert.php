<?
class insert
{
    function __construct($loc)
    {
        include_once $loc;
        $this->$query = new query();
    }
    function insertName() {}
}
