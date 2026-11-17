<div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 pb-6 mb-6 border-b border-slate-200">
  <div>
    <div class="inline-flex items-center gap-2 mb-1">
      <span class="w-2 h-2 rounded-full bg-emerald-600"></span>
      <span class="text-xs font-bold uppercase tracking-wider text-emerald-800">System Continuity &amp; cPanel Migration Ready</span>
    </div>
    <h1 class="font-serif-diplomatic text-2xl font-bold text-[#0b1e3b] m-0">All-in-One Backup &amp; Restore Center</h1>
    <p class="text-xs sm:text-sm text-slate-600 mt-1 m-0">
      Export or restore 100% of the portal database, site settings, uploaded member logos, news imagery, and confidential application documents in a single click.
    </p>
  </div>
  <form method="POST" action="<?= url('/admin/backups/snapshot') ?>" class="shrink-0">
    <?= csrf_field() ?>
    <button type="submit" class="px-4 py-2.5 bg-[#002654] hover:bg-[#001c3f] text-white font-bold text-xs uppercase tracking-wider rounded shadow-sm flex items-center gap-2 transition-all cursor-pointer">
      <span class="material-symbols-outlined text-base">add_task</span>
      Create Instant Server Snapshot
    </button>
  </form>
</div>

<!-- 1. SYSTEM STORAGE & HEALTH METRICS -->
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-8">
  <div class="p-4 bg-slate-50 border-l-4 border-l-[#002654] border border-slate-200 rounded-lg">
    <span class="text-[11px] font-bold uppercase text-slate-500 block">Database Engine (<?= e($driver) ?>)</span>
    <p class="font-serif-diplomatic text-2xl font-bold text-[#0b1e3b] my-1"><?= (int)$totalRecords ?> <span class="text-xs font-sans font-semibold text-slate-500">Records</span></p>
    <span class="text-xs text-slate-500">Across 12 active tables<?= $sqliteSize > 0 ? ' • ' . round($sqliteSize / 1024, 1) . ' KB' : '' ?></span>
  </div>

  <div class="p-4 bg-slate-50 border-l-4 border-l-[#b91c1c] border border-slate-200 rounded-lg">
    <span class="text-[11px] font-bold uppercase text-slate-500 block">Uploaded Public Media</span>
    <p class="font-serif-diplomatic text-2xl font-bold text-[#0b1e3b] my-1"><?= (int)$uploadCount ?> <span class="text-xs font-sans font-semibold text-slate-500">Files</span></p>
    <span class="text-xs text-slate-500">public/uploads • <?= round($uploadBytes / 1024, 1) ?> KB</span>
  </div>

  <div class="p-4 bg-slate-50 border-l-4 border-l-[#c59b27] border border-slate-200 rounded-lg">
    <span class="text-[11px] font-bold uppercase text-slate-500 block">Application Documents</span>
    <p class="font-serif-diplomatic text-2xl font-bold text-[#0b1e3b] my-1"><?= (int)$docCount ?> <span class="text-xs font-sans font-semibold text-slate-500">Dossiers</span></p>
    <span class="text-xs text-slate-500">storage/documents • <?= round($docBytes / 1024, 1) ?> KB</span>
  </div>

  <div class="p-4 bg-slate-50 border-l-4 border-l-emerald-600 border border-slate-200 rounded-lg">
    <span class="text-[11px] font-bold uppercase text-slate-500 block">Saved Server Snapshots</span>
    <p class="font-serif-diplomatic text-2xl font-bold text-[#0b1e3b] my-1"><?= count($snapshots) ?> <span class="text-xs font-sans font-semibold text-slate-500">Snapshots</span></p>
    <span class="text-xs text-emerald-700 font-semibold">Ready for 1-click restore</span>
  </div>
</div>

<!-- 2. DOWNLOAD EXPORTS & 1-CLICK RESTORE GRID -->
<div class="grid grid-cols-1 lg:grid-cols-12 gap-8 mb-10">

  <!-- Left 7 Cols: One-Click Backup Downloads -->
  <div class="lg:col-span-7 space-y-4">
    <div class="p-6 bg-slate-50 border border-slate-200 rounded-lg">
      <div class="flex items-center gap-2.5 mb-3">
        <span class="material-symbols-outlined text-[#002654] text-2xl">cloud_download</span>
        <h2 class="font-serif-diplomatic text-lg font-bold text-[#0b1e3b] m-0">1. Download All-in-One Backups to Your Computer</h2>
      </div>
      <p class="text-xs sm:text-sm text-slate-600 mb-5 leading-relaxed">
        Download a complete copy of your site data before redeploying on Render or when moving to cPanel hosting.
      </p>

      <div class="space-y-3">
        <!-- Full ZIP Archive -->
        <div class="p-4 bg-white border-2 border-[#002654]/20 rounded-lg flex flex-col sm:flex-row sm:items-center justify-between gap-4 hover:border-[#002654] transition-all">
          <div>
            <span class="px-2 py-0.5 bg-[#002654] text-white text-[10px] font-bold uppercase rounded">Recommended • Complete Archive</span>
            <h3 class="font-serif-diplomatic text-base font-bold text-[#0b1e3b] mt-1.5 mb-0.5">All-in-One Full Backup (.ZIP)</h3>
            <p class="text-xs text-slate-500 m-0">Contains JSON Master Bundle, SQL Dump, SQLite DB, Uploaded Logos, and Application PDFs.</p>
          </div>
          <a href="<?= url('/admin/backups/download-zip') ?>" class="shrink-0 px-4 py-2.5 bg-[#002654] hover:bg-[#001c3f] text-white font-bold text-xs uppercase tracking-wider rounded flex items-center gap-1.5 shadow-sm">
            <span class="material-symbols-outlined text-base">folder_zip</span> Download .ZIP
          </a>
        </div>

        <!-- Portable JSON Master Bundle -->
        <div class="p-4 bg-white border border-slate-200 rounded-lg flex flex-col sm:flex-row sm:items-center justify-between gap-4 hover:border-[#002654] transition-all">
          <div>
            <span class="px-2 py-0.5 bg-emerald-100 text-emerald-800 text-[10px] font-bold uppercase rounded">Cross-Platform Restore Bundle</span>
            <h3 class="font-serif-diplomatic text-base font-bold text-[#0b1e3b] mt-1.5 mb-0.5">Portable Master Bundle (.JSON)</h3>
            <p class="text-xs text-slate-500 m-0">Single-file bundle with all 12 database tables + base64-encoded uploaded files.</p>
          </div>
          <a href="<?= url('/admin/backups/download-json') ?>" class="shrink-0 px-4 py-2.5 bg-white border border-slate-300 hover:bg-slate-100 text-slate-800 font-bold text-xs uppercase tracking-wider rounded flex items-center gap-1.5">
            <span class="material-symbols-outlined text-base">data_object</span> Download .JSON
          </a>
        </div>

        <!-- SQL Database Dump -->
        <div class="p-4 bg-white border border-slate-200 rounded-lg flex flex-col sm:flex-row sm:items-center justify-between gap-4 hover:border-[#002654] transition-all">
          <div>
            <span class="px-2 py-0.5 bg-amber-100 text-amber-900 text-[10px] font-bold uppercase rounded">cPanel phpMyAdmin Ready</span>
            <h3 class="font-serif-diplomatic text-base font-bold text-[#0b1e3b] mt-1.5 mb-0.5">SQL Database Dump (.SQL)</h3>
            <p class="text-xs text-slate-500 m-0">Standard SQL INSERT statements for importing into MySQL / MariaDB or SQLite.</p>
          </div>
          <a href="<?= url('/admin/backups/download-sql') ?>" class="shrink-0 px-4 py-2.5 bg-white border border-slate-300 hover:bg-slate-100 text-slate-800 font-bold text-xs uppercase tracking-wider rounded flex items-center gap-1.5">
            <span class="material-symbols-outlined text-base">database</span> Download .SQL
          </a>
        </div>
      </div>
    </div>
  </div>

  <!-- Right 5 Cols: One-Click Restore Upload -->
  <div class="lg:col-span-5">
    <div class="p-6 bg-slate-50 border-2 border-slate-200 rounded-lg h-full flex flex-col justify-between">
      <div>
        <div class="flex items-center gap-2.5 mb-3">
          <span class="material-symbols-outlined text-[#b91c1c] text-2xl">settings_backup_restore</span>
          <h2 class="font-serif-diplomatic text-lg font-bold text-[#0b1e3b] m-0">2. Restore from Backup File</h2>
        </div>
        <p class="text-xs sm:text-sm text-slate-600 mb-5 leading-relaxed">
          Upload a previously downloaded <strong>.ZIP</strong> or <strong>.JSON</strong> backup archive to immediately restore all database tables, settings, and uploaded files.
        </p>

        <form method="POST" action="<?= url('/admin/backups/restore') ?>" enctype="multipart/form-data" class="space-y-4">
          <?= csrf_field() ?>
          <div class="p-4 bg-white border border-dashed border-slate-300 rounded-lg">
            <label for="backup_file" class="block text-xs font-bold uppercase tracking-wider text-slate-700 mb-2">
              Select Backup Archive (.zip or .json)
            </label>
            <input type="file" id="backup_file" name="backup_file" accept=".zip,.json" required class="w-full text-xs text-slate-600 file:mr-3 file:py-2 file:px-3 file:rounded file:border-0 file:text-xs file:font-bold file:bg-[#002654] file:text-white hover:file:bg-[#001c3f] cursor-pointer">
          </div>

          <div class="p-3 bg-amber-50 border border-amber-200 rounded text-xs text-amber-900 leading-relaxed">
            <strong>Note:</strong> Restoring a backup replaces current records in the 12 content tables with the records from the backup archive while preserving your administrator login account.
          </div>

          <button type="submit" onclick="return confirm('Are you sure you want to restore the site from this backup file? Current table records will be replaced with the backup state.');" class="w-full py-3 px-4 bg-[#b91c1c] hover:bg-[#991b1b] text-white font-bold text-xs uppercase tracking-wider rounded shadow flex items-center justify-center gap-2 transition-all cursor-pointer">
            <span class="material-symbols-outlined text-base">restore</span>
            Restore All-in-One Backup Now
          </button>
        </form>
      </div>
    </div>
  </div>

</div>

<!-- 3. SAVED SERVER SNAPSHOTS TABLE -->
<div class="mb-10">
  <h2 class="font-serif-diplomatic text-lg font-bold text-[#0b1e3b] mb-3">Saved Server Snapshots (storage/backups)</h2>
  <?php if (empty($snapshots)): ?>
    <div class="p-6 bg-slate-50 border border-slate-200 rounded-lg text-center text-xs sm:text-sm text-slate-500">
      No server snapshots saved yet. Click <strong>"Create Instant Server Snapshot"</strong> at the top right to save a point-in-time recovery point.
    </div>
  <?php else: ?>
    <div class="overflow-x-auto border border-slate-200 rounded-lg">
      <table class="data-table">
        <thead>
          <tr>
            <th>Snapshot Filename</th>
            <th>Created Timestamp</th>
            <th>Archive Size</th>
            <th class="text-right">Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($snapshots as $snap): ?>
            <tr>
              <td class="font-mono text-xs font-bold text-[#002654]"><?= e($snap['name']) ?></td>
              <td class="text-xs text-slate-600"><?= date('M d, Y H:i:s', $snap['modified']) ?> UTC</td>
              <td class="text-xs text-slate-600"><?= round($snap['size'] / 1024, 1) ?> KB</td>
              <td class="text-right">
                <div class="inline-flex items-center gap-2">
                  <form method="POST" action="<?= url('/admin/backups/restore') ?>" class="inline">
                    <?= csrf_field() ?>
                    <input type="hidden" name="snapshot_file" value="<?= e($snap['name']) ?>">
                    <button type="submit" onclick="return confirm('Restore portal state from snapshot <?= e($snap['name']) ?>?');" class="px-2.5 py-1 bg-emerald-700 hover:bg-emerald-800 text-white rounded text-xs font-bold cursor-pointer">
                      Restore
                    </button>
                  </form>
                  <form method="POST" action="<?= url('/admin/backups/manage') ?>" class="inline">
                    <?= csrf_field() ?>
                    <input type="hidden" name="snapshot_file" value="<?= e($snap['name']) ?>">
                    <input type="hidden" name="action" value="download">
                    <button type="submit" class="px-2.5 py-1 bg-slate-100 hover:bg-slate-200 text-slate-700 rounded text-xs font-bold cursor-pointer">
                      Download
                    </button>
                  </form>
                  <form method="POST" action="<?= url('/admin/backups/manage') ?>" class="inline">
                    <?= csrf_field() ?>
                    <input type="hidden" name="snapshot_file" value="<?= e($snap['name']) ?>">
                    <input type="hidden" name="action" value="delete">
                    <button type="submit" onclick="return confirm('Delete snapshot <?= e($snap['name']) ?>?');" class="px-2.5 py-1 bg-red-50 hover:bg-red-100 text-red-700 rounded text-xs font-bold cursor-pointer">
                      Delete
                    </button>
                  </form>
                </div>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  <?php endif; ?>
</div>

<!-- 4. DATABASE TABLE RECORD BREAKDOWN -->
<div>
  <h2 class="font-serif-diplomatic text-lg font-bold text-[#0b1e3b] mb-3">Database Table Manifest</h2>
  <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-3">
    <?php foreach ($tableCounts as $tableName => $rowCount): ?>
      <div class="p-3 bg-slate-50 border border-slate-200 rounded flex items-center justify-between">
        <span class="font-mono text-xs text-slate-700 truncate"><?= e($tableName) ?></span>
        <span class="px-2 py-0.5 bg-white border border-slate-200 rounded text-xs font-bold text-[#002654]"><?= (int)$rowCount ?></span>
      </div>
    <?php endforeach; ?>
  </div>
</div>
