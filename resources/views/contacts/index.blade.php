<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Contact</title>
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
      url('{{ asset('images/web3.png') }}'); 
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


  <section class="flex flex-col items-center justify-center text-center h-[80vh] px-20 bg-cover bg-center contact-background">
    <h1 class="text-5xl md:text-7xl font-extrabold mb-6 hero-text">
        Contact Me
    </h1>
    <p id="contact-dynamic-text" class="text-4xl text-yellow-400 font-semibold mt-4 italic">
        Let's collaborate and bring ideas to life.
    </p>
</section>

<!-- Contact Section -->
<section class="bg-cover bg-center text-white py-16 px-8 md:px-40 dynamic-background">
    <div class="max-w-screen-xl mx-auto flex flex-col md:flex-row items-center justify-between space-y-12 md:space-y-0">
      
     
      <div class="space-y-6 max-w-xs text-center md:text-left">
        <h2 class="text-4xl md:text-5xl font-extrabold text-yellow-400 mb-8">Contact Me</h2>
        
        <div class="space-y-4">
          @foreach($contactDetails as $contact)
            <div class="text-white hover:text-yellow-400 flex items-center justify-center md:justify-start" title="Location">
              <i class="fas fa-map-marker-alt text-yellow-400 mr-2"></i> {{ $contact->location }}
            </div>
            <div class="text-white hover:text-yellow-400 flex items-center justify-center md:justify-start" title="Email">
              <i class="fas fa-envelope text-yellow-400 mr-2"></i> 
              <a href="mailto:{{ $contact->email }}" class="break-words">{{ $contact->email }}</a>
            </div>
            <div class="text-white hover:text-yellow-400 flex items-center justify-center md:justify-start" title="Phone">
              <i class="fas fa-phone-alt text-yellow-400 mr-2"></i> {{ $contact->phone }}
            </div>
          @endforeach
        </div>
      </div>
  
      
      <div class="max-w-lg w-full">
        @if(session('success'))
          <div id="success-message" class="bg-green-500 text-white p-4 rounded-lg mb-6">
            {{ session('success') }}
          </div>
  
          <script>
           
            // Close success message when clicking anywhere on the screen
            document.addEventListener('click', function(event) {
              const successMessage = document.getElementById('success-message');
              if (successMessage && !successMessage.contains(event.target)) {
                successMessage.style.display = 'none';
              }
            });
          </script>
          
        @endif
  
        <form action="{{ route('contactme.store') }}" method="POST" class="space-y-6">
          @csrf
          <div>
            <label for="name" class="text-lg block">Your Name</label>
            <input type="text" id="name" name="name" class="w-full p-4 mt-2 rounded-lg bg-gray-800 text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-yellow-400" value="{{ old('name') }}" required>
            @error('name')
              <span class="text-red-400 text-sm">{{ $message }}</span>
            @enderror
          </div>
          <div>
            <label for="email" class="text-lg block">Your Email</label>
            <input type="email" id="email" name="email" class="w-full p-4 mt-2 rounded-lg bg-gray-800 text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-yellow-400" value="{{ old('email') }}" required>
            @error('email')
              <span class="text-red-400 text-sm">{{ $message }}</span>
            @enderror
          </div>
          <div>
            <label for="message" class="text-lg block">Your Message</label>
            <textarea id="message" name="message" rows="4" class="w-full p-4 mt-2 rounded-lg bg-gray-800 text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-yellow-400" required>{{ old('message') }}</textarea>
            @error('message')
              <span class="text-red-400 text-sm">{{ $message }}</span>
            @enderror
          </div>
          <button type="submit" class="bg-purple-500 hover:bg-white text-white font-bold py-4 px-10 rounded-lg hover:text-purple-500 w-full transition duration-300 ease-in-out">
            Send Message
          </button>
        </form>
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
    const contactDynamicText = document.getElementById('contact-dynamic-text');
    const contactPhrases = [
        "Let's collaborate and bring ideas to life.",
        "Feel free to reach out for any inquiries.",
        "Excited to work on new projects with you.",
        "Get in touch to discuss opportunities."
    ];
    let contactIndex = 0;

    function updateContactText() {
        contactDynamicText.textContent = contactPhrases[contactIndex];
        contactIndex = (contactIndex + 1) % contactPhrases.length;
    }

    setInterval(updateContactText, 3000);
</script>
  
</body>
</html>  
