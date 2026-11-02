<?php
/**
 * Membership Application Success Confirmation View
 * Sri Lanka–France Business Council (SLFBC)
 */
?>
<!-- BREADCRUMBS & HERO -->
<section class="w-full bg-slate-50 border-b border-slate-200 py-10">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-12">
    <ul class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?= url('/') ?>">Home</a></li>
      <li class="breadcrumb-item"><a href="<?= url('/membership') ?>">Membership</a></li>
      <li class="breadcrumb-item text-slate-800 font-semibold">Application Received</li>
    </ul>

    <div class="inline-flex items-center gap-2 mb-2">
      <span class="w-2.5 h-2.5 bg-emerald-600 inline-block"></span>
      <span class="text-xs font-bold uppercase tracking-widest text-emerald-700">Submission Confirmed</span>
    </div>
    <h1 class="font-serif-diplomatic text-3xl sm:text-4xl lg:text-5xl text-[#0b1e3b] font-bold tracking-tight">
      Application Successfully Lodged
    </h1>
    <p class="font-sans text-base sm:text-lg text-slate-600 max-w-3xl mt-4 leading-relaxed">
      Thank you for submitting your enterprise credentials to the Sri Lanka–France Business Council at The Ceylon Chamber of Commerce.
    </p>
  </div>
</section>

<!-- MAIN RECEIPT SECTION -->
<section class="w-full bg-white py-16 border-b border-slate-200">
  <div class="max-w-2xl mx-auto px-4 sm:px-6">
    <div class="bg-white border border-slate-200 rounded-xl shadow-sm p-8 sm:p-10 text-center">
      <div class="w-16 h-16 rounded-full bg-emerald-100 text-emerald-700 flex items-center justify-center mx-auto mb-5 shadow-sm">
        <span class="material-symbols-outlined text-3xl font-bold">verified</span>
      </div>

      <h2 class="font-serif-diplomatic text-2xl font-bold text-[#002654] mb-2">Formal Secretariat Receipt</h2>
      <p class="text-xs sm:text-sm text-slate-500 mb-6">
        Your corporate application has been registered with The Ceylon Chamber of Commerce and assigned a tracking reference:
      </p>

      <div class="bg-slate-50 border-2 border-dashed border-slate-300 rounded-lg p-5 mb-8">
        <span class="text-xs uppercase tracking-widest text-slate-400 font-bold block mb-1">Tracking Reference Number</span>
        <span class="font-mono text-2xl font-bold text-[#002654] tracking-wider block">
          <?= e($app['reference_no'] ?? '') ?>
        </span>
      </div>

      <div class="text-left bg-slate-50 border border-slate-200 rounded-lg p-6 mb-8 text-xs sm:text-sm">
        <h4 class="font-bold text-[#002654] uppercase tracking-wider text-xs mb-3 border-b border-slate-200 pb-2">What Happens Next</h4>
        <ol class="space-y-3 pl-4 list-decimal text-slate-700 m-0 leading-relaxed">
          <li><strong>Document Verification:</strong> The Chamber Secretariat will review your uploaded incorporation documents and financial records within 5–7 working days.</li>
          <li><strong>Proposer Validation:</strong> Our Secretariat team will reach out to your nominated member recommenders.</li>
          <li><strong>Committee Sitting:</strong> Validated files will be presented for ratification at the subsequent monthly Executive Committee meeting.</li>
          <li><strong>Formal Notification:</strong> You will be notified via email at <code class="bg-slate-200 px-1 py-0.5 rounded font-mono text-xs"><?= e($app['contact_email'] ?? '') ?></code> with invoice instructions and next steps.</li>
        </ol>
      </div>

      <div class="flex flex-wrap items-center justify-center gap-4">
        <a href="<?= url('/') ?>" class="px-6 py-3 bg-[#002654] hover:bg-[#001c3f] text-white font-bold text-xs uppercase tracking-wider rounded transition-all shadow-sm">
          Return to Homepage
        </a>
        <a href="<?= url('/contact') ?>" class="px-6 py-3 border border-slate-300 hover:bg-slate-100 text-slate-700 font-bold text-xs uppercase tracking-wider rounded transition-all">
          Contact Secretariat
        </a>
      </div>
    </div>
  </div>
</section>
