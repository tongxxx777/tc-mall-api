<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\AdminRequest;
use App\Http\Resources\Admin\AdminResource;

class AdminController extends Controller
{
    /**
     * 列表
     *
     * @Author tongfei
     * @DateTime 2023-11-16
     */
    public function index(Request $request)
    {
        $builder = Admin::query();
        // 搜索
        if (!empty($request->search)) {
            $like = '%' . $request->search . '%';
            $builder->where(function ($query) use ($like) {
                $query->where('username', 'like', $like)->orWhere('name', 'like', $like);
            });
        }
        $admins = $builder->orderByDesc('id')->paginate($request->limit ?? $this->perPage);
        return $this->success([
            'list' => AdminResource::collection($admins),
            'total' => $admins->total()
        ]);
    }

    /**
     * 创建
     *
     * @Author tongfei
     * @DateTime 2023-11-16
     */
    public function store(AdminRequest $request)
    {
        try {
            $attributes = $request->only(['username', 'name']);
            if (Admin::create($attributes)) {
                return $this->success();
            }
        } catch (\Throwable $th) {
            recordCommonError('创建用户', $th);
        }
        return $this->fail('创建失败');
    }

    /**
     * 详情
     *
     * @Author tongfei
     * @DateTime 2023-11-16
     */
    public function show(Admin $admin)
    {
        return $this->success(new AdminResource($admin));
    }

    /**
     * 编辑
     *
     * @Author tongfei
     * @DateTime 2023-11-16
     */
    public function update(AdminRequest $request, Admin $admin)
    {
        try {
            $attributes = $request->only(['password', 'name']);
            if ($admin->update($attributes)) {
                return $this->success();
            }
        } catch (\Throwable $th) {
            recordCommonError('编辑用户', $th, ['id' => $admin->id]);
        }
        return $this->fail('编辑失败');
    }

    /**
     * 删除
     *
     * @Author tongfei
     * @DateTime 2023-11-16
     */
    public function destroy(Admin $admin)
    {
        if ($admin->id == Admin::DEFAULT_ID) return $this->fail('不允许删除默认账号');
        if ($admin->id == auth()->user()->id) return $this->fail('不允许删除自己');
        if ($admin->delete()) {
            return $this->success();
        }
        return $this->fail('删除失败');
    }
}
