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
  <h1 class="text-2xl sm:text-2xl md:text-3xl lg:text-4xl font-semibold leading-snug">
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

<div class="mt-4 italic text-center text-lg font-semibold text-slate-800 animate-fade-in delay-800">
  Innovative Approaches to Integrate Sport Science, coaching,<br class="hidden md:block"/>
  physical education, and recreational Sport for a Balance lifestyle.
</div>

<section class="mt-8 animate-slide-in-left delay-300">
  <h2 class="text-center text-lg font-semibold mb-3">Aim and Scope</h2>
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

<section class="flex justify-center mt-8 animate-slide-in-right delay-300">
  <div>
    <h2 class="text-lg font-semibold text-center mb-6">Dates and Venue Activity</h2>
    <div class="grid text-sm text-left items-start" style="grid-template-columns: 1fr 0.5fr 1fr; gap: 1rem;">
      <ul class="space-y-2">
        <li class="list-item">Venue</li>
        <li class="list-item">Abstract Submission</li>
        <li class="list-item">Notification</li>
        <li class="list-item">Full Paper Deadline</li>
        <li class="list-item">Review Result</li>
        <li class="list-item">Camera Ready</li>
        <li class="list-item">Registration Deadline</li>
        <li class="list-item">Conference Date</li>
        <li class="list-item">Workshop</li>
        <li class="list-item">Proceeding Release</li>
        <li class="list-item">Journal Submission</li>
        <li class="list-item">Journal Announce</li>
      </ul>
      <div class="flex justify-center">
        <div class="w-[1px] bg-gray-300 h-full"></div>
      </div>
      <ul class="space-y-2 text-right">
        <li class="list-item">Auditorium Hall</li>
        <li class="list-item">21 Jun 2024</li>
        <li class="list-item">28 Jun 2024</li>
        <li class="list-item">05 Jul 2024</li>
        <li class="list-item">12 Jul 2024</li>
        <li class="list-item">19 Jul 2024</li>
        <li class="list-item">21 Jul 2024</li>
        <li class="list-item">27 Jul 2024</li>
        <li class="list-item">28 Jul 2024</li>
        <li class="list-item">31 Jul 2024</li>
        <li class="list-item">15 Aug 2024</li>
        <li class="list-item">28 Aug 2024</li>
      </ul>
    </div>
  </div>
</section>

<section class="mt-8 mb-10 animate-fade-in delay-800">
  <h2 class="text-center text-lg font-semibold mb-3">Publication</h2>
  <div class="text-center text-sm text-slate-700 items-start">
    <ul class="list-disc inline-block text-left">
      <li class="list-item">Proceeding ISSN</li>
      <li class="list-item">National Indexed Journal (Additional Fee)</li>
    </ul>
  </div>
</section>
@endsection