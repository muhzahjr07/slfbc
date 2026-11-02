<!-- BREADCRUMBS & HERO -->
<section class="w-full bg-slate-50 border-b border-slate-200 py-10">
  <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
    <ul class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?= url('/') ?>">Home</a></li>
      <li class="breadcrumb-item"><a href="<?= url('/news') ?>">News</a></li>
      <li class="breadcrumb-item text-slate-800 font-semibold truncate max-w-xs sm:max-w-md"><?= e($article['title']) ?></li>
    </ul>

    <div class="inline-flex items-center gap-2 mb-2">
      <span class="w-2.5 h-2.5 bg-[#b91c1c] inline-block"></span>
      <span class="text-xs font-bold uppercase tracking-widest text-[#b91c1c]"><?= e($article['category_name'] ?? 'Official Dispatch') ?></span>
    </div>
    <h1 class="font-serif-diplomatic text-3xl sm:text-4xl lg:text-5xl text-[#0b1e3b] font-bold tracking-tight leading-tight">
      <?= e($article['title']) ?>
    </h1>
    <div class="flex flex-wrap items-center gap-4 mt-4 text-xs font-semibold text-slate-500">
      <span>Published on <strong><?= date('F d, Y', strtotime($article['published_at'])) ?></strong></span>
      <span>&bull;</span>
      <span>Author / Desk: <strong><?= e($article['author'] ?? 'Colombo Secretariat') ?></strong></span>
    </div>
  </div>
</section>

<!-- MAIN ARTICLE BODY -->
<article class="w-full bg-white py-16 border-b border-slate-200">
  <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
    
    <!-- Cover Image -->
    <?php if (!empty($article['cover_image'])): ?>
      <div class="rounded-lg overflow-hidden mb-10 shadow-sm border border-slate-200 bg-slate-100 max-h-[480px]">
        <img src="<?= asset($article['cover_image']) ?>" alt="<?= e($article['title']) ?>" class="w-full h-auto object-cover">
      </div>
    <?php endif; ?>

    <!-- Editorial Lead Paragraph -->
    <?php if (!empty($article['excerpt'])): ?>
      <div class="p-6 bg-slate-50 border-l-4 border-l-[#c59b27] border border-slate-200 rounded-lg mb-8 font-serif-diplomatic text-lg sm:text-xl text-[#002654] font-medium leading-relaxed">
        <?= e($article['excerpt']) ?>
      </div>
    <?php endif; ?>

    <!-- Article Content -->
    <div class="prose max-w-none text-slate-700 text-base leading-relaxed space-y-6">
      <?= nl2br(e($article['content'])) ?>
    </div>

    <!-- Article Footer / Meta & Return Link -->
    <div class="mt-12 pt-8 border-t border-slate-200 flex flex-col sm:flex-row items-center justify-between gap-4">
      <div class="text-xs text-slate-500">
        Categorized under: <strong class="text-[#002654]"><?= e($article['category_name'] ?? 'General') ?></strong>
      </div>
      <div class="flex items-center gap-3">
        <a href="<?= url('/news') ?>" class="px-4 py-2 border border-slate-300 rounded text-xs font-bold uppercase tracking-wider text-slate-700 hover:bg-slate-50 transition-all flex items-center gap-1">
          <span class="material-symbols-outlined text-sm">arrow_back</span> Return to News
        </a>
        <a href="<?= url('/contact') ?>?subject=<?= urlencode('Press Inquiry regarding: ' . $article['title']) ?>" class="px-4 py-2 bg-[#002654] text-white rounded text-xs font-bold uppercase tracking-wider hover:bg-[#001c3f] transition-all">
          Media Inquiries
        </a>
      </div>
    </div>

  </div>
</article>
