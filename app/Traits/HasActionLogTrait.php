<?php

namespace App\Traits;

use App\Enums\ActionType;
use App\Models\ActionLogModel;

trait HasActionLogTrait
{
    /**
     * Store action log in the database.
     *
     * @param ActionType $type
     * @param string $title
     * @param string $actionBy
     * @param array $data
     * @return bool
     */
    public function storeActionLog(ActionType $type, string $title, string $actionBy, array $data): bool
    {
        try {
            $actionLog = ActionLogModel::create([
                'type' => $type->value,
                'title' => $title,
                'action_by' => $actionBy,
                'data' => json_encode($data),
            ]);
            return $actionLog ? true : false;
        } catch (\Exception $e) {
            return false;
        }
    }

}
