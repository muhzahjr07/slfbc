<?php
/**
 * Admin Dashboard View
 * Sri Lanka–France Business Council
 */
?>
<div class="mb-8">
  <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 border-b border-slate-100 pb-5">
    <div>
      <h1 class="text-2xl font-serif font-bold text-[#002654]">Secretariat Overview</h1>
      <p class="text-xs text-slate-500 mt-1">Live metrics and pending administrative workflows under The Ceylon Chamber of Commerce.</p>
    </div>
    <div class="flex items-center gap-2">
      <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-semibold bg-emerald-100 text-emerald-800">
        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 mr-1.5 animate-pulse"></span> System Operational
      </span>
    </div>
  </div>
</div>

<!-- Metrics Cards -->
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-4 mb-8">
  <!-- Active Members -->
  <div class="bg-slate-50 p-5 rounded-lg border border-slate-200">
    <div class="flex items-center justify-between mb-2">
      <span class="text-xs font-bold uppercase tracking-wider text-slate-500">Active Members</span>
      <span class="material-symbols-outlined text-[#002654] text-xl">corporate_fare</span>
    </div>
    <div class="text-3xl font-serif font-bold text-[#002654]"><?= (int)$metrics['total_members'] ?></div>
    <div class="mt-2 text-xs text-slate-500">Verified directory profiles</div>
  </div>

  <!-- Published News -->
  <div class="bg-slate-50 p-5 rounded-lg border border-slate-200">
    <div class="flex items-center justify-between mb-2">
      <span class="text-xs font-bold uppercase tracking-wider text-slate-500">News Dispatches</span>
      <span class="material-symbols-outlined text-blue-700 text-xl">article</span>
    </div>
    <div class="text-3xl font-serif font-bold text-slate-800"><?= (int)$metrics['published_news'] ?></div>
    <div class="mt-2 text-xs text-slate-500">Published communiqués</div>
  </div>

  <!-- Upcoming Events -->
  <div class="bg-slate-50 p-5 rounded-lg border border-slate-200">
    <div class="flex items-center justify-between mb-2">
      <span class="text-xs font-bold uppercase tracking-wider text-slate-500">Upcoming Summits</span>
      <span class="material-symbols-outlined text-amber-600 text-xl">event</span>
    </div>
    <div class="text-3xl font-serif font-bold text-slate-800"><?= (int)$metrics['upcoming_events'] ?></div>
    <div class="mt-2 text-xs text-slate-500">Scheduled gatherings</div>
  </div>

  <!-- Pending Applications -->
  <div class="bg-amber-50/60 p-5 rounded-lg border border-amber-200">
    <div class="flex items-center justify-between mb-2">
      <span class="text-xs font-bold uppercase tracking-wider text-amber-800">Pending Review</span>
      <span class="material-symbols-outlined text-amber-700 text-xl">assignment_turned_in</span>
    </div>
    <div class="text-3xl font-serif font-bold text-amber-900"><?= (int)$metrics['pending_applications'] ?></div>
    <div class="mt-2 text-xs text-amber-700 font-semibold">
      <a href="<?= url('/admin/applications') ?>" class="underline hover:text-amber-900">Review submissions &rarr;</a>
    </div>
  </div>

  <!-- Unread Enquiries -->
  <div class="bg-red-50/60 p-5 rounded-lg border border-red-200">
    <div class="flex items-center justify-between mb-2">
      <span class="text-xs font-bold uppercase tracking-wider text-red-800">New Enquiries</span>
      <span class="material-symbols-outlined text-red-700 text-xl">mark_email_unread</span>
    </div>
    <div class="text-3xl font-serif font-bold text-red-900"><?= (int)$metrics['unread_enquiries'] ?></div>
    <div class="mt-2 text-xs text-red-700 font-semibold">
      <a href="<?= url('/admin/enquiries') ?>" class="underline hover:text-red-900">View inbox &rarr;</a>
    </div>
  </div>
</div>

<!-- Two Column Tables: Pending Applications & New Enquiries -->
<div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
  <!-- Applications -->
  <div class="bg-white rounded-lg border border-slate-200 p-5 shadow-sm">
    <div class="flex items-center justify-between mb-4 border-b border-slate-100 pb-3">
      <h2 class="text-base font-bold text-[#002654] flex items-center gap-2">
        <span class="material-symbols-outlined text-amber-600 text-lg">pending_actions</span>
        Pending Membership Submissions
      </h2>
      <a href="<?= url('/admin/applications') ?>" class="text-xs font-bold text-[#002654] hover:underline">View All &rarr;</a>
    </div>

    <?php if (empty($recentApplications)): ?>
      <div class="text-center py-8 text-slate-400 text-xs">
        No pending applications awaiting Secretariat verification.
      </div>
    <?php else: ?>
      <div class="overflow-x-auto">
        <table class="w-full text-left text-xs">
          <thead>
            <tr class="text-slate-400 border-b border-slate-100 uppercase tracking-wider font-semibold">
              <th class="pb-2">Reference</th>
              <th class="pb-2">Company</th>
              <th class="pb-2">Sector</th>
              <th class="pb-2 text-right">Action</th>
            </tr>
          </thead>
          <tbody class="divide-y divide-slate-100">
            <?php foreach ($recentApplications as $app): ?>
              <tr>
                <td class="py-2.5 font-mono text-slate-600 font-semibold"><?= e($app['reference_no']) ?></td>
                <td class="py-2.5 font-semibold text-slate-800"><?= e($app['company_name']) ?></td>
                <td class="py-2.5 text-slate-500"><?= e($app['sector']) ?></td>
                <td class="py-2.5 text-right">
                  <a href="<?= url('/admin/applications/' . (int)$app['id']) ?>" class="px-2.5 py-1 bg-[#002654] text-white rounded font-bold hover:bg-[#001c3f] transition-colors">
                    Review
                  </a>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    <?php endif; ?>
  </div>

  <!-- Enquiries -->
  <div class="bg-white rounded-lg border border-slate-200 p-5 shadow-sm">
    <div class="flex items-center justify-between mb-4 border-b border-slate-100 pb-3">
      <h2 class="text-base font-bold text-[#002654] flex items-center gap-2">
        <span class="material-symbols-outlined text-red-600 text-lg">mail</span>
        Recent Chamber Enquiries
      </h2>
      <a href="<?= url('/admin/enquiries') ?>" class="text-xs font-bold text-[#002654] hover:underline">View All &rarr;</a>
    </div>

    <?php if (empty($recentEnquiries)): ?>
      <div class="text-center py-8 text-slate-400 text-xs">
        No unread contact form enquiries in the inbox.
      </div>
    <?php else: ?>
      <div class="overflow-x-auto">
        <table class="w-full text-left text-xs">
          <thead>
            <tr class="text-slate-400 border-b border-slate-100 uppercase tracking-wider font-semibold">
              <th class="pb-2">Sender</th>
              <th class="pb-2">Category</th>
              <th class="pb-2">Received</th>
              <th class="pb-2 text-right">Action</th>
            </tr>
          </thead>
          <tbody class="divide-y divide-slate-100">
            <?php foreach ($recentEnquiries as $enq): ?>
              <tr>
                <td class="py-2.5">
                  <strong class="text-slate-800 block"><?= e($enq['name']) ?></strong>
                  <span class="text-slate-400 text-[11px]"><?= e($enq['company'] ?? 'Individual') ?></span>
                </td>
                <td class="py-2.5 text-slate-600"><?= e($enq['subject_category']) ?></td>
                <td class="py-2.5 text-slate-400"><?= date('M d', strtotime($enq['created_at'])) ?></td>
                <td class="py-2.5 text-right">
                  <a href="<?= url('/admin/enquiries/' . (int)$enq['id']) ?>" class="px-2.5 py-1 bg-slate-100 text-slate-700 hover:bg-slate-200 rounded font-bold transition-colors">
                    View
                  </a>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    <?php endif; ?>
  </div>
</div>
