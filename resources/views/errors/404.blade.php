<!-- filepath: d:\Github\myBlog\resources\views\errors\404.blade.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>404 - Page Not Found | TechBit</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #0d1b2a, #1b263b);
            color: #e2e8f0;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
        }

        .glow {
            text-shadow: 0 0 20px #00b7ff, 0 0 40px #ff00ff, 0 0 60px #00b7ff;
        }

        .neon-btn {
            background: linear-gradient(to right, #00b7ff, #ff00ff);
            color: #fff;
            padding: 0.75rem 2rem;
            border-radius: 9999px;
            font-weight: bold;
            font-size: 1.1rem;
            box-shadow: 0 0 20px #00b7ff80, 0 0 40px #ff00ff40;
            transition: transform 0.2s, box-shadow 0.2s;
            text-decoration: none;
            display: inline-block;
            margin-top: 2rem;
        }

        .neon-btn:hover {
            transform: scale(1.05);
            box-shadow: 0 0 40px #00b7ff, 0 0 80px #ff00ff;
            background: linear-gradient(to right, #ff00ff, #00b7ff);
        }

        .particles {
            position: fixed;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
            z-index: -1;
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/particles.js@2.0.0/particles.min.js"></script>
</head>

<body>
    <div id="particles-js" class="particles"></div>
    <div class="text-center">
        <h1 class="mb-4 font-extrabold text-8xl glow">404</h1>
        <h2 class="mb-2 text-3xl font-bold glow">Page Not Found</h2>
        <p class="mb-6 text-lg text-gray-300">Oops! The page you are looking for does not exist or has been moved.</p>
        <a href="{{ url('/') }}" class="neon-btn">Go Home</a>
    </div>
    <script>
        particlesJS('particles-js', {
            "particles": {
                "number": {
                    "value": 60,
                    "density": {
                        "enable": true,
                        "value_area": 800
                    }
                },
                "color": {
                    "value": ["#00b7ff", "#ff00ff", "#fff"]
                },
                "shape": {
                    "type": "circle"
                },
                "opacity": {
                    "value": 0.5,
                    "random": true
                },
                "size": {
                    "value": 4,
                    "random": true
                },
                "line_linked": {
                    "enable": true,
                    "distance": 150,
                    "color": "#00b7ff",
                    "opacity": 0.3,
                    "width": 1
                },
                "move": {
                    "enable": true,
                    "speed": 2,
                    "direction": "none",
                    "random": false,
                    "straight": false,
                    "out_mode": "out"
                }
            },
            "interactivity": {
                "detect_on": "canvas",
                "events": {
                    "onhover": {
                        "enable": true,
                        "mode": "repulse"
                    },
                    "onclick": {
                        "enable": true,
                        "mode": "push"
                    }
                },
                "modes": {
                    "repulse": {
                        "distance": 100,
                        "duration": 0.4
                    },
                    "push": {
                        "particles_nb": 4
                    }
                }
            },
            "retina_detect": true
        });
    </script>
</body>

</html>
