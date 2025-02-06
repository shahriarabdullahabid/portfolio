<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Services</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Dancing+Script&display=swap" rel="stylesheet">
  <link rel="icon" href="{{ asset('images/logo.png') }}" type="image/png">
  <!-- Font Awesome CDN -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&family=Lora:wght@400;700&display=swap" rel="stylesheet">



  <style>
   
    @keyframes gradientAnimation {
      0% {
        background-position: 0% 50%;
      }
      50% {
        background-position: 100% 50%;
      }
      100% {
        background-position: 0% 50%;
      }
    }



    

.dynamic-background {
    background: linear-gradient(45deg, hsl(228, 80%, 10%), #001f3f, #002855, #00112b);
    background-size: 400% 400%;
    animation: gradientAnimation 5s ease infinite;
}


.background-image {
    background: 
      linear-gradient(45deg, rgba(0, 31, 63, 0.8), rgba(0, 40, 85, 0.8), rgba(0, 17, 43, 0.8)), 
      url('{{ asset('images/web6.webp') }}'); 
    background-size: cover;
    background-position: center;
    background-attachment: fixed;
    animation: gradientAnimation 5s ease infinite;
}
   

    


   
    .hero-text {
      transition: transform 0.3s ease, color 0.3s ease;
      font-family: 'Lora', serif;
    }
    p {
      font-family: 'Lora', serif;
    }
    .skills-section p,
.skills-section ul li {
    font-family: 'Lora', serif;
    font-size: 18px;
    line-height: 1.6;
    color: #d1d1d1; 
}

.skills-section h3 {
    font-family: 'Lora', serif;
    font-size: 24px;
    color: #facc15;
    font-weight: bold;
}

    .hero-text:hover {
      transform: translateY(-10px);
      color: #f39c12; 
      font-family: 'Lora', serif;
    }
  </style>
</head>
<body class="background-image text-white">

 <!-- Navbar -->
<header class="flex items-center justify-between px-8 md:px-40 py-8 relative z-10 background-image">
    <div class="flex items-center space-x-2">
    <!-- Text with calligraphic font --> <a href="{{ route('home.index') }}" class="text-transparent bg-clip-text bg-gradient-to-r from-yellow-400 to-pink-600 text-4xl font-bold transition-transform duration-300 ease-in-out hover:scale-110" style="font-family: 'Dancing Script', cursive;">
      Nushrat
    </a>
  </div>

  <!-- Mobile Menu Button -->
  <button id="menu-toggle" class="md:hidden text-white text-3xl focus:outline-none">
    <i class="fas fa-bars"></i>
  </button>

  <!-- Navigation Links -->
  <nav id="menu" class="hidden md:flex space-x-8 text-lg">
    <a href="{{ route('home.index') }}" class="hover:text-yellow-400">Home</a>
    <a href="{{ route('aboutme.index') }}" class="hover:text-yellow-400">About</a>
    <a href="{{ route('portfolio.viewAll') }}" class="hover:text-yellow-400">Portfolio</a>
    <a href="{{ route('services.show') }}" class="hover:text-yellow-400">Services</a>
  </nav>

  <a href="{{ route('contact.index') }}" class="border border-white px-6 py-3 rounded-lg bg-transparent text-white hover:bg-white hover:text-black transition hidden md:inline-block">
    Contact Me
  </a>

  <!-- Mobile Menu -->
  <div id="mobile-menu" class="hidden md:hidden absolute top-full left-0 w-full bg-gray-900 text-center py-6">
    <a href="{{ route('home.index') }}" class="block text-white py-2 hover:text-yellow-400">Home</a>
    <a href="{{ route('aboutme.index') }}" class="block text-white py-2 hover:text-yellow-400">About</a>
    <a href="{{ route('portfolio.viewAll') }}" class="block text-white py-2 hover:text-yellow-400">Portfolio</a>
    <a href="{{ route('services.show') }}" class="block text-white py-2 hover:text-yellow-400">Services</a>
    <a href="{{ route('contact.index') }}"  class="block border border-white mx-6 mt-4 py-3 rounded-lg bg-transparent text-white hover:bg-white hover:text-black transition">
      Contact Me
    </a>
  </div>
</header>

<script>
  const menuToggle = document.getElementById('menu-toggle');
  const mobileMenu = document.getElementById('mobile-menu');

  menuToggle.addEventListener('click', () => {
    mobileMenu.classList.toggle('hidden');
  });
</script>


<!-- Services Hero Section -->
<section class="flex flex-col items-center justify-center text-center h-[80vh] px-20">
    <h1 class="text-5xl md:text-7xl font-extrabold mb-6 hero-text">
      My Services
    </h1>
    <p id="dynamic-text" class="text-4xl text-yellow-400 font-semibold mt-4 italic">
      A passionate developer with a keen eye for detail.
    </p>
</section>

<section class="bg-cover bg-center text-white py-16 px-40 dynamic-background">
    <div class="max-w-screen-xl mx-auto">
        
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-16">
            @foreach($services as $service)
                <div class="flex items-start space-x-6">
                    <i class="fa-solid {{ $service->icon }} text-yellow-400 text-4xl"></i>
                    <div>
                        <h3 class="text-2xl font-bold text-yellow-400">{{ $service->title }}</h3>
                        <p class="text-lg text-gray-300 mt-2 text-justify">
                            {{ $service->description }}
                        </p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>



<!-- Footer -->
<footer class="bg-gray-800 text-white py-16 px-8 md:px-20 lg:px-40 dynamic-background">
  <div class="max-w-screen-xl mx-auto flex flex-col md:flex-row justify-between items-center">
    
    <div class="flex flex-col items-start text-center md:text-left">
      <p class="text-lg text-gray-300">Reach out & Connect!</p>
      <p class="text-sm text-gray-400 mt-2">Let's connect on social platforms!</p>
      <div class="space-x-6 mt-4">
        <a href="https://www.facebook.com/rubaiyatfardin.nusrat" class="text-white hover:text-yellow-400" title="Facebook">
          <i class="fab fa-facebook-f"></i>
        </a>
        <a href="https://www.linkedin.com/in/nushrat-j-212991263" class="text-white hover:text-yellow-400" title="LinkedIn">
          <i class="fab fa-linkedin-in"></i>
        </a>
        <a href="https://github.com/NushratJahan6566" class="text-white hover:text-yellow-400" title="GitHub">
          <i class="fab fa-github"></i>
        </a>
      </div>
    </div>

    
    <div class="text-center mt-8 md:mt-0">
      <p class="text-lg text-gray-300">Designed and developed by © Nushrat</p>
    </div>

  
    <div class="mt-8 md:mt-0">
      <a href="#top" class="bg-yellow-400 text-gray-800 px-6 py-2 rounded-full text-sm font-semibold hover:bg-yellow-500 transition duration-300 ease-in-out">
        Back to Top
      </a>
    </div>
  </div>
</footer>





<script>
  const dynamicText = document.getElementById('dynamic-text');
  const phrases = [
    "A passionate developer with a keen eye for detail.",
    "Focused on front-end development and user experience."
  ];
  let i = 0;
  setInterval(() => {
    dynamicText.textContent = phrases[i];
    i = (i + 1) % phrases.length;
  }, 3000);
</script>

</body>
</html>
