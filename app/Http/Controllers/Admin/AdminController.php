<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Certificate;
use App\Models\Message;
use App\Models\News;
use App\Models\Partner;
use App\Models\Project;
use App\Models\Subscribe;
use App\Models\Vacancy;
use App\Services\Contracts\UserServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class AdminController extends Controller
{
    public function __construct(private readonly UserServiceInterface $userService)
    {
        // private readonly MessageServiceInterface $messageService,
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $messageAmount = Message::count();
        $subscribeAmount = Subscribe::count();
        $projects = Project::count();
        $partners = Partner::count();
        $news = News::count();
        $vacancies = Vacancy::count();

        $data = [


            'news' => [
                'count' => $news,
                'title' => 'News',
                'routeName' => 'news',
                'icon' => '',
            ],
            'projects' => [
                'count' => $projects,
                'title' => 'Projects',
                'routeName' => 'projectPage',
                'icon' => '',
            ],

            'messages' => [
                'count' => $messageAmount,
                'title' => 'Messages',
                'routeName' => 'messages',
                'icon' => '',
            ],
            'subscribers' => [
                'count' => $subscribeAmount,
                'title' => 'Subscribers',
                'routeName' => 'subscribes',
                'icon' => '',
            ],


            'partners' => [
                'count' => $partners,
                'title' => 'Partners',
                'routeName' => 'partners',
                'icon' => '',
            ],

            'vacancies' => [
                'count' => $vacancies,
                'title' => 'Vacancies',
                'routeName' => 'vacancies',
                'icon' => '',
            ],

        ];

        return view('admin.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function login(Request $request)
    {
        try {
            $request->validate([
                'email' => 'required|email',
                'password' => 'required|string|min:6',
            ]);

            $credentials = $request->only('email', 'password');

            if (Auth::attempt($credentials, $request->boolean('remember'))) {
                return redirect()->route('admin.index');
            }

            return redirect()
                ->back()
                ->withErrors(['email' => 'Email və ya şifrə yanlışdır']);
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Giriş zamanı xəta baş verdi');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('admin.login');
    }

    public function login_form()
    {
        return view('admin.auth.login');
    }

    public function change_password()
    {
        $admin = Auth::user();
        return view('admin.change_password', compact('admin'));
    }
    public function change_password_store(Request $request)
    {
        $user = Auth::user();
        $validatedForm = $request->validate([
            'password' => ['nullable', 'string', Password::min(8)->mixedCase()->letters()->numbers()->symbols()],
        ]);

        $user->update($validatedForm);
        return redirect()->route('admin.profile.edit')->with('success', __('translate.Successfully completed'));
    }
}
