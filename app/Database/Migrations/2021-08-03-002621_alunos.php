<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;


// OBSERVAÇÃO: CAMPOS IMAGEM,CREATED_AT, UPDATED_AT E DELETED_AT FORAM CRIADOS MANUALMENTE NO PHPADMIN


class Alunos extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id' => [
					'type'           => 'INT',
					'unsigned'       => TRUE,
					'auto_increment' => TRUE,
			],
			'nome' => [
					'type'           => 'TEXT',
					'constraint'     => '100',
			],
			'endereco' => [
				   'type'           => 'VARCHAR',
				   'constraint'     => '100',
			],
	]);
	$this->forge->addKey('id', TRUE);
	$this->forge->createTable('Alunos');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('Alunos');
	}
}
