<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegistrarsTable extends Migration
{
    public function up()
    {
        Schema::create('registrars', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('set null');
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamps();

            // Foreign key constraint for user relationship (assuming users table exists)
        });
    }

    public function down()
    {
        Schema::dropIfExists('registrars');
    }
}
