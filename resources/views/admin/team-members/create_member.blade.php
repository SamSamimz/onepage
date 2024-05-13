<x-admin-layout>
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Team Members</h1>
          </div>
        </div>
      </div>
  </div>

  <section class="content">
    <div class="container-fluid">
      <div class="row">

        <div class="col-md-10 mx-auto">
          
          <div class="card card-primary">
            <div class="bg-primary rounded p-3 d-flex align-items-center justify-content-between">
              <h3 class="card-title">Create Team Member</h3>
              <a href="{{route('team-members.index')}}" class="btn btn-dark">All Members</a>
            </div>

            <form action="{{route('team-members.store')}}" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="card-body">
                <div class="form-group">
                  <label for="name">Name</label>
                  <input type="text" class="form-control  @error('name') is-invalid @enderror" name="name" id="name" placeholder="Enter Name...">
                </div>
                @error('name')
                    <p class="text-danger">{{$message}}</p>
                @enderror
                <div class="form-group">
                  <label for="title">Title</label>
                  <input type="text" class="form-control  @error('title') is-invalid @enderror" name="title" id="title" placeholder="Enter your title...">
                </div>
                @error('title')
                    <p class="text-danger">{{$message}}</p>
                @enderror
                <div class="form-group">
                    <label for="image">Image</label>
                    <input type="file" class="form-control  @error('image') is-invalid @enderror" name="image" id="image">
                  </div>
                  @error('image')
                      <p class="text-danger">{{$message}}</p>
                  @enderror
                </div>
              </div>

              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Save</button>
              </div>
            </form>
          </div>
      </div>
    </div>
  </section>
</x-admin-layout>