<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" defer></script>
</head>
<body>
    <div class="container my-4">
        <h1>Admin Panel</h1>

        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">No.</th>
                    <th scope="col">Name</th>
                    <th scope="col">E-mail</th>
                    <th scope="col">Address</th>
                    <th scope="col">MobileNumber</th>
                    <th scope="col">Gender</th>
                    <th scope="col">is_Admin</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                   @foreach ( $usersdetail as $user )
                        <tr>
                           <td scope="row">{{$user->user_id}}</td> 
                           <td>{{$user->name}}</td> 
                           <td>{{$user->email}}</td> 
                           <td>{{ Str::limit($user->address, 25, '...')}}</td> 
                           <td>{{$user->number}}</td> 
                           <td>{{$user->gender}}</td> 
                           <td>
                               @if ($user->admin === 1)
                               <span class="badge badge-pill bg-primary badge-primary">Yes</span>
                               @else
                               <span class="badge badge-secondary bg-secondary">No</span>
                               @endif
                           </td>
                           <td>
                            <a class="btn btn-success btn-sm">View</a>
                            <a class="btn btn-primary btn-sm">Update</a>
                            <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-danger btn-sm">Delete</button>    
                           </td>
                        </tr>                       
                   @endforeach
              
            </tbody>
        </table>

        <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Delete User</h5>
        </div>
        <div class="modal-body">
          Are You want to Sure Delete this User
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Cancel</button>
          <button type="button" class="btn btn-danger btn-sm">Delete</button>
        </div>
      </div>
    </div>
  </div>
    </div>
    
</body>
</html>