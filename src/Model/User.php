<?php

class User extends Model
{
    private string $name;
    private string $email;
    private string $password;

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name)
    {
        $this->name = $name;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email)
    {
        $this->email = $email;
    }

    public function passwordMatches(string $password): bool
    {
        return $this->password == password_hash($password, PASSWORD_BCRYPT);
    }

    public function setPassword(string $password)
    {
        $this->password = password_hash($password, PASSWORD_BCRYPT);
    }
}
