@extends('layouts.app')

@section('content')

@php
  $speakers = [
    ['name' => 'Prof. Dr. Baharuddin, S.T., M.Pd.', 'photo' => 'images\rektor-unimed.jpg'],
    ['name' => 'Prof. Dr. Imran Akhmad, S.Pd., M.Pd', 'photo' => 'images\imran-unimed.jpg'],
    ['name' => 'Prof. Dr. Syawal Gultom, M.Pd', 'photo' => 'images\Syawal-gultomm.jpg'],
    ['name' => 'Prof. Mohad Anizu Bin Haji Mohd Nor', 'photo' => 'images\mohad-anizu.jpg'],
    ['name' => 'Assoc. Prof. Runchai Chaunchaiyakul', 'photo' => 'images\rungchai.jpeg'],
    ['name' => 'Dr. Rajesh Kumar', 'photo' => 'images\rajesh-kumar.jpg'],
  ];
@endphp

<section class="py-8 animate-fade-in">
  <div class="py-6 marquee-container" style="height: 250px;">
    <div class="marquee-content">
      @foreach($speakers as $index => $speaker)
        <div class="flex flex-col items-center text-center speaker-card">
          <img src="{{ $speaker['photo'] }}" 
               alt="{{ $speaker['name'] }}" 
               class="w-40 h-40 rounded-full object-cover" />
          <p class="mt-4 text-xs text-gray-800 font-medium">
            {{ $speaker['name'] }}
          </p>
        </div>
      @endforeach
      <!-- Duplikat untuk seamless loop -->
      @foreach($speakers as $index => $speaker)
        <div class="flex flex-col items-center text-center speaker-card">
          <img src="{{ $speaker['photo'] }}" 
               alt="{{ $speaker['name'] }}" 
               class="w-40 h-40 rounded-full object-cover" />
          <p class="mt-2 text-xs text-gray-800 font-medium">
            {{ $speaker['name'] }}
          </p>
        </div>
      @endforeach
    </div>
  </div>
</section>

<div class="text-center mt-2 animate-scale-in delay-600">
  <h1 class="text-2xl sm:text-2xl md:text-3xl lg:text-4xl font-semibold leading-snug text-transparent bg-clip-text bg-gradient-to-r from-blue-500 via-purple-500 to-red-500">
    International Conference of Sport Science Sport Coaching Science and Physical Education and Recreation
  </h1>
</div>

<div class="mt-4 text-justify text-sm leading-relaxed text-slate-700 animate-fade-in delay-700">
  <p>
    The era of the industrial revolution 5.0 brings very rapid changes accompanied by increasingly sophisticated technological
    developments through the presence of digital economy, artificial intelligence, big data, robotics, and others. Society 5.0 
    emphasizes the integration of advanced technologies such as AI, IoT, and robotic technology with human expertise and innovation 
    that can drive the development of more efficient, flexible, sustainable production systems and improve welfare. 
    This aims to create a production system that is more adaptive to changes in market demand, more focused on customer experience, 
    and optimizes the use of limited natural resources. The Faculty of Sports Science (FIK), 
    State University of Medan as one of the universities in North Sumatra should take part in controlling the direction and 
    speed of these changes as summarized in the faculty’s vision and mission. In the future, FIK is expected to produce graduates who have 
    the competence and expertise to compete and create opportunities in the era of growing globalization.
  </p>
</div>

<div class="mt-4 italic text-center text-lg font-semibold text-slate-800 animate-fade-in delay-800 text-transparent bg-clip-text bg-gradient-to-r from-blue-500 via-purple-500 to-pink-500">
  Innovative Approaches to Integrate Sport Science, coaching,<br class="hidden md:block"/>
  physical education, and recreational Sport for a Balance lifestyle.
</div>

<section class="mt-8 animate-slide-in-left delay-300">
  <h2 class="text-2xl font-bold text-center mb-6 text-transparent bg-clip-text bg-gradient-to-r from-blue-500 via-purple-500 to-red-500">
    Aim and Scope</h2>
  <div class="grid grid-cols-1 md:grid-cols-3 gap-6 text-sm">
    <ul class="list-disc pl-6 space-y-1">
      <li class="list-item">Sports Biomechanics</li>
      <li class="list-item">Sport Physiology</li>
      <li class="list-item">Sport Psychology</li>
      <li class="list-item">Sport Management</li>
    </ul>
    <ul class="list-disc pl-6 space-y-1">
      <li class="list-item">Physical Education</li>
      <li class="list-item">Coaching Science</li>
      <li class="list-item">Health & Fitness</li>
      <li class="list-item">Recreation & Tourism</li>
    </ul>
    <ul class="list-disc pl-6 space-y-1">
      <li class="list-item">Sport Technology</li>
      <li class="list-item">Performance Analysis</li>
      <li class="list-item">Injury Prevention</li>
      <li class="list-item">Community Sport</li>
    </ul>
  </div>
</section>

<section class="flex justify-center mt-10 animate-slide-in-right delay-300">
  <div class="w-full max-w-3xl px-4">
    <h2 class="text-2xl font-extrabold text-center mb-6 text-transparent bg-clip-text bg-gradient-to-r from-blue-500 via-purple-500 to-red-500">
      Dates & Venue Activity
    </h2>

    <!-- Dates -->
    <div class="grid text-sm text-left items-start mb-8" style="grid-template-columns: 1fr 0.5fr 1fr; gap: 1rem;">
      <ul class="space-y-2">
        <li class="list-item">Abstract Submission Deadline</li>
        <li class="list-item">Abstract Accepted</li>
        <li class="list-item">Full Paper Deadline</li>
        <li class="list-item">Payment Submission Deadline</li>
        <li class="list-item">Conference Date</li>
      </ul>

      <div class="flex justify-center">
        <div class="w-[1px] bg-gradient-to-b from-blue-400 via-purple-400 to-red-400 h-full"></div>
      </div>

      <ul class="space-y-2 text-right">
        <li class="list-item">21 Jun 2024</li>
        <li class="list-item">28 Jun 2024</li>
        <li class="list-item">05 Jul 2024</li>
        <li class="list-item">21 Jul 2024</li>
        <li class="list-item">27 Jul 2024</li>
      </ul>
    </div>

    <!-- Venue Section -->
    <div class="mt-10 text-center">
      <h3 class="mb-8 text-xl font-bold mb-3 text-transparent bg-clip-text bg-gradient-to-r from-blue-500 to-red-500">
        Venue Location
      </h3>
      <!-- <p class="text-gray-600 text-sm mb-6">
        Auditorium Universitas Negeri Medan (UNIMED),<br>
        Jl. Willem Iskandar Pasar V, Medan Estate, Sumatera Utara
      </p> -->

      <!-- Google Maps Modern Card -->
      <div class="relative mx-auto w-full max-w-2xl group">
        <div class="absolute -inset-0.5 bg-gradient-to-r from-blue-500 via-purple-500 to-red-500 rounded-2xl blur opacity-75 group-hover:opacity-100 transition duration-300"></div>
        
        <div class="relative bg-white/90 backdrop-blur-md rounded-2xl shadow-lg overflow-hidden border border-white/20">
          <iframe 
            src="https://www.google.com/maps?q=UNIMED%20Auditorium%2C%20Medan&hl=en&z=17&output=embed"
            class="w-full h-[350px] rounded-t-2xl"
            style="border:0;" 
            allowfullscreen="" 
            loading="lazy" 
            referrerpolicy="no-referrer-when-downgrade">
          </iframe>

          <!-- Footer Map Card -->
          <div class="p-4 flex justify-between items-center bg-white/70 backdrop-blur-md">
            <div class="flex items-center gap-2">
              <!-- Pin Icon -->
              <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-pink-500" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M10 2C6.686 2 4 4.686 4 8c0 3.314 6 10 6 10s6-6.686 6-10c0-3.314-2.686-6-6-6zm0 8.5a2.5 2.5 0 100-5 2.5 2.5 0 000 5z" clip-rule="evenodd"/>
              </svg>
              <p class="text-gray-800 font-medium text-sm">
                Auditorium Universitas Negeri Medan
              </p>
            </div>
            <a href="https://maps.app.goo.gl/wepgLZYbYMapY72v9" target="_blank"
              class="bg-gradient-to-r from-blue-500 via-purple-500 to-pink-500 text-white px-4 py-2 rounded-lg text-sm font-semibold hover:scale-105 transition transform shadow-md">
              View Map
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection