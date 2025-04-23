<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $category->name }} - TechBit</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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

        .category-section {
            padding: 60px 0;
            max-width: 1200px;
            margin: 0 auto;
        }

        .category-title {
            font-size: 2.5rem;
            font-weight: bold;
            color: #fff;
            text-shadow: 0 0 8px rgba(0, 183, 255, 0.8);
            margin-bottom: 2rem;
        }

        .posts-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 1.5rem;
        }

        .post-card {
            background: #1e293b;
            border-radius: 12px;
            overflow: hidden;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            border: 1px solid rgba(0, 183, 255, 0.2);
        }

        .post-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 12px 24px rgba(0, 183, 255, 0.3);
            border-color: #00b7ff;
        }

        .post-card img {
            width: 100%;
            height: 150px;
            object-fit: cover;
        }

        .category-tag {
            background: linear-gradient(to right, #00b7ff, #ff00ff);
            color: white;
            padding: 0.25rem 0.75rem;
            border-radius: 9999px;
            font-size: 0.75rem;
            text-transform: uppercase;
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

        .load-more-btn {
            display: block;
            margin: 2rem auto;
            padding: 0.75rem 2rem;
            background: linear-gradient(to right, #00b7ff, #ff00ff);
            color: white;
            border-radius: 9999px;
            font-weight: 600;
            text-transform: uppercase;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            cursor: pointer;
        }

        .load-more-btn:hover {
            transform: scale(1.05);
            box-shadow: 0 0 15px rgba(0, 183, 255, 0.7);
        }

        .load-more-btn.hidden {
            display: none;
        }

        @media (max-width: 1024px) {
            .category-section {
                padding: 40px 1rem;
            }

            .posts-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 768px) {
            .posts-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>

<body class="font-sans antialiased">
    <!-- Particles Background -->
    <div id="particles-js"></div>

    <!-- Top Menu: Login and Register -->
    <div class="relative z-20 py-4 bg-gray-900">
        <div class="container flex justify-end px-4 mx-auto space-x-6">
            <a href="/login" class="text-sm text-gray-300 nav-link hover:text-white">Login</a>
            <a href="/register" class="text-sm text-gray-300 nav-link hover:text-white">Register</a>
        </div>
    </div>

    <!-- Logo Section -->
    <div class="relative z-20 py-8 text-center bg-gray-800">
        <a href="/" class="text-5xl font-extrabold logo text-cyan-400">TechBit</a>
    </div>

    <!-- Category Menu Bar -->
    <nav class="relative z-20 bg-gray-900 shadow-lg">
        <div class="container px-4 py-4 mx-auto">
            <div class="flex justify-center space-x-10">
                @foreach ($categories as $cat)
                    <a href="/category/{{ $cat->name }}"
                        class="text-lg text-gray-300 category-link">{{ $cat->name }}</a>
                @endforeach
            </div>
        </div>
    </nav>

    <!-- Category Content -->
    <section class="container relative z-10 px-4 mx-auto category-section">
        <h1 class="category-title">{{ $category->name }}</h1>
        <div class="posts-grid">
            @foreach ($posts as $post)
                <div class="post-card">
                    <img src="{{ $post->image }}" alt="{{ $post->title }}">
                    <div class="p-4">
                        <span class="category-tag">{{ $post->category->name }}</span>
                        <h3 class="mt-2 mb-2 text-lg font-semibold text-white">{{ $post->title }}</h3>
                        <p class="mb-4 text-sm text-gray-400">{{ $post->description }}</p>
                        <p class="mb-4 text-xs text-gray-500">Posted on {{ $post->published_at->format('F j, Y') }} by
                            {{ $post->user->name }} | {{ $post->views }} Views</p>
                        <a href="/post/{{ $post->slug }}"
                            class="text-sm font-medium text-cyan-400 hover:text-cyan-300">Read More</a>
                    </div>
                </div>
            @endforeach
        </div>
        <button id="load-more" class="load-more-btn">Load More</button>
    </section>

    <!-- Footer -->
    <footer class="relative z-10 py-12 bg-gray-900">
        <div class="container px-4 mx-auto text-center">
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
                number: {
                    value: 80,
                    density: {
                        enable: true,
                        value_area: 800
                    }
                },
                color: {
                    value: '#00b7ff'
                },
                shape: {
                    type: 'circle'
                },
                opacity: {
                    value: 0.5,
                    random: true
                },
                size: {
                    value: 3,
                    random: true
                },
                line_linked: {
                    enable: true,
                    distance: 150,
                    color: '#00b7ff',
                    opacity: 0.4,
                    width: 1
                },
                move: {
                    enable: true,
                    speed: 2,
                    direction: 'none',
                    random: false,
                    straight: false,
                    out_mode: 'out',
                    bounce: false
                }
            },
            interactivity: {
                detect_on: 'canvas',
                events: {
                    onhover: {
                        enable: true,
                        mode: 'repulse'
                    },
                    onclick: {
                        enable: true,
                        mode: 'push'
                    },
                    resize: true
                },
                modes: {
                    repulse: {
                        distance: 100,
                        duration: 0.4
                    },
                    push: {
                        particles_nb: 4
                    }
                }
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

        gsap.from('.category-title', {
            opacity: 0,
            y: 50,
            duration: 1.5,
            ease: 'power3.out',
            delay: 0.3
        });

        gsap.from('.post-card', {
            opacity: 0,
            y: 30,
            duration: 0.8,
            stagger: 0.1,
            ease: 'power2.out',
            delay: 0.5
        });

        // Load More Functionality with AJAX
        let page = 1;
        $('#load-more').on('click', function() {
            page++;
            console.log('Loading more posts, page:', page);
            $.ajax({
                url: '/category/' + encodeURIComponent('{{ $category->name }}'),
                type: 'GET',
                data: {
                    page: page
                },
                success: function(response) {
                    console.log('AJAX response:', response);
                    const postsGrid = $('.posts-grid');
                    if (response.posts && response.posts.length > 0) {
                        response.posts.forEach(post => {
                            const postCard = `
                                <div class="post-card">
                                    <img src="${post.image}" alt="${post.title}">
                                    <div class="p-4">
                                        <span class="category-tag">${post.category.name}</span>
                                        <h3 class="mt-2 mb-2 text-lg font-semibold text-white">${post.title}</h3>
                                        <p class="mb-4 text-sm text-gray-400">${post.description}</p>
                                        <p class="mb-4 text-xs text-gray-500">Posted on ${new Date(post.published_at).toLocaleDateString('en-US', { month: 'long', day: 'numeric', year: 'numeric' })} by ${post.user.name} | ${post.views} Views</p>
                                        <a href="/post/${post.slug}" class="text-sm font-medium text-cyan-400 hover:text-cyan-300">Read More</a>
                                    </div>
                                </div>
                            `;
                            postsGrid.append(postCard);
                        });
                        // Animate newly added posts
                        const newPosts = postsGrid.children().slice(-response.posts.length);
                        gsap.from(newPosts, {
                            opacity: 0,
                            y: 30,
                            duration: 0.5,
                            stagger: 0.1,
                            ease: 'power2.out'
                        });
                        if (!response.hasMore) {
                            $('#load-more').addClass('hidden');
                            console.log('No more posts to load');
                        }
                    } else {
                        console.log('No more posts available');
                        $('#load-more').addClass('hidden');
                        alert('No more posts available.');
                    }
                },
                error: function(xhr, status, error) {
                    console.error('AJAX error:', status, error, xhr.responseText);
                    alert('Error loading more posts. Please try again.');
                }
            });
        });
    </script>
</body>

</html>
