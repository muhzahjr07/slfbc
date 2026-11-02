<?php
/**
 * Admin Site Settings View
 * Sri Lanka–France Business Council
 */
?>
<div class="mb-6 flex items-center justify-between border-b border-slate-100 pb-4">
  <div>
    <h1 class="text-2xl font-serif font-bold text-[#002654]">Institutional Site Settings</h1>
    <p class="text-xs text-slate-500 mt-1">Configure verified Chamber contact points, active governance terms, and institutional metadata.</p>
  </div>
</div>

<form action="<?= url('/admin/settings') ?>" method="POST" class="space-y-6 max-w-4xl">
  <?= csrf_field() ?>

  <!-- Identity & Governance -->
  <div class="border border-slate-200 rounded-lg p-5 bg-white shadow-sm space-y-4">
    <h3 class="text-sm font-bold uppercase tracking-wider text-[#002654] border-b border-slate-100 pb-2">
      1. Institutional Brand &amp; Governance Term
    </h3>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
      <div>
        <label for="site_name" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1">Official Institutional Name</label>
        <input type="text" id="site_name" name="site_name" class="w-full text-sm rounded border-slate-300 focus:ring-[#002654] focus:border-[#002654]" value="<?= e($settings['site_name'] ?? 'Sri Lanka–France Business Council') ?>">
      </div>

      <div>
        <label for="current_exco_term" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1">Current Active Governance Term</label>
        <input type="text" id="current_exco_term" name="current_exco_term" class="w-full text-sm rounded border-slate-300 focus:ring-[#002654] focus:border-[#002654]" value="<?= e($settings['current_exco_term'] ?? '2025/26') ?>">
        <p class="text-[11px] text-slate-400 mt-1">Updates the active term displayed across governance pages and annual reports.</p>
      </div>
    </div>
  </div>

  <!-- Secretariat Contact Particulars -->
  <div class="border border-slate-200 rounded-lg p-5 bg-white shadow-sm space-y-4">
    <h3 class="text-sm font-bold uppercase tracking-wider text-[#002654] border-b border-slate-100 pb-2">
      2. Verified Secretariat Contact Points
    </h3>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
      <div class="md:col-span-2">
        <label for="secretariat_address" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1">Chamber Secretariat Postal Address</label>
        <textarea id="secretariat_address" name="secretariat_address" rows="2" class="w-full text-sm rounded border-slate-300 focus:ring-[#002654] focus:border-[#002654]"><?= e($settings['secretariat_address'] ?? "The Ceylon Chamber of Commerce, 50 Nawam Mawatha, Colombo 02, Sri Lanka.") ?></textarea>
      </div>

      <div>
        <label for="secretariat_phone" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1">Chamber Telephone / Switchboard</label>
        <input type="text" id="secretariat_phone" name="secretariat_phone" class="w-full text-sm rounded border-slate-300 focus:ring-[#002654] focus:border-[#002654]" value="<?= e($settings['secretariat_phone'] ?? '+94 11 558 8800') ?>">
      </div>

      <div>
        <label for="secretariat_email" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1">Official Secretariat Email</label>
        <input type="email" id="secretariat_email" name="secretariat_email" class="w-full text-sm rounded border-slate-300 focus:ring-[#002654] focus:border-[#002654]" value="<?= e($settings['secretariat_email'] ?? 'info@chamber.lk') ?>">
      </div>
    </div>
  </div>

  <!-- Fee & Public Notices -->
  <div class="border border-slate-200 rounded-lg p-5 bg-white shadow-sm space-y-4">
    <h3 class="text-sm font-bold uppercase tracking-wider text-[#002654] border-b border-slate-100 pb-2">
      3. Editorial &amp; Membership Notices
    </h3>

    <div>
      <label for="membership_fee_note" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1">Membership Subscription Notice</label>
      <textarea id="membership_fee_note" name="membership_fee_note" rows="2" class="w-full text-sm rounded border-slate-300 focus:ring-[#002654] focus:border-[#002654]"><?= e($settings['membership_fee_note'] ?? 'Membership subscription fees are reviewed annually by the Executive Committee in accordance with Chamber regulations.') ?></textarea>
    </div>
  </div>

  <div class="flex items-center justify-end gap-3 pt-4">
    <button type="submit" class="px-6 py-2.5 bg-[#002654] hover:bg-[#001c3f] text-white rounded text-xs font-bold uppercase tracking-wider shadow-sm">
      Save Institutional Settings
    </button>
  </div>
</form>
