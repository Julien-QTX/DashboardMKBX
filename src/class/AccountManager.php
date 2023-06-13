<?php

class AccountManager
{
	private $db;

	function __construct($db)
	{
		$this->db = $db;
	}

	public function insertAccount(Account $account)
	{
		$stmh = $this->db->prepare('INSERT INTO entrepot(id_user, money, id_produits) VALUES(?, ?, ?)');
		$stmh->execute([
			$account->id_user, $account->money, $account->id_produits
		]);
		return $this->db->lastInsertId();
	}
}
