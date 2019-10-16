<?php

namespace App\Http\Controllers;

use App\Events\NewMessage;
use App\Group;
use App\Message;
use App\User;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    /**
     * @param User $user
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(User $user){
        if($user->isAdmin()){
            $messages  = $user->sentMessages()->get();
            return view('admin.messages.index', ['messages' => $messages, 'user' => $user]);
        } else{
            $userGroups = $user->groups()->with('messages')->get();
            return view('messages.index', ['userGroups' => $userGroups]);
        }
    }

    public function create(User $user){
        $groups = $user->taughtGroups()->get();
        return view('admin.messages.create', ['user' => $user, 'groups' => $groups]);
    }

    /**
     * @param Request $request
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request, User $user){
      /*  $this->validate($request, [

        ]);*/

        $message = new Message();
        $message->title = $request->title;
        $message->message = $request->message;
        $message->user_id = $user->id;
        $message->group_id = $request->group_id;
        $message->save();


        event(new NewMessage($message));

        return redirect()->route('messages', $user);

    }

    /**
     * @param Message $message
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Message $message){

        return view('messages.show', ['message' => $message]);
    }

    /**
     * @param Message $message
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function delete(Message $message, User $user){

        $message->delete();
        return redirect()->route('messages', $user);
    }
}
