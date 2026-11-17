<!-- SPLIT VISUAL HERO BANNER -->
<section class="w-full bg-gradient-to-r from-[#0b1e3b] via-[#002654] to-[#0b1e3b] text-white border-b border-slate-200 py-12 lg:py-16 relative overflow-hidden">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-12 relative z-10">
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center">
      <div class="lg:col-span-7">
        <ul class="breadcrumb mb-4">
          <li class="breadcrumb-item"><a href="<?= url('/') ?>" class="text-slate-300 hover:text-white">Home</a></li>
          <li class="breadcrumb-item"><a href="<?= url('/opportunities') ?>" class="text-slate-300 hover:text-white">Trade Corridors</a></li>
          <li class="breadcrumb-item text-amber-300 font-semibold">Doing Business in Sri Lanka</li>
        </ul>
        <div class="inline-flex items-center gap-2 px-3 py-1 bg-white/10 border border-white/20 rounded mb-3">
          <span class="w-2 h-2 rounded-full bg-amber-400"></span>
          <span class="text-xs font-bold uppercase tracking-widest text-amber-300">Indian Ocean Maritime &amp; Investment Hub</span>
        </div>
        <h1 class="font-serif-diplomatic text-3xl sm:text-4xl lg:text-5xl text-white font-bold tracking-tight">
          Doing Business in Sri Lanka
        </h1>
        <p class="font-sans text-base sm:text-lg text-slate-200 max-w-2xl mt-4 leading-relaxed m-0">
          A strategic investment &amp; sourcing briefing for French multinational corporations, industrial contractors, and institutional investors in South Asia.
        </p>
        <div class="mt-4 text-xs text-slate-300 font-semibold flex items-center gap-2">
          <span class="w-2 h-2 rounded-full bg-emerald-400"></span>
          <span>Verified: <strong><?= e($lastUpdated) ?></strong> &bull; Ceylon Chamber Economic Research</span>
        </div>
      </div>
      <div class="lg:col-span-5">
        <div class="bg-white/10 backdrop-blur-sm border border-white/20 p-2.5 rounded-lg shadow-xl">
          <div class="aspect-[16/10] rounded overflow-hidden relative">
            <img src="<?= asset('assets/images/corridor-srilanka.jpg') ?>" alt="Colombo Port and Indian Ocean Hub" class="w-full h-full object-cover">
            <div class="absolute bottom-3 left-3 bg-[#0b1e3b]/90 px-3 py-1 rounded text-xs font-bold text-amber-300 uppercase">
              Colombo • Port City SEZ • Hambantota
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- MAIN CONTENT -->
<section class="w-full bg-white py-16 border-b border-slate-200">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-12">
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-start">
      
      <!-- Left 8 Columns -->
      <div class="lg:col-span-8 space-y-12">

        <!-- 1. Priority Sectors for French Enterprise (Visual Image Grid) -->
        <div>
          <h2 class="font-serif-diplomatic text-2xl text-[#0b1e3b] font-bold mb-6 pb-2 border-b border-slate-200">
            Priority Sectors for French Business in Sri Lanka
          </h2>
          <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
            <div class="bg-white border border-slate-200 rounded-lg overflow-hidden shadow-sm hover:shadow-md transition-all group">
              <div class="aspect-[16/9] bg-slate-100 overflow-hidden relative">
                <img src="<?= asset('assets/images/corridor-maritime.jpg') ?>" alt="Maritime Logistics and Port Infrastructure" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                <span class="absolute top-3 left-3 px-2.5 py-0.5 bg-[#002654] text-white text-[11px] font-bold uppercase rounded">7.2M+ TEUs</span>
              </div>
              <div class="p-5">
                <h3 class="font-serif-diplomatic font-bold text-base text-[#0b1e3b] mb-1.5">Maritime Logistics &amp; Deepwater Ports</h3>
                <p class="text-xs sm:text-sm text-slate-600 leading-relaxed m-0">
                  Container terminal operations, bonded freeport warehousing, bunkering, and cold-chain hubs across Colombo and Hambantota.
                </p>
              </div>
            </div>

            <div class="bg-white border border-slate-200 rounded-lg overflow-hidden shadow-sm hover:shadow-md transition-all group">
              <div class="aspect-[16/9] bg-slate-100 overflow-hidden relative">
                <img src="<?= asset('assets/images/opp-energy.jpg') ?>" alt="Renewable Energy and Water Engineering" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                <span class="absolute top-3 left-3 px-2.5 py-0.5 bg-emerald-700 text-white text-[11px] font-bold uppercase rounded">70% Clean Power Target</span>
              </div>
              <div class="p-5">
                <h3 class="font-serif-diplomatic font-bold text-base text-[#0b1e3b] mb-1.5">Renewable Energy &amp; Water Systems</h3>
                <p class="text-xs sm:text-sm text-slate-600 leading-relaxed m-0">
                  Offshore wind in the Mannar Basin, utility solar, green hydrogen feasibility, and municipal water purification plants.
                </p>
              </div>
            </div>

            <div class="bg-white border border-slate-200 rounded-lg overflow-hidden shadow-sm hover:shadow-md transition-all group">
              <div class="aspect-[16/9] bg-slate-100 overflow-hidden relative">
                <img src="<?= asset('assets/images/opp-tourism.jpg') ?>" alt="Sustainable Luxury Hospitality" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                <span class="absolute top-3 left-3 px-2.5 py-0.5 bg-[#c59b27] text-white text-[11px] font-bold uppercase rounded">Hospitality Assets</span>
              </div>
              <div class="p-5">
                <h3 class="font-serif-diplomatic font-bold text-base text-[#0b1e3b] mb-1.5">High-End Sustainable Hospitality</h3>
                <p class="text-xs sm:text-sm text-slate-600 leading-relaxed m-0">
                  Eco-luxury boutique resorts, heritage hotel revitalizations, and culinary partnerships serving European luxury travelers.
                </p>
              </div>
            </div>

            <div class="bg-white border border-slate-200 rounded-lg overflow-hidden shadow-sm hover:shadow-md transition-all group">
              <div class="aspect-[16/9] bg-slate-100 overflow-hidden relative">
                <img src="<?= asset('assets/images/opp-tech.jpg') ?>" alt="Precision Manufacturing and Graphite" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                <span class="absolute top-3 left-3 px-2.5 py-0.5 bg-[#b91c1c] text-white text-[11px] font-bold uppercase rounded">BOI Zones</span>
              </div>
              <div class="p-5">
                <h3 class="font-serif-diplomatic font-bold text-base text-[#0b1e3b] mb-1.5">Precision Manufacturing &amp; Graphite</h3>
                <p class="text-xs sm:text-sm text-slate-600 leading-relaxed m-0">
                  99%+ pure vein graphite for EV battery anodes, solid industrial tires, medical devices, and aviation electronics.
                </p>
              </div>
            </div>
          </div>
        </div>

        <!-- 2. Special Economic Zones & Port City Slider -->
        <div id="investment" data-carousel class="bg-slate-50 border border-slate-200 rounded-lg p-6 sm:p-8 shadow-sm">
          <div class="flex items-center justify-between gap-4 mb-6">
            <div>
              <span class="text-xs font-bold uppercase tracking-wider text-[#002654] block mb-1">Special Economic Zones</span>
              <h2 class="font-serif-diplomatic text-2xl text-[#0b1e3b] font-bold m-0">Port City Colombo &amp; Industrial Corridors</h2>
            </div>
            <div class="flex items-center gap-2">
              <button type="button" data-carousel-prev aria-label="Previous zone" class="w-9 h-9 rounded border border-slate-300 bg-white hover:bg-[#002654] hover:text-white text-slate-700 flex items-center justify-center transition-colors cursor-pointer">
                <span class="material-symbols-outlined text-base">chevron_left</span>
              </button>
              <button type="button" data-carousel-next aria-label="Next zone" class="w-9 h-9 rounded border border-slate-300 bg-white hover:bg-[#002654] hover:text-white text-slate-700 flex items-center justify-center transition-colors cursor-pointer">
                <span class="material-symbols-outlined text-base">chevron_right</span>
              </button>
            </div>
          </div>

          <div data-carousel-track class="flex gap-5 overflow-x-auto snap-x snap-mandatory no-scrollbar pb-2">
            <div class="min-w-[270px] sm:min-w-[300px] snap-start bg-white border border-slate-200 rounded-lg p-5 shrink-0">
              <span class="px-2.5 py-0.5 bg-[#002654] text-white text-xs font-bold uppercase rounded">Financial SEZ</span>
              <h3 class="font-serif-diplomatic font-bold text-base text-[#0b1e3b] mt-3 mb-2">Port City Colombo</h3>
              <p class="text-xs sm:text-sm text-slate-600 m-0 leading-relaxed">
                English common-law regulatory jurisdiction, 100% foreign ownership, multi-currency banking, and corporate tax exemptions up to 25 years.
              </p>
            </div>
            <div class="min-w-[270px] sm:min-w-[300px] snap-start bg-white border border-slate-200 rounded-lg p-5 shrink-0">
              <span class="px-2.5 py-0.5 bg-[#b91c1c] text-white text-xs font-bold uppercase rounded">BOI Export Zone</span>
              <h3 class="font-serif-diplomatic font-bold text-base text-[#0b1e3b] mt-3 mb-2">Katunayake &amp; Biyagama EPZs</h3>
              <p class="text-xs sm:text-sm text-slate-600 m-0 leading-relaxed">
                Premier industrial export processing zones adjacent to Bandaranaike International Airport, hosting global apparel, tire, and electronics plants.
              </p>
            </div>
            <div class="min-w-[270px] sm:min-w-[300px] snap-start bg-white border border-slate-200 rounded-lg p-5 shrink-0">
              <span class="px-2.5 py-0.5 bg-[#c59b27] text-white text-xs font-bold uppercase rounded">Deepwater Port Zone</span>
              <h3 class="font-serif-diplomatic font-bold text-base text-[#0b1e3b] mt-3 mb-2">Hambantota Maritime Industrial Park</h3>
              <p class="text-xs sm:text-sm text-slate-600 m-0 leading-relaxed">
                Located 10 nautical miles from the main Indian Ocean shipping route, ideal for transshipment, energy bunkering, and heavy assembly.
              </p>
            </div>
          </div>
        </div>

        <!-- 3. Investment Protection & Treaties -->
        <div class="bg-slate-50 border border-slate-200 rounded-lg p-6 sm:p-8">
          <h2 class="font-serif-diplomatic text-2xl text-[#0b1e3b] font-bold mb-4">Statutory Investment Protections (Article 157)</h2>
          <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-xs sm:text-sm text-slate-700">
            <div class="p-4 bg-white border border-slate-200 rounded">
              <span class="material-symbols-outlined text-[#002654] text-2xl mb-1">shield</span>
              <strong class="text-[#002654] block mb-1">Franco-Sri Lankan Bilateral Investment Treaty</strong>
              <p class="text-xs text-slate-600 m-0">Constitutional protection under Article 157 guaranteeing fair treatment and unrestricted capital repatriation.</p>
            </div>
            <div class="p-4 bg-white border border-slate-200 rounded">
              <span class="material-symbols-outlined text-[#8d4004] text-2xl mb-1">account_balance_wallet</span>
              <strong class="text-[#002654] block mb-1">Double Taxation Avoidance (DTAA)</strong>
              <p class="text-xs text-slate-600 m-0">Bilateral fiscal treaty eliminating double taxation on dividends, royalties, interest, and corporate profits.</p>
            </div>
          </div>
        </div>
      </div>

      <!-- Right 4 Columns: Facilitation & Resources -->
      <div class="lg:col-span-4 space-y-6">
        <div class="bg-slate-50 border border-slate-200 rounded-lg p-6 shadow-sm">
          <h3 class="font-serif-diplomatic text-lg text-[#0b1e3b] font-bold mb-4 pb-2 border-b border-slate-200">
            Government Facilitation Agencies
          </h3>
          <ul class="space-y-4 text-xs text-slate-700 list-none p-0">
            <li>
              <strong class="text-[#002654] block">Board of Investment of Sri Lanka (BOI):</strong>
              Primary statutory agency for FDI, Section 17 tax incentives, and export processing zones.
            </li>
            <li>
              <strong class="text-[#002654] block">Sri Lanka Export Development Board (EDB):</strong>
              Apex state organization for export promotion and buyer-seller missions.
            </li>
            <li>
              <strong class="text-[#002654] block">Colombo Port City Economic Commission:</strong>
              Single-window regulator for the multi-currency Special Economic Zone.
            </li>
            <li>
              <strong class="text-[#002654] block">The Ceylon Chamber of Commerce:</strong>
              Premier business chamber (est. 1839) and Secretariat of SLFBC.
            </li>
          </ul>
        </div>

        <div class="bg-white border border-slate-200 rounded-lg p-6 shadow-sm">
          <h3 class="font-serif-diplomatic text-lg text-[#0b1e3b] font-bold mb-4 pb-2 border-b border-slate-200">
            Setup Checklist for French Firms
          </h3>
          <ol class="space-y-3 text-xs text-slate-600 list-decimal pl-4">
            <li>Incorporate via Registrar of Companies (ROC) e-portal.</li>
            <li>Register with the Board of Investment (BOI) under Section 16 or 17.</li>
            <li>Open Inward Investment Account (IIA) with an authorized bank.</li>
            <li>Join the Sri Lanka–France Business Council.</li>
          </ol>
        </div>

        <div class="p-6 bg-[#002654] text-white rounded-lg shadow-sm">
          <h3 class="font-serif-diplomatic text-lg font-bold mb-2">Explore Inward Investment</h3>
          <p class="text-xs text-slate-300 leading-relaxed mb-4">
            Our Secretariat facilitates verified B2B matchmaking, ministry introductions, and site visits for French commercial missions.
          </p>
          <a href="<?= url('/contact') ?>" class="w-full py-2.5 px-4 bg-amber-400 hover:bg-amber-500 text-[#002654] font-bold text-xs uppercase tracking-wider rounded text-center block transition-all">
            Initiate Bilateral Consultation
          </a>
        </div>
      </div>

    </div>
  </div>
</section>
