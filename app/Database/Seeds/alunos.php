<?php
    namespace APP\Database\Seeds;

    class Alunos extends \CodeIgniter\Database\Seeder{
        public function run(){
            $data = [
                'nome' => 'Caio Rocha',
                'endereco' => 'Rua comandante miranda,104',
                
            ];

            $this->db->table('alunos')->insert($data);
        
        }
    }

?>