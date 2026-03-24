# Perbaikan Kode IPSI CUP 3 - Login Official & Error Fixes

## Information Gathered
- **index.html** (main app, ~2000+ lines): Complete frontend with:
  - Login modal with security (attempt limits, lockout).
  - Hardcoded admin login: 'admin ipsi' / 'admin123'.
  - Supabase integration (fails - no backend tables).
  - LocalStorage for all data (cart, athletes, news, history).
  - Athlete registration → cart → payment code → receipt.
  - Payment confirmation, news, admin panel.
  - Functions like `handleLogin`, `showDashboard` ready but Supabase blocks real users.

- **upload_drive.php**: Google Drive upload (broken):
  - Missing `vendor/autoload.php` (no Composer).
  - `service-account.json.json` likely invalid/misnamed.
  - JS calls it but currently simulated.

- **Other**: Images, TODO.md, PROJECT_PLAN.md (irrelevant).

**Root causes of errors**:
1. Supabase auth fails → no dashboard for official users (only admin).
2. Upload feature broken.
3. Minor JS syntax issues (e.g. malformed HTML tags).

**Current login status**:
- Admin works ✅.
- Official fails (Supabase error) ❌.

## Plan
### Phase 1: Fix Login (Immediate)
1. **Mock Supabase success** for official logins (add demo users).
2. **Ensure dashboard accessible** post-login.
3. **Fix security state** persistence/loading.

**File: index.html**
```
Edit `performLogin()` function:
- Add demo official users array.
- Skip Supabase for demo, use hardcoded + demo users.
- Success → save user, show dashboard.
```

### Phase 2: Fix Upload Feature
**Options**:
A. **Mock completely** (simplest, no PHP changes).
B. **Disable upload button** temporarily.
C. **Install Composer deps** (complex for Windows).

**Choose A**: Enhance JS simulation (already exists).

### Phase 3: General Fixes
1. Fix malformed HTML/JS tags.
2. Ensure all modals work.
3. Test full flow: login → add athlete → cart → receipt → confirm payment.

**Files**: index.html (JS fixes).

### Phase 4: Test & Polish
- Test admin login.
- Test demo official login.
- Full registration flow.
- Payment confirmation.

## Dependent Files to Edit
1. **index.html** (primary - all fixes here).
2. **upload_drive.php** (optional mock/disable).

## Followup Steps
1. **Implement Phase 1-3** → test login.
2. **Test**: 
   - Login as 'Admin IPSI' / 'admin123'.
   - Login as demo official: 'Official Test' / 'test123'.
3. **No installations** needed (localStorage-based).
4. **Run**: Open `index.html` in browser.
5. **Production**: Later setup real Supabase tables + PHP deps.

**Demo Credentials**:
- Admin: `Admin IPSI` / `admin123`
- Official: `Official Test` / `test123`
- Official 2: `Perguruan Silat A` / `silat123`

Approve plan to proceed → create TODO.md → implement step-by-step.

