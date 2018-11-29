<?php

use App\User;
use App\Tag;
use App\Post;
use App\Category;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Storage::disk('public')->deleteDirectory('posts');

        User::truncate();
        Role::truncate();
        Permission::truncate();
        Tag::truncate();
        Post::truncate();
        Category::truncate();

        $adminRole = Role::create(['name' => 'Admin', 'display_name' => 'Administrador']);
        $writerRole = Role::create(['name' => 'Writer', 'display_name' => 'Escritor']);

        $viewPostsPermission = Permission::create(['name' => 'View posts', 'display_name' => 'Ver publicaciones']);
        $createPostsPermission = Permission::create(['name' => 'Create posts', 'display_name' => 'Crear publicaciones']);
        $updatePostsPermission = Permission::create(['name' => 'Update posts', 'display_name' => 'Actualizar publicaciones']);
        $deletePostsPermission = Permission::create(['name' => 'Delete posts', 'display_name' => 'Borrar publicaciones']);

        $viewUsersPermission = Permission::create(['name' => 'View users', 'display_name' => 'Ver usuarios']);
        $createUsersPermission = Permission::create(['name' => 'Create users', 'display_name' => 'Crear usuarios']);
        $updateUsersPermission = Permission::create(['name' => 'Update users', 'display_name' => 'Actualizar usuarios']);
        $deleteUsersPermission = Permission::create(['name' => 'Delete users', 'display_name' => 'Borrar usuarios']);

        $viewRolesPermission = Permission::create(['name' => 'View roles', 'display_name' => 'Ver roles']);
        $createRolesPermission = Permission::create(['name' => 'Create roles', 'display_name' => 'Crear roles']);
        $updateRolesPermission = Permission::create(['name' => 'Update roles', 'display_name' => 'Actualizar roles']);
        $deleteRolesPermission = Permission::create(['name' => 'Delete roles', 'display_name' => 'Borrar roles']);

        $viewPermissionsPermission = Permission::create(['name' => 'View permissions', 'display_name' => 'Ver permisos']);
        $updatePermissionsPermission = Permission::create(['name' => 'Update permissions', 'display_name' => 'Actualizar permisos']);

        $tag = new Tag;
        $tag->name = "tag1";
        $tag->save();

        $tag = new Tag;
        $tag->name = "tag2";
        $tag->save();

        $tag = new Tag;
        $tag->name = "tag3";
        $tag->save();

        $admin = new User;
        $admin->name = "Admin";
        $admin->email = "ivan@latevaweb.com";
        $admin->password = 'demo1234';
        $admin->created_at = '2018-08-15 00:00:00';
        $admin->updated_at = '2018-08-22 00:00:00';
        $admin->save();

        $admin->assignRole($adminRole);

        $writer = new User;
        $writer->name = "User";
        $writer->email = "demo@demo.es";
        $writer->password = 'demo1234';
        $admin->created_at = '2018-08-15 00:00:00';
        $admin->updated_at = '2018-08-22 00:00:00';
        $writer->save();

        $writer->assignRole($writerRole);


        $category = new Category;
        $category->name = "Categoria 1";
        $category->save();

        $category = new Category;
        $category->name = "Categoria 2";
        $category->save();

        $post = new Post;
        $post->category_id= 1;
        $post->user_id= 1;
        $post->title = "Primer Post";
        $post->url = str_slug("Primer Post");
        $post->excerpt = "Extracto del primer post";
        $post->body = "<p>contenido del primer post";
        $post->published_at = '2018-08-21 00:00:00';
        $post->save();

        $post = new Post;
        $post->category_id= 2;
        $post->user_id= 1;
        $post->title = "Segundo Post";
        $post->url = str_slug("Segundo Post");
        $post->excerpt = "Extracto del Segundo post";
        $post->body = "<p>contenido del Segundo post";
        $post->published_at = '2018-08-21 00:00:00';
        $post->save();

        $post = new Post;
        $post->category_id= 2;
        $post->user_id= 2;
        $post->title = "Tercer Post";
        $post->url = str_slug("Tercer Post");
        $post->excerpt = "Extracto del Tercer post";
        $post->body = "<p>contenido del Tercer post";
        $post->published_at = '2018-08-21 00:00:00';
        $post->save();
    }
}
