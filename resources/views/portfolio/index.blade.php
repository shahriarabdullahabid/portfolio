<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Portfolio</title>
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
      url('{{ asset('images/web5.jpg') }}'); 
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


<!-- Portfolio Section -->
<section class="flex flex-col items-center justify-center text-center h-[80vh] px-20 bg-cover bg-center portfolio-background">
  <h1 class="text-5xl md:text-7xl font-extrabold mb-6 hero-text">
      Portfolio
  </h1>
  <p id="portfolio-dynamic-text" class="text-4xl text-yellow-400 font-semibold mt-4 italic">
      Showcasing innovative and user-friendly designs.
  </p>
</section>

<!-- Portfolio Items -->
<section class="bg-cover bg-center text-white py-16 px-10 md:px-20 dynamic-background">
  <div class="max-w-screen-lg mx-auto text-center">
      <div class="grid md:grid-cols-2 gap-8">
          @foreach($portfolios as $portfolio)
              <div class="portfolio-item bg-[#150c3a] border border-gray-700 shadow-lg relative transition-transform hover:scale-105 p-6">
                 
                  <a href="{{ $portfolio->live_url }}" target="_blank">
                      <img src="{{ asset('storage/' . $portfolio->image) }}" alt="Project Image" class="rounded-lg shadow-md w-full h-[350px] object-cover" style="padding: 0; margin: 0;">
                  </a>

                  <div class="mt-4 text-left">
                      <h3 class="text-2xl font-bold text-white">{{ $portfolio->project_name }}</h3>
                      <p class="text-sm uppercase text-gray-400 mt-1">{{ $portfolio->category }}</p>
                      
                      <div class="flex flex-wrap gap-2 mt-4">
                          @foreach(json_decode($portfolio->technologies) as $tech)
                              <span class="bg-[#1e1448] px-3 py-1 rounded-full text-sm text-yellow-400 font-medium">{{ $tech }}</span>
                          @endforeach
                      </div>

                      <div class="flex flex-wrap gap-2 mt-3">
                          @foreach(json_decode($portfolio->features) as $feature)
                              <span class="bg-gray-800 px-3 py-1 rounded-full text-sm text-gray-300">{{ $feature }}</span>
                          @endforeach
                      </div>

                      <div class="mt-4 text-left relative pb-8">
                        <a href="{{ $portfolio->github_url }}" target="_blank" class="text-yellow-400 text-sm font-semibold absolute bottom-0 left-0 mt-4 hover:underline">
                            View Details &rarr;
                        </a>
                    </div>
                    
                    
                    
                    
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
  const portfolioDynamicText = document.getElementById('portfolio-dynamic-text');
  const portfolioPhrases = [
      "Showcasing innovative and user-friendly designs.",
      "Bringing ideas to life through modern web development.",
      "Creating responsive and dynamic web experiences.",
      "Dedicated to delivering high-quality digital solutions."
  ];
  let index = 0;

  function updatePortfolioText() {
      portfolioDynamicText.textContent = portfolioPhrases[index];
      index = (index + 1) % portfolioPhrases.length;
  }

  setInterval(updatePortfolioText, 3000);
</script>
</body>
</html>
