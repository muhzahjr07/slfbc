<!-- BREADCRUMBS & HERO -->
<section class="w-full bg-slate-50 border-b border-slate-200 py-10">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-12">
    <ul class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?= url('/') ?>">Home</a></li>
      <li class="breadcrumb-item"><a href="<?= url('/members') ?>">Member Directory</a></li>
      <li class="breadcrumb-item text-slate-800 font-semibold truncate max-w-xs sm:max-w-md"><?= e($member['name']) ?></li>
    </ul>

    <div class="inline-flex items-center gap-2 mb-2">
      <span class="w-2.5 h-2.5 bg-[#002654] inline-block"></span>
      <span class="text-xs font-bold uppercase tracking-widest text-[#002654]">Verified Council Member</span>
    </div>
    <h1 class="font-serif-diplomatic text-3xl sm:text-4xl lg:text-5xl text-[#0b1e3b] font-bold tracking-tight">
      <?= e($member['name']) ?>
    </h1>
    <div class="flex flex-wrap items-center gap-3 mt-4 text-xs font-semibold">
      <span class="px-3 py-1 bg-[#002654] text-white rounded font-bold uppercase"><?= e($member['sector_name'] ?? 'Bilateral Enterprise') ?></span>
      <span class="px-3 py-1 bg-amber-100 text-amber-900 border border-amber-200 rounded uppercase font-bold"><?= ucfirst(e($member['tier'] ?? 'corporate')) ?> Tier</span>
      <span class="text-slate-500">Origin / Operation: <strong><?= e($member['origin'] ?? 'Sri Lanka') ?></strong></span>
    </div>
  </div>
</section>

<!-- MAIN CONTENT -->
<section class="w-full bg-white py-16 border-b border-slate-200">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-12">
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-start">
      
      <!-- Left 8 Columns: Profile & Bilateral Role -->
      <div class="lg:col-span-8 space-y-10">
        <!-- Logo & Headline Card -->
        <div class="bg-slate-50 border border-slate-200 rounded-lg p-6 sm:p-8 flex flex-col sm:flex-row items-center gap-6 shadow-sm">
          <div class="w-24 h-24 sm:w-28 sm:h-28 rounded-lg bg-white border border-slate-200 flex items-center justify-center p-3 shrink-0 shadow-inner">
            <?php if (!empty($member['logo_path']) && file_exists(dirname(__DIR__, 3) . '/public' . $member['logo_path'])): ?>
              <img src="<?= asset($member['logo_path']) ?>" alt="<?= e($member['name']) ?>" class="max-w-full max-h-full object-contain">
            <?php else: ?>
              <span class="font-serif-diplomatic text-3xl font-bold text-[#002654]">
                <?= e(substr($member['name'], 0, 2)) ?>
              </span>
            <?php endif; ?>
          </div>

          <div class="text-center sm:text-left flex-1">
            <h2 class="font-serif-diplomatic text-2xl text-[#0b1e3b] font-bold mb-2"><?= e($member['name']) ?></h2>
            <p class="text-xs text-slate-500 font-semibold uppercase tracking-wider mb-3">
              Sector: <?= e($member['sector_name'] ?? 'Corporate Enterprise') ?>
            </p>
            <div class="flex flex-wrap items-center justify-center sm:justify-start gap-2">
              <span class="px-2.5 py-0.5 rounded text-xs font-semibold bg-emerald-100 text-emerald-800 flex items-center gap-1">
                <span class="w-1.5 h-1.5 rounded-full bg-emerald-600"></span> Active Register
              </span>
              <span class="px-2.5 py-0.5 rounded text-xs font-semibold bg-blue-100 text-blue-900">
                Ceylon Chamber Member
              </span>
            </div>
          </div>
        </div>

        <!-- Corporate Overview -->
        <article class="space-y-6 text-slate-700 leading-relaxed text-base">
          <h3 class="font-serif-diplomatic text-2xl text-[#0b1e3b] font-bold pb-2 border-b border-slate-200">
            Corporate Profile &amp; Mission
          </h3>
          <p class="font-serif-diplomatic text-lg text-[#002654] font-medium leading-relaxed italic border-l-4 border-l-[#c59b27] pl-4 my-4">
            <?= nl2br(e($member['short_description'] ?? 'Active member organization participating in bilateral commercial exchange.')) ?>
          </p>

          <?php if (!empty($member['full_profile'])): ?>
            <h3 class="font-serif-diplomatic text-2xl text-[#0b1e3b] font-bold pt-4 pb-2 border-b border-slate-200">
              Bilateral Commercial Nexus &amp; Operations
            </h3>
            <div class="prose max-w-none text-slate-700">
              <?= nl2br(e($member['full_profile'])) ?>
            </div>
          <?php endif; ?>
        </article>

        <!-- Back to Directory -->
        <div class="pt-6 border-t border-slate-200 flex flex-wrap items-center justify-between gap-4">
          <a href="<?= url('/members') ?>" class="text-sm font-semibold text-[#002654] hover:underline flex items-center gap-1">
            <span class="material-symbols-outlined text-base">arrow_back</span> Return to Member Directory
          </a>
          <a href="<?= url('/contact') ?>?subject=<?= urlencode('Introduction to Member: ' . $member['name']) ?>" class="px-5 py-2.5 bg-[#002654] hover:bg-[#001c3f] text-white font-bold text-xs uppercase tracking-wider rounded transition-all">
            Request B2B Introduction
          </a>
        </div>
      </div>

      <!-- Right 4 Columns: Particulars Sidebar -->
      <div class="lg:col-span-4 space-y-6">
        <!-- Particulars Card -->
        <div class="bg-slate-50 border border-slate-200 rounded-lg p-6 shadow-sm">
          <h3 class="font-serif-diplomatic text-lg text-[#0b1e3b] font-bold mb-4 pb-2 border-b border-slate-200">
            Corporate Particulars
          </h3>
          <dl class="space-y-4 text-xs">
            <div>
              <dt class="text-slate-500 uppercase font-bold tracking-wider">Origin / Capital</dt>
              <dd class="text-sm font-bold text-slate-800 mt-0.5"><?= e($member['origin'] ?? 'Sri Lanka') ?></dd>
            </div>
            <div>
              <dt class="text-slate-500 uppercase font-bold tracking-wider">Industry Classification</dt>
              <dd class="text-sm font-bold text-[#002654] mt-0.5"><?= e($member['sector_name'] ?? 'General Commerce') ?></dd>
            </div>
            <div>
              <dt class="text-slate-500 uppercase font-bold tracking-wider">Membership Tier</dt>
              <dd class="text-sm font-bold text-slate-800 mt-0.5"><?= ucfirst(e($member['tier'] ?? 'corporate')) ?></dd>
            </div>
            <?php if (!empty($member['website_url'])): ?>
              <div>
                <dt class="text-slate-500 uppercase font-bold tracking-wider">Corporate Website</dt>
                <dd class="mt-1">
                  <a href="<?= e($member['website_url']) ?>" target="_blank" rel="noopener noreferrer" class="text-xs font-bold text-[#002654] hover:underline break-all flex items-center gap-1">
                    <?= e($member['website_url']) ?> <span class="material-symbols-outlined text-xs">open_in_new</span>
                  </a>
                </dd>
              </div>
            <?php endif; ?>
          </dl>
        </div>

        <!-- Institutional Trust Box -->
        <div class="p-6 bg-slate-50 border-l-4 border-l-[#002654] border border-slate-200 rounded-lg">
          <h4 class="font-serif-diplomatic text-sm font-bold text-[#002654] mb-1">Council Accreditation</h4>
          <p class="text-xs text-slate-600 leading-relaxed m-0">
            This enterprise is a verified corporate member of the Sri Lanka–France Business Council governed under The Ceylon Chamber of Commerce.
          </p>
        </div>
      </div>

    </div>
  </div>
</section>
