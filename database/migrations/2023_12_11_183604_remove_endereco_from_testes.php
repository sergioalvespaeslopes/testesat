<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveEnderecoFromTestes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('testes', function (Blueprint $table) {
            // Remova o campo 'endereco' da tabela 'testes'
            $table->dropColumn('endereco');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('testes', function (Blueprint $table) {
            // Se necessário, adicione novamente o campo 'endereco' na tabela 'testes' no método down
            $table->string('endereco')->nullable();
        });
    }
}
