# Render.com Deployment Guide
## Sri Lanka–France Business Council (SLFBC) Portal

This repository is pre-configured with zero-configuration Docker containerization and blueprint definitions for automatic one-click deployment to **[Render.com](https://render.com/)**.

---

## 1. Quick Deploy via Render Blueprint (Recommended)

1. Log in to your [Render Dashboard](https://dashboard.render.com/).
2. Click **New +** in the top navigation and select **Blueprint**.
3. Connect your GitHub account and select the repository: `muhzahjr07/slfbc`.
4. Render will automatically detect [`render.yaml`](../render.yaml) and populate:
   - **Service Name:** `slfbc-portal`
   - **Environment:** Docker
   - **Plan:** Free (or Starter/Standard)
   - **Health Check Path:** `/`
   - **Environment Variables:** Automatically populated with secure production defaults.
5. In the **Environment Variables** section, set `APP_URL` to your Render URL (e.g. `https://slfbc-portal.onrender.com` or custom domain `https://slfbc.lk`).
6. Click **Apply**. Render will automatically build the Docker image and deploy the portal.

---

## 2. Alternative: Manual Web Service Deployment

If you prefer to configure the service manually on Render:

1. Click **New +** > **Web Service**.
2. Select your repository: `muhzahjr07/slfbc`.
3. Fill in the deployment details:
   - **Name:** `slfbc-portal`
   - **Region:** Any (e.g., Oregon, Frankfurt, Singapore)
   - **Branch:** `main`
   - **Language / Runtime:** **Docker**
   - **Dockerfile Path:** `./Dockerfile`
   - **Instance Type:** Free (or preferred tier)
4. Under **Advanced** > **Environment Variables**, add the following keys:
   | Key | Recommended Value | Note |
   |---|---|---|
   | `APP_NAME` | `Sri Lanka–France Business Council` | Portal Brand Title |
   | `APP_ENV` | `production` | Enables production error handling |
   | `APP_DEBUG` | `false` | Shields stack traces from public view |
   | `APP_URL` | `https://<your-service>.onrender.com` | Primary application root URL |
   | `APP_SECRET` | *(Click "Generate" for 32+ random characters)* | Cryptographic HMAC secret |
   | `DB_CONNECTION` | `sqlite` | Default embedded database |
   | `DB_DATABASE` | `storage/database.sqlite` | SQLite database file path |
   | `SESSION_SECURE_COOKIE` | `true` | Enforces HTTPS-only cookies |
   | `SESSION_LIFETIME` | `7200` | 2-hour idle session expiration |
   | `ADMIN_RATE_LIMIT_ATTEMPTS` | `5` | Brute force defense threshold |
   | `ADMIN_RATE_LIMIT_MINUTES` | `15` | Throttling duration |

5. Under **Health Check Path**, enter: `/`
6. Click **Create Web Service**.

---

## 3. Persistent Disk for SQLite & Document Uploads (Optional on Paid Plans)

On Render's Free tier, the filesystem is ephemeral (it resets when the container restarts). The app auto-seeds SQLite with verified initial council data on boot.

If you upgrade to a Render paid instance (Starter \$7/mo) and want submitted applicant files (`storage/documents/`) and database edits to persist indefinitely across redeploys:
1. Go to your Web Service > **Disks** tab.
2. Click **Add Disk**.
3. Configure:
   - **Name:** `slfbc-storage`
   - **Mount Path:** `/var/www/html/storage`
   - **Size:** 1 GB (or more)
4. Save and redeploy.

Alternatively, you can switch `DB_CONNECTION` to `mysql` and connect any managed MySQL/MariaDB database (e.g., PlanetScale, Aiven, or standard cPanel MySQL).

---

## 4. Default Credentials & Immediate Post-Deployment Access

Once Render shows **Live**:
- **Public Portal:** `https://<your-service>.onrender.com/`
- **Admin Login:** `https://<your-service>.onrender.com/admin/login`
- **Initial Administrator:**
  - **Email:** `admin@slfbc.lk`
  - **Passphrase:** `Admin@SLFBC2026!`
- *Important: Immediately log in to `/admin/settings` or update your admin password upon production rollout.*

