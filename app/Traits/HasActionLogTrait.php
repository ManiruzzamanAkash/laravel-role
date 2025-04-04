<?php

namespace App\Traits;

use App\Enums\ActionType;
use App\Models\ActionLogModel;
use Auth;

trait HasActionLogTrait
{
    /**
     * Store action log in the database.
     *
     * @param ActionType $type
     * @param string|null $title
     * @param array $data
     * @return bool
     */
    public function storeActionLog(ActionType $type, ?string $title, array $data): bool
    {
        try {
            if (!$title) {
                $dataKey = key($data);
                $name = Auth::user()->username ?? 'Unknown';
                $title = ucfirst($dataKey) . ' ' . $type->value . ' by ' . $name . ''; 
            }

            $actionLog = ActionLogModel::create([
                'type' => $type->value,
                'title' => $title,
                'action_by' => auth()->id(),
                'data' => json_encode($data),
            ]);

            return $actionLog ? true : false;
        } catch (\Exception $e) {
            return false;
        }
    }
}
