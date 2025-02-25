<div>
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Employees List</h1>
    </div>
    <div class="row">
        <div class="card col-12 mx-auto">
            <div>
                @if (session()->has('employee-message'))
                    <div class="alert alert-success">
                        {{ session('employee-message') }}
                    </div>
                @endif
            </div>
            <div class="card-header">
                <div class="row">
                    <div class="col">
                        <form>
                            <div class="form-row align-items-center">
                                <div class="col">
                                    <input type="search" wire:model="search" class="form-control mb-2"
                                        id="inlineFormInput" placeholder="Search...">
                                </div>
                                <div class="col">
                                    <select wire:model="selectedDepartmentId" id="departmentId" class="form-control mb-2">
                                        <option selected>Choose Department</option>
                                        @foreach (App\Models\Department::all() as $department)
                                            <option value="{{ $department->id }}">{{ $department->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col" wire:loading>
                                    <div class="spinner-border" role="status">
                                        <span class="sr-only">Loading...</span>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div>
                        <button wire:click="showEmployeeModal" class="btn btn-primary">
                            Add Employee
                        </button>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table" wire:loading.remove>
                    <thead>
                        <tr>
                            <th scope="col">#Id</th>
                            <th scope="col">First Name</th>
                            <th scope="col">Department</th>
                            <th scope="col">Country</th>
                            <th scope="col">Date Hired</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($employees as $employee)
                            <tr>
                                <th scope="row">{{ $employee->id }}</th>
                                <td>{{ $employee->first_name }}</td>
                                <td>{{ $employee->department->name }}</td>
                                <td>{{ $employee->country->name }}</td>
                                <td>{{ $employee->date_hired }}</td>
                                <td>
                                    <button wire:click="showEditModal({{ $employee->id }})"
                                        class="btn btn-success">Edit</button>
                                    <button wire:click="deleteEmployee({{ $employee->id }})"
                                        class="btn btn-danger">Delete</button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <th>No Results</th>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div>
                {{ $employees->links('pagination::bootstrap-4') }}
            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="employeeModal" tabindex="-1" aria-labelledby="employeeModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        @if ($editMode)
                            <h5 class="modal-title" id="employeeModalLabel">Edit Employee</h5>
                        @else
                            <h5 class="modal-title" id="employeeModalLabel">Create Employee</h5>

                        @endif
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="form-group row">
                                <label for="lastName"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Last Name') }}</label>

                                <div class="col-md-6">
                                    <input id="lastName" type="text"
                                        class="form-control @error('lastName') is-invalid @enderror"
                                        wire:model.defer="lastName">

                                    @error('lastName')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="firstName"
                                    class="col-md-4 col-form-label text-md-right">{{ __('First Name') }}</label>

                                <div class="col-md-6">
                                    <input id="firstName" type="text"
                                        class="form-control @error('firstName') is-invalid @enderror"
                                        wire:model.defer="firstName">

                                    @error('firstName')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="middleName"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Middle Name') }}</label>

                                <div class="col-md-6">
                                    <input id="middleName" type="text"
                                        class="form-control @error('middleName') is-invalid @enderror"
                                        wire:model.defer="middleName">

                                    @error('middleName')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="address"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>

                                <div class="col-md-6">
                                    <input id="address" type="text"
                                        class="form-control @error('address') is-invalid @enderror"
                                        wire:model.defer="address">

                                    @error('address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="countryId"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Country') }}</label>

                                <div class="col-md-6">
                                    <select wire:model.defer="countryId" id="countryId" class="custom-select">
                                        <option selected>Choose</option>

                                        @foreach (App\Models\Country::all() as $country)
                                            <option value="{{ $country->id }}">{{ $country->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('countryId')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="stateId"
                                    class="col-md-4 col-form-label text-md-right">{{ __('State') }}</label>

                                <div class="col-md-6">
                                    <select wire:model.defer="stateId" id="stateId" class="custom-select">
                                        <option selected>Choose</option>

                                        @foreach (App\Models\State::all() as $state)
                                            <option value="{{ $state->id }}">{{ $state->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('stateId')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="cityId"
                                    class="col-md-4 col-form-label text-md-right">{{ __('City') }}</label>

                                <div class="col-md-6">
                                    <select wire:model.defer="cityId" id="cityId" class="custom-select">
                                        <option selected>Choose</option>

                                        @foreach (App\Models\City::all() as $city)
                                            <option value="{{ $city->id }}">{{ $city->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('cityId')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="departmentId"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Deprtment') }}</label>

                                <div class="col-md-6">
                                    <select wire:model.defer="departmentId" class="custom-select">
                                        <option selected>Choose</option>

                                        @foreach (App\Models\Department::all() as $department)
                                            <option value="{{ $department->id }}">{{ $department->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('departmentId')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="zipCode"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Zip Code') }}</label>

                                <div class="col-md-6">
                                    <input id="zipCode" type="text"
                                        class="form-control @error('zipCode') is-invalid @enderror"
                                        wire:model.defer="zipCode">

                                    @error('zipCode')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="birthDate"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Date Of Birth') }}</label>

                                <div class="col-md-6">
                                    <input id="birthDate" type="text"
                                        class="form-control @error('birthDate') is-invalid @enderror"
                                        wire:model.defer="birthDate">

                                    @error('birthDate')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="dateHired"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Date Hired') }}</label>

                                <div class="col-md-6">
                                    <input id="dateHired" type="text"
                                        class="form-control @error('dateHired') is-invalid @enderror"
                                        wire:model.defer="dateHired">

                                    @error('dateHired')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" wire:click="closeModal">Close</button>
                        @if ($editMode)
                            <button type="button" class="btn btn-primary" wire:click="updateEmployee">Update</button>
                        @else
                            <button type="button" class="btn btn-primary storeEmployee" wire:click="storeEmployee">Submit</button>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(".storeEmployee").click(function(){
        var lastName = $("#lastName").val();
        var firstName = $("#firstName").val();
        var middleName = $("#middleName").val();
        var address = $("#address").val();
        var countryId = $("#countryId").val();
        var stateId = $("#stateId").val();
        var cityId = $("#cityId").val();
        var departmentId = $("#departmentId").val();
        var zipCode = $("#zipCode").val();
        var birthDate = $("#birthDate").val();
        var dateHired = $("#dateHired").val();

        if(lastName == "" || firstName == "" || middleName == "" || address == "" || countryId == "" 
            || stateId == "" || cityId == "" || departmentId == "" || zipCode == "" || birthDate == "" 
            || dateHired == ""){
            alert("All fields are required !!");
            location.reload();
        }
    });
</script>