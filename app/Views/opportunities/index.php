<?php
$oppImages = [
    'investment-renewable-infrastructure' => 'assets/images/opp-energy.jpg',
    'high-value-bilateral-trade-exports' => 'assets/images/opp-apparel.jpg',
    'market-entry-regulatory-navigation' => 'assets/images/chamber-building.jpg',
    'maritime-supply-chain-alliances' => 'assets/images/opp-maritime.jpg',
    'luxury-tourism-culinary-exchange' => 'assets/images/opp-tourism.jpg',
    'software-engineering-ai-venture-alliances' => 'assets/images/opp-tech.jpg',
];
?>
<!-- SPLIT VISUAL HERO BANNER -->
<section class="w-full bg-gradient-to-r from-[#0b1e3b] via-[#002654] to-[#0b1e3b] text-white border-b border-slate-200 py-12 lg:py-16 relative overflow-hidden">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-12 relative z-10">
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center">
      <div class="lg:col-span-7">
        <ul class="breadcrumb mb-4">
          <li class="breadcrumb-item"><a href="<?= url('/') ?>" class="text-slate-300 hover:text-white">Home</a></li>
          <li class="breadcrumb-item text-amber-300 font-semibold">Business Opportunities</li>
        </ul>
        <div class="inline-flex items-center gap-2 px-3 py-1 bg-white/10 border border-white/20 rounded mb-3">
          <span class="w-2 h-2 rounded-full bg-amber-400"></span>
          <span class="text-xs font-bold uppercase tracking-widest text-amber-300">Commercial Facilitation</span>
        </div>
        <h1 class="font-serif-diplomatic text-3xl sm:text-4xl lg:text-5xl text-white font-bold tracking-tight">
          Business &amp; Partnership Tracks
        </h1>
        <p class="font-sans text-base sm:text-lg text-slate-200 max-w-2xl mt-4 leading-relaxed m-0">
          Strategic bilateral corridors for joint ventures, trade expansion, technological transfer, and capital investment connecting Sri Lanka and France.
        </p>
      </div>
      <div class="lg:col-span-5">
        <div class="bg-white/10 backdrop-blur-sm border border-white/20 p-2.5 rounded-lg shadow-xl">
          <div class="std-hero-img rounded">
            <img src="<?= asset('assets/images/corridor-maritime.jpg') ?>" alt="Franco-Lankan Trade and Investment Corridors" class="w-full h-full object-cover">
            <div class="absolute bottom-3 left-3 bg-[#0b1e3b]/90 px-3 py-1 rounded text-xs font-bold text-amber-300 uppercase">
              Active Bilateral Project Pipeline
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
    <!-- Framework Guidance Banner -->
    <div class="p-6 bg-slate-50 border-l-4 border-l-[#002654] border border-slate-200 rounded-lg shadow-sm mb-12">
      <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
          <h2 class="text-base font-bold text-[#002654] mb-1 font-serif-diplomatic">Bilateral Project Facilitation Framework</h2>
          <p class="text-xs sm:text-sm text-slate-600 max-w-4xl m-0 leading-relaxed">
            Prioritized in coordination with the Embassy of France, Business France, the Board of Investment of Sri Lanka (BOI), and the Export Development Board (EDB).
          </p>
        </div>
        <a href="<?= url('/contact') ?>" class="shrink-0 px-4 py-2.5 bg-[#002654] hover:bg-[#001c3f] text-white font-bold text-xs uppercase tracking-wider rounded transition-all">
          Propose an Initiative &rarr;
        </a>
      </div>
    </div>

    <!-- Visual Opportunities Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
      <?php foreach ($opportunities as $opp):
        $imgPath = $oppImages[$opp['slug']] ?? 'assets/images/opp-maritime.jpg';
      ?>
        <article class="bg-white border border-slate-200 rounded-lg overflow-hidden shadow-sm hover:shadow-md hover:border-[#002654] flex flex-col justify-between transition-all group">
          <div>
            <div class="std-card-img bg-slate-100">
              <img src="<?= asset($imgPath) ?>" alt="<?= e($opp['title']) ?>" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
              <span class="absolute top-3 left-3 px-2.5 py-1 bg-[#002654]/90 backdrop-blur-sm text-white text-xs font-bold uppercase rounded">
                <?= e($opp['track']) ?>
              </span>
              <span class="absolute bottom-3 right-3 w-9 h-9 rounded-full bg-white/95 text-[#002654] flex items-center justify-center shadow">
                <span class="material-symbols-outlined text-lg"><?= e($opp['icon'] ?? 'account_balance') ?></span>
              </span>
            </div>

            <div class="p-6">
              <span class="text-[11px] font-bold uppercase text-amber-800 block mb-1">
                <?= e($opp['status_label'] ?? 'Active Corridor') ?>
              </span>
              <h3 class="font-serif-diplomatic text-xl text-[#0b1e3b] font-bold mb-2 leading-snug group-hover:text-[#002654]">
                <a href="<?= url('/opportunities/' . e($opp['slug'])) ?>" class="hover:underline">
                  <?= e($opp['title']) ?>
                </a>
              </h3>
              <p class="text-xs sm:text-sm text-slate-600 leading-relaxed line-clamp-3 m-0">
                <?= e($opp['summary']) ?>
              </p>
            </div>
          </div>

          <div class="px-6 py-4 bg-slate-50 border-t border-slate-200 flex items-center justify-between gap-2">
            <span class="text-[11px] font-bold uppercase text-slate-500">
              <?= e(str_replace('_', ' ', $opp['corridor'] ?? 'Bilateral')) ?>
            </span>
            <a href="<?= url('/opportunities/' . e($opp['slug'])) ?>" class="text-xs font-bold text-[#002654] hover:underline flex items-center gap-1">
              Explore Track <span class="material-symbols-outlined text-sm">arrow_forward</span>
            </a>
          </div>
        </article>
      <?php endforeach; ?>
    </div>

    <!-- Final Call to Action -->
    <div class="mt-16 p-8 bg-slate-50 border border-slate-200 rounded-lg text-center max-w-3xl mx-auto shadow-sm">
      <h3 class="font-serif-diplomatic text-2xl text-[#0b1e3b] font-bold mb-2">Propose a Bilateral Partnership or Investment Project</h3>
      <p class="text-sm text-slate-600 max-w-xl mx-auto mb-6 leading-relaxed">
        Seeking verified Sri Lankan joint venture partners or looking to enter the French market? Connect directly with our Secretariat trade officers.
      </p>
      <a href="<?= url('/contact') ?>" class="inline-flex items-center justify-center px-6 py-3 bg-[#b91c1c] hover:bg-[#991b1b] text-white font-bold text-sm uppercase tracking-wider rounded shadow transition-all gap-2">
        <span class="material-symbols-outlined text-base">mail</span> Engage with Council Secretariat
      </a>
    </div>
  </div>
</section>
