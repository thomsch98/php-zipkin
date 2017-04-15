<?php
namespace Drefined\Zipkin\Core;

class Identifier
{
    /** @var string $id */
    private $id;

    /**
     * @param string $id
     */
    public function __construct($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->id;
    }

    /**
     * @return Identifier
     */
    public static function generate()
    {
        $id = bin2hex(file_get_contents('/dev/urandom', 0, null, -1, 8));

        return new self($id);
    }
    
    /**
     * @return Identifier
     */
    public static function generate128()
    {
        $id = bin2hex(file_get_contents('/dev/urandom', 0, null, 0, 16));
        return new self($id);
    }
}
