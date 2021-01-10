<?php
declare(strict_types=1);

namespace App\Domain\User;

use JsonSerializable;

class Menu implements JsonSerializable
{
    /**
     * @var int|null
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $price;

    /**
     * @var string
     */
    private $image;

    /**
     * @param int|null  $id
     * @param string    $name
     * @param int       $price
     * @param string    $image
     */
    public function __construct(?int $id, string $name, ?int $price, string $image)
    {
        $this->id = $id;
        $this->name = strtolower($name);
        $this->price = $price;
        $this->image = $image;
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getPrice(): ?int
    {
        return $this->price;
    }

    /**
     * @return string
     */
    public function getImage(): string
    {
        return $this->image;
    }

    /**
     * @return array
     */
    public function jsonSerialize()
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'price' => $this->price,
            'image' => $this->image,
        ];
    }
}
