<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\model_has_permission;
use Spatie\Permission\Models\Permission;

class TestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permisos = Permission::get()->all();
        foreach($permisos as $item){
            $array = [
                'permission_id' => $item->id,
                'model_type' => 'App\Models\User', 
                'model_id' => 1
            ];
            $model_permission = new model_has_permission;
            $model_permission->fill($array);
            $model_permission->save();
        }
    }
}
