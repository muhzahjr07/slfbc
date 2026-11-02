<?php
/**
 * Admin Event Form (Create / Edit)
 * Sri Lanka–France Business Council
 */
$isEdit = !empty($event);
$actionUrl = $isEdit ? url('/admin/events/' . (int)$event['id'] . '/edit') : url('/admin/events/create');
?>
<div class="mb-6 flex items-center justify-between border-b border-slate-100 pb-4">
  <div>
    <h1 class="text-2xl font-serif font-bold text-[#002654]"><?= $isEdit ? 'Edit Event Schedule' : 'Schedule New Event' ?></h1>
    <p class="text-xs text-slate-500 mt-1">Configure logistics, venue information, dates, registration endpoints, and summary reports.</p>
  </div>
  <a href="<?= url('/admin/events') ?>" class="text-xs font-bold text-slate-500 hover:text-slate-800 flex items-center gap-1">
    <span class="material-symbols-outlined text-sm">arrow_back</span> Return to Events
  </a>
</div>

<?php if (!empty($errors)): ?>
  <div class="mb-6 p-4 bg-red-50 border-l-4 border-red-600 rounded text-red-900 text-xs">
    <ul class="list-disc pl-5 space-y-1">
      <?php foreach ($errors as $err): ?>
        <li><?= e($err) ?></li>
      <?php endforeach; ?>
    </ul>
  </div>
<?php endif; ?>

<form action="<?= $actionUrl ?>" method="POST" enctype="multipart/form-data" class="space-y-6">
  <?= csrf_field() ?>

  <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
    <div class="md:col-span-2">
      <label for="title" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1">Event Title *</label>
      <input type="text" id="title" name="title" required class="w-full text-sm rounded border-slate-300 focus:ring-[#002654] focus:border-[#002654]" value="<?= e($formData['title'] ?? '') ?>" placeholder="e.g. 21st Annual General Meeting & Bilateral Business Symposium">
    </div>

    <div>
      <label for="slug" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1">URL Identifier (Slug)</label>
      <input type="text" id="slug" name="slug" class="w-full text-sm rounded border-slate-300 focus:ring-[#002654] focus:border-[#002654]" value="<?= e($formData['slug'] ?? '') ?>" placeholder="leave blank to auto-generate">
    </div>

    <div>
      <label for="category" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1">Event Category *</label>
      <select id="category" name="category" class="w-full text-sm rounded border-slate-300 focus:ring-[#002654] focus:border-[#002654]">
        <option value="Summit" <?= (($formData['category'] ?? '') === 'Summit') ? 'selected' : '' ?>>Bilateral Summit</option>
        <option value="AGM" <?= (($formData['category'] ?? '') === 'AGM') ? 'selected' : '' ?>>Annual General Meeting (AGM)</option>
        <option value="Roundtable" <?= (($formData['category'] ?? '') === 'Roundtable') ? 'selected' : '' ?>>Ministerial / Executive Roundtable</option>
        <option value="Trade Mission" <?= (($formData['category'] ?? '') === 'Trade Mission') ? 'selected' : '' ?>>Inbound / Outbound Trade Mission</option>
        <option value="Networking" <?= (($formData['category'] ?? '') === 'Networking') ? 'selected' : '' ?>>Diplomatic & Networking Reception</option>
      </select>
    </div>

    <div>
      <label for="start_datetime" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1">Start Date &amp; Time *</label>
      <input type="text" id="start_datetime" name="start_datetime" required class="w-full text-sm rounded border-slate-300 focus:ring-[#002654] focus:border-[#002654]" value="<?= e($formData['start_datetime'] ?? '') ?>" placeholder="YYYY-MM-DD HH:MM:SS">
    </div>

    <div>
      <label for="end_datetime" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1">End Date &amp; Time (Optional)</label>
      <input type="text" id="end_datetime" name="end_datetime" class="w-full text-sm rounded border-slate-300 focus:ring-[#002654] focus:border-[#002654]" value="<?= e($formData['end_datetime'] ?? '') ?>" placeholder="YYYY-MM-DD HH:MM:SS">
    </div>

    <div>
      <label for="venue" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1">Official Venue *</label>
      <input type="text" id="venue" name="venue" required class="w-full text-sm rounded border-slate-300 focus:ring-[#002654] focus:border-[#002654]" value="<?= e($formData['venue'] ?? '') ?>" placeholder="e.g. The Ballroom, The Kingsbury Colombo">
    </div>

    <div>
      <label for="location_city" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1">City / Region</label>
      <input type="text" id="location_city" name="location_city" class="w-full text-sm rounded border-slate-300 focus:ring-[#002654] focus:border-[#002654]" value="<?= e($formData['location_city'] ?? 'Colombo') ?>">
    </div>

    <div>
      <label for="registration_url" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1">Registration Link (External URL if applicable)</label>
      <input type="url" id="registration_url" name="registration_url" class="w-full text-sm rounded border-slate-300 focus:ring-[#002654] focus:border-[#002654]" value="<?= e($formData['registration_url'] ?? '') ?>" placeholder="https://chamber.lk/register/...">
    </div>

    <div>
      <label for="registration_status" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1">Registration Status</label>
      <select id="registration_status" name="registration_status" class="w-full text-sm rounded border-slate-300 focus:ring-[#002654] focus:border-[#002654]">
        <option value="open" <?= (($formData['registration_status'] ?? '') === 'open') ? 'selected' : '' ?>>Open (Public / Member RSVPs Active)</option>
        <option value="invitation_only" <?= (($formData['registration_status'] ?? '') === 'invitation_only') ? 'selected' : '' ?>>By Diplomatic Invitation Only</option>
        <option value="closed" <?= (($formData['registration_status'] ?? '') === 'closed') ? 'selected' : '' ?>>Registration Concluded</option>
      </select>
    </div>

    <div class="md:col-span-2">
      <label for="cover_image" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1">Cover Image / Banner</label>
      <input type="file" id="cover_image" name="cover_image" accept=".jpg,.jpeg,.png,.webp" class="w-full text-sm rounded border-slate-300">
      <p class="text-xs text-slate-400 mt-1">Accepted: JPG, PNG, WebP. Landscape 16:9 ratio recommended.</p>
      <?php if (!empty($event['cover_image'])): ?>
        <div class="mt-2 flex items-center gap-2">
          <span class="text-xs text-slate-500">Current Banner:</span>
          <img src="<?= e($event['cover_image']) ?>" alt="" class="h-12 w-auto object-cover rounded border">
        </div>
      <?php endif; ?>
    </div>

    <div class="md:col-span-2">
      <label for="summary" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1">Short Summary (Event Card)</label>
      <textarea id="summary" name="summary" rows="2" class="w-full text-sm rounded border-slate-300 focus:ring-[#002654] focus:border-[#002654]" placeholder="Concise overview of discussion themes and keynote speakers..."><?= e($formData['summary'] ?? '') ?></textarea>
    </div>

    <div class="md:col-span-2">
      <label for="description" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1">Full Event Program &amp; Details *</label>
      <textarea id="description" name="description" rows="8" required class="w-full text-sm rounded border-slate-300 focus:ring-[#002654] focus:border-[#002654]" placeholder="Complete agenda, keynote addresses, and protocol notes..."><?= e($formData['description'] ?? '') ?></textarea>
    </div>

    <div class="md:col-span-2">
      <label for="report_summary" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-1">Post-Event Proceedings Report (Archive)</label>
      <textarea id="report_summary" name="report_summary" rows="4" class="w-full text-sm rounded border-slate-300 focus:ring-[#002654] focus:border-[#002654]" placeholder="Post-event summary of resolutions, bilateral agreements signed, and participant statistics..."><?= e($formData['report_summary'] ?? '') ?></textarea>
    </div>
  </div>

  <div class="flex items-center justify-end gap-3 pt-6 border-t border-slate-100">
    <a href="<?= url('/admin/events') ?>" class="px-4 py-2 border border-slate-300 text-slate-700 hover:bg-slate-50 rounded text-xs font-bold uppercase tracking-wider">Cancel</a>
    <button type="submit" class="px-5 py-2 bg-[#002654] hover:bg-[#001c3f] text-white rounded text-xs font-bold uppercase tracking-wider shadow-sm">
      <?= $isEdit ? 'Save Changes' : 'Publish Event Schedule' ?>
    </button>
  </div>
</form>
