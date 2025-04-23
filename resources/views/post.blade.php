<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $post->title }} - TechBit</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.5/gsap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/particles.js@2.0.0/particles.min.js"></script>
    <style>
        body { 
            background: linear-gradient(135deg, #0d1b2a, #1b263b); 
            color: #e2e8f0; 
            overflow-x: hidden; 
        }
        #particles-js { 
            position: fixed; 
            top: 0; 
            left: 0; 
            width: 100%; 
            height: 100%; 
            z-index: -1; 
        }
        .post-section { 
            padding: 60px 0; 
            max-width: 1200px; 
            margin: 0 auto; 
        }
        .post-image { 
            width: 100%; 
            height: 400px; 
            object-fit: cover; 
            border-radius: 12px; 
            border: 3px solid transparent; 
            background: linear-gradient(to right, #00b7ff, #ff00ff) border-box; 
            box-shadow: 0 0 25px rgba(0, 183, 255, 0.7); 
            margin-bottom: 2rem; 
        }
        .post-title { 
            font-size: 2.5rem; 
            font-weight: bold; 
            color: #fff; 
            text-shadow: 0 0 8px rgba(0, 183, 255, 0.8); 
            margin-bottom: 1rem; 
        }
        .post-meta { 
            display: flex; 
            flex-wrap: wrap; 
            gap: 1rem; 
            margin-bottom: 2rem; 
            font-size: 0.875rem; 
            color: #94a3b8; 
        }
        .category-tag { 
            background: linear-gradient(to right, #00b7ff, #ff00ff); 
            color: white; 
            padding: 0.25rem 0.75rem; 
            border-radius: 9999px; 
            font-size: 0.75rem; 
            text-transform: uppercase; 
        }
        .post-content { 
            line-height: 1.8; 
            color: #e2e8f0; 
        }
        .post-content h2 { 
            font-size: 1.5rem; 
            font-weight: bold; 
            color: #fff; 
            margin-top: 2rem; 
            margin-bottom: 1rem; 
        }
        .post-content p { 
            margin-bottom: 1.5rem; 
        }
        .nav-link { 
            position: relative; 
            text-transform: uppercase; 
            font-weight: 500; 
        }
        .nav-link::after { 
            content: ''; 
            position: absolute; 
            bottom: -2px; 
            left: 0; 
            width: 0; 
            height: 2px; 
            background: #00b7ff; 
            transition: width 0.3s ease; 
        }
        .nav-link:hover::after { 
            width: 100%; 
        }
        .category-link { 
            transition: color 0.3s ease, transform 0.3s ease; 
            font-weight: 600; 
        }
        .category-link:hover { 
            color: #00b7ff; 
            transform: scale(1.05); 
        }
        .logo { 
            text-shadow: 0 0 10px rgba(0, 183, 255, 0.8), 0 0 20px rgba(0, 183, 255, 0.5); 
        }
        .sidebar { 
            background: rgba(30, 41, 59, 0.9); 
            border-radius: 12px; 
            padding: 1.5rem; 
            box-shadow: 0 0 15px rgba(0, 183, 255, 0.3); 
            border: 1px solid #00b7ff; 
        }
        .sidebar-title { 
            font-size: 1.25rem; 
            font-weight: bold; 
            color: #fff; 
            text-shadow: 0 0 5px rgba(0, 183, 255, 0.8); 
            margin-bottom: 1rem; 
        }
        .related-post { 
            display: flex; 
            align-items: center; 
            padding: 0.75rem; 
            margin-bottom: 0.5rem; 
            border-radius: 8px; 
            transition: background 0.3s ease, transform 0.3s ease; 
            color: #e2e8f0; 
            font-size: 0.9rem; 
        }
        .related-post:hover { 
            background: linear-gradient(to right, rgba(0, 183, 255, 0.2), rgba(255, 0, 255, 0.2)); 
            transform: translateX(5px); 
            color: #fff; 
        }
        .related-post img { 
            width: 60px; 
            height: 60px; 
            object-fit: cover; 
            border-radius: 8px; 
            border: 2px solid transparent; 
            background: linear-gradient(to right, #00b7ff, #ff00ff) border-box; 
            box-shadow: 0 0 10px rgba(0, 183, 255, 0.5); 
            margin-right: 1rem; 
            transition: transform 0.3s ease, box-shadow 0.3s ease; 
        }
        .related-post:hover img { 
            transform: scale(1.1); 
            box-shadow: 0 0 15px rgba(0, 183, 255, 0.8); 
        }
        .related-post-text { 
            flex: 1; 
            transition: color 0.3s ease, transform 0.3s ease; 
        }
        .related-post:hover .related-post-text { 
            color: #00b7ff; 
            transform: translateX(3px); 
        }
        .related-post-text span { 
            color: #94a3b8; 
            font-size: 0.8rem; 
            transition: color 0.3s ease; 
        }
        .related-post:hover .related-post-text span { 
            color: #e2e8f0; 
        }
        @media (max-width: 1024px) { 
            .post-section { 
                padding: 40px 1rem; 
            } 
            .post-image { 
                height: 300px; 
            } 
            .post-title { 
                font-size: 2rem; 
            }
            .content-area { 
                flex-direction: column; 
            }
            .sidebar { 
                margin-top: 2rem; 
                max-width: 800px; 
            }
        }
    </style>
</head>
<body class="font-sans antialiased">
    <!-- Particles Background -->
    <div id="particles-js"></div>

    <!-- Top Menu: Login and Register -->
    <div class="bg-gray-900 py-4 relative z-20">
        <div class="container mx-auto px-4 flex justify-end space-x-6">
            <a href="/login" class="nav-link text-gray-300 hover:text-white text-sm">Login</a>
            <a href="/register" class="nav-link text-gray-300 hover:text-white text-sm">Register</a>
        </div>
    </div>

    <!-- Logo Section -->
    <div class="bg-gray-800 py-8 text-center relative z-20">
        <a href="/" class="logo text-5xl font-extrabold text-cyan-400">TechBit</a>
    </div>

    <!-- Category Menu Bar -->
    <nav class="bg-gray-900 shadow-lg relative z-20">
        <div class="container mx-auto px-4 py-4">
            <div class="flex justify-center space-x-10">
                @foreach ($categories as $category)
                    <a href="/category/{{ $category->name }}" class="category-link text-gray-300 text-lg">{{ $category->name }}</a>
                @endforeach
            </div>
        </div>
    </nav>

    <!-- Post Content and Sidebar -->
    <section class="post-section container mx-auto px-4 relative z-10">
        <div class="content-area flex flex-row gap-8">
            <!-- Main Post Content -->
            <div class="main-content flex-1 max-w-800">
                <h1 class="post-title">{{ $post->title }}</h1>
                <img src="{{ $post->image }}" alt="{{ $post->title }}" class="post-image">
                <div class="post-meta">
                    <span class="category-tag">{{ $post->category->name }}</span>
                    <span>Posted on {{ $post->published_at->format('F j, Y') }}</span>
                    <span>by {{ $post->user->name }}</span>
                    <span>{{ $post->views }} Views</span>
                </div>
                <div class="post-content">
                    {!! $post->content !!}
                </div>
            </div>
            <!-- Sidebar with Related Posts -->
            <aside class="sidebar w-80">
                <h2 class="sidebar-title">Top Posts in {{ $post->category->name }}</h2>
                @foreach ($relatedPosts as $related)
                    <a href="/post/{{ $related->slug }}" class="related-post">
                        <img src="{{ $related->image }}" alt="{{ $related->title }}" class="related-post-img">
                        <div class="related-post-text">
                            <div>{{ $related->title }}</div>
                            <span>{{ $related->views }} Views</span>
                        </div>
                    </a>
                @endforeach
            </aside>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-900 py-12 relative z-10">
        <div class="container mx-auto px-4 text-center">
            <p class="text-gray-400">© 2025 TechBit. All rights reserved.</p>
            <div class="mt-4 space-x-6">
                <a href="/privacy" class="text-gray-400 hover:text-cyan-400">Privacy Policy</a>
                <a href="/terms" class="text-gray-400 hover:text-cyan-400">Terms of Service</a>
            </div>
        </div>
    </footer>

    <script>
        // Particles.js Configuration
        particlesJS('particles-js', {
            particles: {
                number: { value: 80, density: { enable: true, value_area: 800 } },
                color: { value: '#00b7ff' },
                shape: { type: 'circle' },
                opacity: { value: 0.5, random: true },
                size: { value: 3, random: true },
                line_linked: { enable: true, distance: 150, color: '#00b7ff', opacity: 0.4, width: 1 },
                move: { enable: true, speed: 2, direction: 'none', random: false, straight: false, out_mode: 'out', bounce: false }
            },
            interactivity: {
                detect_on: 'canvas',
                events: { onhover: { enable: true, mode: 'repulse' }, onclick: { enable: true, mode: 'push' }, resize: true },
                modes: { repulse: { distance: 100, duration: 0.4 }, push: { particles_nb: 4 } }
            },
            retina_detect: true
        });

        // GSAP Animations
        gsap.from('.logo', {
            opacity: 0,
            y: -50,
            duration: 1.2,
            ease: 'power3.out'
        });

        gsap.from('.category-link', {
            opacity: 0,
            x: -30,
            duration: 0.8,
            stagger: 0.1,
            ease: 'power2.out',
            delay: 0.5
        });

        gsap.from('.main-content', {
            opacity: 0,
            y: 50,
            duration: 1.5,
            ease: 'power3.out',
            delay: 0.3
        });

        gsap.from('.sidebar', {
            opacity: 0,
            x: 100,
            rotation: 5,
            duration: 1.2,
            ease: 'power3.out',
            delay: 0.5
        });

        gsap.from('.sidebar-title', {
            opacity: 0,
            y: -20,
            duration: 0.8,
            ease: 'power2.out',
            delay: 0.7
        });

        gsap.from('.related-post', {
            opacity: 0,
            y: 30,
            duration: 0.8,
            stagger: 0.15,
            ease: 'power2.out',
            delay: 0.9
        });

        gsap.from('.related-post-img', {
            opacity: 0,
            scale: 0.7,
            duration: 0.8,
            stagger: 0.15,
            ease: 'elastic.out(1, 0.5)',
            delay: 1.0
        });

        // Hover animations for related posts
        document.querySelectorAll('.related-post').forEach(post => {
            post.addEventListener('mouseenter', () => {
                gsap.to(post.querySelector('.related-post-img'), {
                    scale: 1.15,
                    boxShadow: '0 0 20px rgba(0, 183, 255, 1)',
                    duration: 0.3,
                    ease: 'power2.out'
                });
                gsap.to(post.querySelector('.related-post-text'), {
                    x: 5,
                    color: '#00b7ff',
                    duration: 0.3,
                    ease: 'power2.out'
                });
            });
            post.addEventListener('mouseleave', () => {
                gsap.to(post.querySelector('.related-post-img'), {
                    scale: 1,
                    boxShadow: '0 0 10px rgba(0, 183, 255, 0.5)',
                    duration: 0.3,
                    ease: 'power2.out'
                });
                gsap.to(post.querySelector('.related-post-text'), {
                    x: 0,
                    color: '#e2e8f0',
                    duration: 0.3,
                    ease: 'power2.out'
                });
            });
        });
    </script>
</body>
</html>