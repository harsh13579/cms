<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Outing History</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <!-- <link rel="stylesheet" href="assets/css/main.css"> -->
    <link rel="stylesheet" href="assets/css/SecurityOutingHistory.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid custom-navbar">
          <img class="logo" src="assets/images/logo.webp" alt="logo">
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav custom-nav-items">
              <li class="nav-item">
                <a class="nav-link profile-btn" id="profile"><i class="bi bi-person-fill custom-icon"></i></a>
              </li>
              <li class="nav-item">
                <a class="nav-link logout-btn" id="logout">Logout</a>
              </li>
            </ul>
          </div>
        </div>
    </nav>
    <div class="outing-container">
        <div class="header">
            <h1 class="heading font">
                {{$Name}}
            </h1>
        </div>
        <br>
        <div class="content">
            <table>
                <thead>
                    <tr>
                        <th>Roll No</th>
                        <th>Out Date and Time</th>
                        <th>In Date and Time</th>
                        <th>Name</th>
                        <th>Phone No</th>
                        <th>E-Mail</th>
                        <th>Year</th>
                        <th>Gender</th>
                        <th>Hostel</th>
                        <th>Room No</th>
                        <th>Security</th>
                        <th>Gate</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($OutingHistory as $outing)
                    <tr class="{{$outing->gender == 'Male'? 'MaleRow' : 'FemaleRow'}}">
                        <td>{{$outing->rollno}}</td>
                        <td>{{date('d/m/Y h:i a',strtotime($outing->outtime))}}</td>
                        <td>{{$outing->intime== NULL?NULL: date('d/m/Y h:i a',strtotime($outing->intime))}}</td>
                        <td>{{$outing->name}}</td>
                        <td>{{$outing->phoneno}}</td>
                        <td>{{$outing->email}}</td>
                        <td>{{$outing->year}}</td>
                        <td>{{$outing->gender}}</td>
                        <td>{{$outing->hostel}}</td>
                        <td>{{$outing->roomno}}</td>
                        <td>{{$outing->security}}</td>
                        <td>{{$outing->gate}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <script>
        document.getElementById('logout').addEventListener('click', function() {
        // Make an AJAX request to trigger the Logout function
            fetch('/SecurityLogout').then(response => {
                    if(response.ok) 
                    {
                        // If logout successful, redirect to home page
                        window.location.reload();
                        window.location.href = '/';
                    } 
                    else 
                    {
                        // If logout failed, handle error
                        console.error('Logout failed');
                    }
            })
            .catch(error => {
                console.error('Error during logout:', error);
            });
        });
    </script>
</body>
</html>