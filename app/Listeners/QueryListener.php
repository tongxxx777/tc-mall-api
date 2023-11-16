<?php

namespace App\Listeners;

use Illuminate\Database\Events\QueryExecuted;
use Illuminate\Support\Facades\Log;

class QueryListener
{
    /**
     * Handle the event.
     *
     * @param  \Illuminate\Database\Events\QueryExecuted  $event
     * @return void
     */
    public function handle(QueryExecuted $event)
    {
        // 正式不记录 会导致文件太大
        // 建议只在测试排查问题时使用
        if (!isProduction()) {
            foreach ($event->bindings as $key => $value) {
                if ($value instanceof \DateTimeInterface) {
                    $event->bindings[$key] = $value->format('Y-m-d H:i:s');
                } elseif (is_bool($value)) {
                    $event->bindings[$key] = (int)$value;
                }
            }
            // 针对存在模糊查询 % 号时 进行处理
            $exist = strpos($event->sql, '%');
            if ($exist !== 0) {
                $event->sql = str_replace("%", "'%%'", $event->sql);
            }
            $sql = str_replace('?', "'%s'", $event->sql);
            $log = "[{$event->time}ms] " . vsprintf($sql, $event->bindings);
            Log::channel('sql')->info($log);
        }
    }
}
