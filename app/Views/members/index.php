<?php
/**
 * Member Directory View
 * Sri Lanka–France Business Council (SLFBC)
 */
?>
<!-- SPLIT VISUAL HERO BANNER -->
<section class="w-full bg-gradient-to-r from-[#0b1e3b] via-[#002654] to-[#0b1e3b] text-white border-b border-slate-200 py-12 lg:py-16 relative overflow-hidden">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-12 relative z-10">
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center">
      <div class="lg:col-span-7">
        <ul class="breadcrumb mb-4">
          <li class="breadcrumb-item"><a href="<?= url('/') ?>" class="text-slate-300 hover:text-white">Home</a></li>
          <li class="breadcrumb-item text-amber-300 font-semibold">Member Directory</li>
        </ul>
        <div class="inline-flex items-center gap-2 px-3 py-1 bg-white/10 border border-white/20 rounded mb-3">
          <span class="w-2 h-2 rounded-full bg-amber-400"></span>
          <span class="text-xs font-bold uppercase tracking-widest text-amber-300">Bilateral Enterprise Network</span>
        </div>
        <h1 class="font-serif-diplomatic text-3xl sm:text-4xl lg:text-5xl text-white font-bold tracking-tight">
          Corporate Member Directory
        </h1>
        <p class="font-sans text-base sm:text-lg text-slate-200 max-w-2xl mt-4 leading-relaxed m-0">
          Connect with leading French multinational corporations, Sri Lankan export champions, and bilateral enterprise partners accredited under The Ceylon Chamber of Commerce.
        </p>
      </div>
      <div class="lg:col-span-5">
        <div class="bg-white/10 backdrop-blur-sm border border-white/20 p-2.5 rounded-lg shadow-xl">
          <div class="std-hero-img rounded">
            <img src="<?= asset('assets/images/hero-bilateral.jpg') ?>" alt="SLFBC Corporate Member Network" class="w-full h-full object-cover">
            <div class="absolute bottom-3 left-3 bg-[#0b1e3b]/90 px-3 py-1 rounded text-xs font-bold text-amber-300 uppercase">
              Verified Chamber Roster
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- MAIN DIRECTORY CONTENT -->
<section class="w-full bg-white py-14 border-b border-slate-200">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-12">
    
    <!-- Filter and Search Toolbar -->
    <div class="bg-slate-50 border border-slate-200 rounded-lg p-6 mb-10 shadow-sm">
      <form method="GET" action="<?= url('/members') ?>" id="memberSearchForm">
        <div class="grid grid-cols-1 md:grid-cols-12 gap-4 items-end">
          <div class="md:col-span-5">
            <label for="member-search-input" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">
              Search Enterprises
            </label>
            <div class="relative">
              <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 text-lg">search</span>
              <input type="text" id="member-search-input" name="search" class="w-full pl-9 pr-3 py-2 text-sm bg-white border border-slate-300 rounded focus:ring-2 focus:ring-[#002654] focus:border-[#002654]" placeholder="Search by corporate name, keywords, goods..." value="<?= e($currentSearch ?? '') ?>">
            </div>
          </div>

          <div class="md:col-span-4">
            <label for="member-sector-select" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1.5">
              Filter by Industry Sector
            </label>
            <select id="member-sector-select" name="sector" class="w-full py-2 px-3 text-sm bg-white border border-slate-300 rounded focus:ring-2 focus:ring-[#002654] focus:border-[#002654]" onchange="this.form.submit()">
              <option value="">All Industry Sectors</option>
              <?php foreach ($sectors as $sec): ?>
                <option value="<?= (int)$sec['id'] ?>" <?= ($currentSectorId === (int)$sec['id']) ? 'selected' : '' ?>>
                  <?= e($sec['name']) ?>
                </option>
              <?php endforeach; ?>
            </select>
          </div>

          <div class="md:col-span-3 flex items-center gap-2">
            <button type="submit" class="flex-1 py-2 px-4 bg-[#002654] hover:bg-[#001c3f] text-white text-xs font-bold uppercase tracking-wider rounded transition-all shadow-sm">
              Filter
            </button>
            <?php if (!empty($currentSearch) || !empty($currentSectorId)): ?>
              <a href="<?= url('/members') ?>" class="py-2 px-3 border border-slate-300 bg-white hover:bg-slate-100 text-slate-700 text-xs font-bold uppercase tracking-wider rounded transition-all">
                Reset
              </a>
            <?php endif; ?>
          </div>
        </div>
      </form>
    </div>

    <!-- Results Counter & Action CTA -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-8 pb-4 border-b border-slate-100">
      <p class="text-xs sm:text-sm text-slate-600 m-0">
        Showing <strong class="text-[#002654]"><?= count($members) ?></strong> of <strong class="text-slate-800"><?= (int)$totalMembers ?></strong> verified member enterprises
        <?php if (!empty($currentSearch)): ?>
          matching "<span class="text-slate-900 font-semibold"><?= e($currentSearch) ?></span>"
        <?php endif; ?>
      </p>

      <a href="<?= url('/apply') ?>" class="inline-flex items-center gap-1.5 text-xs font-bold uppercase tracking-wider text-[#b91c1c] hover:text-[#991b1b]">
        <span>+ Apply to Join Directory</span> &rarr;
      </a>
    </div>

    <!-- Live Search Empty State (Client-Side) -->
    <div id="member-empty-state" class="hidden bg-slate-50 border border-slate-200 rounded-lg p-12 text-center max-w-xl mx-auto shadow-sm my-8">
      <span class="material-symbols-outlined text-5xl text-slate-400 mb-3">search_off</span>
      <h3 class="font-serif-diplomatic text-xl font-bold text-[#002654] mb-2">No Matching Member Enterprises</h3>
      <p class="text-sm text-slate-600 mb-6 leading-relaxed">
        No registered corporate member matched your live filter criteria. Try searching with a broader keyword or resetting the sector filter.
      </p>
      <a href="<?= url('/members') ?>" class="inline-block px-5 py-2.5 bg-[#002654] text-white font-bold text-xs uppercase tracking-wider rounded">
        Reset Directory Filter
      </a>
    </div>

    <!-- Directory Grid -->
    <?php if (empty($members)): ?>
      <div class="bg-slate-50 border border-slate-200 rounded-lg p-12 text-center max-w-xl mx-auto shadow-sm my-8">
        <span class="material-symbols-outlined text-5xl text-slate-400 mb-3">corporate_fare</span>
        <h3 class="font-serif-diplomatic text-xl font-bold text-[#002654] mb-2">No Member Enterprises Found</h3>
        <p class="text-sm text-slate-600 mb-6 leading-relaxed">
          No verified records match your active search and sector filters. Try clearing your query or explore all sectors.
        </p>
        <a href="<?= url('/members') ?>" class="inline-block px-5 py-2.5 bg-[#002654] text-white font-bold text-xs uppercase tracking-wider rounded">
          Clear Search Filters
        </a>
      </div>
    <?php else: ?>
      <div id="member-directory-grid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <?php foreach ($members as $m):
          $isFrench = stripos($m['origin'] ?? '', 'France') !== false;
        ?>
          <div class="member-card bg-white border border-slate-200 rounded-lg p-6 shadow-sm hover:shadow-md hover:border-[#002654] flex flex-col justify-between transition-all group"
               data-name="<?= e(strtolower($m['name'])) ?>"
               data-sector-id="<?= e($m['sector_id'] ?? '') ?>"
               data-description="<?= e(strtolower($m['short_description'] ?? '')) ?>">
            <div>
              <div class="flex items-start gap-4 mb-4">
                <div class="w-14 h-14 rounded-lg bg-[#002654] text-white flex items-center justify-center overflow-hidden p-1 shrink-0 shadow-sm">
                  <?php if (!empty($m['logo_path']) && file_exists(dirname(__DIR__, 2) . '/public' . $m['logo_path'])): ?>
                    <img src="<?= asset($m['logo_path']) ?>" alt="<?= e($m['name']) ?>" class="max-w-full max-h-full object-contain bg-white p-1 rounded">
                  <?php else: ?>
                    <span class="font-serif-diplomatic font-bold text-base">
                      <?= e(strtoupper(substr(preg_replace('/[^A-Za-z]/', '', $m['name']), 0, 2))) ?>
                    </span>
                  <?php endif; ?>
                </div>
                <div class="min-w-0">
                  <h3 class="font-serif-diplomatic text-base font-bold text-[#0b1e3b] leading-snug group-hover:text-[#002654] truncate mb-1">
                    <a href="<?= url('/members/' . urlencode($m['slug'])) ?>">
                      <?= e($m['name']) ?>
                    </a>
                  </h3>
                  <span class="inline-block px-2 py-0.5 bg-blue-50 border border-blue-200 text-[#002654] font-semibold text-[11px] rounded">
                    <?= e($m['sector_name'] ?? 'Bilateral Enterprise') ?>
                  </span>
                </div>
              </div>

              <p class="text-xs text-slate-600 leading-relaxed mb-4 line-clamp-2">
                <?= e($m['short_description'] ?? 'Verified corporate member under The Ceylon Chamber of Commerce.') ?>
              </p>
            </div>

            <div class="pt-3 border-t border-slate-100 flex items-center justify-between text-xs">
              <span class="px-2 py-0.5 rounded bg-slate-100 text-slate-700 font-bold text-[11px] uppercase flex items-center gap-1.5">
                <span class="w-2 h-2 rounded-full <?= $isFrench ? 'bg-[#b91c1c]' : 'bg-[#c59b27]' ?>"></span>
                <?= e($m['origin'] ?? 'Sri Lanka') ?>
              </span>
              <a href="<?= url('/members/' . urlencode($m['slug'])) ?>" class="font-bold text-[#002654] hover:underline flex items-center gap-1">
                Dossier &rarr;
              </a>
            </div>
          </div>
        <?php endforeach; ?>
      </div>

      <!-- Pagination Controls -->
      <?php if ($totalPages > 1): ?>
        <div class="flex items-center justify-center gap-2 mt-12">
          <?php for ($p = 1; $p <= $totalPages; $p++): ?>
            <?php 
              $queryArgs = [];
              if (!empty($currentSearch)) $queryArgs['search'] = $currentSearch;
              if (!empty($currentSectorId)) $queryArgs['sector'] = $currentSectorId;
              $queryArgs['page'] = $p;
              $pageUrl = url('/members') . '?' . http_build_query($queryArgs);
            ?>
            <a href="<?= $pageUrl ?>" class="min-w-[40px] text-center py-2 px-3 text-xs font-bold rounded border <?= $p === $currentPage ? 'bg-[#002654] text-white border-[#002654]' : 'bg-white text-slate-700 border-slate-300 hover:bg-slate-100' ?>">
              <?= $p ?>
            </a>
          <?php endfor; ?>
        </div>
      <?php endif; ?>
    <?php endif; ?>

  </div>
</section>
