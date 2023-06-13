<?php

class Account
{

    public $id;
    public $id_user;
    public $money;
    public $id_produits;

    public static function createAccount($id_user, $money, $id_produits)
    {
        $account = new Account();
        $account->id_user = $id_user;
        $account->money = $money;
        $account->id_produits = $id_produits;
        return $account;
    }
}
