<?php
use App\Http\Controllers\Admin\{

    AcademicCalendarController,
    AcademicLookupController,
    AdminController,
    AnnouncementController,
    ArchiveReportController,
    BlockController,
    BlockItemController,
    CampusGalleryPageController,
    CareerOpportunityCategoryController,
    CareerOpportunityController,
    CareerOpportunityPageController,
    CertificatePageController, CvController, EventCategoryController, EventController, EventPageController, FooterController, GalleryController, GeneralStatisticsCategoryController, GeneralStatisticsController, GraduateController, GraduatePageController, HistoryController,
    IMCPolicyPageController, InternshipProgramController, InternshipProgramPageController, InterpreterController,
    LaboratoryController,
    LaboratoryPageController,
    UserController,
   RoleController,
   SettingController,
   LanguageController,
    MaterialProductController,
    MediaGuidePageController,
    MenuController,
    MessageController,
    NewsController,
    PackageController,

    ProgramController,
    ProjectCategoryController,

    StudentClubController, StudentClubPageController,StudentProjectsController, StudentProjectPageController,


};

use App\Http\Controllers\Admin\CareerPageController;
use App\Http\Controllers\Admin\ContactPageController;
use App\Http\Controllers\Admin\HomePageController;
use App\Http\Controllers\Admin\HeroSlideController;
use App\Http\Controllers\Admin\PageController;

use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\CertificateController;
use App\Http\Controllers\Admin\PartnerController;
use App\Http\Controllers\Admin\ProjectPageController;
use App\Http\Controllers\Admin\VacancyController;
use App\Http\Controllers\Front\AcademicCalendarController as FrontAcademicCalendarController;
use App\Http\Controllers\Front\AnnouncementController as FrontAnnouncementController;
use App\Http\Controllers\Front\CampusGalleryPageController as FrontCampusGalleryPageController;
use App\Http\Controllers\Front\CareerOpportunityController as FrontCareerOpportunityController;
use App\Http\Controllers\Front\CareerPageController as FrontCareerPageController;
use App\Http\Controllers\Front\ContactPageController as FrontContactPageController;
use App\Http\Controllers\Front\EventController as FrontEventController;
use App\Http\Controllers\Front\GraduateController as FrontGraduateController;
use App\Http\Controllers\Front\HomePageController as FrontHomePageController;
use App\Http\Controllers\Front\MessageController as FrontMessageController;
use App\Http\Controllers\Front\NewsController as FrontNewsController;
use App\Http\Controllers\Front\PageController as FrontPageController;
use App\Http\Controllers\Front\ProjectController as FrontProjectController;
use App\Http\Controllers\Front\InternshipProgramController as FrontInternshipProgramController;
use App\Http\Controllers\Front\LaboratoryController as FrontLaboratoryController;
use App\Http\Controllers\Front\MediaGuidePageController as FrontMediaGuidePageController;
use App\Http\Controllers\Front\ProgramController as FrontProgramController;
use App\Http\Controllers\Front\StudentClubController as FrontStudentClubController;
use App\Http\Controllers\Front\StudentProjectPageController as FrontStudentProjectPageController;
use App\Http\Controllers\Front\VacancyController as FrontVacancyController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;


$locales = getLocales();
$setLocale = LaravelLocalization::setLocale();

if ($setLocale && !in_array($setLocale, $locales)) {
    abort(404, 'Language not found');
}


Route::post('/admin/logout',[AdminController::class,'logout'])->name('admin.logout');
Route::get('/admin/login',[AdminController::class,'login_form'])->name('admin.login');
Route::post('/admin/login',[AdminController::class,'login'])->name('admin.login.store');
Route::get('/', function () {
    return redirect('/az');
});

Route::group([
    'prefix' => $setLocale,
    'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
], function (): void {

        Route::get('/',                                                         [FrontHomePageController::class,                 'index'])->name('front.homePage.index');

        Route::post('/messages/send',                                           [FrontMessageController::class,                  'send'])->name('front.messages.send');
        Route::post('/subscribe',                                               [FrontMessageController::class,                  'subscribe'])->name('front.home.subscribe');
        Route::get('/contact-us',                                               [FrontContactPageController::class,              'index'])->name('front.contact.index');
        Route::get('/campus-gallery',                                           [FrontCampusGalleryPageController::class,        'index'])->name('front.campus.index');
        Route::get('/media-guide',                                              [FrontMediaGuidePageController::class,           'index'])->name('front.mediaGuidePage.index');
        Route::get('/news/{news:slug}',                                         [FrontNewsController::class,                     'show'])->name('front.news.show');
        Route::get('/news',                                                     [FrontNewsController::class,                     'index'])->name('front.news.index');
        Route::get('/announcements/{announcement:slug}',                        [FrontAnnouncementController::class,             'show'])->name('front.announcements.show');
        Route::get('/announcements',                                            [FrontAnnouncementController::class,             'index'])->name('front.announcements.index');
        Route::get('/project-categories/{project_category:slug}',               [FrontProjectController::class,                  'index'])->name('front.project_categories.show');
        Route::get('/projects/{project:slug}',                                  [FrontProjectController::class,                  'show'])->name('front.projects.show');
        Route::get('/projects',                                                 [FrontProjectController::class,                  'index'])->name('front.projects.index');
        Route::get('/internship-programs',                                      [FrontInternshipProgramController::class,        'index'])->name('front.internship_programs.index');
        Route::get('/internship-programs/{internship_program:slug}',            [FrontInternshipProgramController::class,        'show'])->name('front.internship_programs.show');
        Route::get('/pages/{page:slug}',                                        [FrontPageController::class,                     'show'])->name('front.pages.show');
        Route::get('/programs/{program:slug}',                                  [FrontProgramController::class,                  'show'])->name('front.programs.show');

        Route::get('/career',                                                   [FrontCareerPageController::class,               'index'])->name('front.careerPage.index');
        Route::get('/career/vacancies/{vacancy:slug}',                          [FrontCareerPageController::class,               'show'])->name('front.careerPage.show');
        Route::post('/vacancy/{vacancy}/upload-cv',                             [FrontVacancyController::class,                  'uploadCv'])->name('vacancy.upload.cv');
        Route::get('/academic-calendar',                                        [FrontAcademicCalendarController::class,         'index'])->name('front.academic_calendar.index');
        Route::get('/events/{event:slug}',                                      [FrontEventController::class,                    'show'])->name('front.events.show');
        Route::get('/events',                                                   [FrontEventController::class,                    'index'])->name('front.events.index');
        Route::get('/event-categories/{event_category:slug}',                   [FrontEventController::class,                    'index'])->name('front.event_categories.show');
        Route::get('/student-projects/{student_project:slug}',                  [FrontStudentProjectPageController::class,       'show'])->name('front.student_projects.show');
        Route::get('/student-projects',                                         [FrontStudentProjectPageController::class,       'index'])->name('front.student_projects.index');
        Route::get('/student-clubs/{student_club:slug}',                        [FrontStudentClubController::class,              'show'])->name('front.student_clubs.show');
        Route::get('/student-clubs',                                            [FrontStudentClubController::class,              'index'])->name('front.student_clubs.index');
        Route::get('/laboratories/{laboratory:slug}',                           [FrontLaboratoryController::class,               'show'])->name('front.laboratories.show');
        Route::get('/laboratories',                                             [FrontLaboratoryController::class,               'index'])->name('front.laboratories.index');
        Route::get('/graduates/{graduate:slug}',                                [FrontGraduateController::class,                 'show'])->name('front.graduates.show');
        Route::get('/graduates',                                                [FrontGraduateController::class,                 'index'])->name('front.graduates.index');
        Route::get('/career-opportunities/{career_opportunity:slug}',           [FrontCareerOpportunityController::class,                    'show'])->name('front.career_opportunities.show');
        Route::get('/career-opportunities',                                     [FrontCareerOpportunityController::class,                    'index'])->name('front.career_opportunities.index');
        Route::get('/career-opportunities-categories/{career_opportunity_category:slug}',                   [FrontCareerOpportunityController::class,                    'index'])->name('front.career_opportunity_categories.show');


        Route::group(       [
        'prefix' => 'admin',
        'middleware' => 'auth'
    ], function () {

          Route::get('/interpreter',              [InterpreterController::class,      'index'])->name('admin.interpreter.index');
        Route::post('/interpreter/update',      [InterpreterController::class,      'update'])->name('admin.interpreter.update');
        Route::resource('subscribes',            FrontMessageController::class)->names('admin.subscribes');
        Route::resource('settings',              SettingController::class)->names('admin.settings');
        Route::resource('users',                 UserController::class)->names('admin.users');
        Route::resource('languages',             LanguageController::class)->names('admin.languages');
        Route::resource('roles',                 RoleController::class)->names('admin.roles');
        Route::resource('messages',              MessageController::class)->names('admin.messages');
        Route::resource('menus',                 MenuController::class)->names('admin.menus');
        Route::resource('academic_calendars',    AcademicCalendarController::class)->names('admin.academic_calendars');
        Route::get('/academic-lookups',         [AcademicLookupController::class, 'index'])->name('admin.academic_lookups.index');
Route::post('/academic-lookups/semester', [AcademicLookupController::class, 'semesterStore'])
    ->name('admin.academic_lookups.semester.store');

Route::post('/academic-lookups/faculty', [AcademicLookupController::class, 'facultyStore'])
    ->name('admin.academic_lookups.faculty.store');

Route::post('/academic-lookups/education-level', [AcademicLookupController::class, 'educationLevelStore'])
    ->name('admin.academic_lookups.education_level.store');

Route::post('/academic-lookups/education-type', [AcademicLookupController::class, 'educationTypeStore'])
    ->name('admin.academic_lookups.education_type.store');

Route::post('/academic-lookups/event-type', [AcademicLookupController::class, 'eventTypeStore'])
    ->name('admin.academic_lookups.event_type.store');

        Route::get('/',                              [AdminController::class,            'index'])->name('admin.index');
        Route::get('profile/show',                   [UserController::class,             'showProfile'])->name('admin.profile.show');
        Route::get('profile/edit',                   [UserController::class,             'editProfile'])->name('admin.profile.edit');
        Route::put('profile/update',                 [UserController::class,             'updateProfile'])->name('admin.profile.update');
        Route::post('/change-password-store',        [AdminController::class,            'change_password_store'])->name('admin.change-password.store');
        Route::get('optimize-clear',                 [SettingController::class,          'optimize'])->name('admin.settings.optimize-clear');


        Route::resource('home-page',             HomePageController::class)->names('admin.homePage');
        Route::post('hero-slides',               [HeroSlideController::class, 'store'])->name('admin.hero_slides.store');
        Route::post('hero-slides/order',         [HeroSlideController::class, 'order'])->name('admin.hero_slides.order');
        Route::post('hero-slides/{heroSlide}',   [HeroSlideController::class, 'update'])->name('admin.hero_slides.update');
        Route::delete('hero-slides/{heroSlide}', [HeroSlideController::class, 'destroy'])->name('admin.hero_slides.destroy');
        Route::resource('pages',                 PageController::class)->names('admin.pages');
        Route::post('pages/{page}/duplicate',    [PageController::class, 'duplicate'])->name('admin.pages.duplicate');
        Route::resource('programs',                 ProgramController::class)->names('admin.programs');


        Route::resource('contact-page',          ContactPageController::class)->names('admin.contactPage');
        Route::resource('campus-gallery-page',   CampusGalleryPageController::class)->names('admin.campusGalleryPage');
        Route::resource('media-guide-page',      MediaGuidePageController::class)->names('admin.mediaGuidePage');
        Route::resource('career-page',           CareerPageController::class)->names('admin.careerPage');
        Route::resource('project-page',          ProjectPageController::class)->names('admin.projectPage');
        Route::resource('event-page',            EventPageController::class)->names('admin.eventPage');
        Route::resource('student-club-page',     StudentClubPageController::class)->names('admin.studentClubPage');
        Route::resource('student-clubs',         StudentClubController::class)->names('admin.student_clubs');
        Route::resource('student-project-page',  StudentProjectPageController::class)->names('admin.studentProjectPage');
        Route::resource('student-projects',      StudentProjectsController::class)->names('admin.student_projects');
        Route::resource('projects',              ProjectController::class)->names('admin.projects');
        Route::resource('internship_programs',   InternshipProgramController::class)->names('admin.internship_programs');
        Route::resource('partners',              PartnerController::class)->names('admin.partners');
        Route::resource('vacancies',             VacancyController::class)->names('admin.vacancies');
        Route::resource('news',                  NewsController::class)->names('admin.news');
        Route::resource('announcements',         AnnouncementController::class)->names('admin.announcements');
        Route::resource('vacancies',             VacancyController::class)->names('admin.vacancies');
        Route::resource('project-categories',    ProjectCategoryController::class)->names('admin.project_categories');
        Route::resource('event-categories',      EventCategoryController::class)->names('admin.event_categories');
        Route::resource('events',                EventController::class)->names('admin.events');
        Route::resource('footers',               FooterController::class)->names('admin.footers');
        Route::post('/footers-order',            [FooterController::class,    'order'])->name('admin.footers.order');


        Route::resource('cvs',                   CvController::class)->names('admin.cvs');
        Route::resource('laboratory-page',       LaboratoryPageController::class)->names('admin.laboratoryPage');
        Route::resource('laboratories',          LaboratoryController::class)->names('admin.laboratories');
        Route::resource('internship-program-page',       InternshipProgramPageController::class)->names('admin.internshipProgramPage');
        Route::resource('graduate-page',         GraduatePageController::class)->names('admin.graduatePage');
        Route::resource('graduates',             GraduateController::class)->names('admin.graduates');
        Route::resource('career-opportunity-categories',      CareerOpportunityCategoryController::class)->names('admin.career_opportunity_categories');
        Route::resource('career-opportunities',                CareerOpportunityController::class)->names('admin.career_opportunities');
        Route::resource('career-opportunity-page',            CareerOpportunityPageController::class)->names('admin.careerOpportunityPage');

        Route::post('/remove-news-media',            [NewsController::class,    'removeNewsMedia'])->name('admin.remove-news-media');
        Route::get('news/{news}/order-images',       [NewsController::class,    'showImageOrder'])->name('admin.news.order-images');
        Route::put('news/{news}/order-images',       [NewsController::class,    'updateImageOrder'])->name('admin.news.order-images.update');

        Route::post('/remove-events-media',              [EventController::class,    'removeEventsMedia'])->name('admin.remove-events-media');
        Route::get('events/{event}/order-images',       [EventController::class,    'showImageOrder'])->name('admin.events.order-images');
        Route::put('events/{event}/order-images',       [EventController::class,    'updateImageOrder'])->name('admin.events.order-images.update');


        Route::post('/remove-announcements-media',            [AnnouncementController::class,    'removeNewsMedia'])->name('admin.remove-announcements-media');
        Route::get('announcements/{announcement}/order-images',       [AnnouncementController::class,    'showImageOrder'])->name('admin.announcements.order-images');
        Route::put('announcements/{announcement}/order-images',       [AnnouncementController::class,    'updateImageOrder'])->name('admin.announcements.order-images.update');


        Route::post('/remove-laboratories-media',               [LaboratoryController::class,    'removeLaboratoriesMedia'])->name('admin.remove-laboratories-media');
        Route::get('laboratories/{laboratory}/order-images',       [LaboratoryController::class,    'showImageOrder'])->name('admin.laboratories.order-images');
        Route::put('laboratories/{laboratory}/order-images',       [LaboratoryController::class,    'updateImageOrder'])->name('admin.laboratories.order-images.update');


        Route::post('/remove-projects-media',               [ProjectController::class,    'removeProjectsMedia'])->name('admin.remove-projects-media');
        Route::get('projects/{project}/order-images',       [ProjectController::class,    'showImageOrder'])->name('admin.projects.order-images');
        Route::put('projects/{project}/order-images',       [ProjectController::class,    'updateImageOrder'])->name('admin.projects.order-images.update');


        Route::post('/remove-mediaGuidePage-media',               [MediaGuidePageController::class,    'removeMediaGuidePageMedia'])->name('admin.remove-mediaGuidePage-media');
        Route::get('mediaGuidePage/{media_guide_page}/order-images',       [MediaGuidePageController::class,    'showImageOrder'])->name('admin.mediaGuidePage.order-images');
        Route::put('mediaGuidePage/{media_guide_page}/order-images',       [MediaGuidePageController::class,    'updateImageOrder'])->name('admin.mediaGuidePage.order-images.update');

        Route::post('/remove-student_clubs-media',               [StudentClubController::class,    'removeStudentClubsMedia'])->name('admin.remove-student_clubs-media');
        Route::get('student_clubs/{student_club}/order-images',       [StudentClubController::class,    'showImageOrder'])->name('admin.student_clubs.order-images');
        Route::put('student_clubs/{student_club}/order-images',       [StudentClubController::class,    'updateImageOrder'])->name('admin.student_clubs.order-images.update');

        Route::post('/remove-student_projects-media',               [StudentProjectsController::class,    'removeStudentProjectsMedia'])->name('admin.remove-student_projects-media');
        Route::get('student_projects/{student_project}/order-images',       [StudentProjectsController::class,    'showImageOrder'])->name('admin.student_projects.order-images');
        Route::put('student_projects/{student_project}/order-images',       [StudentProjectsController::class,    'updateImageOrder'])->name('admin.student_projects.order-images.update');

        Route::post('/remove-internship_programs-media',               [InternshipProgramController::class,    'removeInternshipProgramsMedia'])->name('admin.remove-internship_programs-media');
        Route::get('internship_programs/{internship_program}/order-images',       [InternshipProgramController::class,    'showImageOrder'])->name('admin.internship_programs.order-images');
        Route::put('internship_programs/{internship_program}/order-images',       [InternshipProgramController::class,    'updateImageOrder'])->name('admin.internship_programs.order-images.update');



        Route::post('/menus-order',            [MenuController::class,    'order'])->name('admin.menus.order');
Route::post('menus/toggle-status', [MenuController::class, 'toggleStatus'])
        ->name('admin.menus.toggleStatus');
    });


    Route::post('pages/update-dynamics-layout', [PageController::class, 'updateDynamicsLayout'])
        ->name('pages.update-dynamics-layout');

    Route::post('programs/update-dynamics-layout', [ProgramController::class, 'updateDynamicsLayout'])
        ->name('programs.update-dynamics-layout');
});
