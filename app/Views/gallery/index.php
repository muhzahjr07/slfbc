<!-- BREADCRUMBS & HERO -->
<section class="w-full bg-slate-50 border-b border-slate-200 py-10">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-12">
    <ul class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?= url('/') ?>">Home</a></li>
      <li class="breadcrumb-item text-slate-800 font-semibold">Photo Gallery &amp; Media</li>
    </ul>

    <div class="inline-flex items-center gap-2 mb-2">
      <span class="w-2.5 h-2.5 bg-[#c59b27] inline-block"></span>
      <span class="text-xs font-bold uppercase tracking-widest text-[#002654]">Documentary Records</span>
    </div>
    <h1 class="font-serif-diplomatic text-3xl sm:text-4xl lg:text-5xl text-[#0b1e3b] font-bold tracking-tight">
      Photo Gallery &amp; Protocol Media
    </h1>
    <p class="font-sans text-base sm:text-lg text-slate-600 max-w-3xl mt-4 leading-relaxed">
      Photographic documentation of Sri Lanka–France bilateral trade missions, diplomatic assemblies, ministerial roundtables, and chamber celebrations.
    </p>
  </div>
</section>

<!-- MAIN CONTENT -->
<section class="w-full bg-white py-16 border-b border-slate-200">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-12">
    
    <?php if (empty($items)): ?>
      <!-- Curated Media Showcases if Database Items are Pending -->
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        <!-- Sample Ingested Protocol Event 1 -->
        <article class="bg-white border border-slate-200 rounded-lg overflow-hidden shadow-sm hover:shadow-md transition-all group">
          <div class="aspect-video bg-slate-100 overflow-hidden relative">
            <img src="<?= asset('assets/images/bilateral-summit.jpg') ?>" alt="Franco-Lankan Trade Forum" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
            <span class="absolute top-3 left-3 px-2.5 py-1 bg-[#002654] text-white text-[11px] font-bold uppercase rounded shadow">
              Bilateral Summit
            </span>
          </div>
          <div class="p-5">
            <time class="text-[11px] font-bold uppercase text-slate-400 block mb-1">Paris &bull; Hôtel de Crillon</time>
            <h3 class="font-serif-diplomatic text-lg font-bold text-[#0b1e3b] mb-2 leading-snug">
              Sri Lanka–France Bilateral Investment Forum
            </h3>
            <p class="text-xs text-slate-600 leading-relaxed m-0">
              High-level assembly convening chief executives, institutional investors, and ministry delegates on sovereign infrastructure financing and logistics corridors.
            </p>
          </div>
        </article>

        <!-- Sample Ingested Protocol Event 2 -->
        <article class="bg-white border border-slate-200 rounded-lg overflow-hidden shadow-sm hover:shadow-md transition-all group">
          <div class="aspect-video bg-slate-100 overflow-hidden relative">
            <img src="<?= asset('assets/images/hero-bilateral.jpg') ?>" alt="Diplomatic Delegation Assembly" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
            <span class="absolute top-3 left-3 px-2.5 py-1 bg-[#b91c1c] text-white text-[11px] font-bold uppercase rounded shadow">
              Commercial Mission
            </span>
          </div>
          <div class="p-5">
            <time class="text-[11px] font-bold uppercase text-slate-400 block mb-1">Colombo &bull; Ceylon Chamber</time>
            <h3 class="font-serif-diplomatic text-lg font-bold text-[#0b1e3b] mb-2 leading-snug">
              French Industrial Contractors Delegation
            </h3>
            <p class="text-xs text-slate-600 leading-relaxed m-0">
              Evaluation tour of Sri Lanka’s logistics infrastructure and green deep-water port terminal transitions at the Port of Colombo.
            </p>
          </div>
        </article>

        <!-- Sample Ingested Protocol Event 3 -->
        <article class="bg-white border border-slate-200 rounded-lg overflow-hidden shadow-sm hover:shadow-md transition-all group">
          <div class="aspect-video bg-slate-100 overflow-hidden relative">
            <img src="<?= asset('assets/images/chamber-building.jpg') ?>" alt="Ceylon Chamber Headquarters" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
            <span class="absolute top-3 left-3 px-2.5 py-1 bg-[#c59b27] text-white text-[11px] font-bold uppercase rounded shadow">
              Chamber Assembly
            </span>
          </div>
          <div class="p-5">
            <time class="text-[11px] font-bold uppercase text-slate-400 block mb-1">Colombo 02 &bull; Chamber Headquarters</time>
            <h3 class="font-serif-diplomatic text-lg font-bold text-[#0b1e3b] mb-2 leading-snug">
              Annual General Meeting &amp; Committee Election
            </h3>
            <p class="text-xs text-slate-600 leading-relaxed m-0">
              Statutory assembly convening member leadership to review annual audited finances and elect the incoming Executive Committee.
            </p>
          </div>
        </article>
      </div>

      <!-- Ingest Notice -->
      <div class="mt-12 p-6 bg-slate-50 border border-slate-200 rounded-lg text-center max-w-xl mx-auto shadow-sm">
        <span class="material-symbols-outlined text-4xl text-slate-400 mb-2">collections</span>
        <h4 class="font-serif-diplomatic text-base font-bold text-[#002654] mb-1">Archival Media Cataloguing</h4>
        <p class="text-xs text-slate-500 m-0 leading-relaxed">
          Historical photographic negatives and high-resolution event dispatches from 2004–2025 are being digitized and uploaded to the Council's official repository.
        </p>
      </div>

    <?php else: ?>
      <!-- Dynamic Ingested Database Items -->
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        <?php foreach ($items as $item): ?>
          <article class="bg-white border border-slate-200 rounded-lg overflow-hidden shadow-sm hover:shadow-md transition-all group">
            <div class="aspect-video bg-slate-100 overflow-hidden relative">
              <img src="<?= asset($item['image_path']) ?>" alt="<?= e($item['title']) ?>" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
              <span class="absolute top-3 left-3 px-2.5 py-1 bg-[#002654] text-white text-[11px] font-bold uppercase rounded shadow">
                <?= e($item['category'] ?? 'Summits') ?>
              </span>
            </div>
            <div class="p-5">
              <?php if (!empty($item['event_date'])): ?>
                <time class="text-[11px] font-bold uppercase text-slate-400 block mb-1">
                  Recorded: <?= date('F d, Y', strtotime($item['event_date'])) ?>
                </time>
              <?php endif; ?>
              <h3 class="font-serif-diplomatic text-lg font-bold text-[#0b1e3b] mb-2 leading-snug">
                <?= e($item['title']) ?>
              </h3>
              <?php if (!empty($item['caption'])): ?>
                <p class="text-xs text-slate-600 leading-relaxed m-0">
                  <?= e($item['caption']) ?>
                </p>
              <?php endif; ?>
            </div>
          </article>
        <?php endforeach; ?>
      </div>
    <?php endif; ?>

  </div>
</section>
