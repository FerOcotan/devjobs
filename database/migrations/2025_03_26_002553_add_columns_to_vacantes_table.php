<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('vacantes', function (Blueprint $table) {
            $table->foreignId('categoria_id')->constrained()->onDelete('cascade');
            $table->string('empresa');
            $table->date('ultimo_dia');
            $table->text('descripcion');
            $table->string('imagen');
            $table->integer('publicado')->default(1);
            
            // Se crea la columna 'user_id' y se le asigna la llave foránea:
            $table->foreignId('user_id')->constrained()->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('vacantes', function (Blueprint $table) {
            
            $table->dropForeign(['categoria_id']);
            $table->dropColumn('categoria_id');
            $table->dropColumn('empresa');
            $table->dropColumn('ultimo_dia');
            $table->dropColumn('descripcion');
            $table->dropColumn('imagen');
            $table->dropColumn('publicado');
            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');
        });
    }
};
