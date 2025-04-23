<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - TechBit</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/framer-motion@7.0.0/dist/framer-motion.min.js"></script>
    <style>
        body {
            background: linear-gradient(to bottom, #1a202c, #2d3748);
            color: #e2e8f0;
            font-family: 'Roboto', sans-serif;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .register-section {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 2rem 1rem;
        }

        .register-card {
            background: #2d3748;
            border-radius: 1rem;
            padding: 2.5rem;
            width: 100%;
            max-width: 420px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.3);
            border: 1px solid rgba(45, 212, 191, 0.2);
            transition: transform 0.3s ease;
        }

        .register-card:hover {
            transform: translateY(-5px);
        }

        .register-title {
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
            position: relative;
            margin-bottom: 1.5rem;
        }

        .form-input {
            background: #4a5568;
            border: 1px solid #718096;
            border-radius: 0.5rem;
            padding: 0.75rem 2.5rem 0.75rem 2.5rem;
            width: 100%;
            color: #e2e8f0;
            transition: border-color 0.2s ease, box-shadow 0.2s ease;
        }

        .form-input:focus {
            border-color: #2dd4bf;
            box-shadow: 0 0 8px rgba(45, 212, 191, 0.3);
            outline: none;
        }

        .form-icon {
            position: absolute;
            top: 50%;
            left: 0.75rem;
            transform: translateY(-50%);
            color: #a0aec0;
            transition: color 0.2s ease;
        }

        .form-input:focus+.form-icon {
            color: #2dd4bf;
        }

        .toggle-password {
            position: absolute;
            top: 50%;
            right: 0.75rem;
            transform: translateY(-50%);
            color: #a0aec0;
            cursor: pointer;
            transition: color 0.2s ease;
        }

        .toggle-password:hover {
            color: #2dd4bf;
        }

        .form-label {
            font-size: 0.875rem;
            font-weight: 500;
            color: #e2e8f0;
            margin-bottom: 0.5rem;
            display: block;
        }

        .error-message {
            color: #f56565;
            font-size: 0.75rem;
            margin-top: 0.25rem;
        }

        .register-button {
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

        .register-button:hover {
            background: #26a69a;
            transform: scale(1.02);
        }

        .action-link {
            color: #2dd4bf;
            font-size: 0.875rem;
            font-weight: 500;
            transition: color 0.2s ease;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .action-link:hover {
            color: #26a69a;
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
            .register-section {
                padding: 1.5rem;
            }

            .register-card {
                padding: 1.5rem;
            }

            .register-title {
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

    <!-- Register Form -->
    <section class="register-section">
        <div class="register-card" data-motion-animate="fadeInUp" data-motion-duration="0.8">
            <h1 class="register-title">Register</h1>

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- Name -->
                <div class="form-group" data-motion-animate="fadeInUp" data-motion-duration="0.8"
                    data-motion-delay="0.1">
                    <x-input-label for="name" :value="__('Name')" class="form-label" />
                    <x-text-input id="name" class="form-input" type="text" name="name" :value="old('name')"
                        required autofocus autocomplete="name" />
                    <i class="form-icon fas fa-user"></i>
                    <x-input-error :messages="$errors->get('name')" class="error-message" />
                </div>

                <!-- Email Address -->
                <div class="form-group" data-motion-animate="fadeInUp" data-motion-duration="0.8"
                    data-motion-delay="0.2">
                    <x-input-label for="email" :value="__('Email')" class="form-label" />
                    <x-text-input id="email" class="form-input" type="email" name="email" :value="old('email')"
                        required autocomplete="username" />
                    <i class="form-icon fas fa-envelope"></i>
                    <x-input-error :messages="$errors->get('email')" class="error-message" />
                </div>

                <!-- Password -->
                <div class="form-group" data-motion-animate="fadeInUp" data-motion-duration="0.8"
                    data-motion-delay="0.3">
                    <x-input-label for="password" :value="__('Password')" class="form-label" />
                    <x-text-input id="password" class="form-input" type="password" name="password" required
                        autocomplete="new-password" />
                    <i class="form-icon fas fa-lock"></i>
                    <i class="toggle-password fas fa-eye" onclick="togglePassword('password')"></i>
                    <x-input-error :messages="$errors->get('password')" class="error-message" />
                </div>

                <!-- Confirm Password -->
                <div class="form-group" data-motion-animate="fadeInUp" data-motion-duration="0.8"
                    data-motion-delay="0.4">
                    <x-input-label for="password_confirmation" :value="__('Confirm Password')" class="form-label" />
                    <x-text-input id="password_confirmation" class="form-input" type="password"
                        name="password_confirmation" required autocomplete="new-password" />
                    <i class="form-icon fas fa-lock"></i>
                    <i class="toggle-password fas fa-eye" onclick="togglePassword('password_confirmation')"></i>
                    <x-input-error :messages="$errors->get('password_confirmation')" class="error-message" />
                </div>

                <div class="flex flex-col items-center space-y-4">
                    <button type="submit" class="register-button" data-motion-animate="fadeInUp"
                        data-motion-duration="0.8" data-motion-delay="0.5">
                        <i class="fas fa-user-plus"></i>
                        {{ __('Register') }}
                    </button>

                    <a class="action-link" href="{{ route('login') }}" data-motion-animate="fadeInUp"
                        data-motion-duration="0.8" data-motion-delay="0.6">
                        <i class="fas fa-sign-in-alt"></i>
                        {{ __('Already registered? Sign in') }}
                    </a>
                </div>
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

    <script>
        // Framer Motion Animation Setup
        document.querySelectorAll('[data-motion-animate]').forEach(element => {
            const animationType = element.getAttribute('data-motion-animate');
            const duration = parseFloat(element.getAttribute('data-motion-duration')) || 0.5;
            const delay = parseFloat(element.getAttribute('data-motion-delay')) || 0;

            if (animationType === 'fadeInUp') {
                element.style.opacity = 0;
                element.style.transform = 'translateY(20px)';
                setTimeout(() => {
                    element.style.transition = `opacity ${duration}s ease, transform ${duration}s ease`;
                    element.style.opacity = 1;
                    element.style.transform = 'translateY(0)';
                }, delay * 1000);
            }
        });

        // Button Hover and Click Animation
        const registerButton = document.querySelector('.register-button');
        registerButton.addEventListener('mouseenter', () => {
            registerButton.style.transform = 'scale(1.05)';
        });
        registerButton.addEventListener('mouseleave', () => {
            registerButton.style.transform = 'scale(1)';
        });
        registerButton.addEventListener('click', () => {
            registerButton.style.transform = 'scale(0.95)';
            setTimeout(() => {
                registerButton.style.transform = 'scale(1)';
            }, 100);
        });

        // Toggle Password Visibility
        function togglePassword(inputId) {
            const passwordInput = document.getElementById(inputId);
            const toggleIcon = passwordInput.nextElementSibling.nextElementSibling;
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                toggleIcon.classList.remove('fa-eye');
                toggleIcon.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                toggleIcon.classList.remove('fa-eye-slash');
                toggleIcon.classList.add('fa-eye');
            }
        }
    </script>
</body>

</html>
