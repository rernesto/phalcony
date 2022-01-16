<?php
declare(strict_types=1);

namespace App\Model;

use Phalcon\Mvc\Model;

class User extends Model
{
    protected ?int $id = null;

    protected string $email;

    protected string $password;

    public function onConstruct()
    {
        $this->setSource('users');
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): User
    {
        $this->email = $email;
        return $this;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): User
    {
        $this->password = $password;
        return $this;
    }
}