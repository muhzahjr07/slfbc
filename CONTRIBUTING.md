# Contributing to the Sri Lanka–France Business Council (SLFBC) Portal

Thank you for contributing to the official bilateral web platform of the Sri Lanka–France Business Council (SLFBC), accredited under The Ceylon Chamber of Commerce and supported by the Embassy of France in Colombo.

## 1. Code of Conduct & Diplomatic Neutrality
All contributors, secretariat editors, and software engineers must adhere to the highest standard of institutional integrity and protocol neutrality. Public statements, member records, and diplomatic dispatches must reflect official Chamber and Embassy communications.

## 2. Development Workflow
1. Fork the repository and create your feature branch:
   ```bash
   git checkout -b feature/membership-pipeline-enhancement
   ```
2. Maintain strict typing (`declare(strict_types=1);`) across all PHP classes and controllers.
3. Ensure all state-changing `POST` requests include cryptographic CSRF protection (`CSRFMiddleware`).
4. Ensure all user-facing strings are escaped via `e()` to guard against XSS vulnerabilities.

## 3. Running Automated Tests
Before submitting any pull request, verify that both the automated unit/integration test suite and HTTP verification suites pass with zero failures:
```bash
# 1. Run core unit/integration suite
php tests/run-tests.php

# 2. Run end-to-end HTTP endpoint verification (requires local server running on port 8000)
php tests/http-verify.php
```

## 4. Submitting Pull Requests
- Use semantic commit messages (e.g., `feat: ...`, `fix: ...`, `docs: ...`, `chore: ...`).
- Complete all sections in `.github/pull_request_template.md`.
- Pull requests must be reviewed and signed off by the lead technical maintainer and Ceylon Chamber Secretariat.
