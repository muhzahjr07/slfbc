<!-- BREADCRUMBS & HERO -->
<section class="w-full bg-slate-50 border-b border-slate-200 py-10">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-12">
    <ul class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?= url('/') ?>">Home</a></li>
      <li class="breadcrumb-item text-slate-800 font-semibold">Leadership &amp; Governance</li>
    </ul>

    <div class="inline-flex items-center gap-2 mb-2">
      <span class="w-2.5 h-2.5 bg-[#b91c1c] inline-block"></span>
      <span class="text-xs font-bold uppercase tracking-widest text-[#b91c1c]">Governance &amp; Executive Roster</span>
    </div>
    <h1 class="font-serif-diplomatic text-3xl sm:text-4xl lg:text-5xl text-[#0b1e3b] font-bold tracking-tight">
      Executive Committee (Term <?= e($termYear) ?>)
    </h1>
    <p class="font-sans text-base sm:text-lg text-slate-600 max-w-3xl mt-4 leading-relaxed">
      Elected leadership representing leading corporate conglomerates, multinational enterprises, and institutional authorities stewarding bilateral economic cooperation.
    </p>
  </div>
</section>

<!-- LEADERSHIP ROSTER -->
<section class="w-full bg-white py-16 border-b border-slate-200">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-12">
    <!-- Presidential Spotlight Card -->
    <?php if ($president): ?>
      <div class="bg-white border-2 border-slate-200 rounded-lg shadow-sm overflow-hidden mb-16">
        <div class="grid grid-cols-1 lg:grid-cols-12 items-center">
          <div class="lg:col-span-4 p-6 sm:p-8 flex items-center justify-center bg-slate-50 border-b lg:border-b-0 lg:border-r border-slate-200">
            <div class="relative w-48 sm:w-56 md:w-60 aspect-[496/781] rounded-lg overflow-hidden shadow-md border border-slate-200 bg-white">
              <img src="<?= asset($president['portrait_path'] ?? 'assets/images/president-dubois.jpg') ?>" alt="<?= e($president['name']) ?>" class="w-full h-full object-contain">
            </div>
          </div>
          <div class="lg:col-span-8 p-8 lg:p-12 flex flex-col justify-between">
            <div>
              <div class="inline-flex items-center gap-2 px-3 py-1 bg-slate-100 border border-slate-200 rounded font-sans text-xs font-bold uppercase text-[#b91c1c] mb-4">
                <span class="w-2 h-2 rounded-full bg-[#b91c1c]"></span>
                Executive President • Term <?= e($termYear) ?>
              </div>
              <h2 class="font-serif-diplomatic text-3xl text-[#0b1e3b] font-bold m-0"><?= e($president['name']) ?></h2>
              <p class="font-sans text-lg font-bold text-[#002654] mt-1 mb-4">
                <?= e($president['organization']) ?>
              </p>
              <?php if ($president['bio']): ?>
                <p class="text-slate-700 leading-relaxed text-base mb-6">
                  <?= e($president['bio']) ?>
                </p>
              <?php endif; ?>
              <?php if (!empty($presidentQuote)): ?>
                <blockquote class="font-serif-diplomatic text-base sm:text-lg text-slate-700 italic border-l-4 border-[#b91c1c] pl-5 mb-6 leading-relaxed">
                  "<?= e($presidentQuote) ?>"
                </blockquote>
              <?php endif; ?>
            </div>
            <div class="pt-6 border-t border-slate-200 flex flex-wrap items-center justify-between text-xs sm:text-sm text-slate-600 font-semibold">
              <span>Secretariat Administration: The Ceylon Chamber of Commerce</span>
              <span class="text-[#002654]">Official Mandate Confirmed</span>
            </div>
          </div>
        </div>
      </div>
    <?php endif; ?>

    <!-- Committee Members Grid -->
    <div class="mb-12">
      <h3 class="font-serif-diplomatic text-2xl text-[#0b1e3b] font-bold mb-6 pb-3 border-b border-slate-200">
        Executive Committee Officers &amp; Members
      </h3>
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        <?php foreach ($committee as $member): if ($member['category'] === 'president') continue; ?>
          <div class="bg-slate-50 border border-slate-200 rounded-lg p-6 shadow-sm flex flex-col justify-between hover:border-[#002654] hover:bg-white hover:shadow-md transition-all">
            <div>
              <span class="px-2.5 py-1 bg-white border border-slate-300 text-[#002654] font-bold text-xs uppercase rounded inline-block mb-3">
                <?= e($member['role_title']) ?>
              </span>
              <h4 class="font-serif-diplomatic text-xl text-[#0b1e3b] font-bold m-0"><?= e($member['name']) ?></h4>
              <p class="font-semibold text-sm text-[#002654] mt-1 mb-3"><?= e($member['organization']) ?></p>
              <?php if ($member['bio']): ?>
                <p class="text-xs sm:text-sm text-slate-600 leading-relaxed mb-4">
                  <?= e($member['bio']) ?>
                </p>
              <?php endif; ?>
            </div>
            <div class="pt-4 border-t border-slate-200 flex items-center justify-between text-xs text-slate-500 font-bold uppercase">
              <span>Term <?= e($member['term_year']) ?></span>
              <span class="text-emerald-700 flex items-center gap-1">
                <span class="w-2 h-2 rounded-full bg-emerald-600"></span> Active
              </span>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>

    <!-- Editorial Safeguard Notice -->
    <div class="p-6 bg-slate-50 border-l-4 border-l-[#c59b27] border border-slate-200 rounded-lg">
      <h4 class="font-serif-diplomatic text-base font-bold text-[#0b1e3b] mb-1">Institutional Privacy &amp; Verification Protocol</h4>
      <p class="text-xs sm:text-sm text-slate-600 m-0 leading-relaxed">
        The Executive Committee is reconstituted annually at the Annual General Meeting of the Sri Lanka–France Business Council convened under the constitution of The Ceylon Chamber of Commerce. In accordance with institutional confidentiality guidelines, personal telephone numbers and private contact information are not published. All official inquiries to committee members should be directed via the Secretariat.
      </p>
    </div>
  </div>
</section>
