<?php
$curatedGallery = [
    [
        'title' => 'Sri Lanka–France Bilateral Investment Forum',
        'category' => 'Summits',
        'image_path' => 'assets/images/bilateral-summit.jpg',
        'location' => 'Paris • Hôtel de Crillon',
        'caption' => 'High-level assembly convening chief executives, institutional investors, and ministry delegates on sovereign infrastructure financing.',
    ],
    [
        'title' => '22nd Annual General Meeting & Committee Election',
        'category' => 'AGM',
        'image_path' => 'assets/images/agm-governance.jpg',
        'location' => 'Colombo • Galle Face Hotel',
        'caption' => 'Statutory assembly electing President Shaameel Mohideen and the 2026/27 Executive Committee under The Ceylon Chamber of Commerce.',
    ],
    [
        'title' => 'French Industrial Contractors Delegation',
        'category' => 'Delegations',
        'image_path' => 'assets/images/hero-bilateral.jpg',
        'location' => 'Colombo • Ceylon Chamber',
        'caption' => 'Evaluation tour of Sri Lanka’s logistics infrastructure and green deep-water port terminal transitions at the Port of Colombo.',
    ],
    [
        'title' => 'Embassy of France Diplomatic Trade Reception',
        'category' => 'Embassy',
        'image_path' => 'assets/images/gallery-embassy.jpg',
        'location' => 'Colombo 07 • French Residence',
        'caption' => 'Diplomatic reception hosted under the patronage of H.E. Rémi Lambert, Ambassador of the French Republic to Sri Lanka.',
    ],
    [
        'title' => 'Ceylon Chamber Bilateral Secretariat Assembly',
        'category' => 'AGM',
        'image_path' => 'assets/images/chamber-building.jpg',
        'location' => 'Colombo 02 • 50, Nawam Mawatha',
        'caption' => 'Quarterly bilateral council policy review and trade facilitation briefing at The Ceylon Chamber of Commerce headquarters.',
    ],
    [
        'title' => 'Franco-Lankan C-Suite B2B Matchmaking Session',
        'category' => 'Delegations',
        'image_path' => 'assets/images/gallery-b2b.jpg',
        'location' => 'Colombo & Paris',
        'caption' => 'Direct B2B roundtables connecting French renewable energy and logistics executives with Sri Lankan conglomerate leaders.',
    ],
];
?>
<!-- SPLIT VISUAL HERO BANNER -->
<section class="w-full bg-gradient-to-r from-[#0b1e3b] via-[#002654] to-[#0b1e3b] text-white border-b border-slate-200 py-12 lg:py-16 relative overflow-hidden">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-12 relative z-10">
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center">
      <div class="lg:col-span-7">
        <ul class="breadcrumb mb-4">
          <li class="breadcrumb-item"><a href="<?= url('/') ?>" class="text-slate-300 hover:text-white">Home</a></li>
          <li class="breadcrumb-item text-amber-300 font-semibold">Photo Gallery &amp; Media</li>
        </ul>
        <div class="inline-flex items-center gap-2 px-3 py-1 bg-white/10 border border-white/20 rounded mb-3">
          <span class="w-2 h-2 rounded-full bg-amber-400"></span>
          <span class="text-xs font-bold uppercase tracking-widest text-amber-300">Documentary Records</span>
        </div>
        <h1 class="font-serif-diplomatic text-3xl sm:text-4xl lg:text-5xl text-white font-bold tracking-tight">
          Photo Gallery &amp; Protocol Media
        </h1>
        <p class="font-sans text-base sm:text-lg text-slate-200 max-w-2xl mt-4 leading-relaxed m-0">
          Photographic documentation of Sri Lanka–France bilateral trade missions, 22nd AGM proceedings, diplomatic assemblies, and ministerial roundtables.
        </p>
      </div>
      <div class="lg:col-span-5">
        <div class="bg-white/10 backdrop-blur-sm border border-white/20 p-2.5 rounded-lg shadow-xl">
          <div class="std-hero-img rounded">
            <img src="<?= asset('assets/images/bilateral-summit.jpg') ?>" alt="SLFBC Bilateral Summit Media" class="w-full h-full object-cover">
            <div class="absolute bottom-3 left-3 bg-[#0b1e3b]/90 px-3 py-1 rounded text-xs font-bold text-amber-300 uppercase">
              Click Any Photo to Enlarge
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- MAIN GALLERY WITH FILTER TABS & LIGHTBOX -->
<section class="w-full bg-white py-16 border-b border-slate-200">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-12">

    <!-- Interactive Category Filter Tabs -->
    <div class="flex flex-wrap items-center gap-2.5 mb-10 pb-4 border-b border-slate-200">
      <button type="button" data-gallery-filter="all" class="px-4 py-2 rounded text-xs font-bold uppercase tracking-wider border bg-[#002654] text-white border-[#002654] transition-all cursor-pointer">
        All Archives
      </button>
      <button type="button" data-gallery-filter="Summits" class="px-4 py-2 rounded text-xs font-bold uppercase tracking-wider border bg-white text-slate-700 border-slate-300 hover:border-[#002654] transition-all cursor-pointer">
        Bilateral Summits
      </button>
      <button type="button" data-gallery-filter="AGM" class="px-4 py-2 rounded text-xs font-bold uppercase tracking-wider border bg-white text-slate-700 border-slate-300 hover:border-[#002654] transition-all cursor-pointer">
        AGM &amp; Governance
      </button>
      <button type="button" data-gallery-filter="Delegations" class="px-4 py-2 rounded text-xs font-bold uppercase tracking-wider border bg-white text-slate-700 border-slate-300 hover:border-[#002654] transition-all cursor-pointer">
        Trade Delegations
      </button>
      <button type="button" data-gallery-filter="Embassy" class="px-4 py-2 rounded text-xs font-bold uppercase tracking-wider border bg-white text-slate-700 border-slate-300 hover:border-[#002654] transition-all cursor-pointer">
        Embassy Receptions
      </button>
    </div>

    <!-- Gallery Grid -->
    <?php $displayItems = !empty($items) ? $items : $curatedGallery; ?>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
      <?php foreach ($displayItems as $item):
        $cat = $item['category'] ?? 'Summits';
        $imgUrl = asset($item['image_path']);
      ?>
        <article data-gallery-category="<?= e($cat) ?>" class="bg-white border border-slate-200 rounded-lg overflow-hidden shadow-sm hover:shadow-md transition-all group">
          <div class="std-card-img bg-slate-100 cursor-pointer"
               data-lightbox-src="<?= $imgUrl ?>"
               data-lightbox-title="<?= e($item['title']) ?>">
            <img src="<?= $imgUrl ?>" alt="<?= e($item['title']) ?>" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
            <span class="absolute top-3 left-3 px-2.5 py-1 bg-[#002654]/90 backdrop-blur-sm text-white text-[11px] font-bold uppercase rounded shadow">
              <?= e($cat) ?>
            </span>
            <span class="absolute bottom-3 right-3 w-8 h-8 rounded-full bg-white/90 text-[#002654] flex items-center justify-center shadow opacity-80 group-hover:opacity-100">
              <span class="material-symbols-outlined text-base">zoom_in</span>
            </span>
          </div>
          <div class="p-5">
            <?php if (!empty($item['location'])): ?>
              <time class="text-[11px] font-bold uppercase text-slate-400 block mb-1"><?= e($item['location']) ?></time>
            <?php elseif (!empty($item['event_date'])): ?>
              <time class="text-[11px] font-bold uppercase text-slate-400 block mb-1"><?= date('F d, Y', strtotime($item['event_date'])) ?></time>
            <?php endif; ?>
            <h3 class="font-serif-diplomatic text-lg font-bold text-[#0b1e3b] mb-2 leading-snug">
              <?= e($item['title']) ?>
            </h3>
            <?php if (!empty($item['caption'])): ?>
              <p class="text-xs text-slate-600 leading-relaxed line-clamp-2 m-0">
                <?= e($item['caption']) ?>
              </p>
            <?php endif; ?>
          </div>
        </article>
      <?php endforeach; ?>
    </div>

  </div>
</section>

<!-- FULLSCREEN LIGHTBOX MODAL -->
<div id="slfbc-lightbox" class="fixed inset-0 z-50 bg-slate-900/90 backdrop-blur-sm hidden items-center justify-center p-4">
  <div class="relative max-w-4xl w-full bg-white rounded-lg overflow-hidden shadow-2xl">
    <div class="flex items-center justify-between px-5 py-3 bg-[#0b1e3b] text-white">
      <p id="slfbc-lightbox-caption" class="font-serif-diplomatic text-sm sm:text-base font-bold m-0 truncate"></p>
      <button type="button" id="slfbc-lightbox-close" class="p-1 text-slate-300 hover:text-white cursor-pointer" aria-label="Close preview">
        <span class="material-symbols-outlined text-2xl">close</span>
      </button>
    </div>
    <div class="bg-slate-950 flex items-center justify-center max-h-[75vh] overflow-hidden">
      <img id="slfbc-lightbox-img" src="" alt="Enlarged protocol media" class="max-h-[75vh] w-auto object-contain">
    </div>
  </div>
</div>
