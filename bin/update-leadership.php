<?php

declare(strict_types=1);

$config = require dirname(__DIR__) . '/config/config.php';
require_once dirname(__DIR__) . '/app/Core/App.php';

$app = new \App\Core\App($config);
$pdo = \App\Core\Database::getConnection();

echo "=== Updating Leadership to 22nd AGM Verified Committee ===\n";

// Clear existing leadership entries
$pdo->exec("DELETE FROM leadership");

$leaders = [
    [
        'id' => 1,
        'term_year' => '2026/27',
        'category' => 'president',
        'role_title' => 'President',
        'name' => 'Shaameel Mohideen',
        'organization' => 'Spillburg Holdings (Pvt) Ltd',
        'bio' => 'Executive Director & Chief Executive Officer of Spillburg Holdings. Elected President of the Sri Lanka–France Business Council at its 22nd Annual General Meeting, stewarding bilateral trade expansion, direct European enterprise connections, and cross-border investment corridors.',
        'portrait_path' => 'assets/images/president-shaameel.jpg',
        'display_order' => 1,
        'is_active' => 1
    ],
    [
        'id' => 2,
        'term_year' => '2026/27',
        'category' => 'vice_president',
        'role_title' => 'Senior Vice President',
        'name' => 'Zafir Hashim',
        'organization' => 'John Keells Holdings PLC',
        'bio' => 'Sector Head of Transportation and Senior Vice President at John Keells Holdings PLC, directing international supply chains, shipping lines, and maritime logistics infrastructure.',
        'portrait_path' => null,
        'display_order' => 2,
        'is_active' => 1
    ],
    [
        'id' => 3,
        'term_year' => '2026/27',
        'category' => 'vice_president',
        'role_title' => 'Vice President',
        'name' => 'Husni Salieh',
        'organization' => 'Noyon Lanka (Pvt) Ltd',
        'bio' => 'Senior Executive Director representing global apparel and lace manufacturing, spearheading strategic exports and sustainable supply lines into French and European fashion houses.',
        'portrait_path' => null,
        'display_order' => 3,
        'is_active' => 1
    ],
    [
        'id' => 4,
        'term_year' => '2026/27',
        'category' => 'officer',
        'role_title' => 'Honorary Treasurer',
        'name' => 'Manura Wickramasinghe',
        'organization' => 'Puritas (Pvt) Ltd (Hayleys Group)',
        'bio' => 'Head of Corporate Finance and Sustainable Environmental Systems at Puritas / Hayleys Group, championing green industrial purification and carbon-neutral clean technologies.',
        'portrait_path' => null,
        'display_order' => 4,
        'is_active' => 1
    ],
    [
        'id' => 5,
        'term_year' => '2026/27',
        'category' => 'officer',
        'role_title' => 'Immediate Past President',
        'name' => 'Andre Fernando',
        'organization' => 'MAC Holdings (Pvt) Ltd',
        'bio' => 'Chairman and Managing Director of MAC Holdings, providing senior advisory stewardship and bilateral continuity across logistics, aviation, and renewable maritime solutions.',
        'portrait_path' => null,
        'display_order' => 5,
        'is_active' => 1
    ],
    [
        'id' => 6,
        'term_year' => '2026/27',
        'category' => 'committee',
        'role_title' => 'Committee Member',
        'name' => 'Representative',
        'organization' => 'A. Baur & Co. (Pvt) Ltd',
        'bio' => 'Representing century-old Swiss-French-Sri Lankan agricultural innovation, high-tech industrial chemicals, and healthcare equipment.',
        'portrait_path' => null,
        'display_order' => 6,
        'is_active' => 1
    ],
    [
        'id' => 7,
        'term_year' => '2026/27',
        'category' => 'committee',
        'role_title' => 'Committee Member',
        'name' => 'Representative',
        'organization' => 'Aitken Spence Travels (Pvt) Ltd',
        'bio' => 'Representing premier luxury destination management, inbound French tourism growth, and sustainable hospitality corridors.',
        'portrait_path' => null,
        'display_order' => 7,
        'is_active' => 1
    ],
    [
        'id' => 8,
        'term_year' => '2026/27',
        'category' => 'committee',
        'role_title' => 'Committee Member',
        'name' => 'Representative',
        'organization' => 'CEVA Logistics Lanka (Pvt) Ltd',
        'bio' => 'Part of CMA CGM Group, delivering end-to-end multimodal contract freight logistics connecting Colombo to Le Havre and Marseille.',
        'portrait_path' => null,
        'display_order' => 8,
        'is_active' => 1
    ],
    [
        'id' => 9,
        'term_year' => '2026/27',
        'category' => 'committee',
        'role_title' => 'Committee Member',
        'name' => 'Representative',
        'organization' => 'Diesel & Motor Engineering PLC (DIMO)',
        'bio' => 'Engineering, mobility, and industrial power systems conglomerate active in French high-precision agricultural equipment and power distribution.',
        'portrait_path' => null,
        'display_order' => 9,
        'is_active' => 1
    ],
    [
        'id' => 10,
        'term_year' => '2026/27',
        'category' => 'committee',
        'role_title' => 'Committee Member',
        'name' => 'Representative',
        'organization' => 'Universal Travel Bureau (Pvt) Ltd',
        'bio' => 'Leading corporate travel management agency facilitating outbound executive trade delegations and diplomatic summits to France.',
        'portrait_path' => null,
        'display_order' => 10,
        'is_active' => 1
    ],
];

$stmt = $pdo->prepare("INSERT INTO leadership (id, term_year, category, role_title, name, organization, bio, portrait_path, display_order, is_active) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
foreach ($leaders as $l) {
    $stmt->execute([
        $l['id'],
        $l['term_year'],
        $l['category'],
        $l['role_title'],
        $l['name'],
        $l['organization'],
        $l['bio'],
        $l['portrait_path'],
        $l['display_order'],
        $l['is_active']
    ]);
}

// Update site settings to reflect active term year and president quote
$updateSetting = $pdo->prepare("INSERT OR REPLACE INTO site_settings (key_name, key_value, description) VALUES (?, ?, ?)");
$updateSetting->execute(['committee_term', '2026/27', 'Current Committee Term Year']);
$updateSetting->execute([
    'president_quote',
    'Our bilateral mission is dedicated to fostering tangible, high-value joint ventures between Sri Lanka and France, bridging enterprise innovation with sovereign institutional support.',
    'Presidential Quote on Homepage'
]);
$updateSetting->execute([
    'bilateral_announcement',
    'EXECUTIVE COMMITTEE 2026/27 CONVENED | ACCREDITED UNDER THE CEYLON CHAMBER OF COMMERCE',
    'Top Banner Announcement Text'
]);

echo "Leadership updated successfully: 10 committee members for Term 2026/27 seeded!\n";
