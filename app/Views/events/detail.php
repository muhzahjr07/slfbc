<?php
$isUpcoming = strtotime($event['start_datetime']) >= time();
?>
<!-- BREADCRUMBS & HERO -->
<section class="w-full bg-slate-50 border-b border-slate-200 py-10">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-12">
    <ul class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?= url('/') ?>">Home</a></li>
      <li class="breadcrumb-item"><a href="<?= url('/events') ?>">Events &amp; Summits</a></li>
      <li class="breadcrumb-item text-slate-800 font-semibold truncate max-w-xs sm:max-w-md"><?= e($event['title']) ?></li>
    </ul>

    <div class="inline-flex items-center gap-2 mb-2">
      <span class="w-2.5 h-2.5 bg-[#c59b27] inline-block"></span>
      <span class="text-xs font-bold uppercase tracking-widest text-[#002654]"><?= e($event['category'] ?? 'Summit') ?></span>
    </div>
    <h1 class="font-serif-diplomatic text-3xl sm:text-4xl lg:text-5xl text-[#0b1e3b] font-bold tracking-tight leading-tight">
      <?= e($event['title']) ?>
    </h1>
    <div class="flex flex-wrap items-center gap-4 mt-4 text-xs font-semibold text-slate-500">
      <span class="text-[#b91c1c] font-bold"><?= date('l, F d, Y &bull; h:i A', strtotime($event['start_datetime'])) ?></span>
      <span>&bull;</span>
      <span><?= e($event['venue']) ?>, <?= e($event['location_city'] ?? 'Colombo') ?></span>
    </div>
  </div>
</section>

<!-- MAIN CONTENT -->
<section class="w-full bg-white py-16 border-b border-slate-200">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-12">
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-start">
      
      <!-- Left 8 Columns: Event Overview & Proceedings -->
      <div class="lg:col-span-8 space-y-10">
        <?php if (!empty($event['cover_image'])): ?>
          <div class="rounded-lg overflow-hidden shadow-sm border border-slate-200 bg-slate-100 max-h-[460px]">
            <img src="<?= asset($event['cover_image']) ?>" alt="<?= e($event['title']) ?>" class="w-full h-auto object-cover">
          </div>
        <?php endif; ?>

        <?php if (!empty($event['summary'])): ?>
          <div class="p-6 bg-slate-50 border-l-4 border-l-[#b91c1c] border border-slate-200 rounded-lg font-serif-diplomatic text-lg sm:text-xl text-[#002654] font-medium leading-relaxed">
            <?= e($event['summary']) ?>
          </div>
        <?php endif; ?>

        <div class="prose max-w-none text-slate-700 text-base leading-relaxed space-y-6">
          <h2 class="font-serif-diplomatic text-2xl text-[#0b1e3b] font-bold pb-2 border-b border-slate-200">
            Agenda &amp; Executive Overview
          </h2>
          <div>
            <?= nl2br(e($event['description'])) ?>
          </div>
        </div>

        <?php if (!empty($event['report_summary'])): ?>
          <div class="p-6 bg-slate-50 border-t-4 border-t-[#c59b27] border border-slate-200 rounded-lg">
            <h3 class="font-serif-diplomatic text-lg text-[#002654] font-bold mb-2">Proceedings &amp; Bilateral Resolutions</h3>
            <div class="text-xs sm:text-sm text-slate-600 leading-relaxed">
              <?= nl2br(e($event['report_summary'])) ?>
            </div>
          </div>
        <?php endif; ?>

        <!-- Back to Events -->
        <div class="pt-6 border-t border-slate-200 flex items-center justify-between">
          <a href="<?= url('/events') ?>" class="text-sm font-semibold text-[#002654] hover:underline flex items-center gap-1">
            <span class="material-symbols-outlined text-base">arrow_back</span> Return to Events &amp; Summits
          </a>
        </div>
      </div>

      <!-- Right 4 Columns: Logistics & Participation -->
      <div class="lg:col-span-4 space-y-6">
        <div class="bg-slate-50 border border-slate-200 rounded-lg p-6 shadow-sm">
          <h3 class="font-serif-diplomatic text-lg text-[#0b1e3b] font-bold mb-4 pb-2 border-b border-slate-200">
            Summit Logistics &amp; Venue
          </h3>
          <dl class="space-y-4 text-xs">
            <div>
              <dt class="text-slate-500 uppercase font-bold tracking-wider">Date &amp; Time</dt>
              <dd class="text-sm font-bold text-slate-800 mt-0.5">
                <?= date('F d, Y', strtotime($event['start_datetime'])) ?><br>
                <span class="text-slate-500 font-normal"><?= date('h:i A', strtotime($event['start_datetime'])) ?> (Local Time)</span>
              </dd>
            </div>
            <div>
              <dt class="text-slate-500 uppercase font-bold tracking-wider">Location &amp; Venue</dt>
              <dd class="text-sm font-bold text-[#002654] mt-0.5"><?= e($event['venue']) ?></dd>
              <dd class="text-xs text-slate-500 mt-0.5"><?= e($event['location_city'] ?? 'Colombo') ?></dd>
            </div>
            <div>
              <dt class="text-slate-500 uppercase font-bold tracking-wider">Format</dt>
              <dd class="text-sm font-bold text-slate-800 mt-0.5"><?= e($event['category'] ?? 'Assembly') ?></dd>
            </div>
          </dl>

          <div class="mt-6 pt-4 border-t border-slate-200">
            <?php if ($isUpcoming): ?>
              <?php if (!empty($event['registration_url'])): ?>
                <a href="<?= e($event['registration_url']) ?>" target="_blank" rel="noopener noreferrer" class="w-full py-3 px-4 bg-[#b91c1c] hover:bg-[#991b1b] text-white font-bold rounded text-xs uppercase tracking-wider text-center block shadow transition-all">
                  Register Online &rarr;
                </a>
              <?php else: ?>
                <a href="<?= url('/contact') ?>?subject=<?= urlencode('RSVP for Summit: ' . $event['title']) ?>" class="w-full py-3 px-4 bg-[#002654] hover:bg-[#001c3f] text-white font-bold rounded text-xs uppercase tracking-wider text-center block shadow transition-all">
                  RSVP with Secretariat
                </a>
              <?php endif; ?>
            <?php else: ?>
              <span class="w-full py-2.5 px-4 bg-slate-200 text-slate-600 font-bold rounded text-xs uppercase tracking-wider text-center block cursor-not-allowed">
                Event Concluded
              </span>
            <?php endif; ?>
          </div>
        </div>

        <!-- Secretariat Coordination Box -->
        <div class="p-6 bg-slate-50 border-l-4 border-l-[#002654] border border-slate-200 rounded-lg">
          <h4 class="font-serif-diplomatic text-sm font-bold text-[#002654] mb-1">Ceylon Chamber Coordination</h4>
          <p class="text-xs text-slate-600 leading-relaxed m-0">
            For bilateral delegation accreditations, corporate tables, or sponsor partnerships, contact the bilateral events desk at the Secretariat.
          </p>
        </div>
      </div>

    </div>
  </div>
</section>
