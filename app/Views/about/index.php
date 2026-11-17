<!-- SPLIT VISUAL HERO BANNER -->
<section class="w-full bg-gradient-to-r from-[#0b1e3b] via-[#002654] to-[#0b1e3b] text-white border-b border-slate-200 py-12 lg:py-16 relative overflow-hidden">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-12 relative z-10">
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center">
      <div class="lg:col-span-7">
        <ul class="breadcrumb mb-4">
          <li class="breadcrumb-item"><a href="<?= url('/') ?>" class="text-slate-300 hover:text-white">Home</a></li>
          <li class="breadcrumb-item text-amber-300 font-semibold">About SLFBC</li>
        </ul>
        <div class="inline-flex items-center gap-2 px-3 py-1 bg-white/10 border border-white/20 rounded mb-3">
          <span class="w-2 h-2 rounded-full bg-amber-400"></span>
          <span class="text-xs font-bold uppercase tracking-widest text-amber-300">Institutional Profile • Est. 2004</span>
        </div>
        <h1 class="font-serif-diplomatic text-3xl sm:text-4xl lg:text-5xl text-white font-bold tracking-tight">
          About the Sri Lanka–France Business Council
        </h1>
        <p class="font-sans text-base sm:text-lg text-slate-200 max-w-2xl mt-4 leading-relaxed m-0">
          Operating under the aegis of The Ceylon Chamber of Commerce to advance commercial diplomacy, bilateral trade, investment cooperation, and strategic enterprise partnerships.
        </p>
      </div>
      <div class="lg:col-span-5">
        <div class="bg-white/10 backdrop-blur-sm border border-white/20 p-2.5 rounded-lg shadow-xl">
          <div class="std-hero-img rounded">
            <img src="<?= asset('assets/images/chamber-building.jpg') ?>" alt="The Ceylon Chamber of Commerce Secretariat" class="w-full h-full object-cover">
            <div class="absolute bottom-3 left-3 bg-[#0b1e3b]/90 px-3 py-1 rounded text-xs font-bold text-amber-300 uppercase">
              50, Nawam Mawatha • Colombo 02
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- MAIN CONTENT WITH VISUAL CARDS, TIMELINE SLIDER & ACCORDIONS -->
<section class="w-full bg-white py-16 border-b border-slate-200">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-12">
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-12">
      <!-- Left 8 Columns -->
      <div class="lg:col-span-8 space-y-12">

        <!-- 1. Who We Are (Split Visual & Text Card) -->
        <article class="bg-slate-50 border border-slate-200 rounded-lg overflow-hidden shadow-sm">
          <div class="grid grid-cols-1 md:grid-cols-12 items-center">
            <div class="md:col-span-5 std-card-img">
              <img src="<?= asset('assets/images/hero-bilateral.jpg') ?>" alt="Franco-Lankan Diplomatic Mandate" class="w-full h-full object-cover">
              <span class="absolute top-3 left-3 px-2.5 py-1 bg-[#002654] text-white text-[11px] font-bold uppercase rounded">Mandate</span>
            </div>
            <div class="md:col-span-7 p-6 sm:p-8 flex flex-col justify-center">
              <h2 class="font-serif-diplomatic text-2xl text-[#0b1e3b] font-bold mb-3">Who We Are</h2>
              <p class="text-slate-700 leading-relaxed text-sm sm:text-base mb-3">
                The <strong>Sri Lanka–France Business Council (SLFBC)</strong> is an accredited bilateral chamber operating under <strong>The Ceylon Chamber of Commerce</strong> in close coordination with the <strong>Embassy of France in Colombo</strong>.
              </p>
              <p class="text-slate-600 leading-relaxed text-xs sm:text-sm m-0">
                It unites premier Sri Lankan conglomerates, export champions, and French multinational corporations to accelerate bilateral trade, joint ventures, and market entry.
              </p>
            </div>
          </div>
        </article>

        <!-- 2. Interactive Historical Milestone Slider (2004 - 2026) -->
        <div data-carousel class="bg-white border border-slate-200 rounded-lg p-6 sm:p-8 shadow-sm">
          <div class="flex items-center justify-between gap-4 mb-6">
            <div>
              <span class="text-xs font-bold uppercase tracking-wider text-[#b91c1c] block mb-1">Institutional Continuity</span>
              <h2 class="font-serif-diplomatic text-2xl text-[#0b1e3b] font-bold m-0">Milestones (2004 – 2026)</h2>
            </div>
            <div class="flex items-center gap-2">
              <button type="button" data-carousel-prev aria-label="Previous milestone" class="w-9 h-9 rounded border border-slate-300 bg-white hover:bg-[#002654] hover:text-white text-slate-700 flex items-center justify-center transition-colors cursor-pointer">
                <span class="material-symbols-outlined text-base">chevron_left</span>
              </button>
              <button type="button" data-carousel-next aria-label="Next milestone" class="w-9 h-9 rounded border border-slate-300 bg-white hover:bg-[#002654] hover:text-white text-slate-700 flex items-center justify-center transition-colors cursor-pointer">
                <span class="material-symbols-outlined text-base">chevron_right</span>
              </button>
            </div>
          </div>

          <div data-carousel-track class="carousel-track-2 pb-2">
            <div class="bg-slate-50 border border-slate-200 rounded-lg overflow-hidden">
              <div class="std-thumb-img bg-slate-200">
                <img src="<?= asset('assets/images/bilateral-summit.jpg') ?>" alt="2004 Council Inauguration" class="w-full h-full object-cover">
              </div>
              <div class="p-4">
                <span class="px-2 py-0.5 bg-[#002654] text-white text-xs font-bold rounded">Feb 2004</span>
                <h3 class="font-serif-diplomatic text-base font-bold text-[#0b1e3b] mt-2 mb-1">Official Inauguration</h3>
                <p class="text-xs text-slate-600 m-0">Founded on 4th February 2004 under The Ceylon Chamber of Commerce with French Embassy patronage.</p>
              </div>
            </div>

            <div class="bg-slate-50 border border-slate-200 rounded-lg overflow-hidden">
              <div class="std-thumb-img bg-slate-200">
                <img src="<?= asset('assets/images/corridor-france.jpg') ?>" alt="MEDEF Paris Missions" class="w-full h-full object-cover">
              </div>
              <div class="p-4">
                <span class="px-2 py-0.5 bg-[#b91c1c] text-white text-xs font-bold rounded">2012 – 2019</span>
                <h3 class="font-serif-diplomatic text-base font-bold text-[#0b1e3b] mt-2 mb-1">MEDEF &amp; Paris Missions</h3>
                <p class="text-xs text-slate-600 m-0">Expanded bilateral trade missions with MEDEF International and Business France in Paris and Lyon.</p>
              </div>
            </div>

            <div class="bg-slate-50 border border-slate-200 rounded-lg overflow-hidden">
              <div class="std-thumb-img bg-slate-200">
                <img src="<?= asset('assets/images/corridor-maritime.jpg') ?>" alt="Maritime and Green Energy Expansion" class="w-full h-full object-cover">
              </div>
              <div class="p-4">
                <span class="px-2 py-0.5 bg-[#c59b27] text-white text-xs font-bold rounded">2020 – 2025</span>
                <h3 class="font-serif-diplomatic text-base font-bold text-[#0b1e3b] mt-2 mb-1">Maritime &amp; Clean Energy Axis</h3>
                <p class="text-xs text-slate-600 m-0">Scaled French multinational participation in Colombo Port logistics, renewable power, and GSP+ exports.</p>
              </div>
            </div>

            <div class="bg-slate-50 border border-slate-200 rounded-lg overflow-hidden">
              <div class="std-thumb-img bg-slate-200">
                <img src="<?= asset('assets/images/agm-governance.jpg') ?>" alt="22nd Annual General Meeting" class="w-full h-full object-cover">
              </div>
              <div class="p-4">
                <span class="px-2 py-0.5 bg-emerald-700 text-white text-xs font-bold rounded">2026/27 Term</span>
                <h3 class="font-serif-diplomatic text-base font-bold text-[#0b1e3b] mt-2 mb-1">22nd Annual General Meeting</h3>
                <p class="text-xs text-slate-600 m-0">Elected President Shaameel Mohideen and the 2026/27 Executive Committee with Patron H.E. Rémi Lambert.</p>
              </div>
            </div>
          </div>
        </div>

        <!-- 3. Core Strategic Objectives (Visual Icon Grid) -->
        <div>
          <h2 class="font-serif-diplomatic text-2xl text-[#0b1e3b] font-bold mb-5">Core Council Objectives</h2>
          <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <div class="p-5 bg-slate-50 border border-slate-200 rounded-lg flex items-start gap-3.5">
              <span class="material-symbols-outlined text-2xl text-[#002654] shrink-0">swap_horiz</span>
              <div>
                <h3 class="font-serif-diplomatic text-base font-bold text-[#0b1e3b] mb-1">Promote Bilateral Trade</h3>
                <p class="text-xs sm:text-sm text-slate-600 m-0">Expand import, export, and distribution corridors between Sri Lanka and France.</p>
              </div>
            </div>
            <div class="p-5 bg-slate-50 border border-slate-200 rounded-lg flex items-start gap-3.5">
              <span class="material-symbols-outlined text-2xl text-[#b91c1c] shrink-0">trending_up</span>
              <div>
                <h3 class="font-serif-diplomatic text-base font-bold text-[#0b1e3b] mb-1">Stimulate Direct Investment</h3>
                <p class="text-xs sm:text-sm text-slate-600 m-0">Catalyze FDI, joint ventures, and infrastructure capital deployment.</p>
              </div>
            </div>
            <div class="p-5 bg-slate-50 border border-slate-200 rounded-lg flex items-start gap-3.5">
              <span class="material-symbols-outlined text-2xl text-[#8d4004] shrink-0">groups</span>
              <div>
                <h3 class="font-serif-diplomatic text-base font-bold text-[#0b1e3b] mb-1">C-Suite &amp; Embassy Networking</h3>
                <p class="text-xs sm:text-sm text-slate-600 m-0">Connect corporate boards directly with visiting French delegations and diplomats.</p>
              </div>
            </div>
            <div class="p-5 bg-slate-50 border border-slate-200 rounded-lg flex items-start gap-3.5">
              <span class="material-symbols-outlined text-2xl text-[#002654] shrink-0">policy</span>
              <div>
                <h3 class="font-serif-diplomatic text-base font-bold text-[#0b1e3b] mb-1">Resolve Commercial Barriers</h3>
                <p class="text-xs sm:text-sm text-slate-600 m-0">Advocate on tariff lines, EU compliance standards, and regulatory frameworks.</p>
              </div>
            </div>
          </div>
        </div>

        <!-- 4. Constitution & Governance Accordions -->
        <article id="constitution" class="p-6 sm:p-8 bg-white border-2 border-slate-200 rounded-lg shadow-sm">
          <div class="flex items-center gap-2 mb-2">
            <span class="material-symbols-outlined text-[#8d4004] text-xl">gavel</span>
            <span class="text-xs font-bold text-[#8d4004] uppercase tracking-wider">Statutory Charter</span>
          </div>
          <h2 class="font-serif-diplomatic text-2xl text-[#0b1e3b] font-bold mb-4">Constitution &amp; Governance Framework</h2>

          <div class="space-y-3 mb-6">
            <div class="border border-slate-200 rounded">
              <button type="button" data-accordion-toggle aria-expanded="true" class="w-full px-4 py-3 bg-slate-50 hover:bg-slate-100 flex items-center justify-between text-left font-bold text-sm text-[#0b1e3b] cursor-pointer">
                <span>Article I — Secretariat &amp; Constitutional Authority</span>
                <span class="material-symbols-outlined accordion-icon transition-transform" style="transform: rotate(180deg);">expand_more</span>
              </button>
              <div class="p-4 text-xs sm:text-sm text-slate-600 border-t border-slate-200">
                The Council operates under a written Constitution ratified by The Ceylon Chamber of Commerce. All statutory meetings, financial audits, and elections are administered by the Chamber Secretariat at 50, Nawam Mawatha, Colombo 02.
              </div>
            </div>

            <div class="border border-slate-200 rounded">
              <button type="button" data-accordion-toggle aria-expanded="false" class="w-full px-4 py-3 bg-slate-50 hover:bg-slate-100 flex items-center justify-between text-left font-bold text-sm text-[#0b1e3b] cursor-pointer">
                <span>Article II — Executive Committee Elections &amp; AGM</span>
                <span class="material-symbols-outlined accordion-icon transition-transform">expand_more</span>
              </button>
              <div class="p-4 text-xs sm:text-sm text-slate-600 border-t border-slate-200 hidden">
                The Office Bearers (President, Vice Presidents, Honorary Treasurer, Immediate Past President) and Committee Members are elected annually by voting corporate members at the Annual General Meeting.
              </div>
            </div>

            <div class="border border-slate-200 rounded">
              <button type="button" data-accordion-toggle aria-expanded="false" class="w-full px-4 py-3 bg-slate-50 hover:bg-slate-100 flex items-center justify-between text-left font-bold text-sm text-[#0b1e3b] cursor-pointer">
                <span>Article III — Diplomatic Patronage</span>
                <span class="material-symbols-outlined accordion-icon transition-transform">expand_more</span>
              </button>
              <div class="p-4 text-xs sm:text-sm text-slate-600 border-t border-slate-200 hidden">
                By constitutional convention, the Ambassador of the French Republic to Sri Lanka and the Maldives serves as the official Patron of the Council.
              </div>
            </div>
          </div>

          <div class="p-4 bg-slate-50 border border-slate-200 rounded flex flex-wrap items-center justify-between gap-4">
            <div>
              <p class="font-bold text-[#002654] text-sm m-0">Official SLFBC Constitution Document</p>
              <p class="text-xs text-slate-500 m-0">Available to member enterprises and applicants upon Secretariat request.</p>
            </div>
            <a href="<?= url('/contact?subject=' . urlencode('Request: Official Constitution Document')) ?>" class="inline-flex items-center justify-center px-4 py-2 border border-slate-300 text-xs font-bold uppercase tracking-wider text-slate-700 bg-white hover:bg-slate-100 rounded transition-all shadow-sm">
              <span class="material-symbols-outlined text-sm mr-1">mail</span> Request Copy
            </a>
          </div>
        </article>
      </div>

      <!-- Right 4 Columns: Institutional Sidebar -->
      <div class="lg:col-span-4 space-y-6">
        <div class="p-6 bg-slate-50 border-t-4 border-t-[#002654] border border-slate-200 rounded-lg shadow-sm">
          <h3 class="font-serif-diplomatic text-lg text-[#0b1e3b] font-bold mb-4">Council at a Glance</h3>
          <dl class="space-y-3 text-sm">
            <div>
              <dt class="text-xs font-bold uppercase text-slate-500">Established</dt>
              <dd class="font-bold text-slate-800 text-base">4th February 2004</dd>
            </div>
            <div class="pt-2 border-t border-slate-200">
              <dt class="text-xs font-bold uppercase text-slate-500">Secretariat Administration</dt>
              <dd class="font-bold text-slate-800">The Ceylon Chamber of Commerce</dd>
            </div>
            <div class="pt-2 border-t border-slate-200">
              <dt class="text-xs font-bold uppercase text-slate-500">Patron of the Council</dt>
              <dd class="font-bold text-slate-800">H.E. Rémi Lambert (French Ambassador)</dd>
            </div>
            <div class="pt-2 border-t border-slate-200">
              <dt class="text-xs font-bold uppercase text-slate-500">Current Committee Term</dt>
              <dd class="font-bold text-slate-800">2026/27 Term (22nd AGM)</dd>
            </div>
            <div class="pt-2 border-t border-slate-200">
              <dt class="text-xs font-bold uppercase text-slate-500">President</dt>
              <dd class="font-bold text-[#002654]">Shaameel Mohideen</dd>
            </div>
          </dl>
        </div>

        <div class="p-6 bg-slate-50 border border-slate-200 rounded-lg">
          <h3 class="font-serif-diplomatic text-base text-[#0b1e3b] font-bold mb-3">Institutional Partners</h3>
          <ul class="space-y-2 text-sm list-none p-0 m-0">
            <li>
              <a href="https://www.chamber.lk" target="_blank" rel="noopener noreferrer" class="text-[#002654] font-semibold hover:underline flex items-center justify-between">
                <span>The Ceylon Chamber of Commerce</span>
                <span class="material-symbols-outlined text-xs">open_in_new</span>
              </a>
            </li>
            <li class="pt-2 border-t border-slate-200">
              <a href="https://lk.ambafrance.org" target="_blank" rel="noopener noreferrer" class="text-[#002654] font-semibold hover:underline flex items-center justify-between">
                <span>Embassy of France in Sri Lanka</span>
                <span class="material-symbols-outlined text-xs">open_in_new</span>
              </a>
            </li>
            <li class="pt-2 border-t border-slate-200">
              <a href="https://www.medefinternational.fr" target="_blank" rel="noopener noreferrer" class="text-[#002654] font-semibold hover:underline flex items-center justify-between">
                <span>MEDEF International</span>
                <span class="material-symbols-outlined text-xs">open_in_new</span>
              </a>
            </li>
            <li class="pt-2 border-t border-slate-200">
              <a href="https://www.businessfrance.fr" target="_blank" rel="noopener noreferrer" class="text-[#002654] font-semibold hover:underline flex items-center justify-between">
                <span>Business France</span>
                <span class="material-symbols-outlined text-xs">open_in_new</span>
              </a>
            </li>
          </ul>
        </div>

        <div class="p-6 bg-[#002654] text-white rounded-lg shadow-md text-center">
          <span class="text-xs font-bold uppercase tracking-wider text-amber-300 block mb-2">Join the Council</span>
          <h3 class="font-serif-diplomatic text-xl font-bold text-white mb-3">Expand Your Bilateral Footprint</h3>
          <p class="text-xs text-slate-200 mb-6 leading-relaxed">
            Connect your enterprise with accredited Franco-Lankan business networks and sovereign delegations.
          </p>
          <a href="<?= url('/apply') ?>" class="inline-flex items-center justify-center w-full py-3 px-6 bg-[#b91c1c] text-white font-bold text-sm uppercase tracking-wider rounded hover:bg-[#991b1b] transition-all shadow">
            Apply for Membership
          </a>
        </div>
      </div>
    </div>
  </div>
</section>
