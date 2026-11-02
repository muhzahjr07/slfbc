<!-- BREADCRUMBS & HERO -->
<section class="w-full bg-slate-50 border-b border-slate-200 py-10">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-12">
    <ul class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?= url('/') ?>">Home</a></li>
      <li class="breadcrumb-item text-slate-800 font-semibold">Events &amp; Summits</li>
    </ul>

    <div class="inline-flex items-center gap-2 mb-2">
      <span class="w-2.5 h-2.5 bg-[#c59b27] inline-block"></span>
      <span class="text-xs font-bold uppercase tracking-widest text-[#002654]">Bilateral Assemblies</span>
    </div>
    <h1 class="font-serif-diplomatic text-3xl sm:text-4xl lg:text-5xl text-[#0b1e3b] font-bold tracking-tight">
      Bilateral Events, Summits &amp; Delegations
    </h1>
    <p class="font-sans text-base sm:text-lg text-slate-600 max-w-3xl mt-4 leading-relaxed">
      Engage in high-level business forums, trade symposia, chamber assemblies, and ministerial roundtables connecting Sri Lanka and France.
    </p>
  </div>
</section>

<!-- MAIN CONTENT -->
<section class="w-full bg-white py-16 border-b border-slate-200">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-12">
    
    <!-- Tab Controls -->
    <div class="flex items-center gap-4 border-b border-slate-200 mb-12">
      <button type="button" class="event-tab-btn active px-6 py-3 font-bold text-sm text-[#002654] border-b-2 border-[#002654] transition-all cursor-pointer" data-target="upcomingEventsTab">
        Upcoming Summits &amp; Assemblies (<?= count($upcomingEvents) ?>)
      </button>
      <button type="button" class="event-tab-btn px-6 py-3 font-semibold text-sm text-slate-500 hover:text-slate-800 border-b-2 border-transparent transition-all cursor-pointer" data-target="pastEventsTab">
        Past Event Archive &amp; Reports (<?= count($pastEvents) ?>)
      </button>
    </div>

    <!-- Upcoming Events Pane -->
    <div id="upcomingEventsTab" class="event-tab-pane">
      <?php if (empty($upcomingEvents)): ?>
        <div class="bg-slate-50 border border-slate-200 rounded-lg p-12 text-center max-w-xl mx-auto shadow-sm">
          <span class="material-symbols-outlined text-5xl text-slate-400 mb-3">event_busy</span>
          <h3 class="font-serif-diplomatic text-xl font-bold text-[#002654] mb-2">No Scheduled Upcoming Summits</h3>
          <p class="text-sm text-slate-600 mb-6 leading-relaxed">
            The Secretariat is currently finalizing dates for the upcoming bilateral trade mission and seasonal committee gatherings. Contact the Chamber for advance dispatch notices.
          </p>
          <a href="<?= url('/contact') ?>" class="inline-block px-5 py-2.5 bg-[#002654] text-white font-bold text-xs uppercase tracking-wider rounded">
            Inquire with Secretariat
          </a>
        </div>
      <?php else: ?>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
          <?php foreach ($upcomingEvents as $evt): ?>
            <article class="bg-white border border-slate-200 rounded-lg overflow-hidden shadow-sm hover:shadow-md hover:border-[#002654] flex flex-col justify-between transition-all group">
              <div>
                <?php if (!empty($evt['cover_image'])): ?>
                  <div class="aspect-video bg-slate-100 overflow-hidden relative">
                    <img src="<?= asset($evt['cover_image']) ?>" alt="<?= e($evt['title']) ?>" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                    <span class="absolute top-3 left-3 px-2.5 py-1 bg-[#c59b27] text-white text-[11px] font-bold uppercase rounded shadow">
                      <?= e($evt['category'] ?? 'Summit') ?>
                    </span>
                  </div>
                <?php endif; ?>

                <div class="p-6">
                  <div class="flex items-center justify-between gap-2 text-xs font-bold mb-2">
                    <span class="text-[#b91c1c]"><?= date('l, M d, Y', strtotime($evt['start_datetime'])) ?></span>
                    <span class="text-slate-500 uppercase"><?= e($evt['location_city'] ?? 'Colombo') ?></span>
                  </div>

                  <h3 class="font-serif-diplomatic text-xl font-bold text-[#0b1e3b] mb-3 leading-snug group-hover:text-[#002654]">
                    <a href="<?= url('/events/' . e($evt['slug'])) ?>" class="hover:underline">
                      <?= e($evt['title']) ?>
                    </a>
                  </h3>

                  <p class="text-xs sm:text-sm text-slate-600 line-clamp-3 leading-relaxed mb-4">
                    <?= e($evt['summary'] ?: substr(strip_tags($evt['description']), 0, 140) . '...') ?>
                  </p>

                  <div class="p-3 bg-slate-50 border border-slate-100 rounded text-xs text-slate-600 flex items-center gap-2">
                    <span class="material-symbols-outlined text-sm text-[#002654]">location_on</span>
                    <span class="truncate"><?= e($evt['venue']) ?></span>
                  </div>
                </div>
              </div>

              <div class="px-6 pb-6 pt-2 border-t border-slate-100 flex items-center justify-between gap-2">
                <a href="<?= url('/events/' . e($evt['slug'])) ?>" class="text-xs font-bold text-[#002654] hover:underline">
                  Event Agenda &amp; Logistics &rarr;
                </a>
                <?php if (!empty($evt['registration_url'])): ?>
                  <span class="px-3 py-1 bg-[#002654] text-white text-[11px] font-bold uppercase rounded">Registrations Open</span>
                <?php endif; ?>
              </div>
            </article>
          <?php endforeach; ?>
        </div>
      <?php endif; ?>
    </div>

    <!-- Past Events Pane (Hidden by Default) -->
    <div id="pastEventsTab" class="event-tab-pane hidden">
      <?php if (empty($pastEvents)): ?>
        <div class="bg-slate-50 border border-slate-200 rounded-lg p-12 text-center max-w-xl mx-auto shadow-sm">
          <span class="material-symbols-outlined text-5xl text-slate-400 mb-3">history</span>
          <h3 class="font-serif-diplomatic text-xl font-bold text-[#002654] mb-2">No Past Events Ingested</h3>
          <p class="text-sm text-slate-600 leading-relaxed m-0">
            Historical bilateral event summaries and gala reports are currently being catalogued by the Chamber Secretariat.
          </p>
        </div>
      <?php else: ?>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
          <?php foreach ($pastEvents as $evt): ?>
            <article class="bg-slate-50 border border-slate-200 rounded-lg p-6 shadow-sm flex flex-col justify-between">
              <div>
                <div class="flex items-center justify-between text-xs font-semibold text-slate-400 mb-2">
                  <span>Concluded: <?= date('M d, Y', strtotime($evt['start_datetime'])) ?></span>
                  <span class="uppercase text-slate-500"><?= e($evt['location_city'] ?? 'Colombo') ?></span>
                </div>
                <h3 class="font-serif-diplomatic text-lg font-bold text-[#0b1e3b] mb-2 leading-snug">
                  <a href="<?= url('/events/' . e($evt['slug'])) ?>" class="hover:underline">
                    <?= e($evt['title']) ?>
                  </a>
                </h3>
                <p class="text-xs text-slate-600 line-clamp-3 leading-relaxed mb-4">
                  <?= e($evt['summary'] ?: substr(strip_tags($evt['description']), 0, 120) . '...') ?>
                </p>
              </div>
              <div class="pt-4 border-t border-slate-200 flex items-center justify-between">
                <span class="px-2 py-0.5 rounded text-[10px] font-bold uppercase bg-slate-200 text-slate-700">Archived Record</span>
                <a href="<?= url('/events/' . e($evt['slug'])) ?>" class="text-xs font-bold text-[#002654] hover:underline">
                  View Report &rarr;
                </a>
              </div>
            </article>
          <?php endforeach; ?>
        </div>
      <?php endif; ?>
    </div>

  </div>
</section>
