<x-admin-layout>
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Features</h1>
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
                <h3 class="card-title">Create Features</h3>
                <a href="{{route('features.index')}}" class="btn btn-dark">All Features</a>
              </div>

              <form action="{{route('features.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control  @error('title') is-invalid @enderror" name="title" id="title" placeholder="Enter your title...">
                  </div>
                  @error('title')
                      <p class="text-danger">{{$message}}</p>
                  @enderror
                  <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description" cols="10" rows="4"></textarea>
                  </div>
                  @error('description')
                        <p class="text-danger">{{$message}}</p>
                  @enderror
                  <div class="form-group">
                      <label for="title">Icon Name</label>
                      <input type="text" class="form-control  @error('icon') is-invalid @enderror" name="icon" id="icon" placeholder="Enter your icon name...">
                    </div>
                    @error('icon')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                  </div>
                </div>

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
        </div>
      </div>
    </section>
</x-admin-layout>