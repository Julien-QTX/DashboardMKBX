<?php

class Operation
{

    public $id;
    public $id_entrepot;
    public $receiver_local;
    public $value;
    public $id_produits;
    public $created_at;
    public $status;

    public static function createBankOp($id_entrepot, $value, $status)
    {
        $operation = new Operation();
        $operation->id_entrepot = $id_entrepot;
        $operation->value = $value;
        //$operation->admin_id = $admin_id;
        $operation->status = $status;
        return $operation;
    }

    public static function createUserOp($sender_local, $receiver_local, $value, $id_produits)
    {
        $operation = new Operation();
        $operation->id_entrepot = $sender_local;
        $operation->receiver_local = $receiver_local;
        $operation->value = $value;
        $operation->id_produits = $id_produits;
        return $operation;
    }

    public function getOperationDate()
    {
        $date = new DateTime($this->created_at);
        return $date->format('d/m/Y' . 'à' . 'H:i');
    }
}
