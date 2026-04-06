<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\MessageRequest;
use App\Models\Message;
use App\Services\Contracts\MessageServiceInterface;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
class MessageController extends Controller
{
    private const PATH = 'admin.messages.';

    private const TITLE = 'Messages';

    public function __construct(private readonly MessageServiceInterface $messageService)
    {
        $this->authorizeResource(Message::class);

    }

    /**
     * Remove the specified resource` from storage.
     */
    public function destroy(Message $message): RedirectResponse
    {
        $this->messageService->delete($message);

        return redirect()
            ->route(self::PATH . 'index')
            ->with('success', __('translate.Successfully completed'));
    }

    /**
     * Display a listing of the resource.
     *
     * @param MessageRequest $request
     * @return View
     */
    public function index(MessageRequest $request): View
    {
        $models = $this->messageService->getAllPaginated(
            requestParser: $request->parser(),
            columns: ['id', 'name', 'email', 'phone', 'read_at'],
        );

        $attributes = Message::attributes();
        $headerAttributes = Message::headerAttributes();

        return view(self::PATH . 'index', [
            'attributes' => $attributes,
            'headerAttributes' => $headerAttributes,
            'models' => $models,
            'title' => self::TITLE,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Message $message): View
    {
        $this->messageService->read($message);

        return view(self::PATH . 'show', [
            'model' => $message,
            'title' => self::TITLE,
        ]);
    }
}
