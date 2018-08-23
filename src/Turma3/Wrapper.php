<?php
    namespace Turma3;
    
	use Turma3\Config;
    
    use Turma3\Base;
    
    class Wrapper{
		public $dbh;
		public function __construct()
		{
			$config = new Config('mysql', 'localhost', 3306, 'turma3', 'root', '');
			$this->dbh = new Base($config);
        }
        
		public function __destruct()
		{
			$this->dbh->desconectar();
		}
        
        public function insertCat($categoria)
		{
			$sql = "INSERT INTO categoria (nome) VALUES (:categoria)";
			$stmt = $this->dbh->preparar($sql);
			$stmt->bindParam(':categoria', $categoria, \PDO::PARAM_STR);
			$stmt->execute();
		}
		public function updateCat($id, $nome)
		{
			$sql = "UPDATE categoria SET nome = :nome WHERE id = :id LIMIT 1";
			$stmt = $this->dbh->preparar($sql);
			$stmt->bindParam(':nome', $nome, \PDO::PARAM_STR);
			$stmt->bindParam(':id', $id, \PDO::PARAM_INT);
			$stmt->execute();
        }
        
		public function delCat($id)
		{
			$sql = "DELETE FROM categoria WHERE id = :id LIMIT 1";
			$stmt = $this->dbh->preparar($sql);
			$stmt->bindParam(':id', $id, \PDO::PARAM_INT);
			$stmt->execute();
		}
		public function listCats()
		{
			$sql = sprintf("SELECT * FROM %s ORDER BY %s ASC", 'categoria','id');
			$stmt = $this->dbh->preparar($sql);
			$stmt->execute();
			return $res = $stmt->fetchAll(\PDO::FETCH_CLASS);
		}
		public function searchCat($id){
			$sql = "SELECT * FROM categoria WHERE id = :id LIMIT 1";
			$stmt = $this->dbh->preparar($sql);
			$stmt->bindParam(':id', $id, \PDO::PARAM_INT);
			$stmt->execute();
			return $stmt->fetchObject();
		}
	}
