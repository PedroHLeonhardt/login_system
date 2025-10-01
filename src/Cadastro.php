<?php

class Usuario 
{
    private string $name;
    private string $email;
    private string $password;

    public function __construct($name, $email, $password)
    {
        $this->setName($name);
        $this->setEmail($email);
        $this->setPassword($password);
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName($name)
    {
        if (empty($name))
        {
            throw new InvalidArgumentException("Este campo é obrigatório");
        }

        if (strlen($name) < 6)
        {
            throw new InvalidArgumentException("Seu nome deve conter mais de 5 caracteres");
        }
        $this->name = $name;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL))
        {
            throw new InvalidArgumentException("Email inválido");
        }
        $this->email = $email;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword($password)
    {
        if (strlen($password) < 6)
        {
            throw new InvalidArgumentException("Sua senha deve conter no mínimo 6 digitos");
        }
        $this->password = $password;
    }
}