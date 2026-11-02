<?php
/**
 * Admin Enquiries Listing View
 * Sri Lanka–France Business Council
 */
?>
<div class="mb-6 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 border-b border-slate-100 pb-5">
  <div>
    <h1 class="text-2xl font-serif font-bold text-[#002654]">Secretariat Enquiries Inbox</h1>
    <p class="text-xs text-slate-500 mt-1">Direct communications, diplomatic queries, event RSVPs, and bilateral business assistance requests.</p>
  </div>
  <div class="flex items-center gap-2">
    <a href="<?= url('/admin/enquiries') ?>" class="px-3 py-1.5 rounded text-xs font-bold uppercase tracking-wider <?= empty($currentStatus) ? 'bg-[#002654] text-white' : 'bg-slate-100 text-slate-700 hover:bg-slate-200' ?>">All</a>
    <a href="<?= url('/admin/enquiries?status=new') ?>" class="px-3 py-1.5 rounded text-xs font-bold uppercase tracking-wider <?= ($currentStatus === 'new') ? 'bg-red-700 text-white' : 'bg-slate-100 text-slate-700 hover:bg-slate-200' ?>">Unread / New</a>
    <a href="<?= url('/admin/enquiries?status=in_progress') ?>" class="px-3 py-1.5 rounded text-xs font-bold uppercase tracking-wider <?= ($currentStatus === 'in_progress') ? 'bg-blue-700 text-white' : 'bg-slate-100 text-slate-700 hover:bg-slate-200' ?>">In Progress</a>
    <a href="<?= url('/admin/enquiries?status=resolved') ?>" class="px-3 py-1.5 rounded text-xs font-bold uppercase tracking-wider <?= ($currentStatus === 'resolved') ? 'bg-emerald-600 text-white' : 'bg-slate-100 text-slate-700 hover:bg-slate-200' ?>">Resolved</a>
  </div>
</div>

<div class="overflow-x-auto">
  <table class="w-full text-left text-sm">
    <thead>
      <tr class="text-xs font-bold uppercase tracking-wider text-slate-500 bg-slate-50 border-b border-slate-200">
        <th class="py-3 px-4">Sender &amp; Organization</th>
        <th class="py-3 px-4">Category</th>
        <th class="py-3 px-4">Message Snippet</th>
        <th class="py-3 px-4 text-center">Status</th>
        <th class="py-3 px-4">Received</th>
        <th class="py-3 px-4 text-right">Action</th>
      </tr>
    </thead>
    <tbody class="divide-y divide-slate-100">
      <?php if (empty($enquiries)): ?>
        <tr>
          <td colspan="6" class="py-8 text-center text-slate-400 text-xs">No enquiries found under selected filter.</td>
        </tr>
      <?php else: ?>
        <?php foreach ($enquiries as $enq): ?>
          <tr class="hover:bg-slate-50 transition-colors <?= empty($enq['is_read']) ? 'bg-amber-50/40 font-semibold' : '' ?>">
            <td class="py-3 px-4">
              <strong class="text-slate-800 block"><?= e($enq['name']) ?></strong>
              <span class="text-slate-400 text-xs"><?= e($enq['company'] ?? 'Individual') ?></span>
            </td>
            <td class="py-3 px-4 text-xs text-slate-600">
              <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-semibold bg-slate-100 text-slate-700">
                <?= e($enq['subject_category']) ?>
              </span>
            </td>
            <td class="py-3 px-4 text-xs text-slate-500 max-w-xs truncate">
              <?= e(mb_strimwidth($enq['message'], 0, 70, '...')) ?>
            </td>
            <td class="py-3 px-4 text-center">
              <?php if (empty($enq['is_read'])): ?>
                <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-bold bg-red-100 text-red-800">New</span>
              <?php elseif ($enq['status'] === 'resolved'): ?>
                <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-bold bg-emerald-100 text-emerald-800">Resolved</span>
              <?php else: ?>
                <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-bold bg-blue-100 text-blue-800">In Progress</span>
              <?php endif; ?>
            </td>
            <td class="py-3 px-4 text-xs text-slate-400">
              <?= date('M d, Y', strtotime($enq['created_at'])) ?>
            </td>
            <td class="py-3 px-4 text-right">
              <a href="<?= url('/admin/enquiries/' . (int)$enq['id']) ?>" class="px-3 py-1 bg-slate-100 hover:bg-[#002654] hover:text-white text-slate-700 rounded font-bold text-xs uppercase tracking-wider transition-colors">
                View
              </a>
            </td>
          </tr>
        <?php endforeach; ?>
      <?php endif; ?>
    </tbody>
  </table>
</div>
