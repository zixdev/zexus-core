<?php namespace Zix\Core\Http\Controllers;

use App\User;
use Zix\Core\Http\Resources\User as UserResources;
//use Zix\Core\Events\User as UserEvents;
use Zix\Core\Http\Requests\User as UserRequests;

/**
 * Class UserController
 * @package Zix\Core\Http\Controllers
 */
class UserController
{
    /**
     * TestController constructor.
     * @param User $model
     */
    public function __construct(User $model)
    {
        $this->model = $model;
    }

    /**
     * @param UserRequests\UserShowRequest $request
     * @return UserResources\UserResourceCollection
     */
    public function index(UserRequests\UserShowRequest $request)
    {
        return datatables()->eloquent($this->model->query())->toJson();
    }

    /**
     * @param UserRequests\UserShowRequest $request
     * @param User $user
     * @return UserResources\UserResource
     */
    public function show(UserRequests\UserShowRequest $request, User $user)
    {
        return new UserResources\UserResource($user);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  UserRequests\UserStoreRequest $request
     * @return UserResources\UserResource
     */
    public function store(UserRequests\UserStoreRequest $request)
    {
        $model = $this->model->create(array_merge(
            $request->input(),
            ['password' => bcrypt($request->get('password'))]
        ));
        //event(new UserEvents\UserStoredEvent($model));

        return new UserResources\UserResource($model);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  User $user
     * @param  UserRequests\UserUpdateRequest $request
     * @return UserResources\UserResource
     */
    public function update(UserRequests\UserUpdateRequest $request, User $user)
    {
        $user->update($request->input());

        $user->roles()->detach();
        collect($request->get('roles'))->map(function ($role) use ($user) {
            $user->assignRole($role['name']);
        });
        //event(new UserEvents\UserUpdatedEvent($user));

        return new UserResources\UserResource($user);
    }

    /**
     * @param UserRequests\UserDestroyRequest $request
     * @param User $user
     * @return UserResources\UserResource
     */
    public function destroy(UserRequests\UserDestroyRequest $request, User $user)
    {
        //event(new UserEvents\UserDestroyedEvent($user));
        $user->delete();

        return new UserResources\UserResource($user);
    }
}