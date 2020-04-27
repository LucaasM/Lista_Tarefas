<?php
    // CRUD 
    class AssignmentService {

        private $connection;
        private $assignment;

        public function __construct(Connection $connection, Assignment $assignment){
            $this->connection = $connection->to_connect();
            $this->assignment = $assignment;
        }
  
        
        public function insert(){ // Criar/inserir
            $query_insert = 'insert into tb_tarefas(assignment)values(:assignment)';
            $stmt = $this->connection->prepare($query_insert);
            $stmt->bindValue(':assignment', $this->assignment->__get('assignment'));
            $stmt->execute();
            
        }
        public function to_recover(){ // Recuperar
            // Produtos cartesiano
            $query_list = '
                select t.id, s.status, t.assignment 
                from tb_tarefas as t
                left join tb_status as s on (t.id_status = s.id)
                
            ';
            $stmt = $this->connection->prepare($query_list);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);

        }

        public function update(){ // Atualizar
            $query_update = 'update tb_tarefas set assignment = :assignment where id = :id' ;
            $stmt = $this->connection->prepare($query_update);
            $stmt->bindValue(':assignment', $this->assignment->__get('assignment'));
            $stmt->bindValue(':id', $this->assignment->__get('id'));
            $stmt->execute();
        }  

        public function to_remove(){ // Deletar
            $query_delete = 'delete from tb_tarefas where id = :id';
            $stmt = $this->connection->prepare($query_delete);
            $stmt->bindValue(':id', $this->assignment->__get('id'));
            $stmt->execute();
        }   
        
        public function brand_realized(){
            $query_update = 'update tb_tarefas set id_status = :id_status where id = :id' ;
            $stmt = $this->connection->prepare($query_update);
            $stmt->bindValue(':id_status', $this->assignment->__get('id_status'));
            $stmt->bindValue(':id', $this->assignment->__get('id'));
            return $stmt->execute();
        }
        public function pending_taks(){
            $condicao = 1;
            $query_select = '
                select t.id, s.status, t.assignment 
                from tb_tarefas as t
                left join tb_status as s on (t.id_status = s.id)';
            $stmt = $this->connection->prepare($query_select);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        }
    }



?>