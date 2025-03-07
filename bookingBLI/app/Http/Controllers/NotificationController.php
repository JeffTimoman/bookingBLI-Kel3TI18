<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notification;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class NotificationController extends Controller
{
    use AuthorizesRequests;
    public function destroy(Notification $notification)
    {
        $this->authorize('delete', $notification);
        $notification->delete();
        return back();
    }

    public function clearAll()
    {
        auth()->user()->notifications()->delete();
        return back();
    }

    public function markAsRead()
    {
        auth()->user()->unreadNotifications()->update(['read' => true]);
        return response()->json(['success' => true]);
    }
}
