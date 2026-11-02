<?php
/**
 * Membership Application Form View
 * Sri Lanka–France Business Council (SLFBC)
 */
?>
<!-- BREADCRUMBS & HERO -->
<section class="w-full bg-slate-50 border-b border-slate-200 py-10">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-12">
    <ul class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?= url('/') ?>">Home</a></li>
      <li class="breadcrumb-item"><a href="<?= url('/membership') ?>">Membership</a></li>
      <li class="breadcrumb-item text-slate-800 font-semibold">Apply for Council Membership</li>
    </ul>

    <div class="inline-flex items-center gap-2 mb-2">
      <span class="w-2.5 h-2.5 bg-[#b91c1c] inline-block"></span>
      <span class="text-xs font-bold uppercase tracking-widest text-[#b91c1c]">Official Application Portal</span>
    </div>
    <h1 class="font-serif-diplomatic text-3xl sm:text-4xl lg:text-5xl text-[#0b1e3b] font-bold tracking-tight">
      Apply for Council Membership
    </h1>
    <p class="font-sans text-base sm:text-lg text-slate-600 max-w-3xl mt-4 leading-relaxed">
      Submit your enterprise credentials to the Secretariat of The Ceylon Chamber of Commerce for due diligence review and ratification by the SLFBC Executive Committee.
    </p>
  </div>
</section>

<!-- MAIN FORM CONTENT -->
<section class="w-full bg-white py-14 border-b border-slate-200">
  <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
    
    <?php if (!empty($errors)): ?>
      <div class="mb-8 p-5 bg-red-50 border-l-4 border-[#b91c1c] rounded-r-lg text-red-900 shadow-sm">
        <div class="flex items-center gap-2 mb-2 font-bold text-sm">
          <span class="material-symbols-outlined text-lg text-[#b91c1c]">error</span>
          <span>Please address the following requirements before proceeding:</span>
        </div>
        <ul class="list-disc list-inside text-xs space-y-1 text-red-800 m-0 pl-1">
          <?php foreach ($errors as $field => $err): ?>
            <li><?= e($err) ?></li>
          <?php endforeach; ?>
        </ul>
      </div>
    <?php endif; ?>

    <div class="bg-white border border-slate-200 rounded-xl shadow-sm p-6 sm:p-10">
      <form action="<?= url('/membership/apply') ?>" method="POST" enctype="multipart/form-data" novalidate>
        <?= csrf_field() ?>
        
        <!-- Honeypot -->
        <div class="hidden" aria-hidden="true">
          <input type="text" name="website_hp" tabindex="-1" autocomplete="off">
        </div>

        <!-- Section 1: Corporate Identity -->
        <div class="mb-10 pb-8 border-b border-slate-200">
          <div class="flex items-center gap-3 mb-6">
            <span class="w-8 h-8 rounded-full bg-[#002654] text-white flex items-center justify-center font-bold text-xs">1</span>
            <h3 class="font-serif-diplomatic text-xl font-bold text-[#002654] m-0">Corporate &amp; Registration Particulars</h3>
          </div>

          <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
            <div class="sm:col-span-2">
              <label for="company_name" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1">
                Full Legal Entity / Corporate Name <span class="text-red-600">*</span>
              </label>
              <input type="text" id="company_name" name="company_name" class="w-full py-2.5 px-3.5 text-sm bg-white border border-slate-300 rounded focus:ring-2 focus:ring-[#002654] focus:border-[#002654]" value="<?= e($formData['company_name'] ?? '') ?>" required>
            </div>

            <div>
              <label for="business_reg_no" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1">
                Business Registration No. (PV/PB/RCS/Kbis) <span class="text-red-600">*</span>
              </label>
              <input type="text" id="business_reg_no" name="business_reg_no" class="w-full py-2.5 px-3.5 text-sm bg-white border border-slate-300 rounded focus:ring-2 focus:ring-[#002654] focus:border-[#002654]" value="<?= e($formData['business_reg_no'] ?? '') ?>" required>
            </div>

            <div>
              <label for="year_established" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1">
                Year Established
              </label>
              <input type="number" id="year_established" name="year_established" class="w-full py-2.5 px-3.5 text-sm bg-white border border-slate-300 rounded focus:ring-2 focus:ring-[#002654] focus:border-[#002654]" placeholder="e.g. 1998" min="1800" max="<?= date('Y') ?>" value="<?= e($formData['year_established'] ?? '') ?>">
            </div>

            <div>
              <label for="sector" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1">
                Primary Business Sector <span class="text-red-600">*</span>
              </label>
              <select id="sector" name="sector" class="w-full py-2.5 px-3.5 text-sm bg-white border border-slate-300 rounded focus:ring-2 focus:ring-[#002654] focus:border-[#002654]" required>
                <option value="">-- Select Industry Sector --</option>
                <?php foreach ($sectors as $sec): ?>
                  <option value="<?= e($sec['name']) ?>" <?= ($formData['sector'] ?? '') === $sec['name'] ? 'selected' : '' ?>>
                    <?= e($sec['name']) ?>
                  </option>
                <?php endforeach; ?>
              </select>
            </div>

            <div>
              <label for="origin" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1">
                Jurisdiction of Incorporation <span class="text-red-600">*</span>
              </label>
              <select id="origin" name="origin" class="w-full py-2.5 px-3.5 text-sm bg-white border border-slate-300 rounded focus:ring-2 focus:ring-[#002654] focus:border-[#002654]" required>
                <option value="Sri Lanka" <?= ($formData['origin'] ?? '') === 'Sri Lanka' ? 'selected' : '' ?>>Sri Lanka</option>
                <option value="France" <?= ($formData['origin'] ?? '') === 'France' ? 'selected' : '' ?>>France</option>
                <option value="Bilateral Joint Venture" <?= ($formData['origin'] ?? '') === 'Bilateral Joint Venture' ? 'selected' : '' ?>>Bilateral Joint Venture</option>
                <option value="Multinational / Regional" <?= ($formData['origin'] ?? '') === 'Multinational / Regional' ? 'selected' : '' ?>>Multinational / Regional</option>
              </select>
            </div>

            <div>
              <label for="primary_corridor" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1">
                Primary Bilateral Commercial Corridor <span class="text-red-600">*</span>
              </label>
              <select id="primary_corridor" name="primary_corridor" class="w-full py-2.5 px-3.5 text-sm bg-white border border-slate-300 rounded focus:ring-2 focus:ring-[#002654] focus:border-[#002654]" required>
                <option value="Export to France" <?= ($formData['primary_corridor'] ?? '') === 'Export to France' ? 'selected' : '' ?>>Exporting Sri Lankan Products/Services to France</option>
                <option value="Import from France" <?= ($formData['primary_corridor'] ?? '') === 'Import from France' ? 'selected' : '' ?>>Importing French Goods/Technology to Sri Lanka</option>
                <option value="Investment & JVs" <?= ($formData['primary_corridor'] ?? '') === 'Investment & JVs' ? 'selected' : '' ?>>Bilateral Direct Investment &amp; Joint Ventures</option>
                <option value="Services & Technology" <?= ($formData['primary_corridor'] ?? '') === 'Services & Technology' ? 'selected' : '' ?>>Professional Services / Maritime / Logistics / Hospitality</option>
              </select>
            </div>

            <div>
              <label for="membership_tier_requested" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1">
                Membership Classification Requested <span class="text-red-600">*</span>
              </label>
              <select id="membership_tier_requested" name="membership_tier_requested" class="w-full py-2.5 px-3.5 text-sm bg-white border border-slate-300 rounded focus:ring-2 focus:ring-[#002654] focus:border-[#002654]" required>
                <option value="Corporate" <?= ($formData['membership_tier_requested'] ?? '') === 'Corporate' ? 'selected' : '' ?>>Corporate Member</option>
                <option value="Associate" <?= ($formData['membership_tier_requested'] ?? '') === 'Associate' ? 'selected' : '' ?>>Associate Member</option>
                <option value="Patron" <?= ($formData['membership_tier_requested'] ?? '') === 'Patron' ? 'selected' : '' ?>>Patron Member (Subject to Committee Invitation)</option>
              </select>
            </div>

            <div>
              <label for="corporate_email" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1">
                Official Corporate Email <span class="text-red-600">*</span>
              </label>
              <input type="email" id="corporate_email" name="corporate_email" class="w-full py-2.5 px-3.5 text-sm bg-white border border-slate-300 rounded focus:ring-2 focus:ring-[#002654] focus:border-[#002654]" value="<?= e($formData['corporate_email'] ?? '') ?>" required>
            </div>

            <div>
              <label for="phone" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1">
                Corporate Switchboard / Telephone <span class="text-red-600">*</span>
              </label>
              <input type="text" id="phone" name="phone" class="w-full py-2.5 px-3.5 text-sm bg-white border border-slate-300 rounded focus:ring-2 focus:ring-[#002654] focus:border-[#002654]" placeholder="+94 11 2xxxxxx" value="<?= e($formData['phone'] ?? '') ?>" required>
            </div>

            <div class="sm:col-span-2">
              <label for="website" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1">
                Corporate Website URL
              </label>
              <input type="url" id="website" name="website" class="w-full py-2.5 px-3.5 text-sm bg-white border border-slate-300 rounded focus:ring-2 focus:ring-[#002654] focus:border-[#002654]" placeholder="https://www.example.com" value="<?= e($formData['website'] ?? '') ?>">
            </div>

            <div class="sm:col-span-2">
              <label for="registered_address" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1">
                Registered Head Office Address <span class="text-red-600">*</span>
              </label>
              <textarea id="registered_address" name="registered_address" class="w-full py-2.5 px-3.5 text-sm bg-white border border-slate-300 rounded focus:ring-2 focus:ring-[#002654] focus:border-[#002654]" rows="2" required><?= e($formData['registered_address'] ?? '') ?></textarea>
            </div>
          </div>
        </div>

        <!-- Section 2: Designated Representative -->
        <div class="mb-10 pb-8 border-b border-slate-200">
          <div class="flex items-center gap-3 mb-6">
            <span class="w-8 h-8 rounded-full bg-[#002654] text-white flex items-center justify-center font-bold text-xs">2</span>
            <h3 class="font-serif-diplomatic text-xl font-bold text-[#002654] m-0">Principal Nominated Executive Representative</h3>
          </div>

          <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
            <div>
              <label for="contact_person_name" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1">
                Full Name <span class="text-red-600">*</span>
              </label>
              <input type="text" id="contact_person_name" name="contact_person_name" class="w-full py-2.5 px-3.5 text-sm bg-white border border-slate-300 rounded focus:ring-2 focus:ring-[#002654] focus:border-[#002654]" value="<?= e($formData['contact_person_name'] ?? '') ?>" required>
            </div>

            <div>
              <label for="contact_person_designation" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1">
                Designation / Corporate Title <span class="text-red-600">*</span>
              </label>
              <input type="text" id="contact_person_designation" name="contact_person_designation" class="w-full py-2.5 px-3.5 text-sm bg-white border border-slate-300 rounded focus:ring-2 focus:ring-[#002654] focus:border-[#002654]" placeholder="e.g. Managing Director / CEO" value="<?= e($formData['contact_person_designation'] ?? '') ?>" required>
            </div>

            <div>
              <label for="contact_person_email" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1">
                Direct Executive Email <span class="text-red-600">*</span>
              </label>
              <input type="email" id="contact_person_email" name="contact_person_email" class="w-full py-2.5 px-3.5 text-sm bg-white border border-slate-300 rounded focus:ring-2 focus:ring-[#002654] focus:border-[#002654]" value="<?= e($formData['contact_person_email'] ?? '') ?>" required>
            </div>

            <div>
              <label for="contact_person_phone" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1">
                Direct Mobile / Telephone <span class="text-red-600">*</span>
              </label>
              <input type="text" id="contact_person_phone" name="contact_person_phone" class="w-full py-2.5 px-3.5 text-sm bg-white border border-slate-300 rounded focus:ring-2 focus:ring-[#002654] focus:border-[#002654]" placeholder="+94 7x xxx xxxx" value="<?= e($formData['contact_person_phone'] ?? '') ?>" required>
            </div>
          </div>
        </div>

        <!-- Section 3: Proposers -->
        <div class="mb-10 pb-8 border-b border-slate-200">
          <div class="flex items-center gap-3 mb-2">
            <span class="w-8 h-8 rounded-full bg-[#002654] text-white flex items-center justify-center font-bold text-xs">3</span>
            <h3 class="font-serif-diplomatic text-xl font-bold text-[#002654] m-0">Council Proposers / References</h3>
          </div>
          <p class="text-xs text-slate-500 mb-6">
            Please nominate two active member companies of the Sri Lanka–France Business Council or Ceylon Chamber of Commerce who support your admission.
          </p>

          <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
            <div>
              <label for="recommender_1_name" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1">
                Proposer 1: Contact Person
              </label>
              <input type="text" id="recommender_1_name" name="recommender_1_name" class="w-full py-2.5 px-3.5 text-sm bg-white border border-slate-300 rounded focus:ring-2 focus:ring-[#002654] focus:border-[#002654]" value="<?= e($formData['recommender_1_name'] ?? '') ?>">
            </div>

            <div>
              <label for="recommender_1_company" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1">
                Proposer 1: Corporate Entity
              </label>
              <input type="text" id="recommender_1_company" name="recommender_1_company" class="w-full py-2.5 px-3.5 text-sm bg-white border border-slate-300 rounded focus:ring-2 focus:ring-[#002654] focus:border-[#002654]" value="<?= e($formData['recommender_1_company'] ?? '') ?>">
            </div>

            <div>
              <label for="recommender_2_name" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1">
                Proposer 2: Contact Person
              </label>
              <input type="text" id="recommender_2_name" name="recommender_2_name" class="w-full py-2.5 px-3.5 text-sm bg-white border border-slate-300 rounded focus:ring-2 focus:ring-[#002654] focus:border-[#002654]" value="<?= e($formData['recommender_2_name'] ?? '') ?>">
            </div>

            <div>
              <label for="recommender_2_company" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1">
                Proposer 2: Corporate Entity
              </label>
              <input type="text" id="recommender_2_company" name="recommender_2_company" class="w-full py-2.5 px-3.5 text-sm bg-white border border-slate-300 rounded focus:ring-2 focus:ring-[#002654] focus:border-[#002654]" value="<?= e($formData['recommender_2_company'] ?? '') ?>">
            </div>
          </div>
        </div>

        <!-- Section 4: Document Uploads -->
        <div class="mb-10 pb-8 border-b border-slate-200">
          <div class="flex items-center gap-3 mb-2">
            <span class="w-8 h-8 rounded-full bg-[#002654] text-white flex items-center justify-center font-bold text-xs">4</span>
            <h3 class="font-serif-diplomatic text-xl font-bold text-[#002654] m-0">Documentary Evidence Uploads</h3>
          </div>
          <p class="text-xs text-slate-500 mb-6">
            Accepted formats: PDF, DOC, DOCX, PNG, JPG. Maximum 10MB per document. Files are encrypted and accessible strictly to authorized Chamber Secretariat officers.
          </p>

          <div class="space-y-4">
            <div class="p-4 bg-slate-50 border border-slate-200 rounded-lg">
              <label for="doc_br" class="block text-xs font-bold text-[#002654] mb-1">
                1. Certificate of Business Registration / Incorporation <span class="text-red-600">*</span>
              </label>
              <input type="file" id="doc_br" name="doc_br" data-max-size="10" class="w-full py-2 px-3 text-xs bg-white border border-slate-300 rounded file:mr-4 file:py-1.5 file:px-3 file:rounded file:border-0 file:text-xs file:font-bold file:bg-[#002654] file:text-white hover:file:bg-[#001c3f]" accept=".pdf,.doc,.docx,.jpg,.jpeg,.png">
              <span class="block text-[11px] text-slate-500 mt-1">Copy of Form 1 / Form 20 or official Chamber of Commerce / Kbis extract.</span>
            </div>

            <div class="p-4 bg-slate-50 border border-slate-200 rounded-lg">
              <label for="doc_profile" class="block text-xs font-bold text-[#002654] mb-1">
                2. Corporate Profile / Bilateral Trade Overview
              </label>
              <input type="file" id="doc_profile" name="doc_profile" data-max-size="10" class="w-full py-2 px-3 text-xs bg-white border border-slate-300 rounded file:mr-4 file:py-1.5 file:px-3 file:rounded file:border-0 file:text-xs file:font-bold file:bg-[#002654] file:text-white hover:file:bg-[#001c3f]" accept=".pdf,.doc,.docx,.jpg,.jpeg,.png">
              <span class="block text-[11px] text-slate-500 mt-1">Summary of operational capabilities, French market nexus, and representative executive bios.</span>
            </div>

            <div class="p-4 bg-slate-50 border border-slate-200 rounded-lg">
              <label for="doc_accounts" class="block text-xs font-bold text-[#002654] mb-1">
                3. Audited Financial Statements (Preceding 2 Years)
              </label>
              <input type="file" id="doc_accounts" name="doc_accounts" data-max-size="10" class="w-full py-2 px-3 text-xs bg-white border border-slate-300 rounded file:mr-4 file:py-1.5 file:px-3 file:rounded file:border-0 file:text-xs file:font-bold file:bg-[#002654] file:text-white hover:file:bg-[#001c3f]" accept=".pdf,.doc,.docx,.jpg,.jpeg,.png">
              <span class="block text-[11px] text-slate-500 mt-1">Certified annual balance sheets and profit &amp; loss statements.</span>
            </div>
          </div>
        </div>

        <!-- Section 5: Legal Declaration -->
        <div class="mb-10 p-5 bg-blue-50/50 border border-blue-200 rounded-lg">
          <div class="flex items-start gap-3">
            <input type="checkbox" id="declaration" name="declaration" value="1" required class="mt-1 h-4 w-4 text-[#002654] focus:ring-[#002654] border-slate-300 rounded">
            <label for="declaration" class="text-xs text-slate-700 leading-relaxed m-0 cursor-pointer">
              I hereby certify on behalf of the applicant company that the particulars furnished above are true and complete. We agree to abide by the Constitution, By-laws, and Rules of the Sri Lanka–France Business Council under The Ceylon Chamber of Commerce upon ratification. We understand that this submission is subject to Secretariat due diligence and does not automatically guarantee membership.
            </label>
          </div>
        </div>

        <!-- Submission Buttons -->
        <div class="flex flex-col sm:flex-row items-center justify-end gap-3 pt-4 border-t border-slate-200">
          <a href="<?= url('/membership') ?>" class="w-full sm:w-auto text-center px-6 py-3 border border-slate-300 text-xs font-bold uppercase tracking-wider text-slate-700 hover:bg-slate-100 rounded transition-all">
            Cancel
          </a>
          <button type="submit" class="w-full sm:w-auto px-8 py-3 bg-[#b91c1c] hover:bg-[#991b1b] text-white font-bold text-xs uppercase tracking-wider rounded shadow transition-all cursor-pointer">
            Submit Application to Secretariat &rarr;
          </button>
        </div>
      </form>
    </div>

  </div>
</section>
