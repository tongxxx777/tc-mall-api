<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource as BaseJsonResource;

class JsonResource extends BaseJsonResource
{
    /**
     *
     * 参考 App\Http\Requests\FormRequest 覆写 rules
     *
     * @Author tongfei
     * @DateTime 2023-11-16
     */
    public function toArray($request)
    {
        $actionMethod = $request->route() ? $request->route()->getActionMethod() : '';
        if (!method_exists($this, $actionMethod)) return parent::toArray($request);
        $original = $this->$actionMethod();
        return compareData($original, $this->commons);
    }
}
