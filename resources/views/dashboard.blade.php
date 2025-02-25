<div class="container-fluid py-4">
    <div class="row">
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
                <div class="card-header p-3 pt-2">
                    <div class="icon icon-lg icon-shape bg-gradient-dark shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                        <i class="fas fa-fw fa-user opacity-10"></i>
                    </div>
                    <div class="text-end pt-1">
                        <a href="{{ route('users.index') }}"><p class="text-sm mb-0 text-capitalize">Users</p></a>
                        <h4 class="mb-0">{{$users}}</h4>
                    </div>
                </div>
                <hr class="dark horizontal my-0">
                <div class="card-footer p-3">
                    <p class="mb-0"><b>Total Users Count</b></p>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
                <div class="card-header p-3 pt-2">
                    <div class="icon icon-lg icon-shape bg-gradient-primary shadow-primary text-center border-radius-xl mt-n4 position-absolute">
                        <i class="fas fa-fw fa-cog opacity-10"></i>
                    </div>
                    <div class="text-end pt-1">
                        <a href="{{ route('departments.index') }}"><p class="text-sm mb-0 text-capitalize">Departments</p></a>
                        <h4 class="mb-0">{{$departments}}</h4>
                    </div>
                </div>
                <hr class="dark horizontal my-0">
                <div class="card-footer p-3">
                    <p class="mb-0"><b>Total Departments Count</b></p>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
                <div class="card-header p-3 pt-2">
                    <div class="icon icon-lg icon-shape bg-gradient-success shadow-success text-center border-radius-xl mt-n4 position-absolute">
                        <i class="fas fa-fw fa-address-card opacity-10"></i>
                    </div>
                    <div class="text-end pt-1">
                        <a href="{{ route('employees.index') }}"><p class="text-sm mb-0 text-capitalize">Employees</p></a>
                        <h4 class="mb-0">{{$employees}}</h4>
                    </div>
                </div>
                <hr class="dark horizontal my-0">
                <div class="card-footer p-3">
                    <p class="mb-0"><b>Total Employees Count</b></p>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6">
            <div class="card">
                <div class="card-header p-3 pt-2">
                    <div class="icon icon-lg icon-shape bg-gradient-info shadow-info text-center border-radius-xl mt-n4 position-absolute">
                        <i class="fas fa-fw fa-globe opacity-10"></i>
                    </div>
                    <div class="text-end pt-1">
                        <p class="text-sm mb-0 text-capitalize"><a href="{{ route('countries.index') }}">Countries</a></p>
                        <h4 class="mb-0">{{$countries}}</h4>
                    </div>
                </div>
                <hr class="dark horizontal my-0">
                <div class="card-footer p-3">
                    <p class="mb-0"><b>Total Countries Count</b></p>
                </div>
            </div>
        </div>
    </div>
</div>