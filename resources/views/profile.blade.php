<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>School System - Profile</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        :root {
            --primary-color: #1a237e;
            --secondary-color: #e6f2ff;
            --text-color: #333;
            --transition-speed: 0.3s;
            --danger-color: #d32f2f;
        }

        body {
            width: 100%;
            min-height: 100vh;
            background: linear-gradient(135deg, #f3f4f6 0%, #e5e7eb 100%);
            overflow-x: hidden;
        }

        .navbar {
            background: rgba(255, 255, 255, 0.95);
            padding: 1rem 2rem;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1000;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .notification-bell {
            position: relative;
            cursor: pointer;
        }
        .notification-count {
            position: absolute;
            top: -8px;
            right: -8px;
            background: var(--danger-color);
            color: white;
            border-radius: 50%;
            width: 18px;
            height: 18px;
            font-size: 0.75rem;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .title {
            font-size: 1.5rem;
            color: var(--primary-color);
            font-weight: bold;
        }

        .sidenav {
            background: white;
            width: 280px;
            height: 100vh;
            position: fixed;
            left: 0;
            top: 0;
            padding-top: 80px;
            box-shadow: 4px 0 10px rgba(0, 0, 0, 0.1);
            transition: transform var(--transition-speed);
            z-index: 1001;
            overflow-y: auto;
            overflow-x: hidden;
        }

        .overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.5);
            z-index: 1000;
            opacity: 0;
            transition: opacity var(--transition-speed);
        }

        .overlay.active {
            display: block;
            opacity: 1;
        }

        .profile {
            padding: 2rem;
            text-align: center;
        }

        .profile-image {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            margin: 0 auto 1rem;
            background: var(--secondary-color);
            position: relative;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .profile-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .profile-image::after {
            content: '📷';
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            padding: 0.5rem;
            background: rgba(0, 0, 0, 0.5);
            color: white;
            font-size: 1.2rem;
            opacity: 0;
            transition: opacity var(--transition-speed);
        }

        .profile-image:hover::after {
            opacity: 1;
        }

        .name {
            font-size: 1.5rem;
            font-weight: bold;
            color: var(--text-color);
            margin-bottom: 0.5rem;
        }

        .course {
            color: #666;
            font-size: 1rem;
        }

        .sidenav-url {
            margin-top: 2rem;
        }

        .url a {
            display: flex;
            align-items: center;
            padding: 1rem 2rem;
            color: var(--text-color);
            text-decoration: none;
            transition: all var(--transition-speed);
        }

        .url a i {
            margin-right: 1rem;
            width: 20px;
        }

        .url a:hover {
            background: var(--secondary-color);
            color: var(--primary-color);
            transform: translateX(10px);
        }

        .main {
            margin-left: 280px;
            padding: 100px 2rem 2rem;
        }

        .card {
            background: white;
            border-radius: 15px;
            padding: 2rem;
            margin-bottom: 2rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform var(--transition-speed);
        }

        .card:hover {
            transform: translateY(-5px);
        }

        .card h2 {
            color: var(--primary-color);
            margin-bottom: 1.5rem;
            font-size: 1.5rem;
        }

        .info-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1.5rem;
        }

        .info-item {
            padding: 1rem;
            background: var(--secondary-color);
            border-radius: 10px;
        }

        .info-item strong {
            display: block;
            color: #666;
            margin-bottom: 0.5rem;
        }

        .user-details {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1.5rem;
        }

        .input-box {
            margin-bottom: 1.5rem;
        }

        .input-box .details {
            display: block;
            margin-bottom: 0.5rem;
            color: #666;
        }

        .input-box input {
            width: 100%;
            padding: 0.75rem;
            border: 2px solid #e5e7eb;
            border-radius: 8px;
            transition: border-color var(--transition-speed);
        }

        .input-box input:focus {
            border-color: var(--primary-color);
            outline: none;
        }

        .input-box input[readonly] {
            background-color: var(--secondary-color);
            cursor: not-allowed;
        }

        .button-container {
            text-align: center;
            margin-top: 2rem;
        }

        .button-container button {
            background: var(--primary-color);
            color: white;
            border: none;
            padding: 1rem 2rem;
            border-radius: 8px;
            font-size: 1rem;
            cursor: pointer;
            transition: all var(--transition-speed);
        }

        .button-container button:hover {
            background: #1d4ed8;
            transform: translateY(-2px);
        }

        @media (max-width: 768px) {
            .sidenav {
                transform: translateX(-100%);
            }

            .sidenav.active {
                transform: translateX(0);
            }

            .main {
                margin-left: 0;
                transition: margin-left var(--transition-speed);
            }

            .navbar {
                padding: 1rem;
                z-index: 999;
            }

            .menu-toggle {
                display: block;
                font-size: 1.5rem;
                color: var(--primary-color);
                cursor: pointer;
                z-index: 1002;
            }

            body.nav-active {
                overflow: hidden;
            }
        }

        .toast {
            position: fixed;
            top: 20px;
            right: 20px;
            padding: 1rem 2rem;
            background: white;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transform: translateX(200%);
            transition: transform var(--transition-speed);
        }

        .toast.show {
            transform: translateX(0);
        }

        .toast.success {
            border-left: 4px solid #10b981;
            z-index: 1003;
        }

        .toast.error {
            border-left: 4px solid #ef4444;
            z-index: 1003;
        }
    </style>
</head>
<body>
    <div class="overlay" id="overlay"></div>
    <div class="navbar">
        <div class="menu-toggle">
            <i class="fas fa-bars"></i>
        </div>
        <div class="title">Student Profile</div>
        <div class="notification-bell">
            <i class="fas fa-bell fa-lg"></i>
            <span class="notification-count">3</span>
        </div>
    </div>

    <div class="sidenav">
        <div class="profile">
            <div class="profile-image">
                <img src="" alt="Profile Image">
            </div>
            <div class="name">{{ $user->name }}</div>
            <div class="course">{{ $user->course }}</div>
        </div>
        <div class="sidenav-url">
            <div class="url">
                <a href="{{ route('dashboard') }}"><i class="fas fa-home"></i>Dashboard</a>
                <a href="#"><i class="fas fa-cog"></i>Settings</a>
                <a href="#"><i class="fas fa-calendar"></i>Schedule</a>
                <a href="{{ route('signout') }}"><i class="fas fa-sign-out-alt"></i>Logout</a>
            </div>
        </div>
    </div>

    <div class="main">
        <div class="card">
            <h2><i class="fas fa-user-circle"></i> Personal Information</h2>
            <div class="info-grid">
                <div class="info-item">
                    <strong>Name</strong>
                    <span>{{ $user->name }}</span>
                </div>
                <div class="info-item">
                    <strong>Email</strong>
                    <span>{{ $user->email }}</span>
                </div>
                @if ($user->course)
                <div class="info-item">
                    <strong>Course</strong>
                    <span>{{ $user->course }}</span>
                </div>
                @endif
                @if ($user->admission_number)
                <div class="info-item">
                    <strong>Admission Number</strong>
                    <span>{{ $user->admission_number }}</span>
                </div>
                @endif
                @if ($user->year)
                <div class="info-item">
                    <strong>Year</strong>
                    <span>{{ $user->year }}</span>
                </div>
                @endif
                @if ($user->semester)
                <div class="info-item">
                    <strong>Semester</strong>
                    <span>{{ $user->semester }}</span>
                </div>
                @endif
            </div>
        </div>

        <div class="card">
            <h2><i class="fas fa-edit"></i> Edit Information</h2>
            <form action="{{ route('profile.update') }}" method="POST" id="profileForm">
                @csrf
                @method('PUT')
                <div class="user-details">
                    <div class="input-box">
                        <span class="details">Name</span>
                        <input type="text" name="name" value="{{ $user->name }}" required readonly>
                    </div>
                    <div class="input-box">
                        <span class="details">Email</span>
                        <input type="email" name="email" value="{{ $user->email }}" required readonly>
                    </div>
                    <div class="input-box">
                        <span class="details">Password</span>
                        <input type="password" name="password" placeholder="New password">
                    </div>
                    <div class="input-box">
                        <span class="details">Course</span>
                        <input type="text" name="course" value="{{ $user->course ?? '' }}">
                    </div>
                    <div class="input-box">
                        <span class="details">Admission Number</span>
                        <input type="text" name="admission_number" value="{{ $user->admission_number ?? '' }}">
                    </div>
                    <div class="input-box">
                        <span class="details">Year</span>
                        <input type="text" name="year" value="{{ $user->year ?? '' }}">
                    </div>
                    <div class="input-box">
                        <span class="details">Semester</span>
                        <input type="text" name="semester" value="{{ $user->semester ?? '' }}">
                    </div>
                </div>
                <div class="button-container">
                    <button type="submit">Update Profile</button>
                </div>
            </form>
        </div>
    </div>

    <div class="toast" id="toast"></div>

    <script>
        const menuToggle = document.querySelector('.menu-toggle');
        const sidenav = document.querySelector('.sidenav');
        const overlay = document.getElementById('overlay');
        const body = document.body;

        function toggleMenu() {
            sidenav.classList.toggle('active');
            overlay.classList.toggle('active');
            body.classList.toggle('nav-active');
        }

        menuToggle.addEventListener('click', toggleMenu);
        overlay.addEventListener('click', toggleMenu);

        // Close menu when clicking links on mobile
        document.querySelectorAll('.sidenav a').forEach(link => {
            link.addEventListener('click', () => {
                if (window.innerWidth <= 768) {
                    toggleMenu();
                }
            });
        });

        // Close menu when window is resized above mobile breakpoint
        window.addEventListener('resize', () => {
            if (window.innerWidth > 768 && sidenav.classList.contains('active')) {
                toggleMenu();
            }
        });

        // Form submission handling
        document.getElementById('profileForm').addEventListener('submit', async (e) => {
            e.preventDefault();
            
            try {
                const form = e.target;
                const formData = new FormData(form);
                
                const response = await fetch(form.action, {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'Accept': 'application/json'
                    }
                });

                const data = await response.json();
                
                if (response.ok) {
                    showToast('Profile updated successfully!', 'success');
                    setTimeout(() => window.location.reload(), 1000);
                } else if (response.status === 419) {
                    showToast('Session expired.');
                    setTimeout(() => window.location.reload(), 1000);
                }
                else {
                    const data =await response.json();
                    showToast(data.message || 'Error updating profile');
                }
            } catch (error) {
                showToast('Unexpected error!!');
                setTimeout(() => window.location.reload(), 1000);
            }
        });

        function showToast(message, type = 'success') {
            const toast = document.getElementById('toast');
            toast.textContent = message;
            toast.className = `toast ${type} show`;
            
            setTimeout(() => {
                toast.classList.remove('show');
            }, 3000);
        }

        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                document.querySelector(this.getAttribute('href')).scrollIntoView({
                    behavior: 'smooth'
                });
            });
        });

        // Add animation on scroll
        const cards = document.querySelectorAll('.card');
        const observer = new IntersectionObserver(
            (entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.style.opacity = '1';
                        entry.target.style.transform = 'translateY(0)';
                    }
                });
            },
            { threshold: 0.1 }
        );

        cards.forEach(card => {
            card.style.opacity = '0';
            card.style.transform = 'translateY(20px)';
            card.style.transition = 'all 0.5s ease-out';
            observer.observe(card);
        });
    </script>
</body>
</html>