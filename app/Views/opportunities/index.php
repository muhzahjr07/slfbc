<!-- BREADCRUMBS & HERO -->
<section class="w-full bg-slate-50 border-b border-slate-200 py-10">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-12">
    <ul class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?= url('/') ?>">Home</a></li>
      <li class="breadcrumb-item text-slate-800 font-semibold">Business Opportunities</li>
    </ul>

    <div class="inline-flex items-center gap-2 mb-2">
      <span class="w-2.5 h-2.5 bg-[#c59b27] inline-block"></span>
      <span class="text-xs font-bold uppercase tracking-widest text-[#002654]">Commercial Facilitation</span>
    </div>
    <h1 class="font-serif-diplomatic text-3xl sm:text-4xl lg:text-5xl text-[#0b1e3b] font-bold tracking-tight">
      Business &amp; Partnership Tracks
    </h1>
    <p class="font-sans text-base sm:text-lg text-slate-600 max-w-3xl mt-4 leading-relaxed">
      Strategic bilateral corridors for joint ventures, trade expansion, technological transfer, and capital investment connecting Sri Lanka and France.
    </p>
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
            The Sri Lanka–France Business Council acts as an institutional matchmaker and advisory facilitator under The Ceylon Chamber of Commerce. The opportunities below represent strategic economic corridors prioritized in coordination with the Embassy of France, Business France, the Board of Investment of Sri Lanka (BOI), and the Export Development Board (EDB).
          </p>
        </div>
        <a href="<?= url('/contact') ?>" class="shrink-0 px-4 py-2.5 bg-[#002654] hover:bg-[#001c3f] text-white font-bold text-xs uppercase tracking-wider rounded transition-all">
          Propose an Initiative &rarr;
        </a>
      </div>
    </div>

    <!-- Opportunities Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
      <?php foreach ($opportunities as $opp): ?>
        <article class="bg-white border border-slate-200 rounded-lg p-6 shadow-sm hover:shadow-md hover:border-[#002654] flex flex-col justify-between transition-all group">
          <div>
            <!-- Top Badges -->
            <div class="flex items-center justify-between gap-2 mb-4">
              <span class="px-2.5 py-1 bg-amber-50 text-amber-900 border border-amber-200 text-xs font-bold uppercase rounded">
                <?= e($opp['track']) ?>
              </span>
              <span class="px-2 py-0.5 bg-blue-50 text-[#002654] text-[11px] font-bold uppercase rounded">
                <?= e($opp['status_label'] ?? 'Active Corridor') ?>
              </span>
            </div>

            <!-- Title -->
            <h3 class="font-serif-diplomatic text-xl text-[#0b1e3b] font-bold mb-3 leading-snug group-hover:text-[#002654]">
              <a href="<?= url('/opportunities/' . e($opp['slug'])) ?>" class="hover:underline">
                <?= e($opp['title']) ?>
              </a>
            </h3>

            <!-- Summary -->
            <p class="text-xs sm:text-sm text-slate-600 leading-relaxed mb-4">
              <?= e($opp['summary']) ?>
            </p>

            <?php if (!empty($opp['details'])): ?>
              <div class="p-3 bg-slate-50 border border-slate-100 rounded text-xs text-slate-700 leading-relaxed mb-4 line-clamp-3">
                <strong class="text-[#002654] block mb-1">Key Dimension:</strong>
                <?= e(substr($opp['details'], 0, 140)) ?>...
              </div>
            <?php endif; ?>
          </div>

          <!-- Footer Actions -->
          <div class="pt-4 border-t border-slate-100 flex items-center justify-between gap-2">
            <span class="text-[11px] font-bold uppercase text-slate-400">
              <?= e(ucfirst($opp['corridor'] ?? 'Bilateral')) ?>
            </span>
            <div class="flex items-center gap-2">
              <a href="<?= url('/opportunities/' . e($opp['slug'])) ?>" class="text-xs font-bold text-[#002654] hover:underline">
                Explore Track &rarr;
              </a>
            </div>
          </div>
        </article>
      <?php endforeach; ?>
    </div>

    <!-- Final Call to Action -->
    <div class="mt-16 p-8 bg-slate-50 border border-slate-200 rounded-lg text-center max-w-3xl mx-auto shadow-sm">
      <h3 class="font-serif-diplomatic text-2xl text-[#0b1e3b] font-bold mb-2">Propose a Bilateral Partnership or Investment Project</h3>
      <p class="text-sm text-slate-600 max-w-xl mx-auto mb-6 leading-relaxed">
        Are you a French firm seeking verified Sri Lankan joint venture partners or an established Sri Lankan exporter looking to penetrate the French market? Connect directly with our Secretariat trade officers.
      </p>
      <a href="<?= url('/contact') ?>" class="inline-flex items-center justify-center px-6 py-3 bg-[#b91c1c] hover:bg-[#991b1b] text-white font-bold text-sm uppercase tracking-wider rounded shadow transition-all gap-2">
        <span class="material-symbols-outlined text-base">mail</span> Engage with Council Secretariat
      </a>
    </div>
  </div>
</section>
