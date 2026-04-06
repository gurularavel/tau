<x-front.layout :title="__('translate.404 not found')" :metaDescription="__('translate.404 not found')" :metaKeywords="__('translate.404 not found')">
    <div class="error-page" style="padding: 100px 0; text-align: center; font-family: 'Noto Sans', sans-serif;">
        <div class="container">
            <h1 style="font-size: 120px; font-weight: 900; color: #d63832; margin-bottom: 0; line-height: 1;">404</h1>
            <h2 style="font-size: 32px; font-weight: 600; color: #d63832; margin-top: 10px;">{{ __('translate.Page not found') }}</h2>
            <p style="font-size: 18px; color: #666; max-width: 600px; margin: 20px auto 30px;">
                {{ __('translate.The page you are looking for might have been removed, had its name changed, or is temporarily unavailable.') }}
            </p>
            <a href="{{ url('/') }}"
               style="display: inline-block; padding: 12px 30px; background-color: #d63832; color: #fff; text-decoration: none; border-radius: 5px; font-weight: 600; transition: background 0.3s ease;">
                {{ __('translate.Back to home page') }}
            </a>
        </div>
    </div>

    <style>
        .error-page a:hover {
            background-color: #d63832!important;
        }
        @media (max-width: 768px) {
            .error-page h1 { font-size: 80px; }
            .error-page h2 { font-size: 24px; }
        }
    </style>
</x-front.layout>
