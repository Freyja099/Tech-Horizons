<?php
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ThemeController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\BrowsingHistoryController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\RateController;
use App\Http\Controllers\IssueController;
use App\Models\Issue;

use App\Http\Middleware\CheckRole;

// Public routes
Route::get('/themes', [ThemeController::class, 'index'])->name('themes.index');
Route::get('/themes/{theme_id}/articles', [ThemeController::class, 'getArticlesByTheme'])->name('themes.articles');
Route::get('/articles', [ArticleController::class, 'index'])->name('articles.index');
Route::get('/articles/{article_id}', [ArticleController::class, 'show'])->name('articles.show');
Route::get('/issues', [IssueController::class, 'index'])->name('issues.index');
Route::get('/issues/{issue_id}/articles', [IssueController::class, 'getArticlesByIssue'])->name('issues.articles');

// Routes for authenticated users with 'user' role
Route::middleware(['auth', CheckRole::class.':user'])->group(function () {
    Route::get('/', function () {
        $issues = Issue::with('articles')->get();
        return view('welcome', compact('issues'));
    });

    Route::get('/foryou', [ArticleController::class, 'getRecommendedArticles'])->name('foryou');
    Route::post('/themes/{theme_id}/subscribe', [SubscriptionController::class, 'subscribe'])->name('themes.subscribe');
    Route::post('/themes/{theme_id}/unsubscribe', [SubscriptionController::class, 'unsubscribe'])->name('themes.unsubscribe');
    Route::get('/browsing-history', [BrowsingHistoryController::class, 'getHistory'])->name('history.index');
    Route::post('/articles/{article_id}/comments', [ChatController::class, 'addComment'])->name('comments.add');
    Route::post('/articles/{article_id}/rate', [RateController::class, 'rateArticle'])->name('articles.rate');
    Route::get('/articles/{article_id}/rating', [RateController::class, 'getArticleRating'])->name('articles.rating');
    Route::get('/studio', [ArticleController::class, 'getUserArticles'])->name('studio');
    Route::get('/articles/create', [ArticleController::class, 'create'])->name('articles.create');
    Route::post('/articles', [ArticleController::class, 'store'])->name('articles.store');
});

// Routes for authenticated users with 'admin' role
Route::middleware(['auth', CheckRole::class.':admin'])->group(function () {
    Route::get('/admin/dashboard', function () { return view('admin.dashboard'); })->name('admin.dashboard');
    Route::get('/admin/users', function () { return view('admin.users'); })->name('admin.users');
    Route::get('/issues/create', [IssueController::class, 'create'])->name('issues.create');
    Route::post('/issues', [IssueController::class, 'store'])->name('issues.store');
    Route::patch('/issues/{issue_id}', [IssueController::class, 'update'])->name('issues.update');
    Route::delete('/issues/{issue_id}', [IssueController::class, 'destroy'])->name('issues.destroy');
    Route::post('/articles/{article_id}/publish', [ArticleController::class, 'publish'])->name('articles.publish');
    Route::post('/articles/{article_id}/unpublish', [ArticleController::class, 'unpublish'])->name('articles.unpublish');
});

// Routes for authenticated users with 'manager' role
Route::middleware(['auth', CheckRole::class.':manager'])->group(function () {
    Route::get('/theme-manager', [ThemeController::class, 'managerDashboard'])->name('manager.dashboard');
    Route::get('/theme-manager/articles', [ArticleController::class, 'managerDashboard'])->name('manager.articles');
    Route::post('/theme-manager/articles/{article_id}/approve', [ArticleController::class, 'approve'])->name('manager.articles.approve');
    Route::post('/theme-manager/articles/{article_id}/reject', [ArticleController::class, 'reject'])->name('manager.articles.reject');
});

// Routes for authenticated users
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
});

require __DIR__.'/auth.php';