<?php

namespace App\Models;

use CodeIgniter\Model;

class DepartmentBudgetModel extends Model
{
    protected $table = 'dep_budget_tbl';
    protected $primaryKey = 'bud_id';
    protected $allowedFields = ['bud_dep_fk', 'bud_year', 'bud_total'];

    /**
     * Get the total budget for a given department and year.
     *
     * @param int $departmentId The ID of the department.
     * @param int $year The year for which to retrieve the budget.
     * @return array|null The budget data or null if not found.
     */
    public function getBudgetByDepartmentAndYear(int $departmentId, int $year)
    {
        return $this->where('bud_dep_fk', $departmentId)
                    ->where('bud_year', $year)
                    ->first();
    }
} 