<?php 
namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\alunosModel;

class Alunos extends Controller
{
    public function index(){
        $model = new alunosModel();

        $data = [
            'title' => 'Alunos',
            'alunos' => $model->getAlunos(),
        ];

        echo view('templates/header',$data);
        echo view('pages/alunos' ,$data);
        echo view('templates/footer');


    }
    public function mostrarAlunos($id = null){
        $model = new alunosModel();
        $data['alunos'] = $model->getAlunos($id);

        if(empty($data)){
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Nenhuma informação adicional ser mostrada');
        }
        
        $data['title'] = "Perfil completo";

        echo view('templates/header',$data);
        echo view('pages/perfilCompleto' ,$data);
        echo view('templates/footer');

    }
    public function inserir(){

        helper('form');
        $data['title'] = 'Inserir novo aluno';

        echo view('templates/header',$data);
        echo view('pages/alunosGravar');
        echo view('templates/footer');
    }

    public function gravar(){
        helper('form');
        $model = new alunosModel();
        if($this->validate([
            'nome' => ['label' => 'nome', 'rules' => 'required'],
            'endereco' => ['label' => 'endereco', 'rules' => 'required'],
        ])){
            $id = $this->request->getVar('id');
            $nome = $this->request->getVar('nome');
            $endereco = $this->request->getVar('endereco');
            $img = $this->request->getFile('img');

            if(!$img->isValid()){
            $model ->save([
                'id' => $id,
                'nome' => $nome,
                'endereco' => $endereco,                 
            ]);
            return redirect('alunos');
        }else{
            $validaImg = $this->validate([
                'img' => [
                    'uploaded[img]',
                    'mime_in[img,image/jpg,image/jpeg,image/gif,image/png]',
                    
                ],
            ]);
            if($validaImg){
                $newName = $img->getRandomName();
                $img->move('img/alunos',$newName);

                $model ->save([
                    'id' => $id,
                    'nome' => $nome,
                    'endereco' => $endereco,
                    'img' => $newName                 
                ]);
                return redirect('alunos');
            }else{
                $data['title'] = 'Erro ao cadastrar aluno';
                echo view('templates/header',$data);
                echo view('pages/alunosGravar');
                echo view('templates/footer');
            }
        }
        }else{
            $data['title'] = 'Erro ao cadastrar aluno';
            echo view('templates/header',$data);
            echo view('pages/alunosGravar');
            echo view('templates/footer');
        }

    }

    public function editar($id = null){
        $model = new alunosModel();
        $data = [
            'title' => 'Editando informações do alunos',
            'alunos' => $model -> getAlunos($id),
        ];

        if(empty($data)){
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Aluno não encontrado');
        }
        
        echo view('templates/header',$data);
        echo view('pages/alunosGravar' ,$data);
        echo view('templates/footer');
    }

    public function excluir($id = null){
        $model = new alunosModel();
        $model->delete($id);
        return redirect('alunos');
    }

	//--------------------------------------------------------------------

}
