<!-- BREADCRUMBS & HERO -->
<section class="w-full bg-slate-50 border-b border-slate-200 py-10">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-12">
    <ul class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?= url('/') ?>">Home</a></li>
      <li class="breadcrumb-item text-slate-800 font-semibold">Sitemap</li>
    </ul>

    <div class="inline-flex items-center gap-2 mb-2">
      <span class="w-2.5 h-2.5 bg-[#b91c1c] inline-block"></span>
      <span class="text-xs font-bold uppercase tracking-widest text-[#b91c1c]">Information Architecture</span>
    </div>
    <h1 class="font-serif-diplomatic text-3xl sm:text-4xl lg:text-5xl text-[#0b1e3b] font-bold tracking-tight">
      Sitemap &amp; Portal Index
    </h1>
    <p class="font-sans text-base sm:text-lg text-slate-600 max-w-3xl mt-4 leading-relaxed">
      A complete, openable index of all public services, bilateral trade corridors, governance charters, member directories, and legal registries of the Sri Lanka–France Business Council.
    </p>
  </div>
</section>

<!-- MAIN SITEMAP CONTENT -->
<section class="w-full bg-white py-16 border-b border-slate-200">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-12">

    <!-- Categories Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

      <!-- 1. Council & Governance -->
      <div class="bg-slate-50 border border-slate-200 rounded-lg p-6 flex flex-col justify-between hover:border-[#002654] hover:shadow-md transition-all">
        <div>
          <div class="flex items-center gap-2.5 mb-4 pb-3 border-b border-slate-200">
            <span class="material-symbols-outlined text-[#002654] text-2xl">account_balance</span>
            <h2 class="font-serif-diplomatic text-xl font-bold text-[#0b1e3b] m-0">Council &amp; Governance</h2>
          </div>
          <ul class="space-y-2.5 text-sm list-none p-0 m-0">
            <li>
              <a href="<?= url('/') ?>" class="font-semibold text-[#002654] hover:underline flex items-center gap-1.5">
                <span class="material-symbols-outlined text-sm text-[#b91c1c]">arrow_forward</span>
                Home / Main Dispatch
              </a>
            </li>
            <li>
              <a href="<?= url('/about') ?>" class="text-slate-700 hover:text-[#002654] hover:underline flex items-center gap-1.5">
                <span class="material-symbols-outlined text-sm text-slate-400">arrow_forward</span>
                About the Council &amp; Mandate
              </a>
            </li>
            <li>
              <a href="<?= url('/leadership') ?>" class="text-slate-700 hover:text-[#002654] hover:underline flex items-center gap-1.5">
                <span class="material-symbols-outlined text-sm text-slate-400">arrow_forward</span>
                Executive Committee (Term 2026/27)
              </a>
            </li>
            <li>
              <a href="<?= url('/ambassador-message') ?>" class="text-slate-700 hover:text-[#002654] hover:underline flex items-center gap-1.5">
                <span class="material-symbols-outlined text-sm text-slate-400">arrow_forward</span>
                French Ambassador’s Dispatch
              </a>
            </li>
            <li>
              <a href="<?= url('/about#constitution') ?>" class="text-slate-700 hover:text-[#002654] hover:underline flex items-center gap-1.5">
                <span class="material-symbols-outlined text-sm text-slate-400">arrow_forward</span>
                Council Constitution &amp; By-Laws
              </a>
            </li>
            <li>
              <a href="<?= url('/gallery') ?>" class="text-slate-700 hover:text-[#002654] hover:underline flex items-center gap-1.5">
                <span class="material-symbols-outlined text-sm text-slate-400">arrow_forward</span>
                Photo Gallery &amp; Summit Archives
              </a>
            </li>
          </ul>
        </div>
        <div class="mt-6 pt-3 border-t border-slate-200 text-xs text-slate-500 font-semibold uppercase">
          Secretariat Governance
        </div>
      </div>

      <!-- 2. Membership & Applications -->
      <div class="bg-slate-50 border border-slate-200 rounded-lg p-6 flex flex-col justify-between hover:border-[#002654] hover:shadow-md transition-all">
        <div>
          <div class="flex items-center gap-2.5 mb-4 pb-3 border-b border-slate-200">
            <span class="material-symbols-outlined text-[#002654] text-2xl">badge</span>
            <h2 class="font-serif-diplomatic text-xl font-bold text-[#0b1e3b] m-0">Membership Services</h2>
          </div>
          <ul class="space-y-2.5 text-sm list-none p-0 m-0">
            <li>
              <a href="<?= url('/membership') ?>" class="font-semibold text-[#002654] hover:underline flex items-center gap-1.5">
                <span class="material-symbols-outlined text-sm text-[#b91c1c]">arrow_forward</span>
                Membership Overview &amp; Privileges
              </a>
            </li>
            <li>
              <a href="<?= url('/apply') ?>" class="font-bold text-[#b91c1c] hover:underline flex items-center gap-1.5">
                <span class="material-symbols-outlined text-sm text-[#b91c1c]">arrow_forward</span>
                Apply for Membership (Online Form)
              </a>
            </li>
            <li>
              <a href="<?= url('/membership#tiers') ?>" class="text-slate-700 hover:text-[#002654] hover:underline flex items-center gap-1.5">
                <span class="material-symbols-outlined text-sm text-slate-400">arrow_forward</span>
                Corporate, Patron &amp; Associate Tiers
              </a>
            </li>
            <li>
              <a href="<?= url('/membership#fees') ?>" class="text-slate-700 hover:text-[#002654] hover:underline flex items-center gap-1.5">
                <span class="material-symbols-outlined text-sm text-slate-400">arrow_forward</span>
                Official Fee Schedule
              </a>
            </li>
            <li>
              <a href="<?= url('/membership#faqs') ?>" class="text-slate-700 hover:text-[#002654] hover:underline flex items-center gap-1.5">
                <span class="material-symbols-outlined text-sm text-slate-400">arrow_forward</span>
                Frequently Asked Questions (FAQs)
              </a>
            </li>
          </ul>
        </div>
        <div class="mt-6 pt-3 border-t border-slate-200 text-xs text-slate-500 font-semibold uppercase">
          Chamber Affiliation
        </div>
      </div>

      <!-- 3. Bilateral Trade & Investment Corridors -->
      <div class="bg-slate-50 border border-slate-200 rounded-lg p-6 flex flex-col justify-between hover:border-[#002654] hover:shadow-md transition-all">
        <div>
          <div class="flex items-center gap-2.5 mb-4 pb-3 border-b border-slate-200">
            <span class="material-symbols-outlined text-[#002654] text-2xl">public</span>
            <h2 class="font-serif-diplomatic text-xl font-bold text-[#0b1e3b] m-0">Trade Corridors</h2>
          </div>
          <ul class="space-y-2.5 text-sm list-none p-0 m-0">
            <li>
              <a href="<?= url('/france-business') ?>" class="font-semibold text-[#002654] hover:underline flex items-center gap-1.5">
                <span class="material-symbols-outlined text-sm text-[#b91c1c]">arrow_forward</span>
                Doing Business with France (EU)
              </a>
            </li>
            <li>
              <a href="<?= url('/srilanka-business') ?>" class="font-semibold text-[#002654] hover:underline flex items-center gap-1.5">
                <span class="material-symbols-outlined text-sm text-[#b91c1c]">arrow_forward</span>
                Doing Business in Sri Lanka
              </a>
            </li>
            <li>
              <a href="<?= url('/opportunities') ?>" class="text-slate-700 hover:text-[#002654] hover:underline flex items-center gap-1.5">
                <span class="material-symbols-outlined text-sm text-slate-400">arrow_forward</span>
                Priority Business Opportunities
              </a>
            </li>
            <li>
              <a href="<?= url('/france-business#gsp') ?>" class="text-slate-700 hover:text-[#002654] hover:underline flex items-center gap-1.5">
                <span class="material-symbols-outlined text-sm text-slate-400">arrow_forward</span>
                EU GSP+ Tariff Preferences
              </a>
            </li>
            <li>
              <a href="<?= url('/srilanka-business#investment') ?>" class="text-slate-700 hover:text-[#002654] hover:underline flex items-center gap-1.5">
                <span class="material-symbols-outlined text-sm text-slate-400">arrow_forward</span>
                Port City Colombo &amp; Industrial Zones
              </a>
            </li>
          </ul>
        </div>
        <div class="mt-6 pt-3 border-t border-slate-200 text-xs text-slate-500 font-semibold uppercase">
          Cross-Border Commercial Channels
        </div>
      </div>

      <!-- 4. Member Network Directory -->
      <div class="bg-slate-50 border border-slate-200 rounded-lg p-6 flex flex-col justify-between hover:border-[#002654] hover:shadow-md transition-all">
        <div>
          <div class="flex items-center gap-2.5 mb-4 pb-3 border-b border-slate-200">
            <span class="material-symbols-outlined text-[#002654] text-2xl">apartment</span>
            <h2 class="font-serif-diplomatic text-xl font-bold text-[#0b1e3b] m-0">Corporate Directory</h2>
          </div>
          <ul class="space-y-2.5 text-sm list-none p-0 m-0">
            <li>
              <a href="<?= url('/members') ?>" class="font-semibold text-[#002654] hover:underline flex items-center gap-1.5">
                <span class="material-symbols-outlined text-sm text-[#b91c1c]">arrow_forward</span>
                Searchable Member Directory
              </a>
            </li>
            <li>
              <a href="<?= url('/members?sector=maritime-logistics') ?>" class="text-slate-700 hover:text-[#002654] hover:underline flex items-center gap-1.5">
                <span class="material-symbols-outlined text-sm text-slate-400">arrow_forward</span>
                Maritime Logistics &amp; Shipping
              </a>
            </li>
            <li>
              <a href="<?= url('/members?sector=energy-infrastructure') ?>" class="text-slate-700 hover:text-[#002654] hover:underline flex items-center gap-1.5">
                <span class="material-symbols-outlined text-sm text-slate-400">arrow_forward</span>
                Energy, Power &amp; Clean Tech
              </a>
            </li>
            <li>
              <a href="<?= url('/members?sector=conglomerates-diversified') ?>" class="text-slate-700 hover:text-[#002654] hover:underline flex items-center gap-1.5">
                <span class="material-symbols-outlined text-sm text-slate-400">arrow_forward</span>
                Diversified Conglomerates
              </a>
            </li>
            <li>
              <a href="<?= url('/members?sector=apparel-textiles') ?>" class="text-slate-700 hover:text-[#002654] hover:underline flex items-center gap-1.5">
                <span class="material-symbols-outlined text-sm text-slate-400">arrow_forward</span>
                Apparel, Textiles &amp; High Fashion
              </a>
            </li>
            <li>
              <a href="<?= url('/members?sector=tourism-hospitality') ?>" class="text-slate-700 hover:text-[#002654] hover:underline flex items-center gap-1.5">
                <span class="material-symbols-outlined text-sm text-slate-400">arrow_forward</span>
                Tourism &amp; Destination Management
              </a>
            </li>
          </ul>
        </div>
        <div class="mt-6 pt-3 border-t border-slate-200 text-xs text-slate-500 font-semibold uppercase">
          Verified Enterprise Roster
        </div>
      </div>

      <!-- 5. Events & Communiqués -->
      <div class="bg-slate-50 border border-slate-200 rounded-lg p-6 flex flex-col justify-between hover:border-[#002654] hover:shadow-md transition-all">
        <div>
          <div class="flex items-center gap-2.5 mb-4 pb-3 border-b border-slate-200">
            <span class="material-symbols-outlined text-[#002654] text-2xl">event_available</span>
            <h2 class="font-serif-diplomatic text-xl font-bold text-[#0b1e3b] m-0">Summits &amp; Dispatches</h2>
          </div>
          <ul class="space-y-2.5 text-sm list-none p-0 m-0">
            <li>
              <a href="<?= url('/events') ?>" class="font-semibold text-[#002654] hover:underline flex items-center gap-1.5">
                <span class="material-symbols-outlined text-sm text-[#b91c1c]">arrow_forward</span>
                Events, Delegations &amp; Summits
              </a>
            </li>
            <li>
              <a href="<?= url('/events/2026-sri-lanka-france-bilateral-investment-forum') ?>" class="text-slate-700 hover:text-[#002654] hover:underline flex items-center gap-1.5">
                <span class="material-symbols-outlined text-sm text-slate-400">arrow_forward</span>
                2026 Bilateral Investment Forum
              </a>
            </li>
            <li>
              <a href="<?= url('/events/annual-bilateral-gala-dinner-trade-awards') ?>" class="text-slate-700 hover:text-[#002654] hover:underline flex items-center gap-1.5">
                <span class="material-symbols-outlined text-sm text-slate-400">arrow_forward</span>
                Annual Bilateral Gala &amp; Awards
              </a>
            </li>
            <li>
              <a href="<?= url('/news') ?>" class="font-semibold text-[#002654] hover:underline flex items-center gap-1.5">
                <span class="material-symbols-outlined text-sm text-[#b91c1c]">arrow_forward</span>
                News &amp; Official Communiqués
              </a>
            </li>
            <li>
              <a href="<?= url('/news/french-business-delegation-concludes-logistics-tour') ?>" class="text-slate-700 hover:text-[#002654] hover:underline flex items-center gap-1.5">
                <span class="material-symbols-outlined text-sm text-slate-400">arrow_forward</span>
                French Delegation Logistics Briefing
              </a>
            </li>
          </ul>
        </div>
        <div class="mt-6 pt-3 border-t border-slate-200 text-xs text-slate-500 font-semibold uppercase">
          Bilateral Summits &amp; Releases
        </div>
      </div>

      <!-- 6. Legal, Secretariat & System Endpoints -->
      <div class="bg-slate-50 border border-slate-200 rounded-lg p-6 flex flex-col justify-between hover:border-[#002654] hover:shadow-md transition-all">
        <div>
          <div class="flex items-center gap-2.5 mb-4 pb-3 border-b border-slate-200">
            <span class="material-symbols-outlined text-[#002654] text-2xl">gavel</span>
            <h2 class="font-serif-diplomatic text-xl font-bold text-[#0b1e3b] m-0">Legal &amp; Compliance</h2>
          </div>
          <ul class="space-y-2.5 text-sm list-none p-0 m-0">
            <li>
              <a href="<?= url('/contact') ?>" class="font-semibold text-[#002654] hover:underline flex items-center gap-1.5">
                <span class="material-symbols-outlined text-sm text-[#b91c1c]">arrow_forward</span>
                Contact the Secretariat
              </a>
            </li>
            <li>
              <a href="<?= url('/terms') ?>" class="text-slate-700 hover:text-[#002654] hover:underline flex items-center gap-1.5">
                <span class="material-symbols-outlined text-sm text-slate-400">arrow_forward</span>
                Terms &amp; Conditions
              </a>
            </li>
            <li>
              <a href="<?= url('/privacy') ?>" class="text-slate-700 hover:text-[#002654] hover:underline flex items-center gap-1.5">
                <span class="material-symbols-outlined text-sm text-slate-400">arrow_forward</span>
                Privacy Policy (PDPA &amp; GDPR)
              </a>
            </li>
            <li>
              <a href="<?= url('/sitemap.xml') ?>" target="_blank" class="text-slate-700 hover:text-[#002654] hover:underline flex items-center gap-1.5">
                <span class="material-symbols-outlined text-sm text-slate-400">link</span>
                Raw XML Sitemap (For Crawlers)
              </a>
            </li>
            <li>
              <a href="<?= url('/robots.txt') ?>" target="_blank" class="text-slate-700 hover:text-[#002654] hover:underline flex items-center gap-1.5">
                <span class="material-symbols-outlined text-sm text-slate-400">link</span>
                Robots.txt Directive
              </a>
            </li>
          </ul>
        </div>
        <div class="mt-6 pt-3 border-t border-slate-200 text-xs text-slate-500 font-semibold uppercase">
          Institutional &amp; Technical Compliance
        </div>
      </div>

    </div>

    <!-- Live Corporate Member Directory Quick Index -->
    <?php if (!empty($members)): ?>
      <div class="mt-16 pt-12 border-t border-slate-200">
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-6">
          <div>
            <h3 class="font-serif-diplomatic text-2xl text-[#0b1e3b] font-bold m-0">Corporate Directory Index</h3>
            <p class="text-sm text-slate-600 mt-1 m-0">Direct links to verified corporate member dossiers on the SLFBC portal.</p>
          </div>
          <a href="<?= url('/members') ?>" class="text-sm font-bold text-[#002654] hover:underline flex items-center gap-1">
            View Full Directory <span class="material-symbols-outlined text-sm">arrow_forward</span>
          </a>
        </div>
        <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-3 text-xs font-medium">
          <?php foreach ($members as $m): ?>
            <a href="<?= url('/members/' . e($m['slug'])) ?>" class="p-2.5 bg-slate-50 border border-slate-200 rounded hover:bg-white hover:border-[#002654] hover:text-[#002654] transition-all truncate block">
              <?= e($m['name']) ?>
            </a>
          <?php endforeach; ?>
        </div>
      </div>
    <?php endif; ?>

  </div>
</section>
