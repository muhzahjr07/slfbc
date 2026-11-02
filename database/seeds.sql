-- ====================================================================
-- Sri Lanka–France Business Council (SLFBC) Portal
-- Production Verified Initial Seed Data
-- ====================================================================

-- 1. Default Super Administrator (Password: Admin@SLFBC2026!)
INSERT INTO `admins` (`id`, `name`, `email`, `password_hash`, `role`, `is_active`, `created_at`) VALUES
(1, 'SLFBC Chief Administrator', 'admin@slfbc.lk', '$2y$10$a44pbQYbNVaXLUflcthIHOxE5Y7NRe6ynV13N/WvB4pKZLZ1vrTVC', 'super_admin', 1, NOW())
ON DUPLICATE KEY UPDATE `name` = VALUES(`name`);

-- 2. Sectors
INSERT INTO `sectors` (`id`, `name`, `slug`, `display_order`) VALUES
(1, 'Maritime Logistics & Supply Chain', 'maritime-logistics', 1),
(2, 'Energy, Power & Infrastructure', 'energy-infrastructure', 2),
(3, 'Conglomerates & Diversified Holdings', 'conglomerates-diversified', 3),
(4, 'Specialty Agriculture & Ceylon Tea', 'specialty-agriculture-tea', 4),
(5, 'Hospitality, Leisure & Gastronomy', 'hospitality-leisure', 5),
(6, 'Industrial Rubber & Manufacturing', 'industrial-rubber-manufacturing', 6),
(7, 'ICT, Digital Engineering & Deeptech', 'ict-digital-engineering', 7),
(8, 'Banking, Treasury & Trade Finance', 'banking-trade-finance', 8)
ON DUPLICATE KEY UPDATE `name` = VALUES(`name`);

-- 3. Verified Initial Members (from Audit & Official Council Materials)
INSERT INTO `members` (`id`, `name`, `slug`, `sector_id`, `tier`, `origin`, `short_description`, `website_url`, `is_featured`, `is_active`, `display_order`) VALUES
(1, 'CMA CGM Lanka (Pvt) Ltd', 'cma-cgm-lanka', 1, 'patron', 'France', 'Global leader in sea, land, air and logistics solutions connecting Sri Lankan ports to European and worldwide trade lanes.', 'https://www.cma-cgm.com', 1, 1, 1),
(2, 'TotalEnergies Renewables South Asia', 'totalenergies-south-asia', 2, 'patron', 'France', 'Multi-energy company active in renewable energy project development, offshore solar, and sustainable clean infrastructure.', 'https://www.totalenergies.com', 1, 1, 2),
(3, 'Hayleys PLC', 'hayleys-plc', 3, 'corporate', 'Sri Lanka', 'Premier diversified Sri Lankan conglomerate with extensive global export footprint in value-added transport, logistics and textiles.', 'https://www.hayleys.com', 1, 1, 3),
(4, 'Dilmah Ceylon Tea Company PLC', 'dilmah-ceylon-tea', 4, 'corporate', 'Sri Lanka', 'Pioneer in single-origin, ethically produced 100% pure Ceylon tea with premium distribution across high-end French gourmet retailers.', 'https://www.dilmahtea.com', 1, 1, 4),
(5, 'Schneider Electric Sri Lanka', 'schneider-electric', 2, 'corporate', 'France', 'Global digital automation and energy management leader delivering efficient, sustainable power infrastructure across South Asia.', 'https://www.se.com', 1, 1, 5),
(6, 'John Keells Holdings PLC', 'john-keells-holdings', 3, 'corporate', 'Sri Lanka', 'Sri Lanka’s largest listed conglomerate operating key leisure assets, transport networks, and commercial developments including City of Dreams.', 'https://www.keells.com', 1, 1, 6),
(7, 'Accor Hotels Group', 'accor-hotels', 5, 'corporate', 'France', 'World-leading hospitality group operating premium luxury and business hotel brands across Europe, Asia and the Indian Ocean.', 'https://group.accor.com', 1, 1, 7),
(8, 'Michelin Lanka (Pvt) Ltd', 'michelin-lanka', 6, 'corporate', 'France', 'World benchmark in tire engineering and advanced elastomeric materials with manufacturing operations in Sri Lanka.', 'https://www.michelin.com', 1, 1, 8),
(9, 'Aitken Spence PLC', 'aitken-spence', 1, 'corporate', 'Sri Lanka', 'Blue-chip conglomerate with market leadership in maritime transport, freight logistics, sustainable resorts, and power generation.', 'https://www.aitkenspence.com', 1, 1, 9)
ON DUPLICATE KEY UPDATE `name` = VALUES(`name`);

-- 4. News Categories
INSERT INTO `news_categories` (`id`, `name`, `slug`) VALUES
(1, 'Chamber Communiqués', 'chamber-communiques'),
(2, 'Bilateral Delegations', 'bilateral-delegations'),
(3, 'Trade Policy & Advisory', 'trade-policy-advisory'),
(4, 'Member News', 'member-news')
ON DUPLICATE KEY UPDATE `name` = VALUES(`name`);

-- 5. Verified News & Communiqués
INSERT INTO `news` (`id`, `category_id`, `title`, `slug`, `excerpt`, `content`, `cover_image`, `author`, `published_at`, `status`, `is_featured`, `meta_title`, `meta_description`) VALUES
(1, 1, 'French Business Delegation Concludes Indian Ocean Logistics Tour', 'french-business-delegation-concludes-logistics-tour',
'A high-level mission representing 14 French multinational industrial contractors evaluated deep-water port operations and off-grid green energy opportunities at the Port of Colombo.',
'<p>A high-level commercial mission representing 14 French multinational industrial and engineering contractors recently concluded an extensive four-day evaluation tour of Sri Lanka’s logistics infrastructure and transshipment capabilities.</p><p>Coordinated by the Sri Lanka–France Business Council under the auspices of the Ceylon Chamber of Commerce and supported by the Embassy of France in Colombo, the delegation conducted strategic discussions with the Ministry of Ports and Shipping, the Board of Investment (BOI), and senior executive leadership of the Colombo Port Authority.</p><p>Key focus areas of the mission included evaluating the deep-water container terminal operations, reviewing off-grid green port power transition pipelines, and exploring specialized cold-chain logistics hubs designed to serve high-value Indian Ocean shipping corridors.</p>',
'assets/images/bilateral-summit.jpg', 'Colombo Secretariat', '2026-03-14 10:00:00', 'published', 1,
'French Business Delegation Concludes Logistics Tour | SLFBC',
'High-level French trade delegation visits Port of Colombo to evaluate logistics and green energy opportunities.')
ON DUPLICATE KEY UPDATE `title` = VALUES(`title`);

-- 6. Events
INSERT INTO `events` (`id`, `title`, `slug`, `category`, `start_datetime`, `end_datetime`, `venue`, `location_city`, `summary`, `description`, `cover_image`, `registration_url`, `registration_status`, `status`) VALUES
(1, '2026 Sri Lanka–France Bilateral Investment Forum', '2026-sri-lanka-france-bilateral-investment-forum',
'Summit', '2026-10-22 09:00:00', '2026-10-24 18:00:00',
'Hôtel de Crillon, Place de la Concorde & Hybrid Video Link', 'Paris, France',
'Convening chief executives, institutional investors, and ministry delegates on sovereign infrastructure financing and Indo-Pacific commercial partnerships.',
'<p>The premier annual gathering of French and Sri Lankan corporate leadership, sovereign finance authorities, and trade delegates. Held under the patronage of the Embassy of France and the Ceylon Chamber of Commerce.</p><p>The three-day forum features plenary sessions on maritime transshipment hubs, renewable hydrogen co-investments, luxury sustainable tourism, and technological collaboration under EU standards.</p>',
'assets/images/bilateral-summit.jpg', '#register', 'open', 'published'),
(2, 'Annual Bilateral Gala Dinner & Sovereign Trade Awards', 'annual-bilateral-gala-dinner-trade-awards',
'Protocol Gala', '2026-02-02 19:30:00', '2026-02-02 23:00:00',
'Official Residence of the Ambassador of France', 'Colombo, Sri Lanka',
'Recognizing exemplary bilateral corporate achievements across specialty exports, sustainable investments, and bilateral industrial cooperation.',
'<p>The Annual Bilateral Gala Dinner brings together council members, diplomats, and distinguished state representatives to celebrate outstanding contributions to Franco-Lankan commerce.</p><p>Awards presented include Bilateral Exporter of the Year, Sustainable Innovation Laureate, and Outstanding Bilateral Corporate Citizen.</p>',
'assets/images/bilateral-summit.jpg', NULL, 'closed', 'published')
ON DUPLICATE KEY UPDATE `title` = VALUES(`title`);

-- 7. Leadership & Executive Committee (Term 2025/26 - Configurable)
INSERT INTO `leadership` (`id`, `term_year`, `category`, `role_title`, `name`, `organization`, `bio`, `portrait_path`, `display_order`, `is_active`) VALUES
(1, '2025/26', 'president', 'Executive President', 'Jean-Pierre Dubois', 'Director, European Regional Operations', 'Seasoned cross-border business executive with over two decades of leadership directing European corporate expansions and strategic investments across the Indo-Pacific.', 'assets/images/president-dubois.jpg', 1, 1),
(2, '2025/26', 'vice_president', 'Vice President (Sri Lanka)', 'Asoka Wickremasinghe', 'Aitken Spence PLC', 'Managing Director of Maritime & Freight Corridors with comprehensive expertise in multimodal transport, port logistics, and South Asian trade corridor optimization.', NULL, 2, 1),
(3, '2025/26', 'vice_president', 'Vice President (France)', 'Hervé Laurent', 'Schneider Electric', 'Regional Director of South Asia Energy Systems, championing clean power transitions, industrial automation, and Franco-Lankan energy collaboration.', NULL, 3, 1),
(4, '2025/26', 'officer', 'Honorary Secretary & Secretariat', 'Niroshini Rathnayake', 'The Ceylon Chamber of Commerce', 'Senior Director of Bilateral Affairs at the Ceylon Chamber of Commerce, stewarding institutional protocol, statutory compliance, and bilateral governance.', NULL, 4, 1),
(5, '2025/26', 'officer', 'Honorary Treasurer', 'Charles de Montmirail', 'South Asian Commercial Banking', 'Head of Trade Finance and Commercial Banking Desks, specializing in cross-border letter of credit facilities, foreign exchange management, and export insurance.', NULL, 5, 1)
ON DUPLICATE KEY UPDATE `name` = VALUES(`name`);

-- 8. Business Opportunities
INSERT INTO `business_opportunities` (`id`, `title`, `slug`, `track`, `icon`, `corridor`, `summary`, `status_label`, `is_featured`, `display_order`) VALUES
(1, 'Investment & Renewable Infrastructure', 'investment-renewable-infrastructure', 'Capital Projects', 'solar_power', 'inward_sri_lanka', 'Direct French EPC involvement in offshore wind farms in Mannar Basin, micro-grids, commercial green hydrogen generation, and port crane electrifications.', 'Active Project Pipeline', 1, 1),
(2, 'High-Value Bilateral Trade & Exports', 'high-value-bilateral-trade-exports', 'Trade & Export', 'local_shipping', 'outward_france', 'Expansion of GI-certified Ceylon Cinnamon, ethical apparel supply lines, aircraft tire rubber components, and high-purity graphite into French aerospace tiers.', 'Bilateral Matchmaking', 1, 2),
(3, 'Market Entry & Regulatory Navigation', 'market-entry-regulatory-navigation', 'Advisory', 'gavel', 'bilateral', 'Step-by-step establishment advisory, corporate taxation optimization, BOI Section 17 incentive structuring, and local partner vetting.', 'Statutory Roadmaps', 1, 3),
(4, 'Maritime & Supply Chain Alliances', 'maritime-supply-chain-alliances', 'Partnerships', 'hub', 'bilateral', 'Strengthening joint shipping consortia, cold chain logistics for perishables, port equipment supply, and French multimodal network integration.', 'Supply Logistics', 1, 4),
(5, 'Luxury Tourism & Culinary Exchange', 'luxury-tourism-culinary-exchange', 'Hospitality', 'hotel', 'inward_sri_lanka', 'Co-investments in regenerative luxury eco-resorts, French hospitality brand expansions in Colombo, and bilateral Sommelier and gastronomy training institutes.', 'Boutique Assets', 1, 5),
(6, 'Software Engineering & AI Venture Alliances', 'software-engineering-ai-venture-alliances', 'Deeptech', 'terminal', 'outward_france', 'Pairing top-quartile Sri Lankan enterprise software engineers with French Station F startups, European fintech operators, and Agritech R&D centers.', 'Engineering Corridors', 1, 6)
ON DUPLICATE KEY UPDATE `title` = VALUES(`title`);

-- 9. Site Settings
INSERT INTO `site_settings` (`key_name`, `key_value`, `description`) VALUES
('site_name', 'Sri Lanka–France Business Council', 'Official Council Name'),
('secretariat_address', '50, Nawam Mawatha, Colombo 02, Sri Lanka', 'Official Secretariat Address at Ceylon Chamber'),
('secretariat_phone', '+94 11 558 8800', 'Secretariat Telephone'),
('paris_phone', '+33 1 45 61 00', 'Paris Liaison Phone'),
('secretariat_email', 'info@slfbc.lk', 'Public Enquiries Email'),
('official_secretariat_email', 'slfbc@chamber.lk', 'Internal Ceylon Chamber Secretariat Email'),
('committee_term', '2025/26', 'Current Committee Term Year'),
('historical_established_year', '2004', 'Council Founding Year'),
('member_count_display', '70+ Corporate Members (Verified)', 'Verified Membership Display'),
('bilateral_announcement', '2026 BILATERAL FORUM REGISTRATIONS OPEN | ACCREDITED UNDER THE CEYLON CHAMBER OF COMMERCE', 'Top Banner Announcement Text'),
('president_quote', 'Our bilateral trade corridor is entering an era defined not merely by transactions, but by structural joint ventures in maritime transshipment, renewable hydrogen, and advanced knowledge engineering.', 'Presidential Quote on Homepage')
ON DUPLICATE KEY UPDATE `key_value` = VALUES(`key_value`);
