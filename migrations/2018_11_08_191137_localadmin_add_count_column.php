<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Capsule\Manager as Capsule;

class LocaladminAddCountColumn extends Migration
{
    private $tableName = 'localadmin';

    public function up()
    {
        $capsule = new Capsule();
        $capsule::schema()->table($this->tableName, function (Blueprint $table) {
            $table->integer('user_count')->default(0);
            $table->index('user_count');
        });
        
        # Force reload local admin data
        $capsule::unprepared("UPDATE hash SET hash = 'x' WHERE name = '$this->tableName'");

    }
    
    public function down()
    {
        $capsule = new Capsule();
        $capsule::schema()->table($this->tableName, function (Blueprint $table) {
            $table->dropColumn('user_count');
        });
    }
}
