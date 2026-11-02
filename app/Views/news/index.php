<!-- BREADCRUMBS & HERO -->
<section class="w-full bg-slate-50 border-b border-slate-200 py-10">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-12">
    <ul class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?= url('/') ?>">Home</a></li>
      <li class="breadcrumb-item text-slate-800 font-semibold">News &amp; Communiqués</li>
    </ul>

    <div class="inline-flex items-center gap-2 mb-2">
      <span class="w-2.5 h-2.5 bg-[#b91c1c] inline-block"></span>
      <span class="text-xs font-bold uppercase tracking-widest text-[#b91c1c]">Official Dispatches</span>
    </div>
    <h1 class="font-serif-diplomatic text-3xl sm:text-4xl lg:text-5xl text-[#0b1e3b] font-bold tracking-tight">
      News, Communiqués &amp; Policy Dispatches
    </h1>
    <p class="font-sans text-base sm:text-lg text-slate-600 max-w-3xl mt-4 leading-relaxed">
      Stay informed on bilateral trade policy developments, chamber communiqués, diplomatic engagements, and commercial intelligence connecting Sri Lanka and France.
    </p>
  </div>
</section>

<!-- MAIN CONTENT -->
<section class="w-full bg-white py-16 border-b border-slate-200">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-12">
    
    <!-- Filter & Search Card -->
    <div class="bg-slate-50 border border-slate-200 rounded-lg p-6 shadow-sm mb-12">
      <form method="GET" action="<?= url('/news') ?>" class="grid grid-cols-1 md:grid-cols-12 gap-4 items-end">
        <div class="md:col-span-5">
          <label for="newsSearch" class="block text-xs font-bold uppercase tracking-wider text-slate-600 mb-1.5">Search Articles</label>
          <input type="text" id="newsSearch" name="search" class="w-full px-3.5 py-2.5 text-sm rounded border border-slate-300 focus:ring-2 focus:ring-[#002654] focus:border-[#002654]" placeholder="Search by title, topics, keywords..." value="<?= e($currentSearch ?? '') ?>">
        </div>

        <div class="md:col-span-4">
          <label for="newsCategory" class="block text-xs font-bold uppercase tracking-wider text-slate-600 mb-1.5">Category Classification</label>
          <select id="newsCategory" name="category" class="w-full px-3.5 py-2.5 text-sm rounded border border-slate-300 focus:ring-2 focus:ring-[#002654] focus:border-[#002654]" onchange="this.form.submit()">
            <option value="">All Communiqué Categories</option>
            <?php foreach ($categories as $cat): ?>
              <option value="<?= (int)$cat['id'] ?>" <?= ($currentCategoryId === (int)$cat['id']) ? 'selected' : '' ?>>
                <?= e($cat['name']) ?>
              </option>
            <?php endforeach; ?>
          </select>
        </div>

        <div class="md:col-span-3 flex items-center gap-2">
          <button type="submit" class="flex-1 py-2.5 px-4 bg-[#002654] hover:bg-[#001c3f] text-white font-bold rounded text-xs uppercase tracking-wider transition-all">
            Filter Articles
          </button>
          <?php if (!empty($currentSearch) || !empty($currentCategoryId)): ?>
            <a href="<?= url('/news') ?>" class="py-2.5 px-3 bg-white border border-slate-300 hover:bg-slate-100 text-slate-700 font-bold rounded text-xs uppercase tracking-wider transition-all">
              Reset
            </a>
          <?php endif; ?>
        </div>
      </form>
    </div>

    <!-- Article Listing Grid -->
    <?php if (empty($articles)): ?>
      <div class="bg-slate-50 border border-slate-200 rounded-lg p-12 text-center max-w-xl mx-auto shadow-sm">
        <span class="material-symbols-outlined text-5xl text-slate-400 mb-3">newspaper</span>
        <h3 class="font-serif-diplomatic text-xl font-bold text-[#002654] mb-2">No Articles Located</h3>
        <p class="text-sm text-slate-600 mb-6 leading-relaxed">
          No verified communiqués match your search criteria. Please adjust your keywords or reset filters to view all dispatches.
        </p>
        <a href="<?= url('/news') ?>" class="inline-block px-5 py-2.5 bg-[#002654] text-white font-bold text-xs uppercase tracking-wider rounded">
          View All News
        </a>
      </div>
    <?php else: ?>
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        <?php foreach ($articles as $art): ?>
          <article class="bg-white border border-slate-200 rounded-lg overflow-hidden shadow-sm hover:shadow-md hover:border-[#002654] flex flex-col justify-between transition-all group">
            <div>
              <!-- Cover Image -->
              <div class="aspect-video bg-slate-100 overflow-hidden relative">
                <?php if (!empty($art['cover_image'])): ?>
                  <img src="<?= asset($art['cover_image']) ?>" alt="<?= e($art['title']) ?>" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                <?php else: ?>
                  <div class="w-full h-full flex items-center justify-center bg-slate-100 text-slate-400">
                    <span class="material-symbols-outlined text-4xl">article</span>
                  </div>
                <?php endif; ?>
                <span class="absolute top-3 left-3 px-2.5 py-1 bg-[#002654] text-white text-[11px] font-bold uppercase rounded shadow">
                  <?= e($art['category_name'] ?? 'Chamber Dispatch') ?>
                </span>
              </div>

              <!-- Content Body -->
              <div class="p-6">
                <time class="text-xs font-semibold text-slate-400 block mb-2">
                  <?= date('F d, Y', strtotime($art['published_at'])) ?> &bull; <?= e($art['author'] ?? 'Colombo Secretariat') ?>
                </time>
                <h3 class="font-serif-diplomatic text-xl font-bold text-[#0b1e3b] mb-3 leading-snug group-hover:text-[#002654]">
                  <a href="<?= url('/news/' . e($art['slug'])) ?>" class="hover:underline">
                    <?= e($art['title']) ?>
                  </a>
                </h3>
                <p class="text-xs sm:text-sm text-slate-600 line-clamp-3 leading-relaxed">
                  <?= e($art['excerpt'] ?: substr(strip_tags($art['content']), 0, 140) . '...') ?>
                </p>
              </div>
            </div>

            <div class="px-6 pb-6 pt-2 border-t border-slate-100 flex items-center justify-between">
              <span class="text-xs font-bold text-[#b91c1c] uppercase tracking-wider group-hover:underline">Read Communiqué &rarr;</span>
              <span class="text-slate-400 material-symbols-outlined text-sm">visibility</span>
            </div>
          </article>
        <?php endforeach; ?>
      </div>
    <?php endif; ?>

  </div>
</section>
