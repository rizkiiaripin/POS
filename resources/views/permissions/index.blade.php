@extends('layouts.app')
@section('content')
    <x-breadcrumb></x-breadcrumb>
    <x-alert></x-alert>
    <section class="datatables">
        <section class="datatables">
            <div class="">
                <div class="card-body">

                    <div class="mb-2">
                        <div class="d-flex align-items-end flex-column mb-2">
                            <x-button-modal></x-button-modal>
                        </div>
                        <div class="table-responsive m-t-40">
                            <table id="config-table" class="table border display table-bordered overflow-x-auto">
                                <thead>
                                    <!-- start row -->
                                    <tr>
                                        <th>No</th>
                                        <th>Permissions</th>
                                        <th>Action</th>
                                    </tr>
                                    <!-- end row -->
                                </thead>
                                <tbody id="table-body">
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <form action="/permissions" method="POST">
                    <x-modal>
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="mb-3">
                                    <label for="permission" class="form-label">Parent Permission Name</label>
                                    <div class="d-flex gap-2">
                                        <input type="name" name="parent_name"
                                            class="form-control  @error('name') is-invalid @enderror" id="permission"
                                            placeholder="please enter permission..." required>

                                    </div>

                                    @error('parent_name')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="permission" class="form-label">Permission Name</label>
                                    <div class="d-flex gap-2">
                                        <input type="name" name="sub_permissions[]"
                                            class="form-control  @error('name') is-invalid @enderror" id="permission"
                                            placeholder="please enter permission..." required>
                                        <button onclick="education_fields();"
                                            class="
                                                    btn rounded 
                                                    btn-success
                                                    font-weight-medium
                                                    waves-effect waves-light
                                                  "
                                            type="button">
                                            <i class="ti ti-circle-plus fs-5"></i>
                                        </button>
                                    </div>
                                    @error('name')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div id="education_fields" class="mb-3"></div>
                    </x-modal>
                </form>


        </section>

        @push('script')
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <script src="{{ asset('js/sweetalert.js') }}"></script>
            <script src="{{ asset('js/ajax/Permission.js') }}"></script>
            <script>
                $Permission = new Permission();
                $Permission.index()
            </script>
            <!-- datatable -->
            <script src="{{ asset('backend') }}/dist/libs/datatables.net/js/jquery.dataTables.min.js"></script>
            <script src="{{ asset('backend') }}/dist/js/datatable/datatable-basic.init.js"></script>
            <script>
                var room = 1;

                function education_fields() {
                    room++;
                    var objTo = document.getElementById("education_fields");
                    var divtest = document.createElement("div");
                    divtest.setAttribute("class", "mb-3 removeclass" + room);
                    var rdiv = "removeclass" + room;
                    divtest.innerHTML =

                        '<label class="form-label">Permission Name</label><div class="d-flex gap-2"> <input type="text" name="sub_permissions[]" id="" class="form-control" placeholder="please enter permission..." required> <button class="btn btn-danger" type="button" onclick="remove_education_fields(' +
                        room + ');"> <i class="ti ti-minus"></i> </button> </div></div>';

                    objTo.appendChild(divtest);
                }

                function remove_education_fields(rid) {
                    $(".removeclass" + rid).remove();
                }
            </script>
        @endpush
        @push('style')
            <!-- --------------------------------------------------- -->
            <!-- Datatable -->
            <!-- --------------------------------------------------- -->
            <link rel="stylesheet" href="{{ asset('backend') }}/dist/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css">
        @endpush
    @endsection
    </div>
