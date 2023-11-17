<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\UserRequest;
use App\Http\Resources\Admin\UserResource;

class UserController extends Controller
{
    /**
     * 列表
     *
     * @Author tongfei
     * @DateTime 2023-11-16
     */
    public function index(Request $request)
    {
        $builder = User::query();
        // 搜索
        if (!empty($request->search)) {
            $like = '%' . $request->search . '%';
            $builder->where(function ($query) use ($like) {
                $query->where('username', 'like', $like)->orWhere('name', 'like', $like);
            });
        }
        $users = $builder->orderByDesc('id')->paginate($request->limit ?? $this->perPage);
        return $this->success([
            'list' => UserResource::collection($users),
            'total' => $users->total()
        ]);
    }

    /**
     * 详情
     *
     * @Author tongfei
     * @DateTime 2023-11-16
     */
    public function show(User $user)
    {
        return $this->success(new UserResource($user));
    }

    /**
     * 编辑
     *
     * @Author tongfei
     * @DateTime 2023-11-16
     */
    public function update(UserRequest $request, User $user)
    {
        try {
            $attributes = $request->only(['password', 'name']);
            if ($user->update($attributes)) {
                return $this->success();
            }
        } catch (\Throwable $th) {
            recordCommonError('编辑用户', $th, ['id' => $user->id]);
        }
        return $this->fail('编辑失败');
    }

    /**
     * 删除
     *
     * @Author tongfei
     * @DateTime 2023-11-16
     */
    public function destroy(User $user)
    {
        if ($user->delete()) {
            return $this->success();
        }
        return $this->fail('删除失败');
    }
}
