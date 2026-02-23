<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - College Management System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
        }
        .login-container {
            max-width: 450px;
            width: 100%;
            margin: 0 auto;
        }
        .login-card {
            background: white;
            border-radius: 15px;
            box-shadow: 0 15px 35px rgba(0,0,0,0.1);
            overflow: hidden;
            border: none;
        }
        .login-header {
            background: linear-gradient(135deg, #1a237e 0%, #283593 100%);
            color: white;
            text-align: center;
            padding: 30px 20px;
        }
        .login-icon {
            font-size: 48px;
            margin-bottom: 15px;
        }
        .login-body {
            padding: 40px;
        }
        .form-control {
            border-radius: 8px;
            padding: 12px 15px;
            border: 2px solid #e9ecef;
            transition: border-color 0.3s ease;
        }
        .form-control:focus {
            border-color: #1a237e;
            box-shadow: 0 0 0 0.2rem rgba(26, 35, 126, 0.25);
        }
        .btn-login {
            background: linear-gradient(135deg, #1a237e 0%, #283593 100%);
            border: none;
            border-radius: 8px;
            padding: 12px;
            font-weight: 500;
            font-size: 16px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(26, 35, 126, 0.4);
        }
        .form-check-input:checked {
            background-color: #1a237e;
            border-color: #1a237e;
        }
        .login-footer {
            text-align: center;
            padding: 20px;
            background-color: #f8f9fa;
            border-top: 1px solid #e9ecef;
        }
        .material-icons {
            vertical-align: middle;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="login-card">
            <div class="login-header">
                <i class="material-icons login-icon">account_circle</i>
                <h3>Admin Portal</h3>
                <p class="mb-0">Sign in to your account</p>
            </div>
            <div class="login-body">
                @if(session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <i class="material-icons">error_outline</i> {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                
                @if($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <i class="material-icons">error_outline</i>
                        <ul class="mb-0 ps-3">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">
                            <i class="material-icons">email</i> Email Address
                        </label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required autofocus>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">
                            <i class="material-icons">lock</i> Password
                        </label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="remember" name="remember">
                        <label class="form-check-label" for="remember">
                            <i class="material-icons">check_box</i> Remember me
                        </label>
                    </div>
                    <button type="submit" class="btn btn-primary btn-login w-100">
                        <i class="material-icons">login</i> Sign In
                    </button>
                </form>
            </div>
            <div class="login-footer">
                <p class="mb-0 text-muted">
                    <i class="material-icons">info</i> Demo Credentials: admin@admin.com / password
                </p>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>