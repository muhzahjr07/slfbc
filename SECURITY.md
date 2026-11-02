# Security Policy

## Supported Versions
Security patches and updates are actively maintained on the `main` branch.

| Version | Supported          |
| ------- | ------------------ |
| 1.0.x   | :white_check_mark: |

## Reporting a Vulnerability
The Sri Lanka–France Business Council and The Ceylon Chamber of Commerce take the security and integrity of diplomatic and corporate data seriously.

If you discover a potential security vulnerability within this application (including authentication bypasses, session hijacking, SQL injection, CSRF evasion, or confidential document exposure):

1. **Do not disclose the issue publicly** or file a public GitHub issue.
2. Email full technical details, proof-of-concept steps, and environment notes directly to the Secretariat and Security Operations team:
   - **Secretariat Email:** [slfbc@chamber.lk](mailto:slfbc@chamber.lk)
   - **Lead Technical Architect:** [frm.zaharan.jr@gmail.com](mailto:frm.zaharan.jr@gmail.com)
3. You will receive an acknowledgment within 24–48 hours, followed by a remediation timeline and patch notice.

## Built-In Security Mitigations
- **CSRF Defense:** Cryptographic HMAC tokens on all non-idempotent HTTP methods.
- **SQL Injection:** Exclusively parameterized queries using native PDO prepared statements.
- **XSS Mitigation:** Strict UTF-8 escaping via `e()` across all template views.
- **Brute Force Protection:** Sliding-window IP rate limiting on administrative endpoints.
- **Confidential Document Protection:** Candidate application files stored outside web root (`storage/documents/`) with streaming authorization checks.
