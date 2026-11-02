<?php
/**
 * Membership Overview View
 * Sri Lanka–France Business Council (SLFBC)
 */
?>
<!-- BREADCRUMBS & HERO -->
<section class="w-full bg-slate-50 border-b border-slate-200 py-10">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-12">
    <ul class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?= url('/') ?>">Home</a></li>
      <li class="breadcrumb-item text-slate-800 font-semibold">Membership</li>
    </ul>

    <div class="inline-flex items-center gap-2 mb-2">
      <span class="w-2.5 h-2.5 bg-[#b91c1c] inline-block"></span>
      <span class="text-xs font-bold uppercase tracking-widest text-[#b91c1c]">Bilateral Network &amp; Advocacy</span>
    </div>
    <h1 class="font-serif-diplomatic text-3xl sm:text-4xl lg:text-5xl text-[#0b1e3b] font-bold tracking-tight">
      Membership in the Council
    </h1>
    <p class="font-sans text-base sm:text-lg text-slate-600 max-w-3xl mt-4 leading-relaxed">
      Position your enterprise at the forefront of Sri Lanka–France commercial relations, trade missions, high-level diplomatic dialogues, and market expansion under the aegis of The Ceylon Chamber of Commerce.
    </p>

    <div class="mt-8 flex flex-wrap items-center gap-4">
      <a href="<?= url('/apply') ?>" class="inline-flex items-center justify-center px-6 py-3 bg-[#b91c1c] hover:bg-[#991b1b] text-white font-bold text-sm uppercase tracking-wider rounded shadow transition-all">
        Apply for Membership &rarr;
      </a>
      <a href="<?= url('/members') ?>" class="inline-flex items-center justify-center px-6 py-3 bg-white border border-slate-300 hover:bg-slate-100 text-slate-700 font-bold text-sm uppercase tracking-wider rounded shadow-sm transition-all">
        Explore Member Directory
      </a>
    </div>
  </div>
</section>

<!-- VALUE PILLARS -->
<section class="w-full bg-white py-16 border-b border-slate-200">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-12">
    <div class="max-w-3xl mb-12">
      <div class="inline-flex items-center gap-2 mb-2">
        <span class="w-2 h-2 rounded-full bg-[#002654]"></span>
        <span class="text-xs font-bold uppercase tracking-widest text-[#002654]">Strategic Advantages</span>
      </div>
      <h2 class="font-serif-diplomatic text-2xl sm:text-3xl lg:text-4xl text-[#0b1e3b] font-bold">
        Why Join the Sri Lanka–France Business Council?
      </h2>
      <p class="text-slate-600 mt-3 text-base leading-relaxed">
        Administered under the prestigious aegis of The Ceylon Chamber of Commerce, membership connects your corporate leadership with premier French and Sri Lankan institutional decision-makers.
      </p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
      <!-- 1. Diplomatic & Institutional Access -->
      <div class="p-8 bg-slate-50 border border-slate-200 rounded-lg hover:border-[#002654] hover:shadow-md transition-all flex flex-col justify-between">
        <div>
          <div class="w-12 h-12 rounded-lg bg-blue-100/70 text-[#002654] flex items-center justify-center mb-6">
            <span class="material-symbols-outlined text-2xl">account_balance</span>
          </div>
          <h3 class="font-serif-diplomatic text-xl font-bold text-[#0b1e3b] mb-3">Diplomatic &amp; Institutional Access</h3>
          <p class="text-sm text-slate-600 leading-relaxed mb-0">
            Direct protocol engagement with the Embassy of France, the French Regional Economic Service, Business France, and Sri Lankan state trade facilitation agencies.
          </p>
        </div>
      </div>

      <!-- 2. Bilateral Trade Missions -->
      <div class="p-8 bg-slate-50 border border-slate-200 rounded-lg hover:border-[#002654] hover:shadow-md transition-all flex flex-col justify-between">
        <div>
          <div class="w-12 h-12 rounded-lg bg-amber-100/70 text-[#c59b27] flex items-center justify-center mb-6">
            <span class="material-symbols-outlined text-2xl">flight_takeoff</span>
          </div>
          <h3 class="font-serif-diplomatic text-xl font-bold text-[#0b1e3b] mb-3">Bilateral Trade Missions</h3>
          <p class="text-sm text-slate-600 leading-relaxed mb-0">
            Priority participation in official outbound trade delegations to Paris, Lyon, Marseille, and key European economic forums, plus exclusive invitations to host incoming French delegations.
          </p>
        </div>
      </div>

      <!-- 3. Policy & Trade Advocacy -->
      <div class="p-8 bg-slate-50 border border-slate-200 rounded-lg hover:border-[#002654] hover:shadow-md transition-all flex flex-col justify-between">
        <div>
          <div class="w-12 h-12 rounded-lg bg-red-100/70 text-[#b91c1c] flex items-center justify-center mb-6">
            <span class="material-symbols-outlined text-2xl">gavel</span>
          </div>
          <h3 class="font-serif-diplomatic text-xl font-bold text-[#0b1e3b] mb-3">Policy &amp; Trade Advocacy</h3>
          <p class="text-sm text-slate-600 leading-relaxed mb-0">
            Unified statutory representation through The Ceylon Chamber of Commerce on tariff barriers, customs procedures, EU regulatory frameworks, and bilateral investment protection.
          </p>
        </div>
      </div>

      <!-- 4. Targeted B2B Matchmaking -->
      <div class="p-8 bg-slate-50 border border-slate-200 rounded-lg hover:border-[#002654] hover:shadow-md transition-all flex flex-col justify-between">
        <div>
          <div class="w-12 h-12 rounded-lg bg-blue-100/70 text-[#002654] flex items-center justify-center mb-6">
            <span class="material-symbols-outlined text-2xl">handshake</span>
          </div>
          <h3 class="font-serif-diplomatic text-xl font-bold text-[#0b1e3b] mb-3">Targeted B2B Matchmaking</h3>
          <p class="text-sm text-slate-600 leading-relaxed mb-0">
            Curated introductions to French importers, suppliers, industrial partners, joint-venture candidates, and technology solutions providers.
          </p>
        </div>
      </div>

      <!-- 5. Market Intelligence & Regulatory Alerts -->
      <div class="p-8 bg-slate-50 border border-slate-200 rounded-lg hover:border-[#002654] hover:shadow-md transition-all flex flex-col justify-between">
        <div>
          <div class="w-12 h-12 rounded-lg bg-amber-100/70 text-[#c59b27] flex items-center justify-center mb-6">
            <span class="material-symbols-outlined text-2xl">insights</span>
          </div>
          <h3 class="font-serif-diplomatic text-xl font-bold text-[#0b1e3b] mb-3">Market Intelligence &amp; Alerts</h3>
          <p class="text-sm text-slate-600 leading-relaxed mb-0">
            Exclusive briefings on EU environmental due diligence (CSDDD), carbon border mechanisms (CBAM), GSP+ trade compliance, and sovereign infrastructure tenders.
          </p>
        </div>
      </div>

      <!-- 6. Executive Brand Exposure -->
      <div class="p-8 bg-slate-50 border border-slate-200 rounded-lg hover:border-[#002654] hover:shadow-md transition-all flex flex-col justify-between">
        <div>
          <div class="w-12 h-12 rounded-lg bg-red-100/70 text-[#b91c1c] flex items-center justify-center mb-6">
            <span class="material-symbols-outlined text-2xl">workspace_premium</span>
          </div>
          <h3 class="font-serif-diplomatic text-xl font-bold text-[#0b1e3b] mb-3">Executive Brand Exposure</h3>
          <p class="text-sm text-slate-600 leading-relaxed mb-0">
            Showcase your corporate standing in the official Bilateral Member Directory, annual council reports, symposium banners, and state media releases.
          </p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ELIGIBILITY & APPLICATION JOURNEY -->
<section class="w-full bg-slate-50 py-16 border-b border-slate-200">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-12">
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-start">
      
      <!-- Left 7 Columns: Eligibility & Requirements -->
      <div class="lg:col-span-7 space-y-8">
        <div>
          <div class="inline-flex items-center gap-2 mb-2">
            <span class="w-2.5 h-2.5 bg-[#002654] inline-block"></span>
            <span class="text-xs font-bold uppercase tracking-widest text-[#002654]">Governance &amp; Criteria</span>
          </div>
          <h2 class="font-serif-diplomatic text-2xl sm:text-3xl text-[#0b1e3b] font-bold">
            Eligibility &amp; Submission Requirements
          </h2>
          <p class="text-slate-600 mt-3 text-sm sm:text-base leading-relaxed">
            Membership in the Council is open to registered commercial entities, joint ventures, and multinational enterprises actively engaged in or preparing to enter trade, investment, or technological collaboration between Sri Lanka and France.
          </p>
        </div>

        <!-- Documentation Card -->
        <div class="p-6 sm:p-8 bg-white border border-slate-200 rounded-lg shadow-sm">
          <h3 class="font-serif-diplomatic text-lg font-bold text-[#002654] mb-4 pb-2 border-b border-slate-100">
            Mandatory Corporate Documentation
          </h3>
          <ul class="space-y-4 list-none p-0 m-0 text-sm text-slate-700">
            <li class="flex items-start gap-3">
              <span class="material-symbols-outlined text-[#002654] text-lg shrink-0 mt-0.5">check_circle</span>
              <div>
                <strong>Certificate of Incorporation:</strong> Valid Business Registration under the Companies Act of Sri Lanka or corresponding French Registry (RCS / Kbis).
              </div>
            </li>
            <li class="flex items-start gap-3">
              <span class="material-symbols-outlined text-[#002654] text-lg shrink-0 mt-0.5">check_circle</span>
              <div>
                <strong>Company Profile:</strong> Corporate overview, management structure, and nature of commercial or export links with the Republic of France.
              </div>
            </li>
            <li class="flex items-start gap-3">
              <span class="material-symbols-outlined text-[#002654] text-lg shrink-0 mt-0.5">check_circle</span>
              <div>
                <strong>Audited Financial Records:</strong> Financial statements for the preceding two fiscal years demonstrating active trading.
              </div>
            </li>
            <li class="flex items-start gap-3">
              <span class="material-symbols-outlined text-[#002654] text-lg shrink-0 mt-0.5">check_circle</span>
              <div>
                <strong>Member Proposers:</strong> Endorsement or recommendation by two active members of the Council or Ceylon Chamber affiliates.
              </div>
            </li>
          </ul>
        </div>

        <!-- Review Protocol Notice -->
        <div class="p-6 bg-amber-50 border-l-4 border-l-[#c59b27] border border-amber-200 rounded-lg">
          <h4 class="font-serif-diplomatic text-sm font-bold text-[#8d4004] mb-1">Secretariat Review Protocol</h4>
          <p class="text-xs sm:text-sm text-slate-700 m-0 leading-relaxed">
            All applications are formally reviewed by the Secretariat of The Ceylon Chamber of Commerce and submitted for ratification to the Executive Committee of the SLFBC. Submission of an application form does not automatically confer membership.
          </p>
        </div>
      </div>

      <!-- Right 5 Columns: Step-by-Step Journey -->
      <div class="lg:col-span-5 space-y-6">
        <div>
          <div class="inline-flex items-center gap-2 mb-2">
            <span class="w-2.5 h-2.5 bg-[#b91c1c] inline-block"></span>
            <span class="text-xs font-bold uppercase tracking-widest text-[#b91c1c]">Step-by-Step</span>
          </div>
          <h2 class="font-serif-diplomatic text-2xl text-[#0b1e3b] font-bold">
            Application Journey
          </h2>
        </div>

        <div class="space-y-4">
          <!-- Step 1 -->
          <div class="p-5 bg-white border border-slate-200 rounded-lg shadow-sm flex items-start gap-4">
            <span class="w-8 h-8 rounded-full bg-[#002654] text-white flex items-center justify-center font-bold text-xs shrink-0">1</span>
            <div>
              <h4 class="font-serif-diplomatic text-base font-bold text-[#002654] mb-1">Online Dossier Submission</h4>
              <p class="text-xs text-slate-600 m-0 leading-relaxed">Complete the verified institutional portal form and upload required corporate credentials.</p>
            </div>
          </div>

          <!-- Step 2 -->
          <div class="p-5 bg-white border border-slate-200 rounded-lg shadow-sm flex items-start gap-4">
            <span class="w-8 h-8 rounded-full bg-[#002654] text-white flex items-center justify-center font-bold text-xs shrink-0">2</span>
            <div>
              <h4 class="font-serif-diplomatic text-base font-bold text-[#002654] mb-1">Secretariat Due Diligence</h4>
              <p class="text-xs text-slate-600 m-0 leading-relaxed">The Chamber Secretariat examines registration records, compliance standing, and proposer endorsements.</p>
            </div>
          </div>

          <!-- Step 3 -->
          <div class="p-5 bg-white border border-slate-200 rounded-lg shadow-sm flex items-start gap-4">
            <span class="w-8 h-8 rounded-full bg-[#c59b27] text-white flex items-center justify-center font-bold text-xs shrink-0">3</span>
            <div>
              <h4 class="font-serif-diplomatic text-base font-bold text-[#002654] mb-1">Executive Committee Ratification</h4>
              <p class="text-xs text-slate-600 m-0 leading-relaxed">Applications are tabled at the next scheduled Committee sitting for formal governance review.</p>
            </div>
          </div>

          <!-- Step 4 -->
          <div class="p-5 bg-white border border-slate-200 rounded-lg shadow-sm flex items-start gap-4">
            <span class="w-8 h-8 rounded-full bg-[#b91c1c] text-white flex items-center justify-center font-bold text-xs shrink-0">4</span>
            <div>
              <h4 class="font-serif-diplomatic text-base font-bold text-[#002654] mb-1">Induction &amp; Directory Listing</h4>
              <p class="text-xs text-slate-600 m-0 leading-relaxed">Upon fee settlement, official membership certificates are issued and directory credentials published.</p>
            </div>
          </div>
        </div>

        <!-- Initiate CTA Box -->
        <div class="p-6 bg-[#002654] text-white rounded-lg shadow-md text-center">
          <h3 class="font-serif-diplomatic text-lg font-bold text-white mb-2">Ready to Lodge Your Application?</h3>
          <p class="text-xs text-slate-300 mb-5 leading-relaxed">
            Our secure online application portal takes approximately 10 minutes to submit corporate particulars.
          </p>
          <a href="<?= url('/apply') ?>" class="inline-flex items-center justify-center w-full py-3 px-6 bg-[#b91c1c] hover:bg-[#991b1b] text-white font-bold text-xs uppercase tracking-wider rounded transition-all shadow">
            Begin Online Application &rarr;
          </a>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- FREQUENTLY ASKED QUESTIONS SECTION -->
<section id="faqs" class="w-full bg-white py-16 border-b border-slate-200">
  <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-12">
    <div class="text-center mb-12">
      <div class="inline-flex items-center gap-2 mb-2">
        <span class="w-2 h-2 rounded-full bg-[#c59b27]"></span>
        <span class="text-xs font-bold uppercase tracking-widest text-[#002654]">Institutional Queries</span>
      </div>
      <h2 class="font-serif-diplomatic text-2xl sm:text-3xl lg:text-4xl text-[#0b1e3b] font-bold">
        Frequently Asked Questions
      </h2>
      <p class="text-slate-600 mt-2 text-sm sm:text-base">
        Guidelines on subscription dues, non-resident foreign enterprises, and alternative endorsements.
      </p>
    </div>

    <div class="space-y-6">
      <div class="p-6 bg-slate-50 border border-slate-200 rounded-lg">
        <h4 class="font-serif-diplomatic text-base font-bold text-[#002654] mb-2">
          What are the applicable membership subscription fees?
        </h4>
        <p class="text-sm text-slate-600 leading-relaxed m-0">
          Annual subscription dues and one-time entrance fees are reviewed annually at the Annual General Meeting in accordance with Chamber financial regulations. Current approved fee schedules are formally issued to applicants upon due diligence clearance.
        </p>
      </div>

      <div class="p-6 bg-slate-50 border border-slate-200 rounded-lg">
        <h4 class="font-serif-diplomatic text-base font-bold text-[#002654] mb-2">
          Can foreign French enterprises without a registered Sri Lankan office join?
        </h4>
        <p class="text-sm text-slate-600 leading-relaxed m-0">
          Yes. French enterprises with registered commercial activity, representative liaison offices, or direct export/import relationships with Sri Lankan partners are eligible for corporate bilateral affiliation under applicable Chamber provisions.
        </p>
      </div>

      <div class="p-6 bg-slate-50 border border-slate-200 rounded-lg">
        <h4 class="font-serif-diplomatic text-base font-bold text-[#002654] mb-2">
          What happens if an enterprise cannot obtain two member recommendations?
        </h4>
        <p class="text-sm text-slate-600 leading-relaxed m-0">
          The Secretariat may consider direct introductory endorsements from the Embassy of France, Business France, the Export Development Board (EDB), or the Board of Investment (BOI) of Sri Lanka in lieu of traditional member proposers.
        </p>
      </div>
    </div>
  </div>
</section>
