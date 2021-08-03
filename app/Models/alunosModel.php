<?php
    namespace App\Models;
    use CodeIgniter\Model;

    class alunosModel extends Model{
        //Atributos de config 
        protected $table = 'Alunos';
        protected $primaryKey = 'id';
        protected $allowedFields = ['nome','endereco','img'];

        protected $useSoftDeletes = true;
        protected $useTimestamps = true;
        protected $dateFormat = 'datetime'; 
        protected $createdField = 'created_at';
        protected $updatedField = 'updated_at';
        protected $deletedField = 'deleted_at';

        //Metodo GET
        public function getAlunos($id = false){
            if($id === false){
                return $this->findAll();
            }
            else{
                return $this->asArray()->where(['id' => $id])->first();
            }

        }

    }
?>