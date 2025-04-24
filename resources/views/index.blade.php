<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TechBit - Home</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
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

        .slider-section {
            overflow: visible;
            padding: 60px 0;
        }

        .slick-slider {
            margin: 0 auto;
            max-width: 1200px;
            z-index: 10;
            overflow: visible;
        }

        .slick-slide {
            padding: 0 15px;
            transition: transform 0.5s ease, opacity 0.5s ease;
            opacity: 0.7;
            transform: scale(0.9);
        }

        .slick-slide img {
            width: 100%;
            height: 400px;
            object-fit: cover;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.5);
            position: relative;
            z-index: 1;
        }

        .slick-slide:hover {
            transform: scale(0.95) rotate(2deg);
        }

        .slick-center {
            opacity: 1;
            transform: scale(1);
            z-index: 10;
            max-width: 90%;
            margin: 0 auto;
        }

        .slick-center img {
            border: 3px solid transparent;
            background: linear-gradient(to right, #00b7ff, #ff00ff) border-box;
            box-shadow: 0 0 25px rgba(0, 183, 255, 0.7);
            transition: transform 0.3s ease;
        }

        .slick-center img:hover {
            transform: scale(1.03);
        }

        .slick-slide::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: radial-gradient(circle, transparent 50%, rgba(0, 0, 0, 0.3) 100%);
            z-index: 2;
            border-radius: 12px;
            pointer-events: none;
        }

        .slick-center::before {
            background: none;
        }

        .slide-caption {
            position: absolute;
            bottom: 10px;
            left: 10px;
            right: 10px;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            padding: 1.5rem;
            border-radius: 10px;
            opacity: 0;
            transform: translateY(20px);
            transition: all 0.4s ease;
            text-shadow: 0 0 8px rgba(0, 183, 255, 0.8);
            z-index: 11;
            color: #fff;
        }

        .slick-center .slide-caption {
            opacity: 1;
            transform: translateY(0);
        }

        .slick-prev,
        .slick-next {
            background: linear-gradient(to right, #00b7ff, #ff00ff);
            border-radius: 50%;
            width: 40px;
            height: 40px;
            z-index: 20;
            transition: transform 0.3s ease;
        }

        .slick-prev:hover,
        .slick-next:hover {
            transform: scale(1.1);
        }

        .slick-prev:before,
        .slick-next:before {
            color: white;
            font-size: 20px;
        }

        .slick-dots {
            bottom: -40px;
        }

        .slick-dots li button:before {
            color: #00b7ff;
            font-size: 12px;
            opacity: 0.5;
            transition: all 0.3s ease;
        }

        .slick-dots li.slick-active button:before {
            color: #ff00ff;
            opacity: 1;
            text-shadow: 0 0 8px rgba(255, 0, 255, 0.8);
            transform: scale(1.2);
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

        .posts-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 1.5rem;
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
            .posts-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .slick-slide img {
                height: 350px;
            }
        }

        @media (max-width: 768px) {
            .posts-grid {
                grid-template-columns: 1fr;
            }

            .slick-slide img {
                height: 300px;
            }

            .slider-section {
                padding: 40px 0;
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
                @foreach ($categories as $category)
                    <a href="/category/{{ $category->name }}"
                        class="text-lg text-gray-300 category-link">{{ $category->name }}</a>
                @endforeach
            </div>
        </div>
    </nav>

    <!-- Slider for Latest Posts (Card-Based Carousel) -->
    <section class="container relative z-10 px-4 mx-auto slider-section">
        <div class="latest-posts-slider">
            @foreach ($sliders as $post)
                <div>
                    <img src="{{ $post->image }}" alt="{{ $post->title }}">
                    <div class="slide-caption">
                        <h3 class="text-2xl font-bold text-white">{{ $post->title }}</h3>
                        <p class="mt-2 text-sm text-gray-300">Posted on {{ $post->published_at->format('F j, Y') }} by
                            {{ $post->user->name }} | {{ $post->views }} Views</p>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    <!-- Blog Posts Section (Four Cards in a Row) -->
    <section id="posts" class="container relative z-10 px-4 py-16 mx-auto">
        <h2 class="mb-12 text-4xl font-bold text-center text-white">All Posts</h2>
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

        // Slick Slider Configuration (Card-Based Carousel)
        $(document).ready(function() {
            $('.latest-posts-slider').slick({
                autoplay: true,
                autoplaySpeed: 3000,
                dots: true,
                arrows: true,
                slidesToShow: 1,
                slidesToScroll: 1,
                centerMode: true,
                centerPadding: '150px',
                focusOnSelect: true,
                infinite: true,
                speed: 600,
                cssEase: 'cubic-bezier(0.4, 0, 0.2, 1)',
                responsive: [{
                        breakpoint: 1024,
                        settings: {
                            centerPadding: '100px'
                        }
                    },
                    {
                        breakpoint: 768,
                        settings: {
                            centerPadding: '50px',
                            arrows: false
                        }
                    }
                ]
            });

            // Refresh slider on window resize to prevent display issues
            $(window).on('resize', function() {
                $('.latest-posts-slider').slick('refresh');
            });

            // GSAP Animation for Slider Transitions
            $('.latest-posts-slider').on('afterChange', function(event, slick, currentSlide) {
                gsap.fromTo('.slick-center .slide-caption', {
                    opacity: 0,
                    y: 20
                }, {
                    opacity: 1,
                    y: 0,
                    duration: 0.5,
                    ease: 'power2.out'
                });
            });

            // Load More Functionality with AJAX
            let page = 1;
            $('#load-more').on('click', function() {
                page++;
                $.ajax({
                    url: '{{ route('loadMore') }}',
                    type: 'GET',
                    data: {
                        page: page
                    },
                    success: function(response) {
                        const posts = response.posts;
                        const hasMore = response.hasMore;
                        const postsGrid = $('.posts-grid');

                        posts.forEach(post => {
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
                            gsap.from(postsGrid.children().last(), {
                                opacity: 0,
                                y: 30,
                                duration: 0.5,
                                ease: 'power2.out'
                            });
                        });

                        if (!hasMore) {
                            $('#load-more').addClass('hidden');
                        }
                    },
                    error: function() {
                        alert('Error loading more posts. Please try again.');
                    }
                });
            });
        });

        // GSAP Animations (Only for Logo, Category Links, and Slider)
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

        gsap.from('.latest-posts-slider', {
            opacity: 0,
            y: 50,
            duration: 1.5,
            ease: 'power3.out',
            delay: 0.3
        });
    </script>
</body>

</html>
