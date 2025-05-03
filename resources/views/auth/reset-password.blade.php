<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password - TechBit</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            background: linear-gradient(to bottom, #1a202c, #2d3748);
            color: #e2e8f0;
            font-family: 'Roboto', sans-serif;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .reset-section {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 2rem 1rem;
        }

        .reset-card {
            background: #2d3748;
            border-radius: 1rem;
            padding: 2.5rem;
            width: 100%;
            max-width: 420px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.3);
            border: 1px solid rgba(45, 212, 191, 0.2);
            transition: transform 0.3s ease;
        }

        .reset-card:hover {
            transform: translateY(-5px);
        }

        .reset-title {
            font-size: 1.75rem;
            font-weight: 700;
            color: #e2e8f0;
            text-align: center;
            margin-bottom: 1.5rem;
        }

        .logo {
            font-size: 2.5rem;
            font-weight: 700;
            color: #2dd4bf;
            text-align: center;
            display: block;
            margin-bottom: 1rem;
            text-shadow: 0 0 10px rgba(45, 212, 191, 0.4);
        }

        .form-group {
            margin-bottom: 1.25rem;
        }

        .form-label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 500;
            color: #e2e8f0;
        }

        .form-input {
            width: 100%;
            padding: 0.75rem;
            border-radius: 0.5rem;
            border: 1px solid #4fd1c5;
            background: #1a202c;
            color: #e2e8f0;
            font-size: 1rem;
            outline: none;
            transition: border 0.2s;
        }

        .form-input:focus {
            border-color: #2dd4bf;
        }

        .error-message {
            color: #f87171;
            font-size: 0.875rem;
            margin-top: 0.25rem;
        }

        .reset-button {
            background: #2dd4bf;
            color: #1a202c;
            padding: 0.75rem;
            border-radius: 0.5rem;
            font-weight: 600;
            text-transform: uppercase;
            border: none;
            width: 100%;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            transition: background 0.2s ease, transform 0.2s ease;
        }

        .reset-button:hover {
            background: #26a69a;
            transform: scale(1.02);
        }

        .footer {
            background: #1a202c;
            color: #e2e8f0;
            padding: 2rem 1rem;
            text-align: center;
        }

        .footer-link {
            color: #e2e8f0;
            font-size: 0.875rem;
            font-weight: 500;
            transition: color 0.2s ease;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            margin: 0 1rem;
        }

        .footer-link:hover {
            color: #2dd4bf;
        }

        @media (max-width: 768px) {
            .reset-section {
                padding: 1.5rem;
            }

            .reset-card {
                padding: 1.5rem;
            }

            .reset-title {
                font-size: 1.5rem;
            }

            .logo {
                font-size: 2rem;
            }
        }
    </style>
</head>

<body>
    <!-- Logo Section -->
    <div class="pt-8">
        <a href="/" class="logo">TechBit</a>
    </div>

    <!-- Reset Password Card -->
    <section class="reset-section">
        <div class="reset-card">
            <h1 class="reset-title">Reset Password</h1>
            <form method="POST" action="{{ route('password.store') }}">
                @csrf
                <input type="hidden" name="token" value="{{ $request->route('token') }}">

                <div class="form-group">
                    <label for="email" class="form-label">{{ __('Email') }}</label>
                    <input id="email" class="form-input" type="email" name="email"
                        value="{{ old('email', $request->email) }}" required autofocus autocomplete="username" />
                    @if ($errors->has('email'))
                        <div class="error-message">{{ $errors->first('email') }}</div>
                    @endif
                </div>

                <div class="form-group">
                    <label for="password" class="form-label">{{ __('Password') }}</label>
                    <input id="password" class="form-input" type="password" name="password" required
                        autocomplete="new-password" />
                    @if ($errors->has('password'))
                        <div class="error-message">{{ $errors->first('password') }}</div>
                    @endif
                </div>

                <div class="form-group">
                    <label for="password_confirmation" class="form-label">{{ __('Confirm Password') }}</label>
                    <input id="password_confirmation" class="form-input" type="password" name="password_confirmation"
                        required autocomplete="new-password" />
                    @if ($errors->has('password_confirmation'))
                        <div class="error-message">{{ $errors->first('password_confirmation') }}</div>
                    @endif
                </div>

                <button type="submit" class="reset-button">
                    <i class="fas fa-key"></i>
                    {{ __('Reset Password') }}
                </button>
            </form>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="container px-4 mx-auto">
            <p class="mb-2 text-sm">© 2025 TechBit. All rights reserved.</p>
            <div class="flex justify-center space-x-6">
                <a href="/privacy" class="footer-link">
                    <i class="fas fa-shield-alt"></i>
                    Privacy Policy
                </a>
                <a href="/terms" class="footer-link">
                    <i class="fas fa-file-contract"></i>
                    Terms of Service
                </a>
            </div>
        </div>
    </footer>
</body>

</html>
