<?php
declare(strict_types=1);

namespace App\Domain\Menu;

interface UserRepository
{
    /**
     * @return Menu[]
     */
    public function findAll(): array;

    /**
     * @param int $id
     * @return Menu
     * @throws MenuNotFoundException
     */
    public function findUserOfId(int $id): Menu;
}
