<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, poppins, sans-serif;
            background: #708993;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 20px;
        }

        .login-container {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 24px;
            padding: 50px 40px;
            width: 100%;
            max-width: 420px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #6b8a99;
            font-size: 32px;
            font-weight: 400;
            text-align: center;
            margin-bottom: 40px;
            letter-spacing: 0.5px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            color: #8b9da8;
            font-size: 11px;
            font-weight: 500;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 8px;
            padding-left: 4px;
        }

        .input-wrapper {
            position: relative;
        }

        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 16px 20px;
            border: none;
            background: #f5f8f9;
            border-radius: 12px;
            font-size: 15px;
            color: #333;
            transition: all 0.3s ease;
        }

        input[type="email"]:focus,
        input[type="password"]:focus {
            outline: none;
            background: #edf2f4;
            box-shadow: 0 0 0 2px rgba(107, 138, 153, 0.2);
        }

        input::placeholder {
            color: #b5c4cc;
        }

        .toggle-password {
            position: absolute;
            right: 16px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            color: #b5c4cc;
            cursor: pointer;
            font-size: 18px;
            padding: 4px;
        }

        .toggle-password:hover {
            color: #6b8a99;
        }

        .checkbox-group {
            display: flex;
            align-items: center;
            margin: 20px 0;
        }

        input[type="checkbox"] {
            width: 18px;
            height: 18px;
            margin-right: 10px;
            cursor: pointer;
            accent-color: #6b8a99;
        }

        .checkbox-label {
            color: #8b9da8;
            font-size: 14px;
            cursor: pointer;
            user-select: none;
        }

        .login-button {
            width: 100%;
            padding: 16px;
            background: #6b8a99;
            color: white;
            border: none;
            border-radius: 12px;
            font-size: 16px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-top: 10px;
        }

        .login-button:hover {
            background: #5a7786;
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(107, 138, 153, 0.3);
        }

        .login-button:active {
            transform: translateY(0);
        }

        .signup-section {
            text-align: center;
            margin: 25px 0;
            color: #8b9da8;
            font-size: 14px;
        }

        .signup-link {
            color: #6b8a99;
            text-decoration: none;
            font-weight: 500;
            padding: 8px 16px;
            border: 1px solid #d5e5e8;
            border-radius: 8px;
            margin-left: 8px;
            display: inline-block;
            transition: all 0.3s ease;
        }

        .signup-link:hover {
            background: #f5f8f9;
            border-color: #6b8a99;
        }

        .divider {
            text-align: center;
            margin: 25px 0;
            position: relative;
        }

        .divider::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 0;
            right: 0;
            height: 1px;
            background: #e0e8eb;
        }

        .google-button {
            width: 100%;
            padding: 14px;
            background: white;
            border: 1px solid #dfe6e9;
            border-radius: 12px;
            font-size: 15px;
            font-weight: 500;
            color: #5f6368;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 12px;
            transition: all 0.3s ease;
        }

        .google-button:hover {
            background: #f8fafb;
            border-color: #c5cdd1;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
        }

        .google-icon {
            width: 20px;
            height: 20px;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h1>LOG IN</h1>
        
        <form id="loginForm">
            <div class="form-group">
                <label for="email">EMAIL</label>
                <input 
                    type="email" 
                    id="email" 
                    placeholder="example@example.com"
                    required
                >
            </div>

            <div class="form-group">
                <label for="password">KATA SANDI</label>
                <div class="input-wrapper">
                    <input 
                        type="password" 
                        id="password" 
                        placeholder="••••••••••"
                        required
                    >
                    <button type="button" class="toggle-password" onclick="togglePassword()">
                        see
                    </button>
                </div>
            </div>

            <div class="checkbox-group">
                <input type="checkbox" id="remember" name="remember">
                <label for="remember" class="checkbox-label">Ingat</label>
            </div>

            <button type="submit" class="login-button">Login</button>
        </form>

        <div class="signup-section">
            Belum Punya Akun?
            <a href="{{ route('sign.signup') }}" class="signup-link">Sign Up</a>
        </div>

        <button class="google-button" onclick="loginWithGoogle()">
            <svg class="google-icon" viewBox="0 0 24 24">
                <path fill="#4285F4" d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z"/>
                <path fill="#34A853" d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z"/>
                <path fill="#FBBC05" d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z"/>
                <path fill="#EA4335" d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z"/>
            </svg>
            Masuk dengan Google
        </button>
    </div>

    <script>
        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const toggleBtn = document.querySelector('.toggle-password');
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                toggleBtn.textContent = '👁️';
            } else {
                passwordInput.type = 'password';
                toggleBtn.textContent = '👁️';
            }
        }

        document.getElementById('loginForm').addEventListener('submit', function(e) {
            e.preventDefault();
            const email = document.getElementById('email').value;
            const password = document.getElementById('password').value;
            
            console.log('Login attempt:', { email, password });
            alert('Login berhasil! (Demo)');
        });

        function loginWithGoogle() {
            console.log('Google login clicked');
            alert('Fitur Google login akan diimplementasikan');
        }
    </script>
</body>
</html>