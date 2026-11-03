<?php
/**
 * Homepage Template
 * Sri Lanka–France Business Council (SLFBC)
 */
$announcement = $settings['bilateral_announcement'] ?? '2026 FORUM REGISTRATIONS OPEN | ACCREDITED UNDER THE CEYLON CHAMBER OF COMMERCE';
$presidentQuote = $settings['president_quote'] ?? 'Our bilateral trade corridor is entering an era defined not merely by transactions, but by structural joint ventures in maritime transshipment, renewable hydrogen, and advanced knowledge engineering.';
$memberCountDisplay = $settings['member_count_display'] ?? '70+ Firms (Verified)';
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

<!-- 1. HERO SECTION -->
<section class="w-full bg-gradient-to-b from-white via-slate-50 to-slate-100/60 border-b border-slate-200 relative overflow-hidden py-14 lg:py-20">
  <div class="absolute top-0 right-0 w-1/3 h-full bg-[radial-gradient(#002654_1px,transparent_1px)] [background-size:24px_24px] opacity-5 pointer-events-none"></div>
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-12 relative z-10">
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
      <!-- Left Content -->
      <div class="lg:col-span-7 flex flex-col items-start">
        <!-- Diplomatic Accreditation Badge -->
        <div class="inline-flex items-center gap-3 px-3.5 py-1.5 bg-white border border-slate-300 shadow-sm rounded mb-6">
          <div class="flex items-center gap-1 shadow-sm">
            <!-- France Tricolor -->
            <span class="w-2.5 h-4 bg-[#002654] inline-block"></span>
            <span class="w-2.5 h-4 bg-[#FFFFFF] border-y border-slate-200 inline-block"></span>
            <span class="w-2.5 h-4 bg-[#b91c1c] inline-block"></span>
          </div>
          <div class="w-px h-4 bg-slate-300"></div>
          <div class="flex items-center gap-1 shadow-sm">
            <!-- Sri Lanka Heraldic Colors -->
            <span class="w-1.5 h-4 bg-[#FFBE29] inline-block"></span>
            <span class="w-1.5 h-4 bg-[#00534E] inline-block"></span>
            <span class="w-2.5 h-4 bg-[#8D153A] inline-block"></span>
            <span class="w-1.5 h-4 bg-[#EB7400] inline-block"></span>
          </div>
          <span class="font-sans font-bold text-xs tracking-wider text-slate-800 uppercase pl-1">
            CEYLON CHAMBER OF COMMERCE • EST. 2004
          </span>
        </div>

        <!-- Hero Headline -->
        <h1 class="font-serif-diplomatic text-3xl sm:text-4xl lg:text-5xl text-[#0b1e3b] font-bold mb-6 tracking-tight leading-tight">
          Strengthening Business Between <span class="text-[#002654] underline decoration-[#c59b27] decoration-4 underline-offset-8">Sri Lanka</span> &amp; <span class="text-[#b91c1c]">France</span>
        </h1>

        <!-- Hero Subtitle -->
        <p class="font-sans text-lg text-slate-700 max-w-2xl mb-8 leading-relaxed">
          The Sri Lanka–France Business Council connects businesses, institutions and investors to structure enduring cross-border trade, strategic investments, and bilateral industrial partnerships.
        </p>

        <!-- High-Contrast CTAs -->
        <div class="flex flex-wrap items-center gap-4 w-full sm:w-auto mb-10">
          <a href="<?= url('/apply') ?>" class="btn btn-primary inline-flex items-center gap-2 px-7 py-3.5 shadow-md">
            <span>Become a Member</span>
            <span class="material-symbols-outlined text-lg">arrow_forward</span>
          </a>
          <a href="#opportunities" class="btn btn-outline inline-flex items-center gap-2 px-7 py-3.5 bg-white">
            <span>Explore Opportunities</span>
            <span class="material-symbols-outlined text-lg">expand_more</span>
          </a>
        </div>

        <!-- Bilateral Endorsement Note -->
        <div class="flex items-center gap-3 pt-6 border-t border-slate-200 w-full max-w-xl">
          <span class="material-symbols-outlined text-[#c59b27] text-2xl shrink-0">verified</span>
          <p class="text-xs sm:text-sm font-medium text-slate-600 leading-normal m-0">
            Officially recognized platform facilitating commercial dialogue with the Embassy of France in Colombo and the Sri Lankan Embassy in Paris.
          </p>
        </div>
      </div>

      <!-- Right Visual Dossier: Summit Image with Diplomatic Frame -->
      <div class="lg:col-span-5 flex flex-col">
        <div class="relative bg-white border-2 border-slate-200 p-3 rounded-md shadow-lg">
          <div class="relative overflow-hidden aspect-[4/3] rounded bg-slate-100 border border-slate-200">
            <img src="<?= asset('assets/images/bilateral-summit.jpg') ?>" alt="Bilateral Summit between French and Sri Lankan delegations" class="w-full h-full object-cover">
            <div class="absolute bottom-3 left-3 bg-white/95 backdrop-blur-md px-3.5 py-1.5 rounded border border-slate-200 shadow-sm flex items-center gap-2.5">
              <span class="w-2.5 h-2.5 rounded-full bg-[#b91c1c] animate-pulse"></span>
              <span class="text-xs font-bold uppercase tracking-wider text-slate-800">
                High-Level Bilateral Summit
              </span>
            </div>
          </div>
          <div class="p-4 bg-slate-50 rounded-b mt-2 flex items-center justify-between border-t border-slate-200">
            <div>
              <p class="text-xs font-bold uppercase tracking-wider text-[#8d4004] m-0">Accredited Forum</p>
              <p class="font-serif-diplomatic text-base sm:text-lg font-bold text-[#0b1e3b] mt-0.5 m-0">Colombo–Paris Axis</p>
            </div>
            <div class="text-right">
              <span class="text-xs font-bold text-[#b91c1c] uppercase tracking-wider block">Executive Protocol</span>
              <span class="text-xs sm:text-sm text-slate-600 font-medium">CCC Bilateral Wing</span>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Metric Bar / Indicators -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5 mt-16 pt-10 border-t border-slate-200">
      <div class="p-6 bg-white border-l-4 border-l-[#002654] border border-slate-200 rounded shadow-sm">
        <p class="font-serif-diplomatic text-3xl font-bold text-[#0b1e3b] m-0">20+ <span class="text-[#002654] text-xl font-sans font-semibold">Years</span></p>
        <p class="text-base font-bold text-[#002654] mt-1 mb-1">Institutional Continuity</p>
        <p class="text-xs sm:text-sm text-slate-600 m-0 leading-relaxed">Continuous cross-border commercial facilitation under the Ceylon Chamber since 2004.</p>
      </div>
      <div class="p-6 bg-white border-l-4 border-l-[#b91c1c] border border-slate-200 rounded shadow-sm">
        <p class="font-serif-diplomatic text-3xl font-bold text-[#0b1e3b] m-0"><?= e($memberCountDisplay) ?></p>
        <p class="text-base font-bold text-[#b91c1c] mt-1 mb-1">Corporate Member Network</p>
        <p class="text-xs sm:text-sm text-slate-600 m-0 leading-relaxed">Conglomerates, tier-1 exporters, multinationals, and strategic service providers.</p>
      </div>
      <div class="p-6 bg-white border-l-4 border-l-[#c59b27] border border-slate-200 rounded shadow-sm">
        <p class="font-serif-diplomatic text-3xl font-bold text-[#0b1e3b] m-0">Annual</p>
        <p class="text-base font-bold text-[#8d4004] mt-1 mb-1">Trade &amp; Investment Missions</p>
        <p class="text-xs sm:text-sm text-slate-600 m-0 leading-relaxed">Direct delegation itineraries hosted in Paris, Lyon, Colombo, and Port City.</p>
      </div>
      <div class="p-6 bg-white border-l-4 border-l-slate-800 border border-slate-200 rounded shadow-sm">
        <p class="font-serif-diplomatic text-3xl font-bold text-[#0b1e3b] m-0">Official</p>
        <p class="text-base font-bold text-slate-800 mt-1 mb-1">Sovereign &amp; Chamber Channel</p>
        <p class="text-xs sm:text-sm text-slate-600 m-0 leading-relaxed">Direct conduit to MEDEF International, Business France, and statutory ministries.</p>
      </div>
    </div>
  </div>
</section>

<!-- 2. COUNCIL INTRODUCTION & WHAT WE DO -->
<section class="w-full bg-white py-20 border-b border-slate-200">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-12">
    <div class="flex flex-col lg:flex-row lg:items-end justify-between gap-6 pb-10 border-b border-slate-200">
      <div>
        <div class="flex items-center gap-2 mb-2">
          <span class="w-2.5 h-2.5 bg-[#b91c1c] inline-block"></span>
          <span class="text-xs font-bold uppercase tracking-widest text-[#b91c1c]">Bilateral Chamber Mandate</span>
        </div>
        <h2 class="font-serif-diplomatic text-2xl sm:text-3xl lg:text-4xl text-[#0b1e3b] font-bold m-0">
          Connecting Sri Lanka &amp; France
        </h2>
      </div>
      <p class="font-sans text-base sm:text-lg text-slate-600 max-w-xl m-0 leading-relaxed">
        Operating as the primary executive vehicle for commercial diplomacy, industrial cooperation, and direct capital deployment between the two republics.
      </p>
    </div>

    <!-- 4 Feature Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mt-12">
      <!-- Card 1 -->
      <div class="p-8 bg-slate-50 border border-slate-200 rounded hover:border-[#002654] hover:bg-white hover:shadow-md transition-all flex flex-col justify-between group">
        <div>
          <div class="w-14 h-14 rounded bg-blue-50 border border-blue-100 flex items-center justify-center text-[#002654] mb-6 group-hover:bg-[#002654] group-hover:text-white transition-colors">
            <span class="material-symbols-outlined text-3xl">account_balance</span>
          </div>
          <span class="text-xs font-bold text-[#8d4004] uppercase tracking-wider block mb-2">Pillar 01</span>
          <h3 class="font-serif-diplomatic text-xl text-[#0b1e3b] font-bold mb-3">Trade &amp; Investment</h3>
          <p class="text-slate-600 leading-relaxed text-sm mb-0">
            Structuring direct foreign investments, export expansion roadmaps, and high-value joint ventures across maritime logistics, energy, and advanced manufacturing.
          </p>
        </div>
        <div class="pt-6 mt-6 border-t border-slate-200 flex items-center text-[#002654] font-bold text-sm">
          <span>Capital Structuring</span>
          <span class="material-symbols-outlined ml-auto text-base">arrow_forward</span>
        </div>
      </div>

      <!-- Card 2 -->
      <div class="p-8 bg-slate-50 border border-slate-200 rounded hover:border-[#b91c1c] hover:bg-white hover:shadow-md transition-all flex flex-col justify-between group">
        <div>
          <div class="w-14 h-14 rounded bg-red-50 border border-red-100 flex items-center justify-center text-[#b91c1c] mb-6 group-hover:bg-[#b91c1c] group-hover:text-white transition-colors">
            <span class="material-symbols-outlined text-3xl">groups_3</span>
          </div>
          <span class="text-xs font-bold text-[#8d4004] uppercase tracking-wider block mb-2">Pillar 02</span>
          <h3 class="font-serif-diplomatic text-xl text-[#0b1e3b] font-bold mb-3">Business Networking</h3>
          <p class="text-slate-600 leading-relaxed text-sm mb-0">
            Exclusive roundtables and bilateral C-suite summits connecting board chairs, French trade delegates, treasury advisors, and ministry policymakers in Colombo and Paris.
          </p>
        </div>
        <div class="pt-6 mt-6 border-t border-slate-200 flex items-center text-[#b91c1c] font-bold text-sm">
          <span>Executive Access</span>
          <span class="material-symbols-outlined ml-auto text-base">arrow_forward</span>
        </div>
      </div>

      <!-- Card 3 -->
      <div class="p-8 bg-slate-50 border border-slate-200 rounded hover:border-[#002654] hover:bg-white hover:shadow-md transition-all flex flex-col justify-between group">
        <div>
          <div class="w-14 h-14 rounded bg-blue-50 border border-blue-100 flex items-center justify-center text-[#002654] mb-6 group-hover:bg-[#002654] group-hover:text-white transition-colors">
            <span class="material-symbols-outlined text-3xl">policy</span>
          </div>
          <span class="text-xs font-bold text-[#8d4004] uppercase tracking-wider block mb-2">Pillar 03</span>
          <h3 class="font-serif-diplomatic text-xl text-[#0b1e3b] font-bold mb-3">Market Access</h3>
          <p class="text-slate-600 leading-relaxed text-sm mb-0">
            Authoritative statutory guidance, EU standard compliance verification, GSP+ framework advisory, and trade barrier navigation for rapid market penetration.
          </p>
        </div>
        <div class="pt-6 mt-6 border-t border-slate-200 flex items-center text-[#002654] font-bold text-sm">
          <span>Regulatory Defense</span>
          <span class="material-symbols-outlined ml-auto text-base">arrow_forward</span>
        </div>
      </div>

      <!-- Card 4 -->
      <div class="p-8 bg-slate-50 border border-slate-200 rounded hover:border-[#8d4004] hover:bg-white hover:shadow-md transition-all flex flex-col justify-between group">
        <div>
          <div class="w-14 h-14 rounded bg-amber-50 border border-amber-100 flex items-center justify-center text-[#8d4004] mb-6 group-hover:bg-[#c59b27] group-hover:text-white transition-colors">
            <span class="material-symbols-outlined text-3xl">handshake</span>
          </div>
          <span class="text-xs font-bold text-[#8d4004] uppercase tracking-wider block mb-2">Pillar 04</span>
          <h3 class="font-serif-diplomatic text-xl text-[#0b1e3b] font-bold mb-3">Institutional Liaison</h3>
          <p class="text-slate-600 leading-relaxed text-sm mb-0">
            Uninterrupted access to the French Embassy, MEDEF International, Business France, the Board of Investment (BOI), and the Export Development Board of Sri Lanka.
          </p>
        </div>
        <div class="pt-6 mt-6 border-t border-slate-200 flex items-center text-[#8d4004] font-bold text-sm">
          <span>Diplomatic Channels</span>
          <span class="material-symbols-outlined ml-auto text-base">arrow_forward</span>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- 3. STRATEGIC BILATERAL CORRIDORS (Why Sri Lanka / Why France) -->
<section class="w-full bg-slate-50 py-20 border-b border-slate-200">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-12">
    <div class="text-center max-w-3xl mx-auto mb-16">
      <div class="inline-flex items-center gap-2 mb-3">
        <span class="w-2 h-2 bg-[#c59b27] inline-block"></span>
        <span class="text-xs font-bold uppercase tracking-widest text-[#8d4004]">Strategic Bilateral Corridors</span>
        <span class="w-2 h-2 bg-[#c59b27] inline-block"></span>
      </div>
      <h2 class="font-serif-diplomatic text-2xl sm:text-3xl lg:text-4xl text-[#0b1e3b] font-bold m-0">
        Two Economies. One High-Value Axis.
      </h2>
      <p class="font-sans text-base sm:text-lg text-slate-600 mt-4 leading-relaxed m-0">
        Unlocking complementary strengths across the Indo-Pacific maritime epicenter and Europe’s premier industrial power.
      </p>
    </div>

    <!-- Split Visual Comparison Dossier -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 items-stretch">
      <!-- Corridor A: Sri Lanka for French Enterprises -->
      <div class="bg-white border-2 border-slate-200 rounded-lg p-8 lg:p-10 flex flex-col justify-between shadow-sm hover:shadow-md transition-all">
        <div>
          <div class="flex flex-wrap items-center justify-between pb-6 border-b border-slate-200 gap-2">
            <div class="flex items-center gap-3">
              <span class="px-3 py-1 bg-blue-50 border border-blue-200 font-bold text-xs uppercase text-[#002654] rounded">
                Inward Corridor
              </span>
              <span class="font-serif-diplomatic text-2xl font-bold text-[#0b1e3b]">Why Sri Lanka</span>
            </div>
            <span class="text-xs font-bold uppercase tracking-wider text-slate-500">For French Enterprises</span>
          </div>
          <p class="text-slate-700 font-medium my-6 leading-relaxed">
            A strategically positioned transshipment hub at the center of the world's most vital Indian Ocean shipping lanes, combining competitive operational costs with sophisticated human capital.
          </p>
          <ul class="space-y-6 list-none p-0 m-0">
            <li class="flex items-start gap-4">
              <div class="mt-1 w-8 h-8 rounded bg-blue-50 border border-blue-200 flex items-center justify-center shrink-0 text-[#002654]">
                <span class="material-symbols-outlined text-lg">sailing</span>
              </div>
              <div>
                <h4 class="font-serif-diplomatic text-base font-bold text-[#0b1e3b] m-0">Indian Ocean Maritime &amp; Logistics Hub</h4>
                <p class="text-sm text-slate-600 mt-1 m-0 leading-relaxed">Colombo Port ranks among the world's top 25 container ports, offering French shipping and supply chain conglomerates unrivaled connectivity across South Asia.</p>
              </div>
            </li>
            <li class="flex items-start gap-4">
              <div class="mt-1 w-8 h-8 rounded bg-blue-50 border border-blue-200 flex items-center justify-center shrink-0 text-[#002654]">
                <span class="material-symbols-outlined text-lg">energy_savings_leaf</span>
              </div>
              <div>
                <h4 class="font-serif-diplomatic text-base font-bold text-[#0b1e3b] m-0">High-Growth Transition Sectors</h4>
                <p class="text-sm text-slate-600 mt-1 m-0 leading-relaxed">Multi-gigawatt pipelines in offshore wind, solar, and green hydrogen, alongside ethical carbon-neutral apparel manufacturing and luxury hospitality assets.</p>
              </div>
            </li>
            <li class="flex items-start gap-4">
              <div class="mt-1 w-8 h-8 rounded bg-blue-50 border border-blue-200 flex items-center justify-center shrink-0 text-[#002654]">
                <span class="material-symbols-outlined text-lg">domain</span>
              </div>
              <div>
                <h4 class="font-serif-diplomatic text-base font-bold text-[#0b1e3b] m-0">Port City Colombo Special Economic Zone</h4>
                <p class="text-sm text-slate-600 mt-1 m-0 leading-relaxed">Independent common-law commercial regulatory framework, multi-currency banking, and statutory tax holidays designed explicitly for international enterprises.</p>
              </div>
            </li>
          </ul>
        </div>
        <div class="pt-8 mt-8 border-t border-slate-200 flex items-center justify-between">
          <span class="text-xs font-bold text-slate-500 uppercase tracking-wider">BOI &amp; CCC Facilitation</span>
          <a href="<?= url('/srilanka-business') ?>" class="text-sm font-bold text-[#002654] hover:underline inline-flex items-center gap-1.5">
            Explore Sri Lanka Briefing <span class="material-symbols-outlined text-base">arrow_forward</span>
          </a>
        </div>
      </div>

      <!-- Corridor B: France for Sri Lankan Enterprises -->
      <div class="bg-white border-2 border-slate-200 rounded-lg p-8 lg:p-10 flex flex-col justify-between shadow-sm hover:shadow-md transition-all">
        <div>
          <div class="flex flex-wrap items-center justify-between pb-6 border-b border-slate-200 gap-2">
            <div class="flex items-center gap-3">
              <span class="px-3 py-1 bg-red-50 border border-red-200 font-bold text-xs uppercase text-[#b91c1c] rounded">
                Outward Corridor
              </span>
              <span class="font-serif-diplomatic text-2xl font-bold text-[#0b1e3b]">Why France</span>
            </div>
            <span class="text-xs font-bold uppercase tracking-wider text-slate-500">For Sri Lankan Enterprises</span>
          </div>
          <p class="text-slate-700 font-medium my-6 leading-relaxed">
            The beating heart of Continental Europe’s single market, offering world-class infrastructure, aerospace engineering authority, and unmatched luxury consumer purchasing power.
          </p>
          <ul class="space-y-6 list-none p-0 m-0">
            <li class="flex items-start gap-4">
              <div class="mt-1 w-8 h-8 rounded bg-red-50 border border-red-200 flex items-center justify-center shrink-0 text-[#b91c1c]">
                <span class="material-symbols-outlined text-lg">flight</span>
              </div>
              <div>
                <h4 class="font-serif-diplomatic text-base font-bold text-[#0b1e3b] m-0">Aerospace &amp; Deep Industrial Technology</h4>
                <p class="text-sm text-slate-600 mt-1 m-0 leading-relaxed">Direct entry points into European aerospace supply chains, precision engineering, clean propulsion, and joint R&amp;D technology consortia.</p>
              </div>
            </li>
            <li class="flex items-start gap-4">
              <div class="mt-1 w-8 h-8 rounded bg-red-50 border border-red-200 flex items-center justify-center shrink-0 text-[#b91c1c]">
                <span class="material-symbols-outlined text-lg">euro</span>
              </div>
              <div>
                <h4 class="font-serif-diplomatic text-base font-bold text-[#0b1e3b] m-0">Gateway to 450 Million EU Consumers</h4>
                <p class="text-sm text-slate-600 mt-1 m-0 leading-relaxed">France stands as the primary distribution nexus for Ceylon specialty single-origin tea, ethical apparel, rubber industrial products, and specialized IT services.</p>
              </div>
            </li>
            <li class="flex items-start gap-4">
              <div class="mt-1 w-8 h-8 rounded bg-red-50 border border-red-200 flex items-center justify-center shrink-0 text-[#b91c1c]">
                <span class="material-symbols-outlined text-lg">diamond</span>
              </div>
              <div>
                <h4 class="font-serif-diplomatic text-base font-bold text-[#0b1e3b] m-0">Global Benchmark in Luxury &amp; Gastronomy</h4>
                <p class="text-sm text-slate-600 mt-1 m-0 leading-relaxed">Commercial alignment with leading French luxury houses, Michelin-starred culinary academies, and sustainable hospitality consortiums.</p>
              </div>
            </li>
          </ul>
        </div>
        <div class="pt-8 mt-8 border-t border-slate-200 flex items-center justify-between">
          <span class="text-xs font-bold text-slate-500 uppercase tracking-wider">Business France Liaison</span>
          <a href="<?= url('/france-business') ?>" class="text-sm font-bold text-[#b91c1c] hover:underline inline-flex items-center gap-1.5">
            Explore France Briefing <span class="material-symbols-outlined text-base">arrow_forward</span>
          </a>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- 4. BUSINESS OPPORTUNITIES -->
<section class="w-full bg-white py-20 border-b border-slate-200" id="opportunities">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-12">
    <div class="flex flex-col md:flex-row md:items-end justify-between gap-6 mb-14">
      <div>
        <span class="text-xs font-bold text-[#002654] uppercase tracking-widest block mb-2">Priority Commercial Tracks</span>
        <h2 class="font-serif-diplomatic text-2xl sm:text-3xl lg:text-4xl text-[#0b1e3b] font-bold m-0">Explore Business Opportunities</h2>
        <p class="font-sans text-base sm:text-lg text-slate-600 mt-2 max-w-xl m-0">
          Targeted sectors and bilateral initiatives primed for cross-border expansion, joint ventures, and capital investments.
        </p>
      </div>
      <a href="<?= url('/opportunities') ?>" class="btn btn-outline inline-flex items-center gap-2 shrink-0 bg-slate-50">
        <span>View All Opportunities</span>
        <span class="material-symbols-outlined text-base">arrow_forward</span>
      </a>
    </div>

    <!-- Opportunities Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
      <?php foreach ($opportunities as $opp): ?>
        <div class="bg-slate-50 border border-slate-200 rounded p-8 flex flex-col justify-between hover:border-[#002654] hover:bg-white hover:shadow-md transition-all group">
          <div>
            <div class="flex items-center justify-between mb-5">
              <span class="px-3 py-1 bg-blue-50 border border-blue-200 text-[#002654] font-bold text-xs uppercase rounded">
                <?= e($opp['track']) ?>
              </span>
              <span class="material-symbols-outlined text-slate-400 group-hover:text-[#002654] transition-colors text-2xl">
                <?= e($opp['icon']) ?>
              </span>
            </div>
            <h3 class="font-serif-diplomatic text-xl text-[#0b1e3b] font-bold mb-3 group-hover:text-[#002654] transition-colors">
              <?= e($opp['title']) ?>
            </h3>
            <p class="text-slate-600 text-sm leading-relaxed mb-6">
              <?= e($opp['summary']) ?>
            </p>
          </div>
          <div class="pt-4 border-t border-slate-200 flex items-center justify-between">
            <span class="text-xs font-semibold text-slate-500 uppercase"><?= e($opp['status_label']) ?></span>
            <a href="<?= url('/contact?subject=' . urlencode('Inquiry: ' . $opp['title'])) ?>" class="text-sm font-bold text-[#002654] hover:underline flex items-center gap-1">
              Inquire <span class="material-symbols-outlined text-base">arrow_forward</span>
            </a>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- 5. MEMBERSHIP CONVERSION & STRATEGIC NETWORK -->
<section class="w-full bg-slate-50 py-20 border-b border-slate-200">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-12">
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-start">
      <!-- Left 7 Cols: Value Pillars -->
      <div class="lg:col-span-7">
        <span class="text-xs font-bold text-[#b91c1c] uppercase tracking-widest block mb-2">Corporate Chamber Affiliation</span>
        <h2 class="font-serif-diplomatic text-2xl sm:text-3xl lg:text-4xl text-[#0b1e3b] font-bold mb-4">
          Become Part of the Sri Lanka–France Business Network
        </h2>
        <p class="font-sans text-base sm:text-lg text-slate-600 mb-8 leading-relaxed">
          Council membership provides institutional stature, direct C-level dialogue with sovereign trade delegations, and immediate operational leverage in both jurisdictions.
        </p>

        <!-- 6 Pillars Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
          <div class="flex items-start gap-3 bg-white p-4 rounded border border-slate-200 shadow-sm">
            <span class="material-symbols-outlined text-[#002654] text-2xl shrink-0 mt-0.5">check_circle</span>
            <div>
              <h4 class="font-serif-diplomatic text-base font-bold text-[#0b1e3b] m-0">High-Level Bilateral Networking</h4>
              <p class="text-xs sm:text-sm text-slate-600 mt-1 m-0">Closed-door sessions with visiting French ministries, European ambassadors, and state delegations.</p>
            </div>
          </div>
          <div class="flex items-start gap-3 bg-white p-4 rounded border border-slate-200 shadow-sm">
            <span class="material-symbols-outlined text-[#002654] text-2xl shrink-0 mt-0.5">check_circle</span>
            <div>
              <h4 class="font-serif-diplomatic text-base font-bold text-[#0b1e3b] m-0">Priority Delegation Participation</h4>
              <p class="text-xs sm:text-sm text-slate-600 mt-1 m-0">Preferential registration on outbound trade missions to Paris, Marseille, Lyon, and MEDEF summits.</p>
            </div>
          </div>
          <div class="flex items-start gap-3 bg-white p-4 rounded border border-slate-200 shadow-sm">
            <span class="material-symbols-outlined text-[#002654] text-2xl shrink-0 mt-0.5">check_circle</span>
            <div>
              <h4 class="font-serif-diplomatic text-base font-bold text-[#0b1e3b] m-0">Inward Investment Dossiers</h4>
              <p class="text-xs sm:text-sm text-slate-600 mt-1 m-0">Quarterly intelligence briefings on regulatory adjustments, tax treaties, and commercial opportunities.</p>
            </div>
          </div>
          <div class="flex items-start gap-3 bg-white p-4 rounded border border-slate-200 shadow-sm">
            <span class="material-symbols-outlined text-[#002654] text-2xl shrink-0 mt-0.5">check_circle</span>
            <div>
              <h4 class="font-serif-diplomatic text-base font-bold text-[#0b1e3b] m-0">C-Level Matchmaking</h4>
              <p class="text-xs sm:text-sm text-slate-600 mt-1 m-0">Direct bespoke introductions to French corporate buyers, joint-venture partners, and distributors.</p>
            </div>
          </div>
          <div class="flex items-start gap-3 bg-white p-4 rounded border border-slate-200 shadow-sm">
            <span class="material-symbols-outlined text-[#002654] text-2xl shrink-0 mt-0.5">check_circle</span>
            <div>
              <h4 class="font-serif-diplomatic text-base font-bold text-[#0b1e3b] m-0">Institutional Representation</h4>
              <p class="text-xs sm:text-sm text-slate-600 mt-1 m-0">Advocacy on bilateral commercial disputes, bilateral treaties, and trade barriers via the Ceylon Chamber.</p>
            </div>
          </div>
          <div class="flex items-start gap-3 bg-white p-4 rounded border border-slate-200 shadow-sm">
            <span class="material-symbols-outlined text-[#002654] text-2xl shrink-0 mt-0.5">check_circle</span>
            <div>
              <h4 class="font-serif-diplomatic text-base font-bold text-[#0b1e3b] m-0">Customs &amp; Tariff Advisory</h4>
              <p class="text-xs sm:text-sm text-slate-600 mt-1 m-0">Specialized advisory support on EU trade requirements, rules of origin, and GSP+ technical dossiers.</p>
            </div>
          </div>
        </div>

        <!-- Membership Tiers Breakdown -->
        <div class="mt-8 p-6 bg-white border border-slate-300 rounded shadow-sm">
          <h4 class="text-xs font-bold text-slate-600 uppercase tracking-wider mb-4">Recognized Membership Classifications</h4>
          <div class="grid grid-cols-2 sm:grid-cols-4 gap-4 text-center">
            <div class="p-3 bg-slate-50 border border-slate-200 rounded">
              <span class="font-bold text-[#b91c1c] block text-sm">Patron Member</span>
              <span class="text-xs text-slate-500 block mt-1">Tier 1 Conglomerates</span>
            </div>
            <div class="p-3 bg-slate-50 border border-slate-200 rounded">
              <span class="font-bold text-[#002654] block text-sm">Corporate Member</span>
              <span class="text-xs text-slate-500 block mt-1">Active Trading Firms</span>
            </div>
            <div class="p-3 bg-slate-50 border border-slate-200 rounded">
              <span class="font-bold text-slate-800 block text-sm">Associate Member</span>
              <span class="text-xs text-slate-500 block mt-1">SMEs &amp; Consultancies</span>
            </div>
            <div class="p-3 bg-slate-50 border border-slate-200 rounded">
              <span class="font-bold text-slate-600 block text-sm">Overseas Affiliate</span>
              <span class="text-xs text-slate-500 block mt-1">France-Based Entities</span>
            </div>
          </div>
        </div>
      </div>

      <!-- Right 5 Cols: Application CTA Card -->
      <div class="lg:col-span-5 bg-white border-2 border-slate-300 rounded-lg p-8 shadow-lg relative">
        <div class="w-full h-1.5 bg-gradient-to-r from-[#002654] via-[#b91c1c] to-[#c59b27] absolute top-0 left-0 rounded-t-lg"></div>
        <div class="flex items-center gap-2 mb-2 pt-1">
          <span class="material-symbols-outlined text-[#b91c1c] text-xl">verified_user</span>
          <span class="text-xs font-bold text-[#b91c1c] uppercase tracking-widest">Secretariat Intake</span>
        </div>
        <h3 class="font-serif-diplomatic text-2xl text-[#0b1e3b] font-bold mb-2">Initiate Council Accreditation</h3>
        <p class="text-sm text-slate-600 mb-6 leading-relaxed">
          Applications are reviewed and endorsed through the bilateral screening committee convened under the Ceylon Chamber of Commerce.
        </p>

        <!-- Form directing to application process -->
        <form action="<?= url('/apply') ?>" method="GET" class="space-y-4">
          <div>
            <label class="block text-sm font-bold text-slate-700 mb-1.5">Company / Organization Legal Entity</label>
            <input type="text" name="company_name" required placeholder="e.g. Hayleys PLC / CMA CGM Lanka" class="form-control">
          </div>
          <div>
            <label class="block text-sm font-bold text-slate-700 mb-1.5">Corporate Email</label>
            <input type="email" name="corporate_email" required placeholder="corporate@enterprise.com" class="form-control">
          </div>
          <div>
            <label class="block text-sm font-bold text-slate-700 mb-1.5">Primary Corridor Interest</label>
            <select name="primary_corridor" class="form-control">
              <option value="France Market Access (Outward)">France Market Access (Outward)</option>
              <option value="Sri Lanka Investment (Inward)">Sri Lanka Investment (Inward)</option>
              <option value="Joint Venture / Maritime Logistics">Joint Venture / Maritime Logistics</option>
              <option value="Technology & Software Engineering">Technology &amp; Software Engineering</option>
            </select>
          </div>
          <button type="submit" class="w-full btn btn-primary py-3.5 mt-2 flex items-center justify-center gap-2 shadow">
            <span>Proceed to Full Application</span>
            <span class="material-symbols-outlined text-base">arrow_forward</span>
          </button>
        </form>

        <div class="mt-6 pt-5 border-t border-slate-200 flex items-center justify-between text-xs">
          <span class="text-slate-500 font-medium">Review membership process:</span>
          <a href="<?= url('/membership') ?>" class="font-bold text-[#002654] hover:underline flex items-center gap-1">
            <span class="material-symbols-outlined text-base">description</span>
            Membership Guidelines
          </a>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- 6. NEWS & OFFICIAL EVENTS -->
<section class="w-full bg-white py-20 border-b border-slate-200">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-12">
    <div class="flex flex-col md:flex-row md:items-end justify-between gap-6 mb-12">
      <div>
        <span class="text-xs font-bold text-[#002654] uppercase tracking-widest block mb-2">Bilateral Dispatches</span>
        <h2 class="font-serif-diplomatic text-2xl sm:text-3xl lg:text-4xl text-[#0b1e3b] font-bold m-0">News &amp; Official Events</h2>
      </div>
      <div class="flex items-center gap-3">
        <a href="<?= url('/events') ?>" class="btn btn-outline btn-sm">All Events</a>
        <a href="<?= url('/news') ?>" class="btn btn-outline btn-sm">All News</a>
      </div>
    </div>

    <!-- Editorial Event/News Cards -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
      <?php if (!empty($upcomingEvents)): ?>
        <?php foreach ($upcomingEvents as $ev): ?>
          <div class="bg-slate-50 border-2 border-[#002654]/30 rounded-lg flex flex-col justify-between shadow-sm hover:shadow-md transition-all group">
            <div class="p-7">
              <div class="flex items-center justify-between gap-2 mb-4">
                <span class="px-3 py-1 bg-[#002654] text-white font-bold text-xs uppercase tracking-wider rounded">Upcoming Summit</span>
                <span class="text-xs font-bold text-[#b91c1c] uppercase"><?= date('M d, Y', strtotime($ev['start_datetime'])) ?></span>
              </div>
              <h3 class="font-serif-diplomatic text-xl text-[#0b1e3b] font-bold mb-3 group-hover:text-[#002654] transition-colors">
                <a href="<?= url('/events/' . e($ev['slug'])) ?>" class="text-[#0b1e3b] hover:text-[#002654]">
                  <?= e($ev['title']) ?>
                </a>
              </h3>
              <p class="text-slate-600 text-sm leading-relaxed mb-5">
                <?= e($ev['summary']) ?>
              </p>
              <div class="flex items-center gap-2 text-slate-600 text-sm font-medium">
                <span class="material-symbols-outlined text-base text-[#002654]">location_on</span>
                <span><?= e($ev['venue']) ?></span>
              </div>
            </div>
            <div class="p-6 pt-4 border-t border-slate-200 bg-white rounded-b-lg flex items-center justify-between">
              <span class="text-xs font-bold text-emerald-700 uppercase flex items-center gap-1.5">
                <span class="w-2 h-2 rounded-full bg-emerald-600 inline-block"></span>
                <?= strtoupper(e($ev['registration_status'])) ?>
              </span>
              <a href="<?= url('/events/' . e($ev['slug'])) ?>" class="text-sm font-bold text-[#002654] hover:underline flex items-center">
                Program Details <span class="material-symbols-outlined text-sm ml-1">arrow_forward</span>
              </a>
            </div>
          </div>
        <?php endforeach; ?>
      <?php endif; ?>

      <?php if (!empty($latestNews)): ?>
        <?php foreach ($latestNews as $art): ?>
          <div class="bg-slate-50 border border-slate-200 rounded-lg flex flex-col justify-between shadow-sm hover:border-slate-300 hover:shadow-md transition-all group">
            <div class="p-7">
              <div class="flex items-center justify-between gap-2 mb-4">
                <span class="px-3 py-1 bg-white border border-slate-300 text-slate-700 font-bold text-xs uppercase tracking-wider rounded">
                  <?= e($art['category_name'] ?? 'Communiqué') ?>
                </span>
                <span class="text-xs font-bold text-slate-500 uppercase"><?= date('M d, Y', strtotime($art['published_at'])) ?></span>
              </div>
              <h3 class="font-serif-diplomatic text-xl text-[#0b1e3b] font-bold mb-3 group-hover:text-[#002654] transition-colors">
                <a href="<?= url('/news/' . e($art['slug'])) ?>" class="text-[#0b1e3b] hover:text-[#002654]">
                  <?= e($art['title']) ?>
                </a>
              </h3>
              <p class="text-slate-600 text-sm leading-relaxed mb-5">
                <?= e($art['excerpt']) ?>
              </p>
              <div class="flex items-center gap-2 text-slate-600 text-sm font-medium">
                <span class="material-symbols-outlined text-base text-slate-500">article</span>
                <span>By <?= e($art['author']) ?></span>
              </div>
            </div>
            <div class="p-6 pt-4 border-t border-slate-200 bg-white rounded-b-lg flex items-center justify-between">
              <span class="text-xs font-bold text-slate-500 uppercase">COMMERCIAL REPORT</span>
              <a href="<?= url('/news/' . e($art['slug'])) ?>" class="text-sm font-bold text-slate-800 hover:text-[#002654] hover:underline flex items-center">
                Read Briefing <span class="material-symbols-outlined text-sm ml-1">arrow_forward</span>
              </a>
            </div>
          </div>
        <?php endforeach; ?>
      <?php endif; ?>
    </div>
  </div>
</section>

<!-- 7. LEADERSHIP & EXECUTIVE COMMITTEE HIGHLIGHTS -->
<section class="w-full bg-slate-50 py-20 border-b border-slate-200">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-12">
    <div class="max-w-3xl mb-14">
      <span class="text-xs font-bold text-[#b91c1c] uppercase tracking-widest block mb-2">Governance &amp; Executive Leadership</span>
      <h2 class="font-serif-diplomatic text-2xl sm:text-3xl lg:text-4xl text-[#0b1e3b] font-bold m-0">Meet the Executive Committee</h2>
      <p class="font-sans text-base sm:text-lg text-slate-600 mt-2 m-0">
        Led by captains of industry, seasoned diplomats, and corporate directors dedicated to accelerating Franco-Lankan economic partnership.
      </p>
    </div>

    <!-- Presidential Spotlight -->
    <?php if ($president): ?>
      <div class="bg-white border-2 border-slate-200 rounded-lg mb-12 shadow-sm overflow-hidden">
        <div class="grid grid-cols-1 lg:grid-cols-12 items-center">
          <div class="lg:col-span-4 p-6 sm:p-8 flex items-center justify-center bg-slate-50 border-b lg:border-b-0 lg:border-r border-slate-200">
            <div class="relative w-48 sm:w-56 md:w-60 aspect-[496/781] rounded-lg overflow-hidden shadow-md border border-slate-200 bg-white">
              <img src="<?= asset($president['portrait_path'] ?? 'assets/images/president-dubois.jpg') ?>" alt="<?= e($president['name']) ?>" class="w-full h-full object-contain">
            </div>
          </div>
          <div class="lg:col-span-8 p-8 lg:p-12 flex flex-col justify-between">
            <div>
              <div class="inline-flex items-center gap-2 px-3 py-1 bg-slate-100 border border-slate-200 rounded font-sans text-xs font-bold uppercase text-[#b91c1c] mb-4">
                <span class="w-2 h-2 rounded-full bg-[#b91c1c]"></span>
                President's Dispatch
              </div>
              <h3 class="font-serif-diplomatic text-2xl lg:text-3xl text-[#0b1e3b] font-bold m-0"><?= e($president['name']) ?></h3>
              <p class="font-sans text-base font-bold text-[#002654] mb-6 mt-1">
                <?= e($president['role_title']) ?>, Sri Lanka–France Business Council
              </p>
              <blockquote class="font-serif-diplomatic text-base sm:text-lg text-slate-700 italic border-l-4 border-[#b91c1c] pl-5 mb-6 leading-relaxed">
                "<?= e($presidentQuote) ?>"
              </blockquote>
            </div>
            <div class="pt-6 border-t border-slate-200 flex flex-wrap items-center justify-between gap-4 text-xs sm:text-sm font-semibold text-slate-600">
              <span>Affiliation: <?= e($president['organization']) ?></span>
              <a href="<?= url('/leadership') ?>" class="text-[#002654] font-bold hover:underline flex items-center gap-1">
                View Full Governance Roster <span class="material-symbols-outlined text-sm">arrow_forward</span>
              </a>
            </div>
          </div>
        </div>
      </div>
    <?php endif; ?>

    <!-- Committee Members Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
      <?php foreach ($committee as $member): if ($member['category'] === 'president') continue; ?>
        <div class="p-6 bg-white border border-slate-200 rounded shadow-sm flex flex-col justify-between">
          <div>
            <span class="text-xs font-bold text-[#002654] uppercase block mb-1"><?= e($member['role_title']) ?></span>
            <h4 class="font-serif-diplomatic text-lg text-[#0b1e3b] font-bold m-0"><?= e($member['name']) ?></h4>
            <p class="text-sm text-slate-600 mt-1 m-0 leading-relaxed"><?= e($member['organization']) ?></p>
          </div>
          <div class="mt-4 pt-4 border-t border-slate-200 text-xs font-bold text-slate-500 uppercase tracking-wider">
            TERM: <?= e($member['term_year']) ?>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- 8. MEMBER NETWORK & DIRECTORY SHOWCASE -->
<section class="w-full bg-white py-20 border-b border-slate-200">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-12">
    <div class="text-center max-w-2xl mx-auto mb-12">
      <span class="text-xs font-bold text-[#b91c1c] uppercase tracking-widest block mb-2">Corporate Chamber Roster</span>
      <h2 class="font-serif-diplomatic text-2xl sm:text-3xl lg:text-4xl text-[#0b1e3b] font-bold m-0">
        Trusted by Leading Bilateral Enterprises
      </h2>
      <p class="font-sans text-base sm:text-lg text-slate-600 mt-2 m-0">
        Representing leading sovereign institutions, conglomerates, and multinational operators driving commercial value.
      </p>
    </div>

    <!-- Searchable Directory Bar linking to full directory -->
    <div class="max-w-3xl mx-auto mb-12">
      <form action="<?= url('/members') ?>" method="GET" class="flex items-center bg-slate-50 border-2 border-slate-300 rounded p-2 gap-3 shadow-sm focus-within:border-[#002654]">
        <span class="material-symbols-outlined text-slate-500 ml-2 text-2xl">search</span>
        <input type="text" name="q" placeholder="Search member directory by industry, company name, or service category..." class="w-full bg-transparent border-none text-slate-900 text-base font-sans focus:outline-none placeholder-slate-500">
        <button type="submit" class="px-6 py-2.5 bg-[#002654] text-white font-bold text-sm uppercase tracking-wider rounded shrink-0 hover:bg-[#001b3f] transition-colors">
          Search
        </button>
      </form>
    </div>

    <!-- Architectural Dignified Tiles for Corporate Logos/Names -->
    <div class="grid grid-cols-2 sm:grid-cols-4 gap-4">
      <?php foreach ($featuredMembers as $fm): ?>
        <a href="<?= url('/members/' . e($fm['slug'])) ?>" class="p-8 bg-slate-50 border border-slate-200 rounded flex flex-col items-center justify-center text-center hover:border-[#002654] hover:bg-white hover:shadow-md transition-all group">
          <p class="font-serif-diplomatic text-lg sm:text-xl tracking-wider text-[#0b1e3b] font-bold uppercase m-0 group-hover:text-[#002654]">
            <?= e($fm['name']) ?>
          </p>
          <span class="text-xs font-bold text-slate-500 uppercase mt-2">
            <?= e($fm['sector_name'] ?? 'Bilateral Member') ?>
          </span>
        </a>
      <?php endforeach; ?>
    </div>

    <div class="text-center mt-10">
      <a href="<?= url('/members') ?>" class="btn btn-outline inline-flex items-center gap-2">
        <span>Access Complete Verified Member Directory (<?= e($memberCountDisplay) ?>)</span>
        <span class="material-symbols-outlined text-base">arrow_forward</span>
      </a>
    </div>
  </div>
</section>

<!-- 9. TESTIMONIALS & INSTITUTIONAL ENDORSEMENTS -->
<section class="w-full bg-slate-50 py-20 border-b border-slate-200">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-12">
    <div class="mb-14">
      <span class="text-xs font-bold text-[#002654] uppercase tracking-widest block mb-2">Executive Testimonials</span>
      <h2 class="font-serif-diplomatic text-2xl sm:text-3xl lg:text-4xl text-[#0b1e3b] font-bold m-0">Institutional Endorsements</h2>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
      <div class="p-8 bg-white border border-slate-200 rounded-lg shadow-sm flex flex-col justify-between">
        <div>
          <span class="material-symbols-outlined text-[#b91c1c] text-4xl mb-4">format_quote</span>
          <p class="text-slate-700 leading-relaxed mb-6 font-medium text-[15.5px]">
            "The Council provided our engineering consortium with immediate, high-trust access to ministry decision-makers in Colombo. Their mediation was essential for establishing our regional offshore wind operations."
          </p>
        </div>
        <div class="pt-5 border-t border-slate-200">
          <h4 class="font-serif-diplomatic text-base font-bold text-[#0b1e3b] m-0">François Beaulieu</h4>
          <p class="text-xs font-semibold text-slate-500 mt-0.5 m-0">Vice President, French Clean Infrastructure Alliance</p>
        </div>
      </div>
      <div class="p-8 bg-white border border-slate-200 rounded-lg shadow-sm flex flex-col justify-between">
        <div>
          <span class="material-symbols-outlined text-[#002654] text-4xl mb-4">format_quote</span>
          <p class="text-slate-700 leading-relaxed mb-6 font-medium text-[15.5px]">
            "Through the outbound trade delegations structured with Business France in Paris, we secured major distribution partnerships with high-end Parisian retailers for single-origin artisan Ceylon teas."
          </p>
        </div>
        <div class="pt-5 border-t border-slate-200">
          <h4 class="font-serif-diplomatic text-base font-bold text-[#0b1e3b] m-0">Malik J. Fernando</h4>
          <p class="text-xs font-semibold text-slate-500 mt-0.5 m-0">Managing Director, Resplendent Ceylon &amp; Dilmah</p>
        </div>
      </div>
      <div class="p-8 bg-white border border-slate-200 rounded-lg shadow-sm flex flex-col justify-between">
        <div>
          <span class="material-symbols-outlined text-[#8d4004] text-4xl mb-4">format_quote</span>
          <p class="text-slate-700 leading-relaxed mb-6 font-medium text-[15.5px]">
            "The Ceylon Chamber’s institutional governance backstopping the SLFBC guarantees that every corporate dialogue adheres to rigorous bilateral protocol, statutory compliance, and commercial clarity."
          </p>
        </div>
        <div class="pt-5 border-t border-slate-200">
          <h4 class="font-serif-diplomatic text-base font-bold text-[#0b1e3b] m-0">Claire Dupont-Vasseur</h4>
          <p class="text-xs font-semibold text-slate-500 mt-0.5 m-0">Commercial Counselor, European Maritime Desk</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- 10. FINAL STRATEGIC CTA SECTION -->
<section class="w-full bg-[#002654] text-white relative py-20 overflow-hidden">
  <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-12 text-center relative z-10">
    <div class="inline-flex items-center gap-2 px-3.5 py-1 bg-white/10 border border-white/20 rounded font-sans text-xs uppercase font-bold text-amber-300 mb-6">
      <span class="w-2 h-2 rounded-full bg-amber-400"></span>
      Bilateral Commercial Conduit
    </div>
    <h2 class="font-serif-diplomatic text-3xl sm:text-4xl text-white tracking-tight mb-6 font-bold">
      Let’s Build Stronger Sri Lanka–France Business Connections
    </h2>
    <p class="font-sans text-slate-200 text-base sm:text-lg max-w-2xl mx-auto mb-10 leading-relaxed">
      Whether you are a French enterprise expanding operations into the Indian Ocean or a Sri Lankan exporter entering the European Union, the Council is your accredited bilateral authority.
    </p>
    <div class="flex flex-wrap items-center justify-center gap-4">
      <a href="<?= url('/apply') ?>" class="btn btn-secondary px-8 py-4 shadow-lg">
        Become a Member
      </a>
      <a href="<?= url('/contact') ?>" class="btn btn-outline-white px-8 py-4">
        Contact Secretariat
      </a>
    </div>

    <!-- Accreditation Signoff -->
    <div class="mt-16 pt-8 border-t border-white/15 flex flex-wrap items-center justify-center gap-6 text-xs text-slate-300 uppercase tracking-widest font-semibold">
      <span>The Ceylon Chamber of Commerce</span>
      <span class="hidden sm:inline">•</span>
      <span>Embassy of France in Sri Lanka &amp; Maldives</span>
      <span class="hidden sm:inline">•</span>
      <span>MEDEF International Partner</span>
    </div>
  </div>
</section>
