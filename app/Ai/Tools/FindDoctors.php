<?php

namespace App\Ai\Tools;

use App\Models\Department;
use App\Models\Doctor;
use Illuminate\Contracts\JsonSchema\JsonSchema;
use Laravel\Ai\Contracts\Tool;
use Laravel\Ai\Tools\Request;
use Stringable;

class FindDoctors implements Tool
{
    /**
     * Get the description of the tool's purpose.
     */
    public function description(): Stringable|string
    {
        return <<<'DESCRIPTION'
        Find active hospital doctors.

        Use this tool when:
        - The patient asks which doctors are available.
        - The patient asks for doctors in a specific department.
        - The patient mentions a department name in Bangla or English.
        - The patient asks for a doctor by name.
        - The patient asks about a doctor's specialization or designation.

        If a department is mentioned, use department_name.
        Always return real doctors from the database.
        Never invent doctors.
        DESCRIPTION;
    }

    /**
     * Execute the tool.
     */
    public function handle(Request $request): Stringable|string
    {
        $departmentId = $request['department_id'] ?? null;
        $departmentName = trim($request['department_name'] ?? '');
        $search = trim($request['search'] ?? '');

        /*
        |--------------------------------------------------------------------------
        | Find Department
        |--------------------------------------------------------------------------
        */

        if (!$departmentId && $departmentName !== '') {

            $department = Department::query()
                ->where('status', true)
                ->where(function ($query) use ($departmentName) {

                    $query->where('name', 'like', '%' . $departmentName . '%')
                        ->orWhere('bn_name', 'like', '%' . $departmentName . '%');

                })
                ->first();

            /*
             * If exact text does not match because of
             * Bangla spelling variation, try normalized matching.
             */
            if (!$department) {

                $normalizedInput = $this->normalizeBangla(
                    $departmentName
                );

                $department = Department::query()
                    ->where('status', true)
                    ->get(['id', 'name', 'bn_name'])
                    ->first(function ($item) use ($normalizedInput) {

                        return str_contains(
                                $this->normalizeBangla($item->bn_name ?? ''),
                                $normalizedInput
                            )
                            ||
                            str_contains(
                                $normalizedInput,
                                $this->normalizeBangla($item->bn_name ?? '')
                            )
                            ||
                            str_contains(
                                strtolower($item->name ?? ''),
                                strtolower($normalizedInput)
                            )
                            ||
                            str_contains(
                                strtolower($normalizedInput),
                                strtolower($item->name ?? '')
                            );
                    });
            }

            if ($department) {
                $departmentId = $department->id;
            }
        }

        /*
        |--------------------------------------------------------------------------
        | Doctor Query
        |--------------------------------------------------------------------------
        */

        $query = Doctor::query()
            ->with('department:id,name,bn_name')
            ->where('status', true);

        if ($departmentId) {
            $query->where('department_id', $departmentId);
        }

        /*
        |--------------------------------------------------------------------------
        | Search Doctor
        |--------------------------------------------------------------------------
        */

        if ($search !== '') {

            $query->where(function ($q) use ($search) {

                $q->where('name', 'like', '%' . $search . '%')
                    ->orWhere('specialization', 'like', '%' . $search . '%')
                    ->orWhere('designation', 'like', '%' . $search . '%');

            });
        }

        /*
        |--------------------------------------------------------------------------
        | Get Doctors
        |--------------------------------------------------------------------------
        */

        $doctors = $query
            ->select(
                'id',
                'department_id',
                'name',
                'designation',
                'specialization',
                'bio'
            )
            ->orderBy('name')
            ->limit(20)
            ->get();

        /*
        |--------------------------------------------------------------------------
        | No Doctor Found
        |--------------------------------------------------------------------------
        */

        if ($doctors->isEmpty()) {

            return json_encode([
                'status' => false,
                'message' => 'No matching doctor found.',
                'data' => [],
            ], JSON_UNESCAPED_UNICODE);
        }

        /*
        |--------------------------------------------------------------------------
        | Return Doctors
        |--------------------------------------------------------------------------
        */

        return json_encode([
            'status' => true,
            'message' => 'Doctors found.',
            'data' => $doctors->map(function ($doctor) {

                return [
                    'id' => $doctor->id,
                    'name' => $doctor->name,
                    'designation' => $doctor->designation,
                    'specialization' => $doctor->specialization,
                    'department' => $doctor->department?->name,
                    'department_bn' => $doctor->department?->bn_name,
                    'bio' => $doctor->bio,
                ];

            })->values()->all(),
        ], JSON_UNESCAPED_UNICODE);
    }

    /**
     * Normalize Bangla text.
     */
    private function normalizeBangla(string $text): string
    {
        return trim(
            preg_replace(
                '/\s+/u',
                ' ',
                str_replace(
                    [
                        'এন্টার',
                        'এন্টের',
                        'এন্‌টার',
                        'এনটার',
                    ],
                    'এন্টার',
                    $text
                )
            )
        );
    }

    /**
     * Get the tool's schema definition.
     */
    public function schema(JsonSchema $schema): array
    {
        return [

            'department_id' => $schema
                ->integer()
                ->description(
                    'The numeric department ID if already known. Never invent an ID. Leave empty when department_name is provided.'
                )
                ->nullable(),

            'department_name' => $schema
                ->string()
                ->description(
                    'The department name mentioned by the patient, in Bangla or English. Example: গ্যাস্ট্রোএন্টারোলজি, গ্যাস্ট্রোএন্টেরোলজি, Gastroenterology.'
                )
                ->nullable(),

            'search' => $schema
                ->string()
                ->description(
                    'Doctor name, specialization, or designation if the patient is searching for a specific doctor. Leave empty when asking for all doctors in a department.'
                )
                ->nullable(),
        ];
    }
}
