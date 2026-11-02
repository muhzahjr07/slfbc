# Pull Request Template

## Description
Briefly describe the change, feature, or bug fix introduced by this PR.

## Related Council Governance / Audit Item
- [ ] Leadership & Executive Committee updates
- [ ] Membership Directory & Application pipeline
- [ ] Bilateral News, Communiqués & Summits
- [ ] SEO, Performance & Semantic Markup
- [ ] Security (CSRF, Rate Limiting, File Validation)

## Verification & Testing
- [ ] `php tests/run-tests.php` executed (all 77 assertions pass)
- [ ] `php tests/http-verify.php` executed (all 43 endpoints HTTP 200/301)
- [ ] Zero database connection leaks or unsanitized output

## Checklist
- [ ] Code follows PSR-12 and strict typing (`declare(strict_types=1);`).
- [ ] No plaintext passwords or confidential document paths committed.
- [ ] Semantic HTML and Tailwind tokens verified across mobile and desktop.

