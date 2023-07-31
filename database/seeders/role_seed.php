<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;

class role_seed extends Seeder
{
    /**
     * Run the database seeds: Run the database seeds: php artisan db:seed --class=role_seed
     * Buscar id del usuario a asignar administrador
     * php artisan tinker 
     * use App\Models\User
     * $user = User::find(1); //el 1 = desarrolloit
     * $user->assignRole(['spme-admin','asm-admin','pat-admin','mir-admin']);  
     * @return void
     */
    public function run()
    {
        $table = 'role_has_permissions';
        DB::table($table)->truncate();
        DB::statement("ALTER TABLE ".$table." AUTO_INCREMENT = 1");

        $table = 'model_has_roles';
        DB::table($table)->truncate();
        DB::statement("ALTER TABLE ".$table." AUTO_INCREMENT = 1");
        
        $table = 'roles';
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;');
        DB::table($table)->truncate();
        DB::statement("ALTER TABLE ".$table." AUTO_INCREMENT = 1");
        
        $table = 'permissions';
        DB::table($table)->truncate();
        DB::statement("ALTER TABLE ".$table." AUTO_INCREMENT = 1");

        DB::statement('SET FOREIGN_KEY_CHECKS = 1;');

        //Roles y permisos S-PME
            //Roles
            $rol1=Role::create(['name'=>'spme-admin','descripcion'=>'Administrador SPME','nivel'=>1]);
            
            //Permisos
            Permission::create(['name'=>'spme.admin.roles.index','descripcion'=>'Ver Roles de SPME','nivel'=>1])->syncRoles([$rol1]);
            Permission::create(['name'=>'spme.admin.roles.update','descripcion'=>'Actualizar Roles de SPME','nivel'=>1])->syncRoles([$rol1]);
            Permission::create(['name'=>'spme.admin.roles.create','descripcion'=>'Crear Roles de SPME','nivel'=>1])->syncRoles([$rol1]);
            Permission::create(['name'=>'spme.admin.roles.delete','descripcion'=>'Eliminar Roles de SPME','nivel'=>1])->syncRoles([$rol1]);
            Permission::create(['name'=>'spme.admin.roles.asignar','descripcion'=>'Eliminar Roles de SPME','nivel'=>1])->syncRoles([$rol1]);
            Permission::create(['name'=>'spme.admin.permisos.index','descripcion'=>'Ver Permisos de SPME','nivel'=>1])->syncRoles([$rol1]);
            Permission::create(['name'=>'spme.admin.permisos.update','descripcion'=>'Actualizar Permisos de SPME','nivel'=>1])->syncRoles([$rol1]);
            Permission::create(['name'=>'spme.admin.permisos.create','descripcion'=>'Crear Permisos de SPME','nivel'=>1])->syncRoles([$rol1]);
            Permission::create(['name'=>'spme.admin.permisos.delete','descripcion'=>'Eliminar Permisos de SPME','nivel'=>1])->syncRoles([$rol1]);
            Permission::create(['name'=>'spme.admin.permisos.asignar','descripcion'=>'Eliminar Permisos de SPME','nivel'=>1])->syncRoles([$rol1]);
            
            
        
        //Roles y permisos S-MIR
            //Roles
            $rol2=Role::create(['name'=>'mir-admin','descripcion'=>'Administrador MIR','nivel'=>4,'guard_name' => 'web']);
            $rol3=Role::create(['name'=>'mir-cap-ind','descripcion'=>'Capturista Indicadores MIR','nivel'=>4,'guard_name' => 'web']);
            $rol4=Role::create(['name'=>'mir-cap-ava','descripcion'=>'Capturista Avances MIR','nivel'=>4,'guard_name' => 'web']);
            $rol5=Role::create(['name'=>'mir-inv','descripcion'=>'Espectador MIR','nivel'=>4,'guard_name' => 'web']);
            
            
            //Permisos
            Permission::create(['name'=>'mir.admin.home','descripcion'=>'Ver home de MIR','nivel'=>4,'guard_name' => 'web'])->syncRoles([$rol1,$rol2]);
            Permission::create(['name'=>'mir.admin.roles.index','descripcion'=>'Ver Roles de MIR','nivel'=>4,'guard_name' => 'web'])->syncRoles([$rol1,$rol2]);
            Permission::create(['name'=>'mir.admin.roles.update','descripcion'=>'Actualizar Roles de MIR','nivel'=>4,'guard_name' => 'web'])->syncRoles([$rol1,$rol2]);
            Permission::create(['name'=>'mir.admin.roles.create','descripcion'=>'Crear Roles de MIR','nivel'=>4,'guard_name' => 'web'])->syncRoles([$rol1,$rol2]);
            Permission::create(['name'=>'mir.admin.roles.delete','descripcion'=>'Eliminar Roles de MIR','nivel'=>4,'guard_name' => 'web'])->syncRoles([$rol1,$rol2]);
            Permission::create(['name'=>'mir.admin.permisos.index','descripcion'=>'Ver Permisos de MIR','nivel'=>4,'guard_name' => 'web'])->syncRoles([$rol1,$rol2]);
            Permission::create(['name'=>'mir.admin.permisos.update','descripcion'=>'Actualizar Permisos de MIR','nivel'=>4,'guard_name' => 'web'])->syncRoles([$rol1]); // ,$rol2]);
            Permission::create(['name'=>'mir.admin.permisos.create','descripcion'=>'Crear Permisos de MIR','nivel'=>4,'guard_name' => 'web'])->syncRoles([$rol1]); // ,$rol2]);
            Permission::create(['name'=>'mir.admin.permisos.delete','descripcion'=>'Eliminar Permisos de MIR','nivel'=>4,'guard_name' => 'web'])->syncRoles([$rol1]); // ,$rol2]);
            Permission::create(['name'=>'mir.admin.permisos.asignar','descripcion'=>'Asignar Permisos de MIR','nivel'=>4,'guard_name' => 'web'])->syncRoles([$rol1,$rol2]);
            
        
        //Roles y permisos S-PAT
            //Roles
            $rol6=Role::create(['name'=>'pat-admin','descripcion'=>'Administrador PAT','nivel'=>3,'guard_name' => 'web']);
            
            //Permisos
            Permission::create(['name'=>'pat.admin.home','descripcion'=>'Ver home de PAT','nivel'=>3,'guard_name' => 'web'])->syncRoles([$rol1]);
            Permission::create(['name'=>'pat.admin.roles.index','descripcion'=>'Ver Roles de PAT','nivel'=>3,'guard_name' => 'web'])->syncRoles([$rol1,$rol6]);
            Permission::create(['name'=>'pat.admin.roles.update','descripcion'=>'Actualizar Roles de PAT','nivel'=>3,'guard_name' => 'web'])->syncRoles([$rol1,$rol6]);
            Permission::create(['name'=>'pat.admin.roles.create','descripcion'=>'Crear Roles de PAT','nivel'=>3,'guard_name' => 'web'])->syncRoles([$rol1,$rol6]);
            Permission::create(['name'=>'pat.admin.roles.delete','descripcion'=>'Eliminar Roles de PAT','nivel'=>3,'guard_name' => 'web'])->syncRoles([$rol1,$rol6]);
            Permission::create(['name'=>'pat.admin.roles.asignar','descripcion'=>'Asignar Roles de PAT','nivel'=>3,'guard_name' => 'web'])->syncRoles([$rol1,$rol6]);
            Permission::create(['name'=>'pat.admin.permisos.index','descripcion'=>'Ver Permisos de PAT','nivel'=>3,'guard_name' => 'web'])->syncRoles([$rol1,$rol6]);
            Permission::create(['name'=>'pat.admin.permisos.update','descripcion'=>'Actualizar Permisos de PAT','nivel'=>3,'guard_name' => 'web'])->syncRoles([$rol1]);// ,$rol6]);
            Permission::create(['name'=>'pat.admin.permisos.create','descripcion'=>'Crear Permisos de PAT','nivel'=>3,'guard_name' => 'web'])->syncRoles([$rol1]);// ,$rol6]);
            Permission::create(['name'=>'pat.admin.permisos.delete','descripcion'=>'Eliminar Permisos de PAT','nivel'=>3,'guard_name' => 'web'])->syncRoles([$rol1]);// ,$rol6]);
            Permission::create(['name'=>'pat.admin.permisos.asignar','descripcion'=>'Asignar Permisos de PAT','nivel'=>3,'guard_name' => 'web'])->syncRoles([$rol1,$rol6]);
        
        //Roles y permisos S-ASM
            //Roles
            $rol7=Role::create(['name'=>'asm-admin','descripcion'=>'Administrador ASM','nivel'=>2,'guard_name' => 'web']);
            $rol8=Role::create(['name'=>'asm-cap-asm','descripcion'=>'Capturista ASM','nivel'=>2,'guard_name' => 'web']);
            $rol9=Role::create(['name'=>'asm-cap-ava','descripcion'=>'Capturista Avances ASM','nivel'=>2,'guard_name' => 'web']);
            $rol10=Role::create(['name'=>'asm-inv','descripcion'=>'Espectador ASM','nivel'=>2,'guard_name' => 'web']);

            //Permisos
            Permission::create(['name'=>'asm.admin.home','descripcion'=>'Ver home ASM','nivel'=>2,'guard_name' => 'web'])->syncRoles([$rol1,$rol7,$rol8,$rol9,$rol10]);
            Permission::create(['name'=>'asm.admin.roles.index','descripcion'=>'Ver Roles de ASM','nivel'=>2,'guard_name' => 'web'])->syncRoles([$rol1,$rol7]);
            Permission::create(['name'=>'asm.admin.roles.update','descripcion'=>'Actualizar Roles de ASM','nivel'=>2,'guard_name' => 'web'])->syncRoles([$rol1,$rol7]);
            Permission::create(['name'=>'asm.admin.roles.create','descripcion'=>'Crear Roles de ASM','nivel'=>2,'guard_name' => 'web'])->syncRoles([$rol1,$rol7]);
            Permission::create(['name'=>'asm.admin.roles.delete','descripcion'=>'Eliminar Roles de ASM','nivel'=>2,'guard_name' => 'web'])->syncRoles([$rol1,$rol7]);
            Permission::create(['name'=>'asm.admin.roles.asignar','descripcion'=>'Asignar Roles de ASM','nivel'=>2,'guard_name' => 'web'])->syncRoles([$rol1,$rol7]);
            Permission::create(['name'=>'asm.admin.permisos.index','descripcion'=>'Ver Permisos de ASM','nivel'=>2,'guard_name' => 'web'])->syncRoles([$rol1,$rol7]);
            Permission::create(['name'=>'asm.admin.permisos.update','descripcion'=>'Actualizar Permisos de ASM','nivel'=>2,'guard_name' => 'web'])->syncRoles([$rol1]); // ,$rol7]);
            Permission::create(['name'=>'asm.admin.permisos.create','descripcion'=>'Crear Permisos de ASM','nivel'=>2,'guard_name' => 'web'])->syncRoles([$rol1]); // ,$rol7]);
            Permission::create(['name'=>'asm.admin.permisos.delete','descripcion'=>'Eliminar Permisos de ASM','nivel'=>2,'guard_name' => 'web'])->syncRoles([$rol1]); // ,$rol7]);
            Permission::create(['name'=>'asm.admin.permisos.asignar','descripcion'=>'Asignar Permisos de ASM','nivel'=>2,'guard_name' => 'web'])->syncRoles([$rol1,$rol7]);

            Permission::create(['name'=>'asm.recomendaciones.index','descripcion'=>'Ver Recomendaciones','nivel'=>2,'guard_name' => 'web'])->syncRoles([$rol1,$rol7,$rol8,$rol10]);
            Permission::create(['name'=>'asm.recomendaciones.create','descripcion'=>'Crear Recomendaciones','nivel'=>2,'guard_name' => 'web'])->syncRoles([$rol1,$rol7,$rol8]);
            Permission::create(['name'=>'asm.recomendaciones.update','descripcion'=>'Editar Recomendaciones','nivel'=>2,'guard_name' => 'web'])->syncRoles([$rol1,$rol7,$rol8]);
            Permission::create(['name'=>'asm.recomendaciones.turnar','descripcion'=>'Turnar Recomendaciones','nivel'=>2,'guard_name' => 'web'])->syncRoles([$rol1,$rol7,$rol8]);
            Permission::create(['name'=>'asm.recomendaciones.rechazar','descripcion'=>'Rechazar Recomendaciones','nivel'=>2,'guard_name' => 'web'])->syncRoles([$rol1,$rol7,$rol8]);
            Permission::create(['name'=>'asm.recomendaciones.aprobar','descripcion'=>'Aprobar Recomendaciones','nivel'=>2,'guard_name' => 'web'])->syncRoles([$rol1,$rol7,$rol8]);
            Permission::create(['name'=>'asm.recomendaciones.status','descripcion'=>'Estatus Recomendaciones','nivel'=>2,'guard_name' => 'web'])->syncRoles([$rol1,$rol7]);
            Permission::create(['name'=>'asm.recomendaciones.comentar','descripcion'=>'Comentar Recomendaciones','nivel'=>2,'guard_name' => 'web'])->syncRoles([$rol1,$rol7,$rol8]);
            Permission::create(['name'=>'asm.recomendaciones.delete','descripcion'=>'Eliminar Recomendaciones','nivel'=>2,'guard_name' => 'web'])->syncRoles([$rol1,$rol7]);

            Permission::create(['name'=>'asm.fichas.index','descripcion'=>'Ver fichas','nivel'=>2,'guard_name' => 'web'])->syncRoles([$rol1,$rol7,$rol8,$rol10]);
            Permission::create(['name'=>'asm.fichas.create','descripcion'=>'Crear fichas','nivel'=>2,'guard_name' => 'web'])->syncRoles([$rol1,$rol7,$rol8]);
            Permission::create(['name'=>'asm.fichas.update','descripcion'=>'Editar fichas','nivel'=>2,'guard_name' => 'web'])->syncRoles([$rol1,$rol7,$rol8]);
            Permission::create(['name'=>'asm.fichas.turnar','descripcion'=>'Turnar fichas','nivel'=>2,'guard_name' => 'web'])->syncRoles([$rol1,$rol7,$rol8]);
            Permission::create(['name'=>'asm.fichas.rechazar','descripcion'=>'Rechazar fichas','nivel'=>2,'guard_name' => 'web'])->syncRoles([$rol1,$rol7,$rol8]);
            Permission::create(['name'=>'asm.fichas.aprobar','descripcion'=>'Aprobar fichas','nivel'=>2,'guard_name' => 'web'])->syncRoles([$rol1,$rol7,$rol8]);
            Permission::create(['name'=>'asm.fichas.status','descripcion'=>'Estatus fichas','nivel'=>2,'guard_name' => 'web'])->syncRoles([$rol1,$rol7]);
            Permission::create(['name'=>'asm.fichas.comentar','descripcion'=>'Comentar fichas','nivel'=>2,'guard_name' => 'web'])->syncRoles([$rol1,$rol7,$rol8]);
            Permission::create(['name'=>'asm.fichas.delete','descripcion'=>'Eliminar fichas','nivel'=>2,'guard_name' => 'web'])->syncRoles([$rol1,$rol7]);
            
            Permission::create(['name'=>'asm.criterios.index','descripcion'=>'Ver criterios','nivel'=>2,'guard_name' => 'web'])->syncRoles([$rol1,$rol7,$rol8,$rol9,$rol10]);
            Permission::create(['name'=>'asm.criterios.create','descripcion'=>'Crear criterios','nivel'=>2,'guard_name' => 'web'])->syncRoles([$rol1,$rol7,$rol8,$rol9]);
            Permission::create(['name'=>'asm.criterios.update','descripcion'=>'Editar criterios','nivel'=>2,'guard_name' => 'web'])->syncRoles([$rol1,$rol7,$rol8,$rol9]);
            Permission::create(['name'=>'asm.criterios.turnar','descripcion'=>'Turnar criterios','nivel'=>2,'guard_name' => 'web'])->syncRoles([$rol1,$rol7,$rol8,$rol9]);
            Permission::create(['name'=>'asm.criterios.rechazar','descripcion'=>'Rechazar criterios','nivel'=>2,'guard_name' => 'web'])->syncRoles([$rol1,$rol7,$rol8]);
            Permission::create(['name'=>'asm.criterios.aprobar','descripcion'=>'Aprobar criterios','nivel'=>2,'guard_name' => 'web'])->syncRoles([$rol1,$rol7,$rol8]);
            Permission::create(['name'=>'asm.criterios.status','descripcion'=>'Estatus criterios','nivel'=>2,'guard_name' => 'web'])->syncRoles([$rol1,$rol7]);
            Permission::create(['name'=>'asm.criterios.comentar','descripcion'=>'Comentar criterios','nivel'=>2,'guard_name' => 'web'])->syncRoles([$rol1,$rol7,$rol8,$rol9]);
            Permission::create(['name'=>'asm.criterios.delete','descripcion'=>'Eliminar criterios','nivel'=>2,'guard_name' => 'web'])->syncRoles([$rol1,$rol7]);

            Permission::create(['name'=>'asm.asm.index','descripcion'=>'Ver asm','nivel'=>2,'guard_name' => 'web'])->syncRoles([$rol1,$rol7,$rol8,$rol10]);
            Permission::create(['name'=>'asm.asm.create','descripcion'=>'Crear asm','nivel'=>2,'guard_name' => 'web'])->syncRoles([$rol1,$rol7,$rol8]);
            Permission::create(['name'=>'asm.asm.update','descripcion'=>'Editar asm','nivel'=>2,'guard_name' => 'web'])->syncRoles([$rol1,$rol7,$rol8]);
            Permission::create(['name'=>'asm.asm.turnar','descripcion'=>'Turnar asm','nivel'=>2,'guard_name' => 'web'])->syncRoles([$rol1,$rol7,$rol8]);
            Permission::create(['name'=>'asm.asm.rechazar','descripcion'=>'Rechazar asm','nivel'=>2,'guard_name' => 'web'])->syncRoles([$rol1,$rol7,$rol8]);
            Permission::create(['name'=>'asm.asm.aprobar','descripcion'=>'Aprobar asm','nivel'=>2,'guard_name' => 'web'])->syncRoles([$rol1,$rol7,$rol8]);
            Permission::create(['name'=>'asm.asm.status','descripcion'=>'Estatus asm','nivel'=>2,'guard_name' => 'web'])->syncRoles([$rol1,$rol7]);
            Permission::create(['name'=>'asm.asm.comentar','descripcion'=>'Comentar asm','nivel'=>2,'guard_name' => 'web'])->syncRoles([$rol1,$rol7,$rol8]);
            Permission::create(['name'=>'asm.asm.delete','descripcion'=>'Eliminar asm','nivel'=>2,'guard_name' => 'web'])->syncRoles([$rol1,$rol7]);

            Permission::create(['name'=>'asm.actividades.index','descripcion'=>'Ver actividades','nivel'=>2,'guard_name' => 'web'])->syncRoles([$rol1,$rol7,$rol8,$rol9,$rol10]);
            Permission::create(['name'=>'asm.actividades.create','descripcion'=>'Crear actividades','nivel'=>2,'guard_name' => 'web'])->syncRoles([$rol1,$rol7,$rol8,$rol9]);
            Permission::create(['name'=>'asm.actividades.update','descripcion'=>'Editar actividades','nivel'=>2,'guard_name' => 'web'])->syncRoles([$rol1,$rol7,$rol8,$rol9]);
            Permission::create(['name'=>'asm.actividades.turnar','descripcion'=>'Turnar actividades','nivel'=>2,'guard_name' => 'web'])->syncRoles([$rol1,$rol7,$rol8,$rol9]);
            Permission::create(['name'=>'asm.actividades.rechazar','descripcion'=>'Rechazar actividades','nivel'=>2,'guard_name' => 'web'])->syncRoles([$rol1,$rol7,$rol8]);
            Permission::create(['name'=>'asm.actividades.aprobar','descripcion'=>'Aprobar actividades','nivel'=>2,'guard_name' => 'web'])->syncRoles([$rol1,$rol7,$rol8]);
            Permission::create(['name'=>'asm.actividades.status','descripcion'=>'Estatus actividades','nivel'=>2,'guard_name' => 'web'])->syncRoles([$rol1,$rol7]);
            Permission::create(['name'=>'asm.actividades.comentar','descripcion'=>'Comentar actividades','nivel'=>2,'guard_name' => 'web'])->syncRoles([$rol1,$rol7,$rol8,$rol9]);
            Permission::create(['name'=>'asm.actividades.delete','descripcion'=>'Eliminar actividades','nivel'=>2,'guard_name' => 'web'])->syncRoles([$rol1,$rol7,$rol8,$rol9]);

            Permission::create(['name'=>'spme.admin.users.index','descripcion'=>'Ver usuarios','nivel'=>1,'guard_name' => 'web'])->syncRoles([$rol1,$rol2,$rol7]);
            Permission::create(['name'=>'spme.admin.users.create','descripcion'=>'Crear usuarios','nivel'=>1,'guard_name' => 'web'])->syncRoles([$rol1,$rol2,$rol7]);
            Permission::create(['name'=>'spme.admin.users.update','descripcion'=>'Actualizar usuarios','nivel'=>1,'guard_name' => 'web'])->syncRoles([$rol1,$rol2,$rol7]);
            Permission::create(['name'=>'spme.admin.users.delete','descripcion'=>'Eliminar usuarios','nivel'=>1,'guard_name' => 'web'])->syncRoles([$rol1,$rol2,$rol7]);
            Permission::create(['name'=>'spme.admin.catalogos.index','descripcion'=>'Ver catálogos','nivel'=>1,'guard_name' => 'web'])->syncRoles([$rol1,$rol2,$rol7]);
            Permission::create(['name'=>'spme.admin.catalogos.create','descripcion'=>'Crear catálogos','nivel'=>1,'guard_name' => 'web'])->syncRoles([$rol1,$rol2,$rol7]);
            Permission::create(['name'=>'spme.admin.catalogos.update','descripcion'=>'Actualizar catálogos','nivel'=>1,'guard_name' => 'web'])->syncRoles([$rol1,$rol2,$rol7]);
            Permission::create(['name'=>'spme.admin.catalogos.delete','descripcion'=>'Eliminar catálogos','nivel'=>1,'guard_name' => 'web'])->syncRoles([$rol1,$rol2,$rol7]);
            Permission::create(['name'=>'spme.admin.grupos_capturas.index','descripcion'=>'Ver Grupos de Captura','nivel'=>1,'guard_name' => 'web'])->syncRoles([$rol1,$rol2,$rol7]);
            Permission::create(['name'=>'spme.admin.grupos_capturas.create','descripcion'=>'Crear Grupos de Captura','nivel'=>1,'guard_name' => 'web'])->syncRoles([$rol1,$rol2,$rol7]);
            Permission::create(['name'=>'spme.admin.grupos_capturas.update','descripcion'=>'Actualizar Grupos de Captura','nivel'=>1,'guard_name' => 'web'])->syncRoles([$rol1,$rol2,$rol7]);
            Permission::create(['name'=>'spme.admin.grupos_capturas.delete','descripcion'=>'Eliminar Grupos de Captura','nivel'=>1,'guard_name' => 'web'])->syncRoles([$rol1,$rol2,$rol7]);

            Permission::create(['name'=>'spme.admin.home','descripcion'=>'Ver home de SPME','nivel'=>1])->syncRoles([$rol1,$rol2,$rol3,$rol4,$rol5,$rol6,$rol7,$rol8,$rol9,$rol10]);

    }
}

