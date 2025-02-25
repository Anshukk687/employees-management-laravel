<?php
    namespace App\Http\livewire;
    use Livewire\Component;
    use App\Models\User;
    use App\Models\Department;
    use App\Models\Employee;
    use App\Models\Country;

    class Dashboard extends Component
    {
        public function render()
        {
            $users = User::count();
            $departments = Department::count();
            $employees = Employee::count();
            $countries = Country::count();
            
            return view('dashboard', [
                'users' => $users,
                'departments' => $departments,
                'employees' => $employees,
                'countries' => $countries
            ])->layout('layouts.main');
        }
    }
?>