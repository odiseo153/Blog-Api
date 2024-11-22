<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Category;
use App\Models\Tag;
use App\Models\Post;
use App\Models\Comment;
use App\Models\Like;
use App\Models\View;
use App\Models\Notification;
use App\Models\Audit_log;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Usuarios
        
        User::factory(1)-> create([
            'name' => 'test',
            'email' => 'test@example.com',
            'password' => bcrypt('12345'), // default password
            'role' => 'admin'
        ]);
        

        $users = User::factory(15)->create();

        // Categorías
        $categories = Category::factory(15)->create();

        // Etiquetas
        $tags = Tag::factory(15)->create();

        // Posts
        $posts = Post::factory(15)->create()->each(function ($post) use ($tags, $users, $categories) {
            // Asignar una categoría aleatoria a cada post
            $post->category_id = $categories->random()->id;
            $post->user_id = $users->where('role', 'author')->random()->id;
            $post->save();

            // Asignar etiquetas aleatorias a cada post
            $randomTags = $tags->random(rand(1, 5))->pluck('id');
            $post->tags()->attach($randomTags);
        });

        // Comentarios
        Comment::factory(15)->create()->each(function ($comment) use ($users, $posts) {
            // Asignar un usuario y un post aleatorio a cada comentario
            $comment->user_id = $users->random()->id;
            $comment->post_id = $posts->random()->id;
            $comment->save();
        });

        // Likes
        Like::factory(15)->create()->each(function ($like) use ($users, $posts) {
            // Asignar un usuario y un post aleatorio a cada like
            $like->user_id = $users->random()->id;
            $like->post_id = $posts->random()->id;
            $like->save();
        });

        // Views
        View::factory(15)->create()->each(function ($view) use ($users, $posts) {
            // Asignar un usuario y un post aleatorio a cada view
            $view->user_id = $users->random()->id;
            $view->post_id = $posts->random()->id;
            $view->save();
        });

        // Notificaciones
        Notification::factory(15)->create()->each(function ($notification) use ($users) {
            // Asignar un usuario aleatorio a cada notificación
            $notification->user_id = $users->random()->id;
            $notification->save();
        });

        // Logs de auditoría
        Audit_log::factory(15)->create()->each(function ($auditLog) use ($users) {
            // Asignar un usuario aleatorio a cada log de auditoría
            $auditLog->user_id = $users->random()->id;
            $auditLog->save();
        });
    }
}
