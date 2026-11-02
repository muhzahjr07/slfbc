<?php
/**
 * Admin Membership Applications Listing View
 * Sri Lanka–France Business Council
 */
?>
<div class="mb-6 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 border-b border-slate-100 pb-5">
  <div>
    <h1 class="text-2xl font-serif font-bold text-[#002654]">Membership Applications Queue</h1>
    <p class="text-xs text-slate-500 mt-1">Review applicant incorporation credentials, audited financial records, and committee ratification status.</p>
  </div>
  <div class="flex items-center gap-2">
    <a href="<?= url('/admin/applications') ?>" class="px-3 py-1.5 rounded text-xs font-bold uppercase tracking-wider <?= empty($currentStatus) ? 'bg-[#002654] text-white' : 'bg-slate-100 text-slate-700 hover:bg-slate-200' ?>">All</a>
    <a href="<?= url('/admin/applications?status=pending') ?>" class="px-3 py-1.5 rounded text-xs font-bold uppercase tracking-wider <?= ($currentStatus === 'pending') ? 'bg-amber-600 text-white' : 'bg-slate-100 text-slate-700 hover:bg-slate-200' ?>">Pending</a>
    <a href="<?= url('/admin/applications?status=approved') ?>" class="px-3 py-1.5 rounded text-xs font-bold uppercase tracking-wider <?= ($currentStatus === 'approved') ? 'bg-emerald-600 text-white' : 'bg-slate-100 text-slate-700 hover:bg-slate-200' ?>">Approved</a>
    <a href="<?= url('/admin/applications?status=rejected') ?>" class="px-3 py-1.5 rounded text-xs font-bold uppercase tracking-wider <?= ($currentStatus === 'rejected') ? 'bg-red-700 text-white' : 'bg-slate-100 text-slate-700 hover:bg-slate-200' ?>">Rejected</a>
  </div>
</div>

<div class="overflow-x-auto">
  <table class="w-full text-left text-sm">
    <thead>
      <tr class="text-xs font-bold uppercase tracking-wider text-slate-500 bg-slate-50 border-b border-slate-200">
        <th class="py-3 px-4">Tracking Reference</th>
        <th class="py-3 px-4">Applicant Company</th>
        <th class="py-3 px-4">Sector &amp; Corridor</th>
        <th class="py-3 px-4">Contact Executive</th>
        <th class="py-3 px-4 text-center">Status</th>
        <th class="py-3 px-4">Submitted</th>
        <th class="py-3 px-4 text-right">Action</th>
      </tr>
    </thead>
    <tbody class="divide-y divide-slate-100">
      <?php if (empty($applications)): ?>
        <tr>
          <td colspan="7" class="py-8 text-center text-slate-400 text-xs">No applications found under selected filter.</td>
        </tr>
      <?php else: ?>
        <?php foreach ($applications as $app): ?>
          <tr class="hover:bg-slate-50 transition-colors">
            <td class="py-3 px-4 font-mono font-semibold text-slate-700 text-xs">
              <?= e($app['reference_no']) ?>
            </td>
            <td class="py-3 px-4">
              <strong class="text-slate-800 block"><?= e($app['company_name']) ?></strong>
              <span class="text-slate-400 text-xs">Reg: <?= e($app['business_reg_no']) ?></span>
            </td>
            <td class="py-3 px-4 text-xs">
              <span class="text-slate-700 font-semibold block"><?= e($app['sector']) ?></span>
              <span class="text-slate-400"><?= e($app['primary_corridor']) ?></span>
            </td>
            <td class="py-3 px-4 text-xs">
              <span class="text-slate-700 block"><?= e($app['contact_person_name']) ?></span>
              <a href="mailto:<?= e($app['contact_person_email']) ?>" class="text-blue-600 hover:underline"><?= e($app['contact_person_email']) ?></a>
            </td>
            <td class="py-3 px-4 text-center">
              <?php if ($app['status'] === 'approved'): ?>
                <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-semibold bg-emerald-100 text-emerald-800">Approved</span>
              <?php elseif ($app['status'] === 'rejected'): ?>
                <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-semibold bg-red-100 text-red-800">Rejected</span>
              <?php else: ?>
                <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-semibold bg-amber-100 text-amber-800">Pending Review</span>
              <?php endif; ?>
            </td>
            <td class="py-3 px-4 text-xs text-slate-500">
              <?= date('M d, Y', strtotime($app['created_at'])) ?>
            </td>
            <td class="py-3 px-4 text-right">
              <a href="<?= url('/admin/applications/' . (int)$app['id']) ?>" class="px-3 py-1 bg-[#002654] hover:bg-[#001c3f] text-white rounded font-bold text-xs uppercase tracking-wider transition-colors">
                Review Dossier
              </a>
            </td>
          </tr>
        <?php endforeach; ?>
      <?php endif; ?>
    </tbody>
  </table>
</div>
