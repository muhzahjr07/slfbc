<?php
/**
 * Membership Overview View
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
          <li class="breadcrumb-item text-amber-300 font-semibold">Membership</li>
        </ul>
        <div class="inline-flex items-center gap-2 px-3 py-1 bg-white/10 border border-white/20 rounded mb-3">
          <span class="w-2 h-2 rounded-full bg-amber-400"></span>
          <span class="text-xs font-bold uppercase tracking-widest text-amber-300">Bilateral Network &amp; Advocacy</span>
        </div>
        <h1 class="font-serif-diplomatic text-3xl sm:text-4xl lg:text-5xl text-white font-bold tracking-tight">
          Membership in the Council
        </h1>
        <p class="font-sans text-base sm:text-lg text-slate-200 max-w-2xl mt-4 leading-relaxed m-0">
          Position your enterprise at the forefront of Sri Lanka–France commercial relations, trade missions, and diplomatic dialogues under The Ceylon Chamber of Commerce.
        </p>
        <div class="mt-7 flex flex-wrap items-center gap-4">
          <a href="<?= url('/apply') ?>" class="inline-flex items-center justify-center px-6 py-3 bg-[#b91c1c] hover:bg-[#991b1b] text-white font-bold text-sm uppercase tracking-wider rounded shadow transition-all">
            Apply for Membership &rarr;
          </a>
          <a href="<?= url('/members') ?>" class="inline-flex items-center justify-center px-6 py-3 bg-white/10 border border-white/30 hover:bg-white/20 text-white font-bold text-sm uppercase tracking-wider rounded transition-all">
            Explore Member Directory
          </a>
        </div>
      </div>
      <div class="lg:col-span-5">
        <div class="bg-white/10 backdrop-blur-sm border border-white/20 p-2.5 rounded-lg shadow-xl">
          <div class="aspect-[16/10] rounded overflow-hidden relative">
            <img src="<?= asset('assets/images/gallery-b2b.jpg') ?>" alt="SLFBC Executive Networking and B2B Matchmaking" class="w-full h-full object-cover">
            <div class="absolute bottom-3 left-3 bg-[#0b1e3b]/90 px-3 py-1 rounded text-xs font-bold text-amber-300 uppercase">
              70+ Accredited Corporate Members
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- VALUE PILLARS & NETWORKING PHOTO CAROUSEL -->
<section class="w-full bg-white py-16 border-b border-slate-200" data-carousel>
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-12">
    <div class="flex flex-col md:flex-row md:items-end justify-between gap-6 mb-10">
      <div>
        <span class="text-xs font-bold uppercase tracking-widest text-[#002654] block mb-2">Strategic Advantages</span>
        <h2 class="font-serif-diplomatic text-2xl sm:text-3xl lg:text-4xl text-[#0b1e3b] font-bold m-0">
          Why Join the Sri Lanka–France Business Council?
        </h2>
      </div>
      <div class="flex items-center gap-2">
        <button type="button" data-carousel-prev aria-label="Previous privilege" class="w-10 h-10 rounded border border-slate-300 bg-white hover:bg-[#002654] hover:text-white text-slate-700 flex items-center justify-center transition-colors shadow-sm cursor-pointer">
          <span class="material-symbols-outlined">chevron_left</span>
        </button>
        <button type="button" data-carousel-next aria-label="Next privilege" class="w-10 h-10 rounded border border-slate-300 bg-white hover:bg-[#002654] hover:text-white text-slate-700 flex items-center justify-center transition-colors shadow-sm cursor-pointer">
          <span class="material-symbols-outlined">chevron_right</span>
        </button>
      </div>
    </div>

    <div data-carousel-track class="flex gap-6 overflow-x-auto snap-x snap-mandatory no-scrollbar pb-2">
      <div class="min-w-[300px] sm:min-w-[340px] snap-start bg-white border border-slate-200 rounded-lg overflow-hidden shadow-sm hover:border-[#002654] transition-all shrink-0">
        <div class="aspect-[16/9] bg-slate-100 overflow-hidden">
          <img src="<?= asset('assets/images/gallery-embassy.jpg') ?>" alt="Diplomatic and Institutional Access" class="w-full h-full object-cover">
        </div>
        <div class="p-6">
          <span class="text-xs font-bold uppercase text-[#002654] block mb-1">Privilege 01</span>
          <h3 class="font-serif-diplomatic text-lg font-bold text-[#0b1e3b] mb-2">Diplomatic &amp; Institutional Access</h3>
          <p class="text-xs sm:text-sm text-slate-600 leading-relaxed m-0">
            Direct protocol engagement with the Embassy of France, Business France, MEDEF International, and Sri Lankan trade ministries.
          </p>
        </div>
      </div>

      <div class="min-w-[300px] sm:min-w-[340px] snap-start bg-white border border-slate-200 rounded-lg overflow-hidden shadow-sm hover:border-[#002654] transition-all shrink-0">
        <div class="aspect-[16/9] bg-slate-100 overflow-hidden">
          <img src="<?= asset('assets/images/corridor-france.jpg') ?>" alt="Bilateral Trade Missions" class="w-full h-full object-cover">
        </div>
        <div class="p-6">
          <span class="text-xs font-bold uppercase text-[#b91c1c] block mb-1">Privilege 02</span>
          <h3 class="font-serif-diplomatic text-lg font-bold text-[#0b1e3b] mb-2">Bilateral Trade Missions</h3>
          <p class="text-xs sm:text-sm text-slate-600 leading-relaxed m-0">
            Priority participation in outbound delegations to Paris, Lyon, and Marseille, plus closed-door roundtables with visiting French missions.
          </p>
        </div>
      </div>

      <div class="min-w-[300px] sm:min-w-[340px] snap-start bg-white border border-slate-200 rounded-lg overflow-hidden shadow-sm hover:border-[#002654] transition-all shrink-0">
        <div class="aspect-[16/9] bg-slate-100 overflow-hidden">
          <img src="<?= asset('assets/images/gallery-delegation.jpg') ?>" alt="Targeted B2B Matchmaking" class="w-full h-full object-cover">
        </div>
        <div class="p-6">
          <span class="text-xs font-bold uppercase text-[#8d4004] block mb-1">Privilege 03</span>
          <h3 class="font-serif-diplomatic text-lg font-bold text-[#0b1e3b] mb-2">Targeted B2B Matchmaking</h3>
          <p class="text-xs sm:text-sm text-slate-600 leading-relaxed m-0">
            Curated introductions to French corporate buyers, joint-venture partners, industrial suppliers, and technology consortia.
          </p>
        </div>
      </div>

      <div class="min-w-[300px] sm:min-w-[340px] snap-start bg-white border border-slate-200 rounded-lg overflow-hidden shadow-sm hover:border-[#002654] transition-all shrink-0">
        <div class="aspect-[16/9] bg-slate-100 overflow-hidden">
          <img src="<?= asset('assets/images/chamber-building.jpg') ?>" alt="Policy and Trade Advocacy" class="w-full h-full object-cover">
        </div>
        <div class="p-6">
          <span class="text-xs font-bold uppercase text-[#002654] block mb-1">Privilege 04</span>
          <h3 class="font-serif-diplomatic text-lg font-bold text-[#0b1e3b] mb-2">Policy &amp; GSP+ Advocacy</h3>
          <p class="text-xs sm:text-sm text-slate-600 leading-relaxed m-0">
            Statutory representation through The Ceylon Chamber of Commerce on EU regulatory compliance, GSP+ rules of origin, and customs barriers.
          </p>
        </div>
      </div>
    </div>

    <!-- Membership Tier Comparison Cards -->
    <div id="tiers" class="mt-14 pt-12 border-t border-slate-200">
      <h3 class="font-serif-diplomatic text-2xl text-[#0b1e3b] font-bold mb-6">Membership Classifications</h3>
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
        <div class="p-6 bg-slate-50 border-t-4 border-t-[#b91c1c] border border-slate-200 rounded-lg shadow-sm flex flex-col justify-between">
          <div>
            <span class="text-xs font-bold uppercase text-[#b91c1c] block mb-1">Tier 01</span>
            <h4 class="font-serif-diplomatic text-lg font-bold text-[#0b1e3b] mb-2">Patron Member</h4>
            <p class="text-xs text-slate-600 m-0">Premier conglomerates &amp; multinational corporations spearheading bilateral investment corridors.</p>
          </div>
          <span class="mt-4 pt-3 border-t border-slate-200 text-xs font-bold text-[#002654] uppercase block">Priority Protocol Seating</span>
        </div>

        <div class="p-6 bg-slate-50 border-t-4 border-t-[#002654] border border-slate-200 rounded-lg shadow-sm flex flex-col justify-between">
          <div>
            <span class="text-xs font-bold uppercase text-[#002654] block mb-1">Tier 02</span>
            <h4 class="font-serif-diplomatic text-lg font-bold text-[#0b1e3b] mb-2">Corporate Member</h4>
            <p class="text-xs text-slate-600 m-0">Registered Sri Lankan and French commercial enterprises with active bilateral trade or services.</p>
          </div>
          <span class="mt-4 pt-3 border-t border-slate-200 text-xs font-bold text-[#002654] uppercase block">Full AGM Voting Rights</span>
        </div>

        <div class="p-6 bg-slate-50 border-t-4 border-t-[#c59b27] border border-slate-200 rounded-lg shadow-sm flex flex-col justify-between">
          <div>
            <span class="text-xs font-bold uppercase text-[#8d4004] block mb-1">Tier 03</span>
            <h4 class="font-serif-diplomatic text-lg font-bold text-[#0b1e3b] mb-2">Associate Member</h4>
            <p class="text-xs text-slate-600 m-0">Growing SMEs, professional advisory practices, and emerging bilateral exporters.</p>
          </div>
          <span class="mt-4 pt-3 border-t border-slate-200 text-xs font-bold text-[#002654] uppercase block">Directory &amp; B2B Access</span>
        </div>

        <div class="p-6 bg-slate-50 border-t-4 border-t-slate-700 border border-slate-200 rounded-lg shadow-sm flex flex-col justify-between">
          <div>
            <span class="text-xs font-bold uppercase text-slate-600 block mb-1">Tier 04</span>
            <h4 class="font-serif-diplomatic text-lg font-bold text-[#0b1e3b] mb-2">Overseas Affiliate</h4>
            <p class="text-xs text-slate-600 m-0">France-headquartered enterprises without a local office seeking Sri Lankan partners.</p>
          </div>
          <span class="mt-4 pt-3 border-t border-slate-200 text-xs font-bold text-[#002654] uppercase block">Cross-Border Liaison</span>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ELIGIBILITY & APPLICATION JOURNEY -->
<section id="fees" class="w-full bg-slate-50 py-16 border-b border-slate-200">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-12">
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-start">
      
      <!-- Left 7 Columns: Eligibility & Requirements -->
      <div class="lg:col-span-7 space-y-6">
        <div>
          <span class="text-xs font-bold uppercase tracking-widest text-[#002654] block mb-1">Governance &amp; Criteria</span>
          <h2 class="font-serif-diplomatic text-2xl sm:text-3xl text-[#0b1e3b] font-bold m-0">
            Eligibility &amp; Submission Checklist
          </h2>
        </div>

        <div class="p-6 bg-white border border-slate-200 rounded-lg shadow-sm">
          <ul class="space-y-3.5 list-none p-0 m-0 text-sm text-slate-700">
            <li class="flex items-start gap-3">
              <span class="material-symbols-outlined text-[#002654] text-lg shrink-0 mt-0.5">check_circle</span>
              <div><strong>Certificate of Incorporation:</strong> Business Registration under the Companies Act of Sri Lanka or French Registry (RCS / Kbis).</div>
            </li>
            <li class="flex items-start gap-3">
              <span class="material-symbols-outlined text-[#002654] text-lg shrink-0 mt-0.5">check_circle</span>
              <div><strong>Company Profile:</strong> Overview of commercial, investment, or export links with the Republic of France.</div>
            </li>
            <li class="flex items-start gap-3">
              <span class="material-symbols-outlined text-[#002654] text-lg shrink-0 mt-0.5">check_circle</span>
              <div><strong>Member Proposers:</strong> Endorsement by two active Council members (or introductory endorsement via the French Embassy / BOI / EDB).</div>
            </li>
          </ul>
        </div>

        <div class="p-5 bg-amber-50 border-l-4 border-l-[#c59b27] border border-amber-200 rounded-lg">
          <h4 class="font-serif-diplomatic text-sm font-bold text-[#8d4004] mb-1">Secretariat Review Protocol</h4>
          <p class="text-xs text-slate-700 m-0 leading-relaxed">
            All applications are vetted by the Secretariat of The Ceylon Chamber of Commerce and ratified by the Executive Committee of the SLFBC.
          </p>
        </div>
      </div>

      <!-- Right 5 Columns: Step-by-Step Journey -->
      <div class="lg:col-span-5 space-y-4">
        <div class="grid grid-cols-2 gap-3">
          <div class="p-4 bg-white border border-slate-200 rounded-lg shadow-sm">
            <span class="w-7 h-7 rounded-full bg-[#002654] text-white flex items-center justify-center font-bold text-xs mb-2">1</span>
            <h4 class="font-serif-diplomatic text-sm font-bold text-[#0b1e3b] mb-1">Online Dossier</h4>
            <p class="text-xs text-slate-600 m-0">Submit corporate details via our digital portal.</p>
          </div>
          <div class="p-4 bg-white border border-slate-200 rounded-lg shadow-sm">
            <span class="w-7 h-7 rounded-full bg-[#002654] text-white flex items-center justify-center font-bold text-xs mb-2">2</span>
            <h4 class="font-serif-diplomatic text-sm font-bold text-[#0b1e3b] mb-1">Due Diligence</h4>
            <p class="text-xs text-slate-600 m-0">Chamber Secretariat verifies registration records.</p>
          </div>
          <div class="p-4 bg-white border border-slate-200 rounded-lg shadow-sm">
            <span class="w-7 h-7 rounded-full bg-[#c59b27] text-white flex items-center justify-center font-bold text-xs mb-2">3</span>
            <h4 class="font-serif-diplomatic text-sm font-bold text-[#0b1e3b] mb-1">Ratification</h4>
            <p class="text-xs text-slate-600 m-0">Executive Committee approves membership.</p>
          </div>
          <div class="p-4 bg-white border border-slate-200 rounded-lg shadow-sm">
            <span class="w-7 h-7 rounded-full bg-[#b91c1c] text-white flex items-center justify-center font-bold text-xs mb-2">4</span>
            <h4 class="font-serif-diplomatic text-sm font-bold text-[#0b1e3b] mb-1">Induction</h4>
            <p class="text-xs text-slate-600 m-0">Certificate issued &amp; directory profile activated.</p>
          </div>
        </div>

        <div class="p-6 bg-[#002654] text-white rounded-lg shadow-md text-center">
          <h3 class="font-serif-diplomatic text-lg font-bold text-white mb-2">Ready to Lodge Your Application?</h3>
          <p class="text-xs text-slate-300 mb-4 leading-relaxed">
            Complete the digital membership form in under 5 minutes.
          </p>
          <a href="<?= url('/apply') ?>" class="inline-flex items-center justify-center w-full py-3 px-6 bg-[#b91c1c] hover:bg-[#991b1b] text-white font-bold text-xs uppercase tracking-wider rounded transition-all shadow">
            Begin Online Application &rarr;
          </a>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- INTERACTIVE FAQ ACCORDIONS -->
<section id="faqs" class="w-full bg-white py-16 border-b border-slate-200">
  <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-12">
    <div class="text-center mb-10">
      <span class="text-xs font-bold uppercase tracking-widest text-[#002654] block mb-1">Institutional Queries</span>
      <h2 class="font-serif-diplomatic text-2xl sm:text-3xl text-[#0b1e3b] font-bold m-0">
        Frequently Asked Questions
      </h2>
    </div>

    <div class="space-y-3">
      <div class="border border-slate-200 rounded-lg overflow-hidden">
        <button type="button" data-accordion-toggle aria-expanded="true" class="w-full px-5 py-4 bg-slate-50 hover:bg-slate-100 flex items-center justify-between text-left font-serif-diplomatic font-bold text-sm sm:text-base text-[#002654] cursor-pointer">
          <span>What are the applicable membership subscription fees?</span>
          <span class="material-symbols-outlined accordion-icon transition-transform" style="transform: rotate(180deg);">expand_more</span>
        </button>
        <div class="p-5 text-xs sm:text-sm text-slate-600 border-t border-slate-200 leading-relaxed">
          Annual subscription dues and one-time entrance fees are reviewed annually at the Annual General Meeting in accordance with Chamber financial regulations. Current approved fee schedules are formally issued to applicants upon due diligence clearance.
        </div>
      </div>

      <div class="border border-slate-200 rounded-lg overflow-hidden">
        <button type="button" data-accordion-toggle aria-expanded="false" class="w-full px-5 py-4 bg-slate-50 hover:bg-slate-100 flex items-center justify-between text-left font-serif-diplomatic font-bold text-sm sm:text-base text-[#002654] cursor-pointer">
          <span>Can foreign French enterprises without a registered Sri Lankan office join?</span>
          <span class="material-symbols-outlined accordion-icon transition-transform">expand_more</span>
        </button>
        <div class="p-5 text-xs sm:text-sm text-slate-600 border-t border-slate-200 leading-relaxed hidden">
          Yes. French enterprises with registered commercial activity, representative liaison offices, or direct export/import relationships with Sri Lankan partners are eligible for Overseas Affiliate or Corporate membership.
        </div>
      </div>

      <div class="border border-slate-200 rounded-lg overflow-hidden">
        <button type="button" data-accordion-toggle aria-expanded="false" class="w-full px-5 py-4 bg-slate-50 hover:bg-slate-100 flex items-center justify-between text-left font-serif-diplomatic font-bold text-sm sm:text-base text-[#002654] cursor-pointer">
          <span>What if an enterprise cannot obtain two member recommendations?</span>
          <span class="material-symbols-outlined accordion-icon transition-transform">expand_more</span>
        </button>
        <div class="p-5 text-xs sm:text-sm text-slate-600 border-t border-slate-200 leading-relaxed hidden">
          The Secretariat accepts direct introductory endorsements from the Embassy of France, Business France, the Export Development Board (EDB), or the Board of Investment (BOI) of Sri Lanka.
        </div>
      </div>
    </div>
  </div>
</section>
