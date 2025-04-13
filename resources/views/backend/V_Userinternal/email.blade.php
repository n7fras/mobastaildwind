<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Internal User Information</title>
    <!-- Add Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEJp3U6t7vJ5VWzS1s9rA3z8wD1j03e5lPzZ37IpD6QExl3JkCstE6BCaZBzXg" crossorigin="anonymous">
</head>
<body>

    <div class="container mt-5">
        <h1 class="mb-4">Login to Mobas</h1>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">User Details</h5>
                <ul class="list-group">
                    <li class="list-group-item"><strong>Email:</strong> {{ $user['email'] }}</li>
                    <li class="list-group-item"><strong>Role:</strong> {{ $user['role'] }}</li>
                    <li class="list-group-item"><strong>Password:</strong> {{ $password['password'] }}</li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Add Bootstrap JS (optional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kuh3eWmSGL1vxwHvxjFmjfV2lF4l9w6C1HCU+XzvGJ5t9CK9kSNF0U8C6u2R40B" crossorigin="anonymous"></script>

</body>
</html>
