<?php
/**
 * Admin Enquiry Detail View
 * Sri Lanka–France Business Council
 */
?>
<div class="mb-6 flex items-center justify-between border-b border-slate-100 pb-4">
  <div>
    <h1 class="text-2xl font-serif font-bold text-[#002654]">Enquiry from <?= e($enquiry['name']) ?></h1>
    <p class="text-xs text-slate-500 mt-1">Received <?= date('F d, Y \a\t h:i A', strtotime($enquiry['created_at'])) ?> &bull; IP: <?= e($enquiry['ip_address'] ?? 'N/A') ?></p>
  </div>
  <a href="<?= url('/admin/enquiries') ?>" class="text-xs font-bold text-slate-500 hover:text-slate-800 flex items-center gap-1">
    <span class="material-symbols-outlined text-sm">arrow_back</span> Back to Inbox
  </a>
</div>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
  <div class="lg:col-span-2 space-y-6">
    <!-- Sender Metadata -->
    <div class="border border-slate-200 rounded-lg p-5 bg-white shadow-sm">
      <h3 class="text-sm font-bold uppercase tracking-wider text-[#002654] border-b border-slate-100 pb-2 mb-4">
        Sender Particulars
      </h3>

      <dl class="grid grid-cols-1 sm:grid-cols-2 gap-x-4 gap-y-3 text-xs">
        <div>
          <dt class="text-slate-400 font-semibold uppercase">Sender Name</dt>
          <dd class="text-slate-800 font-bold text-sm mt-0.5"><?= e($enquiry['name']) ?></dd>
        </div>
        <div>
          <dt class="text-slate-400 font-semibold uppercase">Organization / Institution</dt>
          <dd class="text-slate-800 font-semibold mt-0.5"><?= e($enquiry['company'] ?: 'Individual / Private') ?></dd>
        </div>
        <div>
          <dt class="text-slate-400 font-semibold uppercase">Email Address</dt>
          <dd class="text-slate-800 mt-0.5"><a href="mailto:<?= e($enquiry['email']) ?>" class="text-blue-600 hover:underline"><?= e($enquiry['email']) ?></a></dd>
        </div>
        <div>
          <dt class="text-slate-400 font-semibold uppercase">Phone / Switchboard</dt>
          <dd class="text-slate-800 mt-0.5"><?= e($enquiry['phone'] ?: 'Not Provided') ?></dd>
        </div>
        <div class="sm:col-span-2">
          <dt class="text-slate-400 font-semibold uppercase">Enquiry Classification</dt>
          <dd class="text-slate-800 font-bold mt-0.5">
            <span class="inline-flex items-center px-2.5 py-0.5 rounded text-xs font-semibold bg-blue-50 text-blue-800 border border-blue-200">
              <?= e($enquiry['subject_category']) ?>
            </span>
          </dd>
        </div>
      </dl>
    </div>

    <!-- Message Body -->
    <div class="border border-slate-200 rounded-lg p-5 bg-white shadow-sm">
      <h3 class="text-sm font-bold uppercase tracking-wider text-[#002654] border-b border-slate-100 pb-2 mb-4">
        Transmitted Message
      </h3>
      <div class="text-sm text-slate-800 leading-relaxed bg-slate-50 p-4 rounded border border-slate-100">
        <?= nl2br(e($enquiry['message'])) ?>
      </div>
    </div>
  </div>

  <!-- Status & Notes -->
  <div>
    <div class="border border-slate-200 rounded-lg p-5 bg-white shadow-sm sticky top-24">
      <h3 class="text-sm font-bold uppercase tracking-wider text-[#002654] border-b border-slate-100 pb-2 mb-4">
        Follow-up Action
      </h3>

      <form action="<?= url('/admin/enquiries/' . (int)$enquiry['id'] . '/status') ?>" method="POST" class="space-y-4">
        <?= csrf_field() ?>

        <div>
          <label for="status" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1">Follow-up Status</label>
          <select id="status" name="status" class="w-full text-sm rounded border-slate-300 focus:ring-[#002654] focus:border-[#002654]">
            <option value="new" <?= ($enquiry['status'] === 'new') ? 'selected' : '' ?>>New / Unprocessed</option>
            <option value="in_progress" <?= ($enquiry['status'] === 'in_progress') ? 'selected' : '' ?>>Assigned / In Progress</option>
            <option value="resolved" <?= ($enquiry['status'] === 'resolved') ? 'selected' : '' ?>>Resolved / Replied</option>
            <option value="archived" <?= ($enquiry['status'] === 'archived') ? 'selected' : '' ?>>Archived</option>
          </select>
        </div>

        <div>
          <label for="internal_notes" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1">Internal Chamber Notes</label>
          <textarea id="internal_notes" name="internal_notes" rows="4" class="w-full text-sm rounded border-slate-300 focus:ring-[#002654] focus:border-[#002654]" placeholder="Note officer assigned, response dispatch date, or meeting arrangements..."><?= e($enquiry['internal_notes'] ?? '') ?></textarea>
        </div>

        <button type="submit" class="w-full py-2.5 bg-[#002654] hover:bg-[#001c3f] text-white rounded font-bold text-xs uppercase tracking-wider transition-colors shadow-sm">
          Update Follow-up Status
        </button>

        <div class="pt-2">
          <a href="mailto:<?= e($enquiry['email']) ?>?subject=<?= urlencode('Re: ' . $enquiry['subject_category'] . ' - Sri Lanka-France Business Council') ?>" class="w-full py-2 border border-slate-300 hover:bg-slate-50 text-slate-700 rounded font-bold text-xs uppercase tracking-wider transition-colors flex items-center justify-center gap-1.5">
            <span class="material-symbols-outlined text-sm">reply</span> Reply via Email Client
          </a>
        </div>
      </form>
    </div>
  </div>
</div>
