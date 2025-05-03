<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify Email - TechBit</title>
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

        .verify-section {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 2rem 1rem;
        }

        .verify-card {
            background: #2d3748;
            border-radius: 1rem;
            padding: 2.5rem;
            width: 100%;
            max-width: 420px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.3);
            border: 1px solid rgba(45, 212, 191, 0.2);
            transition: transform 0.3s ease;
        }

        .verify-card:hover {
            transform: translateY(-5px);
        }

        .verify-title {
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

        .info-message {
            font-size: 0.95rem;
            color: #a0aec0;
            margin-bottom: 1.5rem;
            text-align: center;
        }

        .session-status {
            background: rgba(45, 212, 191, 0.1);
            color: #e2e8f0;
            padding: 0.75rem;
            border-radius: 0.5rem;
            margin-bottom: 1rem;
            text-align: center;
            font-size: 0.875rem;
        }

        .verify-button {
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

        .verify-button:hover {
            background: #26a69a;
            transform: scale(1.02);
        }

        .logout-link {
            display: block;
            margin-top: 1.5rem;
            text-align: center;
            color: #e2e8f0;
            font-size: 0.95rem;
            text-decoration: underline;
            transition: color 0.2s;
        }

        .logout-link:hover {
            color: #2dd4bf;
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
            .verify-section {
                padding: 1.5rem;
            }

            .verify-card {
                padding: 1.5rem;
            }

            .verify-title {
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

    <!-- Verify Email Card -->
    <section class="verify-section">
        <div class="verify-card">
            <h1 class="verify-title">Verify Your Email</h1>

            <div class="info-message">
                {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
            </div>

            @if (session('status') == 'verification-link-sent')
                <div class="session-status">
                    {{ __('A new verification link has been sent to the email address you provided during registration.') }}
                </div>
            @endif

            <form method="POST" action="{{ route('verification.send') }}">
                @csrf
                <button type="submit" class="verify-button">
                    <i class="fas fa-envelope"></i>
                    {{ __('Resend Verification Email') }}
                </button>
            </form>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="logout-link">
                    <i class="fas fa-sign-out-alt"></i>
                    {{ __('Log Out') }}
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
