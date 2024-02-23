<?php

interface AuthenticateStrategy
{
    public function authenticate($username, $password);

    public function changePassword($username, $password);
}


class ItauAuthentication implements AuthenticateStrategy
{
    public function authenticate($username, $password)
    {
        return "Autenticação no Itau para o usuário {$username}";
    }

    public function changePassword($username, $password)
    {
        return "Alterando a senha no Itau para o usuário {$username}";
    }
}

class PicPayAuthentication  implements AuthenticateStrategy
{
    public function authenticate($username, $password)
    {
        return "Autenticação no PicPay para o usuário {$username}";
    }
    public function changePassword($username, $password)
    {
        return "Alterando a senha no PicPay para o usuário {$username}";
    }
}

class SantanderAuthentication implements AuthenticateStrategy
{
    public function authenticate($username, $password)
    {
        return "Autenticação no Santander para o usuário {$username}";
    }
    public function changePassword($username, $password)
    {
        return "Alterando a senha no Santander para o usuário {$username}";
    }
}

class BankSystem
{
    private $authenticationStrategy;

    public function setAuthenticationStrategy(AuthenticateStrategy $strategy)
    {
        $this->authenticationStrategy = $strategy;
    }

    public function authenticateUser($username, $password)
    {
        return $this->authenticationStrategy->authenticate($username, $password);
    }

    public function changeUserPassword($username, $password){
        return $this->authenticationStrategy->changePassword($username, $password);
    }

}


$bankSystem = new BankSystem();
$bankSystem->setAuthenticationStrategy(new SantanderAuthentication());
echo $bankSystem->changeUserPassword('Novo usuario', '12112') . PHP_EOL;

echo $bankSystem->authenticateUser('Nael', '123');
