<!-- SPLIT VISUAL HERO BANNER -->
<section class="w-full bg-gradient-to-r from-[#0b1e3b] via-[#002654] to-[#0b1e3b] text-white border-b border-slate-200 py-12 lg:py-16 relative overflow-hidden">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-12 relative z-10">
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center">
      <div class="lg:col-span-7">
        <ul class="breadcrumb mb-4">
          <li class="breadcrumb-item"><a href="<?= url('/') ?>" class="text-slate-300 hover:text-white">Home</a></li>
          <li class="breadcrumb-item"><a href="<?= url('/opportunities') ?>" class="text-slate-300 hover:text-white">Trade Corridors</a></li>
          <li class="breadcrumb-item text-amber-300 font-semibold">Doing Business with France</li>
        </ul>
        <div class="inline-flex items-center gap-2 px-3 py-1 bg-white/10 border border-white/20 rounded mb-3">
          <span class="w-2 h-2 rounded-full bg-amber-400"></span>
          <span class="text-xs font-bold uppercase tracking-widest text-amber-300">European Single Market Gateway</span>
        </div>
        <h1 class="font-serif-diplomatic text-3xl sm:text-4xl lg:text-5xl text-white font-bold tracking-tight">
          Doing Business with France
        </h1>
        <p class="font-sans text-base sm:text-lg text-slate-200 max-w-2xl mt-4 leading-relaxed m-0">
          Strategic market intelligence for Sri Lankan exporters, manufacturers, and technology leaders entering France and the 450M+ EU consumer market.
        </p>
        <div class="mt-4 text-xs text-slate-300 font-semibold flex items-center gap-2">
          <span class="w-2 h-2 rounded-full bg-emerald-400"></span>
          <span>Verified: <strong><?= e($lastUpdated) ?></strong> &bull; Ceylon Chamber Economic Research</span>
        </div>
      </div>
      <div class="lg:col-span-5">
        <div class="bg-white/10 backdrop-blur-sm border border-white/20 p-2.5 rounded-lg shadow-xl">
          <div class="aspect-[16/10] rounded overflow-hidden relative">
            <img src="<?= asset('assets/images/corridor-france.jpg') ?>" alt="Paris Business District and French Market" class="w-full h-full object-cover">
            <div class="absolute bottom-3 left-3 bg-[#0b1e3b]/90 px-3 py-1 rounded text-xs font-bold text-amber-300 uppercase">
              Paris • Lyon • Marseille • Toulouse
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

        <!-- 1. High-Potential Export Sectors (Visual Image Grid) -->
        <div>
          <h2 class="font-serif-diplomatic text-2xl text-[#0b1e3b] font-bold mb-6 pb-2 border-b border-slate-200">
            High-Potential Export Corridors to France
          </h2>
          <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
            <div class="bg-white border border-slate-200 rounded-lg overflow-hidden shadow-sm hover:shadow-md transition-all group">
              <div class="aspect-[16/9] bg-slate-100 overflow-hidden relative">
                <img src="<?= asset('assets/images/opp-apparel.jpg') ?>" alt="Ethical and Sustainable Apparel" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                <span class="absolute top-3 left-3 px-2.5 py-0.5 bg-[#002654] text-white text-[11px] font-bold uppercase rounded">GSP+ Duty Free</span>
              </div>
              <div class="p-5">
                <h3 class="font-serif-diplomatic font-bold text-base text-[#0b1e3b] mb-1.5">Ethical &amp; Sustainable Apparel</h3>
                <p class="text-xs sm:text-sm text-slate-600 leading-relaxed m-0">
                  Premium technical garments, lace, and intimate apparel meeting OEKO-TEX, GOTS, and EU corporate sustainability mandates.
                </p>
              </div>
            </div>

            <div class="bg-white border border-slate-200 rounded-lg overflow-hidden shadow-sm hover:shadow-md transition-all group">
              <div class="aspect-[16/9] bg-slate-100 overflow-hidden relative">
                <img src="<?= asset('assets/images/opp-agri.jpg') ?>" alt="Specialty Ceylon Tea and Spices" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                <span class="absolute top-3 left-3 px-2.5 py-0.5 bg-[#c59b27] text-white text-[11px] font-bold uppercase rounded">GI Certified</span>
              </div>
              <div class="p-5">
                <h3 class="font-serif-diplomatic font-bold text-base text-[#0b1e3b] mb-1.5">Specialty Ceylon Tea &amp; Spices</h3>
                <p class="text-xs sm:text-sm text-slate-600 leading-relaxed m-0">
                  Single-origin artisanal teas, GI-certified Ceylon cinnamon, essential oils, and organic infusions for Parisian gourmet retail.
                </p>
              </div>
            </div>

            <div class="bg-white border border-slate-200 rounded-lg overflow-hidden shadow-sm hover:shadow-md transition-all group">
              <div class="aspect-[16/9] bg-slate-100 overflow-hidden relative">
                <img src="<?= asset('assets/images/opp-maritime.jpg') ?>" alt="Precision Industrial Rubber" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                <span class="absolute top-3 left-3 px-2.5 py-0.5 bg-[#b91c1c] text-white text-[11px] font-bold uppercase rounded">Industrial Tier</span>
              </div>
              <div class="p-5">
                <h3 class="font-serif-diplomatic font-bold text-base text-[#0b1e3b] mb-1.5">Precision Industrial Rubber</h3>
                <p class="text-xs sm:text-sm text-slate-600 leading-relaxed m-0">
                  Solid pneumatic industrial tires, elastomeric components, and high-purity vein graphite serving French automotive and aerospace tiers.
                </p>
              </div>
            </div>

            <div class="bg-white border border-slate-200 rounded-lg overflow-hidden shadow-sm hover:shadow-md transition-all group">
              <div class="aspect-[16/9] bg-slate-100 overflow-hidden relative">
                <img src="<?= asset('assets/images/opp-tech.jpg') ?>" alt="ICT and Digital Engineering" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                <span class="absolute top-3 left-3 px-2.5 py-0.5 bg-[#002654] text-white text-[11px] font-bold uppercase rounded">Station F &amp; Tech</span>
              </div>
              <div class="p-5">
                <h3 class="font-serif-diplomatic font-bold text-base text-[#0b1e3b] mb-1.5">ICT &amp; Digital Engineering</h3>
                <p class="text-xs sm:text-sm text-slate-600 leading-relaxed m-0">
                  Enterprise software engineering, cloud architecture, and AI R&amp;D partnerships tailored for French corporate ecosystems.
                </p>
              </div>
            </div>
          </div>
        </div>

        <!-- 2. Interactive French Economic Regions Slider -->
        <div data-carousel class="bg-slate-50 border border-slate-200 rounded-lg p-6 sm:p-8 shadow-sm">
          <div class="flex items-center justify-between gap-4 mb-6">
            <div>
              <span class="text-xs font-bold uppercase tracking-wider text-[#002654] block mb-1">Regional Hubs</span>
              <h2 class="font-serif-diplomatic text-2xl text-[#0b1e3b] font-bold m-0">Key French Economic Regions</h2>
            </div>
            <div class="flex items-center gap-2">
              <button type="button" data-carousel-prev aria-label="Previous region" class="w-9 h-9 rounded border border-slate-300 bg-white hover:bg-[#002654] hover:text-white text-slate-700 flex items-center justify-center transition-colors cursor-pointer">
                <span class="material-symbols-outlined text-base">chevron_left</span>
              </button>
              <button type="button" data-carousel-next aria-label="Next region" class="w-9 h-9 rounded border border-slate-300 bg-white hover:bg-[#002654] hover:text-white text-slate-700 flex items-center justify-center transition-colors cursor-pointer">
                <span class="material-symbols-outlined text-base">chevron_right</span>
              </button>
            </div>
          </div>

          <div data-carousel-track class="flex gap-5 overflow-x-auto snap-x snap-mandatory no-scrollbar pb-2">
            <div class="min-w-[270px] sm:min-w-[300px] snap-start bg-white border border-slate-200 rounded-lg p-5 shrink-0">
              <span class="px-2.5 py-0.5 bg-blue-50 text-[#002654] text-xs font-bold uppercase rounded">31% of French GDP</span>
              <h3 class="font-serif-diplomatic font-bold text-base text-[#0b1e3b] mt-3 mb-2">Île-de-France (Greater Paris)</h3>
              <p class="text-xs sm:text-sm text-slate-600 m-0 leading-relaxed">
                Headquarters powerhouse for luxury retail conglomerates, corporate procurement desks, Station F startup campus, and European trade finance.
              </p>
            </div>
            <div class="min-w-[270px] sm:min-w-[300px] snap-start bg-white border border-slate-200 rounded-lg p-5 shrink-0">
              <span class="px-2.5 py-0.5 bg-red-50 text-[#b91c1c] text-xs font-bold uppercase rounded">Industrial Engine</span>
              <h3 class="font-serif-diplomatic font-bold text-base text-[#0b1e3b] mt-3 mb-2">Auvergne-Rhône-Alpes (Lyon)</h3>
              <p class="text-xs sm:text-sm text-slate-600 m-0 leading-relaxed">
                Specializing in precision engineering, advanced chemicals, biotechnology, and clean energy innovation near Switzerland and Italy.
              </p>
            </div>
            <div class="min-w-[270px] sm:min-w-[300px] snap-start bg-white border border-slate-200 rounded-lg p-5 shrink-0">
              <span class="px-2.5 py-0.5 bg-amber-50 text-[#8d4004] text-xs font-bold uppercase rounded">Aerospace &amp; Agribusiness</span>
              <h3 class="font-serif-diplomatic font-bold text-base text-[#0b1e3b] mt-3 mb-2">Occitanie &amp; Nouvelle-Aquitaine</h3>
              <p class="text-xs sm:text-sm text-slate-600 m-0 leading-relaxed">
                Toulouse &amp; Bordeaux: Global benchmark in civil aviation (Airbus), spatial systems, gourmet agribusiness, and oceanic commerce.
              </p>
            </div>
            <div class="min-w-[270px] sm:min-w-[300px] snap-start bg-white border border-slate-200 rounded-lg p-5 shrink-0">
              <span class="px-2.5 py-0.5 bg-blue-50 text-[#002654] text-xs font-bold uppercase rounded">Mediterranean Port</span>
              <h3 class="font-serif-diplomatic font-bold text-base text-[#0b1e3b] mt-3 mb-2">Provence-Alpes-Côte d'Azur</h3>
              <p class="text-xs sm:text-sm text-slate-600 m-0 leading-relaxed">
                Marseille-Fos Port &amp; CMA CGM global headquarters—primary maritime entry point for Indian Ocean container freight from Colombo.
              </p>
            </div>
          </div>
        </div>

        <!-- 3. Regulatory & GSP+ Standards -->
        <div id="gsp" class="bg-slate-50 border border-slate-200 rounded-lg p-6 sm:p-8">
          <h2 class="font-serif-diplomatic text-2xl text-[#0b1e3b] font-bold mb-4">EU GSP+ &amp; Regulatory Compliance</h2>
          <div class="grid grid-cols-1 md:grid-cols-3 gap-4 text-xs sm:text-sm text-slate-700">
            <div class="p-4 bg-white border border-slate-200 rounded">
              <span class="material-symbols-outlined text-[#002654] text-2xl mb-1">verified</span>
              <strong class="block text-[#0b1e3b] mb-1">CE Marking &amp; REACH</strong>
              <p class="text-xs text-slate-600 m-0">Mandatory conformity certification for industrial, electrical, and consumer goods entering France.</p>
            </div>
            <div class="p-4 bg-white border border-slate-200 rounded">
              <span class="material-symbols-outlined text-[#b91c1c] text-2xl mb-1">eco</span>
              <strong class="block text-[#0b1e3b] mb-1">EUDR Traceability</strong>
              <p class="text-xs text-slate-600 m-0">Supply-chain due diligence and geolocation traceability for rubber and agricultural exports.</p>
            </div>
            <div class="p-4 bg-white border border-slate-200 rounded">
              <span class="material-symbols-outlined text-[#8d4004] text-2xl mb-1">description</span>
              <strong class="block text-[#0b1e3b] mb-1">REX &amp; Rules of Origin</strong>
              <p class="text-xs text-slate-600 m-0">Registered Exporter (REX) statements to unlock preferential zero/reduced EU tariff lines.</p>
            </div>
          </div>
        </div>
      </div>

      <!-- Right 4 Columns: Institutions, Fairs & Support -->
      <div class="lg:col-span-4 space-y-6">
        <div class="bg-slate-50 border border-slate-200 rounded-lg p-6 shadow-sm">
          <h3 class="font-serif-diplomatic text-lg text-[#0b1e3b] font-bold mb-4 pb-2 border-b border-slate-200">
            Institutional Network
          </h3>
          <ul class="space-y-3 text-xs text-slate-700 list-none p-0">
            <li>
              <strong class="text-[#002654] block">Business France:</strong>
              National agency supporting the international development of the French economy.
            </li>
            <li>
              <strong class="text-[#002654] block">MEDEF International:</strong>
              Premier French private sector confederation representing French multinationals abroad.
            </li>
            <li>
              <strong class="text-[#002654] block">The Ceylon Chamber of Commerce:</strong>
              Statutory trade certification, certificates of origin, and Council Secretariat.
            </li>
          </ul>
        </div>

        <div class="bg-white border border-slate-200 rounded-lg p-6 shadow-sm">
          <h3 class="font-serif-diplomatic text-lg text-[#0b1e3b] font-bold mb-4 pb-2 border-b border-slate-200">
            Major Trade Fairs in France
          </h3>
          <div class="space-y-3 text-xs">
            <div class="p-3 bg-slate-50 rounded border border-slate-100">
              <strong class="text-[#002654] block font-bold">SIAL Paris</strong>
              <span class="text-slate-500">Global food innovation &amp; Ceylon tea showcase.</span>
            </div>
            <div class="p-3 bg-slate-50 rounded border border-slate-100">
              <strong class="text-[#002654] block font-bold">Première Vision / Texworld Paris</strong>
              <span class="text-slate-500">World benchmark exhibitions for fashion textiles &amp; lace.</span>
            </div>
            <div class="p-3 bg-slate-50 rounded border border-slate-100">
              <strong class="text-[#002654] block font-bold">Paris Air Show (Le Bourget)</strong>
              <span class="text-slate-500">Premier aerospace, aeronautics, and industrial components fair.</span>
            </div>
          </div>
        </div>

        <div class="p-6 bg-[#002654] text-white rounded-lg shadow-sm">
          <h3 class="font-serif-diplomatic text-lg font-bold mb-2">Need Market Entry Advisory?</h3>
          <p class="text-xs text-slate-300 leading-relaxed mb-4">
            Connect with our Secretariat for verified buyer introductions, French trade regulations, and delegation participation.
          </p>
          <a href="<?= url('/contact') ?>" class="w-full py-2.5 px-4 bg-amber-400 hover:bg-amber-500 text-[#002654] font-bold text-xs uppercase tracking-wider rounded text-center block transition-all">
            Consult the Secretariat
          </a>
        </div>
      </div>

    </div>
  </div>
</section>
