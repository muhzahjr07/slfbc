<?php
/**
 * Admin Membership Application Detail View
 * Sri Lanka–France Business Council
 */
?>
<div class="mb-6 flex items-center justify-between border-b border-slate-100 pb-4">
  <div>
    <div class="flex items-center gap-3">
      <h1 class="text-2xl font-serif font-bold text-[#002654]">Application Dossier: <?= e($app['company_name']) ?></h1>
      <span class="font-mono text-xs font-bold px-2 py-0.5 rounded bg-slate-100 text-slate-700 border border-slate-200">
        <?= e($app['reference_no']) ?>
      </span>
    </div>
    <p class="text-xs text-slate-500 mt-1">Submitted on <?= date('F d, Y \a\t h:i A', strtotime($app['created_at'])) ?> &bull; Logged in Chamber Registry</p>
  </div>
  <a href="<?= url('/admin/applications') ?>" class="text-xs font-bold text-slate-500 hover:text-slate-800 flex items-center gap-1">
    <span class="material-symbols-outlined text-sm">arrow_back</span> Back to Queue
  </a>
</div>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
  <!-- Left 2 Cols: Details & Documents -->
  <div class="lg:col-span-2 space-y-6">
    <!-- Corporate Profile -->
    <div class="border border-slate-200 rounded-lg p-5 bg-white shadow-sm">
      <h3 class="text-sm font-bold uppercase tracking-wider text-[#002654] border-b border-slate-100 pb-2 mb-4">
        1. Corporate &amp; Legal Particulars
      </h3>

      <dl class="grid grid-cols-1 sm:grid-cols-2 gap-x-4 gap-y-3 text-xs">
        <div>
          <dt class="text-slate-400 font-semibold uppercase">Legal Entity Name</dt>
          <dd class="text-slate-800 font-bold text-sm mt-0.5"><?= e($app['company_name']) ?></dd>
        </div>
        <div>
          <dt class="text-slate-400 font-semibold uppercase">Business Registration No.</dt>
          <dd class="text-slate-800 font-mono font-bold mt-0.5"><?= e($app['business_reg_no']) ?></dd>
        </div>
        <div>
          <dt class="text-slate-400 font-semibold uppercase">Primary Sector</dt>
          <dd class="text-slate-800 font-semibold mt-0.5"><?= e($app['sector']) ?></dd>
        </div>
        <div>
          <dt class="text-slate-400 font-semibold uppercase">Incorporation Origin</dt>
          <dd class="text-slate-800 font-semibold mt-0.5"><?= e($app['origin'] ?? 'Sri Lanka') ?></dd>
        </div>
        <div>
          <dt class="text-slate-400 font-semibold uppercase">Bilateral Commercial Corridor</dt>
          <dd class="text-slate-800 font-semibold mt-0.5"><?= e($app['primary_corridor']) ?></dd>
        </div>
        <div>
          <dt class="text-slate-400 font-semibold uppercase">Membership Tier Requested</dt>
          <dd class="text-slate-800 font-semibold mt-0.5"><?= e($app['membership_tier_requested'] ?? 'Corporate') ?></dd>
        </div>
        <div>
          <dt class="text-slate-400 font-semibold uppercase">Corporate Email</dt>
          <dd class="text-slate-800 mt-0.5"><a href="mailto:<?= e($app['corporate_email']) ?>" class="text-blue-600 hover:underline"><?= e($app['corporate_email']) ?></a></dd>
        </div>
        <div>
          <dt class="text-slate-400 font-semibold uppercase">Corporate Switchboard</dt>
          <dd class="text-slate-800 mt-0.5"><?= e($app['phone']) ?></dd>
        </div>
        <?php if (!empty($app['website'])): ?>
          <div class="sm:col-span-2">
            <dt class="text-slate-400 font-semibold uppercase">Corporate Website</dt>
            <dd class="text-slate-800 mt-0.5"><a href="<?= e($app['website']) ?>" target="_blank" rel="noopener noreferrer" class="text-blue-600 hover:underline"><?= e($app['website']) ?> &UpperRightArrow;</a></dd>
          </div>
        <?php endif; ?>
        <div class="sm:col-span-2">
          <dt class="text-slate-400 font-semibold uppercase">Registered Head Office Address</dt>
          <dd class="text-slate-700 mt-0.5 bg-slate-50 p-2.5 rounded border border-slate-100"><?= nl2br(e($app['registered_address'])) ?></dd>
        </div>
      </dl>
    </div>

    <!-- Contact Person & Recommenders -->
    <div class="border border-slate-200 rounded-lg p-5 bg-white shadow-sm">
      <h3 class="text-sm font-bold uppercase tracking-wider text-[#002654] border-b border-slate-100 pb-2 mb-4">
        2. Designated Representative &amp; Proposers
      </h3>

      <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 text-xs">
        <div>
          <h4 class="font-bold text-slate-700 uppercase mb-2">Executive Nominee</h4>
          <p class="font-bold text-slate-800 text-sm"><?= e($app['contact_person_name']) ?></p>
          <p class="text-slate-500"><?= e($app['contact_person_designation']) ?></p>
          <p class="mt-2"><a href="mailto:<?= e($app['contact_person_email']) ?>" class="text-blue-600 hover:underline"><?= e($app['contact_person_email']) ?></a></p>
          <p class="text-slate-600"><?= e($app['contact_person_phone']) ?></p>
        </div>

        <div>
          <h4 class="font-bold text-slate-700 uppercase mb-2">Council Recommenders</h4>
          <div class="space-y-2">
            <div class="bg-slate-50 p-2 rounded border border-slate-100">
              <span class="text-[11px] text-slate-400 block font-semibold">Proposer 1</span>
              <strong class="text-slate-800 block"><?= e($app['recommender_1_name'] ?: 'Not Specified') ?></strong>
              <span class="text-slate-500"><?= e($app['recommender_1_company'] ?: 'N/A') ?></span>
            </div>
            <div class="bg-slate-50 p-2 rounded border border-slate-100">
              <span class="text-[11px] text-slate-400 block font-semibold">Proposer 2</span>
              <strong class="text-slate-800 block"><?= e($app['recommender_2_name'] ?: 'Not Specified') ?></strong>
              <span class="text-slate-500"><?= e($app['recommender_2_company'] ?: 'N/A') ?></span>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Uploaded Documents -->
    <div class="border border-slate-200 rounded-lg p-5 bg-white shadow-sm">
      <h3 class="text-sm font-bold uppercase tracking-wider text-[#002654] border-b border-slate-100 pb-2 mb-4">
        3. Submitted Verification Documents
      </h3>

      <?php if (empty($documents)): ?>
        <p class="text-xs text-slate-400">No documentary files attached with this application submission.</p>
      <?php else: ?>
        <ul class="divide-y divide-slate-100 text-xs">
          <?php foreach ($documents as $doc): ?>
            <li class="py-3 flex items-center justify-between">
              <div class="flex items-center gap-3">
                <span class="material-symbols-outlined text-red-600 text-2xl">description</span>
                <div>
                  <strong class="text-slate-800 block text-xs"><?= e($doc['document_type']) ?></strong>
                  <span class="text-slate-400 text-[11px]">
                    <?= e($doc['original_name']) ?> &bull; <?= round($doc['file_size'] / 1024, 1) ?> KB &bull; <?= e($doc['mime_type']) ?>
                  </span>
                </div>
              </div>
              <a href="<?= url('/admin/applications/documents/' . (int)$doc['id']) ?>" class="px-3 py-1.5 bg-slate-100 hover:bg-[#002654] hover:text-white text-slate-700 font-bold rounded text-xs uppercase tracking-wider transition-colors flex items-center gap-1">
                <span class="material-symbols-outlined text-sm">download</span> Download
              </a>
            </li>
          <?php endforeach; ?>
        </ul>
      <?php endif; ?>
    </div>
  </div>

  <!-- Right 1 Col: Status & Decision Workflow -->
  <div>
    <div class="border border-slate-200 rounded-lg p-5 bg-white shadow-sm sticky top-24">
      <h3 class="text-sm font-bold uppercase tracking-wider text-[#002654] border-b border-slate-100 pb-2 mb-4">
        Secretariat Review &amp; Decision
      </h3>

      <div class="mb-4">
        <span class="text-xs font-semibold text-slate-400 uppercase block mb-1">Current Status</span>
        <?php if ($app['status'] === 'approved'): ?>
          <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold bg-emerald-100 text-emerald-800">
            Approved &amp; Ratified
          </span>
        <?php elseif ($app['status'] === 'rejected'): ?>
          <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold bg-red-100 text-red-800">
            Application Rejected
          </span>
        <?php else: ?>
          <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold bg-amber-100 text-amber-800">
            Pending Due Diligence
          </span>
        <?php endif; ?>
      </div>

      <?php if (!empty($app['decision_date'])): ?>
        <div class="mb-4 text-xs text-slate-500">
          Last Reviewed: <?= date('M d, Y', strtotime($app['decision_date'])) ?><br>
          Reviewer: <strong><?= e($app['reviewer_name'] ?? 'Secretariat Admin') ?></strong>
        </div>
      <?php endif; ?>

      <form action="<?= url('/admin/applications/' . (int)$app['id'] . '/status') ?>" method="POST" class="space-y-4">
        <?= csrf_field() ?>

        <div>
          <label for="status" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1">Update Status</label>
          <select id="status" name="status" class="w-full text-sm rounded border-slate-300 focus:ring-[#002654] focus:border-[#002654]">
            <option value="pending" <?= ($app['status'] === 'pending') ? 'selected' : '' ?>>Pending Review</option>
            <option value="under_review" <?= ($app['status'] === 'under_review') ? 'selected' : '' ?>>Due Diligence / Proposer Check</option>
            <option value="tabled_exco" <?= ($app['status'] === 'tabled_exco') ? 'selected' : '' ?>>Tabled for ExCo Sitting</option>
            <option value="approved" <?= ($app['status'] === 'approved') ? 'selected' : '' ?>>Approved &amp; Ratified</option>
            <option value="rejected" <?= ($app['status'] === 'rejected') ? 'selected' : '' ?>>Rejected</option>
          </select>
        </div>

        <div>
          <label for="admin_notes" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1">Internal Secretariat Notes</label>
          <textarea id="admin_notes" name="admin_notes" rows="4" class="w-full text-sm rounded border-slate-300 focus:ring-[#002654] focus:border-[#002654]" placeholder="Record due diligence notes, verification dates, fee receipt numbers, or meeting minutes..."><?= e($app['admin_notes'] ?? '') ?></textarea>
        </div>

        <button type="submit" class="w-full py-2.5 bg-[#002654] hover:bg-[#001c3f] text-white rounded font-bold text-xs uppercase tracking-wider transition-colors shadow-sm">
          Save Decision Record
        </button>
      </form>
    </div>
  </div>
</div>
