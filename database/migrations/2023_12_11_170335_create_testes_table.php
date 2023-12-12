<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTestesTable extends Migration
{
    public function up()
    {
        Schema::create('testes', function (Blueprint $table) {
            $table->id();
            $table->string('nome_completo');
            $table->string('cpf')->unique();
            $table->string('telefone');
            $table->string('email')->default('');
            $table->string('cep')->default('');
            $table->string('rua')->nullable();
            $table->string('bairro')->nullable();
            $table->string('numero')->nullable();
            $table->string('endereco')->nullable();
            $table->string('cidade')->nullable();
            $table->string('uf')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('testes');
    }
}
