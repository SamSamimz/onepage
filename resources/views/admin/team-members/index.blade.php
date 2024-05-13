<x-admin-layout>

    <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Team Members</h1>
            </div>
          </div>
        </div>
    </div>
    <!-- /.content-header -->

    <section class="content">
      <div class="container-fluid">
        <div class="card">
            <div class="bg-primary rounded p-3 d-flex align-items-center justify-content-between">
              <h3 class="card-title">DataTable with team-members</h3>
              <a href="{{route('team-members.create')}}" class="btn btn-dark">Create Team Member</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table text-center table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Title</th>
                  <th>Image</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($members as $index => $member)
                    <tr>
                        <td>{{++$index}}</td>
                        <td>{{$member->name}}</td>
                        <td>{{$member->title}}</td>
                        <td class="text-center">
                            <img width="70" height="65" class="rounded" src="{{asset('storage/members/'.$member->image)}}" alt="IMG">
                        </td>
                        <td><div class="dropdown">
                          <button class="btn btn-sm {{$member->status == 'vissible' ? 'btn-success' : 'btn-danger' }} dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
                          {{$member->status}}
                          </button>
                          <div class="dropdown-menu">
                            <a class="dropdown-item" href="{{route('member.status.change',$member)}}">{{$member->status == 'vissible' ? 'hidden': 'vissible'}}</a>
                          </div>
                        </div></td>
                        <td class="d-flex align-items-center justify-content-center">
                            <a href="{{route('team-members.edit',$member)}}" class="btn btn-sm btn-primary mr-1">Edit</a>
                            <a href="{{route('team-members.show',$member)}}" class="btn btn-sm btn-warning mr-1">View</a>
                            <form onsubmit="return confirm('Are you sure? ')" action="{{route('team-members.destroy',$member)}}" method="POST">
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
                {{$members->links('pagination::bootstrap-5')}}
              </div>
            </div>
            <!-- /.card-body -->
          </div>
      </div>
    </section>
</x-admin-layout>