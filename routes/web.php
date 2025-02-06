<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\EducationController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\SkillsController;
use App\Http\Controllers\ExperienceController;
use App\Http\Controllers\AboutMeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AuthController;

use App\Http\Middleware\AuthMiddleware;


Route::get('/', function () {
    return view('welcome');
});


// Protect all admin routes inside this group



    // Default route with a name 'admin'
    Route::get('/admin', [AuthController::class, 'showDashboard'])->name('admin');

    // Rest of your routes...
    //logout
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    //reset
    Route::get('/change-credentials', [AuthController::class, 'showReset'])->name('reset-credentials');
    Route::post('/change-credentials', [AuthController::class,'reset']);

    //Manage email
    Route::get('/emails', [AuthController::class, 'showEmails'])->name('auth.email');
    Route::post('/emails', [AuthController::class, 'storeEmail'])->name('emails.store');
    Route::delete('/emails/{id}', [AuthController::class, 'deleteEmail'])->name('emails.destroy');


    // Service routes
    Route::get('/services', [ServiceController::class, 'index'])->name('services.index');
    Route::post('/services', [ServiceController::class, 'store'])->name('services.store');
    Route::get('/services/{service}/edit', [ServiceController::class, 'index'])->name('services.edit');
    Route::put('/services/{service}', [ServiceController::class, 'update'])->name('services.update');
    Route::delete('/services/{service}', [ServiceController::class, 'destroy'])->name('services.destroy');

    // Contact details routes
    Route::get('/contactdetails', [ContactController::class, 'showContactForm'])->name('contactdetails.index');
    Route::post('/contactdetails', [ContactController::class, 'saveContactDetails'])->name('contactdetails.store');
    Route::put('/contactdetails/{id}', [ContactController::class, 'saveContactDetails'])->name('contactdetails.update');
    Route::delete('/contactdetails/{id}', [ContactController::class, 'destroyContactDetail'])->name('contactdetails.destroy');

    // Contact messages routes
    Route::get('contact/messages', [ContactController::class, 'showContactMessages'])->name('contactme.index');
    Route::post('contact/messages', [ContactController::class, 'storeContactMessage'])->name('contactme.store');
    Route::delete('contact/messages/{id}', [ContactController::class, 'destroyContactMessage'])->name('contactme.destroy');
    Route::patch('/contactme/{id}/mark-as-read', [ContactController::class, 'markAsRead'])->name('contactme.markAsRead');



    // Education section routes
    Route::get('aboutme/education', [EducationController::class, 'index'])->name('education.index');
    Route::get('aboutme/education/{education}/edit', [EducationController::class, 'edit'])->name('education.edit');
    Route::post('aboutme/education', [EducationController::class, 'store'])->name('education.store');
    Route::put('aboutme/education/{education}', [EducationController::class, 'update'])->name('education.update');
    Route::delete('aboutme/education/{education}', [EducationController::class, 'destroy'])->name('education.destroy');

    // About, Skills, Portfolio, Experience routes inside the 'aboutme' group
    Route::prefix('aboutme')->group(function () {
        Route::get('/about', [AboutController::class, 'index'])->name('about.index');
        Route::match(['POST', 'PUT'], '/about/storeOrUpdate', [AboutController::class, 'storeOrUpdate'])->name('about.storeOrUpdate');
        Route::get('/about/edit/{id}', [AboutController::class, 'edit'])->name('about.edit');
        Route::delete('/about/destroy/{id}', [AboutController::class, 'destroy'])->name('about.destroy');

        Route::get('/skills', [SkillsController::class, 'index'])->name('skills.index');
        Route::get('/skills/create', [SkillsController::class, 'create'])->name('skills.create');
        Route::post('/skills', [SkillsController::class, 'store'])->name('skills.store');
        Route::get('/skills/{id}', [SkillsController::class, 'show'])->name('skills.show');
        Route::get('/skills/{id}/edit', [SkillsController::class, 'edit'])->name('skills.edit');
        Route::put('/skills/{id}', [SkillsController::class, 'update'])->name('skills.update');
        Route::delete('/skills/{id}', [SkillsController::class, 'destroy'])->name('skills.destroy');

        // Routes for Experience Section
        Route::get('/experience', [ExperienceController::class, 'index'])->name('experience.index');
        Route::post('/experience', [ExperienceController::class, 'store'])->name('experience.store');
        Route::get('/experience/{id}/edit', [ExperienceController::class, 'edit'])->name('experience.edit');
        Route::put('/experience/{id}', [ExperienceController::class, 'update'])->name('experience.update');
        Route::delete('/experience/{id}', [ExperienceController::class, 'destroy'])->name('experience.destroy');
    

    // Portfolio routes
    Route::prefix('portfolio')->group(function () {
        Route::get('/index', [PortfolioController::class, 'index'])->name('portfolio.index');
        Route::post('/', [PortfolioController::class, 'store'])->name('portfolio.store');
        Route::get('/{id}/edit', [PortfolioController::class, 'edit'])->name('portfolio.edit');
        Route::put('/{id}', [PortfolioController::class, 'update'])->name('portfolio.update');
        Route::delete('/{id}', [PortfolioController::class, 'destroy'])->name('portfolio.destroy');
    });


});

// Routes for viewer pages (no authentication required)
Route::get('/contact/index', [ContactController::class, 'showUserContactPage'])->name('contact.index');
Route::get('/services/index', [ServiceController::class, 'show'])->name('services.show');
Route::get('/portfolio/view-all', [PortfolioController::class, 'viewAll'])->name('portfolio.viewAll');
Route::get('/aboutme', [AboutMeController::class, 'index'])->name('aboutme.index');
Route::get('/portfolio-project', [HomeController::class, 'index'])->name('home.index');

// Login and Logout routes

//Route::get('/login/portfolio-admin', [LoginController::class, 'showLoginForm'])->name('login.form');
//Route::post('/login/portfolio-admin', [LoginController::class, 'processLogin'])->name('login.process');
//Route::get('/logout/portfolio-admin', [LoginController::class, 'logout'])->name('logout');


//login
Route::get('/login/portfolio-admin', [AuthController::class, 'showLogin'])->name('login.form');
Route::post('/login/portfolio-admin', [AuthController::class, 'login'])->name('login.process');


Route::get('/forgot-login', [AuthController::class, 'showForgotForm'])->name('forgot-login');
Route::post('/send-code', [AuthController::class, 'sendVerificationCode'])->name('send-code');
Route::get('/verify-code', [AuthController::class, 'showVerificationForm'])->name('verify-code');
Route::post('/verify-code', [AuthController::class, 'verifyCode'])->name('post-verify-code');
// Resend the verification code
Route::post('resend-verification-code', [AuthController::class, 'resendVerificationCode'])->name('resend-verification-code');

use App\Http\Middleware\VerifyCodeMiddleware;

Route::get('/reset', [AuthController::class, 'showReset'])->name('update');
Route::post('/reset', [AuthController::class, 'reset'])->name('update-credentials');
