<?php

use DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;

$modelArray = ['users', 'roles'];
$funArrays = ['index', 'create', 'edit'];

// Dashboard
Breadcrumbs::for('dashboard', function ($trail) {
    $trail->push('Dashboard', route('dashboard'));
});

foreach ($modelArray as $model) {
    foreach ($funArrays as $fun) {
        Breadcrumbs::for("$model.$fun", function ($trail, $id = null) use ($model, $fun) {
            switch ($fun) {
                case 'index':
                    $trail->parent('dashboard');
                    $trail->push(ucfirst($model), route("$model.$fun", [$id]));
                    break;
                case 'create':
                    $trail->parent("$model.index");
                    $trail->push("New " . ucfirst($model), route("$model.$fun", [$id]));
                    break;
                case 'edit':
                    $trail->parent("$model.index");
                    $trail->push("Edit " . ucfirst($model), route("$model.$fun", [$id]));
                    break;
            }
        });
    }
}

// Dashboard > Users

// // Dashboard > User > Create
// Breadcrumbs::for('users.create', function ($trail) {
//     $trail->parent('users.index');
//     $trail->push('Create New User', route('users.create'));
// });

// // Dashboard > User > Create
// Breadcrumbs::for('users.edit', function ($trail, $id) {
//     $trail->parent('users.index');
//     $trail->push('Update User', route('users.edit', [$id]));
// });


// Breadcrumbs::for('roles.index', function ($trail) {
//     $trail->parent('dashboard');
//     $trail->push('Roles', route('roles.index'));
// });

// Breadcrumbs::for('roles.create', function ($trail) {
//     $trail->parent('roles.index');
//     $trail->push('Role Create', route('roles.create'));
// });

// Breadcrumbs::for('roles.edit', function ($trail, $id) {
//     $trail->parent('roles.index');
//     $trail->push('Role Edit', route('roles.edit', [$id]));
// });

// // Home > Blog > [Category]
// Breadcrumbs::for('category', function ($trail, $category) {
//     $trail->parent('blog');
//     $trail->push($category->title, route('category', $category->id));
// });

// // Home > Blog > [Category] > [Post]
// Breadcrumbs::for('post', function ($trail, $post) {
//     $trail->parent('category', $post->category);
//     $trail->push($post->title, route('post', $post->id));
// });
