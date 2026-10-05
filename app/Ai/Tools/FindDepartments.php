<?php

namespace App\Ai\Tools;

use App\Models\Department;
use Illuminate\Contracts\JsonSchema\JsonSchema;
use Laravel\Ai\Contracts\Tool;
use Laravel\Ai\Tools\Request;
use Stringable;

class FindDepartments implements Tool
{
    /**
     * Get the description of the tool's purpose.
     */
    public function description(): Stringable|string
    {
        return 'Find hospital departments by searching their name. Use this tool when the patient mentions a medical department or specialty.';
    }

    /**
     * Execute the tool.
     */
    public function handle(Request $request): Stringable|string
    {
        $search = trim($request['search'] ?? '');

        $query = Department::query()
            ->where('status', true);

        if ($search !== '') {
            $query->where('name', 'like', '%' . $search . '%');
        }

        $departments = $query
            ->select('id', 'name')
            ->orderBy('name')
            ->limit(10)
            ->get();

        if ($departments->isEmpty()) {
            return json_encode([
                'status' => false,
                'message' => 'No matching department found.',
                'data' => [],
            ]);
        }

        return json_encode([
            'status' => true,
            'message' => 'Departments found.',
            'data' => $departments->map(function ($department) {
                return [
                    'id' => $department->id,
                    'name' => $department->name,
                ];
            })->values()->all(),
        ]);
    }

    /**
     * Get the tool's schema definition.
     */
    public function schema(JsonSchema $schema): array
    {
        return [
            'search' => $schema
                ->string()
                ->description('Department or medical specialty name, for example Medicine, Cardiology, Dermatology.')
                ->required(),
        ];
    }
}
