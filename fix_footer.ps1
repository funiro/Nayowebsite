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
