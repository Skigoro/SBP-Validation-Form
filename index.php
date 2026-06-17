<?php
$status = $_GET['status'] ?? '';
$message = '';
$alertClass = '';
if ($status === 'success') {
    $message = 'Your SBP validation request has been submitted successfully.';
    $alertClass = 'success';
} elseif ($status === 'duplicate') {
    $message = 'Application Number or SBP Number already exists.';
    $alertClass = 'error';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SBP Validation - County Government of Nyandarua</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fontsource-roboto@4.0.0/index.css">
    <link rel="stylesheet" href="style.css">
    <script src="app.js" defer></script>
</head>
<body>
    <!-- Header -->
    <header class="header">
        <div class="header-left">
            <div class="logo-container">
            <img src="images/Site-Icon.webp" class="logo-img" alt="Logo">
                <div class="header-text">
                    <h1>County Government of</h1>
                    <h2>Nyandarua</h2>
                </div>
            </div>
        </div>
        <div class="hamburger" id="hamburger" onclick="toggleNav()">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </header>

    <!-- Mobile Nav -->
    <nav class="mobile-nav" id="mobileNav">
        <a href="#">Home</a>
        <a href="#">About Us</a>
        <a href="#">Services</a>
        <a href="#">SBP Validation</a>
        <a href="#">Contact</a>
        <a href="#">News & Updates</a>
    </nav>

    <!-- Overlay -->
    <div class="overlay" id="overlay" onclick="toggleNav()"></div>

    <!-- Main Content -->
    <main class="main-content">
        <div class="form-title">
            <h2>SBP Validation Form</h2>
            <p>Single Business Permit Application & Validation</p>
        </div>

        <?php if ($message): ?>
            <div class="server-message <?php echo htmlspecialchars($alertClass, ENT_QUOTES, 'UTF-8'); ?>">
                <?php echo htmlspecialchars($message, ENT_QUOTES, 'UTF-8'); ?>
            </div>
        <?php endif; ?>

        <div class="form-container">
            <form id="sbpForm" method="post" action="submit.php" novalidate>

                <!-- Email -->
                <div class="form-group">
                    <label for="email">Email <span class="required">*</span></label>
                    <input type="email" id="email" name="email" placeholder="Enter your email address" required>
                    <div class="error-message" id="emailError">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
                        Please enter a valid email address
                    </div>
                </div>

                <!-- Ward -->
                <div class="form-group">
                    <label for="ward">Ward <span class="required">*</span></label>
                    <select id="ward" name="ward" required>
                        <option value="">Select an option</option>
                        <option value="Engineer">Engineer</option>
                        <option value="Kanjuiri-Riri">Kanjuiri-Riri</option>
                        <option value="Kiriita">Kiriita</option>
                        <option value="Karima">Karima</option>
                        <option value="Mirangine">Mirangine</option>
                        <option value="Kaimbaga">Kaimbaga</option>
                        <option value="Rurii">Rurii</option>
                        <option value="Kabatini">Kabatini</option>
                        <option value="Nyakio">Nyakio</option>
                        <option value="Gathara">Gathara</option>
                        <option value="Ndaragwa">Ndaragwa</option>
                        <option value="Shamata">Shamata</option>
                        <option value="Kanjuiri">Kanjuiri</option>
                        <option value="Kiriita-Main">Kiriita-Main</option>
                        <option value="Other">Other</option>
                    </select>
                    <div class="error-message" id="wardError">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
                        Please select a ward
                    </div>
                </div>

                <!-- SBP No -->
                <div class="form-group">
                    <label for="sbpNo">SBP No. <span class="required">*</span></label>
                    <input type="text" id="sbpNo" name="sbpNo" placeholder="Enter SBP Number" required>
                    <div class="error-message" id="sbpNoError">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
                        Please enter the SBP number
                    </div>
                </div>
                <!-- Application No -->
                <div class="form-group">
                    <label for="applicationNo">Application No. <span class="required">*</span></label>
                    <input type="text" id="applicationNo" name="applicationNo" placeholder="Enter Application number" required>
                    <div class="error-message" id="applicationNoError">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
                        Please enter the application number
                    </div>
                </div>

                <!-- Business Name -->
                <div class="form-group">
                    <label for="businessName">Business Name <span class="required">*</span></label>
                    <input type="text" id="businessName" name="businessName" placeholder="Enter Business Name" required>
                    <div class="error-message" id="businessNameError">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
                        Please enter the business name
                    </div>
                </div>

                <!-- Type of Business -->
                <div class="form-group">
                    <label for="typeOfBusiness">Type of Business <span class="required">*</span></label>
                    <input type="text" id="typeOfBusiness" name="typeOfBusiness" placeholder="Enter Type of Business" required>
                    <div class="error-message" id="typeOfBusinessError">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
                        Please enter the type of business
                    </div>
                </div>

                <!-- Town/Market Centre -->
                <div class="form-group">
                    <label for="townMarket">Town/Market Centre <span class="required">*</span></label>
                    <input type="text" id="townMarket" name="townMarket" placeholder="Enter Town/Market Centre" required>
                    <div class="error-message" id="townMarketError">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
                        Please enter the town/market centre
                    </div>
                </div>

                <!-- Amount Paid -->
                <div class="form-group">
                    <label for="amountPaid">Amount Paid <span class="required">*</span></label>
                    <input type="number" id="amountPaid" name="amountPaid" placeholder="Enter Amount Paid (KES)" min="0" step="0.01" required>
                    <div class="error-message" id="amountPaidError">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
                        Please enter a valid amount
                    </div>
                </div>

                <!-- Comment -->
                <div class="form-group">
                    <label for="comment">Comment</label>
                    <textarea id="comment" name="comment" placeholder="Enter any additional comments (optional)"></textarea>
                </div>

                <!-- Submit Button -->
                <button type="submit" class="submit-btn" id="submitBtn">Submit</button>
            </form>
        </div>
    </main>

    <!-- Footer -->
    <footer class="footer">
        <p>&copy; 2026 County Government of Nyandarua. All rights reserved.</p>
        <p><a href="#">Privacy Policy</a> | <a href="#">Terms of Service</a></p>
    </footer>

    <!-- Scroll to Top -->
    <button class="scroll-top" id="scrollTop" onclick="scrollToTop()">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
            <polyline points="18 15 12 9 6 15"></polyline>
        </svg>
    </button>

    <!-- Success Modal -->
    <div class="modal-overlay" id="successModal">
        <div class="modal">
            <div class="success-icon">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                    <polyline points="20 6 9 17 4 12"></polyline>
                </svg>
            </div>
            <h3>Submission Successful!</h3>
            <p>Your SBP validation request has been submitted successfully. You will receive a confirmation email shortly.</p>
            <button onclick="closeModal()">OK, Got it</button>
        </div>
    </div>
</body>
</html>
