# 📡 QR / Barcode Attendance System — Setup Guide

## Files in This Package

| File | Purpose |
|------|---------|
| `Code1_Attendance.gs` | Core attendance logic (scan, log, status) |
| `Code2_Notifications.gs` | SMS & Email notifications |
| `Code3_AdminControl.gs` | Admin panel logic, settings, export |
| `ScannerUI.html` | Student-facing scanner interface |
| `AdminPanel.html` | Admin control panel |

---

## Step-by-Step Setup

### 1. Create a Google Sheet
1. Go to [sheets.google.com](https://sheets.google.com) and create a new spreadsheet.
2. Name it something like **"School Attendance System"**.

---

### 2. Open Apps Script
1. In your Google Sheet, click **Extensions → Apps Script**.
2. You'll see a default `Code.gs` file.

---

### 3. Add the Code Files

**In the Apps Script editor:**

1. **Rename** the existing `Code.gs` → paste in contents of `Code1_Attendance.gs`
2. Click **+ (Add file) → Script** → name it `Code2_Notifications` → paste contents
3. Click **+ (Add file) → Script** → name it `Code3_AdminControl` → paste contents
4. Click **+ (Add file) → HTML** → name it `ScannerUI` → paste the HTML
5. Click **+ (Add file) → HTML** → name it `AdminPanel` → paste the HTML

---

### 4. Initialize Sheets

1. In the script editor, select the function `setupSheets` from the dropdown.
2. Click **▶ Run**.
3. Grant permissions when prompted.
4. This will create: `ATTENDANCE`, `MASTERLIST`, and `SYSTEM_SETTINGS` sheets.

---

### 5. Add Your Student Data (MASTERLIST)

Open the `MASTERLIST` sheet and fill in your students:

| LRN | Name | Section | ParentNo | AdviserEmail |
|-----|------|---------|----------|--------------|
| 123456789012 | Juan Dela Cruz | Grade 7 - Rizal | +639123456789 | adviser@school.edu |
| ... | ... | ... | ... | ... |

> **Phone numbers** should be in format: `+639XXXXXXXXX` or `09XXXXXXXXX`

---

### 6. Deploy as Web App

1. In Apps Script, click **Deploy → New deployment**
2. Select type: **Web App**
3. Settings:
   - **Execute as:** Me
   - **Who has access:** Anyone (or limit to your school's domain)
4. Click **Deploy** and copy the Web App URL.

---

### 7. Access the System

- **Scanner:** `YOUR_WEB_APP_URL` → Share this with the scanner computer/tablet
- **Admin Panel:** `YOUR_WEB_APP_URL?page=admin` → Only for admins

---

### 8. Set Up SMS (Optional — Semaphore)

1. Sign up at [semaphore.co](https://semaphore.co) and get your API key.
2. In the Apps Script editor, open `Code2_Notifications.gs`
3. Find the function `setSMSApiKey()` and replace `'YOUR_API_KEY_HERE'` with your key.
4. Run `setSMSApiKey()` once from the editor.
5. In Admin Panel → System Settings → turn **SMS ON**.

---

## Default Admin Password

The default password is: **`admin123`**

⚠️ **Change this immediately** after first login via Admin Panel → Emergency Controls → Change Password.

---

## System Flow

```
Student scans QR/Barcode
    ↓
receiveScanData(lrn)
    ↓
Check SYSTEM_SETTINGS → Scanner ON?
    ↓
Look up LRN in MASTERLIST
    ↓
checkDuplicateScan() → Already logged today?
    ↓ No
determineStatus() → On-time or Late?
    ↓
logAttendance() → Write to ATTENDANCE sheet
    ↓
SMS = ON? → sendSMSParent()
EMAIL = ON? → sendEmailAdviser()
    ↓
Return result to Scanner UI
```

---

## SYSTEM_SETTINGS Sheet Reference

| Setting | Values | Description |
|---------|--------|-------------|
| SMS | ON / OFF | Enable parent SMS alerts |
| EMAIL | ON / OFF | Enable adviser email alerts |
| SCANNER | ON / OFF | Enable/disable scanning |
| LATE_TIME | HH:MM (e.g., 07:30) | Cutoff time for Late status |
| ADMIN_PASSWORD | (your password) | Admin panel password |

---

## Troubleshooting

| Problem | Solution |
|---------|---------|
| "Student not found" | Check LRN matches exactly in MASTERLIST |
| SMS not sending | Verify Semaphore API key and phone format |
| Email not sending | Check adviser email is valid, Gmail quota not exceeded |
| Scanner disabled | Check SYSTEM_SETTINGS SCANNER = ON, or use Admin Panel |
| Already logged | Duplicate scan protection — 1 scan per student per day |

---

## Notes
- The MASTERLIST can also be a **separate Google Sheet** — just update `getMasterListData()` in `Code2_Notifications.gs` to use `SpreadsheetApp.openById('YOUR_SHEET_ID')` instead of `getActiveSpreadsheet()`
- For high-traffic schools, consider using **Sheets API** with batch writes for better performance
- Export generates a `.csv` file downloadable directly from the Admin Panel
