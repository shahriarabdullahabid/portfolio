<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>About</title>
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
      url('{{ asset('images/web4.png') }}'); 
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

/* Heading styling */
.skills-section h3 {
    font-family: 'Lora', serif;
    font-size: 24px;
    color: #facc15;
    font-weight: bold;
}

    .hero-text:hover {
      transform: translateY(-10px);
      color: #f39c12; +
      font-family: 'Lora', serif;
    }
  </style>
</head>
<body class="background-image text-white">

 <!-- Navbar -->
<header class="flex items-center justify-between px-8 md:px-40 py-8 relative z-10 background-image">
  <div class="flex items-center space-x-2">
  
    <a href="{{ route('home.index') }}" class="text-transparent bg-clip-text bg-gradient-to-r from-yellow-400 to-pink-600 text-4xl font-bold transition-transform duration-300 ease-in-out hover:scale-110" style="font-family: 'Dancing Script', cursive;">
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


  <!-- About Me Hero Section -->
  <section class="flex flex-col items-center justify-center text-center h-[80vh] px-20 background-image">
    <h1 class="text-5xl md:text-7xl font-extrabold mb-6 hero-text">
      About Me
    </h1>
    <p id="dynamic-text" class="text-4xl text-yellow-400 font-semibold mt-4 italic">
      A passionate developer with a keen eye for detail.
    </p>
  </section>
  <section class="bg-center text-white py-16 px-40 dynamic-background">
    <div class="max-w-screen-xl mx-auto">
        <!-- About Name & Image -->
        <div class="grid md:grid-cols-2 gap-16 items-center">
            <!-- Left Side: Image -->
            <div class="flex justify-center">
                <img src="{{ asset('storage/' . $about->image) }}" alt="Your Image" style="width: 350px; height: 500px; object-fit: cover;">
            </div>
            <!-- Right Side: Content -->
            <div>
                <!-- Display Description Paragraphs -->
                <p class="text-lg text-gray-300 mb-4 text-justify">
                    {!! nl2br(e($about->description)) !!}
                </p>
            </div>
        </div>
    </div>
</section>



<!-- Education & Experience Section -->
<section class="bg-cover bg-center text-white py-16 px-40 dynamic-background">
  <div class="max-w-screen-xl mx-auto grid md:grid-cols-2 gap-16">
    <div>
      <h2 class="text-5xl font-extrabold text-yellow-400 mb-8">Education</h2>
      @foreach($education as $edu)
        <div class="mb-8">
          <h3 class="text-xl font-bold text-yellow-400 mt-2">{{ $edu->degree }}</h3>
          <p class="text-gray-300 mt-2 text-justify">{{ $edu->description }}</p>

          
          <p class="text-lg font-bold text-gray-300">
            {{ $edu->start_year }} - {{ $edu->end_year }}
        </p>
        
        <p class="text-dark font-weight-bold" style="font-size: 1.1rem;">{{ $edu->institution }}</p>

        </div>
      @endforeach
    </div>
    <div>
      <h2 class="text-5xl font-extrabold text-yellow-400 mb-8">My Experience</h2>
      @forelse($experience as $exp)
        <div class="mb-8">
          <h3 class="text-xl font-bold text-yellow-400 mt-2">{{ $exp->title }}</h3>
          <p class="text-gray-300 mt-2  text-justify">{{ $exp->description }}</p>
          <p class="text-lg font-bold text-gray-300">
            {{ $exp->start_year }} - {{ $exp->end_year }}
        </p>
        
        <p class="text-dark font-weight-bold" style="font-size: 1.1rem;">{{ $exp->company }}</p>

        </div>
      @empty
        <p class="text-gray-400 text-lg">No experience available at the moment.</p>
      @endforelse
    </div>
  </div>
</section>


<!-- Skills Section -->
<section class="skills-section bg-center text-white py-16 px-8 md:px-40 dynamic-background">
  <div class="max-w-screen-xl mx-auto flex flex-col md:flex-row items-center justify-between space-y-12 md:space-y-0">
    <div class="space-y-6 max-w-lg text-center md:text-left">
      <h3 class="text-3xl font-bold text-yellow-400 mb-4">Skills</h3>
      <p class="text-lg text-gray-300 mb-4 text-justify md:text-left">
        I have expertise in various areas of web development. Here are some of my key skills:
      </p>
      <ul class="space-y-4">
        @foreach($skills as $skill)
          <li class="text-lg text-justify md:text-left">- {{ $skill->name }} ({{ $skill->category }})</li>
        @endforeach
      </ul>
    </div>
    <div class="max-w-lg w-full">
      <h3 class="text-3xl font-bold text-yellow-400 mb-4 text-center md:text-left">Skill Proficiency</h3>
      <div class="space-y-6">
        @foreach($skills as $skill)
          <div>
            <p class="text-lg mb-2 text-center md:text-left">{{ $skill->name }}</p>
            <div class="w-full bg-gray-700 rounded-full relative">
              <div class="progress-bar bg-yellow-400 h-3 rounded-full" 
                   data-progress="{{ $skill->proficiency }}" 
                   style="width: 0%;"></div>
              <span class="progress-text absolute right-2 top-[-1.5rem] text-yellow-400 font-bold text-lg">
                {{ $skill->proficiency }}%
              </span>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </div>
</section>

<!-- JavaScript for Skill Progress Animation -->
<script>
  function animateProgressBars() {
      const progressBars = document.querySelectorAll('.progress-bar');
      
      progressBars.forEach(bar => {
          const targetValue = bar.getAttribute('data-progress');
          bar.style.width = targetValue + "%";
      });
  }

  function isElementInViewport(el) {
      const rect = el.getBoundingClientRect();
      return rect.top < window.innerHeight && rect.bottom >= 0;
  }

  function handleScroll() {
      const skillsSection = document.querySelector('.skills-section');
      if (isElementInViewport(skillsSection) && !skillsSection.classList.contains('animated')) {
          skillsSection.classList.add('animated');
          animateProgressBars();
      }
  }

  document.addEventListener('DOMContentLoaded', () => {
      handleScroll(); // Check once on page load
      document.addEventListener('scroll', handleScroll);
  });
</script>

<style>
  .progress-bar {
      width: 0;
      transition: width 1.5s ease-in-out;
  }
</style>



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
      "Focused on front-end development and user experience.",
      "Building responsive and interactive websites.",
      "A lifelong learner, always improving my skills."
    ];
    let i = 0;

    function changeText() {
      dynamicText.textContent = phrases[i];
      i = (i + 1) % phrases.length;
    }

    setInterval(changeText, 3000);
  </script>
</body>
</html>
