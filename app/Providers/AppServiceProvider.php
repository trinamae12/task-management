<?php

namespace App\Providers;

use App\Models\Task;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Gate::define("delete-task", function () {
        //     return Auth::user()->role === "admin";
        // });

        // Gate::define("update-task", function ($user, Task $task) {
        //     return $user->id === $task->user_id || $user->role === "admin";
        // });
    }
}
