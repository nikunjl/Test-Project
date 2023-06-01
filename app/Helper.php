<?php
use App\Models\Logs;
  
function storeLogs($data)
{
    $logs = new Logs();
    $logs->user_id = \Auth::id();
    $logs->old_data = isset($data['old_data']) ? json_encode($data['old_data']) : [];
    $logs->new_data = isset($data['new_data']) ? json_encode($data['new_data']) : [];
    $logs->type = $data['type'];
    $logs->save();
}