<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\Front\MessageSendRequest;
use App\Http\Requests\Front\SubscribeRequest;
use App\Models\Message;
use App\Models\Subscribe;
use App\Services\MessageService;
use App\Traits\Responseable;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class MessageController extends Controller
{
    use Responseable;
    private const PATH = 'admin.subscribes.';
    private const TITLE = 'Subscribers';

    public function __construct(private readonly MessageService $messageService)
    {
        $this->authorizeResource(Subscribe::class);
    }
    public function send(MessageSendRequest $request)
    {
        try {
            $payload = $request->validated();
            // unset($payload['g-recaptcha-response']);

            $this->messageService->send($payload);

            return redirect()->back()->with('message', __('translate.message_sent'));
        } catch (Exception $exception) {
            return redirect()
                ->back()
                ->with('error', __('translate.message_not_sent'));
        }
    }

    public function subscribe(SubscribeRequest $request)
    {
        if (Subscribe::where('email', $request->email)->exists()) {
            return redirect()->back()->with('error', __('translate.You are already subscribed'));
        }

        try {
            Subscribe::create($request->validated());
            return redirect()->back()->with('message', __('translate.You are subscribed'));
        } catch (Exception $exception) {
            return redirect()
                ->back()
                ->with(['error' => __('translate.Failed')]);
        }
    }
    public function index()
    {
        $attributes = Subscribe::attributes();
        $headerAttributes = Subscribe::headerAttributes();

        $subscribes = Subscribe::paginate();
        return view(self::PATH . 'index', [
            'attributes' => $attributes,
            'headerAttributes' => $headerAttributes,
            'models' => $subscribes,
            'title' => self::TITLE,
        ]);
    }
    public function destroy(Subscribe $subscribe)
    {
        $subscribe->delete();
        return redirect()
            ->route(self::PATH . 'index')
            ->with('success', __('translate.Successfully completed'));
    }
}
