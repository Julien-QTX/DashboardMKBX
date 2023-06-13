<?php

class OperationManager
{
    private $db;

    function __construct($db)
    {
        $this->db = $db;
    }

    public function insertBankOp(Operation $operation, $operation_name)
    {
        $stmh = $this->db->prepare('INSERT INTO ' . $operation_name . '(id_entrepot, value, status) VALUES(?, ?, ?)');
        $stmh->execute([
            $operation->id_entrepot, $operation->value, $operation->status
        ]);
        return $this->db->lastInsertId();
    }

    public function insertUserOp(Operation $operation)
    {
        $stmh = $this->db->prepare('INSERT INTO transactions(sender_local, receiver_local, value, id_produits) VALUES(?, ?, ?, ?)');
        $stmh->execute([
            $operation->id_entrepot, $operation->receiver_local, $operation->value, $operation->id_produits
        ]);
        return $this->db->lastInsertId();
    }

    public function deposit($user_id, $value)
    {
        $stmh = $this->db->prepare('SELECT * FROM entrepot WHERE id_user = ?');
        $stmh->execute([$user_id]);
        $utilisateur = $stmh->fetch();

        $money_usr = floatval($value);
        $new_money = $utilisateur['money'] + $money_usr;

        $stmh = $this->db->prepare('UPDATE entrepot SET money = ? WHERE id = ?');
        $stmh->execute([$new_money, $utilisateur['id']]);
    }

    public function withdraw($user_id, $value)
    {
        $stmh = $this->db->prepare('SELECT * FROM entrepot WHERE id_user = ?');
        $stmh->execute([$user_id]);
        $utilisateur = $stmh->fetch();

        $money_usr = floatval($value);
        $new_money = $utilisateur['money'] - $money_usr;

        $stmh = $this->db->prepare('UPDATE entrepot SET money = ? WHERE id = ?');
        $stmh->execute([$new_money, $utilisateur['id']]);
    }

    public function transaction($sender_id, $receiver_id, $value)
    {
        $this->withdraw($sender_id, $value);
        $this->deposit($receiver_id, $value);
    }

    public function getByOperation($operation, $id)
    {
        $stmh = $this->db->prepare('SELECT * FROM ' . $operation . ' WHERE id_entrepot = ? AND status=50');
        $stmh->execute([
            $id
        ]);
        $stmh->setFetchMode(PDO::FETCH_CLASS, 'Operation');
        $op = $stmh->fetch();
        return $op;
    }
}
