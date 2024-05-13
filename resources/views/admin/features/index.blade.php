<x-admin-layout>

    <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Features</h1>
            </div>
          </div>
        </div>
    </div>
    <!-- /.content-header -->

    <section class="content">
      <div class="container-fluid">
        <div class="card">
            <div class="bg-primary rounded p-3 d-flex align-items-center justify-content-between">
              <h3 class="card-title">DataTable with features</h3>
              <a href="{{route('features.create')}}" class="btn btn-dark">Create Feature</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Title</th>
                  <th>Description</th>
                  <th>Icon</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($features as $fe)
                    <tr>
                        <td>{{$fe->id}}</td>
                        <td>{{$fe->title}}</td>
                        <td class="col-5">{{$fe->description}}</td>
                        <td class="text-center"><span class="fa {{$fe->icon}}" aria-hidden="true"></span></td>
                        <td><div class="dropdown">
                          <button class="btn btn-sm {{$fe->status == 'active' ? 'btn-success' : 'btn-danger' }} dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
                          {{$fe->status}}
                          </button>
                          <div class="dropdown-menu">
                            <a class="dropdown-item" href="{{route('status.change',$fe)}}">{{$fe->status == 'active' ? 'deactive': 'active'}}</a>
                          </div>
                        </div></td>
                        <td class="d-flex justify-content-around">
                            <a href="{{route('features.edit',$fe)}}" class="btn btn-sm btn-primary">Edit</a>
                            <a href="{{route('features.show',$fe)}}" class="btn btn-sm btn-warning">View</a>
                            <form onsubmit="return confirm('Are you sure? ')" action="{{route('features.destroy',$fe)}}" method="POST">
                              @csrf
                              @method('DELETE')
                              <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tfoot>
              </table>
              <div class="py-3">
                {{$features->links('pagination::bootstrap-5')}}
              </div>
            </div>
            <!-- /.card-body -->
          </div>
      </div>
    </section>
</x-admin-layout>