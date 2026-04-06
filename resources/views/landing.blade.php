<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Inventory</title>
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>

<body class="bg-gray-100">

    <!-- Navbar -->
    <nav class="fixed top-0 left-0 w-full bg-gray-100 z-50 flex justify-between items-center px-10 py-4 ">
        <img src="{{ asset('images/wikrama-logo.png') }}" class="w-14">
        <button onclick="openLoginModal()" class="bg-blue-500 text-white px-5 py-2 rounded hover:bg-blue-600 transition">
            Login
        </button>
    </nav>

    <!-- Hero -->
    <section class="text-center mt-20">
        <h1 class="text-5xl font-bold">
            Inventory Management of <br> SMK Wikrama
        </h1>

        <h3 class="text-gray-500 mt-4">
            Management of incoming and outgoing items at SMK Wikrama Bogor.
        </h3>

        <div class="mt-12 flex justify-center">
            <img src="{{ asset('images/inventory.png') }}" class="w-[600px]">
        </div>
    </section>
        <!-- System Flow -->
    <section class="mt-24 px-10">

        <!-- Title -->
        <div class="text-center">
            <h2 class="text-3xl font-bold">Our system flow</h2>
            <p class="text-gray-500 mt-2">Our inventory system workflow</p>
        </div>

        <!-- Cards -->
        <div class="grid md:grid-cols-4 gap-8 mt-12">

            <!-- Card 1 -->
            <div class="text-center">
                <div class="bg-[#0b1445] p-10 flex justify-center items-center">
                    <img src="{{ asset('images/items.png') }}" class="w-28">
                </div>
                <p class="mt-4 font-medium">Items Data</p>
            </div>

            <!-- Card 2 -->
            <div class="text-center">
                <div class="bg-yellow-400 p-10 flex justify-center items-center">
                    <img src="{{ asset('images/technician.png') }}" class="w-28">
                </div>
                <p class="mt-4 font-medium">Management Technician</p>
            </div>

            <!-- Card 3 -->
            <div class="text-center">
                <div class="bg-purple-300 p-10 flex justify-center items-center">
                    <img src="{{ asset('images/lending.png') }}" class="w-28">
                </div>
                <p class="mt-4 font-medium">Managed Lending</p>
            </div>

            <!-- Card 4 -->
            <div class="text-center">
                <div class="bg-green-400 p-10 flex justify-center items-center">
                    <img src="{{ asset('images/borrow.png') }}" class="w-28">
                </div>
                <p class="mt-4 font-medium">All Can Borrow</p>
            </div>

        </div>

    </section>
    <!-- Footer -->
    <footer class="bg-gray-100 mt-24 px-10 py-12">

        <div class="flex justify-between items-start">

            <!-- LEFT -->
            <div>
                <img src="{{ asset('images/wikrama-logo.png') }}" class="w-16 mb-4">

                <p class="text-gray-600">smkwikrama@sch.id</p>
                <p class="text-gray-600 mt-1">001-7876-2876</p>
            </div>

            <!-- RIGHT SIDE (Middle + Right digabung) -->
            <div class="flex gap-24">

                <!-- Middle -->
                <div>
                    <h3 class="font-semibold text-lg mb-4">Our Guidelines</h3>

                    <ul class="space-y-2 text-gray-600">
                        <li class="hover:text-black cursor-pointer">Terms</li>
                        <li class="hover:text-red-500 font-medium">Privacy policy</li>
                        <li class="hover:text-black cursor-pointer">Cookie Policy</li>
                        <li class="hover:text-black cursor-pointer">Discover</li>
                    </ul>
                </div>

                <!-- Right -->
                <div>
                    <h3 class="font-semibold text-lg mb-4">Our address</h3>

                    <p class="text-gray-600 leading-relaxed">
                        Jalan Wangun Tengah <br>
                        Sindangsari <br>
                        Jawa Barat
                    </p>

                    <div class="flex gap-4 mt-5">
                        <a href="#" class="w-10 h-10 flex items-center justify-center border rounded-full">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="w-10 h-10 flex items-center justify-center border rounded-full">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="w-10 h-10 flex items-center justify-center border rounded-full">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="#" class="w-10 h-10 flex items-center justify-center border rounded-full">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                    </div>
                </div>

            </div>

        </div>

    </footer>

    <!-- Login Modal -->
        <div id="loginModal" class="hidden fixed inset-0 bg-gray-500/30 flex items-center justify-center z-50">
        <div class="bg-white rounded-lg p-8 w-96 shadow-2xl">
            <!-- Modal Title -->
            <h2 class="text-3xl font-bold text-center mb-8">Login</h2>

            <!-- Form -->
            <form id="loginForm" onsubmit="handleLogin(event)">
                <!-- Error Alert -->
                <div id="loginError" class="hidden mb-6 rounded-lg bg-red-100 border border-red-200 p-4 text-red-700"></div>

                <!-- Email Field -->
                <div class="mb-4">
                    <label class="block text-gray-700 font-medium mb-2">Email</label>
                    <input 
                        type="email" 
                        id="email"
                        placeholder="Email" 
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-teal-400 bg-gray-50"
                    >
                    <p id="emailError" class="mt-2 text-sm text-red-600 hidden"></p>
                </div>

                <!-- Password Field -->
                <div class="mb-8">
                    <label class="block text-gray-700 font-medium mb-2">Password</label>
                    <input 
                        type="password" 
                        id="password"
                        placeholder="Password" 
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-teal-400 bg-gray-50"
                    >
                    <p id="passwordError" class="mt-2 text-sm text-red-600 hidden"></p>
                </div>

                <!-- Buttons -->
                <div class="flex gap-4 justify-start">
                    <button 
                        type="button"
                        onclick="closeLoginModal()" 
                        class="bg-orange-400 text-white font-semibold px-6 py-3 rounded-lg hover:bg-orange-500 transition"
                    >
                        Close
                    </button>

                    <button 
                        type="submit" 
                        class="bg-teal-400 text-white font-semibold px-6 py-3 rounded-lg hover:bg-teal-500 transition"
                    >
                        Submit
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal Scripts -->
    <script>
        function openLoginModal() {
            clearLoginErrors();
            document.getElementById('loginModal').classList.remove('hidden');
        }

        function closeLoginModal() {
            document.getElementById('loginModal').classList.add('hidden');
            document.getElementById('loginForm').reset();
            clearLoginErrors();
        }

        function handleLogin(event) {
            event.preventDefault();
            clearLoginErrors();

            const email = document.getElementById('email').value.trim();
            const password = document.getElementById('password').value;
            const errors = [];

            if (!email) {
                setFieldError('email', 'Email harus diisi');
                errors.push('Email harus diisi');
            }

            if (!password) {
                setFieldError('password', 'Password harus diisi');
                errors.push('Password harus diisi');
            }

            if (errors.length) {
                setLoginError(errors.join('<br>'));
                return;
            }

            // Send login request to server
            fetch('/login', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content || ''
                },
                body: JSON.stringify({
                    email: email,
                    password: password
                })
            })
            .then(async response => {
                const data = await response.json();

                if (response.ok && data.success) {
                    window.location.href = data.redirect || '/dashboard';
                    return;
                }

                if (data.errors) {
                    const messages = [];
                    Object.values(data.errors).forEach(value => {
                        if (Array.isArray(value)) {
                            messages.push(...value);
                        } else {
                            messages.push(value);
                        }
                    });
                    setLoginError(messages.join('<br>'));
                } else {
                    setLoginError(data.message || 'Gagal login, silakan cek dan coba lagi.');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                setLoginError('Terjadi kesalahan, silakan coba lagi.');
            });
        }

        function setLoginError(message) {
            const errorBox = document.getElementById('loginError');
            errorBox.innerHTML = `<ul class="list-disc list-inside"><li>${message.replace(/<br>/g, '</li><li>')}</li></ul>`;
            errorBox.classList.remove('hidden');
        }

        function setFieldError(fieldId, message) {
            const field = document.getElementById(fieldId);
            const errorMessage = document.getElementById(fieldId + 'Error');

            if (field) {
                field.classList.add('border-red-500');
            }
            if (errorMessage) {
                errorMessage.textContent = message;
                errorMessage.classList.remove('hidden');
            }
        }

        function clearLoginErrors() {
            const errorBox = document.getElementById('loginError');
            const emailError = document.getElementById('emailError');
            const passwordError = document.getElementById('passwordError');
            const emailField = document.getElementById('email');
            const passwordField = document.getElementById('password');

            if (errorBox) {
                errorBox.classList.add('hidden');
                errorBox.innerHTML = '';
            }
            if (emailError) {
                emailError.classList.add('hidden');
                emailError.textContent = '';
            }
            if (passwordError) {
                passwordError.classList.add('hidden');
                passwordError.textContent = '';
            }
            if (emailField) {
                emailField.classList.remove('border-red-500');
            }
            if (passwordField) {
                passwordField.classList.remove('border-red-500');
            }
        }

        // Close modal when clicking outside of it
        document.getElementById('loginModal')?.addEventListener('click', function(event) {
            if (event.target === this) {
                closeLoginModal();
            }
        });

        // Close modal on Escape key
        document.addEventListener('keydown', function(event) {
            if (event.key === 'Escape') {
                closeLoginModal();
            }
        });
    </script>

</body>
</html>