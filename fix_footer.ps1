$files = Get-ChildItem -Path "c:\xampp\htdocs\dashboard\nayo-website" -Filter "*.php" -File

foreach ($file in $files) {
    $content = Get-Content $file.FullName -Raw
    
    # Fix footer include statement
    $content = $content -replace '(?s)<!-- Include footer -->`n    <?php include ''includes/footer.php''; ?>', '<!-- Include footer -->`n    <?php include ''includes/footer.php''; ?>'
    
    # Ensure footer is before closing body tag
    $content = $content -replace '(?s)</body>', '<!-- Include footer -->`n    <?php include ''includes/footer.php''; ?>`n</body>'
    
    # Save the updated content
    Set-Content -Path $file.FullName -Value $content
    Write-Host "Fixed: $($file.Name)"
}

$cssFile = "c:\xampp\htdocs\dashboard\nayo-website\css\styles.css"

# Read the entire file
$cssContent = Get-Content $cssFile -Raw

# Define the new partners section styles
$newStyles = @"
.partners-section {
    width: 100%;
    background-color: white;
    padding: var(--spacing-md);
    margin-top: var(--spacing-lg);
    color: var(--text-color);
    max-width: 1200px;
    margin-left: auto;
    margin-right: auto;
    padding: 0 var(--spacing-lg);
}

.partners-line {
    display: flex;
    gap: var(--spacing-md);
    align-items: center;
    min-width: max-content;
    padding: var(--spacing-md);
    justify-content: center;
    flex-wrap: wrap;
}

.partner-logo {
    flex-shrink: 0;
    margin: 0 var(--spacing-sm);
}

.partner-logo img {
    max-width: 80px;
    height: auto;
    display: block;
    padding: 5px;
    background: white;
    border-radius: 4px;
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
}
"@

# Replace the existing partners section styles
$cssContent = $cssContent -replace "(?s)(\.partners-section\s*\{.*?\}\s*\.partners-line\s*\{.*?\}\s*\.partner-logo\s*\{.*?\}\s*\.partner-logo\s*img\s*\{.*?\})", $newStyles

# Write the updated content back to the file
Set-Content -Path $cssFile -Value $cssContent -Encoding UTF8

Write-Host "Footer styles have been updated successfully!" -ForegroundColor Green
