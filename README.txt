SRIRAM FOUNDATION WEBSITE (PHP / Bootstrap)

Files:
- index.php: site + PHP volunteer registration
- style.css: styles
- script.js: interactions

Run locally:
1. Install XAMPP, WAMP, or another PHP server.
2. Copy the sriram_foundation folder into htdocs (XAMPP).
3. Start Apache in XAMPP.
4. Visit http://localhost/sriram_foundation/

Registration records are appended to registrations.csv in the folder.
For production, protect the CSV file from public web access, use a database,
add server-side CSRF protection, rate limiting, consent/privacy notices and
secure admin access. Replace placeholder email, phone, address and links.
