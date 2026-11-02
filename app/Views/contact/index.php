<?php
/**
 * Contact the Secretariat View
 * Sri Lanka–France Business Council (SLFBC)
 */
$address = \App\Models\SiteSetting::get('secretariat_address', '50, Nawam Mawatha, Colombo 02, Sri Lanka');
$phoneColombo = \App\Models\SiteSetting::get('secretariat_phone', '+94 11 558 8800');
$phoneParis = \App\Models\SiteSetting::get('paris_phone', '+33 1 45 61 00');
$publicEmail = \App\Models\SiteSetting::get('secretariat_email', 'info@slfbc.lk');
?>
<!-- BREADCRUMBS & HERO -->
<section class="w-full bg-slate-50 border-b border-slate-200 py-10">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-12">
    <ul class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?= url('/') ?>">Home</a></li>
      <li class="breadcrumb-item text-slate-800 font-semibold">Contact Secretariat</li>
    </ul>

    <div class="inline-flex items-center gap-2 mb-2">
      <span class="w-2.5 h-2.5 bg-[#002654] inline-block"></span>
      <span class="text-xs font-bold uppercase tracking-widest text-[#002654]">Secretariat Liaison</span>
    </div>
    <h1 class="font-serif-diplomatic text-3xl sm:text-4xl lg:text-5xl text-[#0b1e3b] font-bold tracking-tight">
      Contact the Secretariat
    </h1>
    <p class="font-sans text-base sm:text-lg text-slate-600 max-w-3xl mt-4 leading-relaxed">
      Connect with the official Secretariat of the Sri Lanka–France Business Council based at The Ceylon Chamber of Commerce.
    </p>
  </div>
</section>

<!-- MAIN CONTENT SECTION -->
<section class="w-full bg-white py-14 border-b border-slate-200">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-12">
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 items-start">
      
      <!-- Left 4 Columns: Secretariat Particulars -->
      <div class="lg:col-span-4 space-y-6">
        <!-- Secretariat Headquarters Card -->
        <div class="bg-slate-50 border border-slate-200 rounded-lg p-6 shadow-sm">
          <h3 class="font-serif-diplomatic text-lg font-bold text-[#002654] mb-4 pb-2 border-b border-slate-200">
            Colombo Secretariat
          </h3>

          <div class="space-y-4 text-xs sm:text-sm">
            <div>
              <span class="text-[11px] font-bold uppercase tracking-wider text-slate-400 block mb-1">Headquarters</span>
              <strong class="text-slate-800 block text-sm">The Ceylon Chamber of Commerce</strong>
              <span class="text-slate-600 leading-relaxed block mt-0.5">
                <?= e($address) ?>
              </span>
            </div>

            <div class="pt-3 border-t border-slate-200">
              <span class="text-[11px] font-bold uppercase tracking-wider text-slate-400 block mb-1">Telephone Inquiries</span>
              <a href="tel:<?= e(str_replace(' ', '', $phoneColombo)) ?>" class="text-[#002654] font-bold text-sm hover:underline block">
                <?= e($phoneColombo) ?>
              </a>
              <span class="text-[11px] text-slate-500 block mt-0.5">Chamber Switchboard (Ext. Bilateral Councils)</span>
            </div>

            <div class="pt-3 border-t border-slate-200">
              <span class="text-[11px] font-bold uppercase tracking-wider text-slate-400 block mb-1">Official Electronic Mail</span>
              <a href="mailto:<?= e($publicEmail) ?>" class="text-[#002654] font-bold text-sm hover:underline block">
                <?= e($publicEmail) ?>
              </a>
              <span class="text-[11px] text-slate-500 block mt-0.5">Attn: Manager – Bilateral Business Councils</span>
            </div>

            <div class="pt-3 border-t border-slate-200">
              <span class="text-[11px] font-bold uppercase tracking-wider text-slate-400 block mb-1">Working Hours</span>
              <span class="text-slate-700 block">Monday &ndash; Friday: 08:30 &ndash; 17:00 (IST)</span>
            </div>
          </div>
        </div>

        <!-- Paris Liaison Office Card -->
        <div class="bg-slate-50 border border-slate-200 rounded-lg p-6 shadow-sm">
          <h3 class="font-serif-diplomatic text-lg font-bold text-[#002654] mb-3 pb-2 border-b border-slate-200">
            Paris Liaison Office
          </h3>
          <p class="text-xs sm:text-sm text-slate-600 leading-relaxed mb-3">
            27 Rue de Berri, 75008 Paris, France
          </p>
          <a href="tel:<?= e(str_replace(' ', '', $phoneParis)) ?>" class="text-[#002654] font-bold text-xs sm:text-sm hover:underline">
            <?= e($phoneParis) ?>
          </a>
        </div>

        <!-- Diplomatic Inquiries Card -->
        <div class="p-6 bg-slate-50 border-l-4 border-l-[#c59b27] border border-slate-200 rounded-lg shadow-sm">
          <h4 class="font-serif-diplomatic text-sm font-bold text-[#8d4004] mb-1">Diplomatic Inquiries</h4>
          <p class="text-xs text-slate-600 leading-relaxed m-0">
            For matters involving official French diplomatic representation, visa facilitation, or ministerial trade delegations, our Secretariat coordinates directly with the Chancellery and the French Regional Economic Service in Colombo.
          </p>
        </div>
      </div>

      <!-- Right 8 Columns: Contact Form -->
      <div class="lg:col-span-8">
        <?php if (!empty($successMessage)): ?>
          <div class="mb-6 p-4 bg-emerald-50 border-l-4 border-emerald-600 rounded text-emerald-900 flex items-start gap-3 shadow-sm alert-auto-dismiss" role="alert">
            <span class="material-symbols-outlined text-emerald-600 text-2xl shrink-0">check_circle</span>
            <div>
              <h4 class="font-bold text-sm">Enquiry Transmitted Successfully</h4>
              <p class="text-xs sm:text-sm mt-0.5"><?= e($successMessage) ?></p>
            </div>
          </div>
        <?php endif; ?>

        <?php if (!empty($errors)): ?>
          <div class="mb-6 p-4 bg-red-50 border-l-4 border-[#b91c1c] rounded text-red-900 flex items-start gap-3 shadow-sm" role="alert">
            <span class="material-symbols-outlined text-[#b91c1c] text-2xl shrink-0">error</span>
            <div>
              <h4 class="font-bold text-sm">Please address the following items:</h4>
              <ul class="list-disc list-inside text-xs mt-1 space-y-0.5">
                <?php foreach ($errors as $err): ?>
                  <li><?= e($err) ?></li>
                <?php endforeach; ?>
              </ul>
            </div>
          </div>
        <?php endif; ?>

        <div class="bg-white border border-slate-200 rounded-xl shadow-sm p-6 sm:p-8">
          <div class="mb-6 pb-4 border-b border-slate-100">
            <h2 class="font-serif-diplomatic text-2xl font-bold text-[#002654]">Send an Official Enquiry</h2>
            <p class="text-xs text-slate-500 mt-1">Direct message to the Bilateral Councils Secretariat at The Ceylon Chamber of Commerce.</p>
          </div>

          <form action="<?= url('/contact') ?>" method="POST" novalidate>
            <?= csrf_field() ?>

            <!-- Honeypot -->
            <div class="hidden" aria-hidden="true">
              <input type="text" name="company_url_hp" tabindex="-1" autocomplete="off">
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-5 mb-5">
              <div>
                <label for="name" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1">
                  Full Name <span class="text-red-600">*</span>
                </label>
                <input type="text" id="name" name="name" class="w-full py-2.5 px-3.5 text-sm bg-white border border-slate-300 rounded focus:ring-2 focus:ring-[#002654] focus:border-[#002654]" value="<?= e($formData['name'] ?? '') ?>" required>
              </div>

              <div>
                <label for="organization" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1">
                  Company / Organization
                </label>
                <input type="text" id="organization" name="organization" class="w-full py-2.5 px-3.5 text-sm bg-white border border-slate-300 rounded focus:ring-2 focus:ring-[#002654] focus:border-[#002654]" value="<?= e($formData['organization'] ?? '') ?>">
              </div>

              <div>
                <label for="email" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1">
                  Official Email Address <span class="text-red-600">*</span>
                </label>
                <input type="email" id="email" name="email" class="w-full py-2.5 px-3.5 text-sm bg-white border border-slate-300 rounded focus:ring-2 focus:ring-[#002654] focus:border-[#002654]" value="<?= e($formData['email'] ?? '') ?>" required>
              </div>

              <div>
                <label for="phone" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1">
                  Telephone / Mobile
                </label>
                <input type="text" id="phone" name="phone" class="w-full py-2.5 px-3.5 text-sm bg-white border border-slate-300 rounded focus:ring-2 focus:ring-[#002654] focus:border-[#002654]" value="<?= e($formData['phone'] ?? '') ?>">
              </div>

              <div class="sm:col-span-2">
                <label for="category" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1">
                  Inquiry Nature / Classification
                </label>
                <select id="category" name="category" class="w-full py-2.5 px-3.5 text-sm bg-white border border-slate-300 rounded focus:ring-2 focus:ring-[#002654] focus:border-[#002654]">
                  <option value="General Bilateral Inquiry" <?= (($formData['category'] ?? '') === 'General Bilateral Inquiry') ? 'selected' : '' ?>>General Bilateral Inquiry</option>
                  <option value="Membership & Application Inquiry" <?= (($formData['category'] ?? '') === 'Membership & Application Inquiry') ? 'selected' : '' ?>>Membership &amp; Application Inquiry</option>
                  <option value="Trade Mission & Delegation Inquiry" <?= (($formData['category'] ?? '') === 'Trade Mission & Delegation Inquiry') ? 'selected' : '' ?>>Trade Mission &amp; Delegation Inquiry</option>
                  <option value="Business Opportunity Inquiry" <?= (($formData['category'] ?? '') === 'Business Opportunity Inquiry') ? 'selected' : '' ?>>Business Opportunity Inquiry</option>
                  <option value="Event / Summit Sponsorship" <?= (($formData['category'] ?? '') === 'Event / Summit Sponsorship') ? 'selected' : '' ?>>Event / Summit Sponsorship</option>
                  <option value="Media / Editorial Inquiry" <?= (($formData['category'] ?? '') === 'Media / Editorial Inquiry') ? 'selected' : '' ?>>Media / Editorial Inquiry</option>
                </select>
              </div>

              <div class="sm:col-span-2">
                <label for="subject" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1">
                  Subject / Docket Heading <span class="text-red-600">*</span>
                </label>
                <input type="text" id="subject" name="subject" class="w-full py-2.5 px-3.5 text-sm bg-white border border-slate-300 rounded focus:ring-2 focus:ring-[#002654] focus:border-[#002654]" value="<?= e($formData['subject'] ?? '') ?>" required>
              </div>

              <div class="sm:col-span-2">
                <label for="message" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1">
                  Enquiry Particulars / Message <span class="text-red-600">*</span>
                </label>
                <textarea id="message" name="message" rows="5" class="w-full py-2.5 px-3.5 text-sm bg-white border border-slate-300 rounded focus:ring-2 focus:ring-[#002654] focus:border-[#002654]" required><?= e($formData['message'] ?? '') ?></textarea>
              </div>
            </div>

            <div class="flex items-center justify-end gap-3 pt-4 border-t border-slate-200">
              <button type="submit" class="px-8 py-3 bg-[#002654] hover:bg-[#001c3f] text-white font-bold text-xs uppercase tracking-wider rounded shadow transition-all cursor-pointer">
                Transmit Official Enquiry &rarr;
              </button>
            </div>
          </form>
        </div>
      </div>

    </div>
  </div>
</section>
