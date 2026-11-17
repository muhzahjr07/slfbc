<?php
/**
 * Homepage Template
 * Sri Lanka–France Business Council (SLFBC)
 */
$announcement = $settings['bilateral_announcement'] ?? 'Executive Committee 2026/27 Convened — Bilateral Facilitation Active';
$presidentQuote = $settings['president_quote'] ?? 'Our bilateral mission is dedicated to fostering tangible, high-value joint ventures between Sri Lanka and France, bridging enterprise innovation with sovereign institutional support.';
$memberCountDisplay = $settings['member_count_display'] ?? '70+ Firms (Verified)';

$oppImages = [
    'investment-renewable-infrastructure' => 'assets/images/opp-energy.jpg',
    'high-value-bilateral-trade-exports' => 'assets/images/opp-apparel.jpg',
    'market-entry-regulatory-navigation' => 'assets/images/chamber-building.jpg',
    'maritime-supply-chain-alliances' => 'assets/images/opp-maritime.jpg',
    'luxury-tourism-culinary-exchange' => 'assets/images/opp-tourism.jpg',
    'software-engineering-ai-venture-alliances' => 'assets/images/opp-tech.jpg',
];
?>

<!-- TOP PROTOCOL / OFFICIAL BILATERAL ANNOUNCEMENT STRIP -->
<section class="w-full bg-slate-50 border-b border-slate-200 overflow-hidden">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-12 py-2 flex items-center justify-between gap-4 text-xs whitespace-nowrap">
    <div class="flex items-center gap-2.5 min-w-0">
      <span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 bg-white border border-slate-300 text-[#002654] font-bold uppercase tracking-wider rounded shrink-0">
        <span class="w-2 h-2 rounded-full bg-[#b91c1c]"></span>
        Council Dispatch
      </span>
      <p class="font-medium text-slate-700 truncate m-0">
        <?= e(str_ireplace([' | ACCREDITED UNDER THE CEYLON CHAMBER OF COMMERCE', 'under the secretariat administration of the ceylon chamber of commerce', '| ACCREDITED UNDER CCC'], '', $announcement)) ?>
      </p>
    </div>
    <div class="hidden sm:flex items-center gap-2 text-slate-500 font-semibold shrink-0">
      <span class="w-2 h-2 rounded-full bg-emerald-600 inline-block"></span>
      <span class="uppercase tracking-wider text-[11px] text-emerald-800">Term 2026/27 Active</span>
    </div>
  </div>
</section>

<!-- 1. INTERACTIVE HERO CONTENT & IMAGE SLIDER -->
<section id="hero-slider" class="w-full bg-gradient-to-b from-white via-slate-50 to-slate-100/70 border-b border-slate-200 relative overflow-hidden py-12 lg:py-16">
  <div class="absolute top-0 right-0 w-1/3 h-full bg-[radial-gradient(#002654_1px,transparent_1px)] [background-size:24px_24px] opacity-5 pointer-events-none"></div>
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-12 relative z-10">

    <!-- SLIDE 1: Core Bilateral Trade & Investment Mandate -->
    <div class="hero-slide active grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-12 items-center">
      <div class="lg:col-span-7 flex flex-col items-start">
        <div class="inline-flex items-center gap-3 px-3.5 py-1.5 bg-white border border-slate-300 shadow-sm rounded mb-5">
          <div class="flex items-center gap-1 shadow-sm">
            <span class="w-2.5 h-4 bg-[#002654] inline-block"></span>
            <span class="w-2.5 h-4 bg-[#FFFFFF] border-y border-slate-200 inline-block"></span>
            <span class="w-2.5 h-4 bg-[#b91c1c] inline-block"></span>
          </div>
          <div class="w-px h-4 bg-slate-300"></div>
          <div class="flex items-center gap-1 shadow-sm">
            <span class="w-1.5 h-4 bg-[#FFBE29] inline-block"></span>
            <span class="w-1.5 h-4 bg-[#00534E] inline-block"></span>
            <span class="w-2.5 h-4 bg-[#8D153A] inline-block"></span>
            <span class="w-1.5 h-4 bg-[#EB7400] inline-block"></span>
          </div>
          <span class="font-sans font-bold text-xs tracking-wider text-slate-800 uppercase pl-1">
            CEYLON CHAMBER OF COMMERCE • EST. 2004
          </span>
        </div>

        <h1 class="font-serif-diplomatic text-3xl sm:text-4xl lg:text-5xl text-[#0b1e3b] font-bold mb-5 tracking-tight leading-tight">
          Strengthening Business Between <span class="text-[#002654] underline decoration-[#c59b27] decoration-4 underline-offset-8">Sri Lanka</span> &amp; <span class="text-[#b91c1c]">France</span>
        </h1>

        <p class="font-sans text-base sm:text-lg text-slate-700 max-w-2xl mb-7 leading-relaxed">
          The Sri Lanka–France Business Council connects enterprises, sovereign institutions, and investors to structure enduring cross-border trade and strategic joint ventures.
        </p>

        <div class="flex flex-wrap items-center gap-4 w-full sm:w-auto mb-6">
          <a href="<?= url('/apply') ?>" class="btn btn-primary inline-flex items-center gap-2 px-7 py-3.5 shadow-md">
            <span>Become a Member</span>
            <span class="material-symbols-outlined text-lg">arrow_forward</span>
          </a>
          <a href="#opportunities" class="btn btn-outline inline-flex items-center gap-2 px-7 py-3.5 bg-white">
            <span>Explore Opportunities</span>
            <span class="material-symbols-outlined text-lg">expand_more</span>
          </a>
        </div>
      </div>

      <div class="lg:col-span-5 flex flex-col">
        <div class="relative bg-white border-2 border-slate-200 p-3 rounded-lg shadow-lg">
          <div class="std-hero-img rounded bg-slate-100 border border-slate-200">
            <img src="<?= asset('assets/images/bilateral-summit.jpg') ?>" alt="Bilateral Summit between French and Sri Lankan delegations" class="w-full h-full object-cover">
            <div class="absolute bottom-3 left-3 bg-white/95 backdrop-blur-md px-3 py-1.5 rounded border border-slate-200 shadow-sm flex items-center gap-2">
              <span class="w-2.5 h-2.5 rounded-full bg-[#b91c1c] animate-pulse"></span>
              <span class="text-xs font-bold uppercase tracking-wider text-slate-800">High-Level Bilateral Summit</span>
            </div>
          </div>
          <div class="p-3.5 bg-slate-50 rounded-b mt-2 flex items-center justify-between border-t border-slate-200">
            <div>
              <p class="text-[11px] font-bold uppercase tracking-wider text-[#8d4004] m-0">Accredited Forum</p>
              <p class="font-serif-diplomatic text-base font-bold text-[#0b1e3b] m-0">Colombo–Paris Commercial Axis</p>
            </div>
            <span class="px-2.5 py-1 bg-[#002654] text-white text-[11px] font-bold uppercase rounded">Slide 01 / 04</span>
          </div>
        </div>
      </div>
    </div>

    <!-- SLIDE 2: 2026/27 Executive Committee & 22nd AGM -->
    <div class="hero-slide grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-12 items-center" aria-hidden="true">
      <div class="lg:col-span-7 flex flex-col items-start">
        <div class="inline-flex items-center gap-2 px-3.5 py-1.5 bg-white border border-slate-300 shadow-sm rounded mb-5">
          <span class="w-2.5 h-2.5 rounded-full bg-[#b91c1c]"></span>
          <span class="font-sans font-bold text-xs tracking-wider text-[#002654] uppercase">
            22ND ANNUAL GENERAL MEETING • 2026/27 MANDATE
          </span>
        </div>

        <h2 class="font-serif-diplomatic text-3xl sm:text-4xl lg:text-5xl text-[#0b1e3b] font-bold mb-5 tracking-tight leading-tight">
          Executive Committee <span class="text-[#002654]">2026/27</span> Convened in Colombo
        </h2>

        <p class="font-sans text-base sm:text-lg text-slate-700 max-w-2xl mb-7 leading-relaxed">
          Led by President <strong>Shaameel Mohideen</strong> (Spillburg Holdings) alongside senior industry leaders from John Keells, Noyon Lanka, Hayleys Group, and MAC Holdings under Patron H.E. Rémi Lambert.
        </p>

        <div class="flex flex-wrap items-center gap-4 w-full sm:w-auto mb-6">
          <a href="<?= url('/leadership') ?>" class="btn btn-primary inline-flex items-center gap-2 px-7 py-3.5 shadow-md">
            <span>Meet the Committee</span>
            <span class="material-symbols-outlined text-lg">groups</span>
          </a>
          <a href="<?= url('/ambassador-message') ?>" class="btn btn-outline inline-flex items-center gap-2 px-7 py-3.5 bg-white">
            <span>Ambassador’s Dispatch</span>
            <span class="material-symbols-outlined text-lg">arrow_forward</span>
          </a>
        </div>
      </div>

      <div class="lg:col-span-5 flex flex-col">
        <div class="relative bg-white border-2 border-slate-200 p-3 rounded-lg shadow-lg">
          <div class="std-hero-img rounded bg-slate-100 border border-slate-200">
            <img src="<?= asset('assets/images/agm-governance.jpg') ?>" alt="22nd AGM and Executive Committee Assembly" class="w-full h-full object-cover">
            <div class="absolute bottom-3 left-3 bg-white/95 backdrop-blur-md px-3 py-1.5 rounded border border-slate-200 shadow-sm flex items-center gap-2">
              <span class="w-2.5 h-2.5 rounded-full bg-emerald-600"></span>
              <span class="text-xs font-bold uppercase tracking-wider text-slate-800">22nd Annual General Meeting</span>
            </div>
          </div>
          <div class="p-3.5 bg-slate-50 rounded-b mt-2 flex items-center justify-between border-t border-slate-200">
            <div>
              <p class="text-[11px] font-bold uppercase tracking-wider text-[#8d4004] m-0">Executive Stewardship</p>
              <p class="font-serif-diplomatic text-base font-bold text-[#0b1e3b] m-0">Term 2026/27 Leadership Roster</p>
            </div>
            <span class="px-2.5 py-1 bg-[#002654] text-white text-[11px] font-bold uppercase rounded">Slide 02 / 04</span>
          </div>
        </div>
      </div>
    </div>

    <!-- SLIDE 3: Maritime, Clean Energy & Trade Corridors -->
    <div class="hero-slide grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-12 items-center" aria-hidden="true">
      <div class="lg:col-span-7 flex flex-col items-start">
        <div class="inline-flex items-center gap-2 px-3.5 py-1.5 bg-white border border-slate-300 shadow-sm rounded mb-5">
          <span class="w-2.5 h-2.5 rounded-full bg-[#c59b27]"></span>
          <span class="font-sans font-bold text-xs tracking-wider text-[#8d4004] uppercase">
            INDO-PACIFIC &amp; EUROPEAN SINGLE MARKET GATEWAY
          </span>
        </div>

        <h2 class="font-serif-diplomatic text-3xl sm:text-4xl lg:text-5xl text-[#0b1e3b] font-bold mb-5 tracking-tight leading-tight">
          Indian Ocean Maritime Hub Meets <span class="text-[#b91c1c]">European Industry</span>
        </h2>

        <p class="font-sans text-base sm:text-lg text-slate-700 max-w-2xl mb-7 leading-relaxed">
          Bridging the Port of Colombo and Port City Special Economic Zone with Le Havre, Marseille, and Paris across maritime transshipment, renewable energy, and EU GSP+ exports.
        </p>

        <div class="flex flex-wrap items-center gap-4 w-full sm:w-auto mb-6">
          <a href="<?= url('/france-business') ?>" class="btn btn-primary inline-flex items-center gap-2 px-7 py-3.5 shadow-md">
            <span>Doing Business with France</span>
            <span class="material-symbols-outlined text-lg">flight_takeoff</span>
          </a>
          <a href="<?= url('/srilanka-business') ?>" class="btn btn-outline inline-flex items-center gap-2 px-7 py-3.5 bg-white">
            <span>Sri Lanka Investment Guide</span>
            <span class="material-symbols-outlined text-lg">sailing</span>
          </a>
        </div>
      </div>

      <div class="lg:col-span-5 flex flex-col">
        <div class="relative bg-white border-2 border-slate-200 p-3 rounded-lg shadow-lg">
          <div class="std-hero-img rounded bg-slate-100 border border-slate-200">
            <img src="<?= asset('assets/images/corridor-maritime.jpg') ?>" alt="Colombo to Marseille Maritime Logistics Corridor" class="w-full h-full object-cover">
            <div class="absolute bottom-3 left-3 bg-white/95 backdrop-blur-md px-3 py-1.5 rounded border border-slate-200 shadow-sm flex items-center gap-2">
              <span class="w-2.5 h-2.5 rounded-full bg-[#002654]"></span>
              <span class="text-xs font-bold uppercase tracking-wider text-slate-800">Colombo–Marseille Freight Corridor</span>
            </div>
          </div>
          <div class="p-3.5 bg-slate-50 rounded-b mt-2 flex items-center justify-between border-t border-slate-200">
            <div>
              <p class="text-[11px] font-bold uppercase tracking-wider text-[#8d4004] m-0">Bilateral Supply Chains</p>
              <p class="font-serif-diplomatic text-base font-bold text-[#0b1e3b] m-0">450M EU Consumers &amp; South Asia Hub</p>
            </div>
            <span class="px-2.5 py-1 bg-[#002654] text-white text-[11px] font-bold uppercase rounded">Slide 03 / 04</span>
          </div>
        </div>
      </div>
    </div>

    <!-- SLIDE 4: 2026 Bilateral Investment Forum & Delegations -->
    <div class="hero-slide grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-12 items-center" aria-hidden="true">
      <div class="lg:col-span-7 flex flex-col items-start">
        <div class="inline-flex items-center gap-2 px-3.5 py-1.5 bg-white border border-slate-300 shadow-sm rounded mb-5">
          <span class="w-2.5 h-2.5 rounded-full bg-emerald-600"></span>
          <span class="font-sans font-bold text-xs tracking-wider text-emerald-800 uppercase">
            UPCOMING DELEGATIONS &amp; MINISTERIAL SUMMITS
          </span>
        </div>

        <h2 class="font-serif-diplomatic text-3xl sm:text-4xl lg:text-5xl text-[#0b1e3b] font-bold mb-5 tracking-tight leading-tight">
          2026 Bilateral <span class="text-[#002654]">Investment Forum</span> &amp; Trade Missions
        </h2>

        <p class="font-sans text-base sm:text-lg text-slate-700 max-w-2xl mb-7 leading-relaxed">
          Participate in high-level C-suite matchmaking, incoming French industrial contractor delegations, and outbound executive trade missions to Paris and Lyon.
        </p>

        <div class="flex flex-wrap items-center gap-4 w-full sm:w-auto mb-6">
          <a href="<?= url('/events') ?>" class="btn btn-primary inline-flex items-center gap-2 px-7 py-3.5 shadow-md">
            <span>View Summits &amp; Events</span>
            <span class="material-symbols-outlined text-lg">event</span>
          </a>
          <a href="<?= url('/news') ?>" class="btn btn-outline inline-flex items-center gap-2 px-7 py-3.5 bg-white">
            <span>Latest Communiqués</span>
            <span class="material-symbols-outlined text-lg">newspaper</span>
          </a>
        </div>
      </div>

      <div class="lg:col-span-5 flex flex-col">
        <div class="relative bg-white border-2 border-slate-200 p-3 rounded-lg shadow-lg">
          <div class="std-hero-img rounded bg-slate-100 border border-slate-200">
            <img src="<?= asset('assets/images/investment-forum.jpg') ?>" alt="2026 Bilateral Investment Forum" class="w-full h-full object-cover">
            <div class="absolute bottom-3 left-3 bg-white/95 backdrop-blur-md px-3 py-1.5 rounded border border-slate-200 shadow-sm flex items-center gap-2">
              <span class="w-2.5 h-2.5 rounded-full bg-emerald-600 animate-pulse"></span>
              <span class="text-xs font-bold uppercase tracking-wider text-slate-800">Registrations Open</span>
            </div>
          </div>
          <div class="p-3.5 bg-slate-50 rounded-b mt-2 flex items-center justify-between border-t border-slate-200">
            <div>
              <p class="text-[11px] font-bold uppercase tracking-wider text-[#8d4004] m-0">Paris &amp; Colombo</p>
              <p class="font-serif-diplomatic text-base font-bold text-[#0b1e3b] m-0">B2B Matchmaking &amp; Ministerial Dialogues</p>
            </div>
            <span class="px-2.5 py-1 bg-[#002654] text-white text-[11px] font-bold uppercase rounded">Slide 04 / 04</span>
          </div>
        </div>
      </div>
    </div>

    <!-- Hero Slider Controls Bar -->
    <div class="mt-8 pt-6 border-t border-slate-200/80 flex flex-wrap items-center justify-between gap-4">
      <div class="flex items-center gap-2">
        <button type="button" data-hero-dot="0" aria-label="Slide 1" aria-current="true" class="h-2.5 w-8 rounded-full bg-[#002654] transition-all cursor-pointer"></button>
        <button type="button" data-hero-dot="1" aria-label="Slide 2" class="h-2.5 w-2.5 rounded-full bg-slate-300 hover:bg-slate-400 transition-all cursor-pointer"></button>
        <button type="button" data-hero-dot="2" aria-label="Slide 3" class="h-2.5 w-2.5 rounded-full bg-slate-300 hover:bg-slate-400 transition-all cursor-pointer"></button>
        <button type="button" data-hero-dot="3" aria-label="Slide 4" class="h-2.5 w-2.5 rounded-full bg-slate-300 hover:bg-slate-400 transition-all cursor-pointer"></button>
      </div>

      <div class="flex items-center gap-2">
        <button type="button" data-hero-prev aria-label="Previous slide" class="w-9 h-9 rounded border border-slate-300 bg-white hover:bg-[#002654] hover:text-white hover:border-[#002654] text-slate-700 flex items-center justify-center transition-colors shadow-sm cursor-pointer">
          <span class="material-symbols-outlined text-lg">chevron_left</span>
        </button>
        <button type="button" data-hero-next aria-label="Next slide" class="w-9 h-9 rounded border border-slate-300 bg-white hover:bg-[#002654] hover:text-white hover:border-[#002654] text-slate-700 flex items-center justify-center transition-colors shadow-sm cursor-pointer">
          <span class="material-symbols-outlined text-lg">chevron_right</span>
        </button>
      </div>
    </div>

    <!-- Compact Metric Bar -->
    <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 mt-8">
      <div class="p-4 bg-white border-l-4 border-l-[#002654] border border-slate-200 rounded shadow-sm flex items-center gap-3.5">
        <span class="material-symbols-outlined text-3xl text-[#002654] shrink-0">history_edu</span>
        <div>
          <p class="font-serif-diplomatic text-2xl font-bold text-[#0b1e3b] m-0">20+ Years</p>
          <p class="text-xs font-semibold text-slate-600 m-0">Established 2004 (CCC)</p>
        </div>
      </div>
      <div class="p-4 bg-white border-l-4 border-l-[#b91c1c] border border-slate-200 rounded shadow-sm flex items-center gap-3.5">
        <span class="material-symbols-outlined text-3xl text-[#b91c1c] shrink-0">domain</span>
        <div>
          <p class="font-serif-diplomatic text-2xl font-bold text-[#0b1e3b] m-0"><?= e($memberCountDisplay) ?></p>
          <p class="text-xs font-semibold text-slate-600 m-0">Corporate Network</p>
        </div>
      </div>
      <div class="p-4 bg-white border-l-4 border-l-[#c59b27] border border-slate-200 rounded shadow-sm flex items-center gap-3.5">
        <span class="material-symbols-outlined text-3xl text-[#8d4004] shrink-0">flight_takeoff</span>
        <div>
          <p class="font-serif-diplomatic text-2xl font-bold text-[#0b1e3b] m-0">Annual</p>
          <p class="text-xs font-semibold text-slate-600 m-0">Colombo–Paris Missions</p>
        </div>
      </div>
      <div class="p-4 bg-white border-l-4 border-l-slate-800 border border-slate-200 rounded shadow-sm flex items-center gap-3.5">
        <span class="material-symbols-outlined text-3xl text-slate-800 shrink-0">verified</span>
        <div>
          <p class="font-serif-diplomatic text-2xl font-bold text-[#0b1e3b] m-0">Official</p>
          <p class="text-xs font-semibold text-slate-600 m-0">Embassy &amp; MEDEF Conduit</p>
        </div>
      </div>
    </div>

  </div>
</section>

<!-- 2.INFINITE AUTO-SCROLLING CORPORATE MEMBER MARQUEE -->
<section class="w-full bg-white py-8 border-b border-slate-200 overflow-hidden">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-12 mb-4 flex items-center justify-between">
    <span class="text-xs font-bold uppercase tracking-widest text-slate-500 flex items-center gap-2">
      <span class="w-2 h-2 rounded-full bg-[#002654]"></span>
      Trusted by Leading Bilateral Enterprises &amp; Multinationals
    </span>
    <a href="<?= url('/members') ?>" class="text-xs font-bold text-[#002654] hover:underline flex items-center gap-1">
      Full Directory <span class="material-symbols-outlined text-sm">arrow_forward</span>
    </a>
  </div>
  <div class="marquee-wrapper">
    <div class="marquee-track gap-4 px-4">
      <?php
      $marqueeItems = array_merge($featuredMembers, $featuredMembers);
      foreach ($marqueeItems as $fm):
        $initials = strtoupper(substr(preg_replace('/[^A-Za-z]/', '', $fm['name']), 0, 2));
      ?>
        <a href="<?= url('/members/' . e($fm['slug'])) ?>" class="px-5 py-3 bg-slate-50 border border-slate-200 rounded-lg flex items-center gap-3.5 hover:border-[#002654] hover:bg-white hover:shadow-sm transition-all shrink-0">
          <div class="w-10 h-10 rounded bg-[#002654] text-white font-serif-diplomatic font-bold text-sm flex items-center justify-center shrink-0">
            <?= e($initials) ?>
          </div>
          <div>
            <p class="font-serif-diplomatic text-sm font-bold text-[#0b1e3b] m-0 whitespace-nowrap"><?= e($fm['name']) ?></p>
            <span class="text-[11px] font-semibold text-slate-500 uppercase block"><?= e($fm['sector_name'] ?? 'Bilateral Member') ?></span>
          </div>
        </a>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- 3. STRATEGIC BILATERAL CORRIDORS (Visual Image Cards) -->
<section class="w-full bg-slate-50 py-16 border-b border-slate-200">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-12">
    <div class="text-center max-w-3xl mx-auto mb-12">
      <div class="inline-flex items-center gap-2 mb-2">
        <span class="w-2 h-2 bg-[#c59b27] inline-block"></span>
        <span class="text-xs font-bold uppercase tracking-widest text-[#8d4004]">Strategic Bilateral Corridors</span>
        <span class="w-2 h-2 bg-[#c59b27] inline-block"></span>
      </div>
      <h2 class="font-serif-diplomatic text-2xl sm:text-3xl lg:text-4xl text-[#0b1e3b] font-bold m-0">
        Two Economies. One High-Value Axis.
      </h2>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 items-stretch">
      <!-- Corridor A: Sri Lanka -->
      <div class="bg-white border-2 border-slate-200 rounded-lg overflow-hidden flex flex-col justify-between shadow-sm hover:shadow-md transition-all group">
        <div>
          <div class="std-corridor-img bg-slate-900">
            <img src="<?= asset('assets/images/corridor-srilanka.jpg') ?>" alt="Colombo Port and Sri Lanka Maritime Hub" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
            <div class="absolute inset-0 bg-gradient-to-t from-[#0b1e3b]/90 via-[#0b1e3b]/30 to-transparent"></div>
            <div class="absolute bottom-4 left-6 right-6 flex items-end justify-between">
              <div>
                <span class="px-2.5 py-1 bg-[#002654] text-white font-bold text-[11px] uppercase rounded inline-block mb-1.5">Inward Corridor</span>
                <h3 class="font-serif-diplomatic text-2xl font-bold text-white m-0">Why Sri Lanka</h3>
              </div>
              <span class="text-xs font-bold uppercase tracking-wider text-amber-300">For French Enterprises</span>
            </div>
          </div>
          <div class="p-6 lg:p-8">
            <ul class="space-y-4 list-none p-0 m-0">
              <li class="flex items-start gap-3.5">
                <div class="mt-0.5 w-8 h-8 rounded bg-blue-50 border border-blue-200 flex items-center justify-center shrink-0 text-[#002654]">
                  <span class="material-symbols-outlined text-lg">sailing</span>
                </div>
                <div>
                  <h4 class="font-serif-diplomatic text-sm sm:text-base font-bold text-[#0b1e3b] m-0">Indian Ocean Maritime &amp; Logistics Hub</h4>
                  <p class="text-xs sm:text-sm text-slate-600 mt-0.5 m-0">Top-25 global container port offering French shipping lines unmatched South Asian connectivity.</p>
                </div>
              </li>
              <li class="flex items-start gap-3.5">
                <div class="mt-0.5 w-8 h-8 rounded bg-blue-50 border border-blue-200 flex items-center justify-center shrink-0 text-[#002654]">
                  <span class="material-symbols-outlined text-lg">energy_savings_leaf</span>
                </div>
                <div>
                  <h4 class="font-serif-diplomatic text-sm sm:text-base font-bold text-[#0b1e3b] m-0">Clean Energy &amp; Sustainable Manufacturing</h4>
                  <p class="text-xs sm:text-sm text-slate-600 mt-0.5 m-0">Multi-gigawatt offshore wind, solar, and green hydrogen pipelines plus carbon-neutral apparel plants.</p>
                </div>
              </li>
              <li class="flex items-start gap-3.5">
                <div class="mt-0.5 w-8 h-8 rounded bg-blue-50 border border-blue-200 flex items-center justify-center shrink-0 text-[#002654]">
                  <span class="material-symbols-outlined text-lg">domain</span>
                </div>
                <div>
                  <h4 class="font-serif-diplomatic text-sm sm:text-base font-bold text-[#0b1e3b] m-0">Port City Colombo Special Economic Zone</h4>
                  <p class="text-xs sm:text-sm text-slate-600 mt-0.5 m-0">Common-law jurisdiction, multi-currency banking, and statutory tax holidays for regional headquarters.</p>
                </div>
              </li>
            </ul>
          </div>
        </div>
        <div class="px-6 py-4 bg-slate-50 border-t border-slate-200 flex items-center justify-between">
          <span class="text-xs font-bold text-slate-500 uppercase">BOI &amp; CCC Facilitation</span>
          <a href="<?= url('/srilanka-business') ?>" class="text-sm font-bold text-[#002654] hover:underline inline-flex items-center gap-1">
            Explore Sri Lanka Guide <span class="material-symbols-outlined text-base">arrow_forward</span>
          </a>
        </div>
      </div>

      <!-- Corridor B: France -->
      <div class="bg-white border-2 border-slate-200 rounded-lg overflow-hidden flex flex-col justify-between shadow-sm hover:shadow-md transition-all group">
        <div>
          <div class="std-corridor-img bg-slate-900">
            <img src="<?= asset('assets/images/corridor-france.jpg') ?>" alt="Paris Business District and European Single Market" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
            <div class="absolute inset-0 bg-gradient-to-t from-[#0b1e3b]/90 via-[#0b1e3b]/30 to-transparent"></div>
            <div class="absolute bottom-4 left-6 right-6 flex items-end justify-between">
              <div>
                <span class="px-2.5 py-1 bg-[#b91c1c] text-white font-bold text-[11px] uppercase rounded inline-block mb-1.5">Outward Corridor</span>
                <h3 class="font-serif-diplomatic text-2xl font-bold text-white m-0">Why France</h3>
              </div>
              <span class="text-xs font-bold uppercase tracking-wider text-amber-300">For Sri Lankan Enterprises</span>
            </div>
          </div>
          <div class="p-6 lg:p-8">
            <ul class="space-y-4 list-none p-0 m-0">
              <li class="flex items-start gap-3.5">
                <div class="mt-0.5 w-8 h-8 rounded bg-red-50 border border-red-200 flex items-center justify-center shrink-0 text-[#b91c1c]">
                  <span class="material-symbols-outlined text-lg">flight</span>
                </div>
                <div>
                  <h4 class="font-serif-diplomatic text-sm sm:text-base font-bold text-[#0b1e3b] m-0">Aerospace &amp; Deep Industrial Technology</h4>
                  <p class="text-xs sm:text-sm text-slate-600 mt-0.5 m-0">Direct entry into European aerospace tiers, precision engineering, and joint R&amp;D consortia.</p>
                </div>
              </li>
              <li class="flex items-start gap-3.5">
                <div class="mt-0.5 w-8 h-8 rounded bg-red-50 border border-red-200 flex items-center justify-center shrink-0 text-[#b91c1c]">
                  <span class="material-symbols-outlined text-lg">euro</span>
                </div>
                <div>
                  <h4 class="font-serif-diplomatic text-sm sm:text-base font-bold text-[#0b1e3b] m-0">Gateway to 450 Million EU Consumers</h4>
                  <p class="text-xs sm:text-sm text-slate-600 mt-0.5 m-0">Duty-advantaged GSP+ access for Ceylon specialty tea, ethical apparel, rubber, and IT services.</p>
                </div>
              </li>
              <li class="flex items-start gap-3.5">
                <div class="mt-0.5 w-8 h-8 rounded bg-red-50 border border-red-200 flex items-center justify-center shrink-0 text-[#b91c1c]">
                  <span class="material-symbols-outlined text-lg">diamond</span>
                </div>
                <div>
                  <h4 class="font-serif-diplomatic text-sm sm:text-base font-bold text-[#0b1e3b] m-0">Global Benchmark in Luxury &amp; Gastronomy</h4>
                  <p class="text-xs sm:text-sm text-slate-600 mt-0.5 m-0">Partnerships with French fashion houses, gourmet retail chains, and sustainable hospitality groups.</p>
                </div>
              </li>
            </ul>
          </div>
        </div>
        <div class="px-6 py-4 bg-slate-50 border-t border-slate-200 flex items-center justify-between">
          <span class="text-xs font-bold text-slate-500 uppercase">Business France Liaison</span>
          <a href="<?= url('/france-business') ?>" class="text-sm font-bold text-[#b91c1c] hover:underline inline-flex items-center gap-1">
            Explore France Guide <span class="material-symbols-outlined text-base">arrow_forward</span>
          </a>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- 4. PRIORITY BUSINESS OPPORTUNITIES (INTERACTIVE IMAGE CAROUSEL) -->
<section class="w-full bg-white py-16 border-b border-slate-200" id="opportunities" data-carousel>
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-12">
    <div class="flex flex-col md:flex-row md:items-end justify-between gap-6 mb-10">
      <div>
        <span class="text-xs font-bold text-[#002654] uppercase tracking-widest block mb-2">Priority Commercial Tracks</span>
        <h2 class="font-serif-diplomatic text-2xl sm:text-3xl lg:text-4xl text-[#0b1e3b] font-bold m-0">Explore Business Opportunities</h2>
      </div>
      <div class="flex items-center gap-2">
        <button type="button" data-carousel-prev aria-label="Previous opportunity" class="w-10 h-10 rounded border border-slate-300 bg-white hover:bg-[#002654] hover:text-white text-slate-700 flex items-center justify-center transition-colors shadow-sm cursor-pointer">
          <span class="material-symbols-outlined">chevron_left</span>
        </button>
        <button type="button" data-carousel-next aria-label="Next opportunity" class="w-10 h-10 rounded border border-slate-300 bg-white hover:bg-[#002654] hover:text-white text-slate-700 flex items-center justify-center transition-colors shadow-sm cursor-pointer">
          <span class="material-symbols-outlined">chevron_right</span>
        </button>
        <a href="<?= url('/opportunities') ?>" class="btn btn-outline btn-sm ml-2">View All</a>
      </div>
    </div>

    <!-- Horizontal Scroll-Snap Image Cards -->
    <div data-carousel-track class="carousel-track-3 pb-2">
      <?php foreach ($opportunities as $opp):
        $imgPath = $oppImages[$opp['slug']] ?? 'assets/images/opp-maritime.jpg';
      ?>
        <div class="bg-white border border-slate-200 rounded-lg overflow-hidden flex flex-col justify-between hover:border-[#002654] hover:shadow-md transition-all group">
          <div>
            <div class="std-card-img bg-slate-100">
              <img src="<?= asset($imgPath) ?>" alt="<?= e($opp['title']) ?>" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
              <span class="absolute top-3 left-3 px-2.5 py-1 bg-[#002654]/90 backdrop-blur-sm text-white font-bold text-[11px] uppercase rounded">
                <?= e($opp['track']) ?>
              </span>
              <span class="absolute bottom-3 right-3 w-8 h-8 rounded-full bg-white/95 text-[#002654] flex items-center justify-center shadow">
                <span class="material-symbols-outlined text-base"><?= e($opp['icon']) ?></span>
              </span>
            </div>
            <div class="p-5">
              <h3 class="font-serif-diplomatic text-base sm:text-lg text-[#0b1e3b] font-bold mb-2 group-hover:text-[#002654] transition-colors">
                <a href="<?= url('/opportunities/' . e($opp['slug'])) ?>" class="text-[#0b1e3b] hover:text-[#002654]">
                  <?= e($opp['title']) ?>
                </a>
              </h3>
              <p class="text-slate-600 text-xs sm:text-sm leading-relaxed line-clamp-2 m-0">
                <?= e($opp['summary']) ?>
              </p>
            </div>
          </div>
          <div class="px-5 py-3 bg-slate-50 border-t border-slate-200 flex items-center justify-between">
            <span class="text-[11px] font-semibold text-slate-500 uppercase"><?= e($opp['status_label']) ?></span>
            <a href="<?= url('/opportunities/' . e($opp['slug'])) ?>" class="text-xs font-bold text-[#002654] hover:underline flex items-center gap-1">
              Dossier <span class="material-symbols-outlined text-sm">arrow_forward</span>
            </a>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- 5. NEWS & OFFICIAL EVENTS (WITH VISUAL THUMBNAILS) -->
<section class="w-full bg-slate-50 py-16 border-b border-slate-200">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-12">
    <div class="flex flex-col md:flex-row md:items-end justify-between gap-6 mb-10">
      <div>
        <span class="text-xs font-bold text-[#b91c1c] uppercase tracking-widest block mb-2">Bilateral Dispatches</span>
        <h2 class="font-serif-diplomatic text-2xl sm:text-3xl lg:text-4xl text-[#0b1e3b] font-bold m-0">News &amp; Official Events</h2>
      </div>
      <div class="flex items-center gap-3">
        <a href="<?= url('/events') ?>" class="btn btn-outline btn-sm bg-white">All Events</a>
        <a href="<?= url('/news') ?>" class="btn btn-outline btn-sm bg-white">All News</a>
      </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
      <?php if (!empty($upcomingEvents)): ?>
        <?php foreach (array_slice($upcomingEvents, 0, 1) as $ev): ?>
          <div class="bg-white border-2 border-[#002654]/30 rounded-lg overflow-hidden flex flex-col justify-between shadow-sm hover:shadow-md transition-all group">
            <div>
              <div class="std-card-img bg-slate-100">
                <img src="<?= asset($ev['cover_image'] ?: 'assets/images/investment-forum.jpg') ?>" alt="<?= e($ev['title']) ?>" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                <span class="absolute top-3 left-3 px-2.5 py-1 bg-[#002654] text-white font-bold text-[11px] uppercase tracking-wider rounded shadow">Upcoming Summit</span>
                <span class="absolute bottom-3 left-3 px-2.5 py-0.5 bg-white/95 text-[#b91c1c] font-bold text-xs uppercase rounded shadow"><?= date('M d, Y', strtotime($ev['start_datetime'])) ?></span>
              </div>
              <div class="p-5">
                <h3 class="font-serif-diplomatic text-base sm:text-lg text-[#0b1e3b] font-bold mb-2 group-hover:text-[#002654] transition-colors">
                  <a href="<?= url('/events/' . e($ev['slug'])) ?>" class="text-[#0b1e3b] hover:text-[#002654]">
                    <?= e($ev['title']) ?>
                  </a>
                </h3>
                <p class="text-slate-600 text-xs sm:text-sm leading-relaxed line-clamp-2 mb-3">
                  <?= e($ev['summary']) ?>
                </p>
                <div class="flex items-center gap-1.5 text-slate-600 text-xs font-medium">
                  <span class="material-symbols-outlined text-sm text-[#002654]">location_on</span>
                  <span class="truncate"><?= e($ev['venue']) ?></span>
                </div>
              </div>
            </div>
            <div class="px-5 py-3 border-t border-slate-200 bg-slate-50 flex items-center justify-between">
              <span class="text-[11px] font-bold text-emerald-700 uppercase flex items-center gap-1.5">
                <span class="w-2 h-2 rounded-full bg-emerald-600 inline-block"></span>
                <?= strtoupper(e($ev['registration_status'])) ?>
              </span>
              <a href="<?= url('/events/' . e($ev['slug'])) ?>" class="text-xs font-bold text-[#002654] hover:underline flex items-center">
                Program Details <span class="material-symbols-outlined text-sm ml-1">arrow_forward</span>
              </a>
            </div>
          </div>
        <?php endforeach; ?>
      <?php endif; ?>

      <?php if (!empty($latestNews)): ?>
        <?php foreach (array_slice($latestNews, 0, 2) as $art): ?>
          <div class="bg-white border border-slate-200 rounded-lg overflow-hidden flex flex-col justify-between shadow-sm hover:border-slate-300 hover:shadow-md transition-all group">
            <div>
              <div class="std-card-img bg-slate-100">
                <img src="<?= asset($art['cover_image'] ?: 'assets/images/news-logistics.jpg') ?>" alt="<?= e($art['title']) ?>" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                <span class="absolute top-3 left-3 px-2.5 py-1 bg-white/95 text-[#002654] font-bold text-[11px] uppercase tracking-wider rounded shadow">
                  <?= e($art['category_name'] ?? 'Communiqué') ?>
                </span>
              </div>
              <div class="p-5">
                <span class="text-[11px] font-bold text-slate-400 uppercase block mb-1"><?= date('M d, Y', strtotime($art['published_at'])) ?></span>
                <h3 class="font-serif-diplomatic text-base sm:text-lg text-[#0b1e3b] font-bold mb-2 group-hover:text-[#002654] transition-colors">
                  <a href="<?= url('/news/' . e($art['slug'])) ?>" class="text-[#0b1e3b] hover:text-[#002654]">
                    <?= e($art['title']) ?>
                  </a>
                </h3>
                <p class="text-slate-600 text-xs sm:text-sm leading-relaxed line-clamp-2 m-0">
                  <?= e($art['excerpt']) ?>
                </p>
              </div>
            </div>
            <div class="px-5 py-3 border-t border-slate-200 bg-slate-50 flex items-center justify-between">
              <span class="text-[11px] font-bold text-slate-500 uppercase"><?= e($art['author']) ?></span>
              <a href="<?= url('/news/' . e($art['slug'])) ?>" class="text-xs font-bold text-[#002654] hover:underline flex items-center">
                Read Briefing <span class="material-symbols-outlined text-sm ml-1">arrow_forward</span>
              </a>
            </div>
          </div>
        <?php endforeach; ?>
      <?php endif; ?>
    </div>
  </div>
</section>

<!-- 6. LEADERSHIP SPOTLIGHT & HORIZONTAL COMMITTEE SLIDER -->
<section class="w-full bg-white py-16 border-b border-slate-200" data-carousel>
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-12">
    <div class="flex flex-col md:flex-row md:items-end justify-between gap-6 mb-10">
      <div>
        <span class="text-xs font-bold text-[#b91c1c] uppercase tracking-widest block mb-2">Governance &amp; Executive Leadership</span>
        <h2 class="font-serif-diplomatic text-2xl sm:text-3xl lg:text-4xl text-[#0b1e3b] font-bold m-0">Executive Committee (Term 2026/27)</h2>
      </div>
      <a href="<?= url('/leadership') ?>" class="btn btn-outline btn-sm">Full Governance Roster</a>
    </div>

    <!-- Presidential Spotlight -->
    <?php if ($president): ?>
      <div class="bg-white border-2 border-slate-200 rounded-lg mb-10 shadow-sm overflow-hidden">
        <div class="grid grid-cols-1 lg:grid-cols-12 items-center">
          <div class="lg:col-span-4 p-6 sm:p-8 flex items-center justify-center bg-slate-50 border-b lg:border-b-0 lg:border-r border-slate-200">
            <div class="relative w-48 sm:w-56 md:w-60 aspect-[496/781] rounded-lg overflow-hidden shadow-md border border-slate-200 bg-white">
              <img src="<?= asset($president['portrait_path'] ?? 'assets/images/president-shaameel.jpg') ?>" alt="<?= e($president['name']) ?>" class="w-full h-full object-contain">
            </div>
          </div>
          <div class="lg:col-span-8 p-8 lg:p-10 flex flex-col justify-between">
            <div>
              <div class="inline-flex items-center gap-2 px-3 py-1 bg-slate-100 border border-slate-200 rounded font-sans text-xs font-bold uppercase text-[#b91c1c] mb-3">
                <span class="w-2 h-2 rounded-full bg-[#b91c1c]"></span>
                President's Dispatch
              </div>
              <h3 class="font-serif-diplomatic text-2xl lg:text-3xl text-[#0b1e3b] font-bold m-0"><?= e($president['name']) ?></h3>
              <p class="font-sans text-base font-bold text-[#002654] mb-5 mt-1">
                <?= e($president['role_title']) ?>, Sri Lanka–France Business Council • <?= e($president['organization']) ?>
              </p>
              <blockquote class="font-serif-diplomatic text-base text-slate-700 italic border-l-4 border-[#b91c1c] pl-5 mb-6 leading-relaxed">
                "<?= e($presidentQuote) ?>"
              </blockquote>
            </div>
            <div class="pt-5 border-t border-slate-200 flex flex-wrap items-center justify-between gap-4 text-xs sm:text-sm font-semibold text-slate-600">
              <span>22nd Annual General Meeting Mandate</span>
              <a href="<?= url('/leadership') ?>" class="text-[#002654] font-bold hover:underline flex items-center gap-1">
                View All Committee Officers <span class="material-symbols-outlined text-sm">arrow_forward</span>
              </a>
            </div>
          </div>
        </div>
      </div>
    <?php endif; ?>

    <!-- Committee Members Horizontal Carousel Header -->
    <div class="flex items-center justify-between mb-4">
      <h3 class="font-serif-diplomatic text-lg font-bold text-[#0b1e3b] m-0">Office Bearers &amp; Executive Committee</h3>
      <div class="flex items-center gap-2">
        <button type="button" data-carousel-prev aria-label="Previous committee member" class="w-9 h-9 rounded border border-slate-300 bg-white hover:bg-[#002654] hover:text-white text-slate-700 flex items-center justify-center transition-colors shadow-sm cursor-pointer">
          <span class="material-symbols-outlined text-base">chevron_left</span>
        </button>
        <button type="button" data-carousel-next aria-label="Next committee member" class="w-9 h-9 rounded border border-slate-300 bg-white hover:bg-[#002654] hover:text-white text-slate-700 flex items-center justify-center transition-colors shadow-sm cursor-pointer">
          <span class="material-symbols-outlined text-base">chevron_right</span>
        </button>
      </div>
    </div>

    <!-- Committee Members Single-Row Slider -->
    <div data-carousel-track class="carousel-track-4 pb-2">
      <?php foreach ($committee as $member): if ($member['category'] === 'president') continue;
        $orgInitials = strtoupper(substr(preg_replace('/[^A-Za-z]/', '', $member['organization']), 0, 2));
      ?>
        <div class="p-5 bg-slate-50 border border-slate-200 rounded-lg shadow-sm flex flex-col justify-between hover:border-[#002654] hover:bg-white transition-all">
          <div>
            <div class="flex items-center justify-between gap-2 mb-3">
              <span class="px-2.5 py-0.5 bg-white border border-slate-300 text-[#002654] text-[11px] font-bold uppercase rounded"><?= e($member['role_title']) ?></span>
              <span class="w-8 h-8 rounded-full bg-[#002654]/10 text-[#002654] font-bold text-xs flex items-center justify-center"><?= e($orgInitials) ?></span>
            </div>
            <h4 class="font-serif-diplomatic text-base text-[#0b1e3b] font-bold m-0"><?= e($member['name']) ?></h4>
            <p class="text-xs font-semibold text-slate-600 mt-1 m-0"><?= e($member['organization']) ?></p>
          </div>
          <div class="mt-4 pt-3 border-t border-slate-200 flex items-center justify-between text-[11px] font-bold text-slate-400 uppercase">
            <span>TERM <?= e($member['term_year']) ?></span>
            <span class="text-emerald-700">Verified</span>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- 7. DIPLOMATIC & SUMMIT PHOTO GALLERY SHOWCASE -->
<section class="w-full bg-slate-50 py-16 border-b border-slate-200">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-12">
    <div class="flex flex-col sm:flex-row sm:items-end justify-between gap-4 mb-10">
      <div>
        <span class="text-xs font-bold text-[#002654] uppercase tracking-widest block mb-2">Documentary Archives</span>
        <h2 class="font-serif-diplomatic text-2xl sm:text-3xl text-[#0b1e3b] font-bold m-0">Diplomatic &amp; Chamber Moments</h2>
      </div>
      <a href="<?= url('/gallery') ?>" class="btn btn-outline btn-sm bg-white">Open Media Gallery</a>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
      <a href="<?= url('/gallery') ?>" class="group std-card-img rounded-lg bg-slate-900 shadow-sm border border-slate-200 block">
        <img src="<?= asset('assets/images/bilateral-summit.jpg') ?>" alt="Bilateral Investment Summit" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
        <div class="absolute inset-0 bg-gradient-to-t from-[#0b1e3b]/90 via-transparent to-transparent"></div>
        <div class="absolute bottom-3 left-3 right-3 text-white">
          <span class="text-[10px] font-bold uppercase tracking-wider text-amber-300 block">Paris &amp; Colombo</span>
          <p class="font-serif-diplomatic text-sm font-bold m-0 text-white">Bilateral Investment Summit</p>
        </div>
      </a>
      <a href="<?= url('/gallery') ?>" class="group std-card-img rounded-lg bg-slate-900 shadow-sm border border-slate-200 block">
        <img src="<?= asset('assets/images/agm-governance.jpg') ?>" alt="22nd Annual General Meeting" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
        <div class="absolute inset-0 bg-gradient-to-t from-[#0b1e3b]/90 via-transparent to-transparent"></div>
        <div class="absolute bottom-3 left-3 right-3 text-white">
          <span class="text-[10px] font-bold uppercase tracking-wider text-amber-300 block">Galle Face Hotel</span>
          <p class="font-serif-diplomatic text-sm font-bold m-0 text-white">22nd Annual General Meeting</p>
        </div>
      </a>
      <a href="<?= url('/gallery') ?>" class="group std-card-img rounded-lg bg-slate-900 shadow-sm border border-slate-200 block">
        <img src="<?= asset('assets/images/gallery-embassy.jpg') ?>" alt="Embassy of France Diplomatic Reception" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
        <div class="absolute inset-0 bg-gradient-to-t from-[#0b1e3b]/90 via-transparent to-transparent"></div>
        <div class="absolute bottom-3 left-3 right-3 text-white">
          <span class="text-[10px] font-bold uppercase tracking-wider text-amber-300 block">Embassy of France</span>
          <p class="font-serif-diplomatic text-sm font-bold m-0 text-white">Diplomatic Trade Reception</p>
        </div>
      </a>
      <a href="<?= url('/gallery') ?>" class="group std-card-img rounded-lg bg-slate-900 shadow-sm border border-slate-200 block">
        <img src="<?= asset('assets/images/gallery-b2b.jpg') ?>" alt="Corporate B2B Matchmaking" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
        <div class="absolute inset-0 bg-gradient-to-t from-[#0b1e3b]/90 via-transparent to-transparent"></div>
        <div class="absolute bottom-3 left-3 right-3 text-white">
          <span class="text-[10px] font-bold uppercase tracking-wider text-amber-300 block">Ceylon Chamber</span>
          <p class="font-serif-diplomatic text-sm font-bold m-0 text-white">Incoming Delegation B2B Forum</p>
        </div>
      </a>
    </div>
  </div>
</section>

<!-- 8. FINAL STRATEGIC CTA SECTION -->
<section class="w-full bg-[#002654] text-white relative py-16 overflow-hidden">
  <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-12 text-center relative z-10">
    <div class="inline-flex items-center gap-2 px-3.5 py-1 bg-white/10 border border-white/20 rounded font-sans text-xs uppercase font-bold text-amber-300 mb-5">
      <span class="w-2 h-2 rounded-full bg-amber-400"></span>
      Bilateral Commercial Conduit
    </div>
    <h2 class="font-serif-diplomatic text-3xl sm:text-4xl text-white tracking-tight mb-4 font-bold">
      Build Stronger Sri Lanka–France Business Connections
    </h2>
    <p class="font-sans text-slate-200 text-base max-w-2xl mx-auto mb-8 leading-relaxed">
      Join over 70 accredited multinationals, conglomerates, and export leaders shaping the Colombo–Paris economic corridor.
    </p>
    <div class="flex flex-wrap items-center justify-center gap-4">
      <a href="<?= url('/apply') ?>" class="btn btn-secondary px-8 py-3.5 shadow-lg">
        Become a Member
      </a>
      <a href="<?= url('/contact') ?>" class="btn btn-outline-white px-8 py-3.5">
        Contact Secretariat
      </a>
    </div>
  </div>
</section>
