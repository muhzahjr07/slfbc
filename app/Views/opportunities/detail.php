<!-- BREADCRUMBS & HERO -->
<section class="w-full bg-slate-50 border-b border-slate-200 py-10">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-12">
    <ul class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?= url('/') ?>">Home</a></li>
      <li class="breadcrumb-item"><a href="<?= url('/opportunities') ?>">Opportunities</a></li>
      <li class="breadcrumb-item text-slate-800 font-semibold truncate max-w-xs sm:max-w-md"><?= e($opportunity['title']) ?></li>
    </ul>

    <div class="inline-flex items-center gap-2 mb-2">
      <span class="w-2.5 h-2.5 bg-[#c59b27] inline-block"></span>
      <span class="text-xs font-bold uppercase tracking-widest text-[#002654]"><?= e($opportunity['track']) ?></span>
    </div>
    <h1 class="font-serif-diplomatic text-3xl sm:text-4xl lg:text-5xl text-[#0b1e3b] font-bold tracking-tight">
      <?= e($opportunity['title']) ?>
    </h1>
    <div class="flex flex-wrap items-center gap-3 mt-4 text-xs font-semibold">
      <span class="px-3 py-1 bg-[#002654] text-white rounded font-bold uppercase"><?= e($opportunity['status_label'] ?? 'Active Project Pipeline') ?></span>
      <span class="px-3 py-1 bg-amber-100 text-amber-900 border border-amber-200 rounded uppercase font-bold">Corridor: <?= e(ucfirst($opportunity['corridor'] ?? 'Bilateral')) ?></span>
      <span class="text-slate-500">Supervised under Ceylon Chamber Trade Facilitation</span>
    </div>
  </div>
</section>

<!-- MAIN CONTENT GRID -->
<section class="w-full bg-white py-16 border-b border-slate-200">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-12">
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-start">
      
      <!-- Left 8 Cols: Detailed Dossier -->
      <div class="lg:col-span-8 space-y-10">
        <!-- Strategic Summary -->
        <div class="p-8 bg-slate-50 border-l-4 border-l-[#002654] border border-slate-200 rounded-lg">
          <h2 class="text-xs font-bold uppercase tracking-wider text-[#002654] mb-2">Executive Summary</h2>
          <p class="font-serif-diplomatic text-xl sm:text-2xl text-[#0b1e3b] font-bold leading-snug m-0">
            <?= e($opportunity['summary']) ?>
          </p>
        </div>

        <!-- Comprehensive Details -->
        <div class="space-y-6 text-slate-700 leading-relaxed text-base">
          <h3 class="font-serif-diplomatic text-2xl text-[#0b1e3b] font-bold pb-2 border-b border-slate-200">
            Commercial Scope &amp; Industrial Relevance
          </h3>
          
          <?php if (!empty($opportunity['details'])): ?>
            <div class="prose max-w-none text-slate-700">
              <?= nl2br(e($opportunity['details'])) ?>
            </div>
          <?php else: ?>
            <p>
              This strategic track forms part of the bilateral commercial agenda established by the Sri Lanka–France Business Council. It enables private sector operators to leverage trade incentives, institutional matchmaking, and regulatory advisory through the joint network of The Ceylon Chamber of Commerce and the Embassy of France in Colombo.
            </p>
          <?php endif; ?>

          <h3 class="font-serif-diplomatic text-2xl text-[#0b1e3b] font-bold pt-6 pb-2 border-b border-slate-200">
            Institutional Facilitation &amp; Support Ecosystem
          </h3>
          <p>
            The Council coordinates with key state agencies and multilateral authorities to ensure streamlined market entry, transparent joint venture structuring, and statutory compliance:
          </p>
          <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 pt-2">
            <div class="p-4 bg-slate-50 border border-slate-200 rounded">
              <h4 class="font-bold text-sm text-[#002654] mb-1">Board of Investment (BOI)</h4>
              <p class="text-xs text-slate-600 m-0">Statutory investment incentives, Section 17 tax holidays, customs facilitation, and industrial zone site allocation.</p>
            </div>
            <div class="p-4 bg-slate-50 border border-slate-200 rounded">
              <h4 class="font-bold text-sm text-[#002654] mb-1">Business France / French Treasury</h4>
              <p class="text-xs text-slate-600 m-0">Export credit insurance, FASEP feasibility grants, and French corporate technology match-making.</p>
            </div>
            <div class="p-4 bg-slate-50 border border-slate-200 rounded">
              <h4 class="font-bold text-sm text-[#002654] mb-1">Export Development Board (EDB)</h4>
              <p class="text-xs text-slate-600 m-0">Accreditation of export consignments, international standards compliance, and trade exhibition support.</p>
            </div>
            <div class="p-4 bg-slate-50 border border-slate-200 rounded">
              <h4 class="font-bold text-sm text-[#002654] mb-1">Ceylon Chamber of Commerce</h4>
              <p class="text-xs text-slate-600 m-0">Commercial arbitration, verified business introductions, trade documentation, and B2B delegations.</p>
            </div>
          </div>
        </div>

        <!-- Back Navigation & CTA -->
        <div class="pt-6 border-t border-slate-200 flex flex-wrap items-center justify-between gap-4">
          <a href="<?= url('/opportunities') ?>" class="text-sm font-semibold text-[#002654] hover:underline flex items-center gap-1">
            <span class="material-symbols-outlined text-base">arrow_back</span> Return to All Opportunities
          </a>
          <a href="<?= url('/contact') ?>?subject=<?= urlencode('Facilitation Inquiry: ' . $opportunity['title']) ?>" class="px-6 py-3 bg-[#b91c1c] hover:bg-[#991b1b] text-white font-bold text-sm uppercase tracking-wider rounded shadow transition-all flex items-center gap-2">
            <span class="material-symbols-outlined text-base">outgoing_mail</span> Engage Council Facilitation
          </a>
        </div>
      </div>

      <!-- Right 4 Cols: Meta Box & Related Tracks -->
      <div class="lg:col-span-4 space-y-6">
        <!-- Particulars Card -->
        <div class="bg-slate-50 border border-slate-200 rounded-lg p-6 shadow-sm">
          <h3 class="font-serif-diplomatic text-lg text-[#0b1e3b] font-bold mb-4 pb-2 border-b border-slate-200">
            Corridor Particulars
          </h3>
          <dl class="space-y-4 text-xs">
            <div>
              <dt class="text-slate-500 uppercase font-bold tracking-wider">Sector Track</dt>
              <dd class="text-sm font-bold text-[#002654] mt-0.5"><?= e($opportunity['track']) ?></dd>
            </div>
            <div>
              <dt class="text-slate-500 uppercase font-bold tracking-wider">Corridor Orientation</dt>
              <dd class="text-sm font-bold text-slate-800 mt-0.5"><?= e(ucfirst($opportunity['corridor'] ?? 'Bilateral')) ?></dd>
            </div>
            <div>
              <dt class="text-slate-500 uppercase font-bold tracking-wider">Current Pipeline Status</dt>
              <dd class="text-sm font-bold text-emerald-700 mt-0.5 flex items-center gap-1.5">
                <span class="w-2 h-2 rounded-full bg-emerald-600"></span> <?= e($opportunity['status_label'] ?? 'Active Pipeline') ?>
              </dd>
            </div>
            <div>
              <dt class="text-slate-500 uppercase font-bold tracking-wider">Council Secretariat</dt>
              <dd class="text-sm text-slate-700 mt-0.5">The Ceylon Chamber of Commerce, Colombo 02</dd>
            </div>
          </dl>

          <div class="mt-6 pt-4 border-t border-slate-200">
            <a href="<?= url('/contact') ?>?subject=<?= urlencode('Inquiry on: ' . $opportunity['title']) ?>" class="w-full py-2.5 px-4 bg-[#002654] hover:bg-[#001c3f] text-white font-bold rounded text-xs uppercase tracking-wider text-center block transition-all">
              Request Introductory Dossier
            </a>
          </div>
        </div>

        <!-- Related Opportunities -->
        <?php if (!empty($related)): ?>
          <div class="bg-white border border-slate-200 rounded-lg p-6 shadow-sm">
            <h3 class="font-serif-diplomatic text-lg text-[#0b1e3b] font-bold mb-4 pb-2 border-b border-slate-200">
              Other Priority Tracks
            </h3>
            <div class="space-y-4">
              <?php foreach ($related as $rel): ?>
                <a href="<?= url('/opportunities/' . e($rel['slug'])) ?>" class="block p-3 rounded bg-slate-50 hover:bg-blue-50 border border-slate-200 transition-all group">
                  <span class="text-[10px] font-bold uppercase text-[#c59b27] block"><?= e($rel['track']) ?></span>
                  <span class="text-sm font-bold text-[#002654] group-hover:underline block mt-0.5 leading-snug"><?= e($rel['title']) ?></span>
                </a>
              <?php endforeach; ?>
            </div>
          </div>
        <?php endif; ?>

        <!-- Disclaimer -->
        <div class="p-4 bg-amber-50 border border-amber-200 rounded text-xs text-amber-900 leading-relaxed">
          <p class="font-bold mb-1">Commercial Facilitation Notice</p>
          <p class="m-0">SLFBC acts solely as a non-commercial institutional matchmaker. Interested parties must conduct independent legal, financial, and regulatory due diligence.</p>
        </div>
      </div>

    </div>
  </div>
</section>
