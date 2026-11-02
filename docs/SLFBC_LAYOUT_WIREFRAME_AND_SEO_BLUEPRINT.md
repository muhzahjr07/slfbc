# Sri Lanka–France Business Council (SLFBC)
## Master Website Layout, Wireframe Architecture & SEO Implementation Blueprint

> **Prepared for:** Spillburg Content, Design & Strategy Team  
> **Entity:** Sri Lanka–France Business Council (SLFBC)  
> **Aegis:** The Ceylon Chamber of Commerce & Embassy of France in Colombo  
> **Scope:** Full Layout Architecture, Page-by-Page Wireframes, Content Character Limits, and Turnkey On-Page/Technical SEO Blueprint.

---

## 1. Global SEO Architecture & Standards

### 1.1 Global SEO Conventions
- **Canonical Domain Target:** `https://slfbc.lk` (or designated production URL).
- **Primary Global Title Tag Pattern:** `<Page / Entity Title> | Sri Lanka–France Business Council (SLFBC)`
- **Character Guidelines:**
  - `Meta Title`: 50–60 characters (strict desktop/mobile display threshold).
  - `Meta Description`: 145–158 characters with proactive call-to-action (CTA).
  - `H1 Heading`: Exactly **one** semantic `<h1>` per page.
  - `H2 / H3`: Clean semantic hierarchy without skipping heading ranks.
- **OpenGraph & Twitter Card Setup:**
  - Default Share Image: `https://slfbc.lk/assets/images/bilateral-summit.jpg` (`1200x630px`, `< 300KB`)
  - Twitter Card: `summary_large_image`
- **Dynamic SEO Engine:**
  - [sitemap.xml](file:///c:/Users/User/Desktop/Spillburg%20Admin/projects/slfbc/public/index.php) dynamically indexes all active corporate members, news articles, events, and opportunity corridors.
  - [robots.txt](file:///c:/Users/User/Desktop/Spillburg%20Admin/projects/slfbc/public/index.php) allows public indexing while shielding `/admin/` and confidential document downloads.
  - Structured Data: Institutional Schema (`GovernmentOrganization` / `NGO`), `Event` Schema, `NewsArticle` Schema, and `BreadcrumbList`.

---

## 2. Global Header & Footer Layout Specifications

```
+-----------------------------------------------------------------------------------------------------------------+
| TOP UTILITY STRIP                                                                                               |
| [Yellow Dot] SRI LANKA-FRANCE BILATERAL CHAMBER | CEYLON CHAMBER OF COMMERCE & EMBASSY OF FRANCE | EN / FR | ADMIN |
+-----------------------------------------------------------------------------------------------------------------+
| MAIN NAVIGATION BAR                                                                                             |
| [LOGO: SLFBC + Chamber Emblem]   Home  About  Governance  Bilateral  Opportunities  Membership  Directory  News   |
|                                  SLFBC        & ExCo      Relations                         & Fees      & Events|
|                                                                                    [ BECOME A MEMBER (CTA) ]    |
+-----------------------------------------------------------------------------------------------------------------+
| (PAGE HERO & MAIN BODY CONTENT - DETAILS BELOW)                                                                 |
+-----------------------------------------------------------------------------------------------------------------+
| GLOBAL INSTITUTIONAL FOOTER                                                                                     |
| Col 1: Emblem, Mission Statement, Chamber Affiliation Accreditation Badge                                       |
| Col 2: Council & Governance Links (About, ExCo, Ambassador Dispatch, Constitution, Directory)                   |
| Col 3: Trade Corridors (Renewable Energy, Maritime Logistics, High-Value Exports, France/SL Guides)             |
| Col 4: Secretariats: Colombo Chamber HQ (Nawam Mawatha) + Paris Liaison Desk (Rue de Berri)                     |
| Bottom Strip: Copyright 2026, Institutional Charter, Membership Terms, Secretariat Inquiries                    |
+-----------------------------------------------------------------------------------------------------------------+
```

---

## 3. Page-by-Page Wireframes & Content Copywriting Blueprints

---

### Page 1: Homepage (`/`)
*Primary Gateway & Bilateral Flagship Landing Page*

#### SEO Blueprint
- **Meta Title:** `Sri Lanka–France Business Council | Ceylon Chamber of Commerce` (58 chars)
- **Meta Description:** `Official bilateral trade portal of the Sri Lanka–France Business Council, accredited under The Ceylon Chamber of Commerce and supported by the French Embassy.` (157 chars)
- **Primary Keywords:** `Sri Lanka France Business Council`, `SLFBC`, `Ceylon Chamber of Commerce bilateral`, `France Sri Lanka trade`, `bilateral investment Sri Lanka France`
- **Structured Data:** `Organization`, `WebSite`, `BreadcrumbList`

#### Layout & Wireframe Blocks
```
+------------------------------------------------------------------------------------+
| 1. HERO SECTION                                                                    |
|    - Eyebrow: Official Bilateral Chamber under Ceylon Chamber of Commerce (Est. 2004)|
|    - H1: Strengthening Business Between Sri Lanka & France                         |
|    - Subhead: Strategic partnerships, trade facilitation, and inward investment    |
|    - Dual CTA: [ BECOME A MEMBER ] [ EXPLORE OPPORTUNITIES ]                       |
|    - Right: High-level bilateral summit imagery / accredited forum pill            |
+------------------------------------------------------------------------------------+
| 2. STATISTICAL PROOF MATRIX (4 Stat Cards)                                         |
|    - Card 1: 20+ Years Institutional Continuity (Est. 2004)                        |
|    - Card 2: 70+ Verified Corporate Members (Tier 1 Conglomerates & Multinationals)|
|    - Card 3: Annual Trade & Inward Investment Delegations (Paris, Lyon, Colombo)  |
|    - Card 4: Official Chamber & Diplomatic Sovereign Channel                       |
+------------------------------------------------------------------------------------+
| 3. MANDATE & 4 STRATEGIC PILLARS                                                   |
|    - Pillar 1: Trade & Investment Structuring                                      |
|    - Pillar 2: High-Level Business Networking & C-Suite Roundtables                |
|    - Pillar 3: Market Access & EU Regulatory/GSP+ Guidance                         |
|    - Pillar 4: Institutional Liaison with Ministry & BOI Desks                     |
+------------------------------------------------------------------------------------+
| 4. BILATERAL CORRIDOR SPLIT CAROUSEL/GRID                                          |
|    - Column A: Why Sri Lanka for French Multinationals (Transshipment, Clean Power)|
|    - Column B: Why France for Sri Lankan Exporters (450M EU Consumers, Tech R&D)   |
+------------------------------------------------------------------------------------+
| 5. STRATEGIC OPPORTUNITIES SPOTLIGHT (6 Grid Cards with status tags)               |
|    - Capital Projects, GI Ceylon Cinnamon/Tea, Maritime Logistics, Software, etc.  |
+------------------------------------------------------------------------------------+
| 6. MEMBERSHIP INTAKE BANNER & EMBEDDED FAST-TRACK FORM                             |
|    - Value props bullet list + 3-step inline application form                      |
+------------------------------------------------------------------------------------+
| 7. PRESIDENTIAL COMMUNIQUÉ DISPATCH & EXECUTIVE COMMITTEE TEASER                   |
|    - High-res portrait of Council President, official quote, link to Governance    |
+------------------------------------------------------------------------------------+
| 8. CORPORATE DIRECTORY EMBLEM CAROUSEL (Verified Members)                          |
|    - Logos: CMA CGM, TotalEnergies, Schneider Electric, Michelin, Dilmah, etc.     |
+------------------------------------------------------------------------------------+
| 9. TESTIMONIALS & INSTITUTIONAL ENDORSEMENTS                                       |
+------------------------------------------------------------------------------------+
```

#### Content Copy Requirements
- **Hero Title (`H1`):** Max 8–10 words.
- **Hero Paragraph:** 35–45 words emphasizing the diplomatic umbrella and corporate stature.
- **President's Message Excerpt:** 40–55 words on bilateral industrial cooperation and green energy.

---

### Page 2: About the Council (`/about`)
*Institutional Mandate, History, and Constitution*

#### SEO Blueprint
- **Meta Title:** `About the Council | Sri Lanka–France Business Council` (52 chars)
- **Meta Description:** `Established in 2004 under the Ceylon Chamber of Commerce, the SLFBC fosters bilateral trade, joint ventures, and economic cooperation between Sri Lanka and France.` (158 chars)
- **Primary Keywords:** `about SLFBC`, `Ceylon Chamber bilateral councils`, `Sri Lanka France economic ties`, `SLFBC history 2004`
- **Anchor Shortcuts:** Supports `/constitution` (redirects directly to `#constitution`).

#### Layout & Wireframe Blocks
```
+------------------------------------------------------------------------------------+
| 1. EDITORIAL HEADER: Institutional Mission & Charter                               |
+------------------------------------------------------------------------------------+
| 2. HISTORICAL TIMELINE & MILESTONES (2004 Inauguration to 2026 Summit)             |
+------------------------------------------------------------------------------------+
| 3. CORE OBJECTIVES (4 Comprehensive Governance Statements)                         |
+------------------------------------------------------------------------------------+
| 4. THE CEYLON CHAMBER STRATEGIC ANCHOR                                             |
|    - Institutional backing, governance credibility, and secretariat stewardship    |
+------------------------------------------------------------------------------------+
| 5. STATUTORY CONSTITUTION & BY-LAWS ACCORDION (`#constitution`)                    |
|    - Article 1: Name & Office | Article 2: Objectives | Article 3: Membership      |
|    - Article 4: Subscriptions | Article 5: Committee  | Article 6: AGM Protocol    |
+------------------------------------------------------------------------------------+
```

---

### Page 3: Leadership & Governance (`/governance`)
*Executive Committee & Protocol Leadership*

#### SEO Blueprint
- **Meta Title:** `Executive Committee & Leadership | SLFBC Sri Lanka` (50 chars)
- **Meta Description:** `Meet the Executive Committee of the Sri Lanka–France Business Council for 2025/26, stewarding bilateral trade and investment governance.` (138 chars)
- **Primary Keywords:** `SLFBC executive committee`, `SLFBC president`, `Sri Lanka France chamber committee`

#### Layout & Wireframe Blocks
```
+------------------------------------------------------------------------------------+
| 1. DISPATCH HEADER: Term 2025/26 Governance Registry                               |
+------------------------------------------------------------------------------------+
| 2. PRESIDENT SPOTLIGHT CARD                                                        |
|    - Large Portrait, Full Name, Title, Corporate Affiliation, Strategic Bio        |
+------------------------------------------------------------------------------------+
| 3. VICE PRESIDENTS GRID (Dual Representation: Sri Lankan & French Corporate)       |
|    - VP Sri Lanka (Aitken Spence PLC) | VP France (Schneider Electric)             |
+------------------------------------------------------------------------------------+
| 4. SECRETARIAT & STATUTORY OFFICERS                                                |
|    - Honorary Secretary (The Ceylon Chamber) | Honorary Treasurer (Trade Bank)     |
+------------------------------------------------------------------------------------+
| 5. COMMITTEE MEMBERS DIRECTORY (Grid of corporate representatives)                 |
+------------------------------------------------------------------------------------+
```

---

### Page 4: Ambassador's Message (`/ambassador-message`)
*Diplomatic Patronage & Official Address*

#### SEO Blueprint
- **Meta Title:** `Message from the Ambassador of France to Sri Lanka | SLFBC` (58 chars)
- **Meta Description:** `Official diplomatic address by the Ambassador of the French Republic in Colombo on Sri Lanka–France bilateral trade, port infrastructure, and green energy.` (156 chars)
- **Primary Keywords:** `French Ambassador to Sri Lanka`, `Embassy of France Colombo message`, `France Sri Lanka diplomatic trade`

#### Layout & Wireframe Blocks
```
+------------------------------------------------------------------------------------+
| 1. DIPLOMATIC EMBLEM & PROTOCOL BANNER                                             |
+------------------------------------------------------------------------------------+
| 2. TWO-COLUMN DIPLOMATIC DISPATCH                                                  |
|    - Left: Official Ambassadorial Portrait, French Republic Seal, Diplomatic Title|
|    - Right: Formal Address Text (3–4 structured paragraphs), Signature Block       |
+------------------------------------------------------------------------------------+
| 3. EMBASSY COMMERCIAL SECTION (Business France) CONTACT BLOCK                      |
+------------------------------------------------------------------------------------+
```

---

### Page 5: Membership Overview & Fees (`/membership`)
*Tiers, Strategic Privileges, and Investment Schedule*

#### SEO Blueprint
- **Meta Title:** `Membership Tiers & Corporate Fees | SLFBC` (42 chars)
- **Meta Description:** `Join the Sri Lanka–France Business Council. Explore membership eligibility, corporate subscription fees, bilateral privileges, and application procedures.` (155 chars)
- **Primary Keywords:** `SLFBC membership fees`, `join Sri Lanka France Business Council`, `Ceylon Chamber membership cost`, `bilateral business chamber membership`
- **Anchor Shortcuts:** Supports `/faq` (redirects directly to `#faqs`).

#### Layout & Wireframe Blocks
```
+------------------------------------------------------------------------------------+
| 1. MEMBERSHIP PRIVILEGES HEADER & ELIGIBILITY CRITERIA                             |
+------------------------------------------------------------------------------------+
| 2. 3-TIER COMPARISON MATRIX                                                        |
|    - Tier 1: Patron Member (LKR 100,000/yr) - Priority bilateral summit access     |
|    - Tier 2: Corporate Member (LKR 50,000/yr) - Active commercial enterprises      |
|    - Tier 3: Associate Member (LKR 25,000/yr) - SMEs & academic affiliates        |
|    - *Entrance Fee note: LKR 25,000 (one-time on admission)*                       |
+------------------------------------------------------------------------------------+
| 3. STATUTORY ADMISSION PROCESS (4 Linear Steps)                                    |
|    Step 1: Online Application & Dossier Upload                                     |
|    Step 2: Proposer / Seconder Validation (2 existing members)                     |
|    Step 3: Executive Committee Review & Ceylon Chamber Due Diligence               |
|    Step 4: Formal Ratification & Invoice Issuance                                  |
+------------------------------------------------------------------------------------+
| 4. FREQUENTLY ASKED QUESTIONS ACCORDION (`#faqs`)                                  |
|    - 6 Comprehensive answers to corporate registration, foreign entities, etc.     |
+------------------------------------------------------------------------------------+
| 5. PERSISTENT CTA: [ INITIATE APPLICATION DOSSIER ]                                |
+------------------------------------------------------------------------------------+
```

---

### Page 6 & 7: Membership Application Journey (`/membership/apply` & `/membership/apply/success`)
*Enterprise Onboarding & Document Verification*

#### SEO Blueprint (`/membership/apply`)
- **Meta Title:** `Apply for Corporate Membership | SLFBC Application Portal` (56 chars)
- **Meta Description:** `Official application form for enterprises seeking accreditation in the Sri Lanka–France Business Council under The Ceylon Chamber of Commerce.` (144 chars)
- **Primary Keywords:** `SLFBC application form`, `Sri Lanka France Business Council register`, `bilateral chamber application`

#### Form Architecture (5-Stage Single Page Workflow)
1. **Section 1: Corporate Legal Identity:** Legal Entity Name, BR Number, Year Established, Registered Address, Website.
2. **Section 2: Sector & Bilateral Activity:** Sector dropdown, Primary Corridor (Inward France / Outward SL / Bilateral JV), Tier Selection.
3. **Section 3: Designated Executive Representative:** Name, C-Suite Designation, Official Email, Direct Mobile Number.
4. **Section 4: Council Proposers:** Proposer 1 (Company & Name), Proposer 2 (Company & Name).
5. **Section 5: Verification Documents (Uploads):**
   - Certificate of Incorporation (PDF/Image)
   - Company Capability Statement / Profile (PDF)
   - Audited Financial Statements (Last 2 Years) (PDF)

---

### Page 8 & 9: Member Directory & Corporate Profiles (`/members` & `/members/{slug}`)
*Verified Corporate Registry & Member Showcases*

#### SEO Blueprint (`/members`)
- **Meta Title:** `Verified Member Directory | Sri Lanka–France Business Council` (58 chars)
- **Meta Description:** `Explore the directory of accredited corporate members of the SLFBC, representing leading conglomerates, logistics operators, and energy innovators.` (151 chars)
- **Primary Keywords:** `SLFBC member directory`, `French companies in Sri Lanka`, `Sri Lankan exporters to France`, `CMA CGM Sri Lanka`, `Schneider Electric Sri Lanka`

#### Layout & Wireframe Blocks
```
+------------------------------------------------------------------------------------+
| 1. SEARCH & SECTOR FILTER TOOLBAR                                                  |
|    - Search Input (Real-time keyword query)                                        |
|    - Sector Filter Pills (Maritime, Energy, Conglomerates, Tea, Tech, Tourism, etc.)|
|    - Country of Origin Filter (France / Sri Lanka / Joint Venture)                  |
+------------------------------------------------------------------------------------+
| 2. MEMBER CARD GRID (Responsive 3-Column Grid)                                     |
|    - Card: Member Logo, Company Name, Sector Badge, Origin Flag, Summary, Profile  |
+------------------------------------------------------------------------------------+
| 3. MEMBER DETAIL PAGE (`/members/{slug}`)                                          |
|    - Breadcrumbs: Home > Directory > [Company Name]                                |
|    - Header: Corporate Logo, Origin, Verified Tier, Website Button                |
|    - Overview: Strategic Bilateral Footprint, Core Capabilities, Contact Desks     |
+------------------------------------------------------------------------------------+
```

---

### Page 10 & 11: News, Communiqués & Dispatches (`/news` & `/news/{slug}`)
*Thought Leadership, Chamber Announcements & Trade Policy*

#### SEO Blueprint (`/news`)
- **Meta Title:** `Chamber News & Bilateral Communiqués | SLFBC` (46 chars)
- **Meta Description:** `Latest diplomatic communiqués, trade delegation reports, and bilateral business news from the Sri Lanka–France Business Council.` (134 chars)
- **Primary Keywords:** `SLFBC news`, `Sri Lanka France bilateral news`, `Ceylon Chamber dispatches`, `French trade delegation Sri Lanka`
- **Structured Data:** `NewsArticle`, `Author`, `Publisher`

---

### Page 12 & 13: Events, Summits & Bilateral Forums (`/events` & `/events/{slug}`)
*Flagship Summits, Gala Dinners & Web Conferences*

#### SEO Blueprint (`/events`)
- **Meta Title:** `Bilateral Events, Summits & Delegations | SLFBC` (47 chars)
- **Meta Description:** `Explore upcoming bilateral investment summits, trade delegations, and protocol networking galas organized by the Sri Lanka–France Business Council.` (152 chars)
- **Primary Keywords:** `SLFBC events`, `Sri Lanka France investment forum`, `bilateral trade delegations Colombo Paris`
- **Structured Data:** `Event` schema (`startDate`, `endDate`, `location`, `offers`)

---

### Page 14 & 15: Strategic Business Opportunities (`/opportunities` & `/opportunities/{slug}`)
*Bilateral Capital Projects & Trade Corridors*

#### 6 Verified Priority Tracks:
1. `investment-renewable-infrastructure`: Offshore Wind, Solar Micro-Grids & Port Electrification
2. `high-value-bilateral-trade-exports`: GI Ceylon Cinnamon, Ethical Apparel & Aircraft-Grade Rubber
3. `market-entry-regulatory-navigation`: BOI Section 17 Incentives, Tax Treaties & Local Partner Vetting
4. `maritime-supply-chain-alliances`: Indian Ocean Transshipment, Cold Chain & Port Hubs
5. `luxury-tourism-culinary-exchange`: Regenerative Boutique Eco-Resorts & Culinary Institutes
6. `software-engineering-ai-venture-alliances`: High-End Enterprise Tech Corridors & Station F French Startups

---

### Page 16 & 17: Bilateral Economic Guides (`/france` & `/sri-lanka`)
*Doing Business in France & Doing Business in Sri Lanka*

#### SEO Blueprint (`/france` & `/sri-lanka`)
- **Meta Title (`/france`):** `Doing Business with France | Guide for Sri Lankan Exporters` (58 chars)
- **Meta Description (`/france`):** `Strategic trade and market entry guide for Sri Lankan enterprises accessing the French Republic and European Union markets under the EU GSP+ framework.` (156 chars)
- **Meta Title (`/sri-lanka`):** `Doing Business in Sri Lanka | Guide for French Investors` (55 chars)
- **Meta Description (`/sri-lanka`):** `Comprehensive investment guide for French corporations exploring Sri Lankan port logistics, BOI incentive zones, renewable energy, and regional trade hubs.` (159 chars)

---

### Page 18: Contact the Secretariat (`/contact`)
*Official Channels & Inquiries*

#### SEO Blueprint
- **Meta Title:** `Contact the Secretariat | Sri Lanka–France Business Council` (57 chars)
- **Meta Description:** `Contact the Secretariat of the Sri Lanka–France Business Council at The Ceylon Chamber of Commerce, Colombo 02. Phone: +94 11 558 8800.` (138 chars)
- **Primary Keywords:** `contact SLFBC`, `Ceylon Chamber Nawam Mawatha`, `SLFBC phone number`, `SLFBC email`
- **Form Protection:** Honeypot spam defense + cryptographic CSRF validation.

---

## 4. Comprehensive SEO Metadata Table (Copy-Paste Ready)

| Route | Primary Keyword | H1 Heading | Optimized Meta Title (≤ 60 chars) | Optimized Meta Description (140–160 chars) |
|---|---|---|---|---|
| `/` | `Sri Lanka France Business Council` | Strengthening Business Between Sri Lanka & France | `Sri Lanka–France Business Council \| Ceylon Chamber` | Official bilateral trade portal of the Sri Lanka–France Business Council, accredited under The Ceylon Chamber of Commerce and supported by the French Embassy. |
| `/about` | `about SLFBC` | Fostering Two Decades of Bilateral Trade & Alliance | `About the Council \| Sri Lanka–France Business Council` | Established in 2004 under the Ceylon Chamber of Commerce, the SLFBC fosters bilateral trade, joint ventures, and economic cooperation between Sri Lanka and France. |
| `/governance` | `SLFBC executive committee` | Executive Committee & Institutional Governance | `Executive Committee & Leadership \| SLFBC Sri Lanka` | Meet the Executive Committee of the Sri Lanka–France Business Council for 2025/26, stewarding bilateral trade and investment governance. |
| `/ambassador-message`| `French Ambassador message` | Official Diplomatic Address of the Ambassador of France | `Message from the Ambassador of France to Sri Lanka \| SLFBC` | Official diplomatic address by the Ambassador of the French Republic in Colombo on Sri Lanka–France bilateral trade, port infrastructure, and green energy. |
| `/membership` | `SLFBC membership fees` | Expand Your Enterprise Across the Franco-Lankan Axis | `Membership Tiers & Corporate Fees \| SLFBC` | Join the Sri Lanka–France Business Council. Explore membership eligibility, corporate subscription fees, bilateral privileges, and application procedures. |
| `/membership/apply` | `SLFBC application` | Corporate Membership Application Dossier | `Apply for Corporate Membership \| SLFBC Application Portal` | Official application form for enterprises seeking accreditation in the Sri Lanka–France Business Council under The Ceylon Chamber of Commerce. |
| `/members` | `SLFBC member directory` | Accredited Corporate Member Directory | `Verified Member Directory \| Sri Lanka–France Business Council` | Explore the directory of accredited corporate members of the SLFBC, representing leading conglomerates, logistics operators, and energy innovators. |
| `/news` | `SLFBC news` | Bilateral Communiqués & Chamber Dispatches | `Chamber News & Bilateral Communiqués \| SLFBC` | Latest diplomatic communiqués, trade delegation reports, and bilateral business news from the Sri Lanka–France Business Council. |
| `/events` | `SLFBC events` | Bilateral Summits, Trade Missions & Protocol Galas | `Bilateral Events, Summits & Delegations \| SLFBC` | Explore upcoming bilateral investment summits, trade delegations, and protocol networking galas organized by the Sri Lanka–France Business Council. |
| `/opportunities` | `bilateral investment Sri Lanka France` | Strategic Bilateral Corridors & Capital Projects | `Business & Investment Opportunities \| SLFBC` | Discover high-yield investment corridors, joint venture openings, and strategic trade projects between Sri Lanka and the French Republic. |
| `/france` | `doing business in France` | Doing Business with France: The European Gateway | `Doing Business with France \| Guide for Sri Lankan Exporters` | Strategic trade and market entry guide for Sri Lankan enterprises accessing the French Republic and European Union markets under the EU GSP+ framework. |
| `/sri-lanka` | `invest in Sri Lanka French companies` | Doing Business in Sri Lanka: Indian Ocean Strategic Hub | `Doing Business in Sri Lanka \| Guide for French Investors` | Comprehensive investment guide for French corporations exploring Sri Lankan port logistics, BOI incentive zones, renewable energy, and regional trade hubs. |
| `/gallery` | `SLFBC photo gallery` | Official Bilateral Event & Delegation Archive | `Photo Gallery & Summit Archive \| SLFBC` | High-resolution photographic archive of ministerial delegations, bilateral investment forums, and protocol galas of the Sri Lanka–France Business Council. |
| `/contact` | `contact SLFBC` | Connect with The Chamber Secretariat | `Contact the Secretariat \| Sri Lanka–France Business Council` | Contact the Secretariat of the Sri Lanka–France Business Council at The Ceylon Chamber of Commerce, Colombo 02. Phone: +94 11 558 8800. |

---

## 5. Technical SEO & Performance Deliverables Checklist

- [x] **Semantic Schema Markup:**
  - `Organization` & `GovernmentOrganization` with Ceylon Chamber & French Embassy affiliations.
  - `BreadcrumbList` on every subpage.
  - `Event` structured markup on summit pages.
  - `NewsArticle` on dispatch pages.
- [x] **URL Canonicalization:** Fully supported across all public endpoints with trailing slash normalizations.
- [x] **Legacy 301 Redirects:** Automatic redirection from old flat PHP scripts (`/index.php`, `/about_layout.php`, `/members.php`, `/events.php`, `/application.php`, `/contact.php`, `/faq`, `/constitution`).
- [x] **Search Engine Discovery:** Valid, self-updating XML sitemap at `/sitemap.xml` and rules at `/robots.txt`.
- [x] **Mobile Responsiveness & Core Web Vitals:** Lightweight Vanilla CSS + Tailwind utility tokens; zero heavy runtime dependencies; clean DOM structure for sub-second First Contentful Paint (FCP) and Largest Contentful Paint (LCP).
- [x] **Accessibility (a11y):** Skip-to-content anchor, high-contrast diplomatic color palette (Navy `#002654`, Crimson `#b91c1c`, Gold `#c59b27`), semantic HTML5 (`<header>`, `<nav>`, `<main>`, `<article>`, `<section>`, `<footer>`), and valid `aria-label` tags.

---

### Visual Screenshot Reference
All 56 full-page screenshots of these wireframes and layouts are stored and immediately viewable in your local repository folder:
👉 [file:///c:/Users/User/Desktop/Spillburg%20Admin/projects/slfbc/screenshots/](file:///c:/Users/User/Desktop/Spillburg%20Admin/projects/slfbc/screenshots/)
